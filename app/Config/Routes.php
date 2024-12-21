<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// errors
$routes->get('errors/forbidden', 'ErrorsController::forbidden');

// Sign up
$routes->get('/signup', 'Signup::index');
$routes->match(['GET', 'POST'], 'Signup/store', 'Signup::store');

// Sign In
$routes->match(['GET', 'POST'], 'Signin/loginAuth', 'Signin::loginAuth');
$routes->get('/signin', 'Signin::index');
$routes->get('/logout', 'Signin::logout');

// Public Routes
$routes->get('/', 'Dashboard::index');
$routes->get('/results', 'Results::index');
$routes->get('/results/(:any)', 'Results::view/$1');

// Logged In Routes
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/feedback', 'Feedback::index', ['filter' => 'authGuard']);
$routes->post('/feedback', 'Feedback::store', ['filter' => 'authGuard']);
$routes->get('/about-us', 'AboutUsController::index', ['filter' => 'authGuard']);
$routes->get('/profile', 'Profile::index', ['filter' => 'authGuard']);
$routes->post('/profile', 'Profile::update', ['filter' => 'authGuard']);
$routes->get('/eligibility', 'Eligibility::index', ['filter' => 'authGuard']);
$routes->post('/eligibility', 'Eligibility::update', ['filter' => 'authGuard']);
$routes->get('/vote', 'VoteController::index', ['filter' => 'authGuard']);
$routes->get('/submit', 'VoteController::submit', ['filter' => 'authGuard']);

// Admin Routes
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'adminGuard'], static function ($routes) {

    $routes->get('dashboard', 'ElectionController::index');
    $routes->get('election', 'ElectionController::index');
    $routes->post('election/add', 'ElectionController::add');
    $routes->get('election/remove/(:any)', 'ElectionController::remove/$1');

    $routes->get('party', 'PartyController::index');
    $routes->post('party/add', 'PartyController::add');
    $routes->get('party/remove/(:any)', 'PartyController::remove/$1');

    $routes->get('constituency', 'ConstituencyController::index');
    $routes->post('constituency/add', 'ConstituencyController::add');
    $routes->get('constituency/remove/(:any)', 'ConstituencyController::remove/$1');

    $routes->get('candidate', 'CandidateController::index');
    $routes->post('candidate/add', 'CandidateController::add');
    $routes->get('candidate/remove/(:any)', 'CandidateController::remove/$1');

    $routes->get('voter', 'VoterController::index');
    $routes->get('voter/remove/(:any)', 'VoterController::remove/$1');

    $routes->get('user', 'UserController::index');
    $routes->post('user/add', 'UserController::add');
    $routes->get('user/remove/(:any)', 'UserController::remove/$1');
});