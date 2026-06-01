<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/api/Admin/register', '\App\Admin\Controller\LoginRegister\AuthController::createUser');
$routes->post('/api/Admin/login', '\App\Admin\Controller\LoginRegister\AuthController::checkLogIn');
$routes->post('/api/Admin/createPredefinedGroups', '\App\Admin\Controller\Groups\GroupController::createPreDefinedGroups');

$routes->post('/api/Vendor/register', '\App\Vendor\Controller\LoginRegister\VendorAuthController::createUser');
$routes->post('/api/Vendor/login', '\App\Vendor\Controller\LoginRegister\VendorAuthController::checkLogIn');
$routes->post('/api/Vendor/login', '\App\Vendor\Controller\LoginRegister\VendorAuthController::checkLogIn');
$routes->get('/api/Vendor/getAllAnnouncement', '\App\Vendor\Controller\Announcement\AnnouncementController::getAllAnnouncement');


$routes->post('/api/franchise/register', '\App\Franchise\Controllers\LoginRegister\FranchiseAuthController::createUser');
$routes->post('/api/franchise/login', '\App\Franchise\Controllers\LoginRegister\FranchiseAuthController::checkLogIn');
$routes->get('/api/franchise/getAllAnnouncement', '\App\Franchise\Controllers\Announcement\AnnouncementController::getAllAnnouncement');


$routes->post('/api/Admin/createAnnouncement', '\App\Admin\Controller\Annoucement\AnnouncementController::createAnnouncement');
$routes->post('/api/Admin/deleteAnnouncement/(:num)', '\App\Admin\Controller\Annoucement\AnnouncementController::deleteAnnouncement/$1');
$routes->get('/api/Admin/getAllAnnouncement', '\App\Admin\Controller\Annoucement\AnnouncementController::getAllAnnouncement');
$routes->post('/api/Admin/updateAnnouncement', '\App\Admin\Controller\Annoucement\AnnouncementController::updateAnnouncement');






