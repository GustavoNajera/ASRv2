<?php
/**
 * Controlador de caracteristicas de categorias
 */
class cCaractCategoria extends CI_Controller
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
		$this->form_validation->set_rules('nombre_es', 'Nombre Español', 'required');
		$this->form_validation->set_rules('nombre_in', 'Nombre Inglés',  'required');
		$this->form_validation->set_rules('categoria', 'Categoría',      'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    // Default es detalle de caracteristicas de categorias
    public function index(){
        $this->adminCaractCategoria();
    }
    
    // Listado 
    public function adminCaractCategoria(){
        $this->mLogin->verifica_sesion();

        $data["listCaract"]  = $this->mCaractCat->listCaract();
        $data["listCat"]     = $this->mCategoria->listCategoria();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCategoria/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Insertar curso ACCION
    public function insertarCaractAccion(){
        $this->mLogin->verifica_sesion();
        
        if ( $this->validaForm() ){
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $param["categoria"] = $this->input->post('categoria');
            $this->mCaractCat->insertarCaract($param);
            $data['result']     = SUCCESS;
        }
        
        $data["listCaract"]  = $this->mCaractCat->listCaract();
        $data["listCat"]     = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCategoria/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    
    // Actualizar caracteristica de categoria
    public function actualizarCaractAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $id = $this->input->get('id');
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $param["categoria"] = $this->input->post('categoria');
            $this->mCaractCat->actualizarCaract($id, $param);
            $data['result']     = SUCCESS;
        }

        $data["listCaract"]  = $this->mCaractCat->listCaract();
        $data["listCat"]     = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCategoria/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    
    // Eliminar caracteristica de categoria
	function eliminarCaract(){
        $this->mLogin->verifica_sesion();
        
		$id     = $this->input->get('id');
		$result = $this->mCaractCat->eliminarCaract($id);
        $data["result"]      = SUCCESS;
        
        $data["listCaract"]  = $this->mCaractCat->listCaract();
        $data["listCat"]     = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("caractCategoria/vActualizar_caract",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
