<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar Característica de un Curso.</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>CCaractCurso/insertarCaractAccion" method="post">

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
                        <select id="curso" name="curso">
                            <?php foreach($listCurso as $curso): ?>   
                                <option value="<?= $curso["id"]; ?>"><?= $curso["nombre_es"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Curso</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descri_es" id="descri_es" required></textarea>
                        <label for="descri_es">Descripción Español</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="descri_in" id="descri_in" required></textarea>
                        <label for="descri_in">Descripción Inglés</label>
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
           foreach($listCaract as $caract): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cCaractCurso/actualizarCaractAccion?id=<?= $caract['id'] ?>" method="post">
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" value="<?= $caract['nombre_es'] ?>" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" id="nombre_in"  value="<?= $caract['nombre_in'] ?>" required>
                    <label for="nombre_in">Nombre Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <select id="curso" name="curso">
                    <?php
                        foreach($listCurso as $curso): 
                            if($curso["id"] == $caract["curso"]){ 
                            ?>
                                <option selected value="<?= $curso["id"]; ?>"><?=$curso["nombre_es"]; ?></option>
                            <?php
                            }else{
                            ?>
                                <option value="<?= $curso["id"]; ?>"><?= $curso["nombre_es"]; ?></option>
                            <?php
                            }
                        endforeach;
                    ?>
                    </select>
                    <label>Curso</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descri_es" id="descri_es" required><?= $caract['descri_es'] ?></textarea>
                    <label for="descri_es">Descripción Español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descri_in" id="descri_in" required><?= $caract['descri_es'] ?></textarea>
                    <label for="descri_in">Descripción Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."CCaractCurso/eliminarCaract?id=".$caract["id"]?>" title="Eliminar">Eliminar <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>