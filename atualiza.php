<?php
    //iniciar sessao
    session_start();

    //importar o arquivo de conexao com bd
    include('conexao.php');

    //pegar campos do formulario //mysqli precisa de (instancia da conexao e o campo)
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

    //validar se usuario existe ou nao
    $sql = "select count(*) as verificar from usuario where usuario = '$usuario'";

    //executar query
    $result = mysqli_query($conexao, $sql);

    //var que mostra se resulta é true ou false (1 ou 0)
    $row = mysqli_fetch_assoc($result);

    if($row['verificar'] != 1){
        //se for true, cria sessao que usuario existe
        $_SESSION['usuario_nao_existe'] = true;

        //redireciona novamente para painel
        header('Location: painel.php');
        exit;
    }

    //fazendo o update da senha depois que usuario foi confirmado
    $sql = "UPDATE usuario SET senha = '$senha' where usuario = '$usuario'";

    //validar o update
    if($conexao->query($sql) === TRUE){
        //cria sessao que atualizou senha
        $_SESSION['atualizou'] = true;
    }   

    //fechar conexao com o bd
    $conexao->close();

    header('Location: painel.php');
    exit;
    