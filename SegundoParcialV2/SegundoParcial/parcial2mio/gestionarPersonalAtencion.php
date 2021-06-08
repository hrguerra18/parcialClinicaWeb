<?php

include("inc/head.php");
include("inc/menuPersonalAtencion.php");
?>

<main class="content">
    
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Identificacion</label>
                            <input type="hidden"  class="form-control" id="banderapaciente" placeholder="Identificacion" required>

                            <input type="text" disabled="disabled" class="form-control" id="idpaciente" placeholder="Identificacion" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Nombre</label>
                            <input type="hidden" class="form-control" id="idcliente">
                            <input type="text" disabled="disabled" class="form-control" id="nombrepaciente" placeholder="Nombres" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Apellido</label>
                            <input type="text" disabled="disabled" class="form-control" id="apellidopaciente" placeholder="Apellidos" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                       
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom04">Estado</label>
                            <select class="form-select" id="estadopaciente" aria-label="Default select example" required>
                                <option selected disabled value="">Seleccione el estado</option>
                                <option value="Asignado">Asignado</option>
                                <option value="No atendido">No atendido</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Atendido">Atendido</option>
                                <option value="En servicio">En servicio</option>

                            </select>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom01">Observacion</label>
                            <input type="text" class="form-control" id="observacionpaciente" placeholder="Observacion" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>

                    <button onclick="ModificarDatosCita()" id="btnguardarPersonalAtencion" class="btn btn-primary btn-guardar" type="submit">
                    <span class="boton-guardar-span" ><img src="/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/usuario.png" alt=""></span></button>
                </form>


            </div>
        </div>
</div>


    <!--Listas de clientes-->

  



    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaListadoPacientesAsignados" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Identificacion</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dir/Ciu/Barrio</th>
                            <th>Estado</th>
                            <th>FechaCita</th>
                            <th>Sintomas</th>
                            <th>Observacion</th>
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



<script type="text/javascript" src="inc/js/gestionarPersonalAtencion.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</main>



<?php
include("inc/footer.php");

?>