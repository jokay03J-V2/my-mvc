<?php
namespace Project\Core;

use Exception;

class ValidatorRules
{
    static function required(mixed $fieldData)
    {
        return isset($fieldData);
    }

    static function minLength(array $rule)
    {
        if (!is_array($rule) || empty($rule[1])) {
            throw new Exception("Invalid rule format");
        }
        return isset($rule[0]) && isset($rule[1]) && strlen($rule[0]) >= (int) $rule[1];
    }

    static function maxLength(array $rule)
    {
        if (!is_array($rule) || empty($rule[1])) {
            throw new Exception("Invalid rule format");
        }
        return isset($rule[0]) && isset($rule[1]) && strlen($rule[0]) <= (int) $rule[1];
    }

    static function email(mixed $fieldData)
    {
        return isset($fieldData) && filter_var($fieldData, FILTER_VALIDATE_EMAIL);
    }

    static function url(mixed $fieldData)
    {
        return isset($fieldData) && filter_var($fieldData, FILTER_VALIDATE_URL);
    }

    static function numeric(mixed $fieldData)
    {
        return isset($fieldData) && preg_match("/^[0-9]{1,}$/", $fieldData);
    }

    static function alpha(mixed $fieldData)
    {
        return isset($fieldData) && preg_match("/^[aA-zZ]{1,}$/", $fieldData);
    }

    static function alphaNum(mixed $fieldData)
    {
        return isset($fieldData) && preg_match("/^[aA0-zZ9]{1,}$/", $fieldData);
    }

    static function date(mixed $fieldData)
    {
        return isset($fieldData) && preg_match("/^(\d{4})(\/|-)(0[0-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1])$/", $fieldData);
    }
}
?>