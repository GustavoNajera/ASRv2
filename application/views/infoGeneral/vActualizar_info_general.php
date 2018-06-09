<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar Info General</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cInfo_general/insertarInfoGeneral" method="post">

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="nombre_es" id="nombre_es" required>
                        <label for="nombre_es">Nombre Español</label>
                    </div>
                    
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="nombre_in" id="nombre_in" required>
                        <label for="nombre_in">Nombre Ingles</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descripcion_es" id="descripcion_es" required></textarea>
                        <label for="descripcion_es">Descripción Español</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descripcion_in" id="descripcion_in" required></textarea>
                        <label for="descripcion_in">Descripción Ingles</label>
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
                <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Actualizar Características de Categorías</h1>
                <p>A continuación se muestran las infoGeneralerísticas registradas, asegurese de no dejar ningún dato vacío</p>
            </div>
        </div>

        <?php
            foreach($listInfoGeneral as $infoGeneral): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" 
            action="<?php echo base_url(); ?>cInfo_general/actualizarInfoGeneral?id=<?= $infoGeneral['id'] ?>" method="post">

            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" value="<?= $infoGeneral['nombre_es'] ?>" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>
                
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" id="nombre_in" value="<?= $infoGeneral['nombre_in'] ?>" required>
                    <label for="nombre_in">Nombre Ingles</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_es" id="descripcion_es" required><?= $infoGeneral['descripcion_es'] ?></textarea>
                    <label for="descripcion_es">Descripción Español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_in" id="descripcion_in" required><?= $infoGeneral['descripcion_in'] ?></textarea>
                    <label for="descripcion_in">Descripción Ingles</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."cInfo_general/eliminarInfoGeneral?id=".$infoGeneral["id"]?>" title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>