<?php

namespace App\Controllers;

use \App\Models\BookModel;
use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;
use \App\Models\CategoryModel;
use \App\Models\AccountModel;
use \App\Models\AccountFineModel;
use \App\Models\ClassModel;

class Page extends BaseController
{
  protected $helpers = ['form'];

  /**
   * shows the page specified in the router
   * @param string $page_name
   * 
   * @return string
   */
  public function showPage($page_name = "", $type = false, $slug = false)
  {
    $uri = service('uri');
    $a_book = model(BookModel::class);
    $b_book = model(BorrowedBookModel::class);
    $r_book = model(ReturnedBookModel::class);
    $cat = model(CategoryModel::class);
    $user = model(AccountModel::class);
    $fine = model(AccountFineModel::class);
    $class = model(ClassModel::class);

    $path = $uri->getPath();

    $path_data = ['path' => $path];
    $a_book_data = ['books' => $a_book->getBooks()];
    $b_book_data = ['books' => $b_book->getBooks()];
    $r_book_data = ['books' => $r_book->getBooks()];
    $user_data = ['users' => $user->getAccounts()];
    $fine_data = ['fines' => $fine->getFines()];
    $cat_data = ['categories' => $cat->getCategories()];
    $class_data = ['class' => $class->getClass()];

    switch ($page_name) {
      case 'home':
        return view($page_name, $path_data);
        break;

      case 'registered_books':
        if ($slug !== false)
          $book_data = ['book' => $a_book->find($slug)];

        if ($slug !== false && $type === 'edit_book')
          return view('edit_b', array_merge($path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'delete_book')
          return view('delete_b', array_merge($path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'borrow_book')
          return view('borrow_b', array_merge($path_data, $book_data, $cat_data));

        return view($page_name, array_merge($path_data, $a_book_data, $cat_data));
        break;

      case 'borrowed_books':
        if ($slug !== false) 
          $book_data = ['book' => $b_book->join('book_tbl', 'book_tbl.book_id = borrowed_book_tbl.book_id')->join('student_tbl', 'student_tbl.student_id = borrowed_book_tbl.student_id')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id')->find($slug)];

        if ($slug !== false && $type === 'edit_borrowed_book')
          return view('edit_bb', array_merge($path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'return_borrowed_book')
          return view('update_bb', array_merge($path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'delete_borrowed_book')
          return view('delete_bb', array_merge($path_data, $book_data, $cat_data));

        return view($page_name, array_merge($b_book_data, $path_data));
        break;

      case 'returned_books':
        return view($page_name, array_merge($r_book_data, $path_data));
        break;

      case 'registered_users':
        if ($slug !== false) 
          $account_data = ['user' => $user->join('student_tbl', 'student_tbl.student_id = account_tbl.student_id')->find($slug)];

        if ($slug !== false && $type === 'edit_user')
          return view('edit_u', array_merge($path_data, $account_data, $cat_data, $class_data));

        if ($slug !== false && $type === 'delete_user')
          return view('delete_u', array_merge($path_data, $account_data, $cat_data, $class_data));

        return view($page_name, array_merge($user_data, $path_data, $class_data));
        break;

      case 'user_rankings':
        return view($page_name, array_merge($user_data, $path_data));
        break;

      case 'user_fines':
        return view($page_name, array_merge($fine_data, $path_data));
        break;

      default:
        return view('login');
        break;
    }
  }
}
