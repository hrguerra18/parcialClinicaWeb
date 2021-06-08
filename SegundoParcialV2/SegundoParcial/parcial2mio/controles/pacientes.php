<?php

if (empty($_POST['accion'])) {
    $_POST['accion'] = "General";
}

switch ($_POST['accion']) {

    case "adicionar":
        AgregarPacientes();
        break;
    case "modificar":
        ModificarPaciente();
        break;
    case "BuscarPacientes":
        BuscarPaciente();
        break;
    case "EliminarPaciente":
        EliminarPaciente();
        break;
    default:
        listarPacientes();
        break;
}

function AgregarPacientes()
{
    require "config.php";
    $identidad = $_POST['identidad'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $edad = $_POST['edad'];
    $foto = $_POST['foto'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO paciente (identidad,nombre,apellido,fechanacimiento,edad,foto,direccion,barrio,ciudad,telefono,estado) VALUES ('$identidad','$nombre','$apellido','$fechanacimiento','$edad','$foto','$direccion','$barrio','$ciudad','$telefono','$estado')";

    if (mysqli_query($con, $sql)) {
        echo "Cliente Creado";
    } else {
        echo "Error: " . $sql;
        echo mysqli_error($con);
    }
}


function listarPacientes()
{
    require "config.php";

    //generamos la consulta
    $sql = "SELECT * FROM paciente ";

    mysqli_set_charset($con, "utf8"); //formato de datos utf8

    if (!$result = mysqli_query($con, $sql)) die();

    $pacientes = array(); //creamos un array

    while ($row = $result->fetch_assoc()) {
        array_push($pacientes, $row);
    }

    $json_string = json_encode($pacientes);
    echo $json_string;
}

function BuscarPaciente()
{

    require("config.php");
    $idpaciente = $_POST['idPaciente'];

    $sql = "SELECT  * FROM paciente WHERE identidad ='$idpaciente'";

    if (!$result = mysqli_query($con, $sql)) die();

    $clientes = array();

    while ($row = $result->fetch_assoc()) {
        array_push($clientes, $row);
    }

    $json_string = json_encode($clientes);
    echo $json_string;
}

function ModificarPaciente()
{

    require "config.php";
    $identidad = $_POST['identidad'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $edad = $_POST['edad'];
    $foto = $_POST['foto'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];

    $sql = "UPDATE paciente SET nombre='$nombre',apellido='$apellido',
    fechanacimiento = '$fechanacimiento',edad = '$edad',foto='$foto',direccion='$direccion',
    barrio = '$barrio',ciudad='$ciudad',telefono='$telefono', estado = '$estado' WHERE identidad = '$identidad'";
    if (mysqli_query($con, $sql)) {
        echo "Cliente Modificado";
    } else {
        echo "Error: " . $sql;
        echo mysqli_error($con);
    }
}

function EliminarPaciente()
{

    require("config.php");
    $idpaciente = $_POST['idPaciente'];
    $estado = "Inactivo";
    $sql = "UPDATE paciente SET estado = '$estado' WHERE identidad = '$idpaciente'";

    if (mysqli_query($con, $sql)) {
        $respuesta = array("mensaje" => "Datos Eliminados");
        $json_string = json_encode($respuesta);
        echo $json_string;
    } else {
        $respuesta = array("mensaje" => "Error" . mysqli_error($con));
        $json_string = json_encode($respuesta);
        echo $json_string;
    }
}
