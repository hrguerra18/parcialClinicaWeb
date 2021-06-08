<?php

if (empty($_POST['accion'])) {
    $_POST['accion'] = "General";
}

switch ($_POST['accion']) {

    case "adicionar":
        AgregarCitas();
        break;
    default:
        listarCitas();
        break;
}

function AgregarCitas()
{
    require "config.php";
    $identidadPaciente = $_POST['identidadPaciente'];
    $sintomas = $_POST['sintomas'];
    $idPersonal = $_POST['idPersonal'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO cita (id,identidapaciente,idpersonal,fecha,sintomas,estado) 
    VALUES (default,'$identidadPaciente','$idPersonal','$fecha','$sintomas','Activo')";

    if (mysqli_query($con, $sql)) {
        echo "Cita Creado";
    } else {
        echo "Error: " . $sql;
        echo mysqli_error($con);
    }
}


function listarCitas()
{
    require "config.php";

    //generamos la consulta
    $sql = "SELECT * FROM cita ";

    mysqli_set_charset($con, "utf8"); //formato de datos utf8

    if (!$result = mysqli_query($con, $sql)) die();

    $pacientes = array(); //creamos un array

    while ($row = $result->fetch_assoc()) {
        array_push($pacientes, $row);
    }

    $json_string = json_encode($pacientes);
    echo $json_string;
}
