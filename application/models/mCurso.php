
<?php
/**
* Modelo de Curso
*/
class mCurso extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	/******************************************
	 * Lista de cursos para lado de cliente
	 *****************************************/
	public function listCursoCliente($idioma = "ES", $idCurso = 'null'){

		//Si es listado se ordena, si es una persona se hace el filtrado
		if($idioma == "ES"){
			$this->db->select('c.id, c.nombre_es as nombre, c.descripcion_es as descripcion
					,c.resumen_es as resumen, c.pre_requisitos_es as pre_requisitos
					,ca.nombre_es as categoria, n.nombre_es as nivel, ca.img as img
					,p.nombre as pais, longitud, latitud, per.nombre as instructor');
		}
		else{
			$this->db->select('c.id, c.nombre_in as nombre, c.descripcion_in as descripcion
					,c.resumen_in as resumen, c.pre_requisitos_in as pre_requisitos
					,ca.nombre_in as categoria, n.nombre_in as nivel, ca.img as img
					,p.nombre as pais, longitud, latitud, per.nombre as instructor');
		}

		$this->db->from('t_curso c');
		$this->db->join("t_nivel n", "n.id = c.nivel");
		$this->db->join("t_categoria ca", "ca.id = c.categoria");
		$this->db->join("t_pais p", "p.id = c.pais");
		$this->db->join("t_persona per", "per.id = c.instructor");
		$this->db->where('c.id = IFNULL('.$idCurso.', c.id) and c.activo =', true);
		return $this->db->get()->result_array();
		
	}


	/**
	 * GET Curso
	 */
	public function listCurso($id = false){

		//Si es listado se ordena, si es una persona se hace el filtrado
		if($id != false){
			$this->db->select('*');
			$this->db->from('t_curso');
			$this->db->where('id', $id);

			return $this->db->get()->result_array();
		}
		else{
			return $this->db->get("t_curso")->result_array();
		}
		
	}

	/**
	 * INSERT Curso
	 */
	public function insertarCurso($param){

		$campos = array(
			'nombre_es' 		=> $param["nombre_es"],
			'nombre_in' 		=> $param["nombre_in"],
			'descripcion_es' 	=> $param["descripcion_es"],
		   'descripcion_in' 	=> $param["descripcion_in"],
		   'resumen_es' 		=> $param["resumen_es"],
		   'resumen_in' 		=> $param["resumen_in"],
		   'pre_requisitos_es'	=> $param["pre_requisitos_es"],
		   'pre_requisitos_in' 	=> $param["pre_requisitos_in"],
		   'activo' 			=> $param["activo"],
		   'categoria' 			=> $param["categoria"],
		   'nivel' 				=> $param["nivel"],
		   'pais' 				=> $param["pais"],
		   'longitud' 			=> $param["longitud"],
		   'latitud' 			=> $param["latitud"],
		   'instructor' 		=> $param["instructor"]
	   );

		$this->db->insert('t_curso', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar estado de un curso
	 */
	public function cambioEstado($id, $estado){
		$this->db->trans_start ();//BEGIN TRAN
		$this->db->set('activo', $estado);
		$this->db->where('id', $id);
		$this->db->update('t_curso');
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)
		
		return $this->db->trans_status(); //Obtiene si ocurrio un error o no		
	}

	/**
	 * Actualizar una persona
	 */
	public function actualizarCurso($id, $param){

		$campos = array(
			'nombre_es' 		=> $param["nombre_es"],
			'nombre_in' 		=> $param["nombre_in"],
			'descripcion_es' 	=> $param["descripcion_es"],
		   'descripcion_in' 	=> $param["descripcion_in"],
		   'resumen_es' 		=> $param["resumen_es"],
		   'resumen_in' 		=> $param["resumen_in"],
		   'pre_requisitos_es' 	=> $param["pre_requisitos_es"],
		   'pre_requisitos_in' 	=> $param["pre_requisitos_in"],
		   'activo' 			=> $param["activo"],
		   'categoria' 			=> $param["categoria"],
		   'nivel' 				=> $param["nivel"],
		   'pais' 				=> $param["pais"],
		   'longitud' 			=> $param["longitud"],
		   'latitud' 			=> $param["latitud"],
		   'instructor' 		=> $param["instructor"]
	   );

	   	$this->db->trans_start ();//BEGIN TRAN
	   	$this->db->where('id', $id);
	   	$this->db->update('t_curso', $campos);
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)
		   		
        return $this->db->trans_status(); //Obtiene si ocurrio un error o no	*/
        return true;	
	}
}