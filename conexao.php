<?php
    //criando constantes para conexao
    define('HOST', '127.0.0.1');
    define('USUARIO', 'andreeezinho@localhost');
    define('SENHA', 'Bombomgamer1!');
    define('DB', 'login');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível se conectar com o banco de dados :(');

