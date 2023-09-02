<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Keuangan::index', ['filter' => 'login']);
$routes->get('/deposit', 'Keuangan::deposit', ['filter' => 'login']);
$routes->post('/deposit/tambah', 'Keuangan::tambahDeposit', ['filter' => 'login']);
$routes->get('/pengeluaran', 'Keuangan::pengeluaran', ['filter' => 'login']);
$routes->post('/pengeluaran/tambah', 'Keuangan::tambahPengeluaran', ['filter' => 'login']);

$routes->get('/celengan', 'Keuangan::celenganIndex', ['filter' => 'login']);
$routes->post('/celengan/deposit', 'Keuangan::celenganDeposit', ['filter' => 'login']);
$routes->post('/celengan/penarikan', 'Keuangan::celenganPenarikan', ['filter' => 'login']);


$routes->get('/agenda', 'Agenda::index', ['filter' => 'login']);
$routes->get('/posts', 'Posts::index', ['filter' => 'login']);
$routes->get('/laporan-pemasukan', 'Laporan::index', ['filter' => 'login']);
$routes->get('/laporan-pengeluaran', 'Laporan::index', ['filter' => 'login']);
$routes->get('/profil', 'Profil::index', ['filter' => 'login']);

$routes->get('/query/getAgenda', 'Agenda::getAgenda', ['filter' => 'login']);
$routes->get('/api/notif', 'Api::notification');

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
