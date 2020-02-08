<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    < Desafio PHP /> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(Página atual)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="#">Adicionar produto</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="#">Usuários</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link  " href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <!-- CRIAR GROUP LIST -->
        <h1>Criar Usuário</h1>
        <form>
            <div class="form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" aria-describedby="namelHelp">
            </div>

            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="inputPassword " class="mt-0 mb-1">Senha</label>
                <small id="passwordHelp " class="form-text text-muted">Mínimo 6 caracteres.</small>
                <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp">
            </div>

            <div class="form-group">
                <label for="inputConfirmaPassword">Confirmar Senha</label>
                <input type="password" class="form-control" id="inputConfirmaPassword">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </form>

    </div>
</body>

</html>