<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar Empresa Asociada</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>
        
        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cEmpresaAsociada/insertaEmpresa" method="post">

                <div class="row">
                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre" id="nombre" required>
                        <label for="nombre">Nombre</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descripcion_es" id="descripcion_es" required></textarea>
                        <label for="descripcion_es">Descripción Español</label>
                    </div>
               
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descripcion_in" id="descripcion_in" required></textarea>
                        <label for="descripcion_in">Descripción Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <div class="file-field input-field">
                            <div class="btn light-green darken-1">
                                <span>Imagen</span>
                                <input type="file" accept="application/, .jpg, .png, .jpeg, .gif" name="img" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="enlace" id="enlace" required></textarea>
                        <label for="enlace">Enlace</label>
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

        <?php foreach($listEmpresa as $empresa): ?>

        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cEmpresaAsociada/actualizarEmpresaAccion?id=<?= $empresa['id'] ?>" method="post">
             <!-- Valores originales -->
             <input type="text" class="hide" name="img_org" value="<?= $empresa['img'] ?>">

            <div class="row">
                <div class="input-field col m4">
                    <input type="text" class="validate" name="nombre" id="nombre" value="<?= $empresa['nombre'] ?>" required>
                    <label for="nombre">Nombre</label>
                </div>
            </div>
        

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_es" id="descripcion_es" required><?= $empresa['descripcion_es'] ?></textarea>
                    <label for="descripcion_es">Descripción Español</label>
                </div>
            
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_in" id="descripcion_in" required><?= $empresa['descripcion_in'] ?></textarea>
                    <label for="descripcion_in">Descripción Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <div class="file-field input-field">
                        <div class="btn light-green darken-1">
                            <span>Imagen</span>
                            <input type="file" accept="application/, .jpg, .png, .jpeg, .gif" name="img" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="enlace" id="enlace" value="<?= $empresa['enlace'] ?>" required>
                    <label for="enlace">Enlace</label>
                </div>    
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" 
                        href="<?php echo base_url() . "cEmpresaAsociada/eliminarEmpresa?id=" . $empresa["id"] . "&img=". $empresa['img'] ?>" 
                        title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>