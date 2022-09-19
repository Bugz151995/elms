<?php

namespace App\Controllers;

use \App\Models\BookModel;
use CodeIgniter\I18n\Time;

class Book extends BaseController
{
    protected $helpers = ['form'];

    /**
     * creates a book data
     * 
     * @return string
     */
    public function create()
    {
        $book = model(BookModel::class);

        $rules = [
            'name' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'units' => 'required',
            'category' => 'required',
        ];

        if ($this->validate($rules)) {
            $book->save([
                'name' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'publish_date' => $this->request->getPost('publish_date'),
                'units' => $this->request->getPost('units'),
                'units_athand' => $this->request->getPost('units'),
                'category_id' => $this->request->getPost('category')
            ]);

            session()->setFlashdata('success', 'The book was successfully saved.');

            return redirect()->to('/registered_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }

    /**
     * edit a book data
     * 
     * @return string
     */
    public function update()
    {
        $book = model(BookModel::class);

        $rules = [
            'name' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'units' => 'required',
            'units_athand' => 'required',
            'category' => 'required',
        ];

        if ($this->validate($rules)) {
            $book->save([
                'book_id' => $this->request->getPost('book_id'),
                'name' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'publish_date' => $this->request->getPost('publish_date'),
                'units' => $this->request->getPost('units'),
                'units_athand' => $this->request->getPost('units_athand'),
                'category_id' => $this->request->getPost('category'),
            ]);

            session()->setFlashdata('success', 'The book was successfully saved.');

            return redirect()->to('/registered_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
    
    /**
     * deletes a book data
     * 
     * @return string
     */
    public function delete()
    {
        $book = model(BookModel::class);

        if ($this->validate(['book_id' => 'required'])) {
            $book->delete(['book_id' => $this->request->getPost('book_id')]);

            session()->setFlashdata('success', 'The book was successfully deleted.');

            session()->setFlashdata('warning', 'Please be cautious when deleting a data.');

            return redirect()->to('/registered_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }

    /**
     * creates a borrowed book data
     * 
     * @return string
     */
    public function borrow()
    {
        $time = new Time('now');
        $book = model(BookModel::class);
        $b_book = model(BorrowedBookModel::class);

        $rules = [
            'book_id' => 'required',
            'student_id' => 'required',
            'units_borrowed' => 'required'
        ];

        if ($this->validate($rules)) {
            $b_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'student_id' => $this->request->getPost('student_id'),
                'units_borrowed' => $this->request->getPost('units_borrowed'),
                'due_at' => $time->addDays(7)->toDateTimeString()
            ]);

            $book->save([
                'book_id' => $this->request->getPost('book_id'),
                'units_athand' => $this->request->getPost('units_athand') - $this->request->getPost('units_borrowed')
            ]);

            session()->setFlashdata('success', 'The book was successfully saved.');

            session()->setFlashdata('info', 'The book was saved as a borrowed book.');

            return redirect()->to('/registered_books');
        }

        return redirect()->back()->with('validation', $this->validator);
    }
}