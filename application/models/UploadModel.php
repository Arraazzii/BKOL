<?php
class UploadModel extends CI_Model
{
	
	var $config;
	
	function __construct()
        {
		parent::__construct();
                
                $this->config = array(
			'overwrite' => true,
			'allowed_types' => 'jpg|jpeg|gif|png',
			//'max_width' => 113.385826772,
			//'max_height' => 151.181102362,
			'max_size' => 2097152
		);
	}
        
        function SetPath($upload_path)
        {
              $this->config['upload_path'] = realpath($upload_path);
        }
        
        function GetPath()
        {
              return $this->config['upload_path'];  
        }
        
        function Upload($field = 'userfile', $filename = 'default', $upload_path)
        {
                if (isset($_FILES[$field]))
                {
                        $this->config['upload_path'] = $upload_path;
                        $this->config['file_name'] = $filename.".jpg";
                        $this->load->library('upload', $this->config);
                        if ($this->upload->do_upload($field))
                        {
                                return true;
                        }
                        else
                        {
                                //return false;
                             return $this->upload->display_errors();    
                        }
                }
                else
                {
                        return false;
                }
        }
	
}
