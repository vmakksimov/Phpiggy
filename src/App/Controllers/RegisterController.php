<?php


declare(strict_types= 1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};



class RegisterController {

    public function __construct(
        private TemplateEngine $view, 
        private ValidatorService $validatorService,
        private UserService $userService
        ){

    }
    public function register(){
        echo $this->view->render("/register.php");
    }

    public function authRegister(){
        $this->validatorService->validateRegister($_POST);
    }
}

