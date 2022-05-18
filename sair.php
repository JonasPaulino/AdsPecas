<?php
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    //manda pra login
    header('location: index.php');
?>;