<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MsImport extends CI_Model {

	public function Batch()
	{
		# code...
	}

	public function Insert($value='')
	{
		# code...
	}

	public function GenerateNoInduk()
	{
		$query = $this->db->query("SELECT IDPencaker, NomorIndukPencaker FROM mspencaker WHERE DATE(RegisterDate) = CURDATE() ORDER_BY IDPencaker DESC");
		$date = date('Ymd');
		if ($query->num_rows > 0) 
		{
			$data = $query->row();
			$num = $data->NomorIndukPencaker;
			$num = substr($num, -6);
			$num = intval($num);
			$num++;
			for($i=strlen($num);$i<6;$i++)
			{
				$LastID .= "0";
			}
			
			$LastID .= $num;
		}
		else
		{
			$LastID = "000001";
		}

		return $date . $LastID;
	}

	public function GetLastID()
	{
		$LastID = "";
		$query = $this->db->query("SELECT IDPencaker FROM ".strtolower("MsPencaker")." ORDER BY IDPencaker DESC LIMIT 1");
		if ($query->num_rows() > 0)
		{
			$getdata = $query->row();
			$GetLastID = (int)$getdata->IDPencaker;
			$GetLastID++;
			for($i=strlen($GetLastID);$i<6;$i++)
			{
				$LastID .= "0";
			}
			$LastID .= $GetLastID;
		}
		else
		{
			$LastID = "000001";
		}
		return $LastID;
	}

}

/* End of file MsImport.php */
/* Location: ./application/models/MsImport.php */