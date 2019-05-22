<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class root extends CI_Controller {

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
//                $var = explode('/',$_SERVER['REQUEST_URI']);
//                if (count($var) > 2)
//                {
//                        if ($var[2] != null)
//                        {
//                                redirect(base_url());
//                        }
//                }
        $getsession = $this->session->all_userdata();
        if (isset($getsession['iduser']))
        {
            if ($getsession['idjenisuser'] == '000000')
            {
                redirect('admin/newpencaker');
            }
            else if ($getsession['idjenisuser'] == '000001')
            {
                redirect('perusahaan/index');
            }
            else if ($getsession['idjenisuser'] == '000002')
            {
                $this->load->model('MsPencaker');
                $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($getsession['iduser']);
                if ($getmspencakerdata != NULL)
                {
                    $data['IDPencaker'] = $getmspencakerdata->IDPencaker;
                    $data['MsPencakerData'] = $getmspencakerdata;
                    $this->load->model('MsBahasa');
                    $data['MsBahasaData'] = $this->MsBahasa->GetMsBahasaByIDPencaker($getmspencakerdata->IDPencaker);
                    $this->load->model('MsPengalaman');
                    $data['MsPengalamanData'] = $this->MsPengalaman->GetMsPengalamanByIDPencaker($getmspencakerdata->IDPencaker);
                    $data['route'] = $this->uri->segment(2);
                                        // $this->load->view('index',$data); 
                    $this->template->load('frontend', 'pencaker/profil',$data);
                }
                else
                {
                    redirect();
                }
            }
        }
        else 
        {
            $this->load->model('MsLowongan');
            $getmslowongan = $this->MsLowongan->GetGridMsLowongan(5,NULL);
            $data['MsLowonganData'] = $getmslowongan->result();
            $data['CountMsLowonganData'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
            
            $this->load->model('MsBerita');
            $getmsberita = $this->MsBerita->GetGridMsBerita(5,NULL);
            $data['MsBeritaData'] = $getmsberita->result();
            $data['CountMsBeritaData'] = $this->MsBerita->GetCountMsBerita()->total_rows;
            
            $this->load->model('MsEvent');
            $getmsevent = $this->MsEvent->GetGridMsEvent(5,NULL);
            $data['MsEventData'] = $getmsevent->result();
            $data['CountMsEventData'] = $this->MsEvent->GetCountMsEvent()->total_rows;
            $this->template->load('frontend', 'master/home', $data);
        }
    }

    public function getlowongan()
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
    
    public function berita()
    {
        if ($this->uri->segment(2) == "view")
        {
            $idberita = $this->uri->segment(3);
            if ($idberita != NULL)
            {
                $this->load->model('MsBerita');
                $getmsberita = $this->MsBerita->GetMsBeritaByIDBerita($idberita);
                if ($getmsberita != NULL)
                {
                    $data['MsBeritaData'] = $getmsberita;
                    $data['route'] = $this->uri->segment(1).'/'.$this->uri->segment(2);
                                        // $this->load->view('index2',$data);
                    $this->template->load('frontend', 'master/view_berita', $data);
                }
                else
                {
                    
                }
            }
            else
            {
                redirect('berita');
            }
        }
        else
        {
            $page = $this->uri->segment(2);
            $this->load->model('MsBerita');
            $getmsberita = $this->MsBerita->GetGridMsBerita(10,$page);
            $data['MsBeritaData'] = $getmsberita->result();
            
            $config['base_url'] = site_url('berita');
            $config['total_rows'] = $this->MsBerita->GetCountMsBerita()->total_rows;
            $config['per_page'] = 10;
                        $config["uri_segment"] = 2;  // uri parameter
                        $choice = $config["total_rows"] / $config["per_page"];
                        $config["num_links"] = floor($choice);


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
                        $data['route'] = $this->uri->segment(1);
                        $this->load->view('index2',$data);
                    }
                }
                
                public function event()
                {
                    if ($this->uri->segment(2) == "view")
                    {
                        $idevent = $this->uri->segment(3);
                        if ($idevent != NULL)
                        {
                            $this->load->model('MsEvent');
                            $getmsevent = $this->MsEvent->GetMsEventByIDEvent($idevent);
                            if ($getmsevent != NULL)
                            {
                                $data['MsEventData'] = $getmsevent;
                                $data['route'] = $this->uri->segment(1).'/'.$this->uri->segment(2);
                                $this->load->view('index2',$data);
                            }
                            else
                            {
                                
                            }
                        }
                        else
                        {
                            redirect('event');
                        }
                    }
                    else
                    {
                        $page = $this->uri->segment(2);
                        $this->load->model('MsEvent');
                        $getmsberita = $this->MsEvent->GetGridMsEvent(10,$page);

                        $data['MsEventData'] = $getmsberita->result();

                        $config['base_url'] = site_url('event');
                        $config['total_rows'] = $this->MsEvent->GetCountMsEvent()->total_rows;
                        $config['per_page'] = 10;
                        $config["uri_segment"] = 2;  // uri parameter
                        $choice = $config["total_rows"] / $config["per_page"];
                        $config["num_links"] = floor($choice);


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
                        $data['route'] = $this->uri->segment(1);
                        $this->load->view('index2',$data);
                    }
                }
                
                public function register($getid)
                {
                    $iduser = $this->session->userdata('iduser');
                    if ($iduser == "")
                    {
                        $data['route'] = $this->uri->segment(1);
                        $this->load->model('MsKecamatan');
                        $data['MsKecamatanData'] = $this->MsKecamatan->GetComboMsKecamatan();
                        $this->load->model('MsKelurahan');
                        $data['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan('');
                        if ($getid == 1)
                        {
                            $this->load->model('MsBidangPerusahaan');
                            $data['MsBidangPerusahaanData'] = $this->MsBidangPerusahaan->GetComboMsBidangPerusahaan();
                            $data['title'] = 'Pendaftaran Perusahaan';
                            if ($this->input->post()) 
                            {
                                $input = $this->input->post();
                                
                                $config = array(
                                    array(
                                        'field' => 'username',
                                        'label' => 'Nama Pengguna',
                                        'rules' => 'trim|required|min_length[4]|callback_check_username'
                                    ),
                                    array(
                                        'field' => 'password',
                                        'label' => 'Kata Sandi',
                                        'rules' => 'trim|required|min_length[4]'
                                    ),
                                    array(
                                        'field' => 'password2',
                                        'label' => 'Kata Sandi Konfirmasi',
                                        'rules' => 'trim|required|min_length[4]|matches[password]'
                                    ),
                                    array(
                                        'field' => 'namaperusahaan',
                                        'label' => 'Nama Perusahaan',
                                        'rules' => 'trim|required'
                                    ),
                                    array(
                                        'field' => 'idbidangperusahaan',
                                        'label' => 'Bidang Perusahaan',
                                        'rules' => 'required'
                                    ),
                                    array(
                                        'field' => 'email',
                                        'label' => 'Email Perusahaan',
                                        'rules' => 'trim|required|valid_email|callback_check_email'
                                    ),
                                    array(
                                        'field' => 'telepon',
                                        'label' => 'Nomor Telepon',
                                        'rules' => 'trim|required|numeric'
                                    ),
                                    array(
                                        'field' => 'alamat',
                                        'label' => 'Alamat',
                                        'rules' => 'trim|required'
                                    ),
                                    array(
                                        'field' => 'kodepos',
                                        'label' => 'Kode Pos',
                                        'rules' => 'trim|required|numeric'
                                    ),
                                    array(
                                        'field' => 'idkelurahan',
                                        'label' => 'Kelurahan',
                                        'rules' => 'required'
                                    ),
                                    array(
                                        'field' => 'kota',
                                        'label' => 'Kelurahan',
                                        'rules' => 'required'
                                    ),
                                    array(
                                        'field' => 'propinsi',
                                        'label' => 'Kelurahan',
                                        'rules' => 'required'
                                    ),
                                    array(
                                        'field' => 'namapemberikerja',
                                        'label' => 'Nama Pemberi Kerja',
                                        'rules' => 'trim|required'
                                    ),
                                    array(
                                        'field' => 'jabatanpemberikerja',
                                        'label' => 'Jabatan Pemberi Kerja',
                                        'rules' => 'trim|required'
                                    ),
                                    array(
                                        'field' => 'teleponpemberikerja',
                                        'label' => 'Nomor Telepon Pemberi Kerja',
                                        'rules' => 'trim|required|numeric'
                                    ),
                                    array(
                                        'field' => 'emailpemberikerja',
                                        'label' => 'Email Pemberi Kerja',
                                        'rules' => 'trim|required|valid_email|callback_check_email'
                                    )
                                );

$this->form_validation->set_rules($config);

if ($this->form_validation->run() == FALSE)
{
    $data['input'] = $input;
    $this->template->load('frontend', 'perusahaan/register', $data);
}
else
{

    $this->load->model('MsPerusahaanTemp');
    $registerdate = date('Y-m-d H:i:s');
    $getidperusahaan = $this->MsPerusahaanTemp->Insert($input,$registerdate);
    
    if ($getidperusahaan != NULL)
    {
        $this->load->model('EmailModel', 'mail');
        $send_to = $input['emailpemberikerja'];
        $subject = 'Pendaftaran Perusahaan Baru - BKOL Depok';
        $message = 'Data Perusahaan anda telah terdaftar.<br />
        Terimakasih Telah Mendaftar di BKOL Kota Depok<br />Data Pendaftaran perusahaan anda sedang menunggu verifikasi dari admin mohon untuk menunggu konfirmasi, notifikasi akan di kirimkan melalui email. <br /><br /><br /><br />
        <i>Email ini di generate oleh sistem, Mohon untuk tidak membalas email ini</i>';

        $this->mail->sendEmail($send_to,$subject,$message);
        
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data anda berhasil terdaftar. Mohon Tunggu konfirmasi terlebih dahulu, notifikasi pendaftaran akan di kirimkan melalui email, cek email secara berkala", "success", "fa fa-check")</script>');
    }
    else
    {
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pendaftaran Gagal", "danger", "fa fa-exclamation")</script>');
    }
    redirect("register/1");
}
}
else
{
    $this->template->load('frontend', 'perusahaan/register', $data);
}
}
else if ($getid == 2)
{
    $this->load->model('MsStatusPernikahan');
    $data['MsStatusPernikahanData'] = $this->MsStatusPernikahan->GetComboMsStatusPernikahan();
    $this->load->model('MsAgama');
    $data['MsAgamaData'] = $this->MsAgama->GetComboMsAgama();
    $this->load->model('MsStatusPendidikan');
    $data['MsStatusPendidikanData'] = $this->MsStatusPendidikan->GetComboMsStatusPendidikan();
    $this->load->model('MsPosisiJabatan');
    $data['MsPosisiJabatanData'] = $this->MsPosisiJabatan->GetComboMsPosisiJabatan();
    $this->load->model('MsJurusan');
    $data['MsJurusanData'] = $this->MsJurusan->GetComboMsJurusan();
    $data['title'] = 'Pendaftaran Pencari Kerja';
    if ($this->input->post()) 
    {
        $input = $this->input->post();
        $input['MsKelurahanData'] = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($input['idkecamatan']);
        $input['nomorindukpencaker'] = str_replace("-","",$input['nomorindukpencaker']);
        $input['nomorindukpencaker'] = str_replace(" ","",$input['nomorindukpencaker']);

        $config = array(
            array(
                'field' => 'username',
                'label' => 'Nama Pengguna',
                'rules' => 'trim|required|min_length[4]|callback_check_username'
            ),
            array(
                'field' => 'password',
                'label' => 'Kata Sandi',
                'rules' => 'trim|required|min_length[4]'
            ),
            array(
                'field' => 'password2',
                'label' => 'Kata Sandi Konfirmasi',
                'rules' => 'trim|required|min_length[4]|matches[password]'
            ),
            array(
                'field' => 'nomorindukpencaker',
                'label' => 'Nomor KTP',
                'rules' => 'trim|required|callback_check_nik'
            ),
            array(
                'field' => 'namapencaker',
                'label' => 'Nama Pencari Kerja',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'jeniskelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ),
            array(
                'field' => 'tempatlahir',
                'label' => 'Tempat Lahir',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'tgllahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => 'Alamat Email',
                'rules' => 'trim|required|valid_email|callback_check_email'
            ),
            array(
                'field' => 'telepon',
                'label' => 'Nomor Telepon',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'kodepos',
                'label' => 'Kode Pos',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'rules' => 'required'
            ),
            array(
                'field' => 'idkelurahan',
                'label' => 'Kelurahan',
                'rules' => 'required'
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
                'rules' => 'trim|required'
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
                'rules' => 'required|greater_than[0]'
            ),
            array(
                'field' => 'beratbadan',
                'label' => 'Berat Badan',
                'rules' => 'required|greater_than[0]'
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
                'rules' => 'required|greater_than[0]'
            ),
            array(
                'field' => 'photo',
                'label' => 'Foto',
                'rules' => 'callback_upload_image'
            )
        );

                    // $this->form_validation->set_rules($config);


$jumlah = 3;

for($a=1; $a<$jumlah+1; $a++)
{
    $data_jabatan[]=$this->input->post('jabatan'.$a);
    $data_perusahaan[]=$this->input->post('perusahaan'.$a);
    $data_status[]=$this->input->post('kerja_'.$a);
    $data_tglmasuk[]=$this->input->post('tglmasuk'.$a);
    $data_tglkeluar[]=$this->input->post('tglkeluar'.$a);
}

$registerdate = date('Y-m-d H:i:s');
$this->load->model('MsPencakerTemp');
$getid=$this->MsPencakerTemp->GetLastID();
$tangalid= date('d-m-Y');
$rubahidkecamatan=$input['idkecamatan']*1;
$rubahidkelurahan=$input['idkelurahan']*1;
$idpencakerok=$input['nomorindukpencaker']+$rubahidkelurahan+$rubahidkecamatan;


$getidpencakertemp = $this->MsPencakerTemp->Insert($input,$registerdate,$jumlah,$data_jabatan,$data_perusahaan,$data_status,$data_tglmasuk,$data_tglkeluar,$idpencakerok);

if ($getidpencakertemp != NULL)
{
    
    $this->load->model('EmailModel', 'mail');

    $send_to = $input['email'];
    $subject = 'Pendaftaran Pencari Kerja Baru - BKOL Depok';
    $message = 'Hi. '.$input['namapencaker'].' Data anda telah berhasil terdaftar.
    <br /><br />
    Terimakasih Telah Mendaftar di BKOL Kota Depok<br />
    Pendaftaran anda sedang menunggu verifikasi admin, notifikasi akan di kirimkan melalui email. <br /><br /><br /><br />
    <i>Email ini di generate oleh sistem, Mohon untuk tidak membalas email ini</i>';

    $this->mail->sendEmail($send_to,$subject,$message);
    
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Data anda berhasil terdaftar. Mohon Tunggu konfirmasi terlebih dahulu. Konfirmasi akan dikirimkan ke email anda.", "success", "fa fa-check")</script>');
}
else
{
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pendaftaran gagal.", "danger", "fa fa-exclamation")</script>');
}

redirect('register/2');
}
else
{
    $this->template->load('frontend', 'pencaker/register', $data);
}
}
}
else
{
    redirect();
}
}

public function dataperusahaan()
{
    $iduser = $this->session->userdata('iduser');
    if ($iduser == '')
    {
        $this->load->model('MsPerusahaan');
        $getmsperusahaan = $this->MsPerusahaan->GetGridMsPerusahaan(10,$this->uri->segment(2));
        $data['MsPerusahaanData'] = $getmsperusahaan;
        
        $config['base_url'] = site_url('dataperusahaan');
        $config['total_rows'] = $this->MsPerusahaan->GetCountMsPerusahaan()->total_rows;
        $config['per_page'] = 10;
                        $config["uri_segment"] = 2;  // uri parameter
                        $choice = $config["total_rows"] / $config["per_page"];
                        $config["num_links"] = floor($choice);


                        $config['first_link']       = 'Awal';
                        $config['last_link']        = 'Akhir';
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
                        $data['route'] = "dataperusahaan";
                        $this->load->view('index2',$data);
                    }
                    else
                    {
                        redirect();
                    }
                }
                
                public function datapencaker()
                {
                    $input = $this->input->post();
                    $this->session->set_userdata("fromdate",$input['fromdate']);
                    $this->session->set_userdata("todate",$input['todate']);
                    $data['fromdate'] = $input['fromdate'];
                    $data['todate'] = $input['todate'];
                    $page = $this->uri->segment(2);
                    $this->load->model('MsPencaker');
                    
                    if ($data['fromdate'] == '' || $data['todate'] == '')
                    {
                        $getmspencaker = $this->MsPencaker->GetGridMsPencaker(10,$page);
                        $getcount = $this->MsPencaker->GetCountMsPencakerByGender();
                    }
                    else
                    {
                        $getmspencaker = $this->MsPencaker->GetGridMsPencakerByDate($data['fromdate'],$data['todate'],10,$page);
                        $getcount = $this->MsPencaker->GetCountMsPencakerByDate($data['fromdate'],$data['todate']);
                    }
                    $totalpria = 0;
                    $totalwanita = 0;
                    
                    if ($getcount->total_rows > 0) {
                        $totalpria = $getcount->TotalPria;
                        $totalwanita = $getcount->TotalWanita;
                    }

                    $data['TotalPria'] = $totalpria;
                    $data['TotalWanita'] = $totalwanita;
                    $data['MsPencakerData'] = $getmspencaker;
                    $config['uri_segment'] = 2;
                    $config['base_url'] = site_url('datapencaker');
                    $config['total_rows'] = $getcount->total_rows;
                    $config['per_page'] = 10;
                    $this->pagination->initialize($config);
                    $data['route'] = $this->uri->segment(1);
                    $this->load->view('index2',$data);
                    
                    
                // $this->load->model('MsLowongan');
                // $page = $this->uri->segment(3);
                // if ($data['fromdate'] == '' || $data['todate'] == '')
                // {
                //         $getmslowongan = $this->MsLowongan->GetGridMsLowongan(10,$page);
                //         $getcount = $this->MsLowongan->GetCountMsLowongan();
                // }
                // else
                // {
                //         $getmslowongan = $this->MsLowongan->GetGridMsLowonganByDate($data['fromdate'],$data['todate'],10,$page);
                //         $getcount = $this->MsLowongan->GetCountMsLowonganByDate($data['fromdate'],$data['todate']);
                // }
                // $data['MsLowonganData'] = $getmslowongan;
                // $config['base_url'] = site_url('perusahaan/lowongan');
                // $config['total_rows'] = $getcount->total_rows;
                // $config['per_page'] = 10;
                // $this->pagination->initialize($config);
                // $data['route'] = 'lowongan';
                // $this->load->view('index',$data);
                }
                
                public function datalowongan()
                {
                    $page = $this->uri->segment(2);
                    $this->load->model('MsLowongan');
                    $getmslowongan = $this->MsLowongan->GetGridMsLowongan(10,$page);
                    $data['MsLowonganData'] = $getmslowongan;
                    $data['CountMsLowonganData'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
                    
                    $config['uri_segment']          = 2;
                    $config['base_url']             = site_url('datalowongan');
                    $config['total_rows']           = $this->MsLowongan->GetCountMsLowongan()->total_rows;
                    $config['per_page']             = 10;
                    $config["num_links"]            = 3;
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


                    $this->template->load('frontend', 'master/daftar_lowongan', $data);
                }

                public function kategori()
                {
                    $data['route'] = $this->uri->segment(1);
                    $this->load->view('index',$data); 
                }
                
                public function persyaratan()
                {
                    if ($this->uri->segment(2) == 1 || $this->uri->segment(2) == 2) 
                    {
                        $this->template->load('frontend', 'master/persyaratan');
                    }
                    else
                    {
                        redirect('');
                    }
                }
                
                public function statistik()
                {
                    if ($this->uri->segment(3) != '')
                    {
                        $tahun = $this->uri->segment(3);
                        $bulan = $this->uri->segment(4);
                        $this->load->model('MsKecamatan');
                        $getmskecamatandata = $this->MsKecamatan->GetGridStatisticPencakerByBulanTahun($tahun,$bulan);
                        $data['MsKecamatanData'] = $getmskecamatandata->result();
                        $data['route'] = "statistik";
                        $this->load->view('index',$data);
                    }
                    else
                    {
                        $this->load->model('MsKecamatan');
                        $getmskecamatandata = $this->MsKecamatan->GetGridStatisticPencakerByBulanTahun('','');
                        $data['MsKecamatanData'] = $getmskecamatandata->result();
                        $data['route'] = "statistik";
                        $this->load->view('index',$data); 
                    }
                }
                
                public function lupasandi()
                {
                    $data['route'] = $this->uri->segment(1);
                    $this->load->view('index2',$data); 
                }
                
                public function kirimsandi()
                {
                    $this->load->model('EmailModel');
                    echo @$this->EmailModel->sendEmail('pt.aozora@yahoo.com','Subject','Hello World');
                }
                
                public function ubahsandi()
                {
                    $data['route'] = $this->uri->segment(1);
                    $this->load->view('index',$data); 
                }
                
                public function updatewebstatistic()
                {
                    $this->load->model('MsWebStatistic');
                    $this->MsWebStatistic->AddCountStatistic();
                }
                
                public function getwebstatistic()
                {
                    $this->load->model('ci_sessions');
                    $data['Online'] = $this->ci_sessions->GetCountOnline()->Online;
                    $this->load->model('MsWebStatistic');
                    $data['TotalVisited'] = $this->MsWebStatistic->GetCountStatistic()->TotalVisited;
                    echo json_encode($data);
                }

                function GetKelurahan($id = NULL)
                {
                    $cmbkelurahan = '<option value="">(Pilih Kelurahan)</option>';
                    $this->load->model('MsKelurahan');
                    $getdata = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($id);
                    foreach ($getdata as $row)
                    {
                        $cmbkelurahan .= '<option value="'.$row->IDKelurahan.'">'.$row->NamaKelurahan.'</option>';
                    }
                    echo $cmbkelurahan;
                }

                function GetKeahlian($id = NULL)
                {
                    $cmbkeahlian = '<option value="">(Pilih Keahlian)</option>';
                    $this->load->model('MsKeahlian');
                    $getdata = $this->MsKeahlian->GetComboMsKeahlianByIDJenisLowongan($id);
                    foreach ($getdata as $row)
                    {
                        $cmbkeahlian .= '<option value="'.$row->IDKeahlian.'">'.$row->NamaKeahlian.'</option>';
                    }
                    echo $cmbkeahlian;
                }

                function GetJurusan($id = NULL) 
                {
                    $this->load->model('MsJurusan');
                    $jurusan = $this->MsJurusan->GetJurusanByIDStatusPendidikan($id);
                    die(json_encode($jurusan));
                }

                public function check_username()
                {
                    if ($this->input->post()) 
                    {
                        $username = $this->input->post('username');
                        $this->load->model('MsPencakerTemp');
                        $this->load->model('MsUser');
                        $input = $this->input->post();
                        if (isset($input['namaperusahaan']))
                            $idjenisuser = '000001';
                        else
                            $idjenisuser = '000002';

                        if ($this->MsUser->CekUsername($username,$idjenisuser)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_username', 'Nama pengguna sudah digunakan');
                            return FALSE;
                        }
                        else if ($this->MsPencakerTemp->CekUsername($username)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_username', 'Nama pengguna sudah digunakan');
                            return FALSE;
                        }
                        else if (preg_match('#\W#', $username) && preg_match('/\s/', $username))
                        {
                            $this->form_validation->set_message('check_username', 'Nama Pengguna tidak boleh mengandung simbol & spasi');
                            return FALSE;
                        }
                        else
                        {
                            return TRUE;
                        }

                    }
                }

                public function check_nik()
                {
                    if ($this->input->post()) 
                    {
                        $nik = $this->input->post('nomorindukpencaker');
                        $this->load->model('MsPencaker');
                        $this->load->model('MsPencakerTemp');

                        if ($this->MsPencaker->CekNomorIndukPencaker($nik, NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_nik', 'Nomor KTP sudah digunakan');
                            return FALSE;
                        }
                        else if ($this->MsPencakerTemp->CekNomorIndukPencaker($nik, NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_nik', 'Nomor KTP sudah digunakan');
                            return FALSE;
                        }
            // else if (substr($nik,0,4) != "3276")
            // {
            //     $this->form_validation->set_message('check_nik', 'Nomor KTP harus KTP kota Depok');
            //     return FALSE;
            // }
                        else
                        {
                            return TRUE;
                        }

                    }
                }

                public function upload_image()
                {
                    $this->load->model('MsPencakerTemp');
                    $idpencaker = $this->MsPencakerTemp->GetLastID();

                    $config['upload_path'] = './assets/file/temp';
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
                        else if(filesize($_FILES['photo']['tmp_name']) > 2097152)
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

                public function check_email()
                {
                    if ($this->input->post()) 
                    {
                        $email = $this->input->post('email');
                        $this->load->model('MsPencaker');
                        $this->load->model('MsPencakerTemp');
                        $this->load->model('MsPerusahaan');
                        $this->load->model('MsPerusahaanTemp');

                        if ($this->MsPencaker->CekEmail($email,NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_email', 'Alamat Email sudah digunakan');
                            return FALSE;
                        }
                        else if ($this->MsPencakerTemp->CekEmail($email,NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_email', 'Alamat Email sudah digunakan');
                            return FALSE;
                        }
                        else if ($this->MsPerusahaan->CekEmailPemberiKerja($email,NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_email', 'Alamat Email sudah digunakan');
                            return FALSE;
                        }
                        else if ($this->MsPerusahaanTemp->CekEmailPemberiKerja($email,NULL)->num_rows() > 0) 
                        {
                            $this->form_validation->set_message('check_email', 'Alamat Email sudah digunakan');
                            return FALSE;
                        }
                        else
                        {
                            return TRUE;
                        }

                    }
                }

                public function api_lowongan()
                {
                    $page = $this->uri->segment(2);
                    $this->load->model('MsLowongan');
                    $rows = $this->MsLowongan->GetGridMsLowongan(10, $page)->result_array();
                    $arr = array();

                    foreach($rows as $r)
                    {
                        $arr = $r;
                        $arr['image'] = base_url('assets/file/perusahaan/').$r['IDPerusahaan'].'.jpg';
                        $data['data'][] = $arr;
                        $arr = array();
                    }


                    $config['uri_segment'] = 2;
                    $config['base_url'] = site_url('datalowongan');
                    $config['total_rows'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
                    $config['per_page'] = 10;
                    $this->pagination->initialize($config);
                    $data['total_rows'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
                    echo json_encode($data);
                }
                
            }

            /* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */