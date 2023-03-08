<?php
    require 'db_connection.php';
    session_start();
    $usuario = $_POST['usuario'];
    $contraseña =$_POST['contraseña'];
    if(empty($usuario) || empty($contraseña)){
        echo "Llene todos los campos";
    }
    else{
        $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
        $params = array($_POST['usuario'], $_POST['contraseña']);

        $stmt = sqlsrv_query($connection, $tsql, $params);

        if($row = sqlsrv_fetch_array($stmt)){ //validamos si se encontro el registro
            $_SESSION['username'] = $usuario;
            header("Location: dashboard.php"); //redirigir al usuario al dashboard después de iniciar sesión
        }
        else{ //accion si no se encuentra el registro
            echo "Usuario no encontrado.";
        }
        sqlsrv_close($connection);
    }

?>