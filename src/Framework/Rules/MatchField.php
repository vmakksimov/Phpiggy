<?php

declare(strict_types=1);

namespace Framework\Rules;
use Framework\Contracts\RuleInterface;

class MatchField implements RuleInterface{
    public function validate(array $data, string $field, array $params) : bool {
        $fieldOne = $data['field'];
        $fieldTwo = $data[$params[0]];

        return $fieldOne === $fieldTwo;
    }

    public function getMessage(array $data, string $field, array $params) : string {
        return 'Passwords don\'t match';
    }
}