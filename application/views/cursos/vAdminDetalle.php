

<!--<h1>Bienvenido <?php echo $this->session->userdata["nombre"] . " " . $this->session->userdata["primer_apellido"]; ?></h1>-->

<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container">
        
        <div class="row">
            
            <div class="col s12 margin_top_detalle">
                <div>
                    <h1>Cursos</h1>
                    <p>A continuación se muestra el listado de cursos registrados en el sistema.</p>
                </div>

                <a class="btn" href="<?php echo base_url(); ?>cCursos/adminInsertar">Insertar Cursos</a>
            </div>            
        </div>

        <!-- Separador -->
        <div class="col s12 green separador_padre"><div></div></div>

            <div class="row">
                <?php foreach($listCursos as $curso): ?>
                    <div class="col m6">
                        <h6><b><?= $curso['nombre_es']; ?></b></h6>
                        <div class="col s12"><?= $curso['resumen_es']; ?></div>
                        <div class="col s12">
                            <a class="btn grey" href="<?= base_url()."cCursos/adminActualizar?id=".$curso['id'];?>" 
                            title="Editar"><i class="material-icons">edit</i></a>
                            
                            <!-- Activa o Desactiva -->
                            <?php if($curso['activo']){ ?>
                                <a class="btn red eliminar" data-estado="<?=$curso['activo']?>" data-nombre="<?=$curso['nombre_es']?>"
                                    id="<?= $curso['id'] ?>" onclick="return cambiarEstadoCurso(<?= $curso['id'] ?>);" title="Deactivar">
                                    <i class="material-icons" id="icon-<?= $curso['id'] ?>">delete</i>
                                </a>
                            <?php }else{ ?>
                                <a class="btn green" data-estado="<?=$curso['activo']?>" data-nombre="<?=$curso['nombre_es']?>" 
                                    id="<?= $curso['id'] ?>" onclick="return cambiarEstadoCurso(<?= $curso['id'] ?>);" title="Activar">
                                    <i class="material-icons" id="icon-<?= $curso['id'] ?>">check</i>
                                </a>
                            <?php }?>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        </div>
    </div>
</section>