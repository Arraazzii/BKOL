<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MsPencakerLama extends CI_Model {

	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('db_lama', TRUE);
	}

	public function GetCountCustom($cat, $wh)
    {
        $this->db2->select('IDPencaker');

        if ($cat == 0) {
            $this->db2->where('IDKecamatan', $wh['kecamatan']);
        }
        else if ($cat == 1) {
            if ($wh['umur']['batasatas'] != 0) {
             $this->db2->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) <=', $wh['umur']['batasatas']);
             $this->db2->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
         }
         else {
            $this->db2->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
        }
        
    }
    else if ($cat == 2) {
        $this->db2->where('IDTingkatPendidikan', $wh['pendidikan']);
    }

    $this->db2->where('JenisKelamin', $wh['jk']);
    $query = $this->db2->get('mspencaker');
    return $query->num_rows();
}

function GetCount()
{

    $query = $this->db2->query("SELECT COUNT(IF(JenisKelamin=0, IDPencaker, NULL)) as pria, COUNT(IF(JenisKelamin=1, IDPencaker, NULL)) as wanita, COUNT(IDPencaker) as total FROM mspencaker");
    return $query->result();
}

public function GetMsKecamatan()
{
   $this->db2->select('*');
   $this->db2->from('mskecamatan');
   return $this->db2->get()->result();
}

public function GetMsStatusPendidikan()
{
   $this->db2->select('*');
   $this->db2->from('mstingkatpendidikan');
   return $this->db2->get()->result();
}

}

/* End of file MsPencakerLama.php */
/* Location: ./application/models/MsPencakerLama.php */