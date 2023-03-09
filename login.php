<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Inicio de Sesión</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-------Image-------->
                </div>
                    <div class="col-md-6 right">
                        <form class="needs-validation" method="post" action="loginController.php" novalidate>
                            <div class="input-box">
                                <header>¡Bienvenido (a)!</header>
                                <div class="input-field">
                                    <input type="text" class="input" id="user" required name="usuario" autocomplete="off">
                                    <label for="user">Usuario</label>
                                </div>
                                <div class="input-field">
                                    <input type="password" class="input" id="pass" required name="contraseña">
                                    <label for="pass">Contraseña</label>
                                </div>
                                <br>
                                <div class="input-field">
                                    <button type="submit" class="submit" name="btnIngresar" id="btn-login" >Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

        <script>
            $(document).ready(function(){
            $("#btn-login").click(function(e){
            e.preventDefault(); //Previene la recarga de la página

            var usuario = $("#user").val();
            var contraseña = $("#pass").val();

            if(usuario == "" || contraseña == ""){
                Swal.fire({
                    title: 'Error!',
                    text: 'Por favor, completa todos los campos',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return false;
            }

            $.ajax({
                type: "POST",
                url: "loginController.php",
                data: {usuario: usuario, contraseña: contraseña},
                success: function(response){
                    if(response == "Success"){
                        window.location.href = "dashboard.php";
                    }
                    else{
                        Swal.fire({
                            title: 'Error!',
                            text: 'Usuario no encontrado.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        $("#user").val('');
                        $("#pass").val('');
                    }
                    }
                });
            });
        });
    </script>

</body>
</html>