<?php
/**
* Modelo de Estado de una persona
*/
class mEstado extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * OBTENER Estado de matricula
	 */
	public function listEstado($id = FALSE){
        if($id == FALSE){
			$r = $this->db->get("t_estado_matricula");
        }
        else{
            $this->db->select('*')->from('t_estado_matricula')->where('id',$id);;
            $r = $this->db->get();
        }

        return $r->result_array();
	}

	/**
	 * Valida si el estado de la matricula ha sido asignado a una matricula
	 */
	public function asignado($id){

		$this->db->select('COUNT(*) as asignaciones');
		$this->db->where('id', $id);
		return $this->db->get('t_expediente_general')->row()->asignaciones;
	}

	/**
	 * INSERTAR Estado de matricula
	 */
	public function isnertarEstado($param){

		$campos = array(
 			'nombre_es' => $param["nombre_es"],
            'nombre_in' => $param["nombre_in"]
		);

		$this->db->insert('t_estado_matricula', $campos);//Inserta el registro
	}

	/**
	 * Actualizar estado de matricula
	 */
	public function actualizarEstado($id_rol, $param){
		
		$campos = array(
            'nombre_es' => $param["nombre_es"],
           'nombre_in' => $param["nombre_in"]
       );

	   	$this->db->trans_start ();//BEGIN TRAN
	   	$this->db->where('id', $id_rol);
	   	$this->db->update('t_estado_matricula', $campos);
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)
		   		
		return $this->db->trans_status(); //Obtiene si ocurrio un error o no		
    }

    /**
	 * ELIMINAR estado de la matricula
	 */
	public function eliminarEstadoMatricula($id){
		$this->db->trans_start ();//BEGIN TRAN
		$this->db->delete('t_estado_matricula', array('id' => $id)); 
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)	
		$this->db->trans_status(); //Obtiene si ocurrio un error o no

		if(count($this->listEstado($id)) > 0){
			return false;
		}
		else{
			return true;
		}
	}
}