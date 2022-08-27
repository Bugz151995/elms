<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table      = 'account_tbl';
    protected $primaryKey = 'account_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'username', 'password', 'admin_id', 'student_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAccounts($slug = false)
    {
        if ($slug === false)
            return $this->join('student_tbl', 'student_tbl.student_id = account_tbl.student_id')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id')->findAll();
        
        return $this->where(['student_id' => $slug])->first();
    }

    public function getRanks()
    {        
        return $this->join('student_tbl', 'student_tbl.student_id = account_tbl.student_id')->join('borrowed_book_tbl', 'borrowed_book_tbl.student_id = student_tbl.student_id')->orderBy('student')->findAll();
    }
}