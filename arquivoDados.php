<?php
//aqui vou pegar os dados em formato json
$meujson=file_get_contents('dadosProduto.json');

//convertendo em array assoc para caso queira efetuar uma modificação
$dado=json_decode($meujson,TRUE); //Aqui eu peguei meu arquivo em json e true para ele ser um array

//volta a ser um arq json 
$meuNovoJson=json_encode($dado);

//envio do arq atualizado
file_put_contents('dadosProduto.json','$meuNovoJson');


?>