<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    < Desafio PHP /> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
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
    <div class="container my-3">
        <span>
            <h2>Editar Usuario</h2>
        </span>
        <form class="w-100 p-3 m-0">
            <div class=" form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" aria-describedby="namelHelp" placeholder="Adm">
            </div>
            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="adm@adm.com">
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
            <button type="submit" class="btn btn-warning btn-lg btn-block">Editar</button>
        </form>
    </div>
</body>

</html>
