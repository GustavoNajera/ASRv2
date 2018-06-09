<?php
/**
* Constructor 
*/
class cRol extends CI_Controller
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
	 * Detalle personas
	 */
	public function detalle(){
		$this->mLogin->verifica_sesion();
		
		$data["listRol"] = $this->mRol->listRol();
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_detalle_rol', $data);
		$this->load->view('vistasParciales/footer');
	}

	/*
	* Insertar Rol
	*/

	//GET
	public function insertar(){
		$this->mLogin->verifica_sesion();
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_insertar_rol');
		$this->load->view('vistasParciales/footer');
	}

	//POST
	public function insertarRol(){
		$this->mLogin->verifica_sesion();
		
		if ( $this->validaForm() ){
			$param["nombre_es"] = $this->input->post('nombre_es');
			$param["nombre_in"] = $this->input->post('nombre_in');
			$this->mRol->isnertarRol($param);
            $data['result'] = SUCCESS;
		}

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_insertar_rol');
		$this->load->view('vistasParciales/footer');
	}

	//Modificando el estado de la persona
	function eliminarRol(){
		$this->mLogin->verifica_sesion();
		
		$id_rol = $this->input->get('id');

		if($this->mRol->asignado($id_rol) > 0){
			$data["result"] = "El elemento a eliminar ha sido asignado a una persona por lo que no puede ser eliminado.";
		}else if($this->mRol->eliminarRol($id_rol)){
            $data["result"] = "Se ha realizado con éxito";
        }
        else{
            $data["result"] = "Ha ocurrido un error";
        }

        $data["listRol"] = $this->mRol->listRol();
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_detalle_rol', $data);
		$this->load->view('vistasParciales/footer');
        
	}

	//Modificar una persona
	function actualizarRol(){
		$this->mLogin->verifica_sesion();
		
		$id_rol = $this->input->get('id');
		//Se obtiene la persona

		if($id_rol != NULL){
			$data["listRol"] = $this->mRol->listRol($id_rol);
		}else{
			$data["listRol"] = NULL;
		}
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_actualizar_rol', $data);
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarRolAccion(){
		$this->mLogin->verifica_sesion();
		
		if ( $this->validaForm() ){
			$id_rol = $this->input->get('id');
			$param["nombre_es"] = $this->input->post('nombre_es');
			$param["nombre_in"] = $this->input->post('nombre_in');
			$this->mRol->actualizarRol($id_rol, $param);
            $data['result'] = SUCCESS;
		}


		$data["listRol"] = $this->mRol->listRol($id_rol);
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('rol/v_detalle_rol', $data);
		$this->load->view('vistasParciales/footer');
	}
}