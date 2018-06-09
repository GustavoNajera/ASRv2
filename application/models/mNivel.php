
<?php
/**
* Modelo de Nivel
*/
class mNivel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET Nivel
	 */
	public function listNivel($id = false){

		if($id != false){
			$this->db->select('*');
			$this->db->from('t_nivel');
			$this->db->where('id', $id);

			return $this->db->get()->result_array();
		}
		else{
			return $this->db->get("t_nivel")->result_array();
		}
		
	}

	/**
	 * Verifica si el nivel ha sido asignado a un curso
	 */
	public function asignado($id){

		$this->db->select('COUNT(*) as asignaciones');
		$this->db->where('nivel', $id);
		return $this->db->get('t_curso')->row()->asignaciones;
	}

	/**
	 * INSERT Nivel
	 */
	public function insertarNivel($param){

		$campos = array(
			'nombre_es' => $param["nombre_es"],
		   'nombre_in' => $param["nombre_in"]
	   );

		$this->db->insert('t_nivel', $campos);
        $id = $this->db->insert_id();
		return true;
	}

	/**
	 * Actualizar una nivel
	 */
	public function actualizarNivel($id, $param){
		$campos = array(
			'nombre_es' => $param["nombre_es"],
		   'nombre_in' => $param["nombre_in"]
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_nivel', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;	
	}
	
	/**
	 * Eliminar una nivel
	 */
	public function eliminarNivel($id){
		$this->db->trans_start ();
		$this->db->delete('t_nivel', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}