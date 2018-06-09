<!--<h1>Bienvenido <?php echo $this->session->userdata["nombre"] . " " . $this->session->userdata["primer_apellido"]; ?></h1>-->

<!-- SECCION PARA DETALLE DE CURSOS -->
<section>
    <div class="container">
        
        <div class="row">
            
            <div class="col s12 margin_top_detalle">
            
                <div>
                    <h1>Insertar Curso</h1>
                    <p>A continuación se muestran los datos necesarios, asegurese de no dejar ningún campo vacío.</p>
                </div>

                <a class="btn" href="<?php echo base_url(); ?>cCursos">Listado de Cursos</a>
            </div>            
        </div>

        <!-- Validaciones -->
        <?php include_once('application/views/vistasParciales/validaciones.php');?>

        <!-- Separador -->
        <div class="col s12 green separador_padre"><div></div></div>        
        <form action="<?php echo base_url(); ?>/cCursos/insertarCursoAccion" method="post">
            <div class="row">
                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_es" id="nombre_es" required>
                    <label for="nombre_es">Nombre Español</label>
                </div>

                <div class="input-field col m6">
                    <input type="text" class="validate" name="nombre_in" id="nombre_in" required>
                    <label for="nombre_in">Nombre Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_es" id="descripcion_es" required></textarea>
                    <label for="descripcion_es">Descripción Español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="descripcion_in" id="descripcion_in" required></textarea>
                    <label for="descripcion_in">Descripción Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m3">
                    <select id="activo" name="activo">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                    <label for="activo">Estado</label>
                </div>

                <div class="input-field col m4">
                    <select id="categoria" name="categoria">
                        <?php foreach($listCategoria as $categoria):?>
                            <option value="<?= $categoria["id"]; ?>"> <?=$categoria["nombre_es"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="categoria">Categoría</label>
                </div>

                <div class="input-field col m5">
                    <select id="instructor" name="instructor">
                        <?php foreach($listInstructores as $instructor): ?>
                            <option value="<?= $instructor["id_persona"]; ?>"><?=$instructor["nombre"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="instructor">Instructor</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="resumen_es" id="resumen_es" required></textarea>
                    <label for="resumen_es">Resumen Español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="resumen_in" id="resumen_in" required></textarea>
                    <label for="resumen_in">Resumen Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="pre_requisitos_es" id="pre_requisitos_es" required></textarea>
                    <label for="pre_requisitos_es">Prerequisitos español</label>
                </div>

                <div class="input-field col m6">
                    <textarea class="materialize-textarea" name="pre_requisitos_in" id="pre_requisitos_in" required></textarea>
                    <label for="pre_requisitos_in">Prerequisitos Inglés</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col m4">
                    <select id="nivel" name="nivel">
                        <?php foreach($listNivel as $nivel): ?>
                            <option value="<?= $nivel["id"]; ?>"><?=$nivel["nombre_es"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="nivel">Nivel</label>
                </div>

                <div class="input-field col m5">
                    <select id="pais" name="pais">
                        <?php foreach($listPais as $pais): ?>
                            <option value="<?= $pais["id"]; ?>"><?=$pais["nombre"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="pais">País</label>
                </div>
            </div>

            <div class="row">
                <div class="col m4 z-depth-3">
                    <div class="input-field col s12">
                        <input type="text" class="validate" name="longitud" id="longitud" value="0" required>
                        <label for="longitud">Longitud</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" class="validate" name="latitud" id="latitud" value="0" required>
                        <label for="latitud">Latitud</label>
                    </div>

                    <div class="input-field col s12">
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </div>
                <div class="col m8">
                    <div id='map' class='map z-depth-3'></div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    var longitud   = document.getElementById("longitud").value;
    var latitud    = document.getElementById("latitud").value;

    if (longitud == null || longitud == 0){
        longitud  = "-88.1033434352559";
    }
    if (latitud == null || latitud == 0){
        latitud   = "11.936707483201374";
    }

    mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VzdGF2b25hamVyYSIsImEiOiJjamJ2MWkycmoxcHFhMzNyNjhxdnhwZndnIn0.e4g69pPiOs1XcIgtGxVvtw';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [longitud, latitud],
        zoom: 4.5
    });

    // Add geolocate control to the map.
    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));


    /**
     * Toma los valores de donde dio click y los asigna en los label
     */
    map.on('click', function (e) {
        //alert("Puntos: LONGITUD: " + e.lngLat.lng + " LATITUD: " + e.lngLat.lat);
        document.getElementById("longitud").value  = e.lngLat.lng;
        document.getElementById("latitud").value   = e.lngLat.lat;
    });

</script>
