<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\DAO\AddressDAO;
use APP\Model\DAO\ProviderDAO;
use APP\Model\Provider;
use APP\Model\Validation;
use APP\Utils\Redirect;
use PDOException;

require '../../vendor/autoload.php';
if (empty($_GET['operation'])){
    Redirect::redirect(message:"Requisição inválida!!",
    type:'error');
}
switch ($_GET['operation']){
    case "insert":
        insertProvider();
        break;
    case "list":
        listProviders();
        break;
    default:
        Redirect::redirect('A operação informada é inválida.',type:'error');
}

function insertProvider(){
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
    $streetName = $_POST['streetName'];
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
    
    if(!Validation::validateName($streetName)){
        array_push($errors, "O nome deve conter mais de 2 caracteres.");
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
                $id = 0,
                $publicPlace,
                $streetName,
                $numberOfStreet,
                $complement,
                $neighborhood,
                $city,
                $zipCode
            ),
        $phone
        );
        try{
            $dao = new AddressDAO();
            $result = $dao->insert($provider->address);
            if($result){
                $addressCode = $dao->findId();
                $provider->address->id = $dao->findId();
                $dao = new ProviderDAO();
                $result = $dao->insert($provider);
                if($result){
                    Redirect::redirect(
                        message: "O fornecedor $nameProvider foi cadastrado com sucesso."
                    );
                    echo 'caiu aqui';
                }else{
                    Redirect::redirect("Lamento não foi possível cadastrar o provedor $nameProvider", type: 'error');
                } 
            }    
        }catch(PDOException $e){
            Redirect::redirect(message: "Lamento, houve um erro inesperado no sistema.", type:'error');
            //Notificar o desenvolvedor
        }
    
    }
}
function listProviders(){
    try{
        session_start();
        $dao = new ProviderDAO();
        $providers = $dao->findAll();
        if($providers){
            $_SESSION['list_of_providers'] = $providers;
            header('location:../View/list_of_providers.php');
        }else{
            Redirect::redirect(message: 'Não existem fornecedorese cadastrados', type: 'warning');
        }
    }catch(PDOException $e){
        Redirect::redirect("Lamento, houve um erro inesperado", type:'error');
    }

}

