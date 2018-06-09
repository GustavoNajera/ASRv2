<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container-fluid">
        <div class="row">
            <h4 class="center title_line"><span class="green-text text-darken-3"><?= $listPalabras["titulo vista"] ?></span></h4>
            <p class="center"><?= $listPalabras["desc vista"] ?> </p>
        </div>
        
        <!-- INICIAN CATEGORIAS -->
        <div class="row">

        <div class="col s12">    

        <?php
            foreach($listCursos as $cursoTem):
                $curso        = $cursoTem["curso"];
                $listCaract   = $cursoTem["listCaract"];
        ?>
        <div class="col m4 padding1">
            <div class="card elemento_activo">
                <div class="card-content">
                    <h6><b>
                        <a class="green-text text-darken-3" href="<?= base_url() ?>cCursos/detCurso?id=<?= $curso["id"] ?>">
                            <i class="material-icons">book</i><?= $curso["nombre"]?>
                        </a>
                    </b></h6>
                    <p class="text_justificar"><?= $curso["resumen"]?></p>
                </div>
                <div class="card-action">
                    <a class="orange-text text-darken-3" 
                        href="<?= base_url() ?>cCursos/detCurso?id=<?= $curso["id"] ?>">
                        <b><i class="material-icons">add_circle</i> Ver más</b>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>

        </div><!-- TERMINAN CATEGORIAS -->
    </div>
</section>