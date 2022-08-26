<?php

namespace App\Controllers;

use \App\Models\BookModel;

class Book extends BaseController
{
    protected $helpers = ['form'];
    
    /**
     * @param Type|null $var
     * 
     * @return [type]
     */
    public function lookup($page_name, $slug = false)
    {        
        $uri = service('uri');
        $a_book = model(BookModel::class);
        $cat = model(CategoryModel::class);

        $path = $uri->getPath();

        return view($page_name, [
            'books' => $a_book->getBooks(),
            'book_found' => $a_book->find($slug),
            'categories' => $cat->getCategories(),
            'path'  => $path
        ]);
    }

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
                'category_id' => $this->request->getPost('category'),
            ]);

            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/home');
        }

        // return redirect()->to('/user_fines');
    }

    /**
     * creates a book data
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
            'category' => 'required',
        ];

        if ($this->validate($rules)) {
            $book->save([
                'book_id' => $this->request->getPost('book_id'),
                'name' => $this->request->getPost('name'),
                'author' => $this->request->getPost('author'),
                'publish_date' => $this->request->getPost('publish_date'),
                'units' => $this->request->getPost('units'),
                'category_id' => $this->request->getPost('category'),
            ]);

            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_books');
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
        $book = model(BookModel::class);

        $rules = [
            'name' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'units' => 'required',
            'category' => 'required',
        ];

        if ($this->validate($rules)) {
            $book->save(['book_id' => $this->request->getPost('book_id')]);

            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_books');
        }

        // return redirect()->to('/user_fines');
    }

    /**
     * creates a book data
     * 
     * @return string
     */
    public function borrow()
    {
        $b_book = model(BorrowedBookModel::class);

        $rules = [
            'book_id' => 'required',
            'student_id' => 'required'
        ];

        if ($this->validate($rules)) {
            $b_book->save([
                'book_id' => $this->request->getPost('book_id'),
                'student_id' => $this->request->getPost('student_id')
            ]);

            // test route if success
            // TODO: remove later
            // add success data to the page when it reloads and capture it through a js plguin of success popup
            return redirect()->to('/registered_books');
        }

        // return redirect()->to('/user_fines');
    }
}
