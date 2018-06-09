
<?php
/**
* Modelo de Caracteristicas de categorias
*/
class mCaractCat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET Caracteristicas cliente
	 */
	public function listCaractCliente($categoria = false, $idioma = "ES"){
		if (strtoupper($idioma) == "ES"){
			$this->db->select('id, nombre_es as nombre');
		}else{
			$this->db->select('id, nombre_in as nombre');
		}

		if($categoria != false){
			$this->db->where('categoria', $categoria);
		}
		return $this->db->get("t_caract_categoria")->result_array();
	}


	/**
	 * GET Caracteristicas
	 */
	public function listCaract($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_caract_categoria")->row();
		}
		else{
			return $this->db->get("t_caract_categoria")->result_array();
		}
		
	}

	/**
	 * INSERT Caracteristica
	 */
	public function insertarCaract($param){

		$campos = array(
 			'nombre_es' => $param["nombre_es"],
			'nombre_in' => $param["nombre_in"],
			'categoria' => $param["categoria"]
		);

		$this->db->insert('t_caract_categoria', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una caracteristica
	 */
	public function actualizarCaract($id, $param){
		$campos = array(
			'nombre_es' => $param["nombre_es"],
		   'nombre_in' => $param["nombre_in"],
		   'categoria' => $param["categoria"]
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_caract_categoria', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar una caracteristica
	 */
	public function eliminarCaract($id){
		$this->db->trans_start ();
		$this->db->delete('t_caract_categoria', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}