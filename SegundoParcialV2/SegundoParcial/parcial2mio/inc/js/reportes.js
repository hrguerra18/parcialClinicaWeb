$(document).ready(function () {
    EjecutarReportes();
});


function EjecutarReportes() {
    CantidadUsuario();
    CantidadCitaPersonal();
    CantidadCitaPaciente();
}

function CantidadUsuario() {
    $("#tablaCantidadUsuario").DataTable({
        ajax: {
            url: "controles/reportes.php",
            dataSrc: "",
        },

        columns: [
            { data: "usuario" },
            { data: "cantidad" },
        ],
    });
}

function CantidadCitaPersonal() {
    $("#tablaCantidadCitaPersonal").DataTable({
        ajax: {
            url: "controles/reporteCantidadCitaPersonal.php",
            dataSrc: "",
        },

        columns: [
            {
                "data": "foto",
                render: function (data) {
                  return '<img  src="' + data + '" width=50 style="cursor:pointer" />';
                },
              },
            { data: "nombre" },
            { data: "apellido" },
            { data: "tipo" },
            { data: "conteo" },
        ],
    });
}

function CantidadCitaPaciente() {
    $("#tablaCantidadCitaPaciente").DataTable({
        ajax: {
            url: "controles/reporteCantidadCitaPaciente.php",
            dataSrc: "",
        },

        columns: [
            {
                "data": "foto",
                render: function (data) {
                  return '<img  src="' + data + '" width=50 style="cursor:pointer" />';
                },
              },
            { data: "nombre" },
            { data: "apellido" },
            { data: "conteo" },
        ],
    });
}