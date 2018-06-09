<?php
/**
 * Controlador del expediente general
 */
class cExpedienteGeneral extends CI_Controller
{
    function __construct(){
        parent::__construct();

        // Asigna mensajes para validaciones
		$this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);
    }

    /**
     * Default es detalle de expediente general
     */
    public function index(){
        $this->adminExpedienteGeneral();
    }

    /******************************************************
    - Valida el formulario
    ******************************************************/
    private function validaForm(){
		$this->form_validation->set_rules('persona', 			'Estudiante',      		'required');
		$this->form_validation->set_rules('curso', 	            'curso',                'required');
		$this->form_validation->set_rules('fecha_matriculado', 	'Fecha Matriculado',    'required');
		$this->form_validation->set_rules('detalle', 	        'Detalle',              'required');
        $this->form_validation->set_rules('estado', 			'Estado',			    'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
	******************************************************/

    /**************************************/
    /*              Cliente               */
    /**************************************/
    public function perfilUsuario(){
        $this->mLogin->verifica_sesion();
        $id = $this->session->userdata('id');

        $data["listMatricula"]  = $this->mExpedienteGeneral->listMatriculaCliente($id);
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("personas/perfilUsuario",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    
    /**************************************/
    /*           Administrador            */
    /**************************************/

    /**
     * Listado de expediente general
     */
    public function adminExpedienteGeneral(){
        $this->mLogin->verifica_sesion();

        $data["listExpediente"]   = $this->mExpedienteGeneral->listExpediente();
        $data["listPersona"]      = $this->mPersona->listPersona();
        $data["listCurso"]        = $this->mCurso->listCurso();
        $data["listEstado"]       = $this->mEstado->listEstado();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteGeneral/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar expediente general
     */
    public function insertarExpedienteAccion(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["persona"]               = $this->input->post('persona');
            $param["curso"]                 = $this->input->post('curso');
            $param["fecha_matriculado"]     = $this->input->post('fecha_matriculado');
            $param["fecha_finalizado"]      = $this->input->post('fecha_finalizado');
            $param["detalle"]               = $this->input->post('detalle');
            $param["estado"]                = $this->input->post('estado');
            $this->mExpedienteGeneral->insertarExpediente($param);
            $data['result']  = SUCCESS;
        }
        
        $data["listExpediente"]   = $this->mExpedienteGeneral->listExpediente();
        $data["listPersona"]      = $this->mPersona->listPersona();
        $data["listCurso"]        = $this->mCurso->listCurso();
        $data["listEstado"]       = $this->mEstado->listEstado();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteGeneral/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar expediente general
     */
    public function actualizarExpedienteAccion(){
        $data['result'] = null;
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');

            $titulo_org         = $this->input->post('titulo_org');
            $param["titulo"]    = $titulo_org;

            if(!$_FILES["titulo"]['error']){
                $this->libArchivos->configTitulos();
                $result = $this->libArchivos->carga_archivo($titulo_org, "titulo");
                
                if($result["result"]){
                    $param["titulo"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }

            // BD
            $param["persona"]               = $this->input->post('persona');
            $param["curso"]                 = $this->input->post('curso');
            $param["fecha_matriculado"]     = $this->input->post('fecha_matriculado');
            $param["fecha_finalizado"]      = $this->input->post('fecha_finalizado');
            $param["detalle"]               = $this->input->post('detalle');
            $param["estado"]                = $this->input->post('estado');
            $this->mExpedienteGeneral->actualizarExpediente($id, $param);
            if($data['result'] == null){ $data['result']  = SUCCESS; }
        }
      
        $data["listExpediente"]  = $this->mExpedienteGeneral->listExpediente();
        $data["listPersona"]     = $this->mPersona->listPersona();
        $data["listCurso"]       = $this->mCurso->listCurso();
        $data["listEstado"]      = $this->mEstado->listEstado();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteGeneral/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar expediente general
     */
	function eliminarExpedienteAccion(){
        $this->mLogin->verifica_sesion();
        
		$id     = $this->input->get('id');
        $img    = $this->input->get('titulo');
        $result = $this->mExpedienteGeneral->eliminarExpediente($id);
        
        if ($this->libArchivos->elimina_archivo($img)){
            $data["result"] = SUCCESS;
        }else{ 
            $data["result"] = "No se pudo eliminar el título"; 
        }
        $data["listExpediente"]  = $this->mExpedienteGeneral->listExpediente();
        $data["listPersona"]     = $this->mPersona->listPersona();
        $data["listCurso"]       = $this->mCurso->listCurso();
        $data["listEstado"]      = $this->mEstado->listEstado();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteGeneral/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
