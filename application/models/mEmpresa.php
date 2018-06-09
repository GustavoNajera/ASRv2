<?php
/**
* Modelo de Empresa
*/
class mEmpresa extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	/*************************
	 * CLIENTE
	 ************************/

	/**
	 * GET EMPRESA
	 */
	public function listEmpresaCliente($idioma = "ES"){

		//Si es listado se ordena, si es una persona se hace el filtrado
		if($idioma == "ES"){
			$this->db->select('id, nombre, mision_es as mision, vision_es as vision, numero, correo
								,historia_es as historia, experiencia_es as experiencia
								,horario_atencion_es as horario_atencion, logo_es as logo');
		}
		else{
			$this->db->select('id, nombre, mision_in as mision, vision_in as vision, numero, correo
								,historia_in as historia, experiencia_in as experiencia
								,horario_atencion_in as horario_atencion, logo_in as logo');
		}
		$this->db->from('t_empresa');
		return $this->db->get()->row();
	}
	/**
	 * Obtener el logo
	 */
	
	/*
	public function obtenerLogoCliente($idioma = "ES"){

		//Si es listado se ordena, si es una persona se hace el filtrado
		if($idioma == "ES"){
			$this->db->select('logo_es as logo');
		}
		else{
			$this->db->select('logo_in as logo');
		}
		$this->db->from('t_empresa');
		return $this->db->get()->row();
	}
	*/

	/*********************
	 * ADMINISTRATIVO
	 **********************/


	/**
	 * GET EMPRESA
	 */
	public function listEmpresa(){
		$r = $this->db->get("t_empresa");
		return $r->result_array();
	}

	/**
	 * Actualizar una empresa
	 */
	public function actualizarEmpresa($id_empresa, $param){
		
		$campos = array(
            "nombre" => $param['nombre'],
            "mision_es" => $param['mision_es'],
            "mision_in" => $param['mision_in'],
            "vision_es" => $param['vision_es'],
            "vision_in" => $param['vision_in'],
            "historia_es" => $param['historia_es'],
            "historia_in" => $param['historia_in'],
            "experiencia_es" => $param['experiencia_es'],
            "experiencia_in" => $param['experiencia_in'],
            "horario_atencion_es" => $param['horario_atencion_es'],
            "horario_atencion_in" => $param['horario_atencion_in'],
            "logo_es" => $param['logo_es'],
            "logo_in" => $param['logo_in'],
			'correo' => $param["correo"],
			'numero' => $param["numero"]
	   );

	   	$this->db->trans_start ();//BEGIN TRAN
	   	$this->db->where('id', $id_empresa);
	   	$this->db->update('t_empresa', $campos);
		$this->db->trans_complete ();//COMMIT (En caso de ocurrir un error hace el rollback)
		   		
		return $this->db->trans_status(); //Obtiene si ocurrio un error o no		
	}
}