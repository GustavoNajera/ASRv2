<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Matrícula.</h1>
                    <p>Registrar un estudiante en un curso o editar un registro existente.</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>
        
        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cExpedienteGeneral/insertarExpedienteAccion" method="post">

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="datepicker validate" name="fecha_matriculado" id="fecha_matriculado" required>
                        <label for="fecha_matriculado">Fecha Matriculado</label>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" class="datepicker validate" name="fecha_finalizado" id="fecha_finalizado">
                        <label for="fecha_finalizado">Fecha Finalizado</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="detalle" id="detalle" required></textarea>
                        <label for="detalle">Detalle</label>
                    </div>

                    <div class="input-field col m6">
                        <select name="persona">
                            <?php foreach($listPersona as $persona): ?>
                                <option value="<?= $persona["id_persona"]; ?>"><?=$persona["nombre"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Estudiante</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col m6">
                        <select name="curso">
                            <?php foreach($listCurso as $curso): ?>
                                <option value="<?= $curso["id"]; ?>"><?=$curso["nombre_es"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Curso</label>
                    </div>

                    <div class="input-field col m6">
                        <select name="estado">    
                            <?php foreach($listEstado as $estado): ?>
                                <option value="<?= $estado["id"]; ?>"><?=$estado["nombre_es"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Estado</label>
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
                <h1>Actualizar Expediente General</h1>
                <p>A continuación se muestran los estados de matrícula registrados, asegurese de no dejar ningún dato vacío.</p>
            </div>
        </div>

        <?php
            foreach($listExpediente as $expediente): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cExpedienteGeneral/actualizarExpedienteAccion?id=<?= $expediente['id'] ?>" method="post">
            <!-- Valores originales -->
            <input type="text" class="hide" name="titulo_org" value="<?= $expediente['titulo'] ?>">

            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="datepicker validate" name="fecha_matriculado" id="fecha_matriculado" 
                        value="<?= $expediente["fecha_matriculado"]?>" required>
                    <label for="fecha_matriculado">Fecha Matriculado</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="datepicker validate" name="fecha_finalizado" 
                        id="fecha_finalizado" value="<?= $expediente["fecha_finalizado"]?>">
                    <label for="fecha_finalizado">Fecha Finalizado</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="detalle" id="detalle" required><?= $expediente["detalle"]?></textarea>
                    <label for="detalle">Detalle</label>
                </div>

                <div class="input-field col m6">
                    <select name="persona">
                        <?php foreach($listPersona as $persona):
                            if ($persona["id_persona"] == $expediente["persona"]){ ?>
                                <option selected value="<?= $persona["id_persona"]; ?>"><?=$persona["nombre"]; ?></option>
                            <?php }else{ ?>
                                <option value="<?= $persona["id_persona"]; ?>"><?=$persona["nombre"]; ?></option>
                        <?php } endforeach; ?>    
                    </select>
                    <label>Estudiante</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <select name="curso">
                        <?php foreach($listCurso as $curso): 
                            if($curso["id"] == $expediente["curso"]){ ?>
                                <option selected value="<?= $curso["id"]; ?>"><?=$curso["nombre_es"]; ?></option>
                            <?php }else{ ?>
                                <option value="<?= $curso["id"]; ?>"><?=$curso["nombre_es"]; ?></option>
                        <?php }endforeach; ?>
                    </select>
                    <label>Curso</label>
                </div>

                <div class="input-field col m6">
                    <select name="estado">    
                        <?php foreach($listEstado as $estado): 
                            if($estado["id"] == $expediente["estado"]){ ?>
                                <option selected value="<?= $estado["id"]; ?>"><?=$estado["nombre_es"]; ?></option>
                            <?php }else{ ?> 
                                <option value="<?= $estado["id"]; ?>"><?=$estado["nombre_es"]; ?></option>
                        <?php }endforeach; ?>
                    </select>
                    <label>Estado</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">

                    <div class="file-field input-field">
                        <div class="btn light-green darken-1">
                            <span>File</span>
                            <input type="file" accept="application/pdf, .doc, .docx, .odf" name="titulo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>

                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" 
                        href="<?php echo base_url() . "cExpedienteGeneral/eliminarExpedienteAccion?id=" . $expediente["id"] .
                         "&titulo=" . $expediente['titulo'] ?>" title="Eliminar">Eliminar</a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar</button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>