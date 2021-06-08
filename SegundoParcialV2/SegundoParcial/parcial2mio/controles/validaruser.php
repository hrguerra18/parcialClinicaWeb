<?php
include "config.php";
session_start();

$usuario = mysqli_real_escape_string($con,$_POST['usuario']);
$contraseña = mysqli_real_escape_string($con,$_POST['contraseña']);

// $usuario = "helder";
// $contraseña = "123";


$count=0;

if ($usuario != "" && $contraseña != ""){

    $sql_query = "select count(*) as numusu,user,tipo,nombre,foto from usuario where user='".$usuario."' and contraseña='".$contraseña."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['numusu'];
    $user = $row['user'];
    $tipo = $row['tipo'];
    $nombre = $row['nombre'];
    $foto = $row['foto'];

    
   
    if($count > 0){
        $_SESSION['user'] = $user;
        $_SESSION['tipo'] = $tipo;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['foto'] = $foto;
        $_SESSION['validar'] = true;

        $respuesta = array("mensaje"=>"Datos Validos");
        $json_string = json_encode($_SESSION);
        echo $json_string; 
    }else{
        
        $_SESSION['validar'] = false;

        $respuesta = array("mensaje"=>"Datos inValidos");
        $json_string = json_encode($_SESSION);
        echo $json_string; 
        
    }

}
?>