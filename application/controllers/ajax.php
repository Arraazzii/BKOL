<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajax extends CI_Controller {

	public function get_pencaker_json()
	{
		if($this->isadmin())
		{
			$this->load->model('MsPencaker', 'pencaker');
			header('Content-Type: application/json');
			$data = $this->pencaker->get_datatable_pencaker();
			$newdata = json_decode($data);
			foreach ($newdata->data as $key => $value) 
			{
				$fromdate = explode("-", substr($value->RegisterDate,0,10));
				$todate = explode("-", $value->ExpiredDate);

				$newdata->data[$key]->No = ($key + 1);
				$newdata->data[$key]->Expired = $todate[2].'-'.$todate[1].'-'.$todate[0];
				$newdata->data[$key]->Status = (date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? 'Aktif' : 'Tidak Aktif');
			}
			echo json_encode($newdata);
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function get_perusahaan_json()
	{
		if ($this->isadmin()) 
		{
			$this->load->model('MsPerusahaan', 'perusahaan');
			header('Content-Type: application/json');
			$data = $this->perusahaan->get_datatable_perusahaan();
			$newdata = json_decode($data);
			
			foreach ($newdata->data as $key => $value) 
			{
				$newdata->data[$key]->No = ($key + 1);
			}

			echo json_encode($newdata);
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function get_newpencaker_json() 
	{
		if ($this->isadmin()) 
		{
			$this->load->model('MsPencakerTemp', 'pencaker');
			header('Content-Type: application/json');
			$data = $this->pencaker->get_datatable_pencaker();
			$newdata = json_decode($data);
			
			foreach ($newdata->data as $key => $value) 
			{
				// $regdate = explode("-", substr($value->RegisterDate,0,10));
				// $newdata->data[$key]->RegDate = $regdate[2].'-'.$regdate[1].'-'.$regdate[0];
				$newdata->data[$key]->No = ($key + 1);
			}

			echo json_encode($newdata);
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function get_newperusahaan_json()
	{
		if ($this->isadmin()) 
		{
			$this->load->model('MsPerusahaanTemp', 'perusahaan');
			header('Content-Type: application/json');
			$data = $this->perusahaan->get_datatable_perusahaan();
			$newdata = json_decode($data);
			
			foreach ($newdata->data as $key => $value) 
			{
				$regdate = explode("-", substr($value->RegisterDate,0,10));
				$newdata->data[$key]->RegDate = $regdate[2].'-'.$regdate[1].'-'.$regdate[0];
				$newdata->data[$key]->No = ($key + 1);
			}

			echo json_encode($newdata);
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function daftar_lowongan_json()
	{
		if ($this->isperusahaan()) 
		{
			$this->load->model('MsLowongan', 'lowongan');
			$this->load->model('MsPerusahaan', 'perusahaan');
			$iduser = $this->session->userdata('iduser');
			$idperusahaan = $this->perusahaan->GetIDPerusahaanByIDUser($iduser);

			header('Content-Type: application/json');
			$data = $this->lowongan->get_byidperusahaan($idperusahaan);

			$newdata = json_decode($data);
			
			foreach ($newdata->data as $key => $value) 
			{
				$regdate = explode("-", $value->TglBerlaku);
				$expdate = explode("-", $value->TglBerakhir);

				if(strtotime($value->TglBerlaku) >= strtotime(date('d-m-Y')) && strtotime($value->TglBerakhir) <= strtotime(date('d-m-Y')))
					$status = 'Aktif';
				else
					$status = 'Tidak Aktif';

				$newdata->data[$key]->RegDate = $regdate[2].'-'.$regdate[1].'-'.$regdate[0];
				$newdata->data[$key]->ExpDate = $expdate[2].'-'.$expdate[1].'-'.$expdate[0];
				$newdata->data[$key]->Status = $status;
				$newdata->data[$key]->No = ($key + 1);
			}

			echo json_encode($newdata);
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function get_combostatuspendidikan()
	{
		$active = 0;
		if(isset($_GET['selected']))
			$active = $this->input->get('selected');

		$this->load->model('MsStatusPendidikan', 'pendidikan');

		$data = $this->pendidikan->GetMsStatusPendidikan();
		$html = '<select name="idstatuspendidikan" id="idstatuspendidikan" class="form-control input-sm">';
		$html .= '<option value="">- Pilih Status Pendidikan -</option>';
		
		if (count($data) > 0) 
		{
			foreach ($data as $row) {
				if ($row->IDStatusPendidikan == $active) 
				{
					$html .= '<option value="'.$row->IDStatusPendidikan.'" selected>'.ucwords(strtolower($row->NamaStatusPendidikan)).'</option>';
				}
				else
				{
					$html .= '<option value="'.$row->IDStatusPendidikan.'">'.ucwords(strtolower($row->NamaStatusPendidikan)).'</option>';
				}
			}
		}
		$html .= '</select>';
		echo $html;
	}

	public function get_combojurusan()
	{
		$active = 0;
		if(isset($_GET['selected']))
			$active = $this->input->get('selected');

		$this->load->model('MsJurusan', 'jurusan');

		$data = $this->jurusan->GetJurusanByIDStatusPendidikan($this->input->post('idstatuspendidikan'));
		$html = '<select name="idjurusan" id="idjurusan" class="form-control input-sm">';
		$html .= '<option value="">- Pilih Jurusan -</option>';
		
		if (count($data->result()) > 0) 
		{
			foreach ($data->result() as $row) {
				if ($row->IDJurusan == $active) 
				{
					$html .= '<option value="'.$row->IDJurusan.'" selected>'.ucwords(strtolower($row->Jurusan)).'</option>';
				}
				else
				{
					$html .= '<option value="'.$row->IDJurusan.'">'.ucwords(strtolower($row->Jurusan)).'</option>';
				}
			}
		}
		$html .= '</select>';
		echo $html;
	}

	public function get_comboprovinsi()
	{
		$active = 0;
		
		if(isset($_GET['selected']))
			$active = $this->input->get('selected');

		$this->load->model('MsWilayah', 'wilayah');

		$data = $this->wilayah->GetProvinsi();
		$html = '<select name="idprovinsi" onchange="getkabupaten($(this).val())" id="idprovinsi" class="form-control input-sm">';
		$html .= '<option value="">- Pilih Provinsi -</option>';
		
		if ($data->num_rows > 0) 
		{
			foreach ($data->result() as $row) {
				if ($row->IDProvinsi == $active) 
				{
					$html .= '<option value="'.$row->IDProvinsi.'" selected>'.ucwords(strtolower($row->NamaProvinsi)).'</option>';
				}
				else
				{
					$html .= '<option value="'.$row->IDProvinsi.'">'.ucwords(strtolower($row->NamaProvinsi)).'</option>';
				}
			}
		}
		$html .= '</select>';
		echo $html;
	}

	public function get_kelurahan()
	{
		if ($this->input->post()) 
		{
			$idkecamatan = $this->input->post('IDKecamatan');
			$active = 0;
			
			if ($this->input->post('selected')) 
			{
				$active = $this->input->post('selected'); 
			}

			$this->load->model('MsKelurahan', 'wilayah');

			$data = $this->wilayah->GetKelurahanByIDKecamatan($idkecamatan);
			$html = '<option value="">- Pilih Kelurahan -</option>';
			
			if ($data->num_rows > 0) 
			{
				foreach ($data->result() as $row) {
					if ($row->IDKelurahan == $active) 
					{
						$html .= '<option value="'.$row->IDKelurahan.'" selected>'.ucwords(strtolower($row->NamaKelurahan)).'</option>';
					}
					else
					{
						$html .= '<option value="'.$row->IDKelurahan.'">'.ucwords(strtolower($row->NamaKelurahan)).'</option>';
					}
				}
			}

			echo $html;
		}
		else
		{
			redirect('','refresh');
		}
	}

	public function get_jurusan()
	{
		if ($this->input->post()) 
		{
			$idstatuspendidikan = $this->input->post('IDStatusPendidikan');
			$active = '';
			
			if ($this->input->post('selected')) 
			{
				$active = $this->input->post('selected'); 
			}

			$this->load->model('MsJurusan', 'jurusan');

			$data = $this->jurusan->GetByIDStatusPendidikan($idstatuspendidikan);
			$html = '<option value="">- Pilih Jurusan -</option>';
			
			if ($data->num_rows > 0) 
			{
				foreach ($data->result() as $row) {
					if ($row->IDJurusan == $active) 
					{
						$html .= '<option value="'.$row->IDJurusan.'" selected>'.$row->Jurusan.'</option>';
					}
					else
					{
						$html .= '<option value="'.$row->IDJurusan.'">'.$row->Jurusan.'</option>';
					}
				}
			}

			echo $html;
		}
		else
		{
			redirect('','refresh');
		}
	}

	private function isadmin()
	{

		$iduser = $this->session->userdata('iduser');
		if ($iduser != '')
		{
			$this->load->model('MsUser');
			$getmsuser = $this->MsUser->GetMsUserByIDUser($iduser);
			if ($getmsuser != NULL)
			{
				if ($getmsuser->IDJenisUser == '000000')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	function isperusahaan()
	{
		$iduser = $this->session->userdata('iduser');
		if ($iduser != '')
		{
			$this->load->model('MsUser');
			$getmsuser = $this->MsUser->GetMsUserByIDUser($iduser);
			if ($getmsuser != NULL)
			{
				if ($getmsuser->IDJenisUser == '000001')
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */