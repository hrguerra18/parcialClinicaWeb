function loguearse(){
    let usuario = $("#usuario").val().trim();
    let contraseña = $("#contraseña").val().trim();
    
    if( usuario != "" && contraseña != "" ){
        $.ajax({
            url:'controles/validaruser.php',
            type:'post',
            dataType: "json",          
            data:{
                usuario:usuario,
                contraseña:contraseña
            },
            success:function(resp){
                if(resp.validar) {
                    if(esUsuarioAdministrativo(resp.tipo)){
                        irAPaginaPrincipalAdminitrador();
                    }
                    else
                        irAPaginaPrincipalPersonalDeAtencion();
                }else{
                   alert("usted no esta registrado")
                }
            }
        });
    }
}



function obtenerUsuario(){
    let nombreUsuario = $("#usuario").val().trim();
    let contraseña = $("#contraseña").val().trim();
    let usuario ={
        'contraseña' : contraseña,
        'nombreUsuario' : nombreUsuario,
    }
    return usuario;
}

function irAPaginaPrincipalAdminitrador(){
    let ruta = 'administrativo.php';
    window.location = ruta;
}

function esUsuarioAdministrativo(tipo){
    let admnistrativo = 'administrativo';
    if (tipo === admnistrativo)
        return true;
    else
        return false;   
}

function irAPaginaPrincipalPersonalDeAtencion() { 
    let ruta = 'gestionarPersonalAtencion.php';
    window.location = ruta;
}