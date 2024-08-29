<?php
    include('verifica_login.php');
?>

<h2>
    Olá, 
    <?php 
        echo $_SESSION['usuario']; 
    ?>
</h2>

<h2><a href="./logout.php">Encerrar sessão</a></h2>