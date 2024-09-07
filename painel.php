<?php
    include('verifica_login.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Usuário - andreeezinho</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <section class="hero is-success is-fullheight">
            <div class="box has-text-centered">
                <h2>
                    Olá, 
                    <?php 
                        echo $_SESSION['nome']; 
                    ?>
                </h2>
            </div>

            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
                        <div class="box">
                            <h2 class="title has-text-grey">Deseja alterar sua senha?</h2>

                            <?php 
                                //se a sessao atualizou for true
                                if(isset($_SESSION['atualizou'])):
                            ?>
                                <div class="notification is-success">
                                    <p>Senha alterada! <a href="logout.php">Encerre sua sessão aqui para usá-la</a></p>
                                </div>
                            <?php
                                //finalizar o if
                                endif;
                                
                                //limpa sessao para nao renderizar idc
                                unset($_SESSION['atualizou']);
                            ?>

                            <?php 
                                if(isset($_SESSION['usuario_nao_existe'])):
                            ?>
                                <div class="notification is-danger">
                                    <p>ERRO: Usuário nao encontrado.</p>
                                </div>
                            <?php 
                                //finaliza o if
                                endif;

                                //limpar sessao para div nao renderizar
                                unset($_SESSION['usuario_nao_existe']);
                            ?>

                            <form action="atualiza.php" method="POST">
                                <div class="field">
                                    <div class="control">
                                        <input name="usuario" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                    </div>
                                </div>

                                <div class="field">
                                    <div class="control">
                                        <input name="senha" class="input is-large" type="password" placeholder="Insira sua nova senha">
                                    </div>
                                </div>

                                <button type="submit" class="button is-block is-link is-large is-fullwidth">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box has-text-centered">
                <h2><a href="./logout.php">Encerrar sessão</a></h2>
            </div>
    </section>
    
</body>
</html>


