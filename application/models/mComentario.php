
<?php
/**
* Modelo de Comentario
*/
class mComentario extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Listado de comentarios para el lado del cliente
	public function listComentarioCliente(){
		$this->db->select('c.id, c.comentario, p.id as id_persona, p.nombre, p.primer_apellido, p.img');
        $this->db->from('t_comentario c');
        $this->db->join("t_persona p", "p.id = c.persona");
		return $this->db->get()->result_array();
	}
	

	// Inserta una comentario
	public function insertarComentario($param){
		$campos = array(
			'comentario'   => $param["comentario"]
		    ,'persona'     => $param["persona"]
	   );
		$this->db->insert('t_comentario', $campos);
        $id = $this->db->insert_id();
		return true;
	}
	
}// Fin clase