<?php

namespace App\Controllers;

use \App\Models\BookModel;
use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;
use \App\Models\CategoryModel;
use \App\Models\StudentModel;
use \App\Models\AccountModel;
use \App\Models\AccountFineModel;
use \App\Models\ClassModel;
use CodeIgniter\I18n\Time;

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
    session();
    $time = new Time('now');
    $uri = service('uri');
    $a_book = model(BookModel::class);
    $b_book = model(BorrowedBookModel::class);
    $r_book = model(ReturnedBookModel::class);
    $cat = model(CategoryModel::class);
    $student = model(StudentModel::class);
    $user = model(AccountModel::class);
    $fine = model(AccountFineModel::class);
    $class = model(ClassModel::class);

    $path = $uri->getPath();

    $path_data = ['path' => $path];
    $first_seg = ['page' => $uri->getSegment(1)];
    $a_book_data = ['books' => $a_book->getBooks()];
    $b_book_data = ['books' => $b_book->getBooks()];
    $r_book_data = ['books' => $r_book->getBooks()];
    $user_data = ['users' => $user->getAccounts()];
    $student_data = ['students' => $student->getStudents()];
    $fine_data = ['fines' => $fine->getFines()];
    $cat_data = ['categories' => $cat->getCategories()];
    $class_data = ['class' => $class->getClass()];
    $dash_count_data = [
      'total_students' => $student->countAll(),
      'total_books' => $a_book->countAll(),
      'total_bbooks' => $b_book->like('created_at', $time->toDateString())->countAllResults(),
      'total_rbooks' => $r_book->like('created_at', $time->toDateString())->countAllResults(),
    ];    
    $reports = [
      'bbooks_mm_report' => $b_book->getMonthlyReport(),
      'rbooks_mm_report' => $r_book->getMonthlyReport()
    ];

    switch ($page_name) {
      case 'home':
        return view($page_name, array_merge($path_data, $first_seg, $dash_count_data, $reports));
        break;

      case 'registered_books':
        return view($page_name, array_merge($first_seg, $path_data, $a_book_data, $cat_data));
        break;

      case 'borrowed_books':
        return view($page_name, array_merge($b_book_data, $first_seg, $path_data, $student_data));
        break;

      case 'returned_books':
        return view($page_name, array_merge($r_book_data, $first_seg, $path_data));
        break;

      case 'registered_users':
        return view($page_name, array_merge($user_data, $first_seg, $path_data, $class_data));
        break;

      case 'user_rankings':
        return view($page_name, array_merge($user_data, $first_seg, $path_data));
        break;

      case 'user_fines':
        return view($page_name, array_merge($fine_data, $first_seg, $path_data));
        break;

      default:
        return view('signin');
        break;
    }
  }
}
