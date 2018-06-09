
<?php
/**
* Modelo de Categoria
*/
class mCategoria extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Listado de im de para seccion del cliente
	public function listCatCliente($idioma = "ES"){
		if($idioma == "ES"){
			$this->db->select('id, nombre_es as nombre, img');
		} else{
			$this->db->select('id, nombre_in as nombre, img');
		}
		$this->db->from('t_categoria');
		return $this->db->get()->result_array();
	}
	
	// Lista de categorias
	public function listCategoria($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_categoria")->row();
		}
		else{
			return $this->db->get("t_categoria")->result_array();
		}
	}
	
	public function asignado($id_rol){
		$this->db->select('COUNT(*) as asignaciones');
		$this->db->where('rol', $id_rol);
		return $this->db->get('t_persona')->row()->asignaciones;
	}

	// Inserta una categoria
	public function insertarCategoria($param){
		$campos = array(
			'nombre_es'    => $param["nombre_es"]
		    ,'nombre_in'   => $param["nombre_in"]
		    ,'img'         => $param["img"]
	   );
		$this->db->insert('t_categoria', $campos);
        $id = $this->db->insert_id();
		return true;
	}

	//Actualiza una categoria
	public function actualizarCategoria($id, $param){
		$campos = array(
			'nombre_es'    => $param["nombre_es"]
		    ,'nombre_in'   => $param["nombre_in"]
		    ,'img'         => $param["img"]
	   );
	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_categoria', $campos);
		$this->db->trans_complete ();
        return $this->db->trans_status();
	}
	
	// Elimina una categoria
	public function eliminarCategoria($id){
		$this->db->trans_start ();
		$this->db->delete('t_categoria', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();
		return true;
	}
}