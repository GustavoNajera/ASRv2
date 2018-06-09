<div class="container-fluid">
    <div class="row">
        <div class="">
            <img class="left" src="<?php echo base_url() . $empresaASR->logo ?>"  width="130" >
              <div class="left text_title">
                <h5 class="green-text text-darken-3"><b><?= $empresaASR->nombre ?></b></h5>
                <h6 class="grey-text text-darken-2"><i class="material-icons">call</i> <?= $empresaASR->numero ?></h6>
                <h6 class="grey-text text-darken-2"><i class="material-icons">email</i> <?= $empresaASR->correo ?></h6>
              </div>
        </div>
    </div>
</div>

  <!-- Navbar -->
  <div id="menu_per">

    <nav class="degradado">
      <div class="container-fluid">
        <div class="nav-wrapper">
          <a href="#" data-target="mobile-nav" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a href="#home"><?= $listPalabras["menu home"] ?></a>
            </li>
            <li>
              <a href="#search"><?= $listPalabras["menu search"] ?></a>
            </li>
            <li>
              <a href="#cursos"><?= $listPalabras["menu cursos"] ?></a>
            </li>
            <li>
              <a href="#gallery"><?= $listPalabras["menu galeria"] ?></a>
            </li>
            <li>
              <a href="#mapa"><?= $listPalabras["submenu mapa"] ?></a>
            </li>
            <li>
              <a href="#contact"><?= $listPalabras["menu contact"] ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>cSobreNosotros"><?= $listPalabras["menu sobre nosotros"] ?></a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>cInfo_general/detalleClient"><?= $listPalabras["menu condiciones"] ?></a>
            </li>

            

            <!-- SESION -->
            <ul id="dropdown1" class="dropdown-content">
                <li>
                    <a href="<?php echo base_url(); ?>cPersona/miPerfil"><?= $listPalabras["submenu mi perfil"] ?></a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cLogin/logout"><?= $listPalabras["submenu cerrar sesion"] ?></a>
                </li>    
            </ul>

            <?php
                $rol = $this->session->userdata('rol');
                if($rol != null){
            ?>
                <li>
                    <a class="dropdown-trigger1" href="#!" data-target="dropdown1"><?= $listPalabras["menu sesion"] ?>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>        
            <?php }else{ ?>
                    <li>
                        <a href="<?php echo base_url(); ?>cLogin"><?= $listPalabras["menu sesion"] ?></a>
                    </li>
            <?php } ?>
            <!-- Fin de sesion -->

            <!-- IDIOMA -->
            <?php
                $idioma = $this->session->userdata('idioma');
                if($idioma == "IN"){
                    $img = "in.jpg";
                }
                if($idioma == null || $idioma == "ES"){
                    $img = "es.jpeg";
                }
            ?>
            <ul id="dropdown-idioma1" class="dropdown-content">
                <li>
                    <a onclick="cambiaIdioma('ES')">
                        <img class="img-idioma" src="<?= base_url() ?>public/images/imgEmpresa/logos/es.jpeg">
                    </a>
                </li>
                <li>
                    <a onclick="cambiaIdioma('IN')">
                        <img class="img-idioma" src="<?= base_url() ?>public/images/imgEmpresa/logos/in.jpg">
                    </a>
                </li>
            </ul>
            <li>
                <a class="dropdown-idioma1" href="#!" data-target="dropdown-idioma1">
                    <img class="img-idioma" src="<?= base_url() ?>public/images/imgEmpresa/logos/<?= $img ?>">
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <!-- FIN DE IDIOMA -->
            




          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-nav">
    <li>
      <a href="#home"><?= $listPalabras["menu home"] ?></a>
    </li>
    <li>
      <a href="#search"><?= $listPalabras["menu search"] ?></a>
    </li>
    <li>
      <a href="#cursos"><?= $listPalabras["menu cursos"] ?></a>
    </li>
    <li>
      <a href="#gallery"><?= $listPalabras["menu galeria"] ?></a>
    </li>
    <li>
      <a href="#mapa"><?= $listPalabras["submenu mapa"] ?></a>
    </li>
    <li>
      <a href="#contact"><?= $listPalabras["menu contact"] ?></a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>cSobreNosotros"><?= $listPalabras["menu sobre nosotros"] ?></a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>cInfo_general/detalleClient"><?= $listPalabras["menu condiciones"] ?></a>
    </li>





    <!-- SESION -->
    <ul id="dropdown2" class="dropdown-content">
        <li>
            <a href="<?php echo base_url(); ?>cPersona/miPerfil"><?= $listPalabras["submenu mi perfil"] ?></a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cLogin/logout"><?= $listPalabras["submenu cerrar sesion"] ?></a>
        </li>    
    </ul>
    <?php
        $rol = $this->session->userdata('rol');
        if($rol != null){
    ?>
        <li>
            <a class="dropdown-trigger2" href="#!" data-target="dropdown2"><?= $listPalabras["menu sesion"] ?>
                <i class="material-icons right">arrow_drop_down</i>
            </a>
        </li>   
    <?php }else{ ?>
            <li>
                <a href="<?php echo base_url(); ?>cLogin"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?= $listPalabras["menu sesion"] ?></a>
            </li>
    <?php } ?>
    <!-- FIN SESION-->

    <!-- IDIOMA -->
    <?php
        $idioma = $this->session->userdata('idioma');
        if($idioma == "IN"){
            $idioma = "EN";
        }
        if($idioma == null){
            $idioma = "ES";
        }
    ?>
    <ul id="dropdown-idioma2" class="dropdown-content">
        <li>
            <a onclick="cambiaIdioma('ES')"><?= $listPalabras["submenu idioma es"] ?></a>
        </li>
        <li>
            <a onclick="cambiaIdioma('IN')"><?= $listPalabras["submenu idioma in"] ?></a>
        </li>
        
    </ul>
    <li>
        <a class="dropdown-idioma2" href="#!" data-target="dropdown-idioma2"><?= $idioma; ?>
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <!-- FIN DE IDIOMA -->

    
  </ul>

<script>
    function cambiaIdioma(idioma){
        $.ajax({
            url : '/ASR/cLogin/cambiaIdioma',
            async:false,
            data : { idioma : idioma },
            type : 'POST',
            success : function(res) {
                if(res == true){
                    location.reload(true);
                }
            }
        });
    }
</script>