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
// $routes->setAutoRoute(true);

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

$routes->match(['get', 'post'], '/', 'Home::index');
$routes->match(['get', 'post'], 'unit_edit/(:num)', 'Home::edit_unit/$1');
$routes->get('/(:num)', 'Home::delete_unit/$1');

$routes->match(['get', 'post'], 'item', 'Home::item');
$routes->match(['get', 'post'], 'item_edit/(:num)', 'Home::edit_item/$1');
$routes->get('item/(:num)', 'Home::delete_item/$1');

$routes->match(['get', 'post'], 'product', 'Home::product');
$routes->match(['get', 'post'], 'pro_edit/(:num)', 'Home::edit_product/$1');
$routes->get('product/(:num)', 'Home::delete_product/$1');

$routes->match(['get', 'post'], 'supplier', 'Home::supplier');
$routes->match(['get', 'post'], 'sup_edit/(:num)', 'Home::edit_supplier/$1');
$routes->get('supplier/(:num)', 'Home::delete_supplier/$1');

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
