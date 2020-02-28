<!DOCTYPE html>
<?php
include('header.php');
session_start();
$dados_produtos = file_get_contents('dadosProduto.json');
$array_produtos = json_decode($dados_produtos, true);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informações dos produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container py-2 mx-2">
        <h1>Lista de Produtos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($array_produtos) : ?>
                    <?php foreach ($array_produtos as $produto) : ?>
                        <tr>
                            <td><?php echo $produto['id']; ?></td>
                            <td><?php echo $produto['nome']; ?></td>
                            <td><?php echo $produto['descricao']; ?></td>
                            <td><?php echo $produto['preco']; ?></td>
                            <td>
                                <a href="editProduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-info">Editar</a>
                                <!-- <button type="button" class="btn btn-info" name="edit">Editar </button> -->
                                <!-- </a> -->
                                <a href="deletarProduto.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger">Excluir</a>
                                <!-- <button type="button" class="btn btn-danger" name="delete" value=""> Excluir </button> -->
                            </td>

                        <?php endforeach ?>
                    <?php endif ?>
            </tbody>
        </table>
    </div>
</body>

</html>