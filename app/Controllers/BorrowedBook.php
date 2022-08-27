<?php

namespace App\Controllers;

use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;

class BorrowedBook extends BaseController
{
    protected $helpers = ['form'];  

    /**
     * creates a book data
     * 
     * @return string
     */
    public function update()
    {
        $b_book = model(BorrowedBookModel::class);
        $r_book = model(ReturnedBookModel::class);

        $rules = [
            'borrowed_book_id' => 'required',
            'book_id' => 'required',
            'student_id' => 'required',
        ];

        if ($this->validate($rules)) {
            $b_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'borrowed_book_id' => $this->request->getPost('borrowed_book_id'),
                'is_returned' => 1
            ]);

            $r_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'student_id' => $this->request->getPost('student_id'),
            ]);
            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/borrowed_books');
        }

        // return redirect()->to('/user_fines');
    }

    /**
     * creates a book data
     * 
     * @return string
     */
    public function delete()
    {
        $b_book = model(BorrowedBookModel::class);

        $rules = [
            'borrowed_book_id' => 'required',
            'book_id' => 'required',
            'student_id' => 'required',
        ];

        if ($this->validate($rules)) {
            $b_book->delete(['borrowed_book_id' => $this->request->getPost('borrowed_book_id')]);

            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/borrowed_books');
        }

        // return redirect()->to('/user_fines');
    }
}
