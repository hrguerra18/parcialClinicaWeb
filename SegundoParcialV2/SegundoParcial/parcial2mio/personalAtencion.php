<?php

include("inc/head.php");
include("inc/menuAtencion.php");
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/SegundoParcialV2/SegundoParcial/parcial2mio/inc/css/stylemenu.css">

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Identificacion</label>
                            <input type="hidden" class="form-control" id="Bandera">
                            <input type="text" class="form-control" id="idPersonalAtencion" placeholder="Identificacion" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Nombres</label>
                            <input type="hidden" class="form-control" id="idcliente">
                            <input type="text" class="form-control" id="nombrePersonalAtencion" placeholder="Nombres" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Apellidos</label>
                            <input type="text" class="form-control" id="apellidoPersonalAtencion" placeholder="Apellidos" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Foto</label>

                            <input type="text" class="form-control" id="fotoPersonalAtencion" placeholder="Foto" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Estado</label>
                            <select class="form-select" id="estadoPersonalAtencion" aria-label="Default select example" required>
                                <option selected disabled value="">Seleccione el estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>

                            </select>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom05">Trabajando</label>
                            <select class="form-select" id="trabajandoPersonalAtencion" aria-label="Default select example" required>
                                <option selected disabled value="">Seleccione el servicio</option>
                                <option value="En servicio">En servicio</option>
                                <option value="Libre">Libre</option>
                            </select>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Tipo</label>
                            <select class="form-select" id="tipoPersonalAtencion" aria-label="Default select example" required>
                                <option selected disabled value="">Seleccione el tipo</option>
                                <option value="Medico">Medico</option>
                                <option value="Fisioterapeuta">Fisioterapeuta</option>
                                <option value="Enfermero">Enfermero</option>
                            </select>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>

                    </div>

                    <button onclick="AdicionarPersonalAtencion()" id="btnguardarPersonalAtencion" class="btn btn-primary btn-guardar " type="submit">
                    <span class="boton-guardar-span" ><img src="/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/salvar.png" alt=""></span></button>
                </form>


            </div>
        </div>
    </div>


    <!--Listas de clientes-->

  



    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaPersonalAtencion" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Trabajando</th>
                            <th>Acciones</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
        </div>
    </div>


    <script type="text/javascript" src="inc/js/personalAtencion.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="inc/js/validarDatosPersonalAtencion.js"></script>

</main>



<?php
include("inc/footer.php");

?>