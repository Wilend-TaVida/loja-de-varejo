<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Varejo - Cadastro de produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="../controller/Produto.php" 
    method="POST">
        <fieldset class="p-4 m-5 border border-black">
            <legend>Dados do produto</legend>
            <section class="columns-3">
                <article>
                    <label for="name">Nome do produto</label>
                    <input class="border border-black" type="text" 
                    id="name" name="name" required min="5">
                </article>
                <article>
                    <label for="cost">Preço de custo</label>
                    <input class="border border-black" type="text"
                    name="cost" id="cost" required min=1>
                </article>
                <article>
                    <label for="quantity">Quantidade em estoque</label>
                    <input type="text" name="quantity" id="quantity" 
                    class="border border-black" required>
                </article>
                <article>
                    <label for="provider">Fornecedor</label>
                    <select name="provider" id="provider">
                        <option value="1">Fornecedor 1</option>
                        <option value="2">Fornecedor 2</option>
                        <option value="3">Fornecedor 3</option>
                    </select>
                </article>
            </section>
            <article class="flex justify-center">
                <button type="submit" class="p-4 mt-2 text-white bg-blue-700 rounded">Cadastrar</button>
            </article>
        </fieldset>
    </form>
</body>
</html>