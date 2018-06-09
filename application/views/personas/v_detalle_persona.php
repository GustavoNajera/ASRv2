

<!--<h1>Bienvenido <?php echo $this->session->userdata["nombre"] . " " . $this->session->userdata["primer_apellido"]; ?></h1>-->

<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container">
        
        <div class="margin_top_detalle">
            <div class="row">
                <a class="btn btn-success" href="<?php echo base_url(); ?>cPersona/insertar">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Insertar Personas
                </a>
            </div>
            
            <div class="row" style="margin-top:50px;">
                <form method="POST" class="form-horizontal" action="<?php echo base_url(); ?>cPersona">
                    <div class="col s3 m3">
                        <input class="form-control" name="nombre" type="text" placeholder="Nombre">
                    </div>
                    <div class="col s3 m3">
                        <input class="form-control" name="apellido" type="text" placeholder="Apellido">
                    </div>
                    <div class="col s3 m3">
                        <input class="form-control" name="fecha_matriculado" type="date">
                    </div>
                    <div class="col s3 m3">
                        <input class="form-control" name="fecha_finalizado" type="date">
                    </div>
                    <div class="col s3 m3">                    
                        <button type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <ul class="collapsible popout">
                <?php
                    foreach($listPersona as $personaTem):
                        $persona        = $personaTem["persona"];
                        $listExpediente = $personaTem["expediente"];
                ?>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i> 
                            <?= $persona['nombre']." " . $persona['primer_apellido'] ?>
                        </div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col m4">
                                    <div class="col s12">
                                        <img class="responsive-img" src="<?= base_url() . $persona['img'] ?>">
                                    </div>
                                    <div class="col s12"><b>Cédula:</b> <?= $persona['cedula']; ?></div>
                                    <div class="col s12"><b>Rol:</b> <?= $persona['nombre_es']; ?></div>
                                    <div class="col s12"><b>Pais:</b> <?= $persona['pais'] ?></div>
                                    <div class="col s12">
                                        <a class="btn grey" href="<?= base_url()."cPersona/actualizarPersona?id=".$persona['id_persona'];?>" 
                                            title="Editar">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        
                                        <!-- Activa o Desactiva -->
                                        <?php if($persona['activo']){ ?>
                                            <a class="btn red eliminar" 
                                                data-estado="<?=$persona['activo']?>" 
                                                data-nombre="<?=$persona['nombre']?>" 
                                                id="<?= $persona['id_persona'] ?>" 
                                                onclick="return cambiarEstadoPersona(<?= $persona['id_persona'] ?>);" 
                                                title="Deactivar">
                                                <i class="material-icons" id="icon-<?= $persona['id_persona'] ?>">delete</i>
                                            </a>
                                        <?php }else{ ?>
                                            <a class="btn green" 
                                                data-estado="<?=$persona['activo']?>" 
                                                data-nombre="<?=$persona['nombre']?>" 
                                                id="<?= $persona['id_persona'] ?>" 
                                                onclick="return cambiarEstadoPersona(<?= $persona['id_persona'] ?>);" 
                                                title="Activar">
                                                <i class="material-icons" id="icon-<?= $persona['id_persona'] ?>">check</i>
                                            </a>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col m8">
                                    <h4>Lista de cursos</h4>
                                        <?php  if (count($listExpediente) == 0){ ?>
                                            <h6 class="text-warning">No tiene cursos registrados</h6>
                                        <?php 
                                        } else{ ?>
                                            <?php
                                            foreach ($listExpediente as $expediente) { ?>
                                                <h3><?= $expediente["curso"] ?></h3>
                                                <div>
                                                    <p><b>Notas: </b><?= $expediente["detalle"] ?></p>
                                                    <p><b>Fecha Matriculado: </b><?= $expediente["fecha_matriculado"] ?></p>
                                                    <p><b>Fecha Finalizado: </b><?= $expediente["fecha_finalizado"] ?></p>
                                                    <p><b>Estado: <span class="text-important"><?= $expediente["estado"] ?> </span> </b></p>
                                                    <?php 
                                                    if($expediente["titulo"] != null && $expediente["titulo"] != ""){ ?>
                                                        <a href="<?= base_url() . '/' . $expediente["titulo"]?>" style="color: #fff;" class="btn btn-success" 
                                                            download="titulo del curso <?= $expediente["curso"] ?>"> Descargar Archivo
                                                        </a>
                                                    <?php 
                                                    }else{ ?>
                                                        <p class="text-primary">No hay archivos disponibles para descargar</p>
                                                    <?php } ?>
                                                </div>    
                                        <?php
                                            } // Fin foreach
                                        } // Fin Else
                                        ?>
                                </div>
                            </div>
                        </div>
                    </li>
                
                <?php endforeach; ?>
            </ul>



        </div>

        </div>
    </div>
</section>