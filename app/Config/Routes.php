<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/* Not Auth */
// Home
$routes->get('/', 'HomeController::index');
$routes->post('/', 'HomeController::kuisioner');

$routes->group('', ['filter' => 'notauth'], static function ($routes) {
    // Login
    $routes->get('login', 'HomeController::login');
    $routes->post('login', 'HomeController::loginproc');
    // Register
    $routes->get('register', 'HomeController::register');
    $routes->post('register', 'HomeController::registerproc');
});

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    // Logout
    $routes->get('logout', 'HomeController::logout');
    /* Auth */
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('rubah-password/(:segment)', 'DashboardController::change/$1');
    $routes->post('rubah-password', 'DashboardController::updatechange');
    // HomePage - Halaman Utama
    $routes->get('halaman-utama', 'HalamanUtamaController::index');
    $routes->add('halaman-utama/save', 'HalamanUtamaController::save');
    // User - Pengguna
    $routes->get('pengguna', 'PenggunaController::index');
    $routes->get('pengguna/create', 'PenggunaController::create');
    $routes->post('pengguna/save', 'PenggunaController::save');
    $routes->get('pengguna/(:segment)/edit', 'PenggunaController::edit/$1');
    $routes->post('pengguna/(:segment)/update', 'PenggunaController::update/$1');
    $routes->get('pengguna/(:segment)/delete', 'PenggunaController::delete/$1');
    // Customer - Pelanggan
    $routes->get('pelanggan', 'PelangganController::index');
    $routes->get('pelanggan/(:segment)/delete', 'PelangganController::delete/$1');
    // Pertanyaan
    $routes->get('pertanyaan', 'PertanyaanController::index');
    $routes->get('pertanyaan/(:segment)/edit', 'PertanyaanController::edit/$1');
    $routes->post('pertanyaan/(:segment)/update', 'PertanyaanController::update/$1');
    // Hasil Kuisioner 
    $routes->get('hasil-kuisioner', 'HasilKuisionerController::index');
    $routes->post('hasil-kuisioner', 'HasilKuisionerController::filter');
    $routes->get('hasil-kuisioner/(:segment)/(:segment)', 'HasilKuisionerController::show/$1/$2');
    $routes->post('hasil-kuisioner/print', 'HasilKuisionerController::print');
});
