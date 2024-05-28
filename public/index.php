<?php

require __DIR__ . '/../vendor/autoload.php';

use prabutama\e_learning\App\Router;
use prabutama\e_learning\Controller\HomeController;
use prabutama\e_learning\Controller\UserController;
use prabutama\e_learning\Controller\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/login', UserController::class, 'loginForm');
Router::add('POST', '/login', UserController::class, 'login');
Router::add('GET', '/register', UserController::class, 'registerForm');
Router::add('POST', '/register', UserController::class, 'store');
Router::add('POST', '/logout', UserController::class, 'logout');
Router::add('GET', '/dashboard', DashboardController::class, 'index');
Router::add('GET', '/dashboard/tugas', DashboardController::class, 'tugas');
Router::add('POST', '/dashboard/tugas/upload', DashboardController::class, 'uploadFile');
Router::add('POST', '/dashboard/tugas/update', DashboardController::class, 'updateTask');


Router::run();
