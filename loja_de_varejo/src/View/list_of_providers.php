<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="bg-blue-400">
            <ul>
                <li class="inline">
                    <a href="../../index.html">Home</a>
                </li>
                <li class="inline">
                    <a href="form_add_product.php">Novo produto</a>
                </li>
                <li class="inline">
                    <a href="form_add_provider.php">Novo fornecedor</a>
                </li>
                <li>
                    <a href="../controller/produto.php?operation=list">lista de produtos</a>
                </li>
                <li class="inline">
                    <a href="#">Lista de fornecedor</a>
                </li>
            </ul>
    </nav>
    <h1 class="my-4 text-3xl font-bold text-center text-blue-800">Lista de fornecedores cadastrados</h1>
    <table  class="m-auto">
        <thead class="m-auto">
            <th>#</th>
            <th>Nome do fornecedor</th>
            <th>CNPJ</th>
            <th>Telefone do fornecedor</th>
            <th>Logradouro</th>
            <th>Nome</th>
            <th>Numero</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>CEP</th>
        </thead>
        <tbody>
            <?php
                session_start();
                foreach($_SESSION['list_of_providers'] as $provider) :
            ?>
                <tr>
                    <td>
                        <?= $provider['provider_code'] ?>
                    </td>
                    <td>
                        <?= $provider['provider_name'] ?>
                    </td>
                    <td>
                        <?= $provider['cnpj'] ?>
                    </td>
                    <td>
                        <?= $provider['provider_phone'] ?>
                    </td>
                    <td>
                        <?= $provider['public_place']?>
                    </td>
                    <td><?= $provider['street_name']?>
                    <td>
                        <?= $provider['number_of_street']?>
                    </td>
                    <td>
                        <?= $provider['complement']?>
                    </td>
                    <td>
                        <?= $provider['neighborhood']?>
                    </td>
                    <td>
                        <?= $provider['city']?>
                    </td>
                    <td>
                        <?= $provider['zipcode']?>
                    </td>
                </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>