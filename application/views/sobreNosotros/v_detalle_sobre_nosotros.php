<section>
    <div class="container">    

        <div class="col s12 m7">
            <h4 class="header"><?= $listPalabras["mision"]; ?></h4>
            <div class="card horizontal">
                <div class="card-image hide-on-small-only">
                    <img src="<?= base_url() ?>public/images/imgPage/fondos/cr1.jpg">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <p> <?= $empresaASR->mision ?> </p>
                    </div>
                </div>
            </div>

            <h4 class="header"><?= $listPalabras["vision"]; ?></h4>
            <div class="card horizontal">
                <div class="card-image hide-on-small-only">
                    <img src="<?= base_url() ?>public/images/imgPage/fondos/cr5.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <p> <?= $empresaASR->vision ?> </p>
                    </div>
                </div>
            </div>

            <h4 class="header"><?= $listPalabras["historia"]; ?></h4>
            <div class="card horizontal">
                <div class="card-image hide-on-small-only">
                    <img src="<?= base_url() ?>public/images/imgPage/fondos/cr3.jpg">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <p> <?= $empresaASR->historia ?> </p>
                    </div>
                </div>
            </div>

             <h4 class="header"><?= $listPalabras["experiencia"]; ?></h4>
            <div class="card horizontal">
                <div class="card-image hide-on-small-only">
                    <img src="<?= base_url() ?>public/images/imgPage/fondos/cr2.jpg">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <p> <?= $empresaASR->experiencia ?> </p>
                    </div>
                </div>
            </div>

             <h4 class="header"><?= $listPalabras["contactenos"]; ?></h4>
            <div class="card horizontal">
                <div class="card-image" width="100">
                    <img src="<?= base_url() ?>public/images/imgPage/fondos/crcontactenos.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        
                        <ul class="collection with-header">
                            <li class="collection-item"><?= $empresaASR->correo; ?> </li>
                            <li class="collection-item"><?= $empresaASR->numero; ?></li>
                            <li class="collection-item"><?= $empresaASR->horario_atencion; ?></li>
                        </ul>
                    
                    </div>
                </div>
            </div>

            
        </div>    
    </div>
</section>
<!-- End Fun Facts Section -->