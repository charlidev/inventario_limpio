<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    require 'db_connection.php';
    session_start();
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
        $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
        $params = array($_POST['usuario'], $_POST['contraseña']);

        $stmt = sqlsrv_query($connection, $tsql, $params);

        if($row = sqlsrv_fetch_array($stmt)){ //validamos si se encontro el registro
            $_SESSION['username'] = $usuario;  
        }else{
            
        }
        sqlsrv_close($connection);
?>