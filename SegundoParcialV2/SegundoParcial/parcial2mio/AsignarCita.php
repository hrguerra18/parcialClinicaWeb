<?php

include("inc/head.php");
include("inc/menuCitas.php");
?>


<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-5 mb-4">
                            <label for="validationCustom01">Identidad Paciente</label>
                            <input type="text" disabled="disabled" class="form-control" id="identidadPacienteCita" placeholder="Identificacion del Paciente" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <label for="validationCustom01">Fecha</label>
                            <input type="date" class="form-control" id="fechacita" placeholder="Fecha" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="validationCustom02">Sintomas</label>
                            <input type="text" class="form-control" id="sintomascita" placeholder="¿Como te sientes?" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="validationCustomUsername">Identidad del personal</label>

                            <input type="text" disabled="disabled" class="form-control" id="idPersonalCita" placeholder="Identidadd del personal" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>

                        </div>

                    </div>

                    <button onclick="AdicionarCita()" id="btnguardarPersonalAtencion" class="btn btn-primary btn-guardar" type="submit">
                    <span class="boton-guardar-span" ><img src="/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/agendar.png" alt=""></span></button>
                </form>


            </div>
        </div>
    </div>

    <div style="display: flex;">
        <div class="container-fluid p-2">
            <div class="card">
                <div class="card-body">
                    <table id="tablaPersonal" class="table table-hover my-0">
                    <h2 class="fw-bold mb-5">PERSONAL DE ATENCION</h2>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo</th>
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

        <div class="container-fluid p-2">
            <div class="card">
                <div class="card-body">
                    <table id="tablaPaciente" class="table table-hover my-0">
                    <h2 class="fw-bold mb-5">PACIENTES</h2>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </div>

    <!--Lista de citas agendadas-->
    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaCitas" class="table table-hover my-0">
                    <thead>
                        <tr>
                        <th>Foto</th>
                            <th>Identidad Paciente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Foto del Personal</th>
                            <th>Identidad Personal</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha</th>
                            <th>Sintomas</th>
                            <th>Estado</th>
                            <th>Observacion</th>
                           <!-- <th>Acciones</th>-->
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
        </div>
    </div>

    <script type="text/javascript" src="inc/js/asignarCita.js"></script>
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
</main>



<?php
include("inc/footer.php");

?>