<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountFineModel extends Model
{
    protected $table      = 'account_fine_tbl';
    protected $primaryKey = 'account_fine_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'amount_paid', 'or_no', 'student_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}