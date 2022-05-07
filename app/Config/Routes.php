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
$routes->group('/', function ($routes) {
  $routes->get('', 'User\Home::index');
  $routes->get('login', 'Auth::index');
  $routes->get('logout', 'Auth::logout');
  $routes->post('login/process', 'Auth::login');
});

$routes->group('admin',['filter' => 'userAuth'], function ($routes) {
  $routes->get('', 'Admin\AdminHome::index');

  $routes->group('user', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\UserList::editData/$1');
    $routes->post('add', 'Admin\UserList::addData');
    $routes->get('delete/(:any)', 'Admin\UserList::deleteData/$1');
    $routes->get('', 'Admin\UserList::index');
  });

  $routes->group('harga', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\Kriteria\KriteriaHargaList::editData/$1');
    $routes->post('add', 'Admin\Kriteria\KriteriaHargaList::addData');
    $routes->get('delete/(:any)', 'Admin\Kriteria\KriteriaHargaList::deleteData/$1');
    $routes->get('', 'Admin\Kriteria\KriteriaHargaList::index');
  }); 

  $routes->group('ram', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\Kriteria\KriteriaRamList::editData/$1');
    $routes->post('add', 'Admin\Kriteria\KriteriaRamList::addData');
    $routes->get('delete/(:any)', 'Admin\Kriteria\KriteriaRamList::deleteData/$1');
    $routes->get('', 'Admin\Kriteria\KriteriaRamList::index');
  }); 

  $routes->group('gpu', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\Kriteria\KriteriaGpuList::editData/$1');
    $routes->post('add', 'Admin\Kriteria\KriteriaGpuList::addData');
    $routes->get('delete/(:any)', 'Admin\Kriteria\KriteriaGpuList::deleteData/$1');
    $routes->get('', 'Admin/Kriteria/KriteriaGpuList::index');
  }); 

  $routes->group('memori', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\Kriteria\KriteriaMemoriList::editData/$1');
    $routes->post('add', 'Admin\Kriteria\KriteriaMemoriList::addData');
    $routes->get('delete/(:any)', 'Admin\Kriteria\KriteriaMemoriList::deleteData/$1');
    $routes->get('', 'Admin/Kriteria/KriteriaMemoriList::index');
  }); 

  $routes->group('processor', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\Kriteria\KriteriaProcessorList::editData/$1');
    $routes->post('add', 'Admin\Kriteria\KriteriaProcessorList::addData');
    $routes->get('delete/(:any)', 'Admin\Kriteria\KriteriaProcessorList::deleteData/$1');
    $routes->get('', 'Admin/Kriteria/KriteriaProcessorList::index');
  }); 

  $routes->group('laptop', function ($routes) {
    $routes->post('edit/(:any)', 'Admin\LaptopList::editData/$1');
    $routes->post('add', 'Admin\LaptopList::addData');
    $routes->get('delete/(:any)', 'Admin\LaptopList::deleteData/$1');
    $routes->get('', 'Admin\LaptopList::index');
  });
});



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
