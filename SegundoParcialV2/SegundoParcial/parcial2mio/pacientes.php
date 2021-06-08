<?php

include("inc/head.php");
include("inc/menupaciente.php");
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Identidad</label>
                            <input type="hidden" class="form-control" id="bandera" placeholder="bandera" aria-describedby="inputGroupPrepend" required>
                            <input type="text" class="form-control" id="identidadPaciente" placeholder="Identidad" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Nombres</label>
                            <input type="text" class="form-control" id="nombrepaciente" placeholder="Nombres" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Apellidos</label>
                            <input type="text" class="form-control" id="apellidopaciente" placeholder="Apellidos" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Fecha nacimiento</label>
                            <input type="date" class="form-control" id="fechanacimientopaciente" placeholder="Fecha nacimiento" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Edad</label>
                            <input type="number" class="form-control" id="edadpaciente" placeholder="Edad" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Foto</label>
                            <input type="text" class="form-control" id="fotopaciente" placeholder="Foto" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Direccion</label>
                            <input type="text" class="form-control" id="direccionpaciente" placeholder="Direccion" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Barrio</label>
                            <input type="text" class="form-control" id="barriopaciente" placeholder="Barrio" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Ciudad</label>
                            <input type="text" class="form-control" id="ciudadpaciente" placeholder="Ciudad" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Telefono</label>
                            <input type="text" class="form-control" id="telefonopaciente" placeholder="Telefono" required>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Estado</label>
                            <select id="estadopaciente" class="form-select" required>
                                <option selected disabled value="">Seleccione</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            <div class="invalid-feedback">
                                Ingrese un Dato Valido
                            </div>
                        </div>
                    </div>
                    <button onclick="AdicionarPaciente();" class="btn btn-primary btn-guardar" type="submit">
                    <span class="boton-guardar-span" ><img src="/SegundoParcialV2/SegundoParcial/parcial2mio/inc/img/salvar.png" alt=""></span></button>
                    <!---<button type="submit" class="btn btn-lg btn-primary"  id="botonguardar" >Guardar</button> -->
                </form>


            </div>
        </div>
    </div>


    <!--Listas de pacientes-->

    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <table id="tablapacientes" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha Nacimiento</th>
                            <th>Edad</th>
                            <th>Direccion</th>
                            <th>Barrio</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="inc/js/pacientes.js"></script>

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

    <script>
        $(document).ready(function() {
            $('#tablapacientes').DataTable();
        });
    </script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</main>



<?php
include("inc/footer.php");

?>