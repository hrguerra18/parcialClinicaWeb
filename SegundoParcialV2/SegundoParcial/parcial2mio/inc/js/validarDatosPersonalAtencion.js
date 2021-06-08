function validarPersonalAtencion() {
    
  
    var identificacion = document.getElementById("idPersonalAtencion").value;
    var nombre = document.getElementById("nombrePersonalAtencion").value;
    var apellido = document.getElementById("apellidoPersonalAtencion").value;
    var foto = document.getElementById("fotoPersonalAtencion").value;
    var estado = document.getElementById("estadoPersonalAtencion").value;
    var trabajando = document.getElementById("trabajandoPersonalAtencion").value;
    var tipo = document.getElementById("tipoPersonalAtencion").value;
  
    if (identificacion == "") {
      alert("error");
      return false;
    } else if (nombre == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe ingresar un nombre!",
        footer: "<a href></a>",
      });
      return false;
    } else if (apellido == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe ingresar un apellido!",
        footer: "<a href></a>",
      });
      return false;
    } else if (foto == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe ingresar una foto!",
        footer: "<a href></a>",
      });
      return false;
    } else if (estado == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe seleccionar un estado!",
        footer: "<a href></a>",
      });
      return false;
    } else if (trabajando == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe seleccionar un trabajadno!",
        footer: "<a href></a>",
      });
      return false;
    } else if (tipo == "") {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Debe seleccionar un tipo!",
        footer: "<a href></a>",
      });
      return false;
    }
    else{
        return false;
    }
  }
  