<?php
/**
* Modelo de Empresa sociada
*/
class mEmpresaAsociada extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Lista de empresas asociadas para la seccion del cliente
	public function listEmpresaCliente($idioma = "ES"){
		if($idioma == "ES"){
			$this->db->select('id, nombre, descripcion_es as descripcion, enlace, img');
		} else{
			$this->db->select('id, nombre, descripcion_in as descripcion, enlace, img');
		}
		$this->db->from('t_empresa_asociada');
		return $this->db->get()->result_array();
	}

	/**
	 * GET EMPRESA
	 */
	public function listEmpresa(){
		$r = $this->db->get("t_empresa_asociada");
		return $r->result_array();
	}

	/**
	 * Actualizar una empresa
	 */
	public function actualizarEmpresa($id_empresa, $param){
		
		$campos = array(
            "nombre"           => $param['nombre'],
            "descripcion_es"   => $param['descripcion_es'],
            "descripcion_in"   => $param['descripcion_in'],
            "enlace"           => $param['enlace'],
			"img"              => $param['img']
	   );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id_empresa);
	   	$this->db->update('t_empresa_asociada', $campos);
		$this->db->trans_complete ();
		   		
		return $this->db->trans_status();
	}

	
	/**
	 * Eliminar empresa asociada
	 */
	public function eliminarEmpresa($id){
		$this->db->trans_start ();//BEGIN TRAN
		$this->db->delete('t_empresa_asociada', array('id' => $id)); 
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)	
		$this->db->trans_status(); //Obtiene si ocurrio un error o no

		return true;
	}

	/**
	 * Insertar empresa
	 */
	public function insertaEmpresa($param){
		$campos = array(
            "nombre"           => $param['nombre'],
            "descripcion_es"   => $param['descripcion_es'],
            "descripcion_in"   => $param['descripcion_in'],
			"enlace"           => $param['enlace'],
			"img"              => $param['img']
	   );

	   $this->db->insert('t_empresa_asociada', $campos);
		return true;
	}
}