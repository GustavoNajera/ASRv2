<?php
/**
* Modelo de t_img
*/
class mImgCarousel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	
	//Listado de imagenes para el lado del cliente
	public function listImgCliente($idioma = "ES"){
		if($idioma == "ES"){
			$this->db->select('id, desc_es as desc, titulo_es as titulo, ruta');
		} else{
			$this->db->select('id, desc_in as desc, titulo_in as titulo, ruta');
		}
		$this->db->from('t_img');
		return $this->db->get()->result_array();
	}

	// Lista de imagenes
	public function listImgAdm(){
		return $this->db->get("t_img")->result_array();
	}

	// Ingresa una imagen
	public function insertaImg($param){
		$campos = array(
 			'desc_es'    => $param["desc_es"]
 			,'desc_in'   => $param["desc_in"]
			,'ruta'      => $param["img"]
			,'titulo_es' => $param["titulo_es"]
			,'titulo_in' => $param["titulo_in"]
        );
		$this->db->insert('t_img', $campos);
	}
	
	// Actualiza una imagen
	public function actualizaImg($id_img, $param) {
		$campos = array(
			'desc_es'    => $param["desc_es"]
 			,'desc_in'   => $param["desc_in"]
 			,'ruta'      => $param["img"]
			,'titulo_es' => $param["titulo_es"]
			,'titulo_in' => $param["titulo_in"]
	    );
	   	$this->db->where('id', $id_img);
	   	$this->db->update('t_img', $campos);		   		
		return true;
    }
    
    // Elimina imagen
    public function eliminaImg($id){
		$this->db->delete('t_img', array('id' => $id)); 
		return true;
    }
    
}//Fin clase