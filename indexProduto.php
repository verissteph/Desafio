<!DOCTYPE html>
<?php
session_start();
    $le_arq = file_get_contents('dadosProduto.json');
    $armazena_decode = json_decode($le_arq, true);
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
    <?php include('header.php'); ?>
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
                if ($armazena_decode) : ?>
                    <?php foreach ($armazena_decode as $cad_prod) : ?>
                        <tr>
                            <td><?php echo $cad_prod['id']; ?></td>
                            <td><?php echo $cad_prod['nome']; ?></td>
                            <td><?php echo $cad_prod['descricao']; ?></td>
                            <td><?php echo $cad_prod['preco']; ?></td>
                            <td>
                                <a href="editProduto.php?id=<?php echo $cad_prod['id'];?>" class="btn btn-info" >Editar</a>
                                    <!-- <button type="button" class="btn btn-info" name="edit">Editar </button> -->
                                <!-- </a> -->
                                <button type="button" class="btn btn-danger" name="delete"> Excluir </button>
                            </td>

                        <?php endforeach ?>
                    <?php endif ?>
            </tbody>
        </table>
    </div>
</body>

</html>
