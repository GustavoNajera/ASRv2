<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>ROlES</h1>
                    <p>A continuación se muestran los datos que puede editar, asegurese de no dejar ningún campo vacío.</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <?php $rol = $listRol[0]; ?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>/cRol/actualizarRolAccion?id=<?= $rol['id'] ?>" method="post">
                <div class="row">
                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre_es" id="nombre_es" value="<?= $rol['nombre_es'] ?>" required>
                        <label for="nombre_es">Nombre Español</label>
                    </div>

                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre_in" id="nombre_in" value="<?= $rol['nombre_in'] ?>" required>
                        <label for="nombre_in">Nombre Inglés</label>
                    </div>

                    
                <div class="row">
                    <div class="input-field col m3">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- FIN DE FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->

    </div>
</section>