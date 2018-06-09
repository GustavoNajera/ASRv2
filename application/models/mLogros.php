
<?php
/**
* Modelo de Logros
*/
class mLogros extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET logros
	 */
	public function listLogros($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_logros")->row();
		}
		else{
			return $this->db->get("t_logros")->result_array();
		}
		
	}

	/**
	 * INSERT  logros
	 */
	public function insertarLogro($param){

		$campos = array(
 			'nombre_es' => $param["nombre_es"],
			'nombre_in' => $param["nombre_in"],
			'descripcion_es' => $param["descripcion_es"],
			'descripcion_in' => $param["descripcion_in"],
		);

		$this->db->insert('t_logros', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una  logros
	 */
	public function actualizarLogro($id, $param){
		$campos = array(
            'nombre_es' => $param["nombre_es"],
           'nombre_in' => $param["nombre_in"],
           'descripcion_es' => $param["descripcion_es"],
           'descripcion_in' => $param["descripcion_in"],
       );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_logros', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar una  logros
	 */
	public function eliminarLogro($id){
		$this->db->trans_start ();
		$this->db->delete('t_logros', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}