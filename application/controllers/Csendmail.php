<?php
class Csendmail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//configuracion para gmail
		$configGmail = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'tavinchi.com@gmail.com',
			'smtp_pass' => 'gustavo201095',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
			'wordwrap' => TRUE
		);

		//cargamos la libreria email de ci
		$this->load->library("email", $configGmail);
		
		//cargamos la configuración para enviar con gmail
		//$this->email->initialize($configGmail);

		$this->email->from('tavinchi.com@gmail.com');
		$this->email->to("tavinchi.com@gmail.com");
		$this->email->subject('Esto es una prueba á');
		$this->email->message('<h2>Correo con imagen</h2>
			<hr><br>
			Kurt Cobain
			<br>
			<h3>Click en la imagen y dale like a mi pagina :D</h3>'
			);


		//for ($i=1; $i <=1 ; $i++) { 
			if ($this->email->send()) {
				echo "Enviado by litokurt";
			}else{
				echo "<br><br><br><br><br> Segundo <br><br><br>";
				show_error($this->email->print_debugger());
			}
			sleep(1);
		//}
		
	}

}