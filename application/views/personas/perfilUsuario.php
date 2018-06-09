<section>
    <div class="container">
        
        <div class="row">
            
            <div class="col-sm-12 margin_top_detalle">
            
                <div class="text-center">
                    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Bienvenido</h1>
                    <p>Gracias por preferirnos, a continuación se muestra su perfil.</p>
                </div>
            </div>            
        </div>

        <!-- Separador -->
        <div class="separador_padre"><div></div></div>
        

        <?php if(!$listMatricula){ ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Ha ocurrido un error <a href="<?php echo base_url(); ?>cPrincipal" class="alert-link">Volver</a>
            </div>
        <?php 
            }else {
                foreach($listMatricula as $matricula):
                    echo "<br>";
                    echo "id: " . $matricula["id"];
                    echo "<br>";
                    echo "Fecha Matriculado: " . $matricula["fecha_matriculado"];
                    echo "<br>";
                    echo "Fecha Finalizado: " . $matricula["fecha_finalizado"];
                    echo "<br>";
                    echo "Detalle: " . $matricula["detalle"];
                    echo "<br>";
                    echo "Persona: " . $matricula["persona"];
                    echo "<br>";
                    echo "Curso: " . $matricula["curso"];
                    echo "<br>";
                    echo "Estado: " . $matricula["estado"];
                    echo "<br>";
                    echo "Titulo: " . $matricula["titulo"];
                    echo '<br><a href="'.base_url().'/'.$matricula["titulo"].'" download="titulo del curso '.$matricula["curso"].'">
                        Descargar Archivo
                    </a>';
                    echo "<br>________________________________________________";

        ?>
       
        <?php endforeach; ?>

            <div class="col-xs-12">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn-success btn-per-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Aceptar</button>
                    </div>
                </div>
            </div>
        
        </form>
        <?php } ?>
    </div>
</section>