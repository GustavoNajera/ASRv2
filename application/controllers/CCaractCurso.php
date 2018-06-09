<?php
/**
 * Controlador de caracteristicas de cursos
 */
class CCaractCurso extends CI_Controller
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
		$this->form_validation->set_rules('nombre_es', 'Nombre Espñol',      'required');
        $this->form_validation->set_rules('nombre_in', 'Nombre Iglés',       'required');
        $this->form_validation->set_rules('descri_es', 'Descripción Espñol', 'required');
		$this->form_validation->set_rules('descri_in', 'Descripción Iglés',  'required');
		$this->form_validation->set_rules('curso',     'Curso',              'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/


    // Default es detalle de caracteristicas de cursos
    public function index(){
        $this->adminCaractCurso();
    }

    // Listado 
    public function adminCaractCurso(){
        $this->mLogin->verifica_sesion();

        $data["listCurso"]           = $this->mCurso->listCurso();
        $data["listCaract"]          = $this->mCaractCurso->listCaract();

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCurso/vActualizar_Caract", $data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Insertar curso ACCION
    public function insertarCaractAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $param["nombre_es"]   = $this->input->post('nombre_es');
            $param["nombre_in"]   = $this->input->post('nombre_in');
            $param["descri_es"]   = $this->input->post('descri_es');
            $param["descri_in"]   = $this->input->post('descri_in');
            $param["curso"]       = $this->input->post('curso');

            $this->mCaractCurso->insertarCaract($param);
            $data['result']       = SUCCESS;
        }

        $data["listCurso"]     = $this->mCurso->listCurso();
        $data["listCaract"]    = $this->mCaractCurso->listCaract();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCurso/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    // Actualizar caracteristica de categoria
    public function actualizarCaractAccion(){
        $this->mLogin->verifica_sesion();
        $id = $this->input->get('id');
        
        if ( $this->validaForm() ){
            $param["nombre_es"]   = $this->input->post('nombre_es');
            $param["nombre_in"]   = $this->input->post('nombre_in');
            $param["descri_es"]   = $this->input->post('descri_es');
            $param["descri_in"]   = $this->input->post('descri_in');
            $param["curso"]       = $this->input->post('curso');
            $this->mCaractCurso->actualizarCaract($id, $param);
            $data['result']       = SUCCESS;
        }

        $data["listCurso"]           = $this->mCurso->listCurso();
        $data["listCaract"]     = $this->mCaractCurso->listCaract();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCurso/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Eliminar caracteristica de categoria
	function eliminarCaract(){
        $this->mLogin->verifica_sesion();
        
		$id       = $this->input->get('id');
		$result   = $this->mCaractCurso->eliminarCaract($id);

		$data["result"]         = SUCCESS;
        $data["listCurso"]      = $this->mCurso->listCurso();
        $data["listCaract"]     = $this->mCaractCurso->listCaract();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCurso/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
