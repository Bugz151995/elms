<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'student_tbl';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'student_id','fname', 'mname', 'lname', 'class_id'
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
    public function getStudents($slug = false)
    {
        if($slug !== false)
            return $this->find($slug);
        
        return $this->findAll();
    }
}