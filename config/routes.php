<?php

Use Core\Route;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\Notas;
use App\Controllers\RegistrarController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use Notas\AtualizarController;

(new Route())

//não autenticado

->get('/', IndexController::class, GuestMiddleware::class)

->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)

->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)

->get('/registrar', [RegistrarController::class, 'index'], GuestMiddleware::class)

->post('/registrar', [RegistrarController::class, 'register'], GuestMiddleware::class)

//autenticado
->get('/logout', LogoutController::class, AuthMiddleware::class)
->get('/notas', Notas\IndexController::class, AuthMiddleware::class)
->get('/notas/criar', [Notas\CriarController::class, 'index'], AuthMiddleware::class)
->post('/notas/criar', [Notas\CriarController::class, 'store'], AuthMiddleware::class)
->put('/nota', Notas\AtualizarController::class, AuthMiddleware::class)

->run();


