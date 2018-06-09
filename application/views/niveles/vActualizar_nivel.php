<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar un Nivel</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>
        
        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cNivel/insertarNivelAccion" method="post">

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="nombre_es" id="nombre_es" required>
                        <label for="nombre_es">Nombre Español</label>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" class="validate" name="nombre_in" id="nombre_in" required>
                        <label for="nombre_in">Nombre Inglés</label>
                    </div>
                </div>

                 <div class="row">
                    <div class="input-field col m6">
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- FIN DE FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->

    </div>
</section>
<section class="grey lighten-3">
    <div class="container">
        <!-- FORMULARIO PARA ACTUALIZAR NUEVO ELEMENTO -->
        <div class="col m12 margin_top_detalle">            
            <div class="text-center">
                <h1>Actualizar Niveles</h1>
                <p>A continuación se muestran los niveles registradas, asegurese de no dejar ningún dato vacío</p>
            </div>
        </div>

        <?php
            foreach($listNivel as $nivel): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cNivel/actualizarNivelAccion?id=<?= $nivel['id'] ?>" method="post">
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" value="<?= $nivel['nombre_es'] ?>" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" id="nombre_in" value="<?= $nivel['nombre_in'] ?>" required>
                    <label for="nombre_in">Nombre Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."cNivel/eliminarNivel?id=".$nivel["id"]?>" title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar</button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>