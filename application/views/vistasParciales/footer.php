
        <!-- Footer -->
        <footer class="section green darken-4 white-text center">
            <div class="footer-copyright">
            <div class="container">
                AVENTURA SEGURIDAD Y RESCATE &copy; 2018
            </div>
            </div>
        </footer>
    </body>

    
    <script src="<?php echo base_url(); ?>public/js/eskju.jquery.scrollflow.js"></script>

    <!-- SCRIPT ADMIN -->
    <script src="<?php echo base_url(); ?>public/js/script-admin.js"></script>
    <script src="<?php echo base_url(); ?>public/js/alertify.js"></script>

    <!--JavaScript at end of body for optimized loading-->
    <script src="<?php echo base_url(); ?>public/js/materialize.js"></script>

    <script>
        $( document ).ready( function( )
        {
            new ScrollFlow(); 
        } );
        
        /*********************
        *      CLIENTE
         ********************/
        // Sidenav
        const sideNav = document.querySelector('.sidenav');
        M.Sidenav.init(sideNav, {});

        // Slider
        const slider = document.querySelector('.slider');
        M.Slider.init(slider, {
            indicators: false,
            height: 500,
            transition: 500,
            interval: 6000
        });

        // Slider Comentarios
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true,
        });
        autoplay()   
        function autoplay() {
            $('.carousel.carousel-slider').carousel('next');
            setTimeout(autoplay, 4500);
        }

        // Dropdown sesion
        $(".dropdown-trigger1").dropdown();
        $(".dropdown-trigger2").dropdown();

        // Dropdown idioma
        $(".dropdown-idioma1").dropdown();
        $(".dropdown-idioma2").dropdown();
        
        // Boton para volver
        $(document).ready(function(){
            $('.fixed-action-btn').floatingActionButton();
        });
        
        // Condiciones
        var elem = document.querySelector('.collapsible.popout');
            var instance = M.Collapsible.init(elem, {
            accordion: true
        });

        // Autocomplete
        const ac = document.querySelector('.autocomplete');
        M.Autocomplete.init(ac, {
            data: {
            "Aruba": null,
            "Cancun Mexico": null,
            "Hawaii": null,
            "Florida": null,
            "California": null,
            "Jamacia": null,
            "Europe": null,
            }
        });

        // Material Boxed
        const mb = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(mb, {});

        // ScrollSpy
        const ss = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(ss, {});

        // Modal para hacer comentarios
        $(document).ready(function(){
            $('.modal').modal();
        });
                


        /*********************
        *   ADMINSITRATIVO
         ********************/
         // Matricula
        $(".dropdown-matricula1").dropdown();
        $(".dropdown-matricula2").dropdown();

        // Personas
        $(".dropdown-personas1").dropdown();
        $(".dropdown-personas2").dropdown();
        
        // Empresas
        $(".dropdown-empresa1").dropdown();
        $(".dropdown-empresa2").dropdown();

        // Cursos
        $(".dropdown-cursos1").dropdown();
        $(".dropdown-cursos2").dropdown();
        
        // Select
        $(document).ready(function(){
            $('select').formSelect();
        });
        
        // Input de tipo fecha
        $(document).ready(function(){
            $('.datepicker').datepicker({format: 'yyyy/mm/dd'
                                        ,yearRange: 50});
        });
        


        /* MENU FIJO */
        
        $(window).scroll(function (event) {
            var stickyNavTop = $('#menu_per').offset().top; // Se optiene pos top del menu
            var scrollTop = $(window).scrollTop(); // Se optiene la pos top del navegador
            
            if (scrollTop >= stickyNavTop) {
                $("#menu_per").addClass("navbar-fixed");
                $("#menu_per").addClass("pos_menu_per");
            } else {
                $("#menu_per").removeAttr( "class" );
            }
        });
                                
    </script>   

</html>
