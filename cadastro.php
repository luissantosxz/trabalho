<?php 
        require 'ConectaBanco.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = hash('sha256',$_POST['senha']); // embaralhar a senha o sha256 tem 256bit de largura mais dificil de quebrar a senha com o passwordhash nao estava dando para fazer login
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $cep = $_POST['cep'];

            $sql = "INSERT INTO usuario (nome, sobrenome, email, senha, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $prepararBanco = $banco->prepare($sql);
            $prepararBanco->bind_param("ssssssss", $nome, $sobrenome, $email, $senha, $endereco, $cidade, $estado, $cep); // s é String cada um S é string
            
            // Executar a instrução e verificar se foi bem-sucedida
            if ($prepararBanco->execute()) {
                echo "Novo usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário: " . $prepararBanco->error;
            }
            
            $prepararBanco->close();
            $banco->close();
        }

?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <a href="paginaLogin.php"><button class="btn btn-primary">Pagina de login!</button></a>
    </body>
    </html>