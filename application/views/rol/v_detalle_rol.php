

<!--<h1>Bienvenido <?php echo $this->session->userdata["nombre"] . " " . $this->session->userdata["primer_apellido"]; ?></h1>-->

<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container">
        
        <div class="row">
            
            <div class="col s12 margin_top_detalle">
            
                <div class="text-center">
                    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ROLES</h1>
                    <p>A continuación se muestra el listado de roles registrados en el sistema.</p>
                </div>

                <a class="btn btn-success" href="<?php echo base_url(); ?>cRol/insertar">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Insertar Roles
                </a>
            </div>            
        </div>

        <!-- Separador -->
        <div class="separador_padre"><div></div></div>
        
            <div class="row">
            <?php foreach($listRol as $rol): ?>
                <div class="col m4">
                    <div class="col s12"><b>Nombre español:</b> <?= $rol['nombre_es']; ?></div>
                    <div class="col s12"><b>Nombre inglés:</b> <?= $rol['nombre_in']; ?></div>
                    <div class="col s12">
                        <b>Acciones:</b>
                        <a class="btn grey" href="<?= base_url()."cRol/actualizarRol?id=".$rol['id'];?>" title="Editar">
                            <i class="material-icons">edit</i>
                        </a>
                        <a class="btn red eliminar"  href="<?= base_url()."cRol/eliminarRol?id=".$rol['id'];?>" title="Eliminar">
                            <i class="material-icons" id="icon-estado">delete</i>
                        </a>
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>