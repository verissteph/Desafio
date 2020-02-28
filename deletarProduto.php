<?php

$dados_produtos = file_get_contents('dadosProduto.json');
$array_produtos = json_decode($dados_produtos, true);

foreach ($array_produtos as $indice => $produtos) {
    if ($produtos['id'] == $_GET['id']) {
        array_splice($array_produtos, $indice, 1);
    }
}
    $array_json = json_encode($array_produtos, JSON_PRETTY_PRINT);
    $novo_json_del = file_put_contents('dadosProduto.json', $array_json);
    header("Location: indexProduto.php");
?>