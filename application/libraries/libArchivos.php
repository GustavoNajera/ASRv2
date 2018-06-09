<?php
/**
 * Clase destinada al manejo de archivos
 */
class libArchivos{

    //Para utilizar la instancia del controlador y no tener que reccibirla
    //$CI =& get_instance();
    //$CI->load->model('VehiculoModel');

    //Valores globales
    private $param = array(
                "rutas" => array(
                        "logo"               => "./public/images/imgEmpresa/logos/"
                        ,"categorias"        => "./public/images/imgCategorias/"
                        ,"user"              => "./public/images/imgUser/"
                        ,"empresaAsociada"   => "./public/images/imgEmpresaAsociada/"
                        ,"titulos"           => "./public/archivos/titulos/"
                        ,"carousel"          => "./public/images/imgCarousel/"
                )
                ,"formatos" => array(
                        "img"     => "gif|jpg|jpeg|png"
                        ,"texto"  => "pdf|txt|docx"
                )
            );

    private $CI       = null; // Instancia para acceder a librerias del framework
    private $rutaTem  = null; // Guarda la ruta temporal
    function __construct(){
        $this->CI =& get_instance();
    }
    
    /*---------------------------------------------------------
     * Inicializa la configuacion con los datos deseados
     --------------------------------------------------------*/
    private function inicializa($ruta,$tipoArchivo){
        $this->rutaTem = $this->param["rutas"][$ruta];
        $config['upload_path']      = $this->rutaTem;
		$config['allowed_types']    = $this->param["formatos"][$tipoArchivo];
        $config["overwrite"]        = FALSE; // Sobreescribir
        $this->CI->load->library('upload', $config);
    }

    /*-------------------------------------------------------------
    * Realiza las validaciones y carga el archivo o lo actualiza
    * (elimina el anterior y agrega el nuevo)
    -------------------------------------------------------------*/
    public function carga_archivo($elemento, $nombreArchivo){        
        if (!$_FILES[$nombreArchivo]['error']){
			if(!$this->CI->upload->do_upload($nombreArchivo)){
                $data["msgError"]   = "Ha ocurrido un error." . $this->CI->upload->display_errors();
                $data["result"]     = false;
			}else{
                if ($elemento != null){
                    @unlink($elemento);
                }
				$datos              = $this->CI->upload->data();
                $data["nuevaRuta"]  = $this->rutaTem . $datos["file_name"];
                $data["result"]     = true;
			}
        }else{
            $data["result"] = false;
            $data["msgError"]   = "Es obligatorio el archivo a subir";
        }
        return $data;
    }

    /*---------------------------------------------------------
    * Elimina el archivo
    --------------------------------------------------------*/
    public function elimina_archivo($elemento){
        if($elemento != null){
            @unlink($elemento);
            return true;
        }
        return false;
    }

    
    /*********************************************************
    - Inicializa de acuerdo a cada seccion del sistema
    *********************************************************/

    //Inicializa configuracion para imagenes
    public function configLogo(){
        return $this->inicializa("logo","img");
    }
    
    //Inicializa configuracion para imagenes
    public function configImgPersona(){
        return $this->inicializa("user","img");
    }

    //Inicializa configuracion para empresas asociadas
    public function configImgEmpresaAsociada(){
        return $this->inicializa("empresaAsociada","img");
    }

    //Inicializa configuracion para Categorias
    public function configCategorias(){
        $this->inicializa("categorias","img");
    }

    //Inicializa configuracion para Titulos
    public function configTitulos(){
        return $this->inicializa("titulos","texto");
    }

    //Inicializa configuracion para las imagenes del carousel
    public function configImgCarousel(){
        return $this->inicializa("carousel", "img");
    }
}
?>