<?php
/**
 * Controlador de la vista principal
 */
class cPrincipal extends CI_Controller
{
    private $idioma;
    function __construct(){
        parent::__construct();
        $iTem = $this->idioma = $this->session->userdata('idioma');
        if($iTem == null){
            $iTem = "ES";
        }
        $this->idioma = $iTem;
    }

    /*
    * Respaldo 
    */
    public function respaldo($result = null){
        $data["listImgCarousel"]     = $this->mImgCarousel->listImgCliente($this->idioma);
        $data["listCategoria"]       = $this->mCategoria->listCatCliente($this->idioma);
        $data["listInvolucrados"]    = $this->mPersona->listPersonaCliente($this->idioma);
        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listEmpresaAsociada"] = $this->mEmpresaAsociada->listEmpresaCliente($this->idioma);
        $data["listComentario"]      = $this->mComentario->listComentarioCliente();
        $data["listPalabras"]        = $this->mPalabras->listPalabrasCliente("inicio", $this->idioma);

        /****/
        $listCategoria = Array();
        foreach ($data["listCategoria"] as $categoria):
            $listCaract = $this->mCaractCat->listCaractCliente($categoria["id"],$this->idioma);
            $listCategoria[] = array("categoria"       => $categoria
                                  ,"listCaract"        => $listCaract);
        endforeach;
        $data["listCategoria"] = $listCategoria;

        /****/
        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $listPalabrasTem["logo"]  = $this->mEmpresa->obtenerLogoCliente($this->idioma)->logo;
        $data["listPalabras"]     =   $listPalabrasTem;
        
        /****/
        if ($result != null){
            $data["result"] = $result;
        }
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuCliente.php", $data);
        $this->load->view("respaldo Principal");
        $this->load->view("vistasParciales/footer.php");
    }

    /**
     * PRINCIPAL
     */
    public function index($result = null){
        $data["listImgCarousel"]     = $this->mImgCarousel->listImgCliente($this->idioma);
        $data["listCategoria"]       = $this->mCategoria->listCatCliente($this->idioma);
        $data["listInvolucrados"]    = $this->mPersona->listPersonaCliente($this->idioma);
        $data["empresaASR"]          = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listEmpresaAsociada"] = $this->mEmpresaAsociada->listEmpresaCliente($this->idioma);
        $data["listComentario"]      = $this->mComentario->listComentarioCliente();
        $data["listPalabras"]        = $this->mPalabras->listPalabrasCliente("inicio", $this->idioma);
        $data["listCursos"]          = $this->mCurso->listCursoCliente($this->idioma);

        /****/
        $listCategoria = Array();
        foreach ($data["listCategoria"] as $categoria):
            $listCaract = $this->mCaractCat->listCaractCliente($categoria["id"],$this->idioma);
            $listCategoria[] = array("categoria"       => $categoria
                                  ,"listCaract"        => $listCaract);
        endforeach;
        $data["listCategoria"] = $listCategoria;

        /****/
        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;
        
        /****/
        if ($result != null){
            $data["result"] = $result;
        }
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuCliente.php", $data);
        $this->load->view("vPrincipal");
        $this->load->view("vistasParciales/footer.php");
    }


    // Insertar un comentario
    public function insertarComentarioAccion(){
        $id = $this->mLogin->verifica_sesion();
        $param["comentario"] = $this->input->post('comentario');
        $param["persona"] = $id;
        $this->mComentario->insertarComentario($param);
        $this->index("Se ha realizado con éxito");
    }

}
