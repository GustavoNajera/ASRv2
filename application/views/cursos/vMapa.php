
<section  id="sobreNosotros"  class="about-us-section-1">
    <!-- MAPA -->
    <div class="container">
        
        <div class='section-title text-center'>
            <h3><?= $listPalabras["titulo vista"] ?></h3>
            <p><?= $listPalabras["desc vista"] ?></p>
        </div>

        <div class='sidebar col-md-4' style="border-bottom: 2px solid green; border-right: 2px solid green; margin-bottom:25px;">
            <div id='listings' class='listings'></div>
        </div>

        <div class="col-sm-8">
            <div id='map' class='map'></div>
        </div>
    </div>
</section>


<script>
    var stores = {
        "type": "FeatureCollection",
        "features": [
    
    <?php
        foreach($listCursos as $curso):
    ?>

            {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [
                        <?= $curso["longitud"]; ?>,
                        <?= $curso["latitud"]; ?>
                    ]
                },
                "properties": {
                    "id" : "<?= $curso["id"]; ?>",
                    "nombre":"<?= $curso["nombre"]; ?>",
                    "categoria": "<?= $curso["categoria"]; ?>",
                    "nivel": "<?= $curso["nivel"]?>",
                    "pais": "<?= $curso["pais"]?>"
                }
            },
        <?php endforeach; ?>
        ]
    };

</script>

<!-- MAPA -->
<script src="<?php echo base_url(); ?>public/js/mapa.js"></script>