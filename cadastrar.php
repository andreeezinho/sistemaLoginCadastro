<?php
    session_start();
    
    include('conexao.php');

    //pegando campos do formulario... mysqli_real... recebe (instancia da conexao e o campo)
                                                ///trim() para excluir os espaços do inicio o do fim da string
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha']))); //mds() para criptografar a senha 

    ///validar se usuario existe ou nao
    $sql = "select count(*) as total from usuario where usuario = '$usuario'";

    //executar a query do sql
    $result = mysqli_query($conexao, $sql);

    // variavel que mostra se tem algum usuario (1) ou se nao tem (0)
    $row = mysqli_fetch_assoc($result);

    //verifica a $row
    if($row['total'] != 0){
        //criar sessao que usuario existe
        $_SESSION['usuario_existe'] = true;

        //redirecionar para cadastro.php novamente
        header('Location: cadastro.php');
        exit;
    }

    //criando insert para inserir dados no BD
    $sql = "INSERT INTO usuario(nome, usuario, senha, data_cadastro) values ('$nome','$usuario','$senha',NOW())";

    //validar insert
    if($conexao->query($sql) === TRUE){
        //cria sessao do que o cadastro foi efetuado
        $_SESSION['status_cadastro'] = true;
    }

    //fechar conexao
    $conexao->close();

    header('Location: cadastro.php');
    exit;