<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\Provider;
use APP\Model\Validation;
use APP\Utils\Redirect;

require '../../vendor/autoload.php';

if(empty($_POST)){
    session_start();
    Redirect::redirect(message:"Requisição inválida!!",
    type:'error'    
);
}

$nameProvider = $_POST['nameProvider'];
$cnpj = $_POST['cnpj'];
$phone = $_POST['phone'];
$publicPlace = $_POST['publicPlace'];
$numberOfStreet = $_POST['numberOfStreet'];
$complement = $_POST['complement'];
$neighborhood = $_POST['neighborhood'];
$city = $_POST['city'];
$zipCode = $_POST['zipCode'];

$errors = array();

if(!Validation::validateName($nameProvider)){
    array_push($errors, "O nome do fornecedor deve conter mais de 2 caracteres!");
}

if(!Validation::validadeCnpj($cnpj)){
    array_push($errors, "O CNPJ inserido está incorreto.");
}

if(!Validation::validatePhone($phone)){
    array_push($errors, "O número de telefone está incorreto");
}

if(!Validation::validateName($publicPlace)){
    array_push($errors, "O logradouro deve conter mais de 2 caracteres.");
}

if(!Validation::validateNumber($numberOfStreet)){
    array_push($errors, "O número da rua deve ser maior que zero.");
}

if(!Validation::validateName($complement)){
    array_push($errors, "O complemento deve conter mais de 2 caracteres.");
}

if(!Validation::validateName($neighborhood)){
    array_push($errors, "O bairro deve conter mais de 2 caracteres.");
}

if(!Validation::validateName($city)){
    array_push($errors, "A cidade deve conter mais de 2 caracteres.");
}

if(!Validation::validateCep($zipCode)){
    array_push($errors, "O CEP deve conter somente oito números");
}

if($errors){
    Redirect::redirect(
        message: $errors,
        type: 'warning'
    );
}else{
    $provider = new Provider(
        $cnpj,
        $nameProvider,
        $address = new Address(
            $publicPlace,
            $numberOfStreet,
            $complement,
            $neighborhood,
            $city,
            $zipCode
        )
    );
    Redirect::redirect(
        message: "O fornecedor $nameProvider foi cadastrado com sucesso."
    );
}

