<?php

namespace App\Controllers;

use \App\Models\ReturnedBookModel;

class ReturnedBook extends BaseController
{
    protected $helpers = ['form'];  

    public function create()
	{
		$returnedbook_tbl = model(ReturnedBookModel::class);
		$borrowedbook_tbl = model(BorrowedBookModel::class);
		$book_tbl = model(BookModel::class);
		$studentrank_tbl = model(StudentRankModel::class);

		$borrowedbook = $borrowedbook_tbl->getId($this->request->getPost('qrcode'));

        $qr = explode('-', $this->request->getPost('qrcode'));

        if ($borrowedbook['units'] > $borrowedbook['units_athand'] && $qr[0] !== "B") {
            $borrowedbook_tbl->save([
                'borrowed_book_id' => $borrowedbook['borrowed_book_id'],
                'is_returned' => '1'
            ]);           
    
            $book_tbl->save([
                'book_id' => $borrowedbook['book_id'],
                'units_athand' => $borrowedbook['units_athand'] + 1
            ]);

            $returnedbook_tbl->save([
                'book_id' => $borrowedbook['book_id'],
                'student_id' => $borrowedbook['student_id'],
            ]);

            $studentrank_tbl->save([
                'student_id' => $borrowedbook['student_id']
            ]);

            session()->setFlashdata('success', 'The book was returned, the data was successfully saved.');
            return 0;
        }

        if($qr[0] === "B") {
            session()->setFlashdata('error', 'Invalid QR Code.');
            return 0;
        }
        
        session()->setFlashdata('error', 'The scan failed, you cannot return any more book because units at hand are maxed out.');
	}

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
