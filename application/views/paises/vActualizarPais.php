<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar un País</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>CPais/insertarPaisAccion" method="post">
                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="nombre" id="nombre" required>
                        <label for="nombre">Nombre</label>
                    </div>

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
                <h1>Actualizar País</h1>
                <p>A continuación se muestran los países registrados, asegurese de no dejar ningún dato vacío</p>
            </div>
        </div>

        <?php
             foreach($listPais as $pais): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>CPais/actualizarPaisAccion?id=<?= $pais['id'] ?>" method="post">
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre" id="nombre" value="<?= $pais['nombre'] ?>" required>
                    <label for="nombre">Nombre Español</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."CPais/eliminarPais?id=".$pais["id"]?>" title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar</button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>