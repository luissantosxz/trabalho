<?php
include 'menu.php';
require_once 'ConectaBanco.php';
$idUsuario = $_SESSION['id'];

$resultado = $banco->query("SELECT * FROM itens ");
if (!$resultado ||  mysqli_num_rows($resultado) == 0) {
    die('Sem produtos');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
}
$banco->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>E-Commerce</title>
</head>

<body>
    <div class="container">
        <h1 class="display- fw-bold text-body-emphasis mb-3">Nossos produtos:</h1>
        <div class="row row-cols-3 gap-5">
            <?php
            while ($percorreProduto = $resultado->fetch_assoc()) {
            ?>
                <div class="card shadow-sm">
                    <form action="carrinho.php" method="post">
                        <input type="text" hidden name="idItem" value="<?= $percorreProduto['id'] ?>">
                        <img src="<?= $percorreProduto['imagem'] ?>" class="card-img-top" width="100%" height="225"></img>
                        <div class="card-body">
                            <p class="card-text"><?= $percorreProduto['nome'] ?> R$ <?= $percorreProduto['preco'] ?></p>
                            <p class="card-text">Quantidade: </p>
                            <select id="qtd" class="form-control mb-2" name="quantidade" required>
                                <option value=1 selected>1</option>
                                <option value=2> 2 </option>
                                <option value=3> 3 </option>
                            </select>
                            <button class="btn btn-primary" name="acao" value="adicionar">Adicionar produto ao carrinho!</button>
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>