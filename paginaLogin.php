<?php
    require_once 'ConectaBanco.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = hash('sha256',$_POST['senha']); 
    

       
        $resultado = $banco->query("SELECT * FROM usuario WHERE email='$email' and senha='$senha'");
        if(!$resultado ||  mysqli_num_rows($resultado) == 0){
            echo 'email ou senha incorretos! <br> tente novamente';
        }
        while($usuario = mysqli_fetch_assoc($resultado)) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['sobrenome'] = $usuario['sobrenome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['endereco'] = $usuario['endereco'];
        $_SESSION['cidade'] = $usuario['cidade'];
        $_SESSION['estado'] = $usuario['estado'];
        header("Location: perfil.php"); // tirei do form action porque a logica de login esta nesse arquivo, como tava antes estava num loop infinito pois nao salvou a sessao e buscou usuario.
        }
        $banco->close();
    }
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
                <form action="" method="post">
                    <div class="card my-2 py-2">
                        <h3 class="mx-auto">Login <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            </svg></h3>
                        <!-- Peguei esse icone svg class do bootstrap https://icons.getbootstrap.com/icons/person-bounding-box/ tem varios icones para usar! -->
                        <div class="mb-3 card-body">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                            <button type="submit" class="btn btn-primary mt-3">Entrar</button>
                            <a href="telaCadastro.php" class="nav-link mt-3">Não possui uma conta? Criar conta!</a>
                        </div>
                    </div>
                </form>
            </div>
</body>

</html>