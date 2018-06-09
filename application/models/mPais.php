
<?php
/**
* Modelo de Pais
*/
class mPais extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET Pais
	 */
	public function listPais($id = false){

		if($id != false){
			$this->db->select('*');
			$this->db->from('t_pais');
			$this->db->where('id', $id);

			return $this->db->get()->result_array();
		}
		else{
			return $this->db->get("t_pais")->result_array();
		}
		
	}

	/**
	 * Verifica si el nivel ha sido asignado a un pais
	 */
	public function asignado($id){

		$this->db->select('COUNT(*) as asignaciones');
		$this->db->where('pais', $id);
		return $this->db->get('t_curso')->row()->asignaciones;
	}

	/**
	 * INSERT Pais
	 */
	public function insertarPais($param){

		$campos = array(
			'nombre' => $param["nombre"]
	   );

		$this->db->insert('t_pais', $campos);
        $id = $this->db->insert_id();
		return true;
	}

	/**
	 * Actualizar una pais
	 */
	public function actualizarPais($id, $param){
		$campos = array(
			'nombre' => $param["nombre"]
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_pais', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;	
	}
	
	/**
	 * Eliminar una pais
	 */
	public function eliminarPais($id){
		$this->db->trans_start ();
		$this->db->delete('t_pais', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}