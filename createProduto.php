<!DOCTYPE html>

<?php

var_dump($_FILES);
//Validando campos
//preciso pensar na lógica de que não pode enviar info se todos os campos estiverem vazios
if (($_FILES)&&($_POST)){ 
    $array_erro = [];

    $preco = $_POST['preco'];
    if (empty($preco)){
        $array_erro[]= 'ERRO - O campo preço não pode ser vazio';
    }else if (!is_numeric($preco)) {
        $array_erro[] = "ERRO - O preço deve conter apenas números!";
    }
    $nome = $_POST['nome'];
        if (empty($nome)) {
            $array_erro[] = "ERRO - O campo nome não pode ser vazio!";
        }
        
    $foto = $_FILES['upload']["tmp_name"];
        if(!$foto) {
            $array_erro[] = "ERRO - Inclua uma foto!";
        }
}
?>

<?php
//ARQUIVO JSON
if ($_POST) {
   // recebendo os POSTS
    $cadastro = $_POST;
   // le arquivo
   $le_arq=file_get_contents('dadosProduto.json');
    $armazena_decode = json_decode($le_arq, true); //ele vai transformar em array assoc
    //inserir conteudo do cadastro do produto do formulario no array 
    $armazena_decode[]=$cadastro; 
    //transformar novamente em JSON 
    $conteudo_cadastro=json_encode($armazena_decode);
    //guarda o conteudo ''string'' no arquivo JSON
    $armazena_arq = file_put_contents('dadosProduto.json', $conteudo_cadastro);

    
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro Produtos</title>
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
    <div class="container ">
        <span>
            <h1> Adicionar Produto </h1>
            </span>
            <?php
                if(!empty($array_erro)){
                    foreach($array_erro as $erro){
                    echo"<li style='color:#ff0000 '> $erro </li>";
                    }
                }
                ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="form-control">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="col">
                    <label for="form-control">Preço</label>
                    <input type="text" class="form-control" name="preco">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="10"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="upload" id="customFile">
                <label class="custom-file-label" for="customFile">Selecione a foto</label>
            </div>
            <div class="button-add py-3">
                <button type="submit" class="btn btn-info btn-block" name="adicionar">Adicionar</button>
            </div>
        </form>
    </div>
</body>

</html>