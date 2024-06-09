<?php
include 'menu.php';
require_once 'ConectaBanco.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeP = $_POST['nomeP'];
    $valorP = $_POST['valor'];
    $img = $_POST['img'];
    $quantidadeP = $_POST['quantidade'];
    $resultado = $banco->query("INSERT INTO itens (nome,preco,quantidade,imagem) VALUES ('$nomeP', '$valorP', '$quantidadeP', '$img')");

    if(!$resultado){
        die ('Ocorreu um erro');
    }

    header("Location: paginaProdutos.php");
    $banco->close();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cadastrar</title>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card my-2 py-2">
                    <h3 class="mx-auto">Cadastrar Produto<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                            </svg></h3>
                    <div class="mb-3 card-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <label for="nomeP">Nome do Produto:</label>
                                    <input type="text" class="form-control mb-2" placeholder="Nome" name="nomeP" id="nomeP" required>
                                </div>
                                <div class="col">
                                    <label for="valor">Valor</label>
                                    <input type="number" class="form-control" placeholder="R$:" name="valor" id="valor" required>
                                </div>
                                <div class="col">
                                    <label for="img">Quantidade em Estoque:</label>
                                    <input type="number" class="form-control" placeholder="Ex. 3" name="quantidade" id="quantidade" required>
                                </div>
                                <div class="col">
                                    <label for="img">Imagem</label>
                                    <input type="text" class="form-control" placeholder="Link da imagem aqui" name="img" id="img" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Cadastrar!</button>
                    </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
</body>

</html>