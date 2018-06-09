<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar una Cagtegoría</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cCategorias/insertarCategoriaAccion" method="post">

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
                <h1>Actualizar Categorías</h1>
                <p>A continuación se muestran las Categorías registradas, asegurese de no dejar ningún dato vacío</p>
            </div>
        </div>

        <?php
            foreach($listCat as $categoria): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cCategorias/actualizarCategoriaAccion?id=<?= $categoria['id'] ?>" method="post">
             
            <!-- Valores originales -->
             <input type="text" class="hide" name="img_org" value="<?= $categoria['img'] ?>">
            
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" value="<?= $categoria['nombre_es'] ?>" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" id="nombre_in" value="<?= $categoria['nombre_in'] ?>" required>
                    <label for="nombre_in">Nombre Inglés</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col m6">
                    <div class="file-field input-field">
                        <div class="btn light-green darken-1">
                            <span>Imagen</span>
                            <input type="file" accept="application/, .jpg, .png, .jpeg, .gif" name="img">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="input-field col m6">
                    <a class="btn red darken-2" 
                        href="<?php echo base_url()."cCategorias/eliminarCategoria?id=".$categoria["id"] . "&img=" . $categoria['img'] ?>" 
                        title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar</button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>