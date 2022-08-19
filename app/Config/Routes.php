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
$routes->get('/', 'Home::index');

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

$routes->get('login', 'AuthController::index', ['as' => 'login.page']);
$routes->post('login', 'AuthController::login', ['as' => 'auth.login']);

$routes->get('dashboard', 'PageController::dashboard', ['as' => 'dashboard']);

$routes->get('users', 'UserController::index', ['as' => 'users.index']);
$routes->get('users/create', 'UserController::create', ['as' => 'users.create']);
$routes->get('users/(:num)', 'UserController::detail/$1', ['as' => 'users.view']);
$routes->post('users/create', 'UserController::store', ['as' => 'users.store']);

$routes->get('groups', 'GroupController::index', ['as' => 'groups.index']);
$routes->get('groups/create', 'GroupController::create', ['as' => 'groups.create']);
$routes->get('groups/(:num)', 'GroupController::detail/$1', ['as' => 'groups.view']);
$routes->post('groups/create', 'GroupController::store', ['as' => 'groups.store']);

$routes->get('daily-checklist', 'ChecklistController::index', ['as' => 'checklist.index']);
$routes->get('daily-checklist/create', 'ChecklistController::create', ['as' => 'checklist.create']);
$routes->get('daily-checklist/(:num)', 'ChecklistController::detail/$1', ['as' => 'checklist.view']);
$routes->post('daily-checklist/create', 'ChecklistController::store', ['as' => 'checklist.store']);

$routes->get('logs', 'LogController::index', ['as' => 'logs.index']);