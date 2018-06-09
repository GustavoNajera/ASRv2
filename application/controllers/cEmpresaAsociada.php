<?php
/**
* Constructor 
*/
class cEmpresaAsociada extends CI_Controller
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
		$this->form_validation->set_rules('nombre', 			'Nombre',      			'required');
		$this->form_validation->set_rules('descripcion_es', 	'Descripción Español',  'required');
		$this->form_validation->set_rules('descripcion_in', 	'Descripción Iglés',    'required');
        $this->form_validation->set_rules('enlace', 			'Enlace',			    'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
	******************************************************/
	
	/**
	 * Default
	 */
	public function index(){
		$this->actualizarEmpresaAsociada();
	}
	
	//Modificar Empresa
	function actualizarEmpresaAsociada(){
		$this->mLogin->verifica_sesion();
		
		//Se obtiene la empresa
		$data = array();
		$data["listEmpresa"] = $this->mEmpresaAsociada->listEmpresa();

		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresaAsociada/v_actualizar_empresa_asociada', $data);
		$this->load->view('vistasParciales/footer');
	}

	//Modificar una persona
	function actualizarEmpresaAccion(){
		$data["result"] = null;
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $data['result']  = SUCCESS;
            $id_empresa      = $this->input->get('id');
            $img_org         = $this->input->post('img_org');
            $param["img"]    = $img_org;

            if(!$_FILES["img"]['error']){
                $this->libArchivos->configImgEmpresaAsociada();
                $result = $this->libArchivos->carga_archivo($img_org, "img");
                
                if($result["result"]){
                    $param["img"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }

            // BD
			$param["nombre"] = $this->input->post('nombre');
			$param["descripcion_es"] = $this->input->post('descripcion_es');
			$param["descripcion_in"] = $this->input->post('descripcion_in');
			$param["enlace"] = $this->input->post('enlace');
			$result = $this->mEmpresaAsociada->actualizarEmpresa($id_empresa, $param);
        }
		
		$data["listEmpresa"] = $this->mEmpresaAsociada->listEmpresa();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresaAsociada/v_actualizar_empresa_asociada', $data);
		$this->load->view('vistasParciales/footer');
		
	}

	/**
	 * Eliminar empresa asociada
	 */
	function eliminarEmpresa(){
		$this->mLogin->verifica_sesion();
		
		$id_empresa = $this->input->get('id');
		$img = $this->input->get('img');
		$result = $this->mEmpresaAsociada->eliminarEmpresa($id_empresa);

        if ($this->libArchivos->elimina_archivo($img)){
            $data["result"] = SUCCESS;
        }else{ 
            $data["result"] = "No se pudo eliminar la imagen de la Empresa"; 
        }

		$data["listEmpresa"] = $this->mEmpresaAsociada->listEmpresa();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresaAsociada/v_actualizar_empresa_asociada', $data);
		$this->load->view('vistasParciales/footer');
	}

	/**
	 * Inserta una empresa
	 */
	public function insertaEmpresa(){
        $this->mLogin->verifica_sesion();
		
		if ( $this->validaForm() ){
			if($_FILES["img"]['error']){
				$data['result']  = "La imagen es requerida";
			}else{
				$this->libArchivos->configImgEmpresaAsociada();
				$result = $this->libArchivos->carga_archivo(null, "img");
				
				if($result["result"]){
					$param["img"]    = $result["nuevaRuta"];
					$data['result']  = SUCCESS;
				}else{
					$data["result"]  = $result["msgError"];
				}

				// BD
				$param["nombre"] = $this->input->post('nombre');
				$param["descripcion_es"] = $this->input->post('descripcion_es');
				$param["descripcion_in"] = $this->input->post('descripcion_in');
				$param["enlace"] = $this->input->post('enlace');

				$this->mEmpresaAsociada->insertaEmpresa($param);
			}
		}

		$data["listEmpresa"] = $this->mEmpresaAsociada->listEmpresa();
		$this->load->view('vistasParciales/head');
        $this->load->view("vistasParciales/menuAdmin.php");
		$this->load->view('empresaAsociada/v_actualizar_empresa_asociada', $data);
		$this->load->view('vistasParciales/footer');
	}
}