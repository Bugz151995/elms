<?php

namespace App\Controllers;

use \App\Models\BookModel;
use \App\Models\BorrowedBookModel;
use \App\Models\ReturnedBookModel;
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
    public function showPage($page_name = "")
    {
        $uri = service('uri');
        $a_book = model(BookModel::class);
        $b_book = model(BorrowedBookModel::class);
        $r_book = model(ReturnedBookModel::class);
        $user = model(AccountModel::class);
        $fine = model(AccountFineModel::class);
        
        $path = $uri->getPath();

        switch ($page_name) {
            case 'home':
                return view($page_name, [
                    'path'  => $path
                ]);
                break;

            case 'registered_books':
                return view($page_name, [
                    'books' => $a_book->getBooks(),
                    'path'  => $path
                ]);
                break;

            case 'borrowed_books':
                return view($page_name, [
                    'books' => $b_book->getBooks(),
                    'path'  => $path
                ]);
                break;

            case 'returned_books':
                return view($page_name, [
                    'books' => $r_book->getBooks(),
                    'path'  => $path
                ]);
                break;

            case 'registered_users':
                return view($page_name, [
                    'users' => $user->getAccounts(),
                    'path'  => $path
                ]);
                break;

            case 'user_rankings':
                return view($page_name, [
                    'users' => $user->getRanks(),
                    'path'  => $path
                ]);
                break;

            case 'user_fines':
                return view($page_name, [
                    'fines' => $fine->getFines(),
                    'path'  => $path
                ]);
                break;
            default:
                return view('login');
                break;
        }
    }
}
