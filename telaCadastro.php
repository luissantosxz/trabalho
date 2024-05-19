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
                    <h3 class="mx-auto">Cadastrar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg></h3>
                    <div class="mb-3 card-body">
                        <form action="cadastro.php" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control mb-2" placeholder="Nome" name="nome" id="nome" required>
                                </div>
                                <div class="col">
                                    <label for="sobrenome">Sobrenome:</label>
                                    <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" id="sobrenome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="senha">Senha:</label>
                                    <input type="password" class="form-control" id="senha" placeholder="senha" required name="senha">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Avenida Saul Elkind nº 0" name="endereco" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cidade">Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="estado">Estado:</label>
                                    <select id="estado" class="form-control" name="estado" required>
                                        <option selected>Escolher...</option>
                                        <option value="ac">Acre (AC)</option>
                                        <option value="al">Alagoas (AL):</option>
                                        <option value="am">Amazonas (AM):</option>
                                        <option value="ba">Bahia (BA):</option>
                                        <option value="ce">Ceará (CE):</option>
                                        <option value="df">Distrito Federal (DF):</option>
                                        <option value="es">Espírito Santo (ES):</option>
                                        <option value="go">Goiás (GO)</option>
                                        <option value="ma">Maranhão (MA)</option>
                                        <option value="mt">Mato Grosso (MT)</option>
                                        <option value="ms">Mato Grosso do Sul (MS)</option>
                                        <option value="mg">Minas Gerais (MG)</option>
                                        <option value="pa">Pará (PA):</option>
                                        <option value="pb">Paraíba (PB):</option>
                                        <option value="pr">Paraná (PR):</option>
                                        <option value="pe">Pernambuco (PE):</option>
                                        <option value="pi">Piauí (PI):</option>
                                        <option value="rj">Rio de Janeiro (RJ)</option>
                                        <option value="rn">Rio Grande do Norte (RN)</option>
                                        <option value="rs">Rio Grande do Sul (RS)</option>
                                        <option value="ro">Rondônia (RO)</option>
                                        <option value="rr">Roraima (RR)</option>
                                        <option value="sc">Santa Catarina (SC)</option>
                                        <option value="sp">São Paulo (SP)</option>
                                        <option value="se">Sergipe (SE)</option>
                                        <option value="to">Tocantins (TO):</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cep">CEP:</label>
                                    <input type="text" class="form-control" id="cep" name="cep">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="termos" name="termos" required>
                                    <label class="form-check-label" for="temos">
                                        Concordo com os termos
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Cadastrar!</button>
                            </div>
                        </form>
                        <a href="paginaLogin.php" class="nav-link mt-3">Ja possui uma conta? Faça login!</a>
                    </div>
                </div>
                </form>
            </div>
</body>

</html>