<?php
    include 'menu.php';
   require_once 'ConectaBanco.php';
   if(!$_SESSION['nome']){
   header("Location: paginaLogin.php"); // serve para mudar de pagina caso nao tenha um nome salvo. 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card my-2 py-2">
                    <h3 class="mx-auto"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="70" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                        </svg> Seu Perfil: </h3>
                    <div class="mb-3 card-body">
                        <label for="nome" class="form-label">Nome: <?php echo  $_SESSION['nome']; ?></label>
                        <div class="mt-2">
                        <label for="sobrenome" class="form-label">Sobrenome: <?php echo  $_SESSION['sobrenome']; ?></label>
                        </div>
                        <div class="mt-2">
                        <label for="email" class="form-label">email: <?php echo  $_SESSION['email']; ?></label>
                        </div>
                        <div class="mt-2">
                        <label for="endereco" class="form-label">Endereco: <?php echo  $_SESSION['endereco']; ?></label>
                        </div>
                        <div class="mt-2">
                        <label for="cidade" class="form-label">cidade: <?php echo  $_SESSION['cidade']; ?></label>
                        </div>
                        <div class="mt-2">
                        <label for="estado" class="form-label">estado: <?php echo  $_SESSION['estado']; ?></label>
                        </div>
                    </div>
                </div>
                <a href="deslogar.php"><button class="btn btn-danger">Deslogar</button></a>
            </div>
        </div>
    </div>
</body>

</html>