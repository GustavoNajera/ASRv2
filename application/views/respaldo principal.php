    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                
                <?php
                    $max = count($listImgCarousel);
                    $active = "active";
                    for($cont = 0; $cont < $max; $cont++){
                        if($cont != 0){
                            $active = "";
                        }
                        $item = $listImgCarousel[$cont];
                ?>

                <div class="item <?= $active ?>">
                    <img class="img-responsive" src="<?php echo base_url() . $item["ruta"] ?>" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong><?= $item["titulo"]?></strong></span>
                            </h1>
                            <p class="animated2"><?= $item["desc"]?></p>
                        </div>
                    </div>
                </div>        

                <?php } ?>
                
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->
    
    <!-- Start Involucrados Section -->
    <section id="about-us" class="about-us-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3><?= $listPalabras["titulo involucrados"] ?></h3>
                            <p><?= $listPalabras["desc involucrados"] ?></p>
                        </div>
                </div>
            </div>
            <div class="row">
                
            <?php foreach($listInvolucrados as $item): ?>
                <div class="col-xs-7 col-sm-5 col-md-4">
                    <div class="welcome-section text-center">
                        <div class="contenedor-detalle" style="padding:15px;"> 
                            <img src="<?php echo base_url() . $item["img"] ?>" class="img-responsive" alt="..">
                        </div>
                        <h4><?= $item["nombre"] . " " . $item["primer_apellido"] ?></h4>
                        <div class="border"></div>
                    </div>
                </div>
            <?php endforeach; ?>
                
            </div>     
            
        </div><!-- /.container -->
    </section>
    <!-- End About Us Section -->
    
    <!-- Start CURSOS Section -->
    <section id="latest-news" class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3><?= $listPalabras["titulo cursos"] ?></h3>
                        <p><?= $listPalabras["desc cursos"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-news">

                    <?php foreach($listCategoria as $item): ?>
                        <div class="col-md-12">
                            <div class="latest-post">
                                <div class="contenedor-detalle" style="margin:0px;">
                                    <img src="<?php echo base_url() . $item["categoria"]["img"] ?>" class="img-responsive img_y" alt="">
                                </div>
                                <h4><a href="#"> <?= $item["categoria"]["nombre"]?> </a></h4>
                                <?php 
                                    $result = "";
                                    foreach($item["listCaract"] as $caract):
                                        if($result != ""){
                                            $result = $result . "<br>";
                                        }
                                        $result = $result . "* " . $caract["nombre"];
                                    endforeach; 
                                ?>

                                <p><?= $result; ?></p>
                                <a href="<?= base_url();?>cCursos/detalle" class="btn btn-primary"><?= $listPalabras["btn lista de cursos"] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest News Section -->
    
    
    
    <!-- Start Testimonial Section -->
    <div id="testimonial" class="testimonial-section">
        <div class="container">
            <!-- Start Testimonials Carousel -->

            <div id="testimonial-carousel" class="testimonials-carousel">
                
                <?php foreach ($listComentario as $comentario): ?>
                    <!-- Testimonial 1 -->
                    <div class="testimonials item">
                        <div class="testimonial-content">
                            <img src="<?php echo base_url() . $comentario["img"] ?>" alt="<?= $comentario["nombre"]; ?>" >
                                
                            <div class="testimonial-author">
                                <div class="author"><?= $comentario["nombre"] . " " . $comentario["primer_apellido"]?></div>
                            </div>
                            <p style="max-witch: 80%"><?= $comentario["comentario"] ?></p>
                        </div>

                        <?php if ($this->session->userdata('id') != null ){ ?>
                            <a class="float-ri-per btn-comentar" data-toggle="modal" data-target="#myModal" style="color:#bbb;"
                                href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?= $listPalabras["btn comentar"] ?></a>
                        <?php } ?>
                    </div>
                    
                <?php endforeach; ?>
               
            </div>
            <!-- End Testimonials Carousel -->
        </div>
    </div>
    <!-- End Testimonial Section -->
    
    

    <!-- Clients Aside -->
    <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3><?= $listPalabras["titulo clientes"] ?></h3>
                        <p><?= $listPalabras["desc clientes"] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients">
                    
                    <?php foreach($listEmpresaAsociada as $empresaAsc): ?>
                        <div class="col-md-12">
                            <a href="<?= $empresaAsc["enlace"] ?>" target="_blank">
                                <img src="<?php echo base_url() . $empresaAsc["img"] ?>" class="img-responsive" alt="<?= $empresaAsc["nombre"]?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
            </dAsciv>
        </div>
    </section>

    <!-- Start Fun Facts Section -->
    <section id="sobreNosotros" class="contact">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3><?= $listPalabras["titulo sobre nosotros"] ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4><?= $listPalabras["contactenos de seccion sobre nosotros"]; ?></h4>
                        <ul>
                            <li><strong><?= $listPalabras["correo de seccion sobre nosotros"]; ?>: </strong> <?= $empresaASR->correo; ?> </li>
                            <li><strong><?= $listPalabras["telefono"]; ?>: </strong> <?= $empresaASR->numero; ?> </li>
                            <li><strong>Web: </strong> <a class="text-success" target="_blank" href="<?= base_url(); ?>" ><b><?= base_url(); ?></b></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4><?= $listPalabras["horario de seccion sobre nosotros"]; ?></h4>
                        <?= $empresaASR->horario_atencion; ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4><?= $listPalabras["mision de seccion sobre nosotros"]; ?></h4>
                        <p><?= $empresaASR->mision; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center">
                <div id="success"></div>
                <a href="<?=base_url()?>cSobreNosotros" class="btn btn-primary"><?= $listPalabras["btn sobre nosotros"] ?></a>
            </div>

        </div>
    </section>

    <section  id="sobreNosotros">
        
        <!--
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3><?= $listPalabras["titulo correo"] ?></h3>
                        <p></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary"><?= $listPalabras["btn correo"] ?></button>
                            </div>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
        -->

        <!---------------->
        <!--    Modal   -->
        <!---------------->
        
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><b><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ingresar un comentario</b></h5>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?= base_url() ?>cPrincipal/insertarComentarioAccion" method="post"> 
                                <textarea name="comentario" class="form-control col-xs-12" style="height: 150px;" placeholder="Comentario"></textarea>
                                <button type="submit" class="btn btn-success">Aceptar</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>