<!-- SECCION PARA INGRESAR ESTADOS DE MATRICULA -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Estado de Matrícula.</h1>
                    <p>Registrar un estado de matrícula.</p> <br><br>
                </div>
            </div>
        </div>

         <!-- Validaciones -->
         <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cEstadoMatricula/insertarEstadoMatriculaAccion" method="post">

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
                <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Actualizar Expediente General</h1>
                <p>A continuación se muestran los estados de matrícula registrados, asegurese de no dejar ningún dato vacío.</p>
            </div>
        </div>

        <?php
             foreach($listEstado as $estado): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cEstadoMatricula/actualizarEstadoMatriculaAccion?id=<?= $estado['id'] ?>" method="post">

            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" 
                        value="<?= $estado['nombre_es'] ?>" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" 
                        id="nombre_in" value="<?= $estado["nombre_in"]?>" required>
                    <label for="nombre_in">Nombre Inglés</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."cEstadoMatricula/eliminarEstado?id=".$estado["id"]?>" title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>
