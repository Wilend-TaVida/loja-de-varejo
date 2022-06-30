<?php

namespace APP\Model;

class Validation
{
    public static function validateName(string $name):bool
    {
        return mb_strlen($name) > 2;
    }

    public static function validateNumber(float $number):bool
    {
        return $number > 0;
    }

    public static function validadeCnpj(string $cnpj):bool
    {
        return mb_strlen($cnpj) == 14 && (mb_substr($cnpj, 8, 4) == 0001 || mb_substr($cnpj, 8, 4) == 0002);
    }

    public static function validatePhone(string $phone):bool
    {
        return mb_strlen($phone) == 8 || mb_strlen($phone) == 12;
    }

    public static function validateCep(string $zipCode):bool
    {
        return mb_strlen($zipCode) == 8;
    }
}

//estrutura de condição, estrutura de repetição (for, foreach), coleções (array), conceito básico de linguagem