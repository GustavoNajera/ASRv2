<?php
/**
* Modelo de t_persona
*/
class mPersona extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	// Listado de personas para seccion del cliente
	public function listPersonaCliente($idioma = "ES", $id_persona = FALSE){
		if($idioma == "ES"){
			$rol = "r.nombre_es as rol";
		} else{
			$rol = "r.nombre_in as rol";
		}
		$this->db->select('p.id as id_persona, p.nombre, p.primer_apellido, p.segundo_apellido, p.cedula, p.activo, '.
						  'p.rol, p.fecha_nac, p.pais, p.pass, p.img, p.correo, p.numero, '.$rol.', r.id as id_rol');
		$this->db->from('t_persona p');
		$this->db->join('t_rol r', 'p.rol = r.id');
		$this->db->where('p.rol !=', "3");
		return $this->db->get()->result_array();
	}

	// Listado de personas
	public function listPersona($id_persona = null, $nombre = null, $apellido = null, $fecha_matriculado = null, $fecha_finalizado = null){
		$this->db->select('p.id as id_persona, p.nombre, p.primer_apellido, p.segundo_apellido, p.cedula, p.activo, p.rol, '.
		 'p.fecha_nac, p.pais, p.pass, p.img, p.correo, p.numero, r.nombre_es, r.id as id_rol');
		$this->db->from('t_persona p');
		
		if ($id_persona != null){
			$this->db->where('p.id', $id_persona);
		}
		if ($nombre != null){
			$this->db->where( ('p.nombre like "%' . $nombre . '%"') );
		}
		if($apellido != null){
			$this->db->where( ('p.primer_apellido like "%' . $apellido . '%" OR p.segundo_apellido like "%' . $apellido . '%"') );
		}

		if ($fecha_matriculado != null || $fecha_finalizado != null){
			if($fecha_matriculado != null){
				$this->db->where('e.fecha_matriculado >= "' . $fecha_matriculado . '"');
			}
			if($fecha_finalizado != null){
				$this->db->where('e.fecha_finalizado <= "' . $fecha_finalizado . '" AND e.fecha_finalizado != "0000-00-00"');
			}
			$this->db->join('t_expediente_general e', 'e.persona = p.id');
		}

		$this->db->group_by('p.id');
		$this->db->join('t_rol r', 'p.rol = r.id');
		$r = $this->db->get();
		return $r->result_array();
	}

	// Listado de instructores
	public function listInstructor($id_persona = FALSE){
		$this->db->select('p.id as id_persona, p.nombre, p.primer_apellido, p.segundo_apellido, p.cedula, p.activo, p.rol, '.
		 'p.fecha_nac, p.pais, p.pass, p.img, p.correo, p.numero, r.nombre_es, r.id as id_rol');
		$this->db->from('t_persona p');

		if($id_persona == FALSE){
			$this->db->order_by("p.nombre", "asc");	
		} else{
			$this->db->where('p.id', $id_persona);
		}
		$this->db->where('p.rol', 2); //Dos es instructor
		$this->db->join('t_rol r', 'p.rol = r.id');
		$r = $this->db->get();
		return $r->result_array();
	}

	// Inserta Persona
	public function isertarPersona($param){
		$campos = array(
 			'nombre' 			=> $param["nombre"],
 			'primer_apellido'   => $param["primer_apellido"],
 			'segundo_apellido'  => $param["segundo_apellido"],
			'cedula' 			=> $param["cedula"],
			'activo' 			=> $param["activo"],
			'img' 				=> $param["img"],
			'fecha_nac' 		=> $param["fecha_nac"],
			'pais' 				=> $param["pais"],
			'pass' 				=> $param["pass"],
			'rol' 				=> $param["rol"],
			'correo' 			=> $param["correo"],
			'numero' 			=> $param["numero"]
		);
		$this->db->insert('t_persona', $campos);
		$id_persona = $this->db->insert_id();
		return true;
	}

	// Actualiza estado de la persona
	public function cambioEstado($id_persona, $estado){
		$this->db->trans_start ();
		$this->db->set('activo', $estado);
		$this->db->where('id', $id_persona);
		$this->db->update('t_persona');
		$this->db->trans_complete ();
		
		return $this->db->trans_status();
	}

	// Actualiza una persona
	public function actualizarPersona($id_persona, $param){
		$campos = array(
			'nombre' 			=> $param["nombre"],
			'primer_apellido' 	=> $param["primer_apellido"],
			'segundo_apellido' 	=> $param["segundo_apellido"],
		   'cedula' 			=> $param["cedula"],
		   'activo' 			=> $param["activo"],
		   'img' 				=> $param["img"],
		   'fecha_nac' 			=> $param["fecha_nac"],
		   'pais' 				=> $param["pais"],
		   'rol' 				=> $param["rol"],
		   'correo' 			=> $param["correo"],
		   'numero' 			=> $param["numero"]
	    );
		if($param["pass"] != ""){
			$campos['pass'] = $param["pass"];
		}

	   	$this->db->trans_start ();
	   	$this->db->where('id', $id_persona);
	   	$this->db->update('t_persona', $campos);
		$this->db->trans_complete ();
		return $this->db->trans_status();		
	}

}// Fin de la clase