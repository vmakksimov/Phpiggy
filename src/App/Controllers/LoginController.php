<?php

declare(strict_types= 1);
namespace App\Controllers;

use App\Services\{ValidatorService, UserService};
use Framework\TemplateEngine;

class LoginController {
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validator,
        private UserService $userService
        ){

    }

    public function loginView(){
        echo $this->view->render("/login.php");
    }

    public function login(){
        $this->validator->validateLogin($_POST);
        $this->userService->login($_POST);
        redirectTo("/");
    }
}