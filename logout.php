<?php
    session_start();

    //remover todas as sessões
    session_destroy();

    header('Location: index.php');
    exit();