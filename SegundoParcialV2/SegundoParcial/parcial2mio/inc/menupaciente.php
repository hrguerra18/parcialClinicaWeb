<?php
session_start();
/*if(isset($_SESSION["usuario"])){
	 } else{		
        header("Location: login.php");
    }
/*
if(isset($_SESSION['usuario']))
{

	
} else{
    
header('Location: ingresar.php');
} 
*/
?>

<link rel="stylesheet" href="inc/css/stylemenu.css">

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar color-fondo">
			<div class="sidebar-content js-simplebar color-fondo">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle ">Buen Doctor</span>
				</a>

				<ul class="sidebar-nav color-fondo">
					<li class="sidebar-header">
						Opciones
					</li>

					<li class="sidebar-item color-fondo ">
						<a class="sidebar-link color-fondo-a " href="personalAtencion.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle ">Personal de Atencion</span>
						</a>
					</li>



					<li class="sidebar-item ">
						<a class="sidebar-link color-fondo-a asignacion" href="pacientes.php">
							<i class="align-middle" data-feather="thermometer"></i> <span class="align-middle">Pacientes</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link color-fondo-a" href="AsignarCita.php">
							<i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Citas</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link color-fondo-a" href="reportes.php">
							<i class="align-middle" data-feather="flag"></i> <span class="align-middle">Reportes</span>
						</a>
					</li>

				</ul>


			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex ">
					<i class="hamburger align-self-center"></i>
				</a>



				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src=<?php echo $_SESSION['foto'] ?> class="avatar img-fluid rounded me-1" alt="Alex" /> <span class="text-dark"><?php echo $_SESSION['nombre'] ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="controles/cerrar.php">Cerrar Session</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>