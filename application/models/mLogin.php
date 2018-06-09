<?php
/**
 * Modelo de Login
 */
class mLogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function verifica_sesion(){
        $id = $this->session->userdata('id');
        if($id == null){
            redirect('cLogin');
        }else{
            return $id;
        }

    }
    
    // Loguear
    public function loguear($param)
    {
        $resultado = $this->db->get_where(
            "t_persona p",
             array(
                 "p.correo" => $param["correo"], 
                 "p.pass"   => $param["pass"],
                 "p.activo" => "1"
                 )
        );

        if($resultado->num_rows() == 1){
            $result = $resultado->row();

            //SESION
            $s_usuario = array(
                'rol'    => $result->rol,
                'id'     => $result->id,
                'nombre' => $result->nombre,
                'pass'   => $result->pass
            );
            $this->session->set_userdata($s_usuario);//Guarda en sesion
            return true;
        }
        else{
            return false;
        }
    }

    // Cerrar sesion
    public function logout() {
        unset(
            $_SESSION['rol'],
            $_SESSION['id'],
            $_SESSION['nombre'],
            $_SESSION['pass']
        );
        // $this->session->sess_destroy();
        return true;
    }
}
