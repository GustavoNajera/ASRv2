<?php
/**
* Modelo de Caracteristicas de cursos
*/
class mCaractCurso extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/********************
	 * Seccion Cliente
	 ********************/
	public function listCaractCliente($curso = false, $idioma = "ES"){
		if (strtoupper($idioma) == "ES"){
			$this->db->select('id, nombre_es as nombre, descri_es as descri');
		}else{
			$this->db->select('id, nombre_in as nombre, descri_in as descri');
		}

		if($curso != false){
			$this->db->where('curso', $curso);
		}
		return $this->db->get("t_caract_curso")->result_array();
	}


	/***************************
	 * Seccion administrativa
	 ***************************/
	
	 /**
	 * GET Caracteristicas
	 */
	public function listCaract($curso = false){
		if($curso != false){
			$this->db->where('curso', $curso);
		}
		return $this->db->get("t_caract_curso")->result_array();
	}

	/**
	 * INSERT Caracteristica
	 */
	public function insertarCaract($param){

		$campos = array(
 			'nombre_es'  => $param["nombre_es"]
			,'nombre_in' => $param["nombre_in"]
			,'descri_es' => $param["descri_es"]
			,'descri_in' => $param["descri_in"]
			,'curso'     => $param["curso"]
		);

		$this->db->insert('t_caract_curso', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una caracteristica
	 */
	public function actualizarCaract($id, $param){
		$campos = array(
			'nombre_es'  => $param["nombre_es"]
		   ,'nombre_in' => $param["nombre_in"]
		   ,'descri_es' => $param["descri_es"]
		   ,'descri_in' => $param["descri_in"]
		   ,'curso'     => $param["curso"]
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_caract_curso', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar una caracteristica
	 */
	public function eliminarCaract($id){
		$this->db->trans_start ();
		$this->db->delete('t_caract_curso', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}