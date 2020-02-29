<?php session_start();
$armazena_json = file_get_contents('dadosUsuario.json'); // peguei os dados do Json
$meujson_deco = json_decode($armazena_json, TRUE); // retornando um array e não um objeto
//$posicao_userId = array_search($_GET['id'], array_column($meujson_deco, 'id'));


foreach ($meujson_deco as $indice => $usuarios) {
    if ($usuarios['id'] == $_GET['id']) {
        array_splice($meujson_deco, $indice, 1);
    }
}
    
    $novo_json_del_usuario = file_put_contents('dadosUsuario.json', json_encode($meujson_deco, JSON_PRETTY_PRINT));
    header("Location: createUsuario.php");
?>