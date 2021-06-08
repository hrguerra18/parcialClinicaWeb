<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/inc/css/stylelogin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/icon-48x48.png" />
    <link href= "inc/css/app.css" rel="stylesheet">
    <link href= "inc/css/stylelogin.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 



    <title>Document</title>
</head>





<body>

    <section class="cuerpo">
        <form action="" class="formulario" onsubmit="return validarUsuario();" >

            


            <p class="ingresar">INICIAR SESIÓN</p>


            <div class="borde-usuario" id="borde-usuario">
                <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" class="formulario-usuario" >
                <i class="fas fa-times-circle edit-icono "></i>
            </div>

            <div class="borde-contra">
                <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" class="formulario-contraseña" >
            </div>

            <label class="label-recordar-contra" for="recordarcontraseña"><input class="recordar-contra" type="checkbox" name="recordarcontraseña" id="recordarcontraseña"> Recordar contraseña</label>

            <button onclick="loguearse()" class="btn btn-lg btn-primary" id="botoningresar">Ingresar</button>

            <p class="olvidar-contra">¿Has olvidado tu contraseña?</p>
        </form>

    </section>

    <script src="inc/js/app.js"></script>
    <script type="text/javascript" src="inc/js/login.js"></script>
    <script type="text/javascript" src="inc/js/validarUsuario.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</body>

</html>