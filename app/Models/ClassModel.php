<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table      = 'class_tbl';
    protected $primaryKey = 'class_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'grade_level','section_name'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getClass()
    {
        return $this->findAll();
    }
}