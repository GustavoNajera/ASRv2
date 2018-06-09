<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar Imagen para el carousel</h1>
                    <p>Los datos ingresados se mostrarán del lado del cliente, favor no dejar ningún campo vacío</p> <br><br>
                </div>
            </div>
        </div>

         <!-- Validaciones -->
         <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>ImgCarousel/insertaImgAccion" method="post">

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="titulo_es" id="titulo_es" required>
                        <label for="titulo_es">Título Español</label>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" class="validate" name="titulo_in" id="titulo_in" required>
                        <label for="titulo_in">Título Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="desc_es" id="desc_es" required></textarea>
                        <label for="desc_es">Descripción Español</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="desc_in" id="desc_in" required></textarea>
                        <label for="desc_in">Descripción Inglés</label>
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
                <h1> Actualizar Imagen del Carousel</h1>
                <p>Procure ingresar todos los datos, si no selecciona ninguna imagen se mantiene la ingresada previamente</p>
            </div>
        </div>

        <?php
            foreach($listImg as $img):
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>ImgCarousel/actualizaImgAccion?id=<?= $img['id'] ?>" method="post">
            <!-- Valores originales -->
            <input type="text" class="hide" name="img_org" value="<?= $img['ruta'] ?>">

            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="titulo_es" id="titulo_es" value="<?= $img['titulo_es'] ?>" required>
                    <label for="titulo_es">Título Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="titulo_in" id="titulo_in" value="<?= $img['titulo_in'] ?>" required>
                    <label for="titulo_in">Título Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="desc_es" id="desc_es" required><?= $img['desc_es'] ?></textarea>
                    <label for="desc_es">Descripción Español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="desc_in" id="desc_in" required><?= $img['desc_in'] ?></textarea>
                    <label for="desc_in">Descripción Inglés</label>
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
                    <a class="btn red darken-2 eliminar" 
                        href="<?php echo base_url() . "ImgCarousel/eliminaImgAccion?id=" . $img["id"] . "&img=" . $img['ruta'] ?>" 
                        title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>