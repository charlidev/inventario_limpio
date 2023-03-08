<?php
    session_start();
    $usuario = $_SESSION['username'];
    
    if(!isset($usuario)){
        header('Location: login.php');
    }else{
        echo "<h1>Bienvenido $usuario </h1>";
        echo "<a href='logout.php'>Salir</a>";
    }
?>
