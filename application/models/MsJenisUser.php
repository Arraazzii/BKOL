<?php

class MsJenisUser extends CI_Model
{
	
	function GetMsJenisUser()
	{
		return $this->db->query("SELECT IDJenisUser,NamaJenisUser FROM ".strtolower("MsJenisUser")." WHERE IDJenisUser!='000000' ORDER BY IDJenisUser DESC");
	}

}

?>