<?php

include("inc/head.php");
include("inc/menu.php");
?>

<div style="text-align: center;">
    <h1>CANTIDAD DE USUARIO POR TIPO</h1>
    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaCantidadUsuario" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
        </div>
    </div>
</div>



<div style="text-align: center;">
    <h1>CANTIDAD CITAS POR PERSONAL</h1>
    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaCantidadCitaPersonal" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <h1>CANTIDAD CITAS POR PACIENTES</h1>
    <div class="container-fluid p-2">
        <div class="card">
            <div class="card-body">
                <table id="tablaCantidadCitaPaciente" class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>


            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="inc/js/reportes.js"></script>

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





</main>



<?php
include("inc/footer.php");

?>