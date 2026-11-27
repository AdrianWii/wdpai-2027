<?php

declare(strict_types=1);

use App\Controller\AboutController;
use App\Controller\DefaultController;
use App\Controller\ProjectController;
use App\Controller\SecurityController;
use App\Controller\DashboardController;
use App\Routing;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$routing = new Routing();

$routing->get('/projects', ProjectController::class, 'index');
$routing->get('/project', ProjectController::class, 'addProject');
$routing->post('/project', ProjectController::class, 'addProject');
$routing->get('/projects/{id}', ProjectController::class, 'show');
$routing->get('/', DashboardController::class, 'dashboard');
$routing->get('/about', AboutController::class, 'index');
$routing->get('/login', SecurityController::class, 'login');
$routing->post('/login', SecurityController::class, 'login');
$routing->get('/logout', SecurityController::class, 'logout');
$routing->post('/register', SecurityController::class, 'register');
$routing->get('/register', SecurityController::class, 'register');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}
