<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'   => 'test book',
            'author' => 'darth vader',
            'publish_date' => '2022-08-03',
            'units' => '15',
            'category_id' => '1'
        ];

        // Using Query Builder
        $this->db->table('book_tbl')->insert($data);
    }
}