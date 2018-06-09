
<?php
/**
* Modelo de Expediente de retiro de titulos
*/
class mExpedienteRetiroTitulo extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * GET Expediente Retiro de Titulos
	 */
	public function listExpediente($id = false){
		if($id != false){
			$this->db->where('id', $id);
			return $this->db->get("t_expediente_retiro_titulo")->row();
		}
		else{
			return $this->db->get("t_expediente_retiro_titulo")->result_array();
		}
		
	}

	/**
	 * INSERT  Expediente Retiro de Titulos
	 */
	public function insertarExpediente($param){

		$campos = array(
 			'fecha_retiro' => $param["fecha_retiro"],
			'medio_retiro' => $param["medio_retiro"],
			'detalle' => $param["detalle"],
            'persona_origen' => $param["persona_origen"],
            'curso' => $param["curso"]
		);

		$this->db->insert('t_expediente_retiro_titulo', $campos);
        $id_persona = $this->db->insert_id();
        
		return true;
	}

	/**
	 * Actualizar una  Expediente Retiro de Titulos
	 */
	public function actualizarExpediente($id, $param){
		$campos = array(
            'fecha_retiro' => $param["fecha_retiro"],
           'medio_retiro' => $param["medio_retiro"],
           'detalle' => $param["detalle"],
           'persona_origen' => $param["persona_origen"],
           'curso' => $param["curso"]
       );

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id);
	   	$this->db->update('t_expediente_retiro_titulo', $campos);
		$this->db->trans_complete ();
		   		
        return $this->db->trans_status();
        return true;
	}

	/**
	 * Eliminar una  Expediente Retiro de Titulos
	 */
	public function eliminarExpediente($id){
		$this->db->trans_start ();
		$this->db->delete('t_expediente_retiro_titulo', array('id' => $id));
		$this->db->trans_complete ();
		$this->db->trans_status();

		return true;
	}
}