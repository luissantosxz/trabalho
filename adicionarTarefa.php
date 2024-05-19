<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Adicionar Tarefas:</title>
</head>
<body>
    <?php
    require_once 'menu.php';
    require_once 'ConectaBanco.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $objetivo = $_POST['objetivo'];
        $idUsuario = $_SESSION['id']; // session é oque esta salvando do usuario
        $sql = "INSERT INTO tarefas (objetivo, idUsuario) VALUES (?, ?)";
        $prepararBanco = $banco->prepare($sql);
        $prepararBanco->bind_param("si", $objetivo, $idUsuario);

        if ($prepararBanco->execute()) {
            header("Location: listaTarefas.php");
        } else {
            echo "Erro ao cadastrar TAREFA " . $prepararBanco->error;
        }
        
        $prepararBanco->close();
        $banco->close();
    }
    ?>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card my-2 py-2">
                        <h3 class="mx-auto"> <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5" />
                            </svg> Adicione uma nova Tarefa:</h3>
                        <div class="mb-3 card-body">
                            <form action = "" method="post">
                            <div class="form-floating">
                            <textarea class="form-control" placeholder="Descrição..." id="floatingTextarea" name="objetivo" required></textarea>
                            <label for="floatingTextarea">Tarefa:</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Adicionar!</button>
                            </form>
                        </div>
                    </div>
            </div>
</body>
</body>

</html>