<?php
session_start();
//primeiro: qnd apertar o botao de editar produto na lista deve encaminhar para esta página e trazer informação que tem guardada no Json
// echo("<pre>");
// var_dump($_SERVER);
// echo("</pre>");
$armazena_decode=[];

//$le_arq = file_get_contents('dadosProduto.json'); //pega arq json
//$armazena_decode = json_decode($le_arq, true); //transf em array
//if (isset($_GET['id'])) {
    
    //$posicao_produto = array_search($_POST['id'], array_column($armazena_decode, 'id')); //pesquisando a posição do produto pelo ID 
//}
// if($_SERVER['REQUEST_METHOD'] === $_POST){
//     //modifica os dados.
//     $le_arq = file_get_contents('dadosProduto.json'); //pega arq json
//     $armazena_decode = json_decode($le_arq, true); //transf em array  
//     $produto_att=[];
//     $produtos = $armazena_decode;
//         foreach($produtos as $indice => $produto){
//             if($produto['id']==$_GET['id']){
//                 $produtos[$indice] = $produto_att = array_merge($produto,$_POST);
//             }
//         }
//     $salva_produto=file_put_contents('dadosProduto.json',$produtos,);
// echo  $salva_produto;
// }

//---------------------------------VALIDAÇÃO CAMPOS---------------------------------
if (isset($_POST['edit'])) {
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
}

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
                    <input type="hidden" class="form-control" name="id" value="<?php echo  $armazena_decode['id']; ?>">
                    <label for="form-control">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo  $armazena_decode['nome']; ?>" >
                </div>
                <div class="col">
                    <label for="form-control">Preço</label>
                    <input type="text" class="form-control" name="preco" value="<?php echo  $armazena_decode['preco']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="descricao" value="<?php echo  $armazena_decode['descricao']; ?>"></textarea>
            </div>
            <div class="imagem my-3">
                <!-- Ajustar a imagem e mostrar aqui.-->
                <img src="" class="img-fluid rounded max-width: 100%">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="upload" >
                <label class="custom-file-label" for="customFile">Selecione a foto</label>
            </div>
            <div class="button-add py-3">
                <button type="submit" class="btn btn-warning btn-block" name="editar">Editar</button>
            </div>
        </form>
    </div>
</body>

</html>