<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table      = 'book_tbl';
    protected $primaryKey = 'book_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name', 'author', 'publish_date', 'units', 'category_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}