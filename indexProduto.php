<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações do produto</title>
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
    <div class="container py-2">
        <h1>Lista de Produtos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                    <th scope="col">Informações do Produto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Produto 1</td>
                    <td>Descrição Produto 1</td>
                    <td>R$ 15</td>
                    <td>
                        <button type="button" class="btn btn-info">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                    <td>
                        <link href="showproduto.php">Detalhes do Produto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Camiseta</td>
                    <td>djfnrjfnrnv</td>
                    <td>R$ 10</td>
                    <td>
                        <button type="button" class="btn btn-info">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </td>
                    <td>
                        <link href="showproduto.php">Detalhes do Produto</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>