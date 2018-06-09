  <!-- Navbar -->
  <div id="menu_per">

    <nav class="teal">
      <div class="container-fluid">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-nav" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                
                <!-- MATRICULA -->
                <ul id="dropdown-matricula1" class="dropdown-content">
                    <li>
                        <a href="<?php echo base_url(); ?>cExpedienteGeneral">Matrícula</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cEstadoMatricula">Estado de matrícula</a>
                    </li>
                </ul>
                <li>
                    <a class="dropdown-matricula1" href="#!" data-target="dropdown-matricula1">Matrícula
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <!-- Fin Matricula -->
                <li>
                    <a href="<?php echo base_url(); ?>cExpedienteRetiroTitulo">Retiro de Titulos</a>
                </li>

                <!-- Personas -->
                <ul id="dropdown-personas1" class="dropdown-content">
                    <li>
                        <a href="<?php echo base_url(); ?>cPersona">Lista de Personas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cRol">Roles</a>
                    </li>
                </ul>
                <li>
                    <a class="dropdown-personas1" href="#!" data-target="dropdown-personas1">Personas
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <!-- Fin Personas -->
                
            
                <!-- Empresas -->
                <ul id="dropdown-empresa1" class="dropdown-content">
                    <li>
                        <a href="<?php echo base_url(); ?>cEmpresa">Mi Empresa</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cEmpresaAsociada">Empresas Asociadas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cInfo_general/adminInfoGeneral">Condiciones</a>
                    </li>
                </ul>
                <li>
                    <a class="dropdown-empresa1" href="#!" data-target="dropdown-empresa1">Empresas
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <!-- Fin Empresas -->

                <!-- Cursos -->
                <ul id="dropdown-cursos1" class="dropdown-content">
                    <li>
                        <a href="<?php echo base_url(); ?>cCursos">Lista de Cursos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>CCaractCurso">Características de Cursos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cCategorias">Categorías</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cCaractCategoria">Características de Categoría</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cNivel">Niveles</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>CPais">Países</a>
                    </li>
                </ul>
                <li>
                    <a class="dropdown-cursos1" href="#!" data-target="dropdown-cursos1">Cursos
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <!-- Fin Cursos -->

                <li>
                    <a href="<?php echo base_url(); ?>ImgCarousel">Carousel</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cPalabras">Textos</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>cLogin/logout"> Cerrar sesión</a>
                </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <ul class="sidenav" id="mobile-nav">
    <!-- MATRICULA -->
    <ul id="dropdown-matricula2" class="dropdown-content">
        <li>
            <a href="<?php echo base_url(); ?>cExpedienteGeneral">Matrícula</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cEstadoMatricula">Estado de matrícula</a>
        </li>
    </ul>
    <li>
        <a class="dropdown-matricula2" href="#!" data-target="dropdown-matricula2">Matrícula
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <!-- Fin Matricula -->
    <li>
        <a href="<?php echo base_url(); ?>cExpedienteRetiroTitulo">Retiro de Titulos</a>
    </li>

    <!-- Personas -->
    <ul id="dropdown-personas2" class="dropdown-content">
        <li>
            <a href="<?php echo base_url(); ?>cPersona">Lista de Personas</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cRol">Roles</a>
        </li>
    </ul>
    <li>
        <a class="dropdown-personas2" href="#!" data-target="dropdown-personas2">Personas
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <!-- Fin Personas -->

    <!-- Empresas -->
    <ul id="dropdown-empresa2" class="dropdown-content">
        <li>
            <a href="<?php echo base_url(); ?>cEmpresa">Mi Empresa</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cEmpresaAsociada">Empresas Asociadas</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cInfo_general/adminInfoGeneral">Condiciones</a>
        </li>
    </ul>
    <li>
        <a class="dropdown-empresa2" href="#!" data-target="dropdown-empresa2">Empresas
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <!-- Fin Empresas -->

    <!-- Cursos -->
    <ul id="dropdown-cursos2" class="dropdown-content">
        <li>
            <a href="<?php echo base_url(); ?>cCursos">Lista de Cursos</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>CCaractCurso">Características de Cursos</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cCategorias">Categorías</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cCaractCategoria">Características de Categoría</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>cNivel">Niveles</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>CPais">Países</a>
        </li>
    </ul>
    <li>
        <a class="dropdown-cursos2" href="#!" data-target="dropdown-cursos2">Cursos
            <i class="material-icons right">arrow_drop_down</i>
        </a>
    </li>
    <!-- Fin Cursos -->
    
    <li>
        <a href="<?php echo base_url(); ?>ImgCarousel">Carousel</a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>cPalabras">Textos</a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>cLogin/logout"> Cerrar sesión</a>
    </li>

  </ul>
        