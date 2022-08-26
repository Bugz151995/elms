<?php

namespace App\Controllers;

use \App\Models\BookModel;
use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;
use \App\Models\CategoryModel;
use \App\Models\AccountModel;
use \App\Models\AccountFineModel;

class Page extends BaseController
{
  protected $helpers = ['form'];

  /**
   * shows the page specified in the router
   * @param string $page_name
   * 
   * @return string
   */
  public function showPage($page_name = "", $slug = false)
  {
    $uri = service('uri');
    $a_book = model(BookModel::class);
    $b_book = model(BorrowedBookModel::class);
    $r_book = model(ReturnedBookModel::class);
    $cat = model(CategoryModel::class);
    $user = model(AccountModel::class);
    $fine = model(AccountFineModel::class);

    $path = $uri->getPath();

    $path_data = ['path' => $path];
    $a_book_data = ['books' => $a_book->getBooks()];
    $b_book_data = ['books' => $b_book->getBooks()];
    $r_book_data = ['books' => $r_book->getBooks()];
    $user_data = ['users' => $user->getAccounts()];
    $fine_data = ['fines' => $fine->getFines()];
    $cat_data = ['categories' => $cat->getCategories()];

    switch ($page_name) {
      case 'home':
        return view($page_name, $path_data);
        break;

      case 'registered_books':
        if ($slug !== false) {
          return view('edit_rb', array_merge($path_data, ['book' => $a_book->find($slug)], $cat_data));
        }

        return view($page_name, array_merge($path_data, $a_book_data, $cat_data));
        break;

      case 'borrowed_books':
        return view($page_name, array_merge($b_book_data, $path_data));
        break;

      case 'returned_books':
        return view($page_name, array_merge($r_book_data, $path_data));
        break;

      case 'registered_users':
        return view($page_name, array_merge($user_data, $path_data));
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
