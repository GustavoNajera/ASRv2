<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container-fluid">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Empresa</h1>
                    <p>A continuación se muestran los datos que puede editar, asegurese de no dejar ningún campo vacío.</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <?php $empresa = $listEmpresa[0]; ?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cEmpresa/actualizarEmpresaAccion?id=<?= $empresa['id'] ?>" method="post">
                <!-- Valores originales -->
                <input type="text" class="hide" name="logo_es_org" value="<?= $empresa['logo_es'] ?>">
                <input type="text" class="hide" name="logo_in_org" value="<?= $empresa['logo_in'] ?>">

                <div class="row">
                    <div class="input-field col m4">
                        <input type="text" class="validate" name="nombre" id="nombre" value="<?= $empresa['nombre'] ?>" required>
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="input-field col m4">
                        <input type="email" class="validate" name="correo" id="correo" value="<?= $empresa['correo'] ?>" required>
                        <label for="correo">Correo</label>
                    </div>

                    <div class="input-field col m4">
                        <input type="number" class="validate" name="numero" id="numero" value="<?= $empresa['numero'] ?>" required>
                        <label for="numero">Teléfono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="mision_es" id="mision_es" required><?= $empresa["mision_es"]?></textarea>
                        <label for="mision_es">Misión Español</label>
                    </div>
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="mision_in" id="mision_in" required><?= $empresa["mision_in"]?></textarea>   
                        <label for="mision_in">Mision Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="vision_es" id="vision_es" required><?= $empresa["vision_es"]?></textarea>
                        <label for="vision_es">Visión Español</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="vision_in" id="vision_in" required><?= $empresa["vision_in"]?></textarea>
                        <label for="vision_in">Visión Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="historia_es" id="historia_es" required><?= $empresa["historia_es"]?></textarea>
                        <label for="historia_es">Historia Español</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="historia_in" id="historia_in" required><?= $empresa["historia_in"]?></textarea>
                        <label for="historia_in">Historia Inglés</label>
                    </div>
                </div>

                 <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="experiencia_es" id="experiencia_es" required><?= $empresa["experiencia_es"]?></textarea>
                        <label for="experiencia_es">Experiencia Español</label>
                    </div>                    
                    
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="experiencia_in" id="experiencia_in" required><?= $empresa["experiencia_in"]?></textarea>
                        <label for="experiencia_in">Experiencia Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m5">
                        <input type="text" class="validate" name="horario_atencion_es" id="horario_atencion_es" value="<?= $empresa['horario_atencion_es'] ?>" required>
                        <label for="horario_atencion_es">Horario Atención Español</label>
                    </div>

                    <div class="input-field col m5">
                        <input type="text" class="validate" name="horario_atencion_in" id="horario_atencion_in" value="<?= $empresa['horario_atencion_in'] ?>" required>
                        <label for="horario_atencion_in">Horario Atención Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m5">
                        <div class="file-field input-field">
                            <div class="btn light-green darken-1">
                                <span>Logo Español</span>
                                <input type="file" accept="application/, .jpg, .png, .jpeg, .gif" name="logo_es">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="input-field col m5">
                        <div class="file-field input-field">
                            <div class="btn light-green darken-1">
                                <span>Logo Inglés</span>
                                <input type="file" accept="application/, .jpg, .png, .jpeg, .gif" name="logo_in">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
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



