<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start();

if(!isset($_SESSION['usuario'])){
header('Location: login.php');
}else if($_SESSION['tipo']=="administrativo"){
    header('Location: administrativo.php');
}else if($_SESSION['tipo']=="medico"){
    header('Location: personalAtencion.php');
}else if($_SESSION['tipo']=="enfermero"){
    header('Location: personalAtencion.php');
}else if($_SESSION['tipo']=="fisioterapeuta"){
    header('Location: personalAtencion.php');
}
else{
    header('Location: login.php');
}
?>
<body>
    
</body>
</html>