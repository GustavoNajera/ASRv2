<?php
/**
 * Controlador para Paises
 */
class CPais extends CI_Controller
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
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    /**
     * Default es detalle de Paises
     */
    public function index(){
        $this->adminPais();
    }

    /**
     * Listado 
     */
    public function adminPais(){
        $this->mLogin->verifica_sesion();

        $data["listPais"] = $this->mPais->listPais();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("paises/vActualizarPais",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar pais ACCION
     */
    public function insertarPaisAccion(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["nombre"] = $this->input->post('nombre');
            $this->mPais->insertarPais($param);
            $data['result'] = SUCCESS;
        }

        $data["listPais"] = $this->mPais->listPais();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("paises/vActualizarPais",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar pais
     */
    public function actualizarPaisAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');
            $param["nombre"] = $this->input->post('nombre');
            $this->mPais->actualizarPais($id, $param);
            $data['result'] = SUCCESS;
        }

        $data["listPais"] = $this->mPais->listPais();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("paises/vActualizarPais",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar categoria
     */
	function eliminarPais(){
        $this->mLogin->verifica_sesion();
        
        $id = $this->input->get('id');
        
        if($this->mPais->asignado($id) > 0){
            $data["result"] = "El pais ha sido asignado a un curso por lo que no puede ser eliminado";    
        }
        else{
            $result = $this->mPais->eliminarPais($id);
            $data["result"] = "Se ha realizado con éxito";
        }
        $data["listPais"] = $this->mPais->listPais();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("paises/vActualizarPais",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
