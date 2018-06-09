<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">
                <div class="text-center">
                    <h1>ROLES</h1>
                    <p>Ingrese los datos solicitados para registrar una persona en el sistema.</p> <br><br>
                </div>
            </div>
        </div>

         <!-- Validaciones -->
         <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>/cRol/insertarRol" method="post">
                <div class="row">
                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre_es" id="nombre_es" required>
                        <label for="nombre_es">Nombre Español</label>
                    </div>

                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre_in" id="nombre_in" required>
                        <label for="nombre_in">Nombre Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m3">
                        <button type="submit" class="btn btn-success">Insertar</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- FIN DE FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->

    </div>
</section>