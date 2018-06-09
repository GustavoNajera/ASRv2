<?php
/**
 * Controlador de Cursos
 */
class cCursos extends CI_Controller
{
    private $idioma = "ES";
    function __construct(){
        parent::__construct();

        // Asigna mensajes para validaciones
        $this->form_validation->set_message('required', TEXT_VALIDATE_REQUIRED);
        $this->form_validation->set_message('numeric',  TEXT_VALIDATE_NUMERIC);

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
		$this->form_validation->set_rules('nombre_es',           'Nombre Español',        'required');
		$this->form_validation->set_rules('nombre_in',           'Nombre Inglés',         'required');
        $this->form_validation->set_rules('descripcion_es',      'Descripción Español',   'required');
        $this->form_validation->set_rules('descripcion_in',      'Descripción Inglés',    'required');
		$this->form_validation->set_rules('resumen_es',          'Resumen Español',       'required');
        $this->form_validation->set_rules('resumen_in',          'Resumen Inglés',        'required');
        $this->form_validation->set_rules('pre_requisitos_es',   'Prerequisitos Español', 'required');
		$this->form_validation->set_rules('pre_requisitos_in',   'Prerequisitos Inglés',  'required');
        $this->form_validation->set_rules('activo',              'Estado',                'required');
        $this->form_validation->set_rules('categoria',           'Categoría',             'required');
        $this->form_validation->set_rules('nivel',               'Nivel',                 'required');
        $this->form_validation->set_rules('pais',                'País',                  'required');
        $this->form_validation->set_rules('longitud',            'Longitud',              'required|numeric');
        $this->form_validation->set_rules('latitud',             'Latitud',               'required|numeric');
        $this->form_validation->set_rules('instructor',          'Instructor',            'required');
        return $this->form_validation->run();
    }

    /******************************************************
    - Funciones de ruteo
    ******************************************************/

    /**
     * Default es detalle de cursos
     */
    public function index(){
        $this->adminDetalle();
    }

     /**----------------------------
     * Seccion cliente
     * ------------------------------*/

    /**
     * Mapa con listado de cursos
     */
    public function mapa(){        
        $data["listCursos"] = $this->mCurso->listCursoCliente($this->idioma);
        $data["listPalabras"]        = $this->mPalabras->listPalabrasCliente("mapa", $this->idioma);

        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $listPalabrasTem["logo"]  = $this->mEmpresa->obtenerLogoCliente($this->idioma)->logo;
        $data["listPalabras"]   =   $listPalabrasTem;
        /***/

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuClienteDet.php", $data);
        $this->load->view("cursos/vMapa");
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Detalle cursos
     */
    public function detalle(){
        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listPalabras"]        = $this->mPalabras->listPalabrasCliente("list cursos", $this->idioma);
        $data["listCursos"] = $this->mCurso->listCursoCliente($this->idioma);
        $listCursos = Array();
        
        foreach ($data["listCursos"] as $curso):
            $listCaract = $this->mCaractCurso->listCaract($curso["id"],$this->idioma);
            $listCursos[] = array("curso"        => $curso
                                  ,"listCaract"  => $listCaract);
        endforeach;
        $data["listCursos"] = $listCursos;
        
        /****/
        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;
        
        /****/


        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuClienteDet.php", $data);
        $this->load->view("cursos/vDetalleCursos");
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Detalle de un curso
     */
    public function detCurso(){
        $id = $this->input->get('id');

        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listPalabras"]       = $this->mPalabras->listPalabrasCliente("detalle de un curso", $this->idioma);
        $data["cursoTem"]           = $this->mCurso->listCursoCliente($this->idioma, $id);
        $curso = array_values( $data["cursoTem"] )[0];

        $listCaract = $this->mCaractCurso->listCaractCliente($curso["id"],$this->idioma);
        $listCursos = array("curso"        => $curso
                            ,"listCaract"  => $listCaract);
        $data["cursoTem"] = $listCursos;

        /****/
        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;


        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuClienteDet.php", $data);
        $this->load->view("cursos/vDetCurso");
        $this->load->view("vistasParciales/footer.php");
    }


    /**----------------------------
     * Seccion administrativa
     * ------------------------------*/

    /**
     * Listado de cursos a actualizar
     */
    public function adminDetalle(){
        $this->mLogin->verifica_sesion();

        $data["listCursos"]         = $this->mCurso->listCurso();
        $data["listCategorias"]     = $this->mCategoria->listCategoria();

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("cursos/vAdminDetalle",$data);
        $this->load->view("vistasParciales/footer.php");
    }

     /**
     * Insertar cursos
     */
    public function adminInsertar(){
        $this->mLogin->verifica_sesion();

        $data["listCategoria"]          = $this->mCategoria->listCategoria();
        $data["listNivel"]              = $this->mNivel->listNivel(); 
        $data["listPais"]               = $this->mPais->listPais();
        $data["listInstructores"]       = $this->mPersona->listInstructor(); 

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("cursos/vInsertar_curso", $data);
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * Insertar curso ACCION
     */
    public function insertarCursoAccion(){
        $this->mLogin->verifica_sesion();

		if ( $this->validaForm() ){
            $param["nombre_es"]         = $this->input->post('nombre_es');
            $param["nombre_in"]         = $this->input->post('nombre_in');
            $param["descripcion_es"]    = $this->input->post('descripcion_es');
            $param["descripcion_in"]    = $this->input->post('descripcion_in');
            $param["resumen_es"]        = $this->input->post('resumen_es');
            $param["resumen_in"]        = $this->input->post('resumen_in');
            $param["pre_requisitos_es"] = $this->input->post('pre_requisitos_es');
            $param["pre_requisitos_in"] = $this->input->post('pre_requisitos_in');
            $param["activo"]            = $this->input->post('activo');
            $param["categoria"]         = $this->input->post('categoria');
            $param["nivel"]             = $this->input->post('nivel');
            $param["pais"]              = $this->input->post('pais');
            $param["longitud"]          = $this->input->post('longitud');
            $param["latitud"]           = $this->input->post('latitud');
            $param["instructor"]        = $this->input->post('instructor');
            $this->mCurso->insertarCurso($param);
            $data["result"]             = SUCCESS;
        }

        $data["listCategoria"]       = $this->mCategoria->listCategoria();
        $data["listNivel"]           = $this->mNivel->listNivel();
        $data["listPais"]            = $this->mPais->listPais(); 
        $data["listInstructores"]    = $this->mPersona->listInstructor(); 

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("cursos/vInsertar_curso",$data);
        $this->load->view("vistasParciales/footer.php");
    }
    

    public function actualizarCursoAccion(){
        $this->mLogin->verifica_sesion();

        $id = $this->input->get('id');
        if ( $this->validaForm() ){
            $param["nombre_es"]         = $this->input->post('nombre_es');
            $param["nombre_in"]         = $this->input->post('nombre_in');
            $param["descripcion_es"]    = $this->input->post('descripcion_es');
            $param["descripcion_in"]    = $this->input->post('descripcion_in');
            $param["resumen_es"]        = $this->input->post('resumen_es');
            $param["resumen_in"]        = $this->input->post('resumen_in');
            $param["pre_requisitos_es"] = $this->input->post('pre_requisitos_es');
            $param["pre_requisitos_in"] = $this->input->post('pre_requisitos_in');
            $param["activo"]            = $this->input->post('activo');
            $param["categoria"]         = $this->input->post('categoria');
            $param["nivel"]             = $this->input->post('nivel');
            $param["pais"]              = $this->input->post('pais');
            $param["longitud"]          = $this->input->post('longitud');
            $param["latitud"]           = $this->input->post('latitud');
            $param["instructor"]        = $this->input->post('instructor');
            $this->mCurso->actualizarCurso($id, $param);
            $data["result"]             = SUCCESS;
        }

        $data["listCurso"]          = $this->mCurso->listCurso($id);
        $data["listCategoria"]      = $this->mCategoria->listCategoria();
        $data["listNivel"]          = $this->mNivel->listNivel(); 
        $data["listPais"]           = $this->mPais->listPais();
        $data["listInstructores"]   = $this->mPersona->listInstructor(); 

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("cursos/vActualizar",$data);
        $this->load->view("vistasParciales/footer.php");
    }

    //Modificar una persona
	function adminActualizar(){
        $this->mLogin->verifica_sesion();

		$id = $this->input->get('id');

		if($id != NULL){
			$data["listCurso"] = $this->mCurso->listCurso($id);
		}else{
			$data["listCurso"] = NULL;
        }
        
        $data["listCategoria"]      = $this->mCategoria->listCategoria();
        $data["listNivel"]          = $this->mNivel->listNivel(); 
        $data["listPais"]           = $this->mPais->listPais();
        $data["listInstructores"]   = $this->mPersona->listInstructor(); 

        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuAdmin.php");
        $this->load->view("cursos/vActualizar",$data);
        $this->load->view("vistasParciales/footer.php");
	}

    //Modificando el estado del curso AJAX
	function cambioEstado(){
        $this->mLogin->verifica_sesion();
        
		$id = $this->input->post('id');
		$estado = $this->input->post('estado');
		echo $this->mCurso->cambioEstado($id, $estado);
	}


}
