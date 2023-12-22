<?php

namespace Framework\Rules;

use Framework\Contracts\RuleInterface;

class NumericRule implements RuleInterface {
  public function validate(array $data, string $field, array $params): bool {
    return (bool) 0 < (int) $data[$field];

    }

  public function getMessage(array $data, string $field, array $params): string {
    return "The inputted data must be greater than 0.";
  
    }
}