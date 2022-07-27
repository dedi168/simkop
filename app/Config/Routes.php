<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin,kasir']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin,kasir' ]);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin,kasir' ]); 

$routes->get('/simpanan', 'Simpanan::index', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/simpanan/(:num)', 'Simpanan::update/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/simpanan/(:num)', 'Simpanan::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/simpanan/delete/(:num)', 'Simpanan::delete/$1', ['filter' => 'role:admin,kasir' ]); 
 
$routes->get('/DetailSimpanan', 'DetailSimpanan::index', ['filter' => 'role:admin,kasir' ]);
$routes->get('/DetailSimpanan/(:num)', 'DetailSimpanan::update/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/DetailSimpanan/(:num)', 'DetailSimpanan::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/DetailSimpanan/delete/(:num)', 'DetailSimpanan::delete/$1', ['filter' => 'role:admin,kasir' ]); 

$routes->get('/pinjaman', 'Pinjaman::index', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/pinjaman/(:num)', 'Pinjaman::update/$1', ['filter' => 'role:admin,kasir' ]);  
$routes->get('/pinjaman/(:num)', 'Pinjaman::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/pinjaman/delete/(:num)', 'Pinjaman::delete/$1', ['filter' => 'role:admin,kasir' ]); 

$routes->get('/detailpinjaman', 'Detailpinjaman::index', ['filter' => 'role:admin,kasir' ]);
$routes->get('/detailpinjaman/(:num)', 'Detailpinjaman::update/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/detailpinjaman/(:num)', 'Detailpinjaman::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/detailpinjaman/delete/(:num)', 'Detailpinjaman::delete/$1', ['filter' => 'role:admin,kasir' ]); 

$routes->get('/deposito', 'Deposito::index', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/deposito/(:num)', 'Deposito::update/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/deposito/(:num)', 'Deposito::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/deposito/delete/(:num)', 'Deposito::delete/$1', ['filter' => 'role:admin,kasir' ]); 

$routes->get('/detaildeposito', 'Detaildeposito::index', ['filter' => 'role:admin,kasir' ]);
$routes->get('/detaildeposito/(:num)', 'Detaildeposito::update/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/detaildeposito/(:num)', 'Detaildeposito::delete/$1', ['filter' => 'role:admin,kasir' ]); 
$routes->get('/detaildeposito/delete/(:num)', 'Detaildeposito::delete/$1', ['filter' => 'role:admin,kasir' ]); 


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
