<?php
/**
 * Controlador para las imagenes que se mostraran en el carousel
 */
class ImgCarousel extends CI_Controller
{

    function __construct(){
        parent::__construct();

        // Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);
    }

    /******************************************************
    - Valida el formulario
    ******************************************************/
    private function validaForm(){
		$this->form_validation->set_rules('titulo_es',  'Título Español',      'required');
        $this->form_validation->set_rules('titulo_in',  'Título Inglés',       'required');
        $this->form_validation->set_rules('desc_es',    'Descripción Español', 'required');
        $this->form_validation->set_rules('desc_in',    'Descripción Inglés',  'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    // Listado de imagenes en el lado administrativo
    public function index(){
        $data["listImg"] = $this->mImgCarousel->listImgAdm();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("imgCarousel/v_adm", $data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Inserta una imagen
    public function insertaImgAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){

            $param["img"] = $this->input->post('img');
            $this->libArchivos->configImgCarousel();
            $result = $this->libArchivos->carga_archivo(null, "img");
            
            if($result["result"]){
                $param["img"]    = $result["nuevaRuta"];
                $data['result']  = SUCCESS;
            }else{
                $data["result"]  = $result["msgError"];
            }

            $param["desc_es"]     = $this->input->post('desc_es');
            $param["desc_in"]     = $this->input->post('desc_in');
            $param["titulo_es"]   = $this->input->post('titulo_es');
            $param["titulo_in"]   = $this->input->post('titulo_in');
            $this->mImgCarousel->insertaImg($param);
        }

        $data["listImg"] = $this->mImgCarousel->listImgAdm();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("imgCarousel/v_adm", $data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Actualiza una imagen del carousel
	function actualizaImgAccion(){
        $data["result"] = null;
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $data['result']  = SUCCESS;
            $id              = $this->input->get('id');
            $img_org         = $this->input->post('img_org');
            $param["img"]    = $img_org;

            if(!$_FILES["img"]['error']){
                $this->libArchivos->configImgCarousel();
                $result = $this->libArchivos->carga_archivo($img_org, "img");
                
                if($result["result"]){
                    $param["img"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }

            $param["desc_es"] = $this->input->post('desc_es');
            $param["desc_in"] = $this->input->post('desc_in');
            $param["titulo_es"] = $this->input->post('titulo_es');
            $param["titulo_in"] = $this->input->post('titulo_in');
            $result = $this->mImgCarousel->actualizaImg($id, $param);
        }

        $data["listImg"] = $this->mImgCarousel->listImgAdm();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("imgCarousel/v_adm", $data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    // Elimina imagen del carousel
	function eliminaImgAccion(){
        $this->mLogin->verifica_sesion();
        
        $img = $this->input->get('img');
		$id = $this->input->get('id');
        $result = $this->mImgCarousel->eliminaImg($id);
        if ($this->libArchivos->elimina_archivo($img)){
            $data["result"] = SUCCESS;
        }else{ 
            $data["result"] = "No se pudo eliminar la imagen"; 
        }
        
        $data["listImg"] = $this->mImgCarousel->listImgAdm();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("imgCarousel/v_adm", $data);
        $this->load->view("vistasParciales/footer.php");
	}



}
