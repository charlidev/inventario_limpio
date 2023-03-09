//Aquí van todas las funciones de JavaScript que se utilicen

const loginUsuario=async()=>{
    var usuario = document.querySelector("#user").value;
    var password = document.querySelector("#pass").value;

    if(usuario.trim()==='' || password.trim()===''){
        Swal.fire({
            icon: 'error',
            title: 'CAMPOS INCOMPLETOS',
            text: 'Por favor, ingresa correctamente tus credenciales.',
          });
    }
}