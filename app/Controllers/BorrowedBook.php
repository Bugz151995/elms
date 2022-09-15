<?php

namespace App\Controllers;

use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;
use \App\Models\AccountFineModel;

class BorrowedBook extends BaseController
{
    protected $helpers = ['form'];  

    /**
     * updated a borrowed book data
     * 
     * @return string
     */
    public function update()
    {
        $b_book = model(BorrowedBookModel::class);
        $r_book = model(ReturnedBookModel::class);
        $fine = model(AccountFineModel::class);

        if ($this->validate(['student_id' => 'required'])) {
            $b_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'borrowed_book_id' => $this->request->getPost('borrowed_book_id')
            ]);

            $r_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'student_id' => $this->request->getPost('student_id'),
                'units' => $this->request->getPost('unitsReturned'),
            ]);

            $amount = $this->request->getPost('amount');
            if (isset($amount)) {
                $fine->save([
                    'amount_paid' => $this->request->getPost('amount'),
                    'or_no' => $this->request->getPost('or_no'),
                    'student_id' => $this->request->getPost('student_id')
                ]);
            }

            session()->setFlashdata('success', 'The book was successfully saved.');

            return redirect()->to('/borrowed_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }

    /**
     * deletes a borrowed book data
     * 
     * @return string
     */
    public function delete()
    {
        $b_book = model(BorrowedBookModel::class);

        if ($this->validate(['student_id' => 'required'])) {
            $b_book->delete(['borrowed_book_id' => $this->request->getPost('borrowed_book_id')]);

            session()->setFlashdata('success', 'The book was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/borrowed_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}
