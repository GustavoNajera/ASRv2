<?php
/**
 * Controlador del expediente de retiros de titulos
 */
class cExpedienteRetiroTitulo extends CI_Controller
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
		$this->form_validation->set_rules('fecha_retiro',   'Fecha Retiro',  'required');
        $this->form_validation->set_rules('medio_retiro',   'Medio Retiro',  'required');
        $this->form_validation->set_rules('detalle',        'Detalle',       'required');
		$this->form_validation->set_rules('persona_origen', 'Estudiante',    'required');
		$this->form_validation->set_rules('curso',          'Curso',         'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    /**
     * Default es detalle de retiros de titulos
     */
    public function index(){
        $this->adminExpedienteRetiroTitulo();
    }

    /**
     * Listado de retiros de titulos
     */
    public function adminExpedienteRetiroTitulo(){
        $this->mLogin->verifica_sesion();

        $data["listExpediente"] = $this->mExpedienteRetiroTitulo->listExpediente();
        $data["listPersona"]    = $this->mPersona->listPersona();
        $data["listCurso"]      = $this->mCurso->listCurso();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteRetiroTitulo/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar retiros de titulos
     */
    public function insertarExpedienteRetiroTitulo(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["fecha_retiro"]      = $this->input->post('fecha_retiro');
            $param["medio_retiro"]      = $this->input->post('medio_retiro');
            $param["detalle"]           = $this->input->post('detalle');
            $param["persona_origen"]    = $this->input->post('persona_origen');
            $param["curso"]             = $this->input->post('curso');
            $this->mExpedienteRetiroTitulo->insertarExpediente($param);
            $data['result'] = SUCCESS;
        }
        
        $data["listExpediente"] = $this->mExpedienteRetiroTitulo->listExpediente();
        $data["listPersona"]    = $this->mPersona->listPersona();
        $data["listCurso"]      = $this->mCurso->listCurso();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteRetiroTitulo/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    /**
     * Actualizar retiros de titulos
     */
    public function actualizarExpedienteRetiroTitulo(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');
            $param["fecha_retiro"]      = $this->input->post('fecha_retiro');
            $param["medio_retiro"]      = $this->input->post('medio_retiro');
            $param["detalle"]           = $this->input->post('detalle');
            $param["persona_origen"]    = $this->input->post('persona_origen');
            $param["curso"]             = $this->input->post('curso');
            $this->mExpedienteRetiroTitulo->actualizarExpediente($id, $param);
            $data['result'] = SUCCESS;
        }
        
        $data["listExpediente"]  = $this->mExpedienteRetiroTitulo->listExpediente();
        $data["listPersona"] = $this->mPersona->listPersona();
        $data["listCurso"] = $this->mCurso->listCurso();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteRetiroTitulo/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Eliminar retiros de titulos
     */
	function eliminarExpedienteRetiroTitulo(){
        $this->mLogin->verifica_sesion();
        
		$id = $this->input->get('id');
		$result = $this->mExpedienteRetiroTitulo->eliminarExpediente($id);

		$data["result"] = "Se ha realizado con éxito";
        $data["listExpediente"]  = $this->mExpedienteRetiroTitulo->listExpediente();
        $data["listPersona"] = $this->mPersona->listPersona();
        $data["listCurso"] = $this->mCurso->listCurso();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("expedienteRetiroTitulo/vActualizar_expediente",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
