$(document).ready(function () {
    ListarPacientes();
});

function AdicionarPaciente() {

    var identidad = $("#identidadPaciente").val().trim();
    var nombre = $("#nombrepaciente").val().trim();
    var apellido = $("#apellidopaciente").val().trim();
    var fechanacimiento = $("#fechanacimientopaciente").val().trim();
    var edad = $("#edadpaciente").val().trim();
    var foto = $("#fotopaciente").val().trim();
    var direccion = $("#direccionpaciente").val().trim();
    var barrio = $("#barriopaciente").val().trim();
    var ciudad = $("#ciudadpaciente").val().trim();
    var telefono = $("#telefonopaciente").val().trim();
    var estado = $("#estadopaciente").val();
    var bandera = $("#bandera").val().trim();
    var accion = "";
    debugger;
    if(identidad!="" && nombre!="" && apellido!="" && fechanacimiento!="" && edad!="" && foto!="" && direccion!="" && barrio!="" && ciudad!="" && telefono!="" && estado!="" ){
        if (bandera === "") {
            accion = "adicionar";
        } else {
            accion = "modificar"
        }
    
        $.ajax({
            type: "POST",
            url: "controles/pacientes.php",
            data: {
    
                accion: accion,
                identidad: identidad,
                nombre: nombre,
                apellido: apellido,
                fechanacimiento: fechanacimiento,
                edad: edad,
                foto: foto,
                direccion: direccion,
                barrio: barrio,
                ciudad: ciudad,
                telefono: telefono,
                estado: estado,
    
            },
            success: function (resp) {
                if (resp = "Paciente Creado" && accion == "adicionar") {
                   alert("Se ha registrado correctamente");
    
                }else if(resp = "Paciente Modificado" && accion == "modificar"){
                    alert("Se ha modificado correctamente");
                }
                Limpiar();
                ListarPacientes();
            }
        });
    }else{
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Por favor ingrese todos los datos correctamente!",
            confirmButtonText: "Ok",
            footer: "<a href></a>",
          });
    }
    
}

function MensajeValidacion() {
    Swal.fire({
        icon: 'success',
        title: 'Exito...',
        text: 'Se ha guardado correctamente!',
        footer: '<a href></a>'
    })
   


}


function ListarPacientes() {
    $("#tablapacientes").DataTable({
        "ajax": {
            "url": "controles/pacientes.php",
            "dataSrc": ""
        },
        "columns": [
            {
                "data": "foto",
                "render": function (data) {
                    return '<img src="' + data + '" width=50 style="cursor:pointer" />'
                }
            },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "fechanacimiento" },
            { "data": "edad" },
            { "data": "direccion" },
            { "data": "barrio" },
            { "data": "ciudad" },
            { "data": "telefono" },
            { "data": "estado" },
            {
                "data": "identidad",
                "render": function (data) {
                    return "<td><button data-id=" + data + " onclick='BuscarPaciente();'  type='button' class='btn editarPaciente btn-success btn-sm mb-1'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/editar.png' alt=''></span></button>" +
                        "<button data-id=" + data + " onclick='EliminarPaciente();'  type='button' class='btn eliminarPaciente btn-danger btn-sm'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/basura.png' alt=''></span></button> </td>"
                }
            },
            //  {"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},

        ]


    });

}



function BuscarPaciente() {
    $(".editarPaciente").click(function () {

        idPaciente = $(this).data("id");

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "controles/pacientes.php",
            data: {
                accion: 'BuscarPacientes',
                idPaciente: idPaciente,
            },
            success: function (resp) {
                console.log(resp);
                $("#bandera").val("EDITAR");
                $("#identidadPaciente").val(resp[0]['identidad']);
                $("#nombrepaciente").val(resp[0]['nombre']);
                $("#apellidopaciente").val(resp[0]['apellido']);
                $("#fechanacimientopaciente").val(resp[0]['fechanacimiento']);
                $("#edadpaciente").val(resp[0]['edad']);
                $("#fotopaciente").val(resp[0]['foto']);
                $("#direccionpaciente").val(resp[0]['direccion']);
                $("#barriopaciente").val(resp[0]['barrio']);
                $("#ciudadpaciente").val(resp[0]['ciudad']);
                $("#telefonopaciente").val(resp[0]['telefono']);
                $("#estadopaciente").val(resp[0]['estado']);
            }
        });



    });

}



function EliminarPaciente() {
    $(".eliminarPaciente").click(function () {

        idPaciente = $(this).data("id");

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "controles/pacientes.php",
            data: {
                accion: 'EliminarPaciente',
                idPaciente: idPaciente,
            },
            success: function (resp) {
                ListarPacientes();
                alert('Paciente Eliminado');
            }
        });
    });

}

function Limpiar() {
    $("#identidadpaciente").val("");
    $("#nombrepaciente").val("");
    $("#apellidopaciente").val("");
    $("#fechanacimientopaciente").val("");
    $("#edadpaciente").val("");
    $("#fotopaciente").val("");
    $("#direccionpaciente").val("");
    $("#barriopaciente").val("");
    $("#ciudadpaciente").val("");
    $("#telefonopaciente").val("");
    $("#estadopaciente").val("");
    $("#bandera").val("");
}