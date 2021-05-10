<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
$routes->get('test', 'Contractor\RegistrationController::testMethod');

$routes->get('/', 'Authentication\AuthController::index');
$routes->get('login', 'Authentication\AuthController::login');
$routes->post('login', 'Authentication\AuthController::loginAction');
$routes->get('logout', 'Authentication\AuthController::logout');
$routes->get('home', 'Authentication\AuthController::index');

$routes->get('contractor-registration', 'Contractor\RegistrationController::index');
$routes->get('temp-contractor-registration', 'Contractor\RegistrationController::tempRegistration');
$routes->post('contractor-registration', 'Contractor\RegistrationController::registrationAction');
$routes->get('contractor-update', 'Contractor\RegistrationController::update');
$routes->post('contractor-update', 'Contractor\RegistrationController::updateAction');
$routes->get('contractor-search', 'Contractor\ContractorController::contractorSearch');

$routes->get('contract-registration', 'Contract\RegistrationController::index');
$routes->get('temp-contract-registration', 'Contract\RegistrationController::tempRegistration');
$routes->post('contract-registration', 'Contract\RegistrationController::registrationAction');
$routes->get('contract-update', 'Contract\RegistrationController::update');
$routes->post('contract-update', 'Contract\RegistrationController::updateAction');
$routes->get('contract-search', 'Contract\ContractController::contractSearch');