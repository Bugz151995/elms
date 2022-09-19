<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Page::showPage');
$routes->get('signout', 'Account::signout');
$routes->post('signin', 'Account::signin');
$routes->get('home', 'Page::showPage/home');
$routes->get('registered_books', 'Page::showPage/registered_books');
$routes->get('registered_books/borrow_book/(:num)', 'Page::showPage/registered_books/borrow_book/$1');

$routes->get('borrowed_books', 'Page::showPage/borrowed_books');
$routes->get('borrowed_books/edit_borrowed_book/(:num)', 'Page::showPage/borrowed_books/edit_borrowed_book/$1');
$routes->get('borrowed_books/return_borrowed_book/(:num)', 'Page::showPage/borrowed_books/return_borrowed_book/$1');
$routes->get('borrowed_books/delete_borrowed_book/(:num)', 'Page::showPage/borrowed_books/delete_borrowed_book/$1');

$routes->get('returned_books', 'Page::showPage/returned_books');
$routes->get('returned_books/view_returned_book/(:num)', 'Page::showPage/returned_books/view_returned_book/$1');
$routes->get('returned_books/delete_returned_book/(:num)', 'Page::showPage/returned_books/delete_returned_book/$1');

$routes->get('registered_users', 'Page::showPage/registered_users');
$routes->get('registered_users/edit_user/(:num)', 'Page::showPage/registered_users/edit_user/$1');
$routes->get('registered_users/delete_user/(:num)', 'Page::showPage/registered_users/delete_user/$1');

$routes->get('user_rankings', 'Page::showPage/user_rankings');

$routes->get('user_fines', 'Page::showPage/user_fines');
$routes->get('user_fines/view_user_fine/(:num)', 'Page::showPage/user_fines/view_user_fine/$1');
$routes->get('user_fines/delete_user_fine/(:num)', 'Page::showPage/user_fines/delete_user_fine/$1');

$routes->post('registered_books/create', 'Book::create');
$routes->post('registered_books/update', 'Book::update');
$routes->post('registered_books/delete', 'Book::delete');
$routes->post('registered_books/borrow', 'Book::borrow');

$routes->post('borrowed_books/update', 'BorrowedBook::update');
$routes->post('borrowed_books/delete', 'BorrowedBook::delete');

$routes->post('returned_books/delete', 'ReturnedBook::delete');

$routes->post('user_fines/delete', 'AccountFine::delete');

$routes->post('registered_users/create', 'Account::create');
$routes->post('registered_users/update', 'Account::update');
$routes->post('registered_users/delete', 'Account::delete');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
