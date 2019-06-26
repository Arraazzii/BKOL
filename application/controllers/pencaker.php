<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pencaker extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MsChat');
        // phpinfo(); die;
    }
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
        if ($this->ispencaker())
        {
            redirect();
        }
        else
        {
            redirect();
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
            $this->load->model('MsPencaker');
            $this->load->model('MsPencakerTemp');
            $this->load->model('MsPerusahaan');
            $this->load->model('MsPerusahaanTemp');
            $input['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($input['idkecamatan']);
            $input['nomorindukpencaker'] = str_replace("-","",$input['nomorindukpencaker']);
            $input['nomorindukpencaker'] = str_replace(" ","",$input['nomorindukpencaker']);
            if ($input['username'] == "")
            {
                $this->seterrormsg($input,"Nama Pengguna harus diisi");
            }
            else if (strlen($input['username']) < 4)
            {
                $this->seterrormsg($input,"Nama Pengguna minimal 4 karakter");
            }
            else if ($this->MsUser->CekUsername($input['username'],'000002')->num_rows() > 0)
            {
                $this->seterrormsg($input,"Nama Pengguna sudah dipakai");
            }
            else if ($this->MsPencakerTemp->CekUsername($input['username'])->num_rows() > 0)
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
            else if ($input['nomorindukpencaker'] == "")
            {
                $this->seterrormsg($input,"Nomor Induk Pencaker harus diisi");
            }
            else if ($this->MsPencaker->CekNomorIndukPencaker($input['nomorindukpencaker'], NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Nomor Penduduk sudah dipakai");
            }
            else if ($this->MsPencakerTemp->CekNomorIndukPencaker($input['nomorindukpencaker'], NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Nomor Penududuk sudah dipakai");
            }
            else if (substr($input['nomorindukpencaker'],0,4) != "3276")
            {
                $this->seterrormsg($input,"Nomer penduduk anda bukan Kota Depok");
            }
            else if ($input['namapencaker'] == "")
            {
                $this->seterrormsg($input,"Nama Pencaker harus diisi");
            }
            else if ($input['tempatlahir'] == "")
            {
                $this->seterrormsg($input,"Tempat Lahir harus diisi");
            }
            else if ($input['tgllahir'] == "")
            {
                $this->seterrormsg($input,"Tanggal Lahir harus diisi");
            }
            else if ($input['email'] == "")
            {
                $this->seterrormsg($input,"Email harus diisi");
            }
            else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $input['email']))
            {
                $this->seterrormsg($input,"Email tidak valid");
            }
            else if ($this->MsPencaker->CekEmail($input['email'],NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Email sudah dipakai");
            }
            else if ($this->MsPencakerTemp->CekEmail($input['email'],NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Email sudah dipakai");
            }
            else if ($this->MsPerusahaan->CekEmailPemberiKerja($input['email'],NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Email sudah dipakai");
            }
            else if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($input['email'],NULL)->num_rows() > 0)
            {
                $this->seterrormsg($input,"Email sudah dipakai");
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
            else if ($input['idagama'] == "")
            {
                $this->seterrormsg($input,"Agama harus dipilih");
            }
            else if ($input['idstatuspernikahan'] == "")
            {
                $this->seterrormsg($input,"Status Pernikahan harus dipilih");
            }
            else if ($input['idkelurahan'] == "")
            {
                $this->seterrormsg($input,"Kelurahan harus dipilih");
            }
            else if ($input['idstatuspendidikan'] == "")
            {
                $this->seterrormsg($input,"Status Pendidikan harus dipilih");
            }
            // else if ($input['idposisijabatan'] == "")
            // {
            //     $this->seterrormsg($input,"Posisi Jabatan harus dipilih");
            // }
            // else if ($input['tinggibadan'] == "")
            // {
            //     $this->seterrormsg($input,"Tinggi Badan harus diisi");
            // }
            // else if ($input['beratbadan'] == "")
            // {
            //     $this->seterrormsg($input,"Berat Badan harus diisi");
            // }
            else if ($_FILES['photo']['error'] > 0)
            {
                switch ($_FILES['photo']['error'])
                {
                    case 1:
                    $this->seterrormsg($input,"Ukuran file foto maksimal 2 MB");
                    break;
                    case 2:
                    $this->seterrormsg($input,"Ukuran file foto maksimal 2 MB");
                    break;
                    case 3:
                    $this->seterrormsg($input,"Foto belum diupload sepenuhnya");
                    break;
                    case 4:
                    $this->seterrormsg($input,"Foto belum diupload");
                    break;
                }
            }
            else if (end(explode(".", $_FILES["photo"]["name"])) != 'jpg')
            {
                $this->seterrormsg($input,"File harus berformat *.jpg");
            }
            else if ($_FILES['photo']['size'] > 2097152)
            {
                $this->seterrormsg($input,"Ukuran file foto maksimal 2 MB");
            }
            else
            {
    // list($width, $height, $type, $attr) = getimagesize($_FILES['photo']['tmp_name']);
    // if(in_array($type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
    // {
                $jumlah = $this->input->post('jumlah_view');
                for($a=1; $a<$jumlah+1; $a++){
                    $data_jabatan[]=$this->input->post('jabatan'.$a);
    // $data_uraian[]=$this->input->post('uraian'+$a);
                    $data_perusahaan[]=$this->input->post('perusahaan'.$a);
                    $data_tglmasuk[]=$this->input->post('tglmasuk'.$a);
                    $data_tglkeluar[]=$this->input->post('tglkeluar'.$a);
                }
                $registerdate = date('Y-m-d H:i:s');
                $jam_waktu = date('His');

                $this->load->model('MsPencakerTemp');
                $getid=$this->MsPencakerTemp->GetLastID();
                $tangalid= date('d-m-Y');
                $rubahidkecamatan=$input['idkecamatan']*1;
                $rubahidkelurahan=$input['idkelurahan']*1;
                $idpencakerok="".$rubahidkelurahan."".$rubahidkecamatan."".$getid."".$jam_waktu."-".$tangalid;


                $getidpencakertemp = $this->MsPencakerTemp->Insert($input,$registerdate,$jumlah,$data_jabatan,$data_perusahaan,$data_tglmasuk,$data_tglkeluar,$idpencakerok);
                if ($getidpencakertemp != NULL)
                {
                    if ($_FILES['photo']['size'] != NULL)
                    {
                        $this->load->model('UploadModel');
                        $this->UploadModel->Upload('photo', $getidpencakertemp, 'assets/file/temp');
                    }
                    $this->load->model('EmailModel');
                    @$this->EmailModel->sendEmail($input['email'],'Pendaftaran Pencaker Baru','Data Pencari Kerja anda telah terdaftar<br />Mohon Tunggu konfirmasi dari admin terlebih dahulu');
                    @$this->EmailModel->sendEmail('arfanprayogo@gmail.com'.','.'anhar.priyandi@gmail.com','Pencaker Masuk '.$idpencakerok,'Nomor Induk Pencaker : '.$idpencakerok.'<br/>Nama Pencaker : '.$input['namapencaker'].'<br/>Email Pencaker : '.$input['email']);
                    $this->seterrormsg(NULL,"Data anda berhasil terdaftar.<br />Mohon Tunggu konfirmasi terlebih dahulu.<br />Konfirmasi akan dikirimkan ke email anda.");
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data anda berhasil terdaftar. Mohon Tunggu konfirmasi terlebih dahulu. Konfirmasi akan dikirimkan ke email anda.", "success", "fa fa-check")</script>');
                }
                else
                {
                    $this->seterrormsg($input,"Pendaftaran gagal");
                }
    // }
    // else
    // {
    //         $this->seterrormsg($input,"File yang diupload harus berupa gambar");
    // }
            }
            redirect("register/2");
    //}
    // else
    // {
    //         redirect();
        }
    }

    public function riwayatlamaran()
    {
        if ($this->ispencaker()) 
        {
            $page = $this->uri->segment(3);
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $this->load->model('TrLowonganMasuk', 'trans');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            $total_rows = $this->trans->CountByIDPencaker($idpencaker);
            $lowongandata = $this->trans->GetByIDPencaker($idpencaker, 10, $page);
            $data['title'] = 'Riwayat Lamaran Kerja';
            $data['lowongandata'] = $lowongandata;
            $config['base_url']         = site_url('pencaker/riwayatlamaran');
            $config['total_rows']       = $total_rows;
            $config['per_page']         = 10;
            $config["uri_segment"]      = 3;  // uri parameter
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
            $this->template->load('frontend', 'pencaker/riwayatlamaran', $data);

        }
        else
        {
            redirect('');
        }
    }

    public function tambahbahasa()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $input = $this->input->post();
                $this->load->model('MsBahasa');
                if ($input['NamaBahasa'] == "")
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Bahasa harus diisi";
                }
                else if ($this->MsBahasa->CekNamaBahasa($input['NamaBahasa'], NULL, $idpencaker))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Bahasa sudah dipakai";
                }
                else
                {
                    if ($this->MsBahasa->Insert($input, $idpencaker))
                    {
                        $data['valid'] = true;
                        $data['error'] = "Bahasa berhasil disimpan";
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Bahasa Berhasil Di Tambah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Bahasa gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function pengalaman()
    {
        if ($this->ispencaker()) 
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            
            if ($idpencaker != NULL)
            {
                $this->load->model('MsPengalaman');
                $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencaker($idpencaker);
                $data['MsPengalamanData'] = $getmspengalamandata;
                $this->template->load('frontend', 'pencaker/edit_pengalaman', $data);
            }
        }
        else
        {
            redirect('','refresh');
        }
    }

    public function tambahpengalaman()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);

            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            $input = $this->input->post();
            $this->load->model('MsPengalaman');


            if ($input['NamaPerusahaan'] == '') 
            {
                $data['inputerror'][]   = 'namaperusahaan';
                $data['error_string'][] = 'Nama Perusahaan Harus di isi';
                $data['status'] = FALSE;
            }
            if ($input['Jabatan'] == '') 
            {
                $data['inputerror'][]   = 'jabatan';
                $data['error_string'][] = 'Jabatan Harus Diisi';
                $data['status'] = FALSE;
            }
            if ($input['UraianKerja'] == '') 
            {
                $data['inputerror'][]   = 'uraiankerja';
                $data['error_string'][] = 'Uraian Kerja Harus Diisi';
                $data['status'] = FALSE;
            }
            if (strtotime($input['TglMasuk']) > strtotime($input['TglBerhenti']))
            {
                $data['inputerror'][]   = 'tglmasuk';
                $data['error_string'][] = 'Tanggal Masuk Tidak bisa lebih dari tanggal berhenti';
                $data['status'] = FALSE;
            }
            if ($input['StatusPekerjaan'] == "")
            {
                $data['inputerror'][]   = 'status';
                $data['error_string'][] = 'Status Pekerjaan harus dipilih';
                $data['status'] = FALSE;
            }

            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }

            if ($this->MsPengalaman->CountPengalamanByIDPencaker($idpencaker) < 4) 
            {
                if($this->MsPengalaman->Insert($input, $idpencaker))
                {
                    $data['status'] = TRUE;
                    $data['ket']    = 1;
                    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pengalaman Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    echo json_encode($data);
                }
                
            }
            else
            {
                $data['status'] = FALSE;
                $data['ket']    = 2;
                echo json_encode(array('error'=>'Pengalaman Maksimal hanya 3'));
            }
        }
        else
        {
            redirect();
        }
    }

    public function updatepengalaman()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $input = $this->input->post();
                $this->load->model('MsPengalaman');
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = TRUE;

                if ($input['Jabatan'] == "")
                {
                    $data['inputerror'][]   = 'jabatan';
                    $data['error_string'][] = 'Jabatan Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($input['UraianKerja'] == "")
                {
                    $data['inputerror'][]   = 'uraiankerja';
                    $data['error_string'][] = 'Uraian Kerja Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($input['NamaPerusahaan'] == "")
                {
                    $data['inputerror'][]   = 'namaperusahaan';
                    $data['error_string'][] = 'Nama Perusahaan Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($input['TglMasuk'] == "")
                {
                    $data['inputerror'][]   = 'tglmasuk';
                    $data['error_string'][] = 'Tanggal Masuk Harus diisi';
                    $data['status'] = FALSE;
                }
                if ($input['TglBerhenti'] == "")
                {
                    $data['inputerror'][]   = 'tglberhenti';
                    $data['error_string'][] = 'Tanggal Berhenti Harus diisi';
                    $data['status'] = FALSE;
                }
                if (strtotime($input['TglMasuk']) > strtotime($input['TglBerhenti']))
                {
                    $data['inputerror'][]   = 'tglmasuk';
                    $data['error_string'][] = 'Tanggal Masuk Tidak bisa lebih dari tanggal berhenti';
                    $data['status'] = FALSE;
                }
                if($data['status'] != FALSE)
                {
                    if ($this->MsPengalaman->Update($input, $input['IDPengalaman'], $idpencaker))
                    {
                        $data['valid'] = true;
                        $data['status'] = TRUE;
                        $data['ket']    = 1;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pengalaman kerja berhasil di perbaharui", "success", "fa fa-check")</script>');

                    }
                    else
                    {
                        $data['ket']   = 0;
                        $data['valid'] = false;
                        $data['error'] = "Pengalaman gagal disimpan";
                    }
                }
                
                echo json_encode($data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function edit()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            $data['MsPencakerData'] = $getmspencakerdata;
            $this->load->model('MsKecamatan');
            $data['MsKecamatanData'] = $this->MsKecamatan->GetComboMsKecamatan();
            $this->load->model('MsKelurahan');
            $data['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($getmspencakerdata->IDKecamatan);
            $this->load->model('MsStatusPernikahan');
            $data['MsStatusPernikahanData'] = $this->MsStatusPernikahan->GetComboMsStatusPernikahan();
            $this->load->model('MsAgama');
            $data['MsAgamaData'] = $this->MsAgama->GetComboMsAgama();
            if ($this->input->post()) 
            {
                $this->load->model('MsKelurahan');
                

                $config = array(
                    array(
                        'field' => 'namapencaker',
                        'label' => 'Nama Pencari Kerja',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'tempatlahir',
                        'label' => 'Tempat Lahir',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'tgllahir',
                        'label' => 'Tanggal Lahir',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Alamat Email',
                        'rules' => 'required|valid_email|callback_check_email'
                    ),
                    array(
                        'field' => 'idagama',
                        'label' => 'Agama',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'idstatuspernikahan',
                        'label' => 'Status Pernikahan',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'photo',
                        'label' => 'Foto Profil',
                        'rules' => 'callback_upload_image'
                    ),
                    array(
                        'field' => 'idkelurahan',
                        'label' => 'Kelurahan',
                        'rules' => 'required'
                    )

                );

                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE)
                {
                    $data['input'] = $this->input->post();
                    $this->template->load('frontend', 'pencaker/edit_profil', $data);
                }
                else
                {
                    $update = $this->MsPencaker->UpdateProfile($this->input->post(),$idpencaker);
                    if ($update) {
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Profil Berhasil Di Update", "success", "fa fa-check")</script>');
                        redirect('/');
                    }
                }


            }
            else
            {
                if ($getmspencakerdata != NULL)
                {

                    $this->template->load('frontend', 'pencaker/edit_profil', $data);
                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function check_email()
    {
        $iduser = $this->session->userdata('iduser');
        $this->load->model('MsPencaker');
        $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
        $this->load->model('MsPencakerTemp');
        $this->load->model('MsPerusahaan');
        $this->load->model('MsPerusahaanTemp');

        $input = $this->input->post();

        if ($this->MsPencaker->CekEmail($input['email'], $idpencaker)->num_rows() > 0) 
        {
            $this->form_validation->set_message('check_email', 'Email Sudah Digunakan');
            return FALSE;
        }
        else if ($this->MsPencakerTemp->CekEmail($input['email'], $idpencaker)->num_rows() > 0) 
        {
            $this->form_validation->set_message('check_email', 'Email Sudah Digunakan');
            return FALSE;
        }
        else if ($this->MsPerusahaan->CekEmailPemberiKerja($input['email'], NULL)->num_rows() > 0) 
        {
            $this->form_validation->set_message('check_email', 'Email Sudah Digunakan');
            return FALSE;
        }
        else if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($input['email'], NULL)->num_rows() > 0) 
        {
            $this->form_validation->set_message('check_email', 'Email Sudah Digunakan');
            return FALSE;
        }
        else
        {
            return TRUE;
        }


    }

    public function upload_image()
    {
        $iduser = $this->session->userdata('iduser');
        $this->load->model('MsPencaker');
        $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);

        $config['upload_path'] = './assets/file/pencaker';
        $config['max_size'] = 1024 * 10;
        $config['allowed_types'] = 'jpeg|jpg';
        $config['file_name'] = $idpencaker.".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        if(isset($_FILES['photo']) && !empty($_FILES['photo']['name']))
        {
            $namafile = $_FILES["photo"]["name"];
            $ext = pathinfo($namafile, PATHINFO_EXTENSION);

            if ($ext != 'jpg') 
            {
                $this->form_validation->set_message('upload_image', 'File gambar harus berformat *.jpg');
                return FALSE;
            }
            else if($_FILES['photo']['size'] > 2097152)
            {
                $this->form_validation->set_message('upload_image', 'Ukuran file logo maksimal 2 MB');
                return FALSE;
            }
            else if($this->upload->do_upload('photo'))
            {
                $upload_data = $this->upload->data();
                $_POST['photo'] = $upload_data['file_name'];
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
            $_POST['photo'] = NULL;
            return TRUE;
        }
    }

    public function editcv()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
            if ($getmspencakerdata != NULL)
            {
                $data['MsPencakerData'] = $getmspencakerdata;
                $this->load->model('MsStatusPendidikan');
                $data['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
                $this->load->model('MsJurusan');
                $data['MsJurusanData'] = $this->MsJurusan->GetJurusanByIDStatusPendidikan($getmspencakerdata->IDStatusPendidikan);
                $this->load->model('MsPosisiJabatan');
                $data['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
                // $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                if ($this->input->post()) 
                {
                    $config = array(
                        array(
                            'field' => 'idstatuspendidikan',
                            'label' => 'Pendidikan Terakhir',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'jurusan',
                            'label' => 'Jurusan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'keterampilan',
                            'label' => 'Keterampilan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'nemipk',
                            'label' => 'NEM / IPK',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'nilai',
                            'label' => 'Nilai',
                            'rules' => 'required|numeric'
                        ),
                        array(
                            'field' => 'tahunlulus',
                            'label' => 'Tahun Lulus',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'tinggibadan',
                            'label' => 'Tinggi Badan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'beratbadan',
                            'label' => 'Berat Badan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idposisijabatan',
                            'label' => 'Posisi Jabatan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'lokasi',
                            'label' => 'Lokasi',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'upahyangdicari',
                            'label' => 'Gaji yang di inginkan',
                            'rules' => 'required'
                        )

                    );

                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['input'] = $this->input->post();
                        $this->template->load('frontend', 'pencaker/edit_cv', $data);
                    }
                    else
                    {
                        $update = $this->MsPencaker->UpdateCV($this->input->post(),$idpencaker);
                        if ($update) {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("CV Berhasil Di Update", "success", "fa fa-check")</script>');
                            redirect('/');
                        }
                    }
                }
                else
                {
                    $this->template->load('frontend', 'pencaker/edit_cv', $data);
                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function editbahasa()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $this->load->model('MsBahasa');
                $getmsbahasadata = $this->MsBahasa->GetMsBahasaByIDPencaker($idpencaker);
                $data['MsBahasaData'] = $getmsbahasadata;
                // $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('frontend','pencaker/edit_bahasa', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function editpengalaman()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $this->load->model('MsPengalaman');
                $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencaker($idpencaker);
                $data['MsPengalamanData'] = $getmspengalamandata;
                $data['route'] = $this->uri->segment(2);
                $this->load->view('index',$data);
            }
        }
    }

    public function dodeletebahasa()
    {
        if ($this->ispencaker())
        {
            if ($this->uri->segment(3) != NULL)
            {
                $idbahasa = $this->uri->segment(3);
                $iduser = $this->session->userdata('iduser');
                $this->load->model('MsPencaker');
                $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
                if ($idpencaker != NULL)
                {
                    $this->load->model('MsBahasa');
                    $this->MsBahasa->Delete($idbahasa, $idpencaker);
                    redirect("pencaker/editbahasa");
                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function cekpengalaman()
    {
        if ($this->ispencaker()) 
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            
            if ($idpencaker != NULL)
            {
                $this->load->model('MsPengalaman');
                $cek = $this->MsPengalaman->GetMsPengalamanByIDPencaker($idpencaker);
                if($cek->num_rows >= 3)
                {
                    $data['status'] = FALSE;
                }
                else
                {
                    $data['status'] = TRUE;
                }
            }
            else
            {
                $data['status'] = TRUE;
            }

            echo json_encode($data);
        } 
        else 
        {
            # code...
        }
        
    }

    public function getdatapengalaman()
    {
        if ($this->ispencaker())
        {
            if ($this->uri->segment(3) != NULL)
            {
                $idpengalaman = $this->uri->segment(3);
                $input = $this->input->post();
                $this->load->model('MsPengalaman');
                $getmspengalaman = $this->MsPengalaman->GetMsPengalamanByIDPengalaman($idpengalaman);
                if ($getmspengalaman != NULL)
                {
                    $data['IDPengalaman'] = $getmspengalaman->IDPengalaman;
                    $data['Jabatan'] = $getmspengalaman->Jabatan;
                    $data['NamaPerusahaan'] = $getmspengalaman->NamaPerusahaan;
                    $data['UraianKerja'] = $getmspengalaman->UraianKerja;
                    $data['TglMasuk'] = $getmspengalaman->TglMasuk;
                    $data['TglBerhenti'] = $getmspengalaman->TglBerhenti;
                    $data['StatusPekerjaan'] = $getmspengalaman->StatusPekerjaan;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function dodeletepengalaman()
    {
        if ($this->ispencaker())
        {
            $input = $this->input->post();
            if ($input['IDPengalaman'] == '')
            {
                $data['valid'] = false;
                $data['error'] = "Pengalaman belum dipilih";
            }
            else
            {
                $iduser = $this->session->userdata('iduser');
                $this->load->model('MsPencaker');
                $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
                if ($idpencaker != NULL)
                {
                    $this->load->model('MsPengalaman');
                    if ($this->MsPengalaman->Delete($input['IDPengalaman'], $idpencaker))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pengalaman Berhasil Di Hapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Pengalaman gagal dihapus";
                    }
                }
            }
            echo json_encode($data);
        }
        else
        {
            redirect();
        }
    }

    public function getdata()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
            if ($getmspencakerdata != NULL)
            {
                $data['exists'] = true;
                $data['NamaPencaker'] = $getmspencakerdata->NamaPencaker;
            }
            else
            {
                $data['exists'] = false;
            }
        }
        else
        {
            redirect();
        }
    }

    public function getlowongan()
    {
        if($this->ispencaker())
        {
            $idlowongan = $this->uri->segment(3);
            $this->load->model('MsLowongan');
            $datalowongan = $this->MsLowongan->GetMsLowonganByIDLowongan($idlowongan);
            if($datalowongan != NULL)
            {
                $data['exists'] = TRUE;
                foreach ($datalowongan as $key => $value) {
                    $data[$key] = $value;
                }
            }
            else
            {
                $data['exists'] = FALSE;
            }
            echo json_encode($data);

            
        }
        else
        {
            redirect('','refresh');
        }
    }
    public function lowongan()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsLowongan');
                $getmslowongan = $this->MsLowongan->GetGridMsLowonganByIDPencaker($idpencaker,10,$page);
                $config['total_rows'] = $this->MsLowongan->GetCountMsLowonganByIDPencakerAll($idpencaker)->total_rows;
                $data['MsLowonganData'] = $getmslowongan;
                $config['uri_segment'] = 3;
                $config['base_url'] = site_url('pencaker/lowongan');
                $config['per_page'] = 10;
                $config["num_links"]        = 3;
                $config['next_link']        = '&raquo;';
                $config['prev_link']        = '&laquo;';
                $config['full_tag_open']    = '<div class="pagging text-left"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Selanjutnya</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                $this->pagination->initialize($config);
                // $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('frontend', 'pencaker/daftar_lowongan', $data);
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

    public function perusahaan()
    {
        if ($this->ispencaker())
        {
            $iduser = $this->session->userdata('iduser');
            $this->load->model('MsPencaker');
            $idpencaker = $this->MsPencaker->GetIDPencakerByIDUser($iduser);
            if ($idpencaker != NULL)
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsPerusahaan');
                $getmsperusahaan = $this->MsPerusahaan->GetGridMsPerusahaan(10,$page);
                $config['total_rows'] = $this->MsPerusahaan->GetCountMsPerusahaan()->total_rows;
                $data['MsPerusahaanData'] = $getmsperusahaan;
                $config['uri_segment'] = 3;
                $config['base_url'] = site_url('pencaker/perusahaan');
                $config['per_page'] = 10;
                $this->pagination->initialize($config);
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('frontend', 'pencaker/daftar_perusahaan', $data);
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

    public function registerlowongan()
    {
        if ($this->ispencaker())
        {
            $idlowongan = $this->uri->segment(3);
            $this->load->model('MsLowongan');
            $getmslowongandata = $this->MsLowongan->GetMsLowonganByIDLowongan($idlowongan);
            if ($getmslowongandata != NULL)
            {
                $this->load->model('MsPerusahaan');
                $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDLowongan($idlowongan);
                if ($getmsperusahaandata != NULL)
                {
                    $iduser = $this->session->userdata('iduser');
                    $this->load->model('MsPencaker');
                    $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
                    if ($getmspencakerdata != NULL)
                    {
                        $this->load->model('TrLowonganMasuk');

                        //check trlowongan data is exists
                        $num = $this->TrLowonganMasuk->GetCountByPencakerID($getmspencakerdata->IDPencaker, $idlowongan);
                        if ($num == 0 || empty($num))
                        {
                            $this->TrLowonganMasuk->Insert($idlowongan,$getmspencakerdata->IDPencaker);

                            $this->load->library('PHPMailer');
                            $this->load->library('SMTP');

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
                            $mail->addAddress($this->session->userdata('email'));
                            $mail->AddEmbeddedImage('assets/img-cv.png', 'cv');
                            $mail->Subject          = 'CV Berhasil Dikirim Ke '.$getmsperusahaandata->NamaPerusahaan;
                            $mail_data['subject']   = 'CV Berhasil Dikirim Ke '.$getmsperusahaandata->NamaPerusahaan;
                          
                            $message = $this->load->view('email_cv', $mail_data, TRUE);
                            $mail->Body = $message;
                            if ($mail->send()) {
                             $this->session->set_flashdata('notifikasi', '<script>notifikasi("CV anda berhasil dikirim ke "'.$getmsperusahaandata->NamaPerusahaan.', "success", "fa fa-success")</script>');
                         } else {
                          echo 'Message could not be sent.';
                          echo 'Mailer Error: ' . $mail->ErrorInfo;
                      }

                  }
                  else
                  {   
                   $this->session->set_flashdata('notifikasi', '<script>notifikasi("Anda sudah pernah mengirimkan CV untuk loker '.$getmslowongandata->NamaLowongan.'", "warning", "fa fa-warning")</script>');
               }
                       redirect('pencaker/lowongan');
           }
           else
           {
            redirect();
        }
    }
}
}
else
{
    redirect();
}
}

public function doupdatepassword()
{
    if ($this->ispencaker())
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

public function aktivasi()
{
    if ($this->ispencaker())
    {
        $iduser = $this->session->userdata('iduser');
        $this->load->model('MsPencaker');
        $getmspencaker = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
        if ($getmspencaker != NULL)
        {
            $this->load->model('MsAktivasi');
            if ($this->MsAktivasi->GetIDAktivasiByIDPencaker($getmspencaker->IDPencaker) == NULL)
            {
                $idaktivasi = $this->MsAktivasi->Insert($getmspencaker->IDPencaker);
                if ($idaktivasi != NULL)
                {
                    $this->seterrormsg(NULL,"Konfirmasi Aktivasi berhasil dikirim.<br />Jika akun telah diaktifkan, kami akan mengirimkan pemberitahuan ke email anda(<b>".$getmspencaker->Email."<b/>).");
                }
                else
                {
                    $this->seterrormsg(NULL,"Konfirmasi Aktivasi gagal dikirim.");
                }
                redirect();
            }
            else
            {
                $this->seterrormsg(NULL,"Aktivasi telah dikirimkan sebelumnya,<br />Menunggu konfirmasi dari admin.");
                redirect();
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

function ispencaker()
{
    $iduser = $this->session->userdata('iduser');
    if ($iduser != '')
    {
        $this->load->model('MsUser');
        $getmsuser = $this->MsUser->GetMsUserByIDUser($iduser);
        if ($getmsuser != NULL)
        {
            if ($getmsuser->IDJenisUser == '000002')
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

    if ($this->ispencaker())
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

public function update_password()
{
    if ($this->ispencaker())
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

function do_upload($fname)
{
    $config['upload_path'] = './assets/file/pencaker/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '20480';
    $config['max_width']  = '3264';
    $config['max_height']  = '2448';
    $config['file_name'] = date('dmYhis');

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($fname))
    {
        $error = array('error' => $this->upload->display_errors());

        return false;
    }
    else
    {
        $data = $this->upload->data();
        return $data['file_name'];
    }

}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */