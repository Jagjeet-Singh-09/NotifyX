<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/api/Admin/register', 'Admin\AuthController::createUser');
$routes->post('/api/Admin/login', 'App\Admin\Controller\LoginRegister\AuthController::checkLogIn');

$routes->post('/api/Vendor/register', 'Vendor\VendorAuthController::createUser');
$routes->post('/api/Vendor/login', 'Vendor\VendorAuthController::checkLogIn');

$routes->post('/api/Admin/createAnnouncement', 'Admin\AnnouncementController::createAnnouncement');
$routes->delete('/api/Admin/deleteAnnouncement/(:num)', 'Admin\AnnouncementController::deleteAnnouncement/$1');
$routes->get('/api/Admin/getAllAnnouncement', 'Admin\AnnouncementController::getAllAnnouncement');
$routes->patch('/api/Admin/updateAnnouncement', 'Admin\AnnouncementController::updateAnnouncement');






