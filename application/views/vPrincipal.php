
  
  <!-- Section: Slider -->
  <section class="slider">
    <ul class="slides">

     <?php foreach($listImgCarousel as $item): ?>
      
      <li>
        <img src="<?php echo base_url() . $item["ruta"] ?>">
        <!-- random image -->
        <div class="caption center-align font_title1">
          <h2><?= $item["titulo"]?></h2>
          <h5 class="light grey-text text-lighten-3"><?= $item["desc"]?></h5>
        </div>
      </li>
     
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- Section: Search -->
  <section id="search" class="section section-search grey darken-4 white-text center scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 scrollflow -slide-right">
          <h3>Search Destinations</h3>
          <div class="input-field">
            <input type="text" class="white grey-text autocomplete" id="autocomplete-input" placeholder="Aruba, Cancun, etc...">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Icon Boxes -->
  <section class="section section-icons grey lighten-4 center">
    <div class="container">
      <div class="row scrollflow -slide-left -opacity">
        <div class="col s12 m4">
          <div class="card-panel alto1">
            <i class="material-icons large green-text">room</i>
            <h4>Multipais</h4>
            <p>Contamos con experiencia en multiples paises, donde capacitamos con los mayores estandares.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel alto1">
            <i class="material-icons large green-text">store</i>
            <h4>Tienda</h4>
            <p>Proximamente dispondremos de tienda en línea para que pueda adquirir los productos de alta calidad.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card-panel alto1">
            <i class="material-icons large green-text">backup</i>
            <h4>Mi perfil en línea</h4>
            <p>Acceda a su historial de cursos, proximas aperturas de matricula, descarga de sus títulos y más, al alcance de un click.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Cursos -->
  <section id="cursos" class="section section-cursos scrollspy scrollflow -pop -opacity">
    <div class="container-fluid">
      <div class="row">
        <h4 class="center title_line">
          <span class="green-text text-darken-3"><?= $listPalabras["titulo cursos"] ?></span>
        </h4>
      </div>
      <div class="row">
        <?php foreach($listCategoria as $item): ?>
        <div class="col s12 m3 l2">
          <div class="card elemento_activo">
            <div class="card-image">
              <a title="Ver más" href="<?= base_url();?>cCursos/detalle" class="waves-effect green-text text-darken-3">
                <img class="img_categorias" src="<?php echo base_url() . $item["categoria"]["img"] ?>" alt="">
              </a>
            </div>
            <div class="card-content center-align">
              <a title="Ver más" href="<?= base_url();?>cCursos/detalle" class="waves-effect green-text text-darken-4">
                <h6><b><?= $item["categoria"]["nombre"]?></b></h6>
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Section: Follow -->
  <section class="section section-follow grey darken-4 white-text center">
    <div class="container">
      <div class="row scrollflow -slide-right -opacity">
        <div class="col s12">
          <h4><?= $listPalabras["titulo clientes"] ?></h4>
          <p><?= $listPalabras["desc clientes"] ?></p>
          <?php foreach($listEmpresaAsociada as $empresaAsc): ?>
              <a class="center" href="<?= $empresaAsc["enlace"] ?>" target="_blank">
                  <img width="150" src="<?php echo base_url() . $empresaAsc["img"] ?>" alt="<?= $empresaAsc["nombre"]?>">
              </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Gallery -->
  <section id="gallery" class="section section-gallery scrollspy">
    <div class="container scrollflow -pop -opacity">
      <h4 class="center">
        <span class="green-text text-darken-2">Photo</span> Gallery
      </h4>
      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?travel" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?nature" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach, travel" alt="" class="materialboxed responsive-img">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?water" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?building" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?trees" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?cruise" alt="" class="materialboxed responsive-img">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beaches" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?traveling" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?bridge" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s12 m3">
          <img src="https://source.unsplash.com/1600x900/?beach, travel,boat" alt="" class="materialboxed responsive-img">
        </div>
      </div>
    </div>
  </section>

<!-- Section: Mapa -->
<section  id="mapa"  class="section section-mapa scrollspy">
    <!-- MAPA -->
    <div class="container scrollflow -slide-bottom -opacity">
      <div class="row">
      <h4 class="center green-text text-darken-3">
        <i class="material-icons">location_on</i> <?= $listPalabras["titulo mapa"] ?></h4>
        <div class='sidebar col s12 m4' style="border-bottom: 2px solid green; border-right: 2px solid green; margin-bottom:25px;">
            <div class="scrollflow -slide-left -opacity">
              <div id='listings' class='listings'></div>
            </div>
        </div>

        <div class="col s12 m8 z-depth-3">
          <div class="scrollflow -slide-right -opacity">
            <div id='map' class='map'></div>
          </div>
        </div>
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

  <!-- Section: Contact -->
  <section id="contact" class="section section-contact scrollspy">
    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <div class="scrollflow -slide-bottom -opacity">
            <div class="card-panel green darken-3 white-text center">
              <i class="material-icons">email</i>
              <h5><?= $listPalabras["contactenos de seccion sobre nosotros"]; ?></h5>
              <p><?= $listPalabras["descripcion de seccion sobre nosotros"]; ?></p>
            </div>
            <ul class="collection with-header">
              <li class="collection-item"><?= $empresaASR->correo; ?> </li>
              <li class="collection-item"><?= $empresaASR->numero; ?></li>
            </ul>
          </div>
        </div>
        <div class="col s12 m6 z-depth-2">
          <!-- Carousel -->
          <div class="scrollflow -slide-top -opacity">
            <div class="carousel carousel-slider">            

              <?php if($this->session->userdata('id') != null){ ?>
                <div class="carousel-fixed-item center">
                  <a class="light-green darken-4 waves-effect waves-light btn modal-trigger" href="#modal1">
                    <i class="material-icons">comment</i> Comentar
                  </a>
                </div>
              <?php } ?>
              
              <?php foreach ($listComentario as $comentario): ?>
                <div class="carousel-item " href="#one!">
                  <h2>
                      <i class="material-icons">person</i> 
                      <?= $comentario["nombre"] . " " . $comentario["primer_apellido"]?>
                  </h2>
                  <div class="divider"></div>
                  <p><?= $comentario["comentario"] ?></p>
                </div>
              <?php endforeach; ?>

            </div>
          </div>          
      </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <form action="<?= base_url() ?>/cPrincipal/insertarComentarioAccion" method="post">
        <div class="modal-content">
          <h5 class="green-text">Ingresar comentario</h5>
          <div class="separador"></div>
          <div class="input-field">
              <textarea class="materialize-textarea" name="comentario" id="comentario" required></textarea>   
              <label for="comentario">Mi comentario</label>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
          <button type="submit" class="orange modal-close waves-effect waves-green btn-flat">Comentar</button>
        </div>
      </form>
    </div>
    
  </section>

<!-- MAPA -->
<script src="<?php echo base_url(); ?>public/js/mapa.js"></script>