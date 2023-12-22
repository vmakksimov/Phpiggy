<?php


declare(strict_types= 1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController, RegisterController, LoginController, LogoutController, TransactionController};
use Framework\App;
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app){
    $app -> get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app -> get('/about', [AboutController::class, 'about']);
    $app -> get('/register', [RegisterController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app -> post('/register', [RegisterController::class, 'authRegister'])->add(GuestOnlyMiddleware::class);
    $app -> get('/login', [LoginController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app -> post('/login', [LoginController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app -> get('/logout', [LogoutController::class, 'logout'])->add(AuthRequiredMiddleware::class);
    $app -> get('/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
    $app -> post('/transaction', [TransactionController::class, 'validateTransaction'])->add(AuthRequiredMiddleware::class);
    $app -> post('/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class);

}

