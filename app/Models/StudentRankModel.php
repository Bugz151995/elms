<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentRankModel extends Model
{
    protected $table      = 'studentrank_tbl';
    protected $primaryKey = 'studentrank_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'student_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    /**
     * returns an array of all the student data or a specific student
     * @param int $slug
     * 
     * @return array
     */
    public function getRankings()
    {
        return $this->select('COUNT("student_id") as total, fname, mname, lname, username, grade_level, section_name, studentrank_tbl.created_at')->join('student_tbl', 'student_tbl.student_id = studentrank_tbl.student_id', 'left')->join('account_tbl', 'account_tbl.student_id = student_tbl.student_id', 'left')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id', 'left')->groupBy('student_tbl.student_id')->orderBy('total', 'desc')->findAll();
    }
}
