<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/api/Admin/register', 'Admin\AuthController::createUser');
$routes->post('/api/Admin/login', 'Admin\AuthController::checkLogIn');

