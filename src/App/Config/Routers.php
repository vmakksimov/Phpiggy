<?php


declare(strict_types= 1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController, RegisterController};
use Framework\App;

function registerRoutes(App $app){
    $app -> get('/', [HomeController::class, 'home']);
    $app -> get('/about', [AboutController::class, 'about']);
    $app -> get('/register', [RegisterController::class, 'register']);
    $app -> post('/register', [RegisterController::class, 'authRegister']);
}
