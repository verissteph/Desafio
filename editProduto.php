<?php
session_start();
//primeiro: qnd apertar o botao de editar produto na lista deve encaminhar para esta página e trazer informação que tem guardada no Json
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container my-3">
        <span>
            <h1>Editar Produto</h1>
        </span>
        <form method="POST">
            <div class="row">
                <div class="col">
                    <label for="form-control">Nome</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
                <div class="col">
                    <label for="form-control">Preço</label>
                    <input type="text" class="form-control" name="preco">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="descricao"></textarea>
            </div>
            <div class="imagem my-3">
                <!-- Ajustar a imagem -->
                <img src="" class="img-fluid rounded max-width: 100%">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="upload" required>
                <label class="custom-file-label" for="customFile">Selecione a foto</label>
            </div>
            <div class="button-add py-3">
                <button type="submit" class="btn btn-warning btn-block" name="editar">Editar</button>
            </div>
        </form>
    </div>
</body>

</html>