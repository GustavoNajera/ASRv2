<?php
    $curso        = $cursoTem["curso"];
    $listCaract   = $cursoTem["listCaract"];
?>

<section>
    <div class="container">
        <div class="row">
            <h4 class="center title_line"><span class="green-text text-darken-3"><?= $listPalabras["titulo vista"] ?></span></h4>
            <p class="center"><?= $listPalabras["desc vista"] ?> </p>
        </div>
        
        <!-- INICIAN CATEGORIAS -->
        <div class="row">
            <div class="col s12">
                <div class="col s12">
                    <a href="<?= base_url();?>cCursos/detalle" class="btn green darken-1"><?= $listPalabras["btn listado"] ?></a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col m4">
                <img class="col s5 m8 l10" src="<?= base_url();?><?= $curso["img"]?>">
                <div class="col s7 m12">
                    <p><b><?= $listPalabras["categoria"] ?>:   </b><?= $curso["categoria"]?></p>
                    <p><b><?= $listPalabras["nivel"] ?>:       </b><?= $curso["nivel"]?></p>
                    <p><b><?= $listPalabras["pais"] ?>:        </b><?= $curso["pais"]?></p>
                    <p><b><?= $listPalabras["instructor"] ?>:  </b><?= $curso["instructor"]?> </p>
                </div>
            </div>

            <div class="col m8">
                <h5 class="green-text"><strong><?= $curso["nombre"]?></strong></h5>
                <h6><strong><?= $listPalabras["prerrequisitos"] ?>:</strong></h6>
                <p class="text_justificar marg_1"><?= $curso["pre_requisitos"]?></p>

                <h6><strong><?= $listPalabras["descripcion"] ?>:</strong></h6>
                <p class="text_justificar marg_1"><?= $curso["descripcion"]?></p>  

                <?php foreach($listCaract as $caract): ?>
                    <h5><strong><?= $caract["nombre"] ?>:</strong></h5>
                    <p class="text_justificar marg_1"><?= $caract["descri"]?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>