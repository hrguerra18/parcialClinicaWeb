$(document).ready(function () {
  listadoPersonalAtencion();
});

function AdicionarPersonalAtencion() {
  var personal = recibirDatosFormulario();
  if (personal.idPersonalAtencion!="" && personal.nombrePersonalAtencion!="" && personal.apellidoPersonalAtencion!="" && personal.fotoPersonalAtencion!="" && personal.estadoPersonalAtencion!="" && personal.trabajandoPersonalAtencion!="" && personal.tipoPersonalAtencion!="") {
    var accion = "";
    if (personal.bandera === "") {
      accion = "Adicionar";
    } else {
      accion = "Modificar";
    }
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "controles/personalAtencion.php",
      data: {
        accion: accion,
        idPersonalAtencion: personal.idPersonalAtencion,
        nombrePersonalAtencion: personal.nombrePersonalAtencion,
        apellidoPersonalAtencion: personal.apellidoPersonalAtencion,
        fotoPersonalAtencion: personal.fotoPersonalAtencion,
        estadoPersonalAtencion: personal.estadoPersonalAtencion,
        trabajandoPersonalAtencion: personal.trabajandoPersonalAtencion,
        tipoPersonalAtencion: personal.tipoPersonalAtencion,
      },
      success: function (resp) {
        if (resp.validar) {
          alert("Se ha registrado correctamente");
        }

        Limpiar();
      },
    });
  }else{
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Digite los datos!",
      confirmButtonText: "Ok",
      footer: "<a href></a>",
    });
  }
}




function MensajeValidacion() {
  Swal.fire({
    icon: "success",
    title: "Exito...",
    text: "Se ha guardado correctamente!",
    confirmButtonText: "Ok",
    timer: 5000,
    footer: "<a href></a>",
  });
}

function recibirDatosFormulario() {
  let idPersonalAtencion = $("#idPersonalAtencion").val();
  let nombrePersonalAtencion = $("#nombrePersonalAtencion").val();
  let apellidoPersonalAtencion = $("#apellidoPersonalAtencion").val();
  let fotoPersonalAtencion = $("#fotoPersonalAtencion").val();
  let estadoPersonalAtencion = $("#estadoPersonalAtencion").val();
  let trabajandoPersonalAtencion = $("#trabajandoPersonalAtencion").val();
  let tipoPersonalAtencion = $("#tipoPersonalAtencion").val();
  let bandera = $("#Bandera").val().trim();

  let personal = {
    idPersonalAtencion: idPersonalAtencion,
    nombrePersonalAtencion: nombrePersonalAtencion,
    apellidoPersonalAtencion: apellidoPersonalAtencion,
    fotoPersonalAtencion: fotoPersonalAtencion,
    estadoPersonalAtencion: estadoPersonalAtencion,
    trabajandoPersonalAtencion: trabajandoPersonalAtencion,
    tipoPersonalAtencion: tipoPersonalAtencion,
    bandera: bandera,
  };

  return personal;
}

function listadoPersonalAtencion() {
  $("#tablaPersonalAtencion").DataTable({
    ajax: {
      url: "controles/personalAtencion.php",
      dataSrc: "",
    },

    columns: [
      {
        data: "foto",
        render: function (data) {
          return '<img  src="' + data + '" width=50 style="cursor:pointer" />';
        },
      },
      { data: "idPersonalAtencion" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "tipo" },
      { data: "estado" },
      { data: "trabajando" },
      {
        data: "idPersonalAtencion",
        render: function (data) {
          return (
            "<td><button data-id=" +
            data +
            " onclick='BuscarPersonalAtencion();'  type='button' class='btn btn-modificar btn-success btn-sm m-2'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/editar.png' alt=''></span></button>" +
            "<button data-id=" +
            data +
            " onclick='EliminarPersonal();'  type='button' class='btn eliminarPersonal btn-danger btn-sm'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/basura.png' alt=''></span></button></td>"
          );
        },
      },
      //{"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},
    ],
  });
}

function BuscarPersonalAtencion() {
  $(".btn-modificar").click(function () {
    var idPersonalAtencion = $(this).data("id");
    console.log(idPersonalAtencion);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "controles/personalAtencion.php",
      data: {
        accion: "BuscarPA",
        idPersonalAtencion: idPersonalAtencion,
      },
      success: function (resp) {
        //console.log(resp);
        $("#idPersonalAtencion").val(resp[0]["idPersonalAtencion"]);
        $("#nombrePersonalAtencion").val(resp[0]["nombre"]);
        $("#apellidoPersonalAtencion").val(resp[0]["apellido"]);
        $("#fotoPersonalAtencion").val(resp[0]["foto"]);
        $("#estadoPersonalAtencion").val(resp[0]["estado"]);
        $("#trabajandoPersonalAtencion").val(resp[0]["trabajando"]);
        $("#tipoPersonalAtencion").val(resp[0]["tipo"]);
        $("#Bandera").val(resp[0]["idPersonalAtencion"]);
      },
    });
  });
}

function EliminarPersonal() {
  $(".eliminarPersonal").click(function () {
    idPersonal = $(this).data("id");

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "controles/personalAtencion.php",
      data: {
        accion: "EliminarPersonal",
        idPersonal: idPersonal,
      },
      success: function (resp) {
        listadoPersonalAtencion();
        alert("Personal Eliminado");
      },
    });
  });
}

function Limpiar() {
  $("#idPersonalAtencion").val("");
  $("#nombrePersonalAtencion").val("");
  $("#apellidoPersonalAtencion").val("");
  $("#fotoPersonalAtencion").val("");
  $("#estadoPersonalAtencion").val("");
  $("#trabajandoPersonalAtencion").val("");
  $("#tipoPersonalAtencion").val("");
  $("#Bandera").val("");
}




(personal.idPersonalAtencion!="" && personal.nombrePersonalAtencion!="" && personal.apellidoPersonalAtencion!="" && personal.fotoPersonalAtencion!="" && personal.estadoPersonalAtencion!="" && personal.trabajandoPersonalAtencion!="" && personal.tipoPersonalAtencion!="")