<?php session_start();
$meujson_deco = [];
if (isset($_GET['email'])) {
    $armazena_json = file_get_contents('dadosUsuario.json'); // peguei os dados do Json
    $meujson_deco = json_decode($armazena_json, TRUE); // retornando um array e não um objeto
    $posicao_user = array_search($_GET['email'], array_column($meujson_deco, 'email')); //pesquisando a posição do usuario pelo email que será o ID
}
//---------------------------------VALIDAÇÃO--------------------------------------
if (isset($_POST['edita'])) {
    $array_erro_usuario = [];
    if (empty($_POST['nome']) && empty($_POST['email']) && empty($_POST['senha'])) {
        $array_erro_usuario[] = 'ERRO - Preencha os campos.';
    } else {
        $nome = $_POST['nome'];
        if (empty($nome)) {
            $array_erro_usuario[] = 'ERRO - Inclua o nome do usuário.';
        }
        $email = $_POST['email'];
        if (empty($email)) {
            $array_erro_usuario[] = "ERRO - Inclua o email do usuário.";
        }

    }
    //JSON
    if (empty($array_erro_usuario)) { //ESTAVA DANDO ERRO AQUI,POIS SE N BOTASSE SENHA A VALIDACAO PREENCHIA O ARRAY ERRO E N ENTRAVA NESSA CONDIÇÃO
        //echo "ola";
        $dados_edit_user = [
            'id'=> $_POST['id'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email']
        ];
        //logica da senha
        if (empty($_POST['senha'])) {
            $dados_edit_user['senha'] = $meujson_deco[$posicao_user]['senha'];
        } else {
            $dados_edit_user['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }
        $meujson_deco[$posicao_user] = $dados_edit_user;
        
        //$dados_user_editados = ;
        file_put_contents('dadosUsuario.json', json_encode($meujson_deco, JSON_PRETTY_PRINT));
    }
    header("location: createUsuario.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php require('header.php'); ?>
    <div class="container my-3">
        <span>
            <h2>Editar Usuario</h2>
        </span>
        <form class="w-100 p-3 m-0" method="POST">
            <div class=" form-group">
                <input type="hidden" class="form-control" id="inputId" aria-describedby="namelHelp"  value="<?php echo $meujson_deco[$posicao_user]['id']; //CRIANDO O ID DO USUARIO?>" name="id">
            </div>
            <div class=" form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" aria-describedby="namelHelp" placeholder="Adm" value="<?php echo $meujson_deco[$posicao_user]['nome']; ?>" name="nome">
            </div>
            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="adm@adm.com" value="<?php echo $meujson_deco[$posicao_user]['email']; ?>" name="email">
            </div>
            <div class=" form-group">
                <label for="inputPassword " class="mt-0 mb-1">Senha</label>
                <small id="passwordHelp " class="form-text text-muted">Mínimo 6 caracteres.</small>
                <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" name="senha">
            </div>
            <div class="form-group">
                <label for="inputConfirmaPassword">Confirmar Senha</label>
                <input type="password" class="form-control" id="inputConfirmaPassword" name="conf-senha">
            </div>
            <button type=" submit" class="btn btn-warning btn-lg btn-block" name="edita">Editar</button>
        </form>
    </div>
</body>

</html>