<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>PERSONAS.</h1>
                    <p>A continuación se muestran los datos que puede editar, asegurese de no dejar ningún campo vacío.</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <?php
            $persona = $listPersona[0];
        ?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>/cPersona/actualizarPersonaAccion?id=<?= $persona['id_persona'] ?>" method="post">
                <!-- Valores originales -->
                <input type="text" class="hide " name="img_org" value="<?= $persona['img'] ?>">
                <input type="text" class="hide " name="activo" value="<?= $persona['activo'] ?>">

                <div class="row">
                    <div class="input-field col m3">
                        <input type="text" class="validate" name="nombre" id="nombre" value="<?= $persona['nombre'] ?>" required>
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="input-field col m3">
                        <input type="text" class="validate" name="primer_apellido" id="primer_apellido"
                            value="<?= $persona['primer_apellido'] ?>" required>
                        <label for="primer_apellido">Primer apellido</label>
                    </div>

                    <div class="input-field col m3">
                        <input type="text" class="validate" name="segundo_apellido" id="segundo_apellido" 
                            value="<?= $persona['segundo_apellido'] ?>" required>
                        <label for="segundo_apellido">Segundo Apellido</label>
                    </div>

                    <div class="input-field col m3">
                        <input type="text" class="validate" name="cedula" id="cedula" value="<?= $persona['cedula'] ?>" required>
                        <label for="cedula">Cédula</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m3">
                        <input type="text" class="validate" name="numero" id="numero" value="<?= $persona['numero'] ?>" required>
                        <label for="numero">Número</label>
                    </div>

                    <div class="input-field col m3">
                        <select name="rol">
                        <?php
                                foreach($listRol as $rol): 
                                    if($rol["id"] == $persona["id_rol"]){ 
                                    ?>
                                        <option selected value="<?= $rol["id"]; ?>"><?=$rol["nombre_es"]; ?></option>
                                    <?php
                                    }else{
                                    ?>
                                        <option value="<?= $rol["id"]; ?>"><?= $rol["nombre_es"]; ?></option>
                                    <?php
                                    }
                                endforeach;
                            ?>
                        </select>
                        <label for="rol">Rol</label>
                    </div>

                    <div class="input-field col m3">
                        <input type="text" class="validate" name="pais" id="pais" value="<?= $persona['pais'] ?>" required>
                        <label for="pais">Pais</label>
                    </div>

                    <div class="input-field col m3">
                        <input type="password" class="validate" name="pass" id="pass" value="<?= $persona['pass'] ?>" required>
                        <label for="pass">Contraseña</label>
                    </div>
                </div>

               

                 <div class="row">
                    <div class="input-field col m3">
                        <input type="text" class="validate" name="correo" id="correo" value="<?= $persona['correo'] ?>" required>
                        <label for="correo">Correo</label>
                    </div>
                    
                    <div class="input-field col m3">
                        <input type="text" class="datepicker validate" name="fecha_nac" id="fecha_nac" 
                            value="<?= $persona['fecha_nac'] ?>" required>
                        <label for="fecha_nac">Fecha Nacimiento</label>
                    </div>

                    <div class="input-field col m3">
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
                    
                    <div class="input-field col m3">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- FIN DE FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->

    </div>
</section>