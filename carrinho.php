<?php
    include 'menu.php';
    require_once 'ConectaBanco.php';
    $idUsuario = $_SESSION['id'];
       
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $acao = $_POST['acao'];

        if($acao == 'adicionar'){
            $idItem = $_POST['idItem'];
            $quantidade = $_POST['quantidade'];
            $adicionado = $banco->query("INSERT INTO itensCarrinho (idItem, idUsuario, quantidade) VALUES ($idItem, $idUsuario, $quantidade)");
            if(!$adicionado){
                die ('NÃO FOI POSSIVEL ADICIONAR O PRODUTO NO SEU CARRINHO');
            }
        }
        if ($acao == 'deletar'){

            $idCarrinho = $_POST['idCarrinho'];
            $deletado = $banco->query("DELETE FROM itensCarrinho WHERE id = $idCarrinho ");
            if(!$deletado){
                die ('Não foi POSSIVEL deletar o produto!');
            }
        } 



    }

    $resultado = $banco->query("SELECT * FROM itensCarrinho WHERE idUsuario='$idUsuario'");
    if(!$resultado ||  mysqli_num_rows($resultado) == 0){
        die ('Sem ITENS NO CARRINHO!!!!!!!!!');
    }
    
    $valorTotal = 0;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card my-2 py-2">
                        <h3 class="mx-auto"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                            </svg> Seu carrinho de compras: </h3>
                    </div>
                    <?php while($carrinho = $resultado->fetch_assoc()) {
                        $id = $carrinho['idItem']; 
                        $procuraitem = $banco->query("SELECT * FROM itens WHERE id='$id' ");
                        while($item = mysqli_fetch_assoc($procuraitem)) {

                            $preco = $item['preco'] * $carrinho['quantidade'];
                            $valorTotal = $valorTotal + $preco;
                        ?>
                    <form action="" method="post">
                    <div class="card shadow-sm mt-2">
                        <img src="<?= $item['imagem'] ?>" class="object-fit-contain " width="100%" height="225"></img>
                        <div class="card-body">
                            <input type="text" hidden name="idCarrinho" value="<?= $carrinho['id'] ?>">
                            <p class="card-text">Nome: <?= $item['nome']?></p> <!-- no $item esta o nome imagem e também preco -->
                            <p class="card-text">Preço: R$ <?= $preco ?> </p>
                            <p class="card-text">Quantidade: <?= $carrinho['quantidade']?></p>  <!-- no $carrinho esta a quantidade e o id do item -->
                            <button class="btn btn-danger" name="acao" value="deletar">remover do carrinho!</button>
                        </div>
                    </div>
                    </form>
                    <?php } } ?>
                    <p class="h3">Valor total: R$ <?= $valorTotal ?></p>              
            </div>
</body>

</html>

<?php 
    $banco->close();
    // Fatal error: Uncaught Error: mysqli object is already closed in C:\xampp\htdocs\trabalho\carrinho.php:44 
    // Stack trace: #0 C:\xampp\htdocs\trabalho\carrinho.php(44): mysqli->query('SELECT * FROM i...') #1 {main} thrown in C:\xampp\htdocs\trabalho\carrinho.php on line 44
?>