<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perusahaan extends CI_Controller {

    public function index()
    {
        if ($this->isperusahaan())
        {
            $this->load->model('MsPerusahaan');
            $data['MsPerusahaanData'] = $this->MsPerusahaan->GetMsPerusahaanByIDUser($this->session->userdata('iduser'));
            if ($data['MsPerusahaanData'] != NULL)
            {
                $data['route'] = $this->uri->segment(1);
                    // $this->load->view('index',$data); 
                $this->template->load('backend', 'perusahaan/profil', $data);
            }
            else
            {

            }
        }
        else
        {
            redirect();
        }
    }

    public function update_password()
    {
        if ($this->isperusahaan())
        {
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if ($this->input->post('sandilama') == '') 
            {
                $data['inputerror'][]   = 'sandilama';
                $data['error_string'][] = 'Sandi Lama Tidak Boleh Kosong';
                $data['status'] = FALSE;
            }
            if ($this->input->post('sandibaru') == '') 
            {
                $data['inputerror'][]   = 'sandibaru';
                $data['error_string'][] = 'Sandi Baru Tidak Boleh Kosong';
                $data['status'] = FALSE;
            }
            if (strlen($this->input->post('sandibaru')) < 4) 
            {
                $data['inputerror'][]   = 'sandibaru';
                $data['error_string'][] = 'Kata Sandi Minimal 4 Karakter';
                $data['status'] = FALSE;
            }
            if ($this->input->post('sandibaru_confirm') == '') 
            {
                $data['inputerror'][]   = 'sandibaru_confirm';
                $data['error_string'][] = 'Sandi Baru Ko Tidak Boleh Kosong';
                $data['status'] = FALSE;
            }
            if ($this->input->post('sandibaru') != $this->input->post('sandibaru_confirm')) 
            {
                $data['inputerror'][]   = 'sandibaru_confirm';
                $data['error_string'][] = 'Sandi Konfirmasi Tidak Cocok';
                $data['status'] = FALSE;
            }

            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }

            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsUser');

            if ($this->MsUser->UpdatePassword($iduser,$this->input->post('sandilama'),$this->input->post('sandibaru')) != false) 
            {
                $data['status'] = TRUE;
                $data['ket']    = 1;
                echo json_encode($data);
                exit();
            }
            else
            {
                $data['inputerror'][]   = 'sandilama';
                $data['error_string'][] = 'Kata Sandi Salah';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
        }
    }

    public function editprofil()
    {
        if ($this->isperusahaan())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPerusahaan');
            $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
            $data['MsPerusahaanData'] = $getmsperusahaandata;
            $this->load->model('MsBidangPerusahaan');
            $data['MsBidangPerusahaanData'] = $this->MsBidangPerusahaan->GetComboMsBidangPerusahaan();
            $this->load->model('MsKecamatan');
            $data['MsKecamatanData'] = $this->MsKecamatan->GetComboMsKecamatan();
            $this->load->model('MsKelurahan');
            $data['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($getmsperusahaandata->IDKecamatan);
            $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($this->session->userdata('iduser'));

            if ($this->input->post()) 
            {

                $input = $this->input->post();
                $this->load->model('MsUser');
                $this->load->model('MsKelurahan');
                $this->load->model('MsPerusahaanTemp');
                $input['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($input['idkecamatan']);
                

                $config = array(
                    array(
                        'field' => 'namaperusahaan',
                        'label' => 'Nama Perusahaan',
                        'rules' => 'required|min_length[5]'
                    ),
                    array(
                        'field' => 'idbidangperusahaan',
                        'label' => 'Bidang Perusahaan',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Alamat E-Mail',
                        'rules' => 'required|valid_email'
                    ),
                    array(
                        'field' => 'idkelurahan',
                        'label' => 'Kelurahan',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'idkecamatan',
                        'label' => 'Kecamatan',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'kota',
                        'label' => 'Kota',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'propinsi',
                        'label' => 'Propinsi',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'kodepos',
                        'label' => 'Kode Pos',
                        'rules' => 'required|min_length[5]'
                    ),
                    array(
                        'field' => 'telepon',
                        'label' => 'Nomor Telepon',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'logoperusahaan',
                        'label' => 'Logo Perusahaan',
                        'rules' => 'callback_upload_image'
                    )
                );

                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $data['input'] = $input;
                    $this->template->load('backend', 'perusahaan/profil_edit', $data);
                }
                else
                { 
                    $this->MsPerusahaan->Update($input,$idperusahaan);
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Profil Perusahaan Berhasil Di Update", "success", "fa fa-check")</script>');
                    redirect('perusahaan/index','refresh');
                }
            }
            else
            {
                if ($getmsperusahaandata != NULL)
                {
                    $this->template->load('backend', 'perusahaan/profil_edit', $data);
                }
            }
        }
        else
        {
            redirect(); 
        }
    }

    public function upload_image()
    {
        $this->load->model('MsPerusahaan');
        $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($this->session->userdata('iduser'));

        $config['upload_path'] = './assets/file/perusahaan';
        $config['allowed_types'] = 'jpeg|jpg';
        $config['file_name'] = $idperusahaan.".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        if(isset($_FILES['logoperusahaan']) && !empty($_FILES['logoperusahaan']['name']))
        {
            $namafile = $_FILES["logoperusahaan"]["name"];
            $ext = pathinfo($namafile, PATHINFO_EXTENSION);

            if ($ext != 'jpg') 
            {
                $this->form_validation->set_message('upload_image', 'File gambar harus berformat *.jpg');
                return FALSE;
            }
            else if($_FILES['logoperusahaan']['size'] > 2097152)
            {
                $this->form_validation->set_message('upload_image', 'Ukuran file logo maksimal 2 MB');
                return FALSE;
            }
            else if($this->upload->do_upload('logoperusahaan'))
            {
                $upload_data = $this->upload->data();
                $_POST['logoperusahaan'] = $upload_data['file_name'];
                return TRUE;
            }
            else
            {
                $this->form_validation->set_message('upload_image', $this->upload->display_errors());
                return FALSE;
            }
        }
        else
        {
            $_POST['logoperusahaan'] = NULL;
            return TRUE;
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
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data Perusahaan anda berhasil terdaftar. Mohon Tunggu konfirmasi terlebih dahulu. Konfirmasi akan dikirimkan ke email anda.", "success", "fa fa-check")</script>');
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
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPerusahaan');
            $this->load->model('MsPencaker');
            $this->load->model('MsPencakerTemp');
            $this->load->model('MsPerusahaanTemp');

            $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);

            if ($this->input->post()) 
            {
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = TRUE;

                if ($this->input->post('namapemberikerja') == '') 
                {
                    $data['inputerror'][]   = 'namapemberikerja';
                    $data['error_string'][] = 'Nama Pemberi Kerja Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($this->input->post('jabatanpemberikerja') == '') 
                {
                    $data['inputerror'][]   = 'jabatanpemberikerja';
                    $data['error_string'][] = 'Jabatan Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($this->input->post('teleponpemberikerja') == '') 
                {
                    $data['inputerror'][]   = 'teleponpemberikerja';
                    $data['error_string'][] = 'Telepon Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($this->input->post('emailpemberikerja') == '') 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email Harus diisi';
                    $data['status'] = FALSE;
                }
                if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $this->input->post('emailpemberikerja'))) 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email harus berisi email valid';
                    $data['status'] = FALSE;
                }
                if ($this->MsPerusahaan->CekEmailPemberiKerja($this->input->post('emailpemberikerja'),$idperusahaan)->num_rows() > 0) 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email Pemberi kerja sudah dipakai';
                    $data['status'] = FALSE;
                }
                if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($this->input->post('emailpemberikerja'),$idperusahaan)->num_rows() > 0) 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email Pemberi kerja sudah dipakai';
                    $data['status'] = FALSE;
                }
                if ($this->MsPencaker->CekEmail($this->input->post('emailpemberikerja'),$idperusahaan)->num_rows() > 0) 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email sudah dipakai';
                    $data['status'] = FALSE;
                }
                if ($this->MsPencakerTemp->CekEmail($this->input->post('emailpemberikerja'),$idperusahaan)->num_rows() > 0) 
                {
                    $data['inputerror'][]   = 'emailpemberikerja';
                    $data['error_string'][] = 'Email sudah dipakai';
                    $data['status'] = FALSE;
                }

                if($data['status'] === FALSE)
                {
                    echo json_encode($data);
                    exit();
                }
                
                if ($this->MsPerusahaan->UpdatePemberiKerja($this->input->post(),$idperusahaan))
                {
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data Pemberi Kerja Berhasil Di Simpan", "success", "fa fa-check")</script>');
                    $data['status'] = TRUE;
                    $data['ket']    = 1;
                    echo json_encode($data);
                    exit();
                }
                else
                {
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data Pemberi Kerja Gagal Di Simpan", "danger", "fa fa-exclamation")</script>');
                    redirect();
                }
            }
            else
            {
                $data['MsPerusahaanData'] = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
                
                if ($data['MsPerusahaanData'] != NULL)
                {
                    $this->template->load('backend', 'perusahaan/profil_pemberikerja', $data);
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
                        $getmspencaker0 = $this->MsPencaker->GetGridMsPencakerByIDLowongan($idlowongan, 10000000,$page);
                        $getmspencaker1 = $this->MsPencaker->NewGetGridMsPencakerByIDLowongan($idlowongan, 1);
                        $getmspencaker2 = $this->MsPencaker->NewGetGridMsPencakerByIDLowongan($idlowongan, 2);
                        $getmspencaker3 = $this->MsPencaker->NewGetGridMsPencakerByIDLowongan($idlowongan, 3);
                        $getmspencaker4 = $this->MsPencaker->NewGetGridMsPencakerByIDLowongan($idlowongan, 4);
                        $getcount = $this->MsPencaker->GetCountMsPencakerByIDLowongan($idlowongan);
                        $data['TotalPria'] = $getcount->TotalPria; 
                        $data['TotalWanita'] = $getcount->TotalWanita;
                        $data['MsPencakerData0'] = $getmspencaker0;
                        $data['MsPencakerData1'] = $getmspencaker1;
                        $data['MsPencakerData2'] = $getmspencaker2;
                        $data['MsPencakerData3'] = $getmspencaker3;
                        $data['MsPencakerData4'] = $getmspencaker4;
                        // $config['base_url'] = site_url('admin/pencaker');
                        // $config['total_rows'] = $getcount->total_rows;
                        // $config['per_page'] = 10;
                        // $this->pagination->initialize($config);
                        $data['route'] = $this->uri->segment(2);
                        $this->template->load('backend', 'perusahaan/daftar_pencaker', $data);
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
                $iduser = $this->session->userdata('iduser');
                $registerdate = date('Y-m-d H:i:s');
                $this->load->model('MsPerusahaan');
                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                $this->load->model('MsLowongan');
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

                if ($this->input->post()) 
                {
                    $input = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'namalowongan',
                            'label' => 'Nama Lowongan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'uraianpekerjaan',
                            'label' => 'Rincian Pekerjaan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'uraiantugas',
                            'label' => 'Uraian Tugas',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'penempatan',
                            'label' => 'Lokasi Penempatan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'jmlpria',
                            'label' => 'Jumlah Laki-laki',
                            'rules' => 'required|numeric'
                        ),
                        array(
                            'field' => 'jmlwanita',
                            'label' => 'Jumlah Wanita',
                            'rules' => 'required|numeric'
                        ),
                        array(
                            'field' => 'batasumur',
                            'label' => 'Batas Umur',
                            'rules' => 'required|numeric|greater_than[17]',
                            'error'=> array(
                                'greater_than' => 'Batas Umur harus 18 Tahun Keatas'
                            )
                        ),
                        array(
                            'field' => 'idstatuspendidikan',
                            'label' => 'Pendidikan Formal',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idposisijabatan',
                            'label' => 'Posisi Jabatan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'jurusan',
                            'label' => 'Jurusan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idjenislowongan',
                            'label' => 'Kategori',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idkeahlian',
                            'label' => 'Keahlian',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'pengalaman',
                            'label' => 'Pengalaman',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'syaratkhusus',
                            'label' => 'Syarat Khusus',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idjenispengupahan',
                            'label' => 'Jenis Pengupahan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'gajiperbulan',
                            'label' => 'Gaji Perbulan',
                            'rules' => 'required|numeric|greater_than[0]'
                        ),
                        array(
                            'field' => 'idstatushubungankerja',
                            'label' => 'Status Hubungan Kerja',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'jamkerjaseminggu',
                            'label' => 'Jam Kerja',
                            'rules' => 'required|numeric|greater_than[0]'
                        )
                    );

$this->form_validation->set_rules($config);

if ($this->form_validation->run() == FALSE)
{
    $data['input'] = $input;
    $this->template->load('backend', 'perusahaan/tambah_lowongan', $data);
}
else
{ 

    $insert = $this->MsLowongan->Insert($idperusahaan,$input,$registerdate);
    
    if ($insert) 
    {
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Berhasil Di Tambah", "success", "fa fa-check")</script>');
        $pendidikanNeed = $this->input->post('idstatuspendidikan');
        $posisiNeed = $this->input->post('idposisijabatan');
        $selectUser = $this->db->query("SELECT NamaPencaker, Email, IDStatusPendidikan, IDPosisiJabatan, TglLahir, Jurusan, JenisKelamin from mspencaker WHERE IDStatusPendidikan = '$pendidikanNeed' AND IDPosisiJabatan = '$posisiNeed'")->result_array();
        $selectPerusahaan = $this->db->query("SELECT NamaPerusahaan from msperusahaan WHERE IDPerusahaan = '$idperusahaan'")->result_array();
        if ($selectUser != NULL) {
           date_default_timezone_get("Asia/Jakarta");
           $dateNow = date("Y-m-d");

           foreach ($selectUser as $userGet) {
            $emailUser = $userGet['Email'];
            $nameUser = $userGet['NamaPencaker'];

            $dates = date_create($userGet['TglLahir']);
            $dateDB = date_format($dates, "Y-m-d");
            $diff = abs(strtotime($dateNow) - strtotime($dateDB));
            $totalUmur = floor(($diff)/ (365*60*60*24));

            $this->load->library('PHPMailer');
            $this->load->library('SMTP');
            $email_admin = 'disnaker.depok@gmail.com';
            $nama_admin = 'BKOL';
            $password_admin = '2014umar';

            if ($this->input->post('batasumur') >= $totalUmur) {
                if (($this->input->post('jmlwanita') != 0 || $this->input->post('jmlwanita') != '' || $this->input->post('jmlwanita') != '0' || $this->input->post('jmlwanita') != NULL) && ($this->input->post('jmlpria') == 0 || $this->input->post('jmlpria') == '' || $this->input->post('jmlpria') == NULL)) {
                    if ($userGet['JenisKelamin'] == '1' || $userGet['JenisKelamin'] == 1) {
                        $mail = new PHPMailer();
                        $mail->isSMTP();  
                        $mail->SMTPKeepAlive = true;
                        $mail->Charset  = 'UTF-8';
                        $mail->IsHTML(true);
                        // $mail->SMTPDebug = 2;
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.gmail.com'; 
                        $mail->Port = 587;
                        $mail->SMTPSecure = 'ssl';
                        $mail->Username = $email_admin;
                        $mail->Password = $password_admin;
                        $mail->Mailer   = 'smtp';
                        $mail->WordWrap = 100;       

                        $mail->setFrom($email_admin);
                        $mail->FromName = $nama_admin;
                        $mail->addAddress($emailUser);
                        $mail->AddEmbeddedImage('assets/img-lowongan.png', 'lowongan');
                        $mail->Subject          = 'Lowongan Pekerjaan Baru';
                        $mail_data['subject']   = $nameUser;
                        $mail_data['link'] = base_url('detailLowonganPekerjaan?lowongan='.$insert);
                        $mail_data['perusahaan'] = $selectPerusahaan[0]['NamaPerusahaan'];
                        $mail_data['posisi']  = $input['namalowongan'];
                        $mail_data['gaji']  = $input['gajiperbulan'];
                        $message = $this->load->view('email_lowongan', $mail_data, TRUE);
                        $mail->Body = $message;
                    }
                }elseif (($this->input->post('jmlpria') != 0 || $this->input->post('jmlpria') != '' || $this->input->post('jmlpria') != '0' || $this->input->post('jmlpria') != NULL) && ($this->input->post('jmlwanita') == 0 || $this->input->post('jmlwanita') == '' || $this->input->post('jmlwanita') == NULL)) {
                    if ($userGet['JenisKelamin'] == '0' || $userGet['JenisKelamin'] == 0) {
                        $mail = new PHPMailer();
                        $mail->isSMTP();  
                        $mail->SMTPKeepAlive = true;
                        $mail->Charset  = 'UTF-8';
                        $mail->IsHTML(true);
                        // $mail->SMTPDebug = 2;
                        $mail->SMTPAuth = true;
                        $mail->Host = 'smtp.gmail.com'; 
                        $mail->Port = 587;
                        $mail->SMTPSecure = 'ssl';
                        $mail->Username = $email_admin;
                        $mail->Password = $password_admin;
                        $mail->Mailer   = 'smtp';
                        $mail->WordWrap = 100;       

                        $mail->setFrom($email_admin);
                        $mail->FromName = $nama_admin;
                        $mail->addAddress($emailUser);
                        $mail->AddEmbeddedImage('assets/img-lowongan.png', 'lowongan');
                        $mail->Subject          = 'Lowongan Pekerjaan Baru';
                        $mail_data['subject']   = $nameUser;
                        $mail_data['link'] = base_url('detailLowonganPekerjaan?lowongan='.$insert);
                        $mail_data['perusahaan'] = $selectPerusahaan[0]['NamaPerusahaan'];
                        $mail_data['posisi']  = $input['namalowongan'];
                        $mail_data['gaji']  = $input['gajiperbulan'];
                        $message = $this->load->view('email_lowongan', $mail_data, TRUE);
                        $mail->Body = $message;
                    }
                }else{
                    $mail = new PHPMailer();
                    $mail->isSMTP();  
                    $mail->SMTPKeepAlive = true;
                    $mail->Charset  = 'UTF-8';
                    $mail->IsHTML(true);
                        // $mail->SMTPDebug = 2;
                    $mail->SMTPAuth = true;
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Username = $email_admin;
                    $mail->Password = $password_admin;
                    $mail->Mailer   = 'smtp';
                    $mail->WordWrap = 100;       

                    $mail->setFrom($email_admin);
                    $mail->FromName = $nama_admin;
                    $mail->addAddress($emailUser);
                    $mail->AddEmbeddedImage('assets/img-lowongan.png', 'lowongan');
                    $mail->Subject          = 'Lowongan Pekerjaan Baru';
                    $mail_data['subject']   = $nameUser;
                    $mail_data['link'] = base_url('detailLowonganPekerjaan?lowongan='.$insert);
                    $mail_data['perusahaan'] = $selectPerusahaan[0]['NamaPerusahaan'];
                    $mail_data['posisi']  = $input['namalowongan'];
                    $mail_data['gaji']  = $input['gajiperbulan'];
                    $message = $this->load->view('email_lowongan', $mail_data, TRUE);
                    $mail->Body = $message;
                }
            }

        }

        if ($mail->send()) {
         $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Berhasil Ditambahkan", "success", "fa fa-check")</script>');
     } else {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Gagal Di Tambah", "danger", "fa fa-exclamation")</script>');
      redirect('perusahaan/lowongan/tambahdata');
  }

}else{
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Gagal Di Tambah", "danger", "fa fa-exclamation")</script>');
    redirect('perusahaan/lowongan/tambahdata');
}
redirect('perusahaan/lowongan');
}
else
{
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Gagal Di Tambah", "danger", "fa fa-exclamation")</script>');
    redirect('perusahaan/lowongan/tambahdata');
}
}
}
else
{
    $data['input'] = [];
    $this->template->load('backend', 'perusahaan/tambah_lowongan', $data);
}
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
        
        if ($this->input->post()) 
        {
            $input = $this->input->post();

            $config = array(
                array(
                    'field' => 'namalowongan',
                    'label' => 'Nama Lowongan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'uraianpekerjaan',
                    'label' => 'Rincian Pekerjaan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'uraiantugas',
                    'label' => 'Uraian Tugas',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'penempatan',
                    'label' => 'Lokasi Penempatan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'jmlpria',
                    'label' => 'Jumlah Laki-laki',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'jmlwanita',
                    'label' => 'Jumlah Wanita',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'batasumur',
                    'label' => 'Batas Umur',
                    'rules' => 'required|numeric|greater_than[17]',
                    'error'=> array(
                        'greater_than' => 'Batas Umur harus 18 Tahun Keatas'
                    )
                ),
                array(
                    'field' => 'idstatuspendidikan',
                    'label' => 'Pendidikan Formal',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'idposisijabatan',
                    'label' => 'Posisi Jabatan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'jurusan',
                    'label' => 'Jurusan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'idjenislowongan',
                    'label' => 'Kategori',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'idkeahlian',
                    'label' => 'Keahlian',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'pengalaman',
                    'label' => 'Pengalaman',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'syaratkhusus',
                    'label' => 'Syarat Khusus',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'idjenispengupahan',
                    'label' => 'Jenis Pengupahan',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'gajiperbulan',
                    'label' => 'Gaji Perbulan',
                    'rules' => 'required|numeric|greater_than[0]'
                ),
                array(
                    'field' => 'idstatushubungankerja',
                    'label' => 'Status Hubungan Kerja',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'jamkerjaseminggu',
                    'label' => 'Jam Kerja',
                    'rules' => 'required|numeric|greater_than[0]'
                )
            );
            
            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $data['input'] = $input;
                $this->template->load('backend', 'perusahaan/detail_lowongan', $data);
            }
            else
            { 
                $iduser = $this->session->userdata('iduser');
                $registerdate = date('Y-m-d H:i:s');
                $this->load->model('MsPerusahaan');
                $idperusahaan = $this->MsPerusahaan->GetIDPerusahaanByIDUser($iduser);
                $this->load->model('MsLowongan');

                $update = $this->MsLowongan->Update($idlowongan,$idperusahaan,$input,$registerdate);
                
                if ($update) 
                {
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Berhasil Di Update", "success", "fa fa-check")</script>');
                    redirect('perusahaan/lowongan');
                }
                else
                {
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Gagal Di Update", "danger", "fa fa-exclamation")</script>');
                    redirect('perusahaan/lowongan/tambahdata');
                }
            }
        }
        else
        {
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
            $data['input'] = $input;
            $this->template->load('backend', 'perusahaan/detail_lowongan', $data);
        }
    }
    else
    {
        $this->template->load('backend', 'perusahaan/detail_lowongan', $data);
    }

}
else if ($this->uri->segment(3) == 'delete') 
{
    $idlowongan = $this->uri->segment(4);
    $this->load->model('MsLowongan');
    $this->MsLowongan->delete($idlowongan);
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Lowongan Berhasil Di Hapus", "success", "fa fa-check")</script>');
    redirect('perusahaan/lowongan');
    redirect('perusahaan/lowongan');
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
    $this->template->load('backend', 'perusahaan/lowongan', $data);
}
            // $this->load->view('index2',$data);
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
            $getmslowongan = $this->MsLowongan->GetGridMsLowonganByIDPerusahaan($idperusahaan, 100,$page);
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
        $config['per_page'] = 100;
        $this->pagination->initialize($config);
            // $data['route'] = 'lowongan';
            // $this->load->view('index',$data);
        $this->template->load('backend', 'perusahaan/daftar_lowongan', $data);
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
            $this->load->model('MsPengalaman');
            $this->load->model('MsBahasa');
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
                $data['UpahYangDicari'] = number_format($getmspencaker->UpahYangDicari);
                $data['StatusLowongan'] = $getmspencaker->StatusLowongan;
                $data['PengalamanData'] = "";

                $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencaker($getmspencaker->IDPencaker);
                
                if ($getmspengalamandata->num_rows() > 0)
                {
                    $data['PengalamanData'] .= '<ul>';
                    foreach ($getmspengalamandata->result() as $getdata)
                    {
                        $lama = $getdata->lamabekerja;
                        $lm = $lama . ' Hari';

                        if($lama < 365)
                        {
                            $lama = floor($lama / 30);
                            $lm = $lama . ' Bulan';
                        }
                        else if ($lama >= 365)
                        {
                            $lama = round($lama / 365, 1);
                            $lm = $lama . ' Tahun';
                        }

                        $data['PengalamanData'] .=  '<li>'.$getdata->Jabatan . ', ' . $getdata->NamaPerusahaan.', '.$lm.'</li>';
                    }
                    $data['PengalamanData'] .= '</ul>';
                }
                else
                {
                    $data['PengalamanData'] .= 'tidak ada data';
                }

                $getmsbahasadata = $this->MsBahasa->GetMsBahasaByIDPencaker($getmspencaker->IDPencaker);
                $data['BahasaData'] = "";
                if ($getmsbahasadata->num_rows() > 0)
                {
                    $data['BahasaData'] .= '<ul>';
                    foreach ($getmsbahasadata->result() as $getdata)
                    {
                        $data['BahasaData'] .=  '<li>'.$getdata->NamaBahasa.'</li>';
                    }
                    $data['BahasaData'] .= '</ul>';
                }
                else
                {
                    $data['BahasaData'] .= 'tidak ada data';
                }

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
            $this->load->library('PHPMailer');
            $this->load->library('SMTP');
            if ($this->TrLowonganMasuk->UpdateStatusLowongan($input,$input['IDLowonganMasuk']))
            {
                $iduser = $input['IDPencaker'];
                $statuslowonganInput = $input['StatusLowongan'];
                $idLow = $input['IDLowonganMasuk'];
                $userID = $this->db->query("SELECT Email FROM mspencaker WHERE IDPencaker = '$iduser'")->result_array();
                $PerusahaanName = $this->db->query("SELECT c.NamaPerusahaan FROM trlowonganmasuk as a JOIN mslowongan as b ON b.IDLowongan = a.IDLowongan JOIN msperusahaan as c ON c.IDPerusahaan = b.IDPerusahaan WHERE a.IDLowonganMasuk = '$idLow'")->result_array();
                $email_admin = 'disnaker.depok@gmail.com';
                $nama_admin = 'BKOL';
                $password_admin = '2014umar';
                $mail = new PHPMailer();
                $mail->isSMTP();  
                $mail->SMTPKeepAlive = true;
                $mail->Charset  = 'UTF-8';
                $mail->IsHTML(true);
                // $mail->SMTPDebug = 1;
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com'; 
                $mail->Port = 587;
                $mail->SMTPSecure = 'ssl';
                $mail->Username = $email_admin;
                $mail->Password = $password_admin;
                $mail->Mailer   = 'smtp';
                $mail->WordWrap = 100;
                $mail->setFrom($email_admin);
                $mail->FromName = $nama_admin;
                $mail->addAddress($userID[0]['Email']);

                if ($input['StatusLowongan'] == '1') {
                    $mail->AddEmbeddedImage('assets/img-wait.png', 'hasil');
                    $mail->Subject          = 'CV Anda Telah Diverifikasi Oleh '.$PerusahaanName[0]['NamaPerusahaan'];
                    $mail_data['status']   = 'CV Anda Telah Diverifikasi';
                    $mail_data['statusDesk']   = 'Mohon Tunggu Informasi Lebih Lanjut Dari Perusahan Tersebut';
                }else if($input['StatusLowongan'] == '2') {
                    $mail->AddEmbeddedImage('assets/img-lowongan.png', 'hasil');
                    $mail->Subject          = 'Selamat Anda Diterima Bekerja Di '.$PerusahaanName[0]['NamaPerusahaan'];
                    $mail_data['status']   = 'Selamat Anda Diterima Bekerja';
                    $mail_data['statusDesk']   = 'Mohon Tunggu Informasi Lebih Lanjut Dari Perusahan Tersebut';
                }else if($input['StatusLowongan'] == '3') {
                    $mail->AddEmbeddedImage('assets/img-reject.png', 'hasil');
                    $mail->Subject          = 'CV Anda Ditolak Oleh '.$PerusahaanName[0]['NamaPerusahaan'];
                    $mail_data['status']   = 'CV Anda Ditolak';
                    $mail_data['statusDesk']   = 'Mohon Maaf Perusahaan Tersebut Telah Menolak CV Anda';
                }else if($input['StatusLowongan'] == '4') {
                    $mail->AddEmbeddedImage('assets/img-tidak-sesuai.png', 'hasil');
                    $mail->Subject          = 'CV Tidak Sesuai Persyaratan';
                    $mail_data['status']   = 'CV Tidak Sesuai Persyaratan';
                    $mail_data['statusDesk']   = 'Pastikan CV Anda Sesuai Dengan Kriteria Lamaran Yang Dibutuhkan';
                }else{
                    $data['valid'] = false;
                    $data['error'] = "Data Lowongan gagal disimpan";
                }

                $message = $this->load->view('email_hasil', $mail_data, TRUE);
                $mail->Body = $message;
                if ($mail->send()) {
                    $data['valid'] = true;
                    $data['error'] = "Data Lowongan berhasil disimpan";
               } else {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
              }
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
            $getcount = $this->MsLowongan->GetCountNEWMsLowonganStatus();
        }
        else
        {
            $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatusByDate($data['fromdate'],$data['todate'],10,$page);
            $getcount = $this->MsLowongan->GetCountNEWMsLowonganStatusByDate($data['fromdate'],$data['todate']);
        }
                // var_dump($getcount);
        $data['TotalPria'] = $getcount->TotalPria;
        $data['TotalWanita'] = $getcount->TotalWanita;
        $data['MsLowonganData'] = $getmslowongan;
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('perusahaan/statuslowongan');
        $config['total_rows'] = $getcount->total_rows;
        $config['per_page'] = 10;
        $config["num_links"]        = 3;
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';
        $config['full_tag_open']    = '<div class="box-tools"><nav><ul class="pagination no-margin pull-right">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tagl_close']  = '&raquo;</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tagl_close']  = '&laquo;</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tagl_close']  = '</li>';
        $this->pagination->initialize($config);
        $this->template->load('backend', 'perusahaan/daftar_statuslowongan', $data);
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
            $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatus(100,$page);
            $getcount = $this->MsLowongan->GetCountMsLowonganStatus();
        }
        else
        {
            $getmslowongan = $this->MsLowongan->GetGridMsLowonganStatusByDate($data['fromdate'],$data['todate'],100,$page);
            $getcount = $this->MsLowongan->GetCountMsLowonganStatusByDate($data['fromdate'],$data['todate']);
        }
        $data['MsLowonganData'] = $getmslowongan;
        $data['TotalPria'] = $getcount->TotalPria;
        $data['TotalWanita'] = $getcount->TotalWanita;
        $config['base_url'] = site_url('perusahaan/statuslowongan');
        $config['total_rows'] = $getcount->total_rows;
        $config['per_page'] = 100;
        $this->pagination->initialize($config);
        $this->template->load('backend', 'perusahaan/daftar_statuslowongan', $data);
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

public function chat()
{
    $this->load->model('MsChat');

    if ($this->isperusahaan())
    {               
        $id_user= $this->session->userdata('iduser');
        $this->MsChat->Read_user($id_user);
        $data['iduser'] = $id_user;
        $data['route'] = $this->uri->segment(2);
        $this->load->view('index',$data);

    }
}
public function send_chat($pengirim,$pesan)
{
    $this->load->model('MsChat');
    $data['pengirim']=$pengirim;
    $data['penerima']='admin';
    $data['pesan']=urldecode($pesan);
    $data['date']=date("Y-m-d H:i:s");
    $data['status']='D';
    $kirim=$this->MsChat->Insert($data);
    if ($kirim==TRUE) {
        echo json_encode($data);
    }
}

public function get_chat($pengirim,$jum_chat){
    $this->load->model('MsChat');
    $get=$this->MsChat->GetBypengirim($pengirim);
    if ($get->num_rows()>$jum_chat) {
        $output['message']=$get->result_array();
        $output['jum_message']=$get->num_rows();
        $output['status']="TRUE";
        echo json_encode($output);
    }else{
        $output['status']="FALSE";
        echo json_encode($output);   
    }


}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */