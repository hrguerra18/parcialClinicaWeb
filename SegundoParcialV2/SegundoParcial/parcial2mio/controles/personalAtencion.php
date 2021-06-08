<?php

require "config.php";
session_start();
if (empty($_POST['accion'])) {
  $_POST['accion'] = "General";
}

switch ($_POST['accion']) {

  case "Adicionar":
    GuardarPersonalAtencion();
    break;
  case "BuscarPA":
    BuscarPersonalAtencion();
    break;
  case "Modificar":
    ModificarPersonal();
    break;
  case "EliminarPersonal":
    EliminarPersonal();
    break;
  default:
    listarPersonalAtencion();
    break;
}






function GuardarPersonalAtencion()
{
  require "config.php";

  $idPersonalAtencion = $_POST['idPersonalAtencion'];
  $nombrePersonalAtencion = $_POST['nombrePersonalAtencion'];
  $apellidoPersonalAtencion = $_POST['apellidoPersonalAtencion'];
  $fotoPersonalAtencion = $_POST['fotoPersonalAtencion'];
  $estadoPersonalAtencion = $_POST['estadoPersonalAtencion'];
  $trabajandoPersonalAtencion = $_POST['trabajandoPersonalAtencion'];
  $tipoPersonalAtencion = $_POST['tipoPersonalAtencion'];


  $sql = "INSERT INTO personalatencion (idPersonalAtencion,foto,nombre,apellido,tipo,estado,trabajando) 
  VALUES ('$idPersonalAtencion','$fotoPersonalAtencion', '$nombrePersonalAtencion', '$apellidoPersonalAtencion','$tipoPersonalAtencion','$estadoPersonalAtencion','$trabajandoPersonalAtencion')";

  validarExitoEnLaSentencia($sql, $idPersonalAtencion, $nombrePersonalAtencion, $fotoPersonalAtencion, $tipoPersonalAtencion);
}





function validarExitoEnLaSentencia($sql, $idPersonalAtencion, $nombrePersonalAtencion, $fotoPersonalAtencion, $tipoPersonalAtencion)
{
  require "config.php";
  if (mysqli_query($con, $sql)) {


    $_SESSION['validar'] = true;


    $respuesta = array("mensaje" => "Datos Guardados");
    $json_string = json_encode($_SESSION);
    echo $json_string;

    $sqlc =  GuardarEnUsuario($idPersonalAtencion, $nombrePersonalAtencion, $fotoPersonalAtencion, $tipoPersonalAtencion);
    mysqli_query($con, $sqlc);
  } else {
    $_SESSION['validar'] = false;
    $respuesta = array("mensaje" => "Error" . mysqli_error($con));
    $json_string = json_encode($_SESSION);
    echo $json_string;
  }
}







function GuardarEnUsuario($idPersonalAtencion, $nombrePersonalAtencion, $fotoPersonalAtencion, $tipoPersonalAtencion)
{
  $sql = "INSERT INTO usuario (id,user,nombre,contraseña,foto,tipo) 
  VALUES (default,'$idPersonalAtencion', '$nombrePersonalAtencion', '123','$fotoPersonalAtencion','$tipoPersonalAtencion')";

  return $sql;
}


function listarPersonalAtencion()
{
  require "config.php";

  //generamos la consulta
  $sql = "SELECT * FROM personalatencion";

  mysqli_set_charset($con, "utf8"); //formato de datos utf8

  if (!$result = mysqli_query($con, $sql)) die();

  $personalatencion = array(); //creamos un array

  while ($row = $result->fetch_assoc()) {
    array_push($personalatencion, $row);
  }

  $json_string = json_encode($personalatencion);
  echo $json_string;
}


function BuscarPersonalAtencion()
{
  require "config.php";
  $idPersonalAtencion = $_POST['idPersonalAtencion'];
  //echo $idcliente;


  $sql = "SELECT *  FROM personalatencion  WHERE idPersonalAtencion='$idPersonalAtencion'";

  if (!$result = mysqli_query($con, $sql)) die();

  $productos = array();

  while ($row = $result->fetch_assoc()) {
    array_push($productos, $row);
  }

  $json_string = json_encode($productos);
  echo $json_string;
}

function ModificarPersonal()
{

  require "config.php";

  $idPersonalAtencion = $_POST['idPersonalAtencion'];
  $nombrePersonalAtencion = $_POST['nombrePersonalAtencion'];
  $apellidoPersonalAtencion = $_POST['apellidoPersonalAtencion'];
  $fotoPersonalAtencion = $_POST['fotoPersonalAtencion'];
  $estadoPersonalAtencion = $_POST['estadoPersonalAtencion'];
  $trabajandoPersonalAtencion = $_POST['trabajandoPersonalAtencion'];
  $tipoPersonalAtencion = $_POST['tipoPersonalAtencion'];


  $sql = "UPDATE personalatencion SET nombre='$nombrePersonalAtencion',apellido='$apellidoPersonalAtencion',
  tipo = '$tipoPersonalAtencion',estado = '$estadoPersonalAtencion',foto='$fotoPersonalAtencion',
  trabajando='$trabajandoPersonalAtencion' WHERE idPersonalAtencion = '$idPersonalAtencion'";
  if (mysqli_query($con, $sql)) {
    echo "Personal Modificado";
  } else {
    echo "Error: " . $sql;
    echo mysqli_error($con);
  }
}

function EliminarPersonal()
{
  require "config.php";
  $idPersonalAtencion = $_POST['idPersonal'];
  $estado = "Inactivo";
  $sql = "UPDATE personalatencion SET estado = '$estado' WHERE idPersonalAtencion = '$idPersonalAtencion'";

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
