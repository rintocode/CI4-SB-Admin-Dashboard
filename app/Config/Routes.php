<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->group('admin', function ($routes) {
	service('auth')->routes($routes);
	$routes->get('/', 'Admin\Home::index');
	$routes->add('buttons', 'Admin\Buttons::index');
	$routes->add('utilities-color', 'Admin\UColor::index');
	$routes->add('utilities-border', 'Admin\UBorder::index');
	$routes->add('utilities-animation', 'Admin\UAnimation::index');
	$routes->add('utilities-other', 'Admin\UOther::index');
	$routes->add('charts', 'Admin\Charts::index');
	$routes->get('tables', 'Admin\Tables::index');
	$routes->post('data', 'Admin\Tables::data_sample');
});







