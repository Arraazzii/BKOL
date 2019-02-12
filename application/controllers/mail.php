<?php 

class Mail extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		// Configure email library
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'disnakerdepok.bkol@gmail.com';
		$config['smtp_pass'] = 'langitbiru';

		$this->load->library('email', $config);
		$this->email->set_newline("rn");

		// Sender email address
		$this->email->from('Disnaker Depok', 'disnakerdepok.bkol@gmail.com');
		// Receiver email address
		$this->email->to('sanoval.awwalin@gmail.com');
		// Subject of email
		$this->email->subject('testing');
		// Message in email
		$this->email->message('testing aja ini wa');
		di(json_encode($this->email));
		if ($this->email->send()) {
			$data['message_display'] = 'Email Successfully Send !';
		} else {
			$data['message_display'] =  '<p class="error_msg">Invalid Gmail Account or Password !</p>';
		}
		echo json_encode($data);
		phpinfo();
	}
}