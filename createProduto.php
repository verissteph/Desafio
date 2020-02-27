<?php
session_start();
include('header.php');


//--------------------------------------Validando campos----------------------------------------------

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

//--------------------------------------------------JSON------------------------------------------
if (!empty($_POST) && empty($array_erro)) {
    // lógica de que não pode enviar info se todos os campos obrigatorios estiverem vazios
    // recebendo os POSTS
    $cadastro_produto = [
        "id"=>"",
        "nome"=>$_POST['nome'],
        "preco"=>$_POST['preco'],
        "descricao"=>$_POST['descricao'],
        "foto"=> date("ymdHis") . '-' . $FILES['upload']['name'] 
    ]; //colocando o ID antes dos outros elementos do array
    $dados_produtos = file_get_contents('dadosProduto.json');
    $array_produtos = json_decode($dados_produtos, true); //ele vai transformar em array assoc
    //------------------------------------------CRIANDO ID---------------------------------------------
    
    //Condição caso o arqv json esteja vazio, ele vai atribuir ao indice ID e criar ID para cada produto
    if ($array_produtos == null) {
        $cadastro_produto['id'] = 1; //a posição ID irá receber o valor 1
        //array_unshift($array_produtos, $cadastro_produto['id']);
    } else {
        $cadastro_produto['id'] = count($array_produtos) + 1;
        //array_unshift($array_produtos, $cadastro_produto['id']);
    }
    //------------------------------------------IMAGEM----------------------------------------------------

    //mostra infos do arquivo
    $info_img = pathinfo($_FILES['upload']['name']);
    //mostra qual extensao do arquivo 
    $extensao_img = $info_img['extension'];
    //renomeando o arquivo 
   // $rename_img = $name_img = $info_img['filename'] . "-" . $cadastro_produto['id'] . '.' . $extensao_img;
   $rename_img=date("ymdHis").'-'.$FILES['upload']['name'];
//------------------------------------------------------------------------------------------------------

    //inserir conteudo do cadastro do produto do formulario no array 
    $array_produtos[] = $cadastro_produto;
    //transformar novamente em JSON 
    $json_produtos = json_encode($array_produtos, JSON_PRETTY_PRINT);
    //guarda o conteudo ''string'' no arquivo JSON
     file_put_contents('dadosProduto.json', $json_produtos);
    //Para armazenar a imagem na pasta de imagem:
    if (is_dir('img/')) {
        move_uploaded_file($_FILES['upload']['tmp_name'], 'img/' . $rename_img);
    } else {
        mkdir('img/');
        move_uploaded_file($_FILES['upload']['tmp_name'], 'img/' . $rename_img);
    }
    header('location: indexProduto.php');
}
// ---------------------------------------------FIM JSON -------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro Produtos</title>
</head>

<body>

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
                <button type="submit" class="btn btn-info btn-block" name="adicionar">Adicionar</button>
            </div>
        </form>
    </div>
</body>

</html>