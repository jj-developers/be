<?php
date_default_timezone_set ('America/Mexico_City');
@session_start();
require_once ('conexion.php');
class activarRegistro_class {

function accionesCliente() {
    //arreglo
    $datosCmb = $this->GETPOST();
    //llamar las funciones 
    if (array_key_exists('activarRegistro', $datosCmb)) {
         $resp= $this->activarRegistro();
    }
    if (array_key_exists('actualizarRegistro', $datosCmb)) {
         $resp= $this->actualizarRegistro();
    }
}

// funcion para dar de alta registro
function activarRegistro() {
$con=conexion();
$arrayDatos = $this->GETPOST();
// creo el numero de proveedor
// $idUsuario=$_SESSION['idUsuario'];
$hoy=date('Y-m-d H:i:s');

function generarCodigo($longitud) {
$key = '';
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
return $key;
}
$codigoP=generarCodigo(10);
$token=generarCodigo(24);

// subo el archivo a la carpeta CSF
$archivo = $_FILES['archivocsf'];
$archivonombre = $_FILES["archivocsf"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='../documentos/csf/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivocsf']['name']));
if ($extension!='') {
$url2 ='../documentos/csf/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url2);
$url ='documentos/csf/'.$nombreArchivo;
} else {
$url='';
}

//recibo variables post
$idUsuario=$arrayDatos['idUsuario'];
$nosucursales=$arrayDatos['nosucursales'];
$ticket=$arrayDatos['ticket'];
$nomesas=$arrayDatos['nomesas'];
$noempleados=$arrayDatos['noempleados'];
$dias=$arrayDatos['plazopago'];
$monto=$arrayDatos['monto'];
$tipocosto=$arrayDatos['tipocosto'];
$nameref1=$arrayDatos['nameref1'];
$telref1=$arrayDatos['telref1'];
$dirref1=$arrayDatos['dirref1'];
$comment1=$arrayDatos['comment1'];
$nameref2=$arrayDatos['nameref2'];
$telref2=$arrayDatos['telref2'];
$dirref2=$arrayDatos['dirref2'];
$comment2=$arrayDatos['comment2'];

// actualizo el registro de los usuarios para que pueda solicitar pedidos
$updateregistro="UPDATE th_usuarios SET usr_tipocosto='$tipocosto', usr_nosucursales=$nosucursales, usr_ticketpromedio='$ticket', usr_numeromesas=$nomesas, usr_numeroempleados=$noempleados, usr_diascredito=$dias, usr_montocredito='$monto', usr_archivocsf='$url', usr_nombrereferencia='$nameref1', usr_telefonoreferencia='$telref1', usr_dirreferencia='$dirref1', usr_comreferencia='$comment1', usr_nombrereferencia2='$nameref2', usr_telefonoreferencia2='$telref2', usr_dirreferencia2='$dirref2', usr_comreferencia2='$comment2', usr_estatus=3 where usr_idUsuario=$idUsuario";
$crea=mysqli_query($con,$updateregistro);

        if (!$crea) { ?>
        <script type="text/javascript">
             window.location="usuariosActivar?token=<?php echo $token ?>&success=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
              window.location="usuariosActivar?token=<?php echo $token ?>&success=true";
        </script>
        <?php }
}

function actualizarRegistro() {
$con=conexion();
$arrayDatos = $this->GETPOST();
// creo el numero de proveedor
// $idUsuario=$_SESSION['idUsuario'];
$hoy=date('Y-m-d H:i:s');

function generarCodigo($longitud) {
$key = '';
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
return $key;
}
$codigoP=generarCodigo(10);
$token=generarCodigo(24);

// subo el archivo a la carpeta CSF
$archivo = $_FILES['archivocsf'];
$archivonombre = $_FILES["archivocsf"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='../documentos/csf/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivocsf']['name']));
if ($extension!='') {
$url2 ='documentos/csf/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url2);
$url ='documentos/csf/'.$nombreArchivo;
$url2 ='plataforma/documentos/csf/'.$nombreArchivo;
} else {
$url='';
}

//recibo variables post
$nombrenegocio=$arrayDatos['nombrenegocio'];
$nombreusr=$arrayDatos['nombreusr'];
$apellidousr=$arrayDatos['apellidousr'];
$telefono=$arrayDatos['telefono'];
$puesto=$arrayDatos['puesto'];
$email=$arrayDatos['email'];
$giroempresa=$arrayDatos['giroempresa'];


$idUsuario=$arrayDatos['idUsuario'];
$nosucursales=$arrayDatos['nosucursales'];
$ticket=$arrayDatos['ticket'];
$nomesas=$arrayDatos['nomesas'];
$noempleados=$arrayDatos['noempleados'];
$dias=$arrayDatos['plazopago'];
$monto=$arrayDatos['monto'];
$tipocosto=$arrayDatos['tipocosto'];
$nameref1=$arrayDatos['nameref1'];
$telref1=$arrayDatos['telref1'];
$dirref1=$arrayDatos['dirref1'];
$comment1=$arrayDatos['comment1'];
$nameref2=$arrayDatos['nameref2'];
$telref2=$arrayDatos['telref2'];
$dirref2=$arrayDatos['dirref2'];
$comment2=$arrayDatos['comment2'];
$estatus=$arrayDatos['estatus'];


// actualizo el registro de los usuarios para que pueda solicitar pedidos
$updateregistro="UPDATE th_usuarios SET usr_nombrenegocio='$nombrenegocio', usr_nombre='$nombreusr',usr_apellidos='$apellidousr',usr_telefono='$telefono',usr_puesto='$puesto', usr_email='$email',usr_giroempresa=$giroempresa, usr_tipocosto='$tipocosto',usr_nosucursales=$nosucursales, usr_ticketpromedio='$ticket', usr_numeromesas=$nomesas, usr_numeroempleados=$noempleados, usr_diascredito=$dias, usr_montocredito='$monto', usr_estatus=$estatus where usr_idUsuario=$idUsuario";
$crea=mysqli_query($con,$updateregistro);

if ($url2!=''){
// actualizo solo si se cargo archivo
$updateregistro2="UPDATE th_usuarios SET usr_archivocsf='$url2' where usr_idUsuario=$idUsuario";
$crea2=mysqli_query($con,$updateregistro2);
}

        if (!$crea) { ?>
        <script type="text/javascript">
             window.location="listadoClientes?token=<?php echo $token ?>&success=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
               window.location="listadoClientes?token=<?php echo $token ?>&success=true";
        </script>
        <?php }
}

function GETPOST() {
        $datos_getpost = array();
        if ($_POST) {
            if (array_key_exists('activarRegistro', $_POST)) {
                $datos_getpost['activarRegistro'] = $_POST['activarRegistro'];
            }
            if (array_key_exists('idUsuario', $_POST)) {
                $datos_getpost['idUsuario'] =  $_POST['idUsuario'];
            }
            if (array_key_exists('nosucursales', $_POST)) {
                $datos_getpost['nosucursales'] =  $_POST['nosucursales'];
            }
            if (array_key_exists('ticket', $_POST)) {
                $datos_getpost['ticket'] =  $_POST['ticket'];
            }
            if (array_key_exists('nomesas', $_POST)) {
                $datos_getpost['nomesas'] =  $_POST['nomesas'];
            }
            if (array_key_exists('noempleados', $_POST)) {
                $datos_getpost['noempleados'] =  $_POST['noempleados'];
            } 
            if (array_key_exists('plazopago', $_POST)) {
                $datos_getpost['plazopago'] =  $_POST['plazopago'];
            } 
            if (array_key_exists('monto', $_POST)) {
                $datos_getpost['monto'] =  $_POST['monto'];
            }
            if (array_key_exists('tipocosto', $_POST)) {
                $datos_getpost['tipocosto'] =  $_POST['tipocosto'];
            }
            if (array_key_exists('nameref1', $_POST)) {
                $datos_getpost['nameref1'] =  $_POST['nameref1'];
            }
            if (array_key_exists('telref1', $_POST)) {
                $datos_getpost['telref1'] =  $_POST['telref1'];
            }
            if (array_key_exists('dirref1', $_POST)) {
                $datos_getpost['dirref1'] =  $_POST['dirref1'];
            }
            if (array_key_exists('comment1', $_POST)) {
                $datos_getpost['comment1'] =  $_POST['comment1'];
            } 
            if (array_key_exists('nameref2', $_POST)) {
                $datos_getpost['nameref2'] =  $_POST['nameref2'];
            }
            if (array_key_exists('telref2', $_POST)) {
                $datos_getpost['telref2'] =  $_POST['telref2'];
            }
            if (array_key_exists('dirref2', $_POST)) {
                $datos_getpost['dirref2'] =  $_POST['dirref2'];
            }
            if (array_key_exists('comment2', $_POST)) {
                $datos_getpost['comment2'] =  $_POST['comment2'];
            }        
            // para actualizar
            if (array_key_exists('actualizarRegistro', $_POST)) {
                $datos_getpost['actualizarRegistro'] = $_POST['actualizarRegistro'];
            }
            if (array_key_exists('nombrenegocio', $_POST)) {
                $datos_getpost['nombrenegocio'] =  $_POST['nombrenegocio'];
            } 
            if (array_key_exists('nombreusr', $_POST)) {
                $datos_getpost['nombreusr'] =  $_POST['nombreusr'];
            } 
            if (array_key_exists('apellidousr', $_POST)) {
                $datos_getpost['apellidousr'] =  $_POST['apellidousr'];
            }
            if (array_key_exists('telefono', $_POST)) {
                $datos_getpost['telefono'] =  $_POST['telefono'];
            }
            if (array_key_exists('puesto', $_POST)) {
                $datos_getpost['puesto'] =  $_POST['puesto'];
            }
            if (array_key_exists('email', $_POST)) {
                $datos_getpost['email'] =  $_POST['email'];
            }
            if (array_key_exists('giroempresa', $_POST)) {
                $datos_getpost['giroempresa'] =  $_POST['giroempresa'];
            }
            if (array_key_exists('estatus', $_POST)) {
                $datos_getpost['estatus'] = $_POST['estatus'];
            } 

        } else if ($_GET) {
            
        }
        return $datos_getpost;
}
}
?>