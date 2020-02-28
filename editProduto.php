<?php session_start();
include('header.php');

$dados_produtos = file_get_contents('dadosProduto.json');
$array_produtos = json_decode($dados_produtos, true);
$foto_edit = date("ymdHis") . '-' . $_FILES['uploadedit']['name'];//poderia tentar iniciar com id e caso o id fosse igual iria substituir uma imagem pela outra. No caso de editar e colocar uma foto nv, senao iria permanecer a que ja existe;

foreach ($array_produtos as $produto_do_array) {
    if ($produto_do_array['id'] == $_GET['id']) {
        $produto = $produto_do_array;
    }
}
if ($_POST) {
    $array_erros = [];
    $array_produto_atualizado = [];
    if (empty($_POST['nome'])) {
        $array_erros[] = 'ERRO - Preencha o nome do produto';
    }
    if (!is_numeric($_POST['preco'])) {
        $array_erros[] = 'ERRO - O preço deve conter apenas números';
    }
    if (isset($_FILES['uploadedit']['tmp_name'])) { //tef ajudou
        $foto_edit = date("ymdHis") . '-' . $_FILES['uploadedit']['name'];
        $foto_nome = $_FILES['uploadedit']['tmp_name'];
        $foto_camin = "img/" . $foto_edit;
        move_uploaded_file($foto_nome, $foto_camin);
    } elseif (empty($_FILES['uploadedit']['tmp_name'])) {
        $foto_edit = $produto['foto'];
    }
    if (empty($array_erros)) {
        $array_produto_atualizado = [
            "id" => $_GET['id'],
            "nome" => $_POST['nome'],
            "preco" => $_POST['preco'],
            "descricao" => $_POST['descricao'],
            "foto" => $foto_edit
        ];
        $atualiza = array_merge($produto, $array_produto_atualizado);
        $array_produtos = json_decode($dados_produtos, true);
        foreach ($array_produtos as $indice => $produto) {
            if ($produto['id'] == $_GET['id']) {
                $array_produtos[$indice] = $atualiza;
            }
        }
        $array_json = json_encode($array_produtos, JSON_PRETTY_PRINT);
        $novo_json_edit = file_put_contents('dadosProduto.json', $array_json);
        header("location: indexProduto.php");
        // echo ("<pre>");
        // var_dump($array_produtos);
        // echo ("</pre>");

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
    <div class="container my-3">
        <span>
            <h1>Editar Produto</h1>
        </span>
        <form method="POST" enctype="multipart/form-data">
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

                <?php ?>
                <img src="<?php echo "img/$produto[foto]" ?>" class="imagem" style="width:80%;height: auto;margin: auto">
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="uploadedit">
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>