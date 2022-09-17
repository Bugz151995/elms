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
    $time_data = ['time' => $time];
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
        if ($slug !== false)
          $book_data = ['book' => $a_book->find($slug)];

        if ($slug !== false && $type === 'edit_book')
          return view('edit_b', array_merge($first_seg, $path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'delete_book')
          return view('delete_b', array_merge($first_seg, $path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'borrow_book')
          return view('borrow_b', array_merge($first_seg, $path_data, $book_data, $cat_data, $student_data));

        return view($page_name, array_merge($first_seg, $path_data, $a_book_data, $cat_data));
        break;

      case 'borrowed_books':
        if ($slug !== false) 
          $book_data = ['book' => $b_book->join('book_tbl', 'book_tbl.book_id = borrowed_book_tbl.book_id')->join('student_tbl', 'student_tbl.student_id = borrowed_book_tbl.student_id')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id')->find($slug)];

        if ($slug !== false && $type === 'edit_borrowed_book')
          return view('edit_bb', array_merge($first_seg, $path_data, $book_data, $cat_data, $student_data));

        if ($slug !== false && $type === 'return_borrowed_book')
          return view('update_bb', array_merge($first_seg, $path_data, $book_data, $cat_data, $time_data));

        if ($slug !== false && $type === 'delete_borrowed_book')
          return view('delete_bb', array_merge($first_seg, $path_data, $book_data, $cat_data));

        return view($page_name, array_merge($b_book_data, $first_seg, $path_data, $student_data));
        break;

      case 'returned_books':
        if ($slug !== false) 
          $book_data = ['book' => $r_book->join('book_tbl', 'book_tbl.book_id = returned_book_tbl.book_id')->join('student_tbl', 'student_tbl.student_id = returned_book_tbl.student_id')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id')->find($slug)];

        if ($slug !== false && $type === 'view_returned_book')
          return view('view_rb', array_merge($first_seg, $path_data, $book_data, $cat_data));

        if ($slug !== false && $type === 'delete_returned_book')
          return view('delete_rb', array_merge($first_seg, $path_data, $book_data, $cat_data));

        return view($page_name, array_merge($r_book_data, $first_seg, $path_data));
        break;

      case 'registered_users':
        if ($slug !== false) 
          $account_data = ['user' => $user->join('student_tbl', 'student_tbl.student_id = account_tbl.student_id')->find($slug)];

        if ($slug !== false && $type === 'edit_user')
          return view('edit_u', array_merge($first_seg, $path_data, $account_data, $cat_data, $class_data));

        if ($slug !== false && $type === 'delete_user')
          return view('delete_u', array_merge($first_seg, $path_data, $account_data, $cat_data, $class_data));

        return view($page_name, array_merge($user_data, $first_seg, $path_data, $class_data));
        break;

      case 'user_rankings':
        return view($page_name, array_merge($user_data, $first_seg, $path_data));
        break;

      case 'user_fines':
        if ($slug !== false)
          $fine_data = ['fine' => $fine->join('student_tbl', 'student_tbl.student_id = account_fine_tbl.student_id')->join('account_tbl', 'account_tbl.student_id = student_tbl.student_id')->join('class_tbl', 'class_tbl.class_id = student_tbl.class_id')->find($slug)];

        if ($slug !== false && $type === 'view_user_fine')
          return view('view_uf', array_merge($fine_data, $first_seg, $path_data, $class_data));

        if ($slug !== false && $type === 'delete_user_fine')
          return view('delete_uf', array_merge($fine_data, $first_seg, $path_data, $class_data));

        return view($page_name, array_merge($fine_data, $first_seg, $path_data));
        break;

      default:
        return view('signin');
        break;
    }
  }
}
