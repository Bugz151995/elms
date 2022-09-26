<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class BorrowedBook extends BaseController
{
	protected $helpers = ['form'];

	public function create()
	{
		$borrowedbook_tbl = model(BorrowedBookModel::class);
		$book_tbl = model(BookModel::class);
		$qrcode_tbl = model(QRCodeModel::class);
		$time = new Time('now');

		$student_id = $this->request->getPost('student_id');
		$book = $book_tbl->getId($this->request->getPost('qrcode'));

		$qr = explode('-', $this->request->getPost('qrcode'));

		if ($student_id !== "" && $book['units_athand'] > 0 && $qr[0] === "B") {
			$qrcode_tbl->save(['qrcode' => 'IB-' . $time->timestamp]); //this is inserting

			$borrowedbook_tbl->save([
				'book_id' => $book['book_id'],
				'student_id' => $student_id,
				'qrcode_id' => $qrcode_tbl->getInsertID()
			]);

			$book_tbl->save([
				'book_id' => $book['book_id'],
				'units_athand' => $book['units_athand'] - 1
			]);

			session()->setFlashdata('success', 'A new book was borrowed, the data was successfully saved.');
			return 0;
		}

		if ($book['units_athand'] == 0) {
			session()->setFlashdata('warning', 'There is no units at hand.');
			return 0;
		}

		session()->setFlashdata('error', 'The scan failed, please fill up the Borrower field.');
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
