<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perusahaan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                if ($this->isperusahaan())
                {
                        redirect();
                }
                else
                {
                        redirect();
                }
	}
        
	public function edit()
	{
                if ($this->isperusahaan())
                {
                        $iduser = $this->session->userdata('iduser');
                        $this->load->model('MsPerusahaan');
                        $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
                        if ($getmsperusahaandata != NULL)
                        {
                                $data['MsPerusahaanData'] = $getmsperusahaandata;
                                $this->load->model('MsBidangPerusahaan');
                                $data['MsBidangPerusahaanData'] = $this->MsBidangPerusahaan->GetComboMsBidangPerusahaan();
                                $this->load->model('MsKecamatan');
                                $data['MsKecamatanData'] = $this->MsKecamatan->GetComboMsKecamatan();
                                $this->load->model('MsKelurahan');
                                $data['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($getmsperusahaandata->IDKecamatan);
                                $data['route'] = $this->uri->segment(2);
                                $this->load->view('index',$data);
                        }
                }
                else
                {
                        redirect(); 
                }
	}
        
	public function doupdateprofile()
	{
                if ($this->isperusahaan())
                {
                        $iduser = $this->session->userdata('iduser');
                        $this->load->model('MsPerusahaan');
                        $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                        $input = $this->input->post();
                        $this->load->model('MsUser');
                        $this->load->model('MsKelurahan');
                        $this->load->model('MsPerusahaanTemp');
                        $input['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($input['idkecamatan']);
                        if ($input['namaperusahaan'] == "")
                        {
                                $this->seterrormsg($input,"Nama Perusahaan harus diisi");
                        }
                        else if ($input['idbidangperusahaan'] == "")
                        {
                                $this->seterrormsg($input,"Bidang Perusahaan harus dipilih");
                        }
                        else if ($input['email'] == "")
                        {
                                $this->seterrormsg($input,"Email harus diisi");
                        }
                        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $input['email']))
                        {
                                $this->seterrormsg($input,"Email tidak valid");
                        }
                        else if ($input['idkelurahan'] == "")
                        {
                                $this->seterrormsg($input,"Kelurahan harus dipilih");
                        }
                        else if ($input['email'] == "")
                        {
                                $this->seterrormsg($input,"Email Pemberi Kerja harus diisi");
                        }
                        else
                        {
                                if ($this->MsPerusahaan->Update($input,$idperusahaan))
                                {
                                        $this->seterrormsg(NULL,"Perusahaan berhasil disimpan");
                                        redirect("");
                                }
                                else
                                {
                                        $this->seterrormsg($input,"Perusahaan gagal disimpan");
                                        redirect("perusahaan/edit");
                                }
                        }
                }
                else
                {
                        redirect(); 
                }
	}
        
	public function getdataperusahaan()
	{
                if ($this->isperusahaan())
                {
                        $iduser = $this->session->userdata('iduser');
                        $this->load->model('MsPerusahaan');
                        $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
                        if ($getmsperusahaandata != NULL)
                        {
                                $data['exists'] = true;
                                $data['NamaPerusahaan'] = $getmsperusahaandata->NamaPerusahaan;
                                $data['IDBidangPerusahaan'] = $getmsperusahaandata->IDBidangPerusahaan;
                                $data['Email'] = $getmsperusahaandata->Email;
                                $data['Telepon'] = $getmsperusahaandata->Telepon;
                                $data['Alamat'] = $getmsperusahaandata->Alamat;
                                $data['IDKecamatan'] = $getmsperusahaandata->IDKecamatan;
                                $data['IDKelurahan'] = $getmsperusahaandata->IDKelurahan;
                                $data['KodePos'] = $getmsperusahaandata->KodePos;
                                $data['Kota'] = $getmsperusahaandata->Kota;
                                $data['Propinsi'] = $getmsperusahaandata->Propinsi;
                                echo json_encode($data);
                        }
                        else
                        {
                                $data['exists'] = false;
                        }
                }
                else
                {
                }
	}
        
        public function doregister()
        {
                $iduser = $this->session->userdata('iduser');
                if ($iduser == '')
                {
                        $input = $this->input->post();
                        $this->load->model('MsUser');
                        $this->load->model('MsKelurahan');
                        $this->load->model('MsPerusahaan');
                        $this->load->model('MsPerusahaanTemp');
                        $this->load->model('MsPencaker');
                        $this->load->model('MsPencakerTemp');
                        $input['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($input['idkecamatan']);
                        if ($input['username'] == "")
                        {
                                $this->seterrormsg($input,"Nama Pengguna harus diisi");
                        }
                        else if (strlen($input['username']) < 4)
                        {
                                $this->seterrormsg($input,"Nama Pengguna minimal 4 karakter");
                        }
                        else if ($this->MsUser->CekUsername($input['username'],'000001')->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Nama Pengguna sudah dipakai");
                        }
                        else if ($this->MsPerusahaanTemp->CekUsername($input['username'],'000001')->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Nama Pengguna sudah dipakai");
                        }
                        else if ($input['password'] == "")
                        {
                                $this->seterrormsg($input,"Kata Sandi harus diisi");
                        }
                        else if (strlen($input['password']) < 4)
                        {
                                $this->seterrormsg($input,"Kata Sandi minimal 4 karakter");
                        }
                        else if ($input['password2'] == "")
                        {
                                $this->seterrormsg($input,"Konfirmasi Kata Sandi harus diisi");
                        }
                        else if ($input['password'] != $input['password2'])
                        {
                                $this->seterrormsg($input,"Konfirmasi Kata Sandi harus sama");
                        }
                        else if ($input['namaperusahaan'] == "")
                        {
                                $this->seterrormsg($input,"Nama Perusahaan harus diisi");
                        }
                        else if ($input['idbidangperusahaan'] == "")
                        {
                                $this->seterrormsg($input,"Bidang Perusahaan harus dipilih");
                        }
                        else if ($input['email'] == "")
                        {
                                $this->seterrormsg($input,"Email harus diisi");
                        }
                        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $input['email']))
                        {
                                $this->seterrormsg($input,"Email tidak valid");
                        }
                        else if ($input['telepon'] == "")
                        {
                                $this->seterrormsg($input,"Telepon harus diisi");
                        }
                        else if ($input['alamat'] == "")
                        {
                                $this->seterrormsg($input,"Alamat harus diisi");
                        }
                        else if ($input['idkelurahan'] == "")
                        {
                                $this->seterrormsg($input,"Kelurahan harus dipilih");
                        }
//                        else if ($input['kodepos'] == "")
//                        {
//                                $this->seterrormsg($input,"Kode Pos harus diisi");
//                        }
//                        else if (strlen($input['kodepos']) < 5)
//                        {
//                                $this->seterrormsg($input,"Kode Pos tidak valid");
//                        }
                        else if ($input['kota'] == "")
                        {
                                $this->seterrormsg($input,"Kota harus diisi");
                        }
                        else if ($input['propinsi'] == "")
                        {
                                $this->seterrormsg($input,"Propinsi harus diisi");
                        }
                        else if ($input['namapemberikerja'] == "")
                        {
                                $this->seterrormsg($input,"Nama Pemberi Kerja harus diisi");
                        }
                        else if ($input['jabatanpemberikerja'] == "")
                        {
                                $this->seterrormsg($input,"Jabatan Pemberi Kerja harus diisi");
                        }
                        else if ($input['emailpemberikerja'] == "")
                        {
                                $this->seterrormsg($input,"Email Pemberi Kerja harus diisi");
                        }
                        else if ($this->MsPerusahaan->CekEmailPemberiKerja($input['emailpemberikerja'],NULL)->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Email sudah dipakai");
                        }
                        else if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($input['emailpemberikerja'],NULL)->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Email sudah dipakai");
                        }
                        else if ($this->MsPencaker->CekEmail($input['emailpemberikerja'],NULL)->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Email sudah dipakai");
                        }
                        else if ($this->MsPencakerTemp->CekEmail($input['emailpemberikerja'],NULL)->num_rows() > 0)
                        {
                                $this->seterrormsg($input,"Email sudah dipakai");
                        }
                        else
                        {
                                $registerdate = date('Y-m-d H:i:s');
                                $getidperusahaan = $this->MsPerusahaanTemp->Insert($input,$registerdate);
                                if ($getidperusahaan != NULL)
                                {
                                        $this->load->model('EmailModel');
                                        @$this->EmailModel->sendEmail($input['emailpemberikerja'],'Pendaftaran Perusahaan Baru','Data Perusahaan anda telah terdaftar.<br />Mohon Tunggu konfirmasi dari admin terlebih dahulu');
                                        $this->seterrormsg(NULL,"Data anda berhasil terdaftar.<br />Mohon Tunggu konfirmasi terlebih dahulu.<br />Konfirmasi akan dikirimkan ke email anda.");
                                }
                                else
                                {
                                        $this->seterrormsg($input,"Pendaftaran gagal");
                                }
                        }
                        redirect("register/1");
                }
                else
                {
                        redirect();
                }
        }
        
        public function doupdatepassword()
        {
                if ($this->isperusahaan())
                {
                        $input = $this->input->post();
                        if ($input['oldpassword'] == "")
                        {
                                $this->seterrormsg($input,"Kata Sandi Lama harus diisi");
                        }
                        else if ($input['password'] == "")
                        {
                                $this->seterrormsg($input,"Kata Sandi harus diisi");
                        }
                        else if (strlen($input['password']) < 4)
                        {
                                $this->seterrormsg($input,"Kata Sandi minimal 4 karakter");
                        }
                        else if ($input['password2'] == "")
                        {
                                $this->seterrormsg($input,"Konfirmasi Kata Sandi harus diisi");
                        }
                        else if ($input['password'] != $input['password2'])
                        {
                                $this->seterrormsg($input,"Konfirmasi Kata Sandi harus sama");
                        }
                        else
                        {
                                $iduser = $this->session->userdata('iduser');
                                $this->load->model('MsUser');
                                if ($this->MsUser->UpdatePassword($iduser,$input['oldpassword'],$input['password']))
                                {
                                        $this->seterrormsg(NULL,"Kata Sandi berhasil diupdate");
                                }
                                else
                                {
                                        $input['oldpassword'] = "";
                                        $this->seterrormsg($input,"Kata Sandi Lama salah");
                                }
                        }
                        redirect("ubahsandi");
                }
                else
                {
                        redirect();
                }
        }
        
        public function pemberikerja()
        {
                if ($this->isperusahaan())
                {
                        if ($this->uri->segment(2) == 'edit')
                        {
                                $iduser = $this->session->userdata('iduser');
                                $this->load->model('MsPerusahaan');
                                $data['MsPerusahaanData'] = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
                                if ($data['MsPerusahaanData'] != NULL)
                                {
                                        $data['route'] = $this->uri->segment(1).'/'.$this->uri->segment(2);
                                        $this->load->view('index',$data); 
                                }
                                else
                                {
                                        //redirect();
                                }
                        }
                        else if ($this->uri->segment(2) == 'doupdateprofile')
                        {
                                $iduser = $this->session->userdata('iduser');
                                $this->load->model('MsPerusahaan');
                                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                                $input = $this->input->post();
                                $this->load->model('MsUser');
                                $this->load->model('MsPerusahaanTemp');
                                $this->load->model('MsPencaker');
                                $this->load->model('MsPencakerTemp');
                                if ($input['namapemberikerja'] == "")
                                {
                                        $this->seterrormsg($input,"Nama Pemberi Kerja harus diisi");
                                }
                                else if ($input['jabatanpemberikerja'] == "")
                                {
                                        $this->seterrormsg($input,"Jabatan Pemberi Kerja harus dipilih");
                                }
                                else if ($input['teleponpemberikerja'] == "")
                                {
                                        $this->seterrormsg($input,"Telepon Pemberi Kerja harus dipilih");
                                }
                                else if ($input['emailpemberikerja'] == "")
                                {
                                        $this->seterrormsg($input,"Email Pemberi Kerja harus diisi");
                                }
                                else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $input['emailpemberikerja']))
                                {
                                        $this->seterrormsg($input,"Email Pemberi Kerja tidak valid");
                                }
                                else if ($this->MsPerusahaan->CekEmailPemberiKerja($input['emailpemberikerja'],$idperusahaan)->num_rows() > 0)
                                {
                                        $this->seterrormsg($input,"Email Pemberi Kerja sudah dipakai");
                                }
                                else if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($input['emailpemberikerja'],$idperusahaan)->num_rows() > 0)
                                {
                                        $this->seterrormsg($input,"Email Pemberi Kerja sudah dipakai");
                                }
                                else if ($this->MsPencaker->CekEmail($input['emailpemberikerja'],NULL)->num_rows() > 0)
                                {
                                        $this->seterrormsg($input,"Email sudah dipakai");
                                }
                                else if ($this->MsPencakerTemp->CekEmail($input['emailpemberikerja'],NULL)->num_rows() > 0)
                                {
                                        $this->seterrormsg($input,"Email sudah dipakai");
                                }
                                else
                                {
                                        if ($this->MsPerusahaan->UpdatePemberiKerja($input,$idperusahaan))
                                        {
                                                $this->seterrormsg(NULL,"Pemberi Kerja berhasil disimpan");
                                                redirect("pemberikerja");
                                        }
                                        else
                                        {
                                                $this->seterrormsg($input,"Pemberi Kerja gagal disimpan");
                                                redirect("pemberikerja/edit");
                                        }
                                }
                        }
                        else
                        {
                                $iduser = $this->session->userdata('iduser');
                                $this->load->model('MsPerusahaan');
                                $data['MsPerusahaanData'] = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
                                if ($data['MsPerusahaanData'] != NULL)
                                {
                                        $data['route'] = $this->uri->segment(1);
                                        $this->load->view('index',$data); 
                                }
                                else
                                {
                                        //redirect();
                                }
                        }
                }
                else
                {
                        redirect();
                }
        }
        
        public function pencaker()
        { 
                if ($this->isperusahaan())
                {
                        $idlowongan = $this->uri->segment(3);
                        if ($idlowongan != '')
                        {
                                if ($this->uri->segment(3) == 'getdata')
                                {
                                        $idpencaker = $this->uri->segment(4);
                                        $this->load->model('MsPencaker');
                                        $getmspencaker = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
                                        if ($getmspencaker != NULL)
                                        {
                                                $data['exists'] = true;
                                                $data['NomorIndukPencaker'] = $getmspencaker->NomorIndukPencaker;
                                                $data['NamaPencaker'] = $getmspencaker->NamaPencaker;
                                                $data['TempatLahir'] = $getmspencaker->TempatLahir;
                                                $data['TglLahir'] = $getmspencaker->TglLahir;
                                                $data['JenisKelamin'] = $getmspencaker->JenisKelamin;
                                                $data['Email'] = $getmspencaker->Email;
                                                $data['Telepon'] = $getmspencaker->Telepon;
                                                $data['Alamat'] = $getmspencaker->Alamat;
                                                $data['NamaKecamatan'] = $getmspencaker->NamaKecamatan;
                                                $data['NamaKelurahan'] = $getmspencaker->NamaKelurahan;
                                                $data['KodePos'] = $getmspencaker->KodePos;
                                                $data['Kewarganegaraan'] = $getmspencaker->Kewarganegaraan;
                                                $data['NamaAgama'] = $getmspencaker->NamaAgama;
                                                $data['NamaStatusPernikahan'] = $getmspencaker->NamaStatusPernikahan;
                                                $data['NamaStatusPendidikan'] = $getmspencaker->NamaStatusPendidikan;
                                                $data['Jurusan'] = $getmspencaker->Jurusan;
                                                $data['Keterampilan'] = $getmspencaker->Keterampilan;
                                                $data['NEMIPK'] = $getmspencaker->NEMIPK;
                                                $data['Nilai'] = $getmspencaker->Nilai;
                                                $data['TahunLulus'] = $getmspencaker->TahunLulus;
                                                $data['TinggiBadan'] = $getmspencaker->TinggiBadan;
                                                $data['BeratBadan'] = $getmspencaker->BeratBadan;
                                                $data['Keterangan'] = $getmspencaker->Keterangan;
                                                $data['IDPosisiJabatan'] = $getmspencaker->IDPosisiJabatan;
                                                $data['Lokasi'] = $getmspencaker->Lokasi;
                                                $data['UpahYangDicari'] = $getmspencaker->UpahYangDicari;
                                        }
                                        else
                                        {
                                                $data['exists'] = false;
                                        }
                                        echo json_encode($data);
                                }
                                else
                                {
                                        $this->load->model('MsLowongan');
                                        $getmslowongan = $this->MsLowongan->GetMsLowonganByIDLowongan($idlowongan);
                                        if ($getmslowongan != NULL)
                                        {
                                                $data['MsLowonganData'] = $getmslowongan;
                                                $page = $this->uri->segment(4);
                                                $this->load->model('MsPencaker');
                                                $getmspencaker = $this->MsPencaker->GetGridMsPencakerByIDLowongan($idlowongan,10,$page);
                                                $getcount = $this->MsPencaker->GetCountMsPencakerByIDLowongan($idlowongan);
                                                $data['TotalPria'] = $getcount->TotalPria;
                                                $data['TotalWanita'] = $getcount->TotalWanita;
                                                $data['MsPencakerData'] = $getmspencaker;
                                                $config['base_url'] = site_url('admin/pencaker');
                                                $config['total_rows'] = $getcount->total_rows;
                                                $config['per_page'] = 10;
                                                $this->pagination->initialize($config);
                                                $data['route'] = $this->uri->segment(2);
                                                $this->load->view('index',$data);
                                        }
                                }
                        }
                        else
                        {
                                redirect();
                        }
                }
                else
                {
                        redirect();
                }
        }
        
        public function lowongan()
        {
                if ($this->isperusahaan())
                {
                        if ($this->uri->segment(3) == 'tambahdata')
                        {
                                $this->load->model('MsPosisiJabatan');
                                $data['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
                                $this->load->model('MsStatusPendidikan');
                                $data['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
                                $this->load->model('MsJenisLowongan');
                                $data['MsJenisLowonganData'] = $this->MsJenisLowongan->GetComboMsJenisLowongan();
                                $this->load->model('MsKeahlian');
                                $data['MsKeahlianData'] = $this->MsKeahlian->GetComboMsKeahlianByIDJenisLowongan('');
                                $this->load->model('MsJenisPengupahan');
                                $data['MsJenisPengupahanData'] = $this->MsJenisPengupahan->GetComboMsJenisPengupahan();
                                $this->load->model('MsStatusHubunganKerja');
                                $data['MsStatusHubunganKerjaData'] = $this->MsStatusHubunganKerja->GetComboMsStatusHubunganKerja();
                                $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                        }
                        else if ($this->uri->segment(3) == 'detail')
                        {
                                $idlowongan = $this->uri->segment(4);
                                $this->load->model('MsLowongan');
                                $MsLowonganData = $this->MsLowongan->GetMsLowonganByIDLowongan($idlowongan);
                                if ($MsLowonganData != NULL)
                                {
                                        $data['MsLowonganData'] = $MsLowonganData;
                                        $this->load->model('MsPosisiJabatan');
                                        $data['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
                                        $this->load->model('MsStatusPendidikan');
                                        $data['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
                                        $this->load->model('MsJenisLowongan');
                                        $data['MsJenisLowonganData'] = $this->MsJenisLowongan->GetComboMsJenisLowongan();
                                        $this->load->model('MsKeahlian');
                                        $data['MsKeahlianData'] = $this->MsKeahlian->GetComboMsKeahlianByIDJenisLowongan($MsLowonganData->IDJenisLowongan);
                                        $this->load->model('MsJenisPengupahan');
                                        $data['MsJenisPengupahanData'] = $this->MsJenisPengupahan->GetComboMsJenisPengupahan();
                                        $this->load->model('MsStatusHubunganKerja');
                                        $data['MsStatusHubunganKerjaData'] = $this->MsStatusHubunganKerja->GetComboMsStatusHubunganKerja();
                                        $tglberlaku = explode("-", $MsLowonganData->TglBerlaku);
                                        $tglberakhir = explode("-", $MsLowonganData->TglBerakhir);
                                        $data['IDLowongan'] = $MsLowonganData->IDLowongan;
                                        $input['idposisijabatan'] = $MsLowonganData->IDPosisiJabatan;
                                        $input['idjenislowongan'] = $MsLowonganData->IDJenisLowongan;
                                        $input['idkeahlian'] = $MsLowonganData->IDKeahlian;
                                        $input['idstatuspendidikan'] = $MsLowonganData->IDStatusPendidikan;
                                        $input['idjenispengupahan'] = $MsLowonganData->IDJenisPengupahan;
                                        $input['idstatushubungankerja'] = $MsLowonganData->IDStatusHubunganKerja;
                                        $input['tglberlaku'] = $tglberlaku[2].'-'.$tglberlaku[1].'-'.$tglberlaku[0];
                                        $input['tglberakhir'] = $tglberakhir[2].'-'.$tglberakhir[1].'-'.$tglberakhir[0];
                                        $input['namalowongan'] = $MsLowonganData->NamaLowongan;
                                        $input['uraianpekerjaan'] = $MsLowonganData->UraianPekerjaan;
                                        $input['uraiantugas'] = $MsLowonganData->UraianTugas;
                                        $input['penempatan'] = $MsLowonganData->Penempatan;
                                        $input['batasumur'] = $MsLowonganData->BatasUmur;
                                        $input['jmlpria'] = $MsLowonganData->JmlPria;
                                        $input['jmlwanita'] = $MsLowonganData->JmlWanita;
                                        $input['jurusan'] = $MsLowonganData->Jurusan;
                                        $input['pengalaman'] = $MsLowonganData->Pengalaman;
                                        $input['syaratkhusus'] = $MsLowonganData->SyaratKhusus;
                                        $input['gajiperbulan'] = $MsLowonganData->GajiPerbulan;
                                        $input['jamkerjaseminggu'] = $MsLowonganData->JamKerjaSeminggu;
                                        $this->seterrormsg($input,NULL);
                                        $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                                }
                                else
                                {
                                        $data['route'] = $this->uri->segment(2);
                                }
                        }
                        else
                        {
                                $page = $this->uri->segment(3);
                                $iduser = $this->session->userdata('iduser');
                                $this->load->model('MsPerusahaan');
                                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                                $data['fromdate'] = $this->session->userdata('fromdate');
                                $data['todate'] = $this->session->userdata('todate');
                                $this->load->model('MsLowongan');
                                if ($data['fromdate'] == '' || $data['todate'] == '')
                                {
                                        $getmslowongan = $this->MsLowongan->GetGridMsLowonganByIDPerusahaan($idperusahaan, 10,$page);
                                        $getcount = $this->MsLowongan->GetCountMsLowonganByIDPerusahaan($idperusahaan);
                                }
                                else
                                {
                                        $getmslowongan = $this->MsLowongan->GetGridMsLowonganByDateIDPerusahaan($idperusahaan, $data['fromdate'],$data['todate'],10,$page);
                                        $getcount = $this->MsLowongan->GetCountMsLowonganByDateIDPerusahaan($idperusahaan, $data['fromdate'],$data['todate']);
                                }
                                $data['MsLowonganData'] = $getmslowongan;
                                $config['base_url'] = site_url('perusahaan/lowongan');
                                $config['total_rows'] = $getcount->total_rows;
                                $config['per_page'] = 10;
                                $this->pagination->initialize($config);
                                $data['route'] = $this->uri->segment(2);
                        }
                        $this->load->view('index',$data);
                }
                else
                {
                        redirect();
                }
        }
        
        public function carilowongan()
        {
                if ($this->isperusahaan())
                {
                        $input = $this->input->post();
                        $iduser = $this->session->userdata('iduser');
                        $this->load->model('MsPerusahaan');
                        $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                        $this->session->set_userdata("fromdate",$input['fromdate']);
                        $this->session->set_userdata("todate",$input['todate']);
                        $data['fromdate'] = $input['fromdate'];
                        $data['todate'] = $input['todate'];
                        $this->load->model('MsLowongan');
                        $page = $this->uri->segment(3);
                        if ($data['fromdate'] == '' || $data['todate'] == '')
                        {
                                $getmslowongan = $this->MsLowongan->GetGridMsLowonganByIDPerusahaan($idperusahaan, 10,$page);
                                $getcount = $this->MsLowongan->GetCountMsLowonganByIDPerusahaan($idperusahaan);
                        }
                        else
                        {
                                $getmslowongan = $this->MsLowongan->GetGridMsLowonganByDateIDPerusahaan($idperusahaan, $data['fromdate'],$data['todate'],10,$page);
                                $getcount = $this->MsLowongan->GetCountMsLowonganByDateIDPerusahaan($idperusahaan, $data['fromdate'],$data['todate']);
                        }
                        $data['MsLowonganData'] = $getmslowongan;
                        $config['base_url'] = site_url('perusahaan/lowongan');
                        $config['total_rows'] = $getcount->total_rows;
                        $config['per_page'] = 10;
                        $this->pagination->initialize($config);
                        $data['route'] = 'lowongan';
                        $this->load->view('index',$data);
                }
                else
                {
                        redirect();
                }
        }
        
        public function statuslowongan()
        {
                if ($this->isperusahaan())
                {
                        
                        if ($this->uri->segment(3) == 'getdata')
                        {
                                $idlowonganmasuk = $this->uri->segment(4);
                                $this->load->model('TrLowonganMasuk');
                                $getmspencaker = $this->TrLowonganMasuk->GetMsPencakerByIDLowonganMasuk($idlowonganmasuk);
                                if ($getmspencaker != NULL)
                                {
                                        $data['exists'] = true;
                                        $data['IDPencaker'] = $getmspencaker->IDPencaker;
                                        $data['NomorIndukPencaker'] = $getmspencaker->NomorIndukPencaker;
                                        $data['NamaPencaker'] = $getmspencaker->NamaPencaker;
                                        $data['TempatLahir'] = $getmspencaker->TempatLahir;
                                        $data['TglLahir'] = $getmspencaker->TglLahir;
                                        $data['JenisKelamin'] = $getmspencaker->JenisKelamin;
                                        $data['Email'] = $getmspencaker->Email;
                                        $data['Telepon'] = $getmspencaker->Telepon;
                                        $data['Alamat'] = $getmspencaker->Alamat;
                                        $data['NamaKecamatan'] = $getmspencaker->NamaKecamatan;
                                        $data['NamaKelurahan'] = $getmspencaker->NamaKelurahan;
                                        $data['KodePos'] = $getmspencaker->KodePos;
                                        $data['Kewarganegaraan'] = $getmspencaker->Kewarganegaraan;
                                        $data['NamaAgama'] = $getmspencaker->NamaAgama;
                                        $data['NamaStatusPernikahan'] = $getmspencaker->NamaStatusPernikahan;
                                        $data['NamaStatusPendidikan'] = $getmspencaker->NamaStatusPendidikan;
                                        $data['Jurusan'] = $getmspencaker->Jurusan;
                                        $data['Keterampilan'] = $getmspencaker->Keterampilan;
                                        $data['NEMIPK'] = $getmspencaker->NEMIPK;
                                        $data['Nilai'] = $getmspencaker->Nilai;
                                        $data['TahunLulus'] = $getmspencaker->TahunLulus;
                                        $data['TinggiBadan'] = $getmspencaker->TinggiBadan;
                                        $data['BeratBadan'] = $getmspencaker->BeratBadan;
                                        $data['Keterangan'] = $getmspencaker->Keterangan;
                                        $data['IDPosisiJabatan'] = $getmspencaker->IDPosisiJabatan;
                                        $data['NamaPosisiJabatan'] = $getmspencaker->NamaPosisiJabatan;
                                        $data['Lokasi'] = $getmspencaker->Lokasi;
                                        $data['UpahYangDicari'] = $getmspencaker->UpahYangDicari;
                                }
                                else
                                {
                                        $data['exists'] = false;
                                }
                                echo json_encode($data);
                        }
                        else if ($this->uri->segment(3) == 'updatedata')
                        {
                                $input = $this->input->post();
                                $this->load->model('TrLowonganMasuk');
                                if ($this->TrLowonganMasuk->UpdateStatusLowongan($input,$input['IDLowonganMasuk']))
                                {
                                        $data['valid'] = true;
                                        $data['error'] = "Data Lowongan berhasil disimpan";
                                }
                                else
                                {
                                        $data['valid'] = false;
                                        $data['error'] = "Data Lowongan gagal disimpan";
                                }
                                echo json_encode($data);
                        }
                        else
                        {
                                $page = $this->uri->segment(3);
                                $data['fromdate'] = $this->session->userdata('fromdate');
                                $data['todate'] = $this->session->userdata('todate');
                                $this->load->model('MsLowongan');
                                if ($data['fromdate'] == '' || $data['todate'] == '')
                                {
                                        $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatus(10,$page);
                                        $getcount = $this->MsLowongan->GetCountMsLowonganStatus();
                                }
                                else
                                {
                                        $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatusByDate($data['fromdate'],$data['todate'],10,$page);
                                        $getcount = $this->MsLowongan->GetCountMsLowonganStatusByDate($data['fromdate'],$data['todate']);
                                }
                                $data['TotalPria'] = $getcount->TotalPria;
                                $data['TotalWanita'] = $getcount->TotalWanita;
                                $data['MsLowonganData'] = $getmslowongan;
                                $config['base_url'] = site_url('perusahaan/statuslowongan');
                                $config['total_rows'] = $getcount->total_rows;
                                $config['per_page'] = 10;
                                $this->pagination->initialize($config);
                                $data['route'] = $this->uri->segment(2);
                                $this->load->view('index',$data);
                        }
                }
                if ($this->isperusahaan())
                {
                }
                else
                {
                        redirect();
                }
        }
        
        public function caristatuslowongan()
        {
                if ($this->isperusahaan())
                {
                        $input = $this->input->post();
                        $this->session->set_userdata("fromdate",$input['fromdate']);
                        $this->session->set_userdata("todate",$input['todate']);
                        $data['fromdate'] = $input['fromdate'];
                        $data['todate'] = $input['todate'];
                        $this->load->model('MsLowongan');
                        $page = $this->uri->segment(3);
                        if ($data['fromdate'] == '' || $data['todate'] == '')
                        {
                                $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatus(10,$page);
                                $getcount = $this->MsLowongan->GetCountMsLowonganStatus();
                        }
                        else
                        {
                                $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatusByDate($data['fromdate'],$data['todate'],10,$page);
                                $getcount = $this->MsLowongan->GetCountMsLowonganStatusByDate($data['fromdate'],$data['todate']);
                        }
                        $data['MsLowonganData'] = $getmslowongan;
                        $data['TotalPria'] = $getcount->TotalPria;
                        $data['TotalWanita'] = $getcount->TotalWanita;
                        $config['base_url'] = site_url('perusahaan/statuslowongan');
                        $config['total_rows'] = $getcount->total_rows;
                        $config['per_page'] = 10;
                        $this->pagination->initialize($config);
                        $data['route'] = 'statuslowongan';
                        $this->load->view('index',$data);
                }
                else
                {
                        redirect();
                }
        }
        
	public function addlowongan()
	{
                if ($this->isperusahaan())
                {
                        $input = $this->input->post();
                        $this->load->model('MsPosisiJabatan');
                        $input['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
                        $this->load->model('MsStatusPendidikan');
                        $input['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
                        $this->load->model('MsJenisLowongan');
                        $input['MsJenisLowonganData'] = $this->MsJenisLowongan->GetComboMsJenisLowongan();
                        $this->load->model('MsKeahlian');
                        $input['MsKeahlianData'] = $this->MsKeahlian->GetComboMsKeahlianByIDJenisLowongan($input['idjenislowongan']);
                        $this->load->model('MsJenisPengupahan');
                        $input['MsJenisPengupahanData'] = $this->MsJenisPengupahan->GetComboMsJenisPengupahan();
                        $this->load->model('MsStatusHubunganKerja');
                        $input['MsStatusHubunganKerjaData'] = $this->MsStatusHubunganKerja->GetComboMsStatusHubunganKerja();
                        if ($input['uraianpekerjaan'] == "")
                        {
                                $this->seterrormsg($input,"Uraian Singkat Pekerjaan harus diisi");
                        }
                        else if ($input['uraiantugas'] == "")
                        {
                                $this->seterrormsg($input,"Uraian Tugas harus diisi");
                        }
                        else if ($input['penempatan'] == "")
                        {
                                $this->seterrormsg($input,"Penempatan harus diisi");
                        }
                        else if ($input['batasumur'] == "")
                        {
                                $this->seterrormsg($input,"Batas Umur harus diisi");
                        }
                        else if ($input['namalowongan'] == "")
                        {
                                $this->seterrormsg($input,"Nama Pekerjaan harus diisi");
                        }
                        else if ($input['jmlpria'] == "")
                        {
                                $this->seterrormsg($input,"Jumlah Laki-laki harus diisi");
                        }
                        else if ($input['jmlwanita'] == "")
                        {
                                $this->seterrormsg($input,"Jumlah Perempuan harus diisi");
                        }
                        else if ($input['idposisijabatan'] == "")
                        {
                                $this->seterrormsg($input,"Jabatan harus dipilih");
                        }
                        else if ($input['idstatuspendidikan'] == "")
                        {
                                $this->seterrormsg($input,"Pendidikan Formal harus dipilih");
                        }
                        else if ($input['jurusan'] == "")
                        {
                                $this->seterrormsg($input,"Jurusan harus diisi");
                        }
                        else if ($input['idjenislowongan'] == "")
                        {
                                $this->seterrormsg($input,"Kategori harus dipilih");
                        }
                        else if ($input['idkeahlian'] == "")
                        {
                                $this->seterrormsg($input,"Keahlian harus dipilih");
                        }
                        else if ($input['pengalaman'] == "")
                        {
                                $this->seterrormsg($input,"Pengalaman harus diisi");
                        }
                        else if ($input['syaratkhusus'] == "")
                        {
                                $this->seterrormsg($input,"Syarat Khusus harus diisi");
                        }
                        else if ($input['idjenispengupahan'] == "")
                        {
                                $this->seterrormsg($input,"Jenis Pengupahan harus dipilih");
                        }
                        else if ($input['gajiperbulan'] == "")
                        {
                                $this->seterrormsg($input,"Gaji harus diisi");
                        }
                        else if ($input['idstatushubungankerja'] == "")
                        {
                                $this->seterrormsg($input,"Status Hubungan kerja harus dipiih");
                        }
                        else if ($input['jamkerjaseminggu'] == "")
                        {
                                $this->seterrormsg($input,"Jam kerja harus diisi");
                        }
                        else
                        {
                                $iduser = $this->session->userdata('iduser');
                                $registerdate = date('Y-m-d H:i:s');
                                $this->load->model('MsPerusahaan');
                                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                                $this->load->model('MsLowongan');
                                $idlowongan = $this->MsLowongan->Insert($idperusahaan,$input,$registerdate);
                                if ($idlowongan != NULL)
                                {
                                        $this->seterrormsg(NULL,"Lowongan berhasil ditambah");
                                }
                                else
                                {
                                        $this->seterrormsg($input,"Lowongan gagal ditambah");
                                }
                        }
                        redirect("perusahaan/lowongan/tambahdata");
                }
                else
                {
                        redirect();
                }
	}
        
	public function updatelowongan()
	{
                if ($this->isperusahaan())
                {
                        $idlowongan = $this->uri->segment(3);
                        $data['IDLowongan'] = $idlowongan;
                        $input = $this->input->post();
                        $this->load->model('MsPosisiJabatan');
                        $input['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
                        $this->load->model('MsStatusPendidikan');
                        $input['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
                        $this->load->model('MsJenisLowongan');
                        $input['MsJenisLowonganData'] = $this->MsJenisLowongan->GetComboMsJenisLowongan();
                        $this->load->model('MsKeahlian');
                        $input['MsKeahlianData'] = $this->MsKeahlian->GetComboMsKeahlianByIDJenisLowongan($input['idjenislowongan']);
                        $this->load->model('MsJenisPengupahan');
                        $input['MsJenisPengupahanData'] = $this->MsJenisPengupahan->GetComboMsJenisPengupahan();
                        $this->load->model('MsStatusHubunganKerja');
                        $input['MsStatusHubunganKerjaData'] = $this->MsStatusHubunganKerja->GetComboMsStatusHubunganKerja();
                        if ($input['uraianpekerjaan'] == "")
                        {
                                $this->seterrormsg($input,"Uraian Singkat Pekerjaan harus diisi");
                        }
                        else if ($input['uraiantugas'] == "")
                        {
                                $this->seterrormsg($input,"Uraian Tugas harus diisi");
                        }
                        else if ($input['penempatan'] == "")
                        {
                                $this->seterrormsg($input,"Penempatan harus diisi");
                        }
                        else if ($input['batasumur'] == "")
                        {
                                $this->seterrormsg($input,"Batas Umur harus diisi");
                        }
                        else if ($input['namalowongan'] == "")
                        {
                                $this->seterrormsg($input,"Nama Pekerjaan harus diisi");
                        }
                        else if ($input['jmlpria'] == "")
                        {
                                $this->seterrormsg($input,"Jumlah Laki-laki harus diisi");
                        }
                        else if ($input['jmlwanita'] == "")
                        {
                                $this->seterrormsg($input,"Jumlah Perempuan harus diisi");
                        }
                        else if ($input['idposisijabatan'] == "")
                        {
                                $this->seterrormsg($input,"Jabatan harus dipilih");
                        }
                        else if ($input['idstatuspendidikan'] == "")
                        {
                                $this->seterrormsg($input,"Pendidikan Formal harus dipilih");
                        }
                        else if ($input['jurusan'] == "")
                        {
                                $this->seterrormsg($input,"Jurusan harus diisi");
                        }
                        else if ($input['idjenislowongan'] == "")
                        {
                                $this->seterrormsg($input,"Kategori harus dipilih");
                        }
                        else if ($input['idkeahlian'] == "")
                        {
                                $this->seterrormsg($input,"Keahlian harus dipilih");
                        }
                        else if ($input['pengalaman'] == "")
                        {
                                $this->seterrormsg($input,"Pengalaman harus diisi");
                        }
                        else if ($input['syaratkhusus'] == "")
                        {
                                $this->seterrormsg($input,"Syarat Khusus harus diisi");
                        }
                        else if ($input['idjenispengupahan'] == "")
                        {
                                $this->seterrormsg($input,"Jenis Pengupahan harus dipilih");
                        }
                        else if ($input['gajiperbulan'] == "")
                        {
                                $this->seterrormsg($input,"Gaji harus diisi");
                        }
                        else if ($input['idstatushubungankerja'] == "")
                        {
                                $this->seterrormsg($input,"Status Hubungan kerja harus dipiih");
                        }
                        else if ($input['jamkerjaseminggu'] == "")
                        {
                                $this->seterrormsg($input,"Jam kerja harus diisi");
                        }
                        else
                        {
                                $iduser = $this->session->userdata('iduser');
                                $registerdate = date('Y-m-d H:i:s');
                                $this->load->model('MsPerusahaan');
                                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                                $this->load->model('MsLowongan');
                                if ($this->MsLowongan->Update($idlowongan,$idperusahaan,$input,$registerdate))
                                {
                                        $this->seterrormsg(NULL,"Lowongan berhasil diupdate");
                                }
                                else
                                {
                                        $this->seterrormsg($input,"Lowongan gagal diupdate");
                                }
                        }
                        redirect("perusahaan/lowongan/detail/".$idlowongan);
                }
                else
                {
                        redirect();
                }
	}
        
	public function deletelowongan()
	{
                if ($this->isperusahaan())
                {
                        $iduser = $this->session->userdata('iduser');
                        $idlowongan = $this->uri->segment(3);
                        $this->load->model('MsPerusahaan');
                        $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                        if ($idperusahaan != NULL)
                        {
                                $this->load->model('MsLowongan');
                                $this->MsLowongan->DeleteByIDPerusahaan($idlowongan,$idperusahaan);
                                redirect('perusahaan/lowongan');
                        }
                }
                else
                {
                        redirect();
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
        
        function seterrormsg($input,$msg)
        {
                if ($input != NULL)
                {
                        $this->session->set_flashdata('input',$input);
                }
                if ($msg != NULL)
                {
                        $this->session->set_flashdata('error',$msg);
                }
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */