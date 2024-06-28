<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::login', ['as' => 'login', 'filter' => 'guest']);
$routes->post('login', 'AuthController::attemptLogin', ['as' => 'attemptLogin', 'filter' => 'guest']);

$routes->get('logout', 'AuthController::logout', ['as' => 'logout', 'filter' => 'auth']);
$routes->get('dashboard', 'DashboardController::index', ['as' => 'dashboard', 'filter' => 'auth']);

$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'UserController::index', ['as' => 'user']);
    $routes->get('create', 'UserController::create', ['as' => 'createUser']);
    $routes->post('store', 'UserController::store', ['as' => 'storeUser']);
    $routes->get('edit/(:num)', 'UserController::edit/$1', ['as' => 'editUser']);
    $routes->post('update/(:num)', 'UserController::update/$1', ['as' => 'updateUser']);
    $routes->post('delete/(:num)', 'UserController::delete/$1', ['as' => 'deleteUser']);
});

$routes->group('employees', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'EmployeeController::index', ['as' => 'employeeList']);
    $routes->get('create', 'EmployeeController::create', ['as' => 'createEmployee']);
    $routes->post('store', 'EmployeeController::store', ['as' => 'storeEmployee']);
    $routes->get('edit/(:num)', 'EmployeeController::edit/$1', ['as' => 'editEmployee']);
    $routes->post('update/(:num)', 'EmployeeController::update/$1', ['as' => 'updateEmployee']);
    $routes->post('delete/(:num)', 'EmployeeController::delete/$1', ['as' => 'deleteEmployee']);
});

