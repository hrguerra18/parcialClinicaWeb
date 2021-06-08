$(document).ready(function () {
  listadoPacientesAsignados();
});

function listadoPacientesAsignados() {
  $("#tablaListadoPacientesAsignados").DataTable({
    ajax: {
      url: "controles/gestionarPersonalAtencion.php",
      dataSrc: "",
    },

    columns: [
      {
        "data": "foto",
        "render": function (data) {
          return '<img  src="' + data + '" width=50 style="cursor:pointer" />';
        },
      },
      { "data": "identidad" },
      { "data": "nombre" },
      { "data": "apellido" },
      {
        "data": "direccion",
        "render": function (data, type, row) {
          if (type === "display") {
            return row.direccion + " / " + row.barrio + " / " + row.ciudad;
          } else {
            return data;
          }
        },
      },
      { "data": "estado" },
      { "data": "fecha" },
      { "data": "sintomas" },
      { "data": "observacion" },
      {
        "data": "id",
        "render": function (data) {
            return "<td><button data-id=" + data + " onclick='BuscarCita();'  type='button' class='btn btn-asignarpaciente btn-success btn-sm'><span class='boton-guardar-span' ><img src='/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/revisar.png' alt=''></span>Revisar</button>"
        }
    },
      //{"defaultContent": "<button data-id="+"id"+"onclick='EditarCliente()'  type='button' class='btn btn-edit btn-success btn-sm'>Editar</button>"},
    ],
  });
}

function AsignarPaciente() {
  $(".btn-asignarpaciente").click(function () {
    $("#idpaciente").val($(this).data("identidad"));
    $("#nombrepaciente").val($(this).data("nombre"));
    $("#apellidopaciente").val($(this).data("apellido"));
    $("#estadopaciente").val($(this).data("estado"));
    $("#observacionpaciente").val($(this).data("observacion"));
  });
 
}


function BuscarCita()
{
    $(".btn-asignarpaciente").click(function(){
        
        idcita = $(this).data("id");
        //console.log(idcita);
     
        $.ajax({
            type: "POST",
            dataType: "json",
            url:"controles/gestionarPersonalAtencion.php",
            data:{
                accion:'BuscarC',
                id:idcita,
            },      
            success: function(resp){
            console.log(resp);
         
             $("#idpaciente").val(resp[0]['identidad']);
             $("#nombrepaciente").val(resp[0]['nombre']);
             $("#apellidopaciente").val(resp[0]['apellido']);
             $("#estadopaciente").val(resp[0]['estado']);
             $("#observacionpaciente").val(resp[0]['observacion']);
             $("#banderapaciente").val(resp[0]['id']);

            }
        });


     
    });

}   

function ModificarDatosCita(){
  let banderapaciente =$("#banderapaciente").val();
  let estadopaciente =$("#estadopaciente").val();
  let observacionpaciente =$("#observacionpaciente").val();

  if(estadopaciente!=""&& observacionpaciente!=""){
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "controles/gestionarPersonalAtencion.php",
      data:{
          accion:"Modificar",
          banderapaciente:banderapaciente,
          estadopaciente:estadopaciente,
          observacionpaciente:observacionpaciente          
      },      
      success: function(resp){
          
          if(resp.validar){
              MensajeValidacion();
              
          }
          listadoPacientesAsignados();
          Limpiar();
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
