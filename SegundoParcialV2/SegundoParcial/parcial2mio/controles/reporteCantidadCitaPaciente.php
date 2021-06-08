<?php
require "config.php";
$sql = "SELECT count(*) as conteo, nombre, apellido,foto FROM paciente p JOIN cita c ON c.identidapaciente = p.identidad GROUP by c.identidapaciente";

if(!$result = mysqli_query($con, $sql)) die();

$CitasPersonal = array();

while($row = $result->fetch_assoc()) 
{ 
array_push($CitasPersonal,$row);
}

$json_string = json_encode($CitasPersonal);
echo $json_string;
?>