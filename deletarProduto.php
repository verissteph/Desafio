<?php

$dados_produtos = file_get_contents('dadosProduto.json');
$array_produtos = json_decode($dados_produtos, true);

foreach ($array_produtos as $indice => $produtos) {
    // if (($produtos['foto'])) {
    //     $caminho = "/img".date("ymdHis") . '-' . $_FILES['uploadedit']['name'];
    //     unlink($$caminho);
 //Não está funcionando para deletar a foto da pasta img. A logica parece certa.
    if ($produtos['id'] == $_GET['id']) {
        array_splice($array_produtos, $indice, 1);
    }
}


    // echo ("<pre>");
    // print_r($array_produtos);
    // echo ("</pre>");
    // exit;

    $array_json = json_encode($array_produtos, JSON_PRETTY_PRINT);
    $novo_json_del = file_put_contents('dadosProduto.json', $array_json);
    header("Location: indexProduto.php");
?>