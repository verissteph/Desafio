<?php
include('header.php');
session_start();
$att_produto = [];
// if (isset($_GET['id'])) { //se tiver id na url
//     $dados_produtos = file_get_contents('dadosProduto.json'); //pegar os dados JSON
//     $array_produtos = json_decode($dados_produtos, true); //Transformar em um array de varios arrays
//     foreach ($array_produtos as $posicao => $produto) { // percorrer cada array
//         if ($_GET['id'] == $produto['id']) {
//             var_dump($produto);
//             exit;
//         }
//     }
// }
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
    <div class="container my-3">
        <span>
            <h1>Editar Produto</h1>
        </span>
        <form method="POST">
            <div class="row">
                <?php if (isset($_GET['id'])) : //se tiver id na url
                ?>
                    <?php $dados_produtos = file_get_contents('dadosProduto.json'); //pegar os dados JSON
                    $array_produtos = json_decode($dados_produtos, true); //Transformar em um array de varios arrays
                    ?>
                    <?php foreach ($array_produtos as $posicao => $produto) : // percorrer cada array
                    ?>
                        <?php if ($_GET['id'] == $produto['id']) : ?>
                            <div class="col">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $produto['id'] ?>">
                                <label for="form-control">Nome</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $produto['nome'] ?>">
                            </div>
                            <div class="col">
                                <label for="form-control">Preço</label>
                                <input type="text" class="form-control" name="preco" value="<?php echo $produto['preco'] ?>">
                            </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="descricao">
                <?php echo $produto['descricao'] ?>
                </textarea>
            </div>
            <div class="imagem my-3">
                <!-- Ajustar a imagem e mostrar aqui. REVER ESSA PARTE-->
                <?php ?>
                <img src="<?php echo "\C:xampp\exerciciophp\desafio-php\img\.$produto[foto]";?>" class="width:300px">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="upload">
                <label class="custom-file-label" for="customFile">Selecione a foto</label>
            </div>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
<div class="button-add py-3">
    <button type="submit" class="btn btn-warning btn-block" name="editar">Editar</button>
</div>
        </form>
    </div>
</body>

</html>