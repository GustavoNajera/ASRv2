<?php
class cLogin extends CI_Controller
{

    function __construct(){
		parent::__construct();

		// Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);

		$iTem = $this->idioma = $this->session->userdata('idioma');
        if($iTem == null){
            $iTem = "ES";
        }
        $this->idioma = $iTem;
	}
	
	/*********************
	 * 	Genera la vista
	 *********************/
	private function gen_vista($data = null){
		$this->load->view('vistasParciales/head');
		$this->load->view('login/vLogin', $data);
		$this->load->view('vistasParciales/footer');
	}
	
	// LOGIN
	public function index(){
		$data["listPalabras"]   = $this->mPalabras->listPalabrasCliente("sesion", $this->idioma = $this->session->userdata('idioma'));
        $listPalabrasTem 		= Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
		endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;
        //$data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
		
		$this->gen_vista($data);
	}

	/*
	* LOGIN
	*/
	public function loguear(){
		$data["listPalabras"] = $this->mPalabras->listPalabrasCliente("sesion", $this->idioma = $this->session->userdata('idioma'));
        $listPalabrasTem = Array();
		
		foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
		endforeach;

		$data["listPalabras"]     = $listPalabrasTem;
        //$data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
		
		/* Validaciones */
		$this->form_validation->set_rules('correo', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required');
		$res = null;
		if ($this->form_validation->run() == TRUE){
			$param["correo"] = $this->input->post('correo');
			$param["pass"]   = $this->input->post('pass');
			$res             = $this->mLogin->loguear($param);
			if (!$res){
				$data["result"]  = "No se encontraron coincidencias";
			}
		}

		if($res == null || !$res){
			$this->gen_vista($data);
		}else{
			$rolS = $this->session->userdata('rol');
			if($rolS == '1'){
				redirect('cPersona');
			}else if($rolS == '2' || $rolS == '3'){
				redirect('cPrincipal');
			}
		}
	}

	/*
	* LOGOUT
	*/
	public function logout(){
		$res = $this->mLogin->logout();
		$this->index();
	}

	/**
	 * Cambia idioma AJAX
	 */
	public function cambiaIdioma(){
		$idioma = $this->input->post('idioma');
		$this->session->set_userdata(array("idioma"  => $idioma));
		echo true;
	}
}
