<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('mongo/(:num)', 'Home::test/$1');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('BlogController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

$routes->get('/', 'IndexController::index'); // Ana sayfa
$routes->get('/logout', 'HeaderController::logout'); // Çıkış işlemi

$routes->get('register', 'RegisterController::index');
$routes->post('register', 'RegisterController::store');
$routes->get('login', 'LoginController::index');
$routes->post('login/authenticate', 'LoginController::authenticate');

$routes->get('blog/comments/(:num)', 'BlogController::getComments/$1');

$routes->get('blog', 'BlogController::blog');

$routes->post('/add_comment', 'BlogController::addComment');

$routes->get('blog/edit/(:num)', 'BlogController::edit/$1');
$routes->get('//delete/(:num)', 'BlogController::delete/$1');
$routes->post('blog/addComment', 'BlogController::addComment');
$routes->get('blog/deleteComment/(:num)', 'BlogController::deleteComment/$1');
$routes->get('blog/editComment/(:num)', 'BlogController::editComment/$1');
$routes->post('blog/editComment/(:num)', 'BlogController::editComment/$1');

$routes->get('profile', 'ProfileController::index');
$routes->post('profile/uploadPhoto', 'ProfileController::uploadPhoto');






//Admin Paneli İşlemleri
$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('user_list', 'AdminController::userList');
    $routes->get('create_user', 'AdminController::createUser');
    $routes->post('saveUser', 'AdminController::saveUser');
    $routes->get('edit_user/(:num)', 'AdminController::editUser/$1');
    $routes->post('updateUser/(:num)', 'AdminController::updateUser/$1');
    $routes->get('deleteUser/(:num)', 'AdminController::deleteUser/$1');
    $routes->get('role_list', 'AdminController::roles');
    $routes->get('create_role', 'AdminController::createRole');
    $routes->post('saveRole', 'AdminController::saveRole');
    $routes->get('editRole/(:num)', 'AdminController::editRole/$1');
    $routes->post('updateRole/(:num)', 'AdminController::updateRole/$1');
    $routes->get('deleteRole/(:num)', 'AdminController::deleteRole/$1');
});

