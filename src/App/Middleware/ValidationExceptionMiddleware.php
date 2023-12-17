<?php

declare(strict_types= 1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\CustomException;


class ValidationExceptionMiddleware implements MiddlewareInterface {
    public function process(callable $next){
      
        try {
            $next();
        }catch(CustomException $e){
            $oldFormData = $_POST;

            $excludedFields = ['password', 'confirmPassword'];
            $newData = array_diff_key($oldFormData, array_flip($excludedFields));
            $_SESSION['errors'] = $e->errors;
            $_SESSION['oldFormData'] = $newData;
            $referer = $_SERVER["HTTP_REFERER"];
            redirectTo($referer);
        }
       
    }
}