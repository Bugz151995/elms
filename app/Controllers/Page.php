<?php

namespace App\Controllers;

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
    $book_tbl = model(BookModel::class);
    $borrowedbook_tbl = model(BorrowedBookModel::class);
    $returnedbook_tbl = model(ReturnedBookModel::class);
    $category_tbl = model(CategoryModel::class);
    $student_tbl = model(StudentModel::class);
    $account_tbl = model(AccountModel::class);
    $accountfine_tbl = model(AccountFineModel::class);
    $studentrank_tbl = model(StudentRankModel::class);
    $class_tbl = model(ClassModel::class);

    $path = $uri->getPath();

    $path_data = ['path' => $path];
    $first_seg = ['page' => $uri->getSegment(1)];
    $book_data = ['books' => $book_tbl->getBooks()];
    $borrowedbook_data = ['books' => $borrowedbook_tbl->getBooks()];
    $returnedbook_data = ['books' => $returnedbook_tbl->getBooks()];
    $account_data = ['users' => $account_tbl->getAccounts()];
    $student_data = ['students' => $student_tbl->getStudents()];
    $accountfine_data = ['fines' => $accountfine_tbl->getFines()];
    $category_data = ['categories' => $category_tbl->getCategories()];
    $class_data = ['class' => $class_tbl->getClass()];
    $studentrank_data = ['students' => $studentrank_tbl->getRankings()];
    $dash_count_data = [
      'total_students' => $student_tbl->countAll(),
      'total_books' => $book_tbl->countAll(),
      'total_bbooks' => $borrowedbook_tbl->like('created_at', $time->toDateString())->countAllResults(),
      'total_rbooks' => $returnedbook_tbl->like('created_at', $time->toDateString())->countAllResults(),
    ];    
    $reports = [
      'bbooks_mm_report' => $borrowedbook_tbl->getMonthlyReport(),
      'rbooks_mm_report' => $returnedbook_tbl->getMonthlyReport()
    ];

    switch ($page_name) {
      case 'home':
        return view($page_name, array_merge($path_data, $first_seg, $dash_count_data, $reports));
        break;

      case 'registered_books':
        return view($page_name, array_merge($first_seg, $path_data, $book_data, $category_data));
        break;

      case 'borrowed_books':
        return view($page_name, array_merge($borrowedbook_data, $first_seg, $path_data, $student_data));
        break;

      case 'returned_books':
        return view($page_name, array_merge($returnedbook_data, $first_seg, $path_data));
        break;

      case 'registered_users':
        return view($page_name, array_merge($account_data, $first_seg, $path_data, $class_data));
        break;

      case 'user_rankings':
        return view($page_name, array_merge($account_data, $first_seg, $path_data, $studentrank_data));
        break;

      case 'user_fines':
        return view($page_name, array_merge($accountfine_data, $first_seg, $path_data));
        break;

      default:
        return view('signin');
        break;
    }
  }
}
