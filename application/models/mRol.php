<?php
/**
* Modelo de Persona
*/
class mRol extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * OBTENER Rol
	 */
	public function listRol($id = FALSE){
        //$this->db->select('*')->from('t_rol');
        if($id == FALSE){
			$r = $this->db->get("t_rol");
        }
        else{
            $this->db->select('*')->from('t_rol')->where('id',$id);;
            $r = $this->db->get();
        }

        return $r->result_array();
	}

	/**
	 * Valida si el rol ha sido asignado
	 */
	public function asignado($id_rol){

		$this->db->select('COUNT(*) as asignaciones');
		$this->db->where('rol', $id_rol);
		return $this->db->get('t_persona')->row()->asignaciones;
	}

	/**
	 * INSERTAR Rol
	 */
	public function isnertarRol($param){

		$campos = array(
 			'nombre_es' => $param["nombre_es"],
 			'nombre_in' => $param["nombre_in"],
		);

		$this->db->insert('t_rol', $campos);//Inserta el registro
	}

	/**
	 * ELIMINAR Rol
	 */
	public function eliminarRol($id){
		$this->db->trans_start ();//BEGIN TRAN
		$this->db->delete('t_rol', array('id' => $id)); 
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)	
		$this->db->trans_status(); //Obtiene si ocurrio un error o no

		if(count($this->listRol($id)) > 0){
			return false;
		}
		else{
			return true;
		}
	}

	/**
	 * Actualizar una persona
	 */
	public function actualizarRol($id_rol, $param){
		
		$campos = array(
			'nombre_es' => $param["nombre_es"],
			'nombre_in' => $param["nombre_in"]
	   );

	   	$this->db->trans_start ();//BEGIN TRAN
	   	$this->db->where('id', $id_rol);
	   	$this->db->update('t_rol', $campos);
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)
		   		
		return $this->db->trans_status(); //Obtiene si ocurrio un error o no		
	}
}