
<?php
/**
* Modelo de Expediente general
*/
class mExpedienteGeneral extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**************************************/
    /*              Cliente               */
	/**************************************/

	public function listMatriculaCliente($id = null){
		$this->db->select('eg.id, eg.fecha_matriculado, eg.fecha_finalizado, eg.detalle, eg.persona
						  ,c.nombre_es as curso, e.nombre_es as estado, eg.titulo');
		$this->db->from('t_expediente_general eg');
		$this->db->join("t_curso c", "c.id = eg.curso");
		$this->db->join("t_estado_matricula e", "e.id = eg.estado");
		if($id != null){
			$this->db->where('eg.persona', $id);	
		}
		return $this->db->get()->result_array();
	}

	/**************************************/
    /*           Administrador            */
	/**************************************/
	
	/**
	 * GET Expediente General
	 */
	public function listExpediente($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_expediente_general")->row();
		}
		else{
			return $this->db->get("t_expediente_general")->result_array();
		}
		
	}

	/**
	 * INSERT  Expediente General
	 */
	public function insertarExpediente($param){

		$campos = array(
 			'persona' => $param["persona"],
			'curso' => $param["curso"],
			'fecha_matriculado' => $param["fecha_matriculado"],
            'fecha_finalizado' => $param["fecha_finalizado"],
            'estado' => $param["estado"],
			'detalle' => $param["detalle"]
		);

		$this->db->insert('t_expediente_general', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una  Expediente General
	 */
	public function actualizarExpediente($id, $param){
		$campos = array(
            'persona' => $param["persona"],
            'curso' => $param["curso"],
            'fecha_matriculado' => $param["fecha_matriculado"],
            'fecha_finalizado' => $param["fecha_finalizado"],
            'estado' => $param["estado"],
            'detalle' => $param["detalle"],
			'titulo' => $param["titulo"]
       );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_expediente_general', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar un Expediente General
	 */
	public function eliminarExpediente($id){
		$this->db->trans_start ();
		$this->db->delete('t_expediente_general', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}