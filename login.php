<?php
    session_start();

    //importar arquivo de conexao com banco de dados
    include('conexao.php');

    //validar se usuario nao acessou login.php direto pelo domínio
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: index.php');
        exit();
    }

    //mysqli_real_escape_string serve para proteger de ataques de SQL INJECTION contra o login
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    //query para veriricar se dados do login estao certos ou nao
    $query = "select usuario_id, nome from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

    //executar a query
    $result = mysqli_query($conexao, $query);

    //se 0 validação nao autenticada, se 1 validação autenticada (echo para testar)
    $row = mysqli_num_rows($result);

    if($row == 1){
        //colocando nome do usuario ao inves só do usuario
        $usuario_bd = mysqli_fetch_assoc($result);
        $_SESSION['nome'] = $usuario_bd['nome'];
        header('Location: painel.php');
        exit();
    }else{
        $_SESSION['nao_autenticado']  = true;
        header('Location: index.php');
        exit();
    }


