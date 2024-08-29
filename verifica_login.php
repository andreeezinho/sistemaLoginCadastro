<?php   
    //session_start() para capturar sessao que foi armazenada
    session_start();

    //se a sessao do usuario nao existir, direcionar novamente para index
    if(!$_SESSION['usuario']){
        header('Location: index.php');
        exit();
    }