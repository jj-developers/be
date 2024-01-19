<?php
if ($_POST) {
    require_once("./conexion/conexion.php");
    $con = conexion();
    $path = 'plataforma/documentos/csf/';

    $constancia = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $contrasena_hash = password_hash($_POST['passw'], PASSWORD_DEFAULT);

    // Puedes mantener la lógica existente para mover el archivo
    $final_constancia = rand(1000, 1000000) . $constancia;
    $path = $path . strtolower($final_constancia);
    move_uploaded_file($tmp, $path);

    // Preparar la consulta con sentencias preparadas
    $insert = "CALL registro(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert);

    // Verifica si la preparación fue exitosa
    if ($stmt) {
        // Vincula los parámetros
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssssiddiisssss",
            $_POST['usr_nombrereferencia'],
            $_POST['usr_nombrereferencia2'],
            $_POST['usr_telefonoreferencia'],
            $_POST['usr_telefonoreferencia2'],
            $_POST['usr_dirreferencia'],
            $_POST['usr_dirreferencia2'],
            $_POST['usr_comreferencia'],
            $_POST['usr_comreferencia2'],
            $path, // Cambié el especificador de tipo a 's' para cadena
            $_POST['montocredito'],
            $_POST['giro'],
            $_POST['nosucursales'],
            $_POST['ticketpromedio'],
            $_POST['nomesas'],
            $_POST['noempleados'],
            $_POST['nombreComercial'],
            $_POST['apellido'],
            $_POST['phone'],
            $_POST['email'],
            $contrasena_hash

        );

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            $retval['status'] = 1;
            $retval['message'] = "Registro correcto";
            $retval['email'] = $_POST['email'];
            echo json_encode($retval);
        } else {
            $retval['status'] = 0;
            $retval['message'] = "Error al ingresar registro: " . mysqli_error($con);
            echo json_encode($retval);
        }

        // Cerrar la sentencia preparada
        mysqli_stmt_close($stmt);
    } else {
        // Si hubo un error en la preparación de la consulta
        $retval['status'] = 0;
        $retval['message'] = "Error al preparar la consulta: " . mysqli_error($con);
        echo json_encode($retval);
    }

    // Cerrar la conexión
    mysqli_close($con);
}
?>
