<?php

declare(strict_types= 1);
namespace App\Controllers;

use App\Services\{ValidatorService, UserService};
use Framework\TemplateEngine;

class LogoutController {

    public function __construct(private UserService $userService){

    }
    public function logout(){
        $this->userService->logout();
        redirectTo("/login");
    }
}