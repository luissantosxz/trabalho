<?php 
  include 'menu.php';
    require_once 'ConectaBanco.php';
        $idUsuario = $_SESSION['id'];
       
        $resultado = $banco->query("SELECT * FROM tarefas WHERE idUsuario='$idUsuario'");
        if(!$resultado ||  mysqli_num_rows($resultado) == 0){
            die ('Sem tarefas');
            
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idtarefa = $_POST['idtarefa'];
            $acao = $_POST['acao'];
            if($acao == 'deletar'){
                $resultado = $banco->query("DELETE FROM tarefas WHERE id = '$idtarefa' ");
                if($resultado){
                    header("Location: listaTarefas.php"); // estava ficando com erro na pagina depois que excluia a tarefa.
                } else {
                    echo 'não foi possivel deletar a sua tarefa';
                }
            }elseif($acao == 'concluir'){
                $resultado = $banco->query("UPDATE tarefas set concluido = true WHERE id = '$idtarefa' ");
            } if($resultado){
                header("Location: listaTarefas.php");
            } else {
                echo 'não foi possivel concluir a sua tarefa';
            }
        }
        $banco->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Listagem:</title>
</head>
<body>

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
            <h3 class="mx-auto"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" />
                            </svg> Tarefas:</h3>
                <?php
                if($resultado){
                while($percorreTarefa = $resultado->fetch_assoc()){
                    // nao fechei esse while pois ele tem que estar dentro do form inteiro ou seja ele"ENCAPOSULOU O HTML TIVE Q PESQUISAR PARA FAZER ISSO NAO ESTAVA CONSEGUINDO DE JEITO NENHUM"
                ?>
                <form action="" method="post">
                    <div class="card my-2 py-2">
                        
                        <div class="mb-3 card-body">
                            <div class="col-md-12 ">
                                <?php 
                                if(!$percorreTarefa['concluido']){
                                    
                                ?>
                                <button class="btn btn-primary" name="acao" value="concluir">concluir</button>
                                <?php 

                                }
                                ?>
                                <button class="btn btn-danger" name="acao" value="deletar">deletar</button>
                                <input hidden name="idtarefa" value="<?= $percorreTarefa['id']?>"> <!-- value do input é o id da tarefa, um valor dinamico -->
                                <h3 class="<?php 
                                if($percorreTarefa['concluido']){
                                    echo 'text-success';
                                }
                                ?>"><?= $percorreTarefa['objetivo'] 
                                // atalho shrotcut de php para nao precisar ficar escrevendo echo toda hora https://www.php.net/manual/en/function.echo.php
                                ?> </h3>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                } 
                    }
                ?>
            </div>
</body>
</body>

</html>