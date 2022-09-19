<?php

namespace App\Models;

use CodeIgniter\Model;

class ReturnedBookModel extends Model
{
    protected $table      = 'returned_book_tbl';
    protected $primaryKey = 'returned_book_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'units_returned', 'book_id', 'student_id', 'qrcode_id'
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
            return $this->join('book_tbl', 'book_tbl.book_id = returned_book_tbl.book_id')->join('category_tbl', 'category_tbl.category_id = book_tbl.category_id')->join('student_tbl', 'student_tbl.student_id = returned_book_tbl.student_id')->findAll();
        
        return $this->where(['book_id' => $slug])->first();
    }

    public function getMonthlyReport()
    {
        $db = db_connect();
        return $db->query("SELECT MAX(MONTHNAME(created_at)) AS MONTHS, COUNT(1) AS 'RETURNED BOOK'
        FROM returned_book_tbl GROUP BY MONTH(created_at)")->getResult();
    }
}