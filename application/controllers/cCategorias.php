<?php
/**
 * Controlador para Categorias
 */
class cCategorias extends CI_Controller
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
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    // Default es detalle de categorias
    public function index(){
        $this->adminCategoria();
    }

    // Listado 
    public function adminCategoria(){
        $this->mLogin->verifica_sesion();

        $data["listCat"]     = $this->mCategoria->listCategoria();
        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("categorias/vActualizar_cartegoria",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Insertar Categoria ACCION
    public function insertarCategoriaAccion(){
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){

            //$param["img"] = $this->input->post('img');
            $this->libArchivos->configCategorias();
            $result = $this->libArchivos->carga_archivo(null, "img");
            
            if($result["result"]){
                $param["img"]    = $result["nuevaRuta"];
                $data['result']  = SUCCESS;
            }else{
                $data["result"]  = $result["msgError"];
            }
            
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $this->mCategoria->insertarCategoria($param);
        }

        $data["listCat"]    = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("categorias/vActualizar_cartegoria",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    
    // Actualizar categoria
    public function actualizarCategoriaAccion(){
        $data["result"] = null;
        $this->mLogin->verifica_sesion();

        if ( $this->validaForm() ){
            $data['result']  = SUCCESS;
            $id              = $this->input->get('id');
            $img_org         = $this->input->post('img_org');
            $param["img"]    = $img_org;

            if(!$_FILES["img"]['error']){
                $this->libArchivos->configCategorias();
                $result = $this->libArchivos->carga_archivo($img_org, "img");
                
                if($result["result"]){
                    $param["img"]    = $result["nuevaRuta"];
                }else{
                    $data["result"]  = $result["msgError"];
                }// Fin img
            }

            // BD
            $param["nombre_es"] = $this->input->post('nombre_es');
            $param["nombre_in"] = $this->input->post('nombre_in');
            $this->mCategoria->actualizarCategoria($id, $param);
        }

        $data["listCat"]     = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("categorias/vActualizar_cartegoria",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    // Eliminar categoria
	function eliminarCategoria(){
        $this->mLogin->verifica_sesion();
        
        $id  = $this->input->get('id');
        $img = $this->input->get('img');
        $result = $this->mCategoria->eliminarCategoria($id);
        if ($this->libArchivos->elimina_archivo($img)){
            $data["result"] = SUCCESS;
        }else{ 
            $data["result"] = "No se pudo eliminar la imagen de la categoría"; 
        }

        $data["listCat"]    = $this->mCategoria->listCategoria();
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("categorias/vActualizar_cartegoria",$data);
        $this->load->view("vistasParciales/footer.php");
	}

}
