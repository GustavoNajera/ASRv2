<?php
/*****************************************************
******************************************************

 * NO TIENE MATERIALIZE (ESTA INCOMPLETA)

 ******************************************************
 *****************************************************/
?>

<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">
        
        <!-- ALERTAS -->
        <?php if(!isset($listLogros)){ ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Ha ocurrido un error <a href="<?php echo base_url(); ?>cLogros" class="alert-link">Volver</a>
            </div>

        <?php
            }else{
                if(isset($result)){
        ?>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$result?>
                </div>
        <?php } ?>
        <!-- FIN DE ALERTAS -->

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="col-sm-12 margin_top_detalle">
            <div class="text-center">
                <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Ingresar Logros</h1>
                <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro.</p>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?>cLogros/insertarLogroAccion" method="post">

            <div class="col-sm-6">
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nombre_es">Nombre Español:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre_es" id="nombre_es" placeholder="Nombre Español">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="descripcion_es">Descripción Español:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion_es" id="descripcion_es" placeholder="Descripción Español"></textarea>
                    </div>
                </div>
        
            </div>

            <div class="col-sm-6">
            
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nombre_in">Nombre Inglés:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre_in" id="nombre_in" placeholder="Nombre Inglés">
                    </div>
                </div>   
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="descripcion_in">Descripción Inglés:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion_in" id="descripcion_in" placeholder="Descripción Inglés"></textarea>
                    </div>
                </div>   
            
            </div>

            <div class="col-xs-12">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn-success btn-per-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Ingresar</button>
                    </div>
                </div>
            </div>

        </form>
        <!-- FIN DE FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->

        <!-- Separador -->
        <div class="col-sm-12 separador_padre"><div></div></div>
    
        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="col-sm-12 margin_top_detalle">            
            <div class="text-center">
                <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Actualizar Logros</h1>
                <p>A continuación se muestran los logros registrados, asegurese de no dejar ningún dato vacío.</p>
            </div>
        </div>

        <?php
            foreach($listLogros as $logro): 
        ?>
        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url(); ?>cLogros/actualizarLogroAccion?id=<?= $logro['id'] ?>" method="post">

            <!-- Columna izquierda -->
            <div class="col-sm-6">
            
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nombre_es">Nombre Español:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nombre_es" id="nombre_es" value="<?= $logro['nombre_es'] ?>">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nombre_in">Nombre Inglés:</label>
                    <div class="col-sm-9"> 
                        <input type="text" class="form-control" name="nombre_in" id="nombre_in"  value="<?= $logro['nombre_in'] ?>">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="descripcion_es">Descripción Español:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion_es" id="descripcion_es"><?= $logro['descripcion_es'] ?></textarea>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label col-sm-3" for="descripcion_in">Descripción Inglés:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="descripcion_in" id="descripcion_in"><?= $logro['descripcion_in'] ?></textarea>
                    </div>
                </div>   
            </div>      

            <div class="col-xs-12">
                <div class="form-group"> 
                    <div class="col-sm-3">
                        <a href="<?php echo base_url()."cLogros/eliminarLogro?id=".$logro["id"]?>" class="btn btn-danger eliminar" title="Eliminar">Eliminar <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    
                        <button type="submit"  class="btn btn-success" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        
        </form>
        <?php
            endforeach; } ?>
        
    </div>
</section>