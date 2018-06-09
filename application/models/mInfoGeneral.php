
<?php
/**
* Modelo de Informacion General
*/
class mInfoGeneral extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	/*******************
	 * CLIENTE
	 *******************/
	public function listInfoGeneralCliente($idioma = "ES"){
		//Si es listado se ordena, si es una persona se hace el filtrado
		if($idioma == "ES"){
			$this->db->select('nombre_es as nombre, descripcion_es as descripcion');
		}else{
			$this->db->select('nombre_in as nombre, descripcion_in as descripcion');
		}
		$this->db->from('t_info_general_empresa');
		return $this->db->get()->result_array();
	}

	/*****************
	 * ADMIN
	 *****************/
	/**
	 * GET informacion general de la empresa
	 */
	public function listInfoGeneral($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_info_general_empresa")->row();
		}
		else{
			return $this->db->get("t_info_general_empresa")->result_array();
		}
		
	}

	/**
	 * INSERT  informacion general de la empresa
	 */
	public function insertarInfoGeneral($param){

		$campos = array(
 			'nombre_es' => $param["nombre_es"],
			'nombre_in' => $param["nombre_in"],
			'descripcion_es' => $param["descripcion_es"],
			'descripcion_in' => $param["descripcion_in"],
		);

		$this->db->insert('t_info_general_empresa', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una  informacion general de la empresa
	 */
	public function actualizarInfoGeneral($id, $param){
		$campos = array(
            'nombre_es' => $param["nombre_es"],
           'nombre_in' => $param["nombre_in"],
           'descripcion_es' => $param["descripcion_es"],
           'descripcion_in' => $param["descripcion_in"],
       );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_info_general_empresa', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar una  informacion general de la empresa
	 */
	public function eliminarInfoGeneral($id){
		$this->db->trans_start ();
		$this->db->delete('t_info_general_empresa', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}