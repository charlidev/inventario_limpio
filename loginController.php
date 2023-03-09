<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    require 'db_connection.php';
    session_start();
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    if(empty($usuario) || empty($contraseña)){
        echo "<script>
        window.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                title: 'Error!',
                text: 'Por favor, completa todos los campos',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
      </script>";
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
            echo "<script>
            window.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    title: 'Error!',
                    text: 'Usuario no encontrado.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
          </script>";
        }
        sqlsrv_close($connection);
    }

?>