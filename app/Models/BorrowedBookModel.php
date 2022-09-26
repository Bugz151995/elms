<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowedBookModel extends Model
{
    protected $table      = 'borrowed_book_tbl';
    protected $primaryKey = 'borrowed_book_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'is_returned', 'book_id', 'student_id', 'qrcode_id', 'due_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getBooks($slug = false)
    {
        if ($slug === false)
            return $this->join('qrcode_tbl', 'qrcode_tbl.qrcode_id = borrowed_book_tbl.qrcode_id', 'left')->join('book_tbl', 'book_tbl.book_id = borrowed_book_tbl.book_id', 'left')->join('category_tbl', 'category_tbl.category_id = book_tbl.category_id', 'left')->join('student_tbl', 'student_tbl.student_id = borrowed_book_tbl.student_id', 'left')->where('is_returned', 0)->findAll();

        return $this->where(['book_id' => $slug])->first();
    }

    public function getMonthlyReport()
    {
        $db = db_connect();
        return $db->query("SELECT MAX(MONTHNAME(created_at)) AS MONTHS, COUNT(1) AS 'BORROWED BOOK'
        FROM borrowed_book_tbl GROUP BY MONTH(created_at)")->getResult();
    }

    public function getId($slug)
    {
        return $this->select('borrowed_book_tbl.borrowed_book_id, borrowed_book_tbl.student_id, borrowed_book_tbl.book_id, units, units_athand', 'left')->join('book_tbl', 'book_tbl.book_id = borrowed_book_tbl.book_id', 'left')->join('qrcode_tbl', 'qrcode_tbl.qrcode_id = borrowed_book_tbl.qrcode_id', 'left')->where(['qrcode' => $slug])->first();
    }
}
