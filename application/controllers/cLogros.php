<?php
/**
 * Controlador de logros
 */
class cLogros extends CI_Controller
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
     * Default es detalle de Logros
     */
    public function index(){
        $this->adminLogros();
    }

    /**
     * Listado 
     */
    public function adminLogros(){
        $this->mLogin->verifica_sesion();

        $data["listLogros"]  = $this->mLogros->listLogros();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("logros/vActualiza_logros",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar Logro ACCION
     */
    public function insertarLogroAccion(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["nombre_es"]         = $this->input->post('nombre_es');
            $param["nombre_in"]         = $this->input->post('nombre_in');
            $param["descripcion_es"]    = $this->input->post('descripcion_es');
            $param["descripcion_in"]    = $this->input->post('descripcion_in');
            $this->mLogros->insertarLogro($param);
            $data['result'] = SUCCESS;
        }
        
        $data["listLogros"]  = $this->mLogros->listLogros();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("logros/vActualiza_logros",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar Logro
     */
    public function actualizarLogroAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $param["descripcion_es"] = $this->input->post('descripcion_es');
            $param["descripcion_in"] = $this->input->post('descripcion_in');
            $this->mLogros->actualizarLogro($id, $param);
            $data['result'] = SUCCESS;
        }

        $data["listLogros"]  = $this->mLogros->listLogros();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("logros/vActualiza_logros",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar Logro
     */
	function eliminarLogro(){
        $this->mLogin->verifica_sesion();
        
		$id = $this->input->get('id');
		$result = $this->mLogros->eliminarLogro($id);

		$data["result"] = "Se ha realizado con éxito";
        $data["listLogros"]  = $this->mLogros->listLogros();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("logros/vActualiza_logros",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}