
<?php
/**
* Modelo de Palabras para internacionalizacion
*/
class mPalabras extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Lista de palabras por vista
	public function listPalabrasCliente($vista, $idioma = "ES"){
        if (strtoupper($idioma) == "ES"){
			$this->db->select('palabra_key, valor_es as valor');
		}else{
			$this->db->select('palabra_key, valor_in as valor');
		}		
        $this->db->or_where_in("vista", array($vista,'all') );
        return $this->db->get("t_palabras")->result_array();
	}

	// Lista de palabras por vista
	public function listPalabras($vista = null){
		$this->db->select('id, palabra_key, valor_es, valor_in, vista');
		if($vista != null){
			$this->db->where('vista', $vista);
		}
		$this->db->order_by("vista", "asc");
        return $this->db->get("t_palabras")->result_array();
	}

	// Lista de vistas
	public function listVistas(){
		$this->db->select('DISTINCT(vista)');
        return $this->db->get("t_palabras")->result_array();
	}
	
	// Actualizar palabra
	public function actualizarPalabra($id, $param){
		$campos = array(
			'valor_es'   => $param["valor_es"]
			,'valor_in'  => $param["valor_in"]
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_palabras', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
	}
}