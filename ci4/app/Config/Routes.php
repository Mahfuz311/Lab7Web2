<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/page/tos', 'Page::tos');

// Rute untuk Login dan Logout
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

// Grup rute admin dengan filter 'auth' (Hanya gunakan satu grup admin saja)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Artikel::admin_index'); // Jika mengakses /admin, arahkan ke daftar artikel admin
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});