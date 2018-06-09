<!-- SECCION PARA ACTUALIZAR LAS EMPRESAS ASOCIADAS -->
<section>
    <div class="container">        

        <!-- FORMULARIO PARA REGISTRAR NUEVO ELEMENTO -->
        <div class="row">
            <div class="col s12 margin_top_detalle">            
                <div class="text-center">
                    <h1>Palabras</h1>
                    <p>Actualice los textos que se mostrarán del lado del cliente, puede filtrar por vista</p> <br><br>
                </div>
            </div>
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>
        
        <div class="row">
            <div class="col s12">
                <nav class="nav-extended grey darken-4">
                    <div class="nav-content">
                        <ul class="tabs tabs-transparent">
                        <?php 
                            $clase = "";
                            $encontrado = false;
                            foreach ($listVistas as $vista):
                                if($vista["vista"] == $vistaActiva){
                                    $encontrado = true;
                                    $clase      = "grey";
                                }else{
                                    $clase = "";
                                }
                        ?>
                            <li class="tab <?= $clase; ?>"><a href="<?= base_url() . "cPalabras?vista=" . $vista["vista"] ?>">
                                <?= $vista["vista"] ?></a>
                            </li>
                            
                        <?php 
                            endforeach;
                            if(!$encontrado){
                                $clase = "grey";
                            }else{
                                $clase = "";
                            }
                        ?>
                            <li class="tab <?= $clase; ?>"><a href="<?= base_url() . "cPalabras" ?>">
                                Todos</a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

        
        <?php foreach ($listPalabras as $palabra): ?>
        <div class="row">
            <form class="z-depth-3" enctype="multipart/form-data"
                action="<?php echo base_url(); ?>cPalabras/actualizarPalabraAccion?id=<?= $palabra['id'] ?> &vista=<?= $vistaActiva?>" method="post">

                <div class="row">
                    <div class="input-field col m2">
                        <input type="text" class="validate" disabled  name="vista" id="vista" value="<?= $palabra['vista'] ?>">
                        <label for="vista">Vista</label>
                    </div>

                    <div class="input-field col m2">
                        <input type="text" class="validate" disabled name="palabra_key" id="palabra_key" value="<?= $palabra['palabra_key'] ?>">
                        <label for="palabra_key">Código de Palabra</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <input type="text" class="validate" name="valor_es" id="valor_es" value="<?= $palabra['valor_es'] ?>" required>
                        <label for="valor_es">Español</label>
                    </div>

                    <div class="input-field col m6">
                        <input type="text" class="validate" name="valor_in" id="valor_in" value="<?= $palabra['valor_in'] ?>" required>
                        <label for="valor_in">Inglés</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col m6">
                        <button type="submit"  class="btn green" title="Actualizar">Actualizar</button>
                    </div>
                </div>
            </form>

            <div class="col s12 green separador_padre"><div></div></div>
        </div>
        <?php endforeach; ?>
        
    </div>
</section>