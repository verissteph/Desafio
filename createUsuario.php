<?php
session_start();
//codigo independente do IF!
$armazena_json = file_get_contents('dadosUsuario.json'); // peguei os dados do Json
$meujson_deco = json_decode($armazena_json, TRUE); // retornando um array e não um objeto
//Validando campos
if (isset($_POST['envio'])) {
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

        $senha = $_POST['senha'];
        if (empty($_POST['senha'])) {
            $array_erro_usuario[] = "ERRO - Inclua a senha.";
        } else if (strlen($senha) < 6) {
            $array_erro_usuario[] = "ERRO - A senha não atende o critério.";
        }
        $conf_senha = $_POST['conf-senha'];
        if ($senha != $conf_senha) {
            $array_erro_usuario[] = "ERRO - As senhas não são iguais.";
        }
    }
    //JSON
    if (empty($array_erro_usuario)) {

        $dado_usuario = [
            'id' => " ",
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => password_hash($senha, PASSWORD_DEFAULT)
        ];

        if ($meujson_deco == null) {
            $dado_usuario['id'] = 1;
        } else {
            $dado_usuario['id'] = count($meujson_deco) + 1;
        }
        $meujson_deco[] = $dado_usuario; // pegou os dados para colocar na ultima posição
        // echo("<pre>");
        // print_r($meujson_deco);
        // echo("</pre>");
        // exit;
        $novo_json = json_encode($meujson_deco, JSON_PRETTY_PRINT); // transformei novamente em json
        file_put_contents('dadosUsuario.json', $novo_json); // incluindo novamente no json

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container style=" style="display:flex;">
        <!-- CRIAR GROUP LIST -->
        <div class="listas w-50 p-3 m-0">
            <ul class="list-group list-group-flush">
                <h1>Usuários</h1>
                <?php
                foreach ($meujson_deco as $users) : ?>
                    <li class="list-group-item ">

                        <div class="nome d-flex justify-content-between align-items-center">
                            <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
                        </div>
                        <div class="nome d-flex justify-content-between align-items-center">
                            <?php echo $users['nome']; ?>
                            <a href="editUsuario.php?email=<?php echo $users['email']; ?>" class="btn btn-info mt-2">Editar</a>
                        </div>
                        <div class="nome d-flex justify-content-between align-items-center">
                            <?php echo $users['email']; ?>
                            <a href="deletarUsuario.php?id=<?php echo $users['id']; ?>" class="btn btn-danger">Excluir</a>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- ACABA O GROUP LIST -->
        <form action="" method="POST" class="w-75 p-3 m-0">
            <h1>Criar usuário</h1>

            <?php
            if (!empty($array_erro_usuario)) {
                foreach ($array_erro_usuario as $erro_usuario) {
                    echo "<li style='color:#ff0000 '> $erro_usuario </li>";
                }
            } ?>
            <div class=" form-group">
                <input type="hidden" class="form-control" id="inputId" aria-describedby="idlHelp" name="id">
            </div>
            <div class=" form-group">
                <label for="inputNome">Nome</label>
                <input type="text" class="form-control" id="inputNome" aria-describedby="namelHelp" name="nome">
            </div>
            <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="inputPassword " class="mt-0 mb-1">Senha</label>
                <small id="passwordHelp " class="form-text text-muted">Mínimo 6 caracteres.</small>
                <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" name="senha">
            </div>
            <div class="form-group">
                <label for="inputConfirmaPassword">Confirmar Senha</label>
                <input type="password" class="form-control" id="inputConfirmaPassword" name="conf-senha">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="envio">Enviar</button>
        </form>
    </div>
</body>

</html>