function validarUsuario() {
  var usuario, contraseña;
  //usuario = document.getElementById("usuario").value;
  //contraseña = document.getElementById("contraseña").value;
  usuario = recibirUsuario("usuario");
  contraseña = recibirContraseña("contraseña");

  if (usuario === "") {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Debe ingresar un usuario!",
      footer: "<a href>No tienes usuario para ingresar?</a>",
    });
    return false;
  } else if (contraseña == "") {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Debe ingresar una contraseña!",
      footer: "<a href>No tienes usuario para ingresar?</a>",
    });
    return false;
  }
}

function recibirUsuario(usuario) {
  let usuarioTemporal;
  usuarioTemporal = document.getElementById(usuario).value;
  return usuarioTemporal;
}

function recibirContraseña(contraseña) {
  let contraseñaTemporal;
  contraseñaTemporal = document.getElementById(contraseña).value;
  return contraseñaTemporal;
}

