<?php
class MsCMS extends CI_Model
{

	public function dataContactUs(){
		$query = $this->db->query("SELECT * FROM mskritiksaran ORDER BY idKritikSaran DESC");
		return $query->result_array();

	}

	public function dataSlider(){
		$query = $this->db->query("SELECT * FROM msslider ORDER BY idslider DESC");
		return $query->result_array();

	}

	public function dataSliderActive(){
		$query = $this->db->query("SELECT * FROM msslider WHERE status='1' ORDER BY idslider DESC");
		return $query->result_array();

	}

	public function dataAk(){
		$query = $this->db->query("SELECT * FROM mssigniture ORDER BY idSigniture DESC LIMIT 1");
		return $query->result_array();

	}

}
?>