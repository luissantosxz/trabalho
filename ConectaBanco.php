<?php
    $banco = new mysqli("localhost", "root", "","banco",3306);
    if($banco->connect_errno){
        echo "Erro ao conectar no banco de dados \n";
    }else{
        echo "Conectado com sucesso! \n";
    }
    
    session_start(); // Iniciando sessao de um usuario, para guardar informações quando eu reiniciar a pagina

?>