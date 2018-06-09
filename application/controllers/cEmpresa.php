<?php
/**
* Constructor 
*/
class cEmpresa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		// Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);
		$this->form_validation->set_message('required', TEXT_VALIDATE_NUMERIC);
	}

	/******************************************************
    - Valida el formulario
	******************************************************/
    private function validaForm(){
		$this->form_validation->set_rules('nombre',					'Nombre', 					'required');
		$this->form_validation->set_rules('mision_es', 				'Misión Español',  			'required');
		$this->form_validation->set_rules('mision_in', 				'Misión Inglés',      		'required');
		$this->form_validation->set_rules('vision_es', 				'Visión Español', 			'required');
		$this->form_validation->set_rules('vision_in', 				'Visión Inglés',  			'required');
		$this->form_validation->set_rules('historia_es', 			'Historia Español',     	'required');
		$this->form_validation->set_rules('historia_in', 			'Historia Inglés', 			'required');
		$this->form_validation->set_rules('experiencia_es', 		'Experiencia Español',  	'required');
		$this->form_validation->set_rules('experiencia_in', 		'Experiencia Inglés',      	'required');
		$this->form_validation->set_rules('horario_atencion_es', 	'Horario Atención Español', 'required');
		$this->form_validation->set_rules('horario_atencion_in', 	'Horario Atención Inglés',  'required');
		$this->form_validation->set_rules('correo', 				'Correo',	      			'required');
		$this->form_validation->set_rules('numero', 				'Teléfono', 				'required|numeric');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
	******************************************************/
	
	/**
	 * Default
	 */
	public function index(){
		$this->actualizarEmpresa();
	}
	
	//Modificar Empresa
	function actualizarEmpresa(){
		$this->mLogin->verifica_sesion();
		
		//Se obtiene la empresa
		$data["listEmpresa"] = $this->mEmpresa->listEmpresa();

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresa/v_actualizar_empresa', $data);
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarEmpresaAccion(){
		$data["result"] = null;
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
			$id_empresa = $this->input->get('id');

			//Default
			$logo_es_org = $this->input->post('logo_es_org');
			$logo_in_org = $this->input->post('logo_in_org');
			$param["logo_es"] = $logo_es_org;
			$param["logo_in"] = $logo_in_org;
			
			// carga nuevos logos
			$this->libArchivos->configLogo();
			
			//Logo es
			if(!$_FILES["logo_es"]['error']){
				$result_es = $this->libArchivos->carga_archivo($logo_es_org, "logo_es");
				if(!$result_es["result"]){
					$data["result"] = $result_es["msgError"];
				}else{
					$param["logo_es"] = $result_es["nuevaRuta"];
				}
			}

			// logo in
			if(!$_FILES["logo_in"]['error']){
				$result_in = $this->libArchivos->carga_archivo($logo_in_org, "logo_in");
				if(!$result_in["result"]){
					$data["result"] = $result_in["msgError"];
				}else{
					$param["logo_in"] = $result_in["nuevaRuta"];
				}
			}
			
			$param["nombre"] 				= $this->input->post('nombre');
			$param["mision_es"] 			= $this->input->post('mision_es');
			$param["mision_in"] 			= $this->input->post('mision_in');
			$param["vision_es"] 			= $this->input->post('vision_es');
			$param["vision_in"] 			= $this->input->post('vision_in');
			$param["historia_es"] 			= $this->input->post('historia_es');
			$param["historia_in"] 			= $this->input->post('historia_in');
			$param["experiencia_es"] 		= $this->input->post('experiencia_es');
			$param["experiencia_in"] 		= $this->input->post('experiencia_in');
			$param["horario_atencion_es"] 	= $this->input->post('horario_atencion_es');
			$param["horario_atencion_in"] 	= $this->input->post('horario_atencion_in');
			$param["correo"] 				= $this->input->post('correo');
			$param["numero"] 				= $this->input->post('numero');
			$result = $this->mEmpresa->actualizarEmpresa($id_empresa, $param);
			
			if($data['result'] == null){
				$data['result'] = SUCCESS;
			}   
		}// Fin validacion
		
		$data["listEmpresa"] = $this->mEmpresa->listEmpresa();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresa/v_actualizar_empresa', $data);
		$this->load->view('vistasParciales/footer');
	}
}