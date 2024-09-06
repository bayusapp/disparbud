<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('/Auth/login', 'Auth::login');

$routes->get('/Dashboard', 'Dashboard::index');

$routes->get('/MasterData/COA', 'MasterData::COA');
$routes->post('/MasterData/simpanCOA', 'MasterData::simpanCOA');
