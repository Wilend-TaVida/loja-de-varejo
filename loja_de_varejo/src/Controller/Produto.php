<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\DAO\ProductDAO;
use APP\Model\Product;
use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;
use PDOException;

require '../../vendor/autoload.php';

if(empty($_GET['operation'])){
    Redirect::redirect(message:'Nenhuma operação foi enviada', type:'error');
}
switch($_GET['operation']){
    case 'insert':
        insertProduct();
        break;
    case 'list':
        listProducts();
        break;
    default:
        Redirect::redirect('A operação informada é inválida', type:'error');
}

function insertProduct()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(message:"Requisição inválida!!",
        type:'error'    
    );
    }

    $productName = $_POST["name"];
    $productCostPrice = str_replace(",",".",$_POST["cost"]);
    $quantity = $_POST["quantity"];
    $provider = $_POST["provider"];

    $error = array();

    // array_unshift -> Adicionar no início do array
    // array_push -> Adicionar no final do array

    // array_shift -> Remove do início do array
    // array_pop -> Remove do final do array

    // Coisa acima pode cair na prova

    //Construtor serve para incialzar as propriedades da classe a qual ele pertence
    //Obrigado a criar um construtor quando é obrigado a inicializar alguma propriedade da classe, chamando o método

    if(!Validation::validateName($productName)){
        array_push($error,"O nome do produto deve conter mais de 2 caracteres!");
    }

    if(!Validation::validateNumber($productCostPrice)){
        array_push($error,"O preço de custo do produto deverá ser maior que zero.");
    }

    if(!Validation::validateNumber($quantity)){
        array_push($error, "A quantidade de entrada deverá ser maior que zero.");
    }

    if($error){
        Redirect::redirect(
            message: $error,
            type: "warning"
        );
    }else{
        $product = new Product(
            tax: 0.2,
            costOfOperation: 0.07,
            cost: $productCostPrice,
            lucre: 0.8,
            name: $productName,
            quantity: $quantity,
            provider: new Provider(
                cnpj: "00000/0001",
                name: "Fornecedor padrão",
                address: null
            )
        );
        try{
            $dao = new ProductDAO();
            $result = $dao->insert($product);
            if($result){
                Redirect::redirect(
                    message: "O produto $productName foi cadastrado com sucesso.",
                );
            }else{
                Redirect::redirect("Lamento não foi possível cadastrar o produto $productName", type: 'error');
            }
        }catch(PDOException $e) {
            var_dump($e->getMessage());
            // Redirect::redirect("Houve um erro inesperado: ". $e->getMessage(), type: 'error');
            // Redirect::redirect("Lamento, houve um erro inesperado.", type: 'error');

        }
    }
}

function listProducts()
{
    try{
        session_start();
        $dao = new ProductDAO();
        $products = $dao->findAll();
        if($products){
            $_SESSION['list_of_products'] = $products;
            header('location:../View/list_of_products.php');
        }else{
            Redirect::redirect(message: 'Não existem produtos cadastrados', type: 'warning');
        }
    }catch(PDOException $e){
        Redirect::redirect("Lamento, houve um erro inesperado", type:'error');
    }
    
    
}



