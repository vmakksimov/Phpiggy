<?php


declare(strict_types= 1);

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class RequiredRule implements RuleInterface {
    public function validate(array $formData, string $field, array $params){
        return !empty($formData[$field]);
    }

    public function getMessage(array $formData, string $field, array $params){
        return "This field si required.";
    }
}