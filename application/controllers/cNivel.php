<?php
/**
 * Controlador para Categorias
 */
class cNivel extends CI_Controller
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
		$this->form_validation->set_rules('nombre_es', 'Nombre Español', 'required');
        $this->form_validation->set_rules('nombre_in', 'Nombre Inglés',  'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    /**
     * Default es detalle de nivel
     */
    public function index(){
        $this->adminNivel();
    }

    /**
     * Listado 
     */
    public function adminNivel(){
        $this->mLogin->verifica_sesion();

        $data["listNivel"] = $this->mNivel->listNivel();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("niveles/vActualizar_nivel",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar nivel ACCION
     */
    public function insertarNivelAccion(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $this->mNivel->insertarNivel($param);
            $data['result'] = SUCCESS;
        }
       
        $data["listNivel"] = $this->mNivel->listNivel();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("niveles/vActualizar_nivel",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar categoria
     */
    public function actualizarNivelAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $this->mNivel->actualizarNivel($id, $param);
            $data['result'] = SUCCESS;
        }

        $data["listNivel"] = $this->mNivel->listNivel();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("niveles/vActualizar_nivel", $data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar categoria
     */
	function eliminarNivel(){
        $this->mLogin->verifica_sesion();
        
        $id = $this->input->get('id');
        
        if($this->mNivel->asignado($id) > 0){
            $data["result"] = "El nivel ha sido asignado a un curso por lo que no puede ser eliminado";    
        }
        else{
            $result = $this->mNivel->eliminarNivel($id);
            $data["result"] = "Se ha realizado con éxito";
        }
        $data["listNivel"] = $this->mNivel->listNivel();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("niveles/vActualizar_nivel",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
