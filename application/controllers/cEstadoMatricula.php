<?php
/**
* Constructor 
*/
class cEstadoMatricula extends CI_Controller
{
	
	function __construct()
	{
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
	 * Default
	 */
	public function index(){
		$this->detalle();
	}

	/**
	 * Detalle Estado matricula
	 */
	public function detalle(){
		$this->mLogin->verifica_sesion();
		
		$data["listEstado"] = $this->mEstado->listEstado();
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('estadoMatricula/vActualizar_estado', $data);
		$this->load->view('vistasParciales/footer');
	}

	/*
	* Insertar Estado de matricula
	*/

	//POST
	public function insertarEstadoMatriculaAccion(){
		$this->mLogin->verifica_sesion();
		
		if ( $this->validaForm() ){
			$param["nombre_es"] = $this->input->post('nombre_es');
			$param["nombre_in"] = $this->input->post('nombre_in');
			$this->mEstado->isnertarEstado($param);
			$data['result'] = SUCCESS;
		}

        $data["listEstado"] = $this->mEstado->listEstado();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('estadoMatricula/vActualizar_estado', $data);
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarEstadoMatriculaAccion(){
		$this->mLogin->verifica_sesion();

		if ( $this->validaForm() ){
			$id    				  = $this->input->get('id');
			$param["nombre_es"]   = $this->input->post('nombre_es');
			$param["nombre_in"]   = $this->input->post('nombre_in');
			$this->mEstado->actualizarEstado($id, $param);
			$data['result'] = SUCCESS;
		}

        $data["listEstado"] = $this->mEstado->listEstado();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('estadoMatricula/vActualizar_estado', $data);
		$this->load->view('vistasParciales/footer');
    }
    
    //Eliminar estado de la matricula
	function eliminarEstado(){
		$this->mLogin->verifica_sesion();
		
		$id = $this->input->get('id');

		if($this->mEstado->asignado($id) > 0){
			$data["result"] = "El elemento a eliminar ha sido asignado en una matricula por lo que no puede ser eliminado.";
		}else if($this->mEstado->eliminarEstadoMatricula($id)){
            $data["result"] = "Se ha realizado con éxito";
        }
        else{
            $data["result"] = "Ha ocurrido un error";
        }

        $data["listEstado"] = $this->mEstado->listEstado();
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('estadoMatricula/vActualizar_estado', $data);
		$this->load->view('vistasParciales/footer');
        
	}
}