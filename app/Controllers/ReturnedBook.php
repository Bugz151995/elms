<?php

namespace App\Controllers;

use \App\Models\ReturnedBookModel;

class ReturnedBook extends BaseController
{
    protected $helpers = ['form'];  

    /**
     * deletes a returned book data
     * 
     * @return string
     */
    public function delete()
    {
        $r_book = model(ReturnedBookModel::class);

        if ($this->validate(['returned_book_id' => 'required'])) {
            $r_book->delete(['returned_book_id' => $this->request->getPost('returned_book_id')]);

            session()->setFlashdata('success', 'The book was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/returned_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}
