<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    require 'db_connection.php';
    $datos=array();
    session_start();
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    $tsql = "SELECT * FROM tblLogin WHERE Usuario = ? AND Contrasena = ?";
    $params = array($_POST['usuario'], $_POST['contraseña']);

    $stmt = sqlsrv_query($connection, $tsql, $params);

    if($row = sqlsrv_fetch_array($stmt)){ //validamos si se encontro el registro
        $_SESSION['username'] = $usuario;
        $datos['status']=1;
    }else{
        $datos['status']=0;
    }

    $json=json_encode($datos);
    echo $json; //enviamos los resultados al FRONT-END

    sqlsrv_close($connection);
?>