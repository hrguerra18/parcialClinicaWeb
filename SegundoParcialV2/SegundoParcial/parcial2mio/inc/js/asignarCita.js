$(document).ready(function () {
    ListarPacientes();
    listadoPersonalAtencion();
    ListarCitas();
});

function ListarPacientes() {
    $("#tablaPaciente").DataTable({
        "ajax": {
            "url": "controles/pacientes.php",
            "dataSrc": ""
        },
        "columns": [{
                "data": "foto",
                "render": function (data) {
                    return '<img src="' + data + '" width=50 style="cursor:pointer" />'
                }
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellido"
            },
            {
                "data": "identidad",
                "render": function (data) {
                    return "<td><button data-id=" + data + " onclick='AsignarPaciente();'  type='button' class='btn btnasignarpaciente btn-warning btn-sm'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/paciente.png' alt=''></span>Asignar</button>"
                }
            },
            //  {"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},

        ]


    });

}

function AsignarPersonal() {
    $(".btnasignarpersonal").click(function () {
        $("#idPersonalCita").val($(this).data("id"));

    });
}

function AsignarPaciente() {
    $(".btnasignarpaciente").click(function () {
        $("#identidadPacienteCita").val($(this).data("id"));
    });
}

function listadoPersonalAtencion() {
    $("#tablaPersonal").DataTable({

        "ajax": {
            "url": "controles/personalAtencion.php",
            "dataSrc": ""
        },

        "columns": [{
                "data": "foto",
                "render": function (data) {
                    return '<img  src="' + data + '" width=50 style="cursor:pointer" />'
                }
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellido"
            },
            {
                "data": "tipo"
            },
            {
                "data": "trabajando"
            },
            {
                "data": "idPersonalAtencion",
                "render": function (data) {
                    return "<button data-id=" + data + " onclick='AsignarPersonal();'type='button' class='btn btnasignarpersonal btn-success btn-sm'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/doctor.png' alt=''></span>Asignar</button>"

                }
            },
            //{"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},

        ]


    });

}



function AdicionarCita() {
    var identidadPaciente = $("#identidadPacienteCita").val().trim();
    var fecha = $("#fechacita").val().trim();
    var sintomas = $("#sintomascita").val().trim();
    var idPersonal = $("#idPersonalCita").val().trim();
    if (identidadPaciente != "") {
        if (idPersonal != "") {
            $.ajax({
                type: "POST",
                url: "controles/citas.php",
                data: {

                    accion: "adicionar",
                    identidadPaciente: identidadPaciente,
                    fecha: fecha,
                    sintomas: sintomas,
                    idPersonal: idPersonal,

                },
                success: function (resp) {
                    alert("Se ha registrado la cita")
                    Limpiar();
                    ListarCitas();

                }
            });
        } else {

            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Por favor asigne un personal de atencion a la cita!",
                confirmButtonText: "Ok",
                footer: "<a href></a>",
            });
        }
    } else {
        Swal.fire({
            icon: "error",
            title: "Error...",
            text: "Por favor asigne un paciente a la cita!",
            confirmButtonText: "Ok",
            footer: "<a href></a>",
        });
    }

}

function ListarCitas() {
    $("#tablaCitas").DataTable({

        "ajax": {
            "url": "controles/citas.php",
            "dataSrc": ""
        },

        "columns": [{
                "data": "fotopaciente",
                "render": function (data) {
                    return '<img  src="' + data + '" width=50 style="cursor:pointer" />'
                }
            },
            {"data": "identidapaciente"},
            {"data": "nombrepaciente"},
            {"data": "apellidopaciente" },
            {
                "data": "fotomedico",
                "render": function (data) {
                    return '<img  src="' + data + '" width=50 style="cursor:pointer" />'
                }
            },
            {"data": "idpersonal"},
            {"data": "nombremedico" },
            {"data": "apellidomedico" },
            {"data": "fecha"},
            {"data": "sintomas"},
            {"data": "estado"},
            {"data": "observacion"},
        ]


    });
}