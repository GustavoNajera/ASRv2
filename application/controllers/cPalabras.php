<?php
/**
* Constructor 
*/
class cPalabras extends CI_Controller
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
		$this->form_validation->set_rules('valor_es', 'Valor Español', 'required');
		$this->form_validation->set_rules('valor_in', 'Valor Inglés',  'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

	/**
	 * Default
	 */
	public function index(){
		$this->detalleAdm();
	}
	
	// Vista para actualizar los textos del lado del cliente
	public function detalleAdm(){
		$this->mLogin->verifica_sesion();

		$vista  				= $this->input->get("vista");
		$data["vistaActiva"]    = $vista;

		$data["listPalabras"]   = $this->mPalabras->listPalabras($vista);
		$data["listVistas"]     = $this->mPalabras->listVistas();

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('palabras/v_actualizar_palabras', $data);
		$this->load->view('vistasParciales/footer');
	}

	// Modificar una persona
	function actualizarPalabraAccion(){
		$this->mLogin->verifica_sesion();

		if ( $this->validaForm() ){
			$id = $this->input->get('id');
			$param["valor_es"] = $this->input->post('valor_es');
			$param["valor_in"] = $this->input->post('valor_in');
			$this->mPalabras->actualizarPalabra($id, $param);
            $data['result'] = SUCCESS;
		}
		
		$vista  				= $this->input->get("vista");
		$data["vistaActiva"]    = $vista;
		$data["listPalabras"]   = $this->mPalabras->listPalabras($vista);
		$data["listVistas"]     = $this->mPalabras->listVistas();

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('palabras/v_actualizar_palabras', $data);
		$this->load->view('vistasParciales/footer');
	}
}