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
        'name', 'author', 'publish_date', 'units', 'units_athand', 'category_id', 'qrcode_id'
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
            return $this->join('category_tbl', 'book_tbl.category_id = category_tbl.category_id')->join('qrcode_tbl', 'qrcode_tbl.qrcode_id = book_tbl.qrcode_id')->findAll();
        
        return $this->where(['book_id' => $slug])->first();
    }
}