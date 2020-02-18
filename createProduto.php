<!DOCTYPE html>

<?php

// var_dump($_FILES);
//Validando campos

if (($_FILES) && ($_POST)) {
    $array_erro = [];

    if (empty($_POST['preco']) && empty($_POST['nome']) && empty($_FILES['upload']['tmp_nome'])) {
        $array_erro[] = 'ERRO - Preencha os campos.';
    } else {
        $preco = $_POST['preco'];
        if (empty($preco)) {
            $array_erro[] = 'ERRO - Inclua o preço.';
        } else if (!is_numeric($preco)) {
            $array_erro[] = "ERRO - O preço deve conter apenas números.";
        }
        $nome = $_POST['nome'];
        if (empty($nome)) {
            $array_erro[] = "ERRO - Inclua o nome do produto.";
        }

        $foto = $_FILES['upload']["tmp_name"];
        if (!$foto) {
            $array_erro[] = "ERRO - Inclua uma foto.";
        }
    }
}
?>

<?php
//ARQUIVO JSON
if (!empty($_POST) && empty($array_erro)) {
    // lógica de que não pode enviar info se todos os campos obrigatorios estiverem vazios
    // recebendo os POSTS
    $cadastro = $_POST;
      // le arquivo
    $le_arq = file_get_contents('dadosProduto.json');
    $armazena_decode = json_decode($le_arq, true); //ele vai transformar em array assoc
    //Condição caso o arqv json esteja vazio, ele vai atribuir ao indice ID 
    if($armazena_decode==null){
            $cadastro['id']=1;  
    }else{
            $cadastro['id'] = count($armazena_decode)+1;
        }
    //$cadastro['imagem'] = $_FILES['upload']['name'];
    //mostra infos do arquivo
    $info = pathinfo($_FILES['upload']['name']);
    //mostra qual extensao do arquivo 
    $extension = $info['extension'];
    //renomeando o arquivo 
    $nome_imagem = $img_name= $info['filename']."-".$cadastro['id'].'.'.$extension;
    
    // var_dump($nome_imagem); exit;
    
    //inserir conteudo do cadastro do produto do formulario no array 
    $armazena_decode[] = $cadastro;
    //transformar novamente em JSON 
    $conteudo_cadastro = json_encode($armazena_decode);
    //guarda o conteudo ''string'' no arquivo JSON
    $armazena_arq = file_put_contents('dadosProduto.json', $conteudo_cadastro);
    //Para armazenar a imagem na pasta de imagem:
    if (is_dir('img/')) {
         move_uploaded_file($_FILES['upload']['tmp_name'], 'img/' . $nome_imagem);
     } else {
         mkdir('img/');
         move_uploaded_file($_FILES['upload']['tmp_name'], 'img/' . $nome_imagem);
     }
}



//TESTE PARA VER SE A IMAGEM APARECE
// $arquivo = $_FILES['uploa']['tmp_nome'];
// pega arq
// $pega_foto= file_get_contents('dadosProduto.json');
// $armazena_decode = json_decode($pega_foto,true);
// $armazena_decode[] = $arquivo;
// $foto_cadastro = json_encode($armazena_decode);
// $foto_armazenada = file_put_contents('dadosProduto.json',$foto_cadastro);

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
        if (!empty($array_erro)) {
            foreach ($array_erro as $erro) {
                echo "<li style='color:#ff0000 '> $erro </li>";
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
                <button type="submit" class="btn btn-info btn-block">Adicionar</button>
            </div>
        </form>
    </div>
</body>

</html>