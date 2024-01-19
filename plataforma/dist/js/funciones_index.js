// funcion para mostrar u ocultar el password en index
function verpass(){
var password = document.querySelector('#password');
if ( password.type === "text" ) {
    password.type="password"
    $('#iconpassword').removeClass('fas fa-lock');
    $('#iconpassword').toggleClass('fas fa-unlock');
    } else {
    password.type="text" 
    $('#iconpassword').removeClass('fas fa-unlock');
    $('#iconpassword').toggleClass('fas fa-lock');
    }
}

// funcion para el login de acceso
function login() {
var username= $('#username').val();
var password= $('#password').val();

$.ajax({
            url: 'consultas/login',
            type: "POST",
            data: {"username":username,"password":password},
            success: function (cmb) {
                 // alert(cmb);
                 if (cmb==1){
                    window.location="dashboard?token=6f19e8d4f5df8fae1e124941a48d980f";
                 } else {
                  $(function() {
                  var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2500
                  });

                  $(document).ready(function() {
                    Toast.fire({
                      icon: 'error',
                      title: '  Los datos de acceso no son válidos'
                    })
                  });
                  });
                 }
            }
        });

// alert('se hace el login'+ username);
}