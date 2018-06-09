/**
 * Realizado por Gustavo Nájera Nájera
 * Desarrollador Full-Stack
 * 02-02-2018
 * Version v-1
 */


 /** ------------------------------------------------------
  *                     GENERICO
  --------------------------------------------------------*/
 
  /**
  * Alertfy
  */
 function reset () {
    alertify.set({
        labels : {
            ok     : "OK",
            cancel : "Cancelar"
        },
        delay : 5000,
        buttonReverse : false,
        buttonFocus   : "ok"
    });
}


/**
 * Validaciones
 */
function cambiarEstado(controlador, idTem){

    var nombre = $("#"+idTem).data("nombre");
    var estado = $("#"+idTem).data("estado");

    reset();

    alertify.confirm("¿Está seguro que desea modificar el estado de "+nombre+"?", function (e) {
        if (e) {

            if(estado == 0){
                cambioEstadoAjax(controlador, idTem, 1, function(){
                    //Se cambia el estado visualmente
                    $( "#" + idTem ).removeClass( "green" ).addClass( "red" );
                    $("#icon-" + idTem).html("delete");
                    //$( "#" + idTem + " > span" ).removeClass( "check" ).addClass( "delete" );

                    //Se modifican los datos                
                    $( "#" + idTem ).data("estado","1");
                    alertify.success("Se ha activado con éxito a " + nombre);
                });
            }
            else{
                cambioEstadoAjax(controlador, idTem, 0, function(){
                    //Se cambia el estado visualmente
                    $( "#" + idTem ).removeClass( "red" ).addClass( "green" );
                    $("#icon-" + idTem).html("check");
                    //$( "#" + idTem + " > span" ).removeClass( "delete" ).addClass( "check" );

                    //Se modifican los datos  
                    $( "#" + idTem ).data("estado","0");
                    alertify.success("Se ha desactivado con éxito a " + nombre);
                });
            }

        } else {
            alertify.error("Se ha cancelado la acción.");
        }
    });
    return false;
}


/** 
 * Consulta AJAX
 */
function cambioEstadoAjax(controlador, id, estado, callback){

    $.ajax({
        // la URL para la petición
        url : '/ASR/'+controlador+'/cambioEstado',
        async:false,
        data : { id : id, estado : estado },
        type : 'POST',
        success : function(res) {
            
            if(res){
                callback();
            }else{
                alertify.error("Ha ocurrido un error, vuelva a intentarlo1.");
            }

        },
        error : function(xhr, status) {
            alertify.error("Ha ocurrido un error, vuelva a intentarlo2.");
        }
    });
}





 /** ------------------------------------------------------
  *               FUNCIONES POR CONTROLADOR
  --------------------------------------------------------*/


//  Cambiar estado de personas
function cambiarEstadoPersona(id){
    cambiarEstado('cPersona', id);
}

//  Cambiar estado de cursos
function cambiarEstadoCurso(id){
    cambiarEstado('cCursos', id);
}