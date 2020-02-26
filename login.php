<?php
session_start();
$armazena_json = file_get_contents('dadosUsuario.json'); //pegando dados do json
$meujson_deco = json_decode($armazena_json, TRUE);//transformando em array para manipula-lo
 //var_dump($meujson_deco);

if($_POST){//se apertarmos no botão ENTRAR
    var_dump($_POST);
foreach($meujson_deco as $usuarios){ //vai retornar para cada array dentro do array q era json como usuarios, um por um.
        if ((password_verify($_POST['senha'],$usuarios['senha'])) && ($usuarios['email'] == $_POST['email_login'])){ //se a senha verificada for igual a que colocamos no campo senha E SE o usuario email for o mesmo do que está no campo, ele irá:
            header("location: indexProduto.php"); //redireciona para a pag principal
        } else{
            header("location: login.php"); //dá um refresh na pagina e nao sai dela.
        }
        }
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container w-50 mt-4 p-3">
        <form method="POST">
            <h2>Login</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_login">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block mt-5" name="logar">Entrar</button>
        </form>
    </div>
</body>

</html>