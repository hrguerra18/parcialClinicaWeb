<?php
session_start();
require "config.php";

if (empty($_POST['accion'])) {
  $_POST['accion'] = "General";
}

switch ($_POST['accion']) {

  case "BuscarC":
    BuscarC();
    break;
  case "Modificar":
    ModificarCita();
    break;
  default:
    listarPacientesAsignados();
    break;
}


function listarPacientesAsignados()
{
  require "config.php";
  $usuario = $_SESSION['user'];
  //generamos la consulta
  $sql = "SELECT p.foto,p.identidad,p.nombre,p.apellido,p.direccion,p.barrio,p.ciudad,c.estado,c.fecha,c.sintomas,c.observacion,c.id FROM cita c JOIN paciente p ON c.identidapaciente=p.identidad where $usuario=c.idpersonal";

  mysqli_set_charset($con, "utf8"); //formato de datos utf8

  if (!$result = mysqli_query($con, $sql)) die();

  $pacientesAsignados = array(); //creamos un array

  while ($row = $result->fetch_assoc()) {
    array_push($pacientesAsignados, $row);
  }

  $json_string = json_encode($pacientesAsignados);
  echo $json_string;
}






function BuscarC()
{
  require "config.php";
  $idcita = $_POST['id'];
  //echo $idcliente;


  $sql = "SELECT  * FROM cita c JOIN paciente p ON c.identidapaciente=p.identidad WHERE c.id='$idcita'";

  if (!$result = mysqli_query($con, $sql)) die();

  $productos = array();

  while ($row = $result->fetch_assoc()) {
    array_push($productos, $row);
  }

  $json_string = json_encode($productos);
  echo $json_string;
}




function ModificarCita(){
  require "config.php";
  $banderapaciente = $_POST['banderapaciente'];
  $estadopaciente = $_POST['estadopaciente'];
  $observacionpaciente = $_POST['observacionpaciente'];


  $sql = "UPDATE cita SET estado='$estadopaciente', observacion='$observacionpaciente' WHERE id='$banderapaciente'";

  if (mysqli_query($con, $sql)) {
    $_SESSION['validar']=true;
    $json_string = json_encode($_SESSION);
    echo $json_string;
  } else {
    $_SESSION['validar']=false;
    $json_string = json_encode($_SESSION);
    echo $json_string;
  }


}
