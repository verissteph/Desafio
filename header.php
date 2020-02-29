<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                < Desafio PHP /> </a>
                <?php if(isset($_SESSION['email'])): // erro aqui, quando coloco a negação antes do ISSET ta tratando como se todas as paginas nao tivessem uma sessão mesmo com o session_start em cada uma. Como não solucionei, deixo aqui esta observação para o feedback. ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="indexProduto.php">Home <span class="sr-only">(Página atual)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="createProduto.php">Adicionar produto</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="createUsuario.php">Usuários</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <form method="post">
                                <button type="submit" class="btn btn-dark" name="logout">Logout</button></a>
                            </form>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
        </div>
    </nav>
</header>


<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
}
?>