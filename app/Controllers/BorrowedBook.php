<?php

namespace App\Controllers;

class BorrowedBook extends BaseController
{
    protected $helpers = ['form'];  

    public function create()
    {
        $borrowedbook_tbl = model(BorrowedBookModel::class);
        
    }

    /**
     * updated a borrowed book data
     * 
     * @return string
     */
    public function update()
    {
        $borrowedbook_tbl = model(BorrowedBookModel::class);
        $returnedbook_tbl = model(ReturnedBookModel::class);
        $accountfine_tbl = model(Accountaccountfine_tblModel::class);

        if ($this->validate(['student_id' => 'required'])) {
            $borrowedbook_tbl->save([
                'book_id' => $this->request->getPost('book_id'),
                'borrowed_book_id' => $this->request->getPost('borrowed_book_id')
            ]);

            $returnedbook_tbl->save([
                'book_id' => $this->request->getPost('book_id'),
                'student_id' => $this->request->getPost('student_id'),
                'units' => $this->request->getPost('unitsReturned'),
            ]);

            $amount = $this->request->getPost('amount');
            if (isset($amount)) {
                $accountfine_tbl->save([
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
        $borrowedbook_tbl = model(BorrowedBookModel::class);

        if ($this->validate(['student_id' => 'required'])) {
            $borrowedbook_tbl->delete(['borrowed_book_id' => $this->request->getPost('borrowed_book_id')]);

            session()->setFlashdata('success', 'The book was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/borrowed_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}
