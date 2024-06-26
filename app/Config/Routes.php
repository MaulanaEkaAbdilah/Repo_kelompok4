<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Annex', 'Layout::index');
$routes->get('Mahasiswa', 'Mahasiswa::index');
$routes->get('Mahasiswa/ambildata', 'Mahasiswa::ambildata');
$routes->get('Mahasiswa/formtambah', 'Mahasiswa::formtambah');


