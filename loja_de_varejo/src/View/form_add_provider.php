<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Varejo - Cadastro de fornecedor</title>
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
                    <a href="#">Novo fornecedor</a>
                </li>
                <li class="inline">
                    <a href="../Controller/Produto.php?operation=list">Lista de produtos</a>
                </li>
                <li>
                    <a href="../Controller/Provider.php?operation=list">Lista de fornecedores</a>
                </li>
            </ul>
    </nav>
    <form action="../Controller/Provider.php" method="POST">
        <fieldset class="p-4 m-5 border border-black">
            <legend>Dados do fornecedor</legend>
            <section class="columns-3">
                <article>
                    <label for="nameProvider">Nome do fornecedor</label>
                    <input type="text" required class="border border-black" name="nameProvider" id="nameProvider">
                </article>
                <article>
                    <label for="cnpj">CNPJ</label>
                    <input type="number" required class="border border-black" name="cnpj" id="cnpj">
                </article>
                <article>
                    <label for="phone">Telefone</label>
                    <input type="number" class="border border-black" name="phone" id="phone">
                </article>
            </section>
            <fieldset class="p-4 m-5 border border-black">
                    <legend>Endereço do fornecedor</legend>
                    <section>
                        <article class="mb-3">
                            <label for="publicPlace" class="mr-2">Logradouro:</label>
                            <input type="text" name="publicPlace" id="publicPlace" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="streetName" class="mr-2">Nome:</label>
                            <input type="text" name="streetName" id="streetName" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="numberOfStreet" class="mr-2">Número:</label>
                            <input type="number" name="numberOfStreet" id="numberOfStreet" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="complement" class="mr-2">Complemento:</label>
                            <input type="text" name="complement" id="complement" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="neighborhood" class="mr-2">Bairro:</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="city" class="mr-2">Cidade:</label>
                            <input type="text" name="city" id="city" class="border border-black" required>
                        </article>
                        <article class="mb-3">
                            <label for="zipCode" class="mr-2">CEP:</label>
                            <input type="number" name="zipCode" id="zipCode" class="border border-black" required>
                        </article>
                    </section>
                </fieldset>
            <article class="flex justify-center">
                <button type="submit" class="p-4 mt-2 text-white bg-blue-700 rounded">Cadastrar</button>
            </article>
        </fieldset>
    </form>
</body>
</html>