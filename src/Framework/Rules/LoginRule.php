<?php

declare(strict_types= 1);
namespace Framework\Rules;
use Framework\Contracts\RuleInterface;

class LoginRule implements RuleInterface {
    public function validate(array $data, string $field, array $params) : bool {
        $isEmailValid = (bool) filter_var($data[$field], FILTER_VALIDATE_EMAIL);
        return $isEmailValid;

    }

    public function getMessage(array $data, string $field, array $params) : string {
        return 'Not a valid email or password';
    }
}