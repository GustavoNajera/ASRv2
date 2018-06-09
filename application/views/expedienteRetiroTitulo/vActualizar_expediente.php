<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Ingresar un retiro de título.</h1>
                    <p>A continuación se muestran los datos necesarios para ingresar un nuevo registro.</p> <br><br>
                </div>
            </div>
        </div>

         <!-- Validaciones -->
         <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <div class="row">
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>cExpedienteRetiroTitulo/insertarExpedienteRetiroTitulo" method="post">

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="datepicker validate" name="fecha_retiro" id="fecha_retiro" required>
                        <label for="fecha_retiro">Fecha del Retiro</label>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" class="validate" name="medio_retiro" id="medio_retiro" required>
                        <label for="medio_retiro">Medio del Retiro</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <select name="persona_origen">

                            <?php foreach($listPersona as $persona): ?>
                                <option value="<?= $persona["id_persona"]; ?>"><?=$persona["nombre"]; ?></option>
                            <?php endforeach; ?>
                            
                        </select>
                        <label>Estudiante</label>
                    </div>

                    <div class="input-field col m6">
                        <textarea class="materialize-textarea" name="detalle" id="detalle" required></textarea>
                        <label for="detalle">Detalle</label>
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
                <h1>Actualizar Expediente de retiro de títulos</h1>
                <p>A continuación se muestran los retiros de títulos registrados, asegurese de no dejar ningún dato vacío.</p>
            </div>
        </div>

        <?php
            foreach($listExpediente as $expediente): 
        ?>
        <form class="z-depth-3" enctype="multipart/form-data" action="<?php echo base_url(); ?>cExpedienteRetiroTitulo/actualizarExpedienteRetiroTitulo?id=<?= $expediente['id'] ?>" method="post">
           
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="datepicker validate" name="fecha_retiro" id="fecha_retiro" 
                        value="<?= $expediente["fecha_retiro"]?>" required>
                    <label for="fecha_retiro">Fecha</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="medio_retiro" 
                        id="medio_retiro" value="<?= $expediente["medio_retiro"]?>" required>
                    <label for="medio_retiro">Medio Retiro</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="detalle" id="detalle" required><?= $expediente["detalle"]?></textarea>
                    <label for="detalle">Detalle</label>
                </div>

                <div class="input-field col m6">
                    <select name="persona_origen">
                        <?php foreach($listPersona as $persona):
                            if ($persona["id_persona"] == $expediente["persona_origen"]){ ?>
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
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <a class="btn red darken-2 eliminar" href="<?php echo base_url()."cExpedienteRetiroTitulo/eliminarExpedienteRetiroTitulo?id=".$expediente["id"]?>" title="Eliminar">Eliminar <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>                
                    <button type="submit"  class="btn green" title="Actualizar">Actualizar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>

        <div class="col s12 green separador_padre"><div></div></div>
        <?php endforeach; ?>
        
    </div>
</section>