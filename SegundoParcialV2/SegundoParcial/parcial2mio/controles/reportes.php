<?php

    $Paciente = EncontrarNumeroPacientes();
    $Medico = EncontrarNumeroMedicos();
    $Enfermero = EncontrarNumeroEnfermeros();
    $Fisioterapeuta = EncontrarNumeroFisioterapeuta();

    $CantidadUsuario = array();

    array_push($CantidadUsuario, $Paciente);
    array_push($CantidadUsuario, $Medico);
    array_push($CantidadUsuario, $Enfermero);
    array_push($CantidadUsuario, $Fisioterapeuta);

    $json_string = json_encode($CantidadUsuario);
    echo $json_string;


function EncontrarNumeroPacientes()
{
    require "config.php";
    $sql = "SELECT count(*) as conteo FROM paciente ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $Paciente = array("cantidad" => $row['conteo'], "usuario" => "Paciente");
    return $Paciente;
}

function EncontrarNumeroMedicos()
{
    require "config.php";
    $tipo = "Medico";
    $sql = "SELECT count(*) as conteo FROM personalatencion WHERE tipo = '$tipo' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $Medico = array("cantidad" => $row['conteo'], "usuario" => "Medico");
    return $Medico;
}

function EncontrarNumeroEnfermeros()
{
    require "config.php";
    $tipo = "Enfermero";
    $sql = "SELECT count(*) as conteo FROM personalatencion WHERE tipo = '$tipo' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $Enfermero = array("cantidad" => $row['conteo'], "usuario" => "Enfermero");
    return $Enfermero;
}

function EncontrarNumeroFisioterapeuta()
{
    require "config.php";
    $tipo = "Fisioterapeuta";
    $sql = "SELECT count(*) as conteo FROM personalatencion WHERE tipo = '$tipo' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $Fisioterapeuta = array("cantidad" => $row['conteo'], "usuario" => "Fisioterapeuta");
    return $Fisioterapeuta;
}

?>