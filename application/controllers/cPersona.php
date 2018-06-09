<?php
/**
* Constructor 
*/
class cPersona extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		// Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);

		$iTem = $this->idioma = $this->session->userdata('idioma');
        if($iTem == null){
            $iTem = "ES";
        }
        $this->idioma = $iTem;
	}

	/******************************************************
    - Valida el formulario
    ******************************************************/
    private function validaForm(){
		$this->form_validation->set_rules('nombre', 			'Nombre', 			'required');
		$this->form_validation->set_rules('primer_apellido', 	'Primer Apellido',  'required');
		$this->form_validation->set_rules('segundo_apellido', 	'Segundo Apellido', 'required');
		$this->form_validation->set_rules('cedula', 			'Cédula',  			'required');
		$this->form_validation->set_rules('fecha_nac', 			'Fecha Nacimiento', 'required');
		$this->form_validation->set_rules('pais', 				'País',  			'required');
		$this->form_validation->set_rules('pass', 				'Contraseña', 		'required');
		$this->form_validation->set_rules('rol', 				'Rol',  			'required');
		$this->form_validation->set_rules('correo', 			'Correo', 			'required');
		$this->form_validation->set_rules('numero', 			'Teléfono',  		'required');
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


	/*****************************/
	/*    Funciones privadas     */
	/*****************************/
	private function obtenerPersona($id = null){
		if($id != NULL){
			$data["listPersona"] = $this->mPersona->listPersona($id);
			$data["listRol"] = $this->mRol->listRol();
		}else{
			$data["listPersona"] = NULL;
			$data["listRol"] = NULL;
		}

		return $data;
	}


	/*****************************/
	/*    Funciones publicas     */
	/*****************************/
	
	/**
	 * Detalle personas
	 */
	public function detalle(){
		$this->mLogin->verifica_sesion();
		

		$data["listPersona"] 	= $this->mPersona->listPersona(
															null
															,$this->input->post('nombre')
															,$this->input->post('apellido')
															,$this->input->post('fecha_matriculado')
															,$this->input->post('fecha_finalizado')
														);

		$listPersona = Array();
        foreach ($data["listPersona"] as $persona):
			$listPersona[]  =   array("persona" 	  => $persona
									  ,"expediente"   => $this->mExpedienteGeneral->listMatriculaCliente($persona["id_persona"])
									);
        endforeach;
		$data["listPersona"]  =   $listPersona;
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('personas/v_detalle_persona', $data);
		$this->load->view('vistasParciales/footer');
	}

	/*
	* Insertar Persona
	*/

	//GET
	public function insertar(){
		$this->mLogin->verifica_sesion();
		
		$data["listRol"] = $this->mRol->listRol();

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('personas/v_insertar_persona', $data);
		$this->load->view('vistasParciales/footer');
	}

	//POST
	public function insertarPersona(){
        $this->mLogin->verifica_sesion();

		if ( $this->validaForm() ){

            $param["img"] = $this->input->post('img');
            $this->libArchivos->configImgPersona();
            $result = $this->libArchivos->carga_archivo(null, "img");
            
            if($result["result"]){
                $param["img"]    = $result["nuevaRuta"];
                $data['result']  = SUCCESS;
            }else{
                $data["result"]  = $result["msgError"];
            }

			$param["nombre"] = $this->input->post('nombre');
			$param["primer_apellido"] = $this->input->post('primer_apellido');
			$param["segundo_apellido"] = $this->input->post('segundo_apellido');
			$param["cedula"] = $this->input->post('cedula');
			$param["activo"] = 1; //Activo por defecto
			$param["nombre"] = $this->input->post('nombre');
			$param["fecha_nac"] = $this->input->post('fecha_nac');
			$param["pais"] = $this->input->post('pais');
			$param["pass"] = $this->input->post('pass');
			$param["rol"] = $this->input->post('rol');
			$param["correo"] = $this->input->post('correo');
			$param["numero"] = $this->input->post('numero');


			//Encriptacion de contrasena
			//$param["clave"] =  $this->encrypt->sha1->($this->input->post("clave"));

			$this->mPersona->isertarPersona($param);
		}

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('personas/v_insertar_persona');
		$this->load->view('vistasParciales/footer');
	}

	//Modificando el estado de la persona
	function cambioEstado(){
		$this->mLogin->verifica_sesion();
		
		$id_persona = $this->input->post('id');
		$estado = $this->input->post('estado');
		echo $this->mPersona->cambioEstado($id_persona, $estado);
	}

	//Actualizar perfil del usuario loguado
	function miPerfil(){
		$id = $this->session->userdata('id');
		$data = $this->obtenerPersona($id);
		
		$data["listPalabras"]     = $this->mPalabras->listPalabrasCliente("sobre nosotros", $this->idioma = $this->session->userdata('idioma'));
		$data["listRol"] 		  = $this->mRol->listRol();

        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
		$data["listPalabras"]     =   $listPalabrasTem;
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuClienteDet.php", $data);
		$this->load->view('personas/v_actualizar_mi_perfil');
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarPersona(){
		$this->mLogin->verifica_sesion();
	
		$id_persona      = $this->input->get('id');	
		$data["listRol"] = $this->mRol->listRol();
		$data            = $this->obtenerPersona($id_persona);
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('personas/v_actualizar_persona', $data);
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarPerfilAccion(){
		$data["result"] = null;
        $this->mLogin->verifica_sesion();
		$id_persona     = $this->input->get('id');

        if ( $this->validaForm() ){
            $data['result']  = SUCCESS;
            $img_org         = $this->input->post('img_org');
            $param["img"]    = $img_org;

            if(!$_FILES["img"]['error']){
                $this->libArchivos->configImgPersona();
                $result = $this->libArchivos->carga_archivo($img_org, "img");
                
                if($result["result"]){
                    $param["img"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }
		
			$param["nombre"] 			= $this->input->post('nombre');
			$param["primer_apellido"] 	= $this->input->post('primer_apellido');
			$param["segundo_apellido"] 	= $this->input->post('segundo_apellido');
			$param["cedula"] 			= $this->input->post('cedula');
			$param["fecha_nac"] 		= $this->input->post('fecha_nac');
			$param["pais"] 				= $this->input->post('pais');
			$param['activo']			= $this->input->post('activo');
			$param["pass"] 				= $this->input->post('pass');
			$param["rol"] 				= $this->input->post('rol');
			$param["correo"]		 	= $this->input->post('correo');
			$param["numero"] 			= $this->input->post('numero');
			$this->mPersona->actualizarPersona($id_persona, $param);
		}

		// Vuelve a mostrar la vista
		$data 					  = $this->obtenerPersona($id_persona);
		$data["listPalabras"]     = $this->mPalabras->listPalabrasCliente("sobre nosotros", $this->idioma = $this->session->userdata('idioma'));
		$data["listRol"] 		  = $this->mRol->listRol();

        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
		$data["listPalabras"]     =   $listPalabrasTem;
		$data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuClienteDet.php", $data);
		$this->load->view('personas/v_actualizar_mi_perfil');
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarPersonaAccion(){
		$data["result"] = null;
        $this->mLogin->verifica_sesion();
		$id_persona  = $this->input->get('id');

        if ( $this->validaForm() ){
            $data['result']  = SUCCESS;
            $img_org         = $this->input->post('img_org');
            $param["img"]    = $img_org;

            if(!$_FILES["img"]['error']){
                $this->libArchivos->configImgPersona();
                $result = $this->libArchivos->carga_archivo($img_org, "img");
                
                if($result["result"]){
                    $param["img"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }
		
			$param["nombre"] 			= $this->input->post('nombre');
			$param["primer_apellido"] 	= $this->input->post('primer_apellido');
			$param["segundo_apellido"] 	= $this->input->post('segundo_apellido');
			$param["cedula"] 			= $this->input->post('cedula');
			$param["activo"] 			= $this->input->post('activo');
			$param["fecha_nac"] 		= $this->input->post('fecha_nac');
			$param['activo']			= $this->input->post('activo');
			$param["pais"] 				= $this->input->post('pais');
			$param["pass"] 				= $this->input->post('pass');
			$param["rol"] 				= $this->input->post('rol');
			$param["correo"]		 	= $this->input->post('correo');
			$param["numero"] 			= $this->input->post('numero');
			$this->mPersona->actualizarPersona($id_persona, $param);
		}

		$id_persona      = $this->input->get('id');	
		$data["listRol"] = $this->mRol->listRol();
		$data            = $this->obtenerPersona($id_persona);
		
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('personas/v_actualizar_persona', $data);
		$this->load->view('vistasParciales/footer');
	}
}