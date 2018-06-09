<?php
/**
 * Controlador de informacion general
 */
class cInfo_general extends CI_Controller
{

    private $idioma;
    function __construct(){
        parent::__construct();
        $iTem = $this->idioma = $this->session->userdata('idioma');
        if($iTem == null){
            $iTem = "ES";
        }
        $this->idioma = $iTem;

        // Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);
    }

    /******************************************************
    - Valida el formulario
    ******************************************************/
    private function validaForm(){
		$this->form_validation->set_rules('nombre_es',      'Nombre Español',       'required');
        $this->form_validation->set_rules('nombre_in',      'Nombre Inglés',        'required');
        $this->form_validation->set_rules('descripcion_es', 'Descripción Español',  'required');
		$this->form_validation->set_rules('descripcion_in', 'Descripción Inglés',   'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    /**
     * Default es detalle de infomacion general
     */
    public function index(){
        $this->adminInfoGeneral();
    }    

	/******************
	 * CLIENTE
	 *****************/
    public function detalleClient(){
        
        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listInfoGeneral"]     = $this->mInfoGeneral->listInfoGeneralCliente($this->session->userdata('idioma'));
        $data["listPalabras"]        = $this->mPalabras->listPalabrasCliente("condiciones", $this->idioma);

        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;
        /***/


        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuClienteDet.php",$data);
        $this->load->view("infoGeneral/v_info_general");
        $this->load->view("vistasParciales/footer.php");
    }    


	 /*********************
	  * ADMINISTRATIVO 
      *********************/

    /**
     * Listado
     */
    public function adminInfoGeneral(){
        $this->mLogin->verifica_sesion();

        $data["listInfoGeneral"]  = $this->mInfoGeneral->listInfoGeneral();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("infoGeneral/vActualizar_info_general",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar informacion general
     */
    public function insertarInfoGeneral(){
        $this->mLogin->verifica_sesion();
   
        if ( $this->validaForm() ){
            $param["nombre_es"]      = $this->input->post('nombre_es');
            $param["nombre_in"]      = $this->input->post('nombre_in');
            $param["descripcion_es"] = $this->input->post('descripcion_es');
            $param["descripcion_in"] = $this->input->post('descripcion_in');
            $this->mInfoGeneral->insertarInfoGeneral($param);
            $data['result'] = SUCCESS;
        }
        
        $data["listInfoGeneral"]  = $this->mInfoGeneral->listInfoGeneral();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("infoGeneral/vActualizar_info_general",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar informacion general
     */
    public function actualizarInfoGeneral(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id                         = $this->input->get('id');
            $param["nombre_es"]         = $this->input->post('nombre_es');
            $param["nombre_in"]         = $this->input->post('nombre_in');
            $param["descripcion_es"]    = $this->input->post('descripcion_es');
            $param["descripcion_in"]    = $this->input->post('descripcion_in');
            $this->mInfoGeneral->actualizarInfoGeneral($id, $param);
            $data['result'] = SUCCESS;
        }
        
        $data["listInfoGeneral"]  = $this->mInfoGeneral->listInfoGeneral();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("infoGeneral/vActualizar_info_general",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar informacion general
     */
	function eliminarInfoGeneral(){
        $this->mLogin->verifica_sesion();
        
		$id = $this->input->get('id');
		$result = $this->mInfoGeneral->eliminarInfoGeneral($id);

		$data['result'] = SUCCESS;
        $data["listInfoGeneral"]  = $this->mInfoGeneral->listInfoGeneral();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("infoGeneral/vActualizar_info_general",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
