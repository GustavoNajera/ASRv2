<?php
/**
 * Controlador de la vista Sobre Nosotros
 */
class cSobreNosotros extends CI_Controller
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

    /**
     * PRINCIPAL
     */
    public function index(){
        
        //Se obtiene la empresa
		$data["empresaASR"]       = $this->mEmpresa->listEmpresaCliente($this->idioma);
        $data["listPalabras"]     = $this->mPalabras->listPalabrasCliente("sobre nosotros", $this->idioma);

        $listPalabrasTem = Array();
        foreach ($data["listPalabras"] as $palabra):
            $listPalabrasTem[ $palabra["palabra_key"] ]  =  $palabra["valor"];
        endforeach;
        $data["listPalabras"]     =   $listPalabrasTem;
        /***/

        
        $this->load->view("vistasParciales/head.php");
        $this->load->view("vistasParciales/menuClienteDet.php",$data);
        $this->load->view("sobreNosotros/v_detalle_sobre_nosotros");
        $this->load->view("vistasParciales/footer.php");
    }

}
