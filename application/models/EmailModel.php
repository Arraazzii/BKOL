<?php
class EmailModel extends CI_Model
{
	
	var $config;
        
	function __construct()
        {
		parent::__construct();
		
                $this->config = Array(
                'protocol' => 'smtp',
                // 'smtp_host' => 'ssl://bkol.depok.go.id',
				'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 465,
                // 'smtp_user' => 'admin@bkol.depok.go.id',
                // 'smtp_pass' => 'Langitbiru1',
				'smtp_user' => 'disnakerdepok.bkol@gmail.com',
				'smtp_pass' => 'langitbiru',
                'mailtype' => 'html'
                );
	}
	
	function sendEmail($to, $subject, $msg)
        {
                $this->load->library('email', $this->config);
                $this->email->set_newline("\r\n");

                $this->email->from($this->config['smtp_user'], 'Disnaker Kota Depok');
                $this->email->to($to);

                $this->email->subject($subject);
                $this->email->message($msg);

                if ($this->email->send())
                {
                        return true;
                }
                else
                {
                        return $this->email->print_debugger();
                }
	}
	
}
