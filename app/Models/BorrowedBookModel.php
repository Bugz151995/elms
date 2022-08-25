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
        'book_id', 'student_id'
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
            return $this->join('book_tbl', 'book_tbl.book_id = borrowed_book_tbl.book_id')->join('category_tbl', 'category_tbl.category_id = book_tbl.category_id')->join('student_tbl', 'student_tbl.id = borrowed_book_tbl.student_id')->findAll();
        
        return $this->where(['book_id' => $slug])->first();
    }
}