<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {


    public function index()
    {
        if ($this->session->userdata('iduser') == NULL)
        {
            // $data['route'] = $this->uri->segment(1);
            $this->load->view('admin/login', $data);
            // $this->load->view('index2',$data); 
        }
        else
        {
            redirect('admin/newpencaker', 'refresh');
        }
    }

    public function logout()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL)
        {
            $this->load->model('MsUser');
            $this->MsUser->Logout($iduser);
            $this->load->model('MsPencakerTemp');
            date_default_timezone_get("Asia/Jakarta");
            $time = date("Y-m-d");
            $userlist = $this->db->query("SELECT * FROM mspencakertemp ORDER BY IDPencakerTemp DESC")->result_array();
            foreach ($userlist as $keylist) {
                $date = date_create($keylist['RegisterDate']);
                $dateDB = date_format($date, "Y-m-d");
                $diff = abs(strtotime($time) - strtotime($dateDB));
                $total = floor(($diff)/ (60*60*24));
                if ($total >= 14) {
                    var_dump($total);
                    $path = 'assets/file/temp'.'/'.$keylist['IDPencakerTemp'].'.jpg';

                    $this->db->delete('mspencakertemp',array('IDPencakerTemp'=>$keylist['IDPencakerTemp']));
                    $this->db->delete('mspengalaman',array('IDPencakerTemp'=>$keylist['IDPencakerTemp']));

                    if(file_exists($path)){
                        unlink($path);
                        unlink('assets/file/temp/'.$keylist['IDPencakerTemp'].'.jpg');
                    }
                    $this->MsPencakerTemp->DeleteByIDPencakerTemp($keylist['IDPencakerTemp']);

                }
            }
        }
        $this->session->sess_destroy();
        $this->clearsession();
        redirect("admin", 'refresh');
    }

    public function dologin()
    {
        if (!$this->isadmin())
        {
            $input = $this->input->post();
            if ($input['username'] == "")
            {
                $this->seterrormsg($input,"Nama Admin harus diisi");
                redirect("admin", 'refresh');
            }
            else if ($input['password'] == "")
            {
                $this->seterrormsg($input,"Kata Sandi harus diisi");
                redirect("admin", 'refresh');
            }
            else
            {
                $this->load->model('MsUser');
                $getiduser = $this->MsUser->Login("000000",$input['username'],$input['password'],$this->session->userdata('session_id'));
                if ($getiduser != NULL)
                {
                    $this->load->model('MsPencakerTemp');
                    date_default_timezone_get("Asia/Jakarta");
                    $time = date("Y-m-d");
                    $userlist = $this->db->query("SELECT * FROM mspencakertemp ORDER BY IDPencakerTemp DESC")->result_array();
                    foreach ($userlist as $keylist) {
                        $date = date_create($keylist['RegisterDate']);
                        $dateDB = date_format($date, "Y-m-d");
                        $diff = abs(strtotime($time) - strtotime($dateDB));
                        $total = floor(($diff)/ (60*60*24));
                        if ($total >= 14) {
                            // var_dump($total);
                            $path = 'assets/file/temp'.'/'.$keylist['IDPencakerTemp'].'.jpg';

                            $this->db->delete('mspencakertemp',array('IDPencakerTemp'=>$keylist['IDPencakerTemp']));
                            $this->db->delete('mspengalaman',array('IDPencakerTemp'=>$keylist['IDPencakerTemp']));

                            if(file_exists($path)){
                                unlink($path);
                                unlink('assets/file/temp/'.$keylist['IDPencakerTemp'].'.jpg');
                            }
                            $this->MsPencakerTemp->DeleteByIDPencakerTemp($keylist['IDPencakerTemp']);

                        }
                    }
                    
                    $getdata = $this->MsUser->GetMsUserByIDUser($getiduser);
                    $this->session->set_userdata("iduser",$getdata->IDUser);
                    $this->session->set_userdata("username",$getdata->Username);
                    $this->session->set_userdata("idjenisuser","000000");
                    redirect('admin/newpencaker', 'refresh');
                }
                else
                {
                    $this->clearsession();
                    $this->seterrormsg($input,"Nama Admin atau Kata Sandi salah");
                    redirect("admin", 'refresh');
                }
            }
        }
        else
        {

        }
    }

    function clearsession()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value)
        {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity')
            {
                $this->session->unset_userdata($key);
            }
        }
    }

    public function dbtools()
    {
        if ($this->isadmin()) 
        {
            if ($this->uri->segment(3) == 'backup') 
            {
                if ($this->input->post()) 
                {
                    $this->load->dbutil();
                    $prefs = array(
                        'format' => 'zip',
                        'filename' => 'db_bkol_depok.sql'
                    );

                    $backup =& $this->dbutil->backup($prefs);

                    $db_name = 'backup-bkoldepok-' . date("Y-m-d-H-i-s") . '.zip'; // file name
                    $save  = 'backup/db/' . $db_name; // dir name backup output destination

                    $this->load->helper('file');
                    write_file($save, $backup);

                    $this->load->helper('download');
                    force_download($db_name, $backup);
                    redirect('admin/dbtools','refresh');
                }
            }
            else if ($this->uri->segment(3) == 'restore')
            {

            }
            else
            {
                $this->template->load('backend', 'admin/dbtools', array());
            }
        }
        else
        {
            redirect('','refresh');
        }
    }

    public function update_password()
    {
        if ($this->isadmin())
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

    public function FunctionName($value='')
    {
        # code...
    }

    public function doupdatepassword()
    {
        if ($this->isadmin())
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

    public function newperusahaan()
    {
        if ($this->isadmin())
        {
            $this->template->load('backend', 'admin/newperusahaan');
        }
        else
        {
            redirect();
        }
    } 

    public function newpencaker()
    {
        if ($this->isadmin())
        {
            $this->template->load('backend', 'admin/newpencaker');
        }
        else
        {
            redirect();
        }
    }

    public function exportpencakertemp()
    {
        if ($this->isadmin())
        {
            $idpencakertemp = $this->uri->segment(3);
            $this->load->model('MsPencakerTemp');
            $iduser = $this->MsPencakerTemp->Export($idpencakertemp);
            if ($iduser != NULL)
            {
                $this->load->model('MsUser');
                $getmsuserdata = $this->MsUser->GetMsUserByIDUser($iduser);
                $this->load->model('MsPencaker');
                $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDUser($iduser);
                if ($getmsuserdata != NULL)
                {
                    $getdatasUser = $this->db->query("SELECT IDStatusPendidikan, IDPosisiJabatan, TglLahir, Jurusan, JenisKelamin FROM mspencaker WHERE IDUser='$iduser'")->result_array();

                    $ab = $getdatasUser[0]['IDStatusPendidikan'];
                    $ac = $getdatasUser[0]['IDPosisiJabatan'];
                    date_default_timezone_get("Asia/Jakarta");
                    // var_dump($getdatasUser[0]['TglLahir']);
                    // var_dump($getdatasUser[0]['Jurusan']);
                    // var_dump($getdatasUser[0]['JenisKelamin']);
                    $dateNow = date("Y-m-d");
                    $dates = date_create($getdatasUser[0]['TglLahir']);
                    $dateDB = date_format($dates, "Y-m-d");
                    $diff = abs(strtotime($dateNow) - strtotime($dateDB));
                    $totalUmur = floor(($diff)/ (365*60*60*24));
                    // var_dump($totalUmur);
                    if ($getdatasUser[0]['JenisKelamin'] == '0') {
                        $lowonganhasil = $this->db->query("SELECT a.NamaLowongan, a.GajiPerbulan, a.IDLowongan, a.Penempatan, a.SyaratKhusus, b.NamaPerusahaan, b.IDPerusahaan, a.TglBerakhir FROM mslowongan as a JOIN msperusahaan as b ON b.IDPerusahaan = a.IDPerusahaan WHERE a.IDStatusPendidikan='$ab' AND a.IDPosisiJabatan='$ac' AND a.TglBerakhir >= '$dateNow' AND a.BatasUmur >= '$totalUmur' AND a.JmlPria !='0' ORDER BY a.TglBerakhir DESC LIMIT 7")->result_array();
                    }else{
                        $lowonganhasil = $this->db->query("SELECT a.NamaLowongan, a.GajiPerbulan, a.IDLowongan, a.Penempatan, a.SyaratKhusus, b.NamaPerusahaan, b.IDPerusahaan, a.TglBerakhir FROM mslowongan as a JOIN msperusahaan as b ON b.IDPerusahaan = a.IDPerusahaan WHERE a.IDStatusPendidikan='$ab' AND a.IDPosisiJabatan='$ac' AND a.TglBerakhir >= '$dateNow' AND a.BatasUmur >= '$totalUmur' AND a.JmlWanita !='0' ORDER BY a.TglBerakhir DESC LIMIT 7")->result_array();
                    }
                    
                    // gambar
                    if (file_exists(BASEPATH .'assets/file/temp/'.$idpencakertemp.'.jpg')){
                        rename(realpath('assets/file/temp/'.$idpencakertemp.'.jpg'), realpath('assets/file/pencaker').'/'.$getmspencakerdata->IDPencaker.'.jpg');
                    }
                    // $this->load->model('EmailModel');
                    $this->load->library('PHPMailer');
                    $this->load->library('SMTP');

                    $email_admin = 'disnaker.depok@gmail.com';
                    $nama_admin = 'noreply-BKOL';
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
                    $mail->addAddress($getmspencakerdata->Email);
                    $mail->AddEmbeddedImage('assets/img-acc-pencaker.png', 'acc');
                    $mail->Subject          = 'Akun Verifikasi '.$getmspencakerdata->NamaPencaker;
                    $mail_data['subject']   = $getmspencakerdata->NamaPencaker;
                    $mail_data['induk']     = $getmspencakerdata->NomorIndukPencaker;
                    $mail_data['username']  = $getmsuserdata->Username;
                    $mail_data['password']  = $getmsuserdata->Password;
                    $mail_data['lowongan']  = $lowonganhasil;
                    $message = $this->load->view('email_temp', $mail_data, TRUE);
                    $mail->Body = $message;
                    if ($mail->send()) {
                     $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                 } else {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;
              }
                    // $this->EmailModel->sendEmail($getmspencakerdata->Email,'[Aktivasi] Pendaftaran Pencaker Baru','Data Pencaker anda telah diaktifkan.<br/>Terimakasih atas pastisipasi anda dalam menggunakan aplikasi ini,<br/>Data pendaftaran anda adalah sebagai berikut :<br/><br/>Nomer ID : '.$getmsuserdata->NomorIndukPencaker.'<br/>Nama Pengguna : '.$getmsuserdata->Username.'<br/>Kata Sandi : '.$getmsuserdata->Password.'<br/><br/>Untuk aktivasi akun dan pencetakan kartu AK-1 mohon untuk membawa dokumen-dokumen sebagai berikut :<br/><br/>1. Foto kopi KTP Depok yang masih berlaku<br/>2. Ijazah SD, SMP, SLTA Sampai Terakhir/ Asli/ Fotocopy Yang dilegalisir<br/>3. Pas Foto 3 x 4 Sebanyak 2 (dua) Lembar<br/>4. Kartu AK-I yang masih berlaku<br/><br/>ke pusat pelayanan terpadu Dinas Tenaga Kerja Kota Depok<br/>Jl. Margonda Raya No.54 Kec.Pancoran Mas, Depok - JABAR<br/>Telp. 021-77204211,Fax. 021-77211866');
                    // $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Berhasil Ditambahkan", "success", "fa fa-check")</script>');
          }
      }
      else if ($iduser == 'exists') {
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Sudah Terdaftar", "danger", "fa fa-exclamation")</script>');
    }
    else
    {
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Gagal Ditambah", "danger", "fa fa-exclamation")</script>');
    }
    redirect('admin/newpencaker');
}
else
{
    redirect();
}
}

public function deletepencakertemp()
{
    if ($this->isadmin())
    {
        $idpencakertemp = $this->uri->segment(3);
        $this->load->model('MsPencakerTemp');
        $getmspencakertempdata = $this->MsPencakerTemp->GetMsPencakerTempByIDPencakerTemp($idpencakertemp);
        if ($getmspencakertempdata != NULL)
        {
            // var_dump($getmspencakertempdata->IDPencakerTemp);
            $path = 'assets/file/temp'.'/'.$getmspencakertempdata->IDPencakerTemp.'.jpg';

            $this->db->delete('mspencakertemp',array('IDPencakerTemp'=>$getmspencakertempdata->IDPencakerTemp));
            $this->db->delete('mspengalaman',array('IDPencakerTemp'=>$getmspencakertempdata->IDPencakerTemp));

            if(file_exists($path)){
                unlink($path);
            }
            $this->MsPencakerTemp->DeleteByIDPencakerTemp($getmspencakertempdata->IDPencakerTemp);
            unlink('assets/file/temp/'.$getmspencakertempdata->IDPencakerTemp.'.jpg');
            $this->load->model('EmailModel');
            @$this->EmailModel->sendEmail($getmspencakertempdata->Email,'Pembatalan Pendaftaran Pencaker Baru','Maaf Data Pencaker yang anda berikan tidak valid.<br/>Silakan mendaftar kembali, pastikan nomor induk pencaker sesuai dengan nomor yang ada di kartu kuning anda.');
        }
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Berhasil Dihapus", "success", "fa fa-check")</script>');
        redirect('admin/newpencaker');
    }
    else
    {
        redirect();
    }
}

public function exportperusahaantemp()
{
    if ($this->isadmin())
    {
        $idperusahaantemp = $this->uri->segment(3);
        $dataUser = $this->db->query("SELECT Email, Username, Password, NamaPerusahaan From msperusahaantemp WHERE IDPerusahaanTemp='$idperusahaantemp'")->result_array();
        $this->load->model('MsPerusahaanTemp');
        $iduser = $this->MsPerusahaanTemp->Export($idperusahaantemp);
        if ($iduser != NULL)
        {
            error_reporting(0);
            $this->load->model('MsUser');
            $getmsuserdata = $this->MsUser->GetMsUserByIDUser($iduser);
            $this->load->model('MsPerusahaan');
            $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDUser($iduser);
           
            $this->load->library('PHPMailer');
            $this->load->library('SMTP');

            $email_admin = 'disnaker.depok@gmail.com';
            $nama_admin = 'noreply-BKOL';
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
            $mail->addAddress($dataUser[0]['Email']);
            $mail->AddEmbeddedImage('assets/img-lowongan.png', 'acc');
            $mail->Subject          = 'Akun Verifikasi Perusahaan '.$dataUser[0]['NamaPerusahaan'];
            $mail_data['username']  = $dataUser[0]['Username'];
            $mail_data['password']  = $dataUser[0]['Password'];
            $message = $this->load->view('email_perusahaan', $mail_data, TRUE);
            $mail->Body = $message;
            if ($mail->send()) {
             $this->session->set_flashdata('notifikasi', '<script>notifikasi("Perusahaan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
         } else {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
      $this->session->set_flashdata('notifikasi', '<script>notifikasi("Perusahaan Berhasil Diaktifkan", "success", "fa fa-check")</script>');
  }
  else
  {
    $this->session->set_flashdata('notifikasi', '<script>notifikasi("Perusahaan Gagal Diaktifkan", "danger", "fa fa-exclamation")</script>');
}
redirect('admin/newperusahaan');
}
else
{
    redirect();
}
}

public function deleteperusahaantemp()
{
    if ($this->isadmin())
    {
        $idperusahaantemp = $this->uri->segment(3);
        $this->load->model('MsPerusahaanTemp');
        $getmsperusahaantempdata = $this->MsPerusahaanTemp->GetMsPerusahaanTempByIDPerusahaanTemp($idperusahaantemp);
        if ($getmsperusahaantempdata != NULL)
        {
            $this->MsPerusahaanTemp->DeleteByIDPerusahaanTemp($getmsperusahaantempdata->IDPerusahaanTemp);
            $this->load->model('EmailModel');
            @$this->EmailModel->sendEmail($getmsperusahaantempdata->Email,'Pembatalan Pendaftaran Perusahaan Baru','Maaf Data Perusahaan yang anda berikan tidak valid.<br/>Silakan mendaftar kembali, pastikan nomor induk perusahaan sesuai dengan nomor yang ada di kartu kuning anda.');
        }
        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Perusahaan Berhasil Dihapus", "success", "fa fa-check")</script>');
        redirect('admin/newperusahaan');
    }
    else
    {
        redirect();
    }
}

public function pencaker()
{
    if ($this->isadmin())
    {
        if ($this->uri->segment(3) == 'getdata')
        {
            $idpencaker = $this->uri->segment(4);
            $this->load->model('MsPencaker');
            $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
            if ($getmspencakerdata != NULL)
            {
                $data['exists'] = true;
                $this->load->model('MsBahasa');
                $getmsbahasadata = $this->MsBahasa->GetMsBahasaByIDPencaker($getmspencakerdata->IDPencaker);
                $data['BahasaData'] = "";
                if ($getmsbahasadata->num_rows() > 0)
                {
                    foreach ($getmsbahasadata->result() as $getdata)
                    {
                        $data['BahasaData'] .=  '<li>'.$getdata->NamaBahasa.'</li>';
                    }
                }
                else
                {
                    $data['BahasaData'] .= 'belum ada data';
                }
                $this->load->model('MsPengalaman');
                $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencaker($getmspencakerdata->IDPencaker);
                $data['PengalamanData'] = "";
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
                    $data['PengalamanData'] .= 'belum ada data';
                }
                $data['IDPencaker'] = $getmspencakerdata->IDPencaker;
                $data['NomorIndukPencaker'] = $getmspencakerdata->NomorIndukPencaker;
                $data['NamaPencaker'] = $getmspencakerdata->NamaPencaker;
                $data['TempatLahir'] = $getmspencakerdata->TempatLahir;
                $data['TglLahir'] = $getmspencakerdata->TglLahir;
                $data['JenisKelamin'] = $getmspencakerdata->JenisKelamin;
                $data['Email'] = $getmspencakerdata->Email;
                $data['Jurusan'] = $getmspencakerdata->Jurusan;
                $data['Telepon'] = $getmspencakerdata->Telepon;
                $data['Alamat'] = $getmspencakerdata->Alamat;
                $data['NamaKecamatan'] = $getmspencakerdata->NamaKecamatan;
                $data['NamaKelurahan'] = $getmspencakerdata->NamaKelurahan;
                $data['KodePos'] = $getmspencakerdata->KodePos;
                $data['Kewarganegaraan'] = $getmspencakerdata->Kewarganegaraan;
                $data['NamaAgama'] = $getmspencakerdata->NamaAgama;
                $data['NamaStatusPernikahan'] = $getmspencakerdata->NamaStatusPernikahan;
                $data['NamaStatusPendidikan'] = $getmspencakerdata->NamaStatusPendidikan;
                $data['Jurusan'] = $getmspencakerdata->Jurusan;
                $data['Keterampilan'] = $getmspencakerdata->Keterampilan;
                $data['NEMIPK'] = $getmspencakerdata->NEMIPK;
                $data['Nilai'] = $getmspencakerdata->Nilai;
                $data['TahunLulus'] = $getmspencakerdata->TahunLulus;
                $data['TinggiBadan'] = $getmspencakerdata->TinggiBadan;
                $data['BeratBadan'] = $getmspencakerdata->BeratBadan;
                $data['Keterangan'] = $getmspencakerdata->Keterangan;
                $data['NamaPosisiJabatan'] = $getmspencakerdata->NamaPosisiJabatan;
                $data['Lokasi'] = $getmspencakerdata->Lokasi;
                $data['TypePekerjaan'] = $getmspencakerdata->TypePekerjaan;
                $data['UpahYangDicari'] = 'Rp ' . number_format($getmspencakerdata->UpahYangDicari);
                $data['Password'] = $getmspencakerdata->password;
            }
            else
            {
                $data['exists'] = false;
            }
            echo json_encode($data);
        }
        else if ($this->uri->segment(3) == 'lowongan')
        {
            $idpencaker = $this->uri->segment(4);
            if ($idpencaker != '')
            {
                if ($idpencaker != '')
                {

                    $this->load->model('MsPencaker');
                    $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
                    if ($getmspencakerdata != NULL)
                    {
                        $data['MsPencakerData'] = $getmspencakerdata;
                        $page = $this->uri->segment(5);
                        $this->load->model('MsLowongan');
                        $getmslowongan = $this->MsLowongan->GetGridMsLowonganByIDPencaker($idpencaker,10,$page);
                        $data['MsLowonganData'] = $getmslowongan->result();
                        $config['uri_segment'] = 5;
                        $config['base_url'] = site_url('admin/pencaker/lowongan/'.$idpencaker);
                        $config['total_rows'] = $this->MsLowongan->GetCountMsLowonganByIDPencaker($idpencaker)->total_rows;
                        $config['per_page'] = 10;
                        $this->pagination->initialize($config);
                        $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                            // $this->load->view('index',$data);
                        $this->template->load('backend', 'admin/pencaker/daftar_lowongan', $data);
                    }
                    else
                    {

                    }
                }
            }
        }
        else if ($this->uri->segment(3) == 'registerlowongan')
        {
            $idpencaker = $this->uri->segment(4);
            if ($idpencaker != '')
            {
                $idlowongan = $this->uri->segment(5);
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
                        $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
                        if ($getmspencakerdata != NULL)
                        {
                            $this->load->model('TrLowonganMasuk');
                            if ($this->TrLowonganMasuk->Insert($idlowongan,$getmspencakerdata->IDPencaker))
                            {
                                $fromdate = explode("-", $getmslowongandata->TglBerlaku);
                                $todate = explode("-", $getmslowongandata->TglBerakhir);
                                $this->load->model('EmailModel');
                                @$this->EmailModel->sendEmail($getmsperusahaandata->EmailPemberiKerja,'Pendaftaran Lowongan Masuk','No Loker : '.$getmslowongandata->IDLowongan.'<br/>Nama Pekerjaan : '.$getmslowongandata->NamaLowongan.'<br/>Tanggal Berlaku : '.$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0].' s/d '.$todate[2].'-'.$todate[1].'-'.$todate[0].'<br/>Nama Pencaker : '.$getmspencakerdata->NamaPencaker);
                                $this->session->set_flashdata('notifikasi', '<script>
                                    notifikasi("CV anda berhasil dikirim ke '.$getmsperusahaandata->NamaPerusahaan.'", "success", "fa fa-check")
                                    </script>');
                            }
                            else
                            {
                                $this->session->set_flashdata('notifikasi', '<script>notifikasi("CV anda gagal dikirim", "danger", "fa fa-exclamation")</script>');
                            }
                            redirect('admin/pencaker/lowongan/'.$idpencaker);
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
        else if ($this->uri->segment(3) == 'aktivasi')
        {
            $input = $this->input->post();
            if ($input['IDPencaker'] == '')
            {
                $data['valid'] = false;
                $data['error'] = "Pencaker belum dipilih";
            }
            else
            {
                $data['valid'] = false;
                $data['error'] = "Pencaker gagal diaktifkan";
                $this->load->model('MsPencaker');
                $getmspencaker = $this->MsPencaker->GetMsPencakerByIDPencaker($input['IDPencaker']);
                if ($getmspencaker != NULL)
                {
                    if ($this->MsPencaker->UpdateExpiredDate($input['IDPencaker']))
                    {
                        $this->load->model('MsUser');
                        $getmsuser= $this->MsUser->GetMsUserByIDUser($getmspencaker->IDUser);
                        if ($getmsuser != NULL)
                        {
                            $this->load->model('MsAktivasi');
                            if ($this->MsAktivasi->DeleteByIDPencaker($input['IDPencaker']))
                            {
                                $data['valid'] = true;
                                $data['error'] = "Pencaker berhasil diaktifkan";
                            }
                            $this->load->model('EmailModel');
                            @$this->EmailModel->sendEmail($getmspencaker->Email,'[Aktivasi] Pencaker','Data Pencaker anda telah diaktifkan.<br/>Nama Pengguna : '.$getmsuser->Username.'<br/>Kata Sandi : '.$getmsuser->Password);
                        }
                    }
                }
            }
            echo json_encode($data);
        }
        else if ($this->uri->segment(3) == 'cekaktivasi')
        {
            $page = $this->uri->segment(4);
            $this->load->model('MsAktivasi');
            $getmsaktivasidata = $this->MsAktivasi->GetGridMsAktivasi(10,$page);
            $getcount = $this->MsAktivasi->GetCountMsAktivasi();
            $data['MsAktivasiData'] = $getmsaktivasidata->result();
            $config['base_url'] = site_url('admin/pencaker/cekaktivasi');
            $config['total_rows'] = $getcount->total_rows;
            $config['per_page']     = 10;
                $config["uri_segment"] = 3;  // uri parameter
                $choice = $config["total_rows"] / $config["per_page"];
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
                // $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/daftar_aktivasipencaker', $data);
            }
            else if ($this->uri->segment(3) == 'delete') 
            {
                $this->load->helper("file");
                $this->load->model('MsPencaker');
                $idpencaker = $this->uri->segment(4);
                $dataPencaker = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
                // $IDUser = $dataPencaker->IDUser;
                $path = 'assets/file/pencaker'.'/'.$idpencaker.'.jpg';

                $this->db->delete('msbahasa',array('IDPencaker'=>$idpencaker));
                $this->db->delete('mschat',array('pengirim'=>$idpencaker));
                $this->db->delete('mschat',array('penerima'=>$idpencaker));
                $this->db->delete('mspencaker',array('IDPencaker'=>$idpencaker));
                $this->db->delete('mspengalaman',array('IDPencaker'=>$idpencaker));
                $this->db->delete('msuser',array('IDUser'=>$IDUser));
                $this->db->delete('trlowonganmasuk',array('IDPencaker'=>$idpencaker));

                // $this->load->model('MsUser');
                // $this->load->model('MsPengalaman');
                // $this->load->model('MsBahasa');
                // $this->MsUser->delete($IDUser);
                // $this->MsPengalaman->DeletePengalamanByIDPencaker($idpencaker);
                // $this->MsBahasa->DeleteByIDPencaker($idpencaker);
                // $this->MsPencaker->DeleteByIDPencaker($idpencaker);
                if(file_exists($path)){
                    unlink($path);
                }
                

                $this->session->set_flashdata('notifikasi', '<script>notifikasi("Pencaker Berhasil Dihapus", "success", "fa fa-check")</script>');
                redirect('admin/pencaker');
            }
            else
            {
                $this->template->load('backend', 'admin/pencaker/daftar_pencaker');
            }
        }
        else
        {
            redirect();
        }
    }

    public function pencakertemp()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idpencakertemp = $this->uri->segment(4);
                $this->load->model('MsPencakerTemp');
                $this->load->model('MsPengalaman');
                $getmspencakertempdata = $this->MsPencakerTemp->GetMsPencakerTempByIDPencakerTemp($idpencakertemp);
                
                if ($getmspencakertempdata != NULL)
                {
                    $getpengalamandata = $this->MsPengalaman->GetPengalamanByIDPencakerTemp($getmspencakertempdata->IDPencakerTemp);
                    $data['exists'] = true;
                    $data['BahasaData'] = "belum ada data";
                    $data['PengalamanData'] = "belum ada data";

                    $data['IDPencakerTemp'] = $getmspencakertempdata->IDPencakerTemp;
                    $data['NomorIndukPencaker'] = $getmspencakertempdata->NomerPenduduk;
                    $data['NamaPencaker'] = $getmspencakertempdata->NamaPencaker;
                    $data['TempatLahir'] = $getmspencakertempdata->TempatLahir;
                    $data['TglLahir'] = $getmspencakertempdata->TglLahir;
                    $data['JenisKelamin'] = $getmspencakertempdata->JenisKelamin;
                    $data['Email'] = $getmspencakertempdata->Email;
                    $data['Telepon'] = $getmspencakertempdata->Telepon;
                    $data['Alamat'] = $getmspencakertempdata->Alamat;
                    $data['NamaKecamatan'] = $getmspencakertempdata->NamaKecamatan;
                    $data['NamaKelurahan'] = $getmspencakertempdata->NamaKelurahan;
                    $data['KodePos'] = $getmspencakertempdata->KodePos;
                    $data['Kewarganegaraan'] = $getmspencakertempdata->Kewarganegaraan;
                    $data['NamaAgama'] = $getmspencakertempdata->NamaAgama;
                    $data['NamaStatusPernikahan'] = $getmspencakertempdata->NamaStatusPernikahan;
                    $data['NamaStatusPendidikan'] = $getmspencakertempdata->NamaStatusPendidikan;
                    $data['Jurusan'] = $getmspencakertempdata->Jurusan;
                    $data['Keterampilan'] = $getmspencakertempdata->Keterampilan;
                    $data['NEMIPK'] = $getmspencakertempdata->NEMIPK;
                    $data['Nilai'] = $getmspencakertempdata->Nilai;
                    $data['TahunLulus'] = $getmspencakertempdata->TahunLulus;
                    $data['TinggiBadan'] = $getmspencakertempdata->TinggiBadan;
                    $data['BeratBadan'] = $getmspencakertempdata->BeratBadan;
                    $data['Keterangan'] = $getmspencakertempdata->Keterangan;
                    $data['TypePekerjaan'] = $getmspencakertempdata->TypePekerjaan;
                    $data['NamaPosisiJabatan'] = $getmspencakertempdata->NamaPosisiJabatan;
                    $data['Lokasi'] = $getmspencakertempdata->Lokasi;
                    $data['UpahYangDicari'] = number_format($getmspencakertempdata->UpahYangDicari);
                    $p = '';
                    if(count($getpengalamandata) > 0)
                    {
                        $p .= '<ul>';
                        foreach ($getpengalamandata as $row) 
                        {
                            $lama = $row->lamabekerja;
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
                            $p .= '<li>' . $row->Jabatan . ' Di ' . $row->NamaPerusahaan . ' ' . $lm . ' </li>';
                        }
                        $p .= '</ul>';

                        $data['PengalamanData'] = $p;
                    }
                    
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

    public function perusahaan()
    {
        if ($this->isadmin())
        {
            $idperusahaan = $this->uri->segment(3);
            if ($this->uri->segment(3) == 'getdata')
            {
                $idperusahaan = $this->uri->segment(4);
                $this->load->model('MsPerusahaan');
                $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByIDPerusahaan($idperusahaan);
                if ($getmsperusahaandata != NULL)
                {
                    $data['exists'] = true;

                    foreach ($getmsperusahaandata as $row => $val) 
                    {
                        $data[$row] = $val;
                    }
                }
                else
                {
                    $data['exists'] = false;
                }

                echo json_encode($data);
            }
            else if ($this->uri->segment(4) == 'delete') 
            {
                $this->load->model('MsPerusahaan');
                $dataPerusahaan = $this->MsPerusahaan->GetMsPerusahaanByIDPerusahaan($idperusahaan);
                $IDUser = $dataPerusahaan->IDUser;
                $this->load->model('MsUser');
                $this->load->model('MsLowongan');
                $this->MsUser->delete($IDUser);
                $this->MsLowongan->DeleteByIDPerusahaan($idperusahaan);
                $this->MsPerusahaan->delete($idperusahaan);
                $this->session->set_flashdata('notifikasi', '<script>notifikasi("Perusahaan Berhasil Dihapus", "success", "fa fa-check")</script>');
                redirect('admin/perusahaan');
            }
            else
            {
                $this->template->load('backend', 'admin/perusahaan/daftar_perusahaan');
            }
        }
        else
        {
            redirect();
        }
    }

    public function perusahaantemp()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idperusahaantemp = $this->uri->segment(4);
                $this->load->model('MsPerusahaanTemp');
                $getmsperusahaantempdata = $this->MsPerusahaanTemp->GetMsPerusahaanTempByIDPerusahaanTemp($idperusahaantemp);
                if ($getmsperusahaantempdata != NULL)
                {
                    $data['exists'] = true;
                    $data['IDPerusahaanTemp'] = $getmsperusahaantempdata->IDPerusahaanTemp;
                    $data['NamaPerusahaan'] = $getmsperusahaantempdata->NamaPerusahaan;
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

    public function kabupaten()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idkabupaten = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsKabupaten');
                $getmskabupaten = $this->MsKabupaten->GetMsKabupatenByIDKabupaten($idkabupaten);
                if ($getmskabupaten != NULL)
                {
                    $data['IDKabupaten'] = $getmskabupaten->IDKabupaten;
                    $data['NamaKabupaten'] = $getmskabupaten->NamaKabupaten;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsKabupaten');
                if ($input['NamaKabupaten'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kabupaten harus diisi";
                }
                else if ($this->MsKabupaten->CekNamaKabupaten($input['NamaKabupaten'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kabupaten sudah dipakai";
                }
                else
                {
                    if ($this->MsKabupaten->Insert($input['NamaKabupaten']) != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kabupaten Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kabupaten gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsKabupaten');
                if ($input['NamaKabupaten'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kabupaten harus diisi";
                }
                else if ($this->MsKabupaten->CekNamaKabupaten($input['NamaKabupaten'],$input['IDKabupaten']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kabupaten sudah dipakai";
                }
                else
                {
                    if ($this->MsKabupaten->Update($input,$input['IDKabupaten']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kabupaten Berhasil Diubah", "success", "fa fa-check")</script>');;
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kabupaten gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDKabupaten'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kabupaten belum dipilih";
                }
                else
                {
                    $this->load->model('MsKabupaten');
                    if ($this->MsKabupaten->Delete($input['IDKabupaten']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kabupaten Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kabupaten gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsKabupaten');
                $getmskabupaten = $this->MsKabupaten->GetGridMsKabupaten(10,$page);
                $data['MsKabupatenData'] = $getmskabupaten->result();
                $config['base_url'] = site_url('admin/kabupaten');
                $config['total_rows'] = $this->MsKabupaten->GetCountMsKabupaten()->total_rows;
                $config['per_page'] = 10;
                $config["uri_segment"] = 3;  // uri parameter
                $config["num_links"] = 3;
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
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/daftar_kabupaten', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function kecamatan()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idkecamatan = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsKecamatan');
                $getmskecamatan = $this->MsKecamatan->GetMsKecamatanByIDKecamatan($idkecamatan);
                if ($getmskecamatan != NULL)
                {
                    $data['IDKecamatan'] = $getmskecamatan->IDKecamatan;
                    $data['IDKabupaten'] = $getmskecamatan->IDKabupaten;
                    $data['NamaKecamatan'] = $getmskecamatan->NamaKecamatan;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsKecamatan');
                if ($input['IDKabupaten'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kabupaten belum dipilih";
                }
                else if ($input['NamaKecamatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kecamatan harus diisi";
                }
                else if ($this->MsKecamatan->CekNamaKecamatan($input['NamaKecamatan'],$input['IDKabupaten'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kecamatan sudah dipakai";
                }
                else
                {
                    if ($this->MsKecamatan->Insert($input['NamaKecamatan'],$input['IDKabupaten']) != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kecamatan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kecamatan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsKecamatan');
                if ($input['NamaKecamatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kecamatan harus diisi";
                }
                else if ($this->MsKecamatan->CekNamaKecamatan($input['NamaKecamatan'],$input['IDKecamatan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kecamatan sudah dipakai";
                }
                else
                {
                    if ($this->MsKecamatan->Update($input,$input['IDKecamatan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kecamatan Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kecamatan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDKecamatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kecamatan belum dipilih";
                }
                else
                {
                    $this->load->model('MsKecamatan');
                    if ($this->MsKecamatan->Delete($input['IDKecamatan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kecamatan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kecamatan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $idkabupaten = $this->uri->segment(3);
                $this->load->model('MsKabupaten');
                $getmskabupaten = $this->MsKabupaten->GetMsKabupatenByIDKabupaten($idkabupaten);
                if ($getmskabupaten != NULL)
                {
                    $data['MsKabupatenData'] = $getmskabupaten;
                    $page = $this->uri->segment(4);
                    $this->load->model('MsKecamatan');
                    $getmskecamatan = $this->MsKecamatan->GetGridMsKecamatanByIDKabupaten($idkabupaten,10,$page);
                    $data['MsKecamatanData'] = $getmskecamatan->result();
                    $config['base_url'] = site_url('admin/kecamatan/'.$idkabupaten);
                    $config['total_rows'] = $this->MsKecamatan->GetCountMsKecamatanByIDKabupaten($idkabupaten)->total_rows;
                    $config['per_page'] = 10;
                    $config["uri_segment"] = 4;  // uri parameter
                    $config["num_links"] = 3;
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
                    $data['route'] = $this->uri->segment(2);
                    // $this->load->view('index',$data);
                    $this->template->load('backend', 'admin/daftar_kecamatan', $data);
                }
                else
                {

                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function kelurahan()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idkelurahan = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsKelurahan');
                $getmskelurahan = $this->MsKelurahan->GetMsKelurahanByIDKelurahan($idkelurahan);
                if ($getmskelurahan != NULL)
                {
                    $data['IDKelurahan'] = $getmskelurahan->IDKelurahan;
                    $data['IDKecamatan'] = $getmskelurahan->IDKecamatan;
                    $data['NamaKelurahan'] = $getmskelurahan->NamaKelurahan;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsKelurahan');
                if ($input['IDKecamatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kecamatan belum dipilih";
                }
                else if ($input['NamaKelurahan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kelurahan harus diisi";
                }
                else if ($this->MsKelurahan->CekNamaKelurahan($input['NamaKelurahan'],$input['IDKecamatan'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kelurahan sudah dipakai";
                }
                else
                {
                    if ($this->MsKelurahan->Insert($input['NamaKelurahan'],$input['IDKecamatan']) != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kelurahan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kelurahan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsKelurahan');
                if ($input['NamaKelurahan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kelurahan harus diisi";
                }
                else if ($this->MsKelurahan->CekNamaKelurahan($input['NamaKelurahan'],$input['IDKelurahan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Kelurahan sudah dipakai";
                }
                else
                {
                    if ($this->MsKelurahan->Update($input,$input['IDKelurahan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kelurahan Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kelurahan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDKelurahan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kelurahan belum dipilih";
                }
                else
                {
                    $this->load->model('MsKelurahan');
                    if ($this->MsKelurahan->Delete($input['IDKelurahan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kelurahan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kelurahan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $idkecamatan = $this->uri->segment(3);
                $this->load->model('MsKecamatan');
                $getmskecamatan = $this->MsKecamatan->GetMsKecamatanByIDKecamatan($idkecamatan);
                if ($getmskecamatan != NULL)
                {
                    $data['MsKecamatanData'] = $getmskecamatan;
                    $this->load->model('MsKabupaten');
                    $getmskabupaten = $this->MsKabupaten->GetMsKabupatenByIDKabupaten($getmskecamatan->IDKabupaten);
                    if ($getmskabupaten != NULL)
                    {
                        $data['MsKabupatenData'] = $getmskabupaten;
                        $page = $this->uri->segment(4);
                        $this->load->model('MsKelurahan');
                        $getmskelurahan = $this->MsKelurahan->GetGridMsKelurahanByIDKecamatan($idkecamatan,10,$page);
                        $data['MsKelurahanData'] = $getmskelurahan->result();
                        $config['base_url'] = site_url('admin/kelurahan/'.$idkecamatan);
                        $config['total_rows'] = $this->MsKelurahan->GetCountMsKelurahanByIDKecamatan($idkecamatan)->total_rows;
                        $config['per_page'] = 10;
                        $config["uri_segment"] = 4;  // uri parameter
                        $config["num_links"] = 3;
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
                        $data['route'] = $this->uri->segment(2);
                        // $this->load->view('index',$data);
                        $this->template->load('backend', 'admin/daftar_kelurahan', $data);
                    }
                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function posisijabatan()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idposisijabatan = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsPosisiJabatan');
                $getmsposisijabatan = $this->MsPosisiJabatan->GetMsPosisiJabatanByIDPosisiJabatan($idposisijabatan);
                if ($getmsposisijabatan != NULL)
                {
                    $data['IDPosisiJabatan'] = $getmsposisijabatan->IDPosisiJabatan;
                    $data['NamaPosisiJabatan'] = $getmsposisijabatan->NamaPosisiJabatan;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsPosisiJabatan');
                if ($input['NamaPosisiJabatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Posisi Jabatan harus diisi";
                }
                else if ($this->MsPosisiJabatan->CekNamaPosisiJabatan($input['NamaPosisiJabatan'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Posisi Jabatan sudah dipakai";
                }
                else
                {
                    if ($this->MsPosisiJabatan->Insert($input['NamaPosisiJabatan']) != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Posisi Jabatan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Posisi Jabatan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsPosisiJabatan');
                if ($input['NamaPosisiJabatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Posisi Jabatan harus diisi";
                }
                else if ($this->MsPosisiJabatan->CekNamaPosisiJabatan($input['NamaPosisiJabatan'],$input['IDPosisiJabatan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Posisi Jabatan sudah dipakai";
                }
                else
                {
                    if ($this->MsPosisiJabatan->Update($input,$input['IDPosisiJabatan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Posisi Jabatan Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Posisi Jabatan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDPosisiJabatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Posisi Jabatan belum dipilih";
                }
                else
                {
                    $this->load->model('MsPosisiJabatan');
                    if ($this->MsPosisiJabatan->Delete($input['IDPosisiJabatan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Posisi Jabatan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Posisi Jabatan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsPosisiJabatan');
                $getmsposisijabatan = $this->MsPosisiJabatan->GetGridMsPosisiJabatan(10,$page);
                $data['MsPosisiJabatanData'] = $getmsposisijabatan->result();
                $config['base_url'] = site_url('admin/posisijabatan');
                $config['total_rows'] = $this->MsPosisiJabatan->GetCountMsPosisiJabatan()->total_rows;
                $config['per_page'] = 10;
                $config["uri_segment"] = 3;  // uri parameter
                $config["num_links"] = 3;
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
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/daftar_posisijabatan', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function jurusan()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idjurusan = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsJurusan');
                $getmsjurusan = $this->MsJurusan->GetMsJurusanByIDjurusan($idjurusan);
                if ($getmsjurusan != NULL)
                {
                    foreach ($getmsjurusan as $key => $value) {
                        $data[$key] = $value;
                    }

                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsJurusan');
                
                if ($input['IDStatusPendidikan'] == '') {
                    $data['valid'] = false;
                    $data['error'] = "Pendidikan Harus Di Pilih";
                }
                else if ($input['NamaJurusan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jurusan harus diisi";
                }
                else if ($this->MsJurusan->CekNamaJurusan($input['NamaJurusan'],NULL,$input['IDStatusPendidikan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Jurusan " . $input['NamaJurusan'] . " untuk tingkat pendidikan ini sudah digunakan";
                }
                else
                {
                    $insert = $this->MsJurusan->Insert(array('Jurusan'=>$input['NamaJurusan'],'IDStatusPendidikan'=>$input['IDStatusPendidikan']));
                    if ($insert != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jurusan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jurusan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsJurusan');
                if ($input['NamaJurusan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jurusan harus diisi";
                }
                else if ($this->MsJurusan->CekNamaJurusan($input['NamaJurusan'],$input['IDjurusan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jurusan sudah dipakai";
                }
                else
                {
                    if ($this->MsJurusan->Update($input,$input['IDjurusan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jurusan Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jurusan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDjurusan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Jurusan belum dipilih";
                }
                else
                {
                    $this->load->model('MsJurusan');
                    if ($this->MsJurusan->Delete($input['IDjurusan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jurusan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jurusan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsJurusan');
                $getmsjurusan = $this->MsJurusan->GetGridMsJurusan(10,$page);
                $data['MsJurusanData'] = $getmsjurusan->result();
                $config['base_url']         = site_url('admin/jurusan');
                $config['total_rows']       = $this->MsJurusan->GetCountMsJurusan()->num_rows;
                $config['uri_segment']      = 3;
                $config['per_page']         = 10;
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
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/daftar_jurusan', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function jenislowongan()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idjenislowongan = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsJenisLowongan');
                $getmsjenislowongan = $this->MsJenisLowongan->GetMsJenisLowonganByIDJenisLowongan($idjenislowongan);
                if ($getmsjenislowongan != NULL)
                {
                    $data['IDJenisLowongan'] = $getmsjenislowongan->IDJenisLowongan;
                    $data['NamaJenisLowongan'] = $getmsjenislowongan->NamaJenisLowongan;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsJenisLowongan');
                if ($input['NamaJenisLowongan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jenis Lowongan harus diisi";
                }
                else if ($this->MsJenisLowongan->CekNamaJenisLowongan($input['NamaJenisLowongan'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jenis Lowongan sudah dipakai";
                }
                else
                {
                    if ($this->MsJenisLowongan->Insert($input['NamaJenisLowongan']) != NULL)
                    {
                        $data['valid'] = true;
                        $data['error'] = "Jenis Lowongan berhasil disimpan";
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jenis Lowongan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jenis Lowongan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsJenisLowongan');
                if ($input['NamaJenisLowongan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jenis Lowongan harus diisi";
                }
                else if ($this->MsJenisLowongan->CekNamaJenisLowongan($input['NamaJenisLowongan'],$input['IDJenisLowongan']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Jenis Lowongan sudah dipakai";
                }
                else
                {
                    if ($this->MsJenisLowongan->Update($input,$input['IDJenisLowongan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jenis Lowongan Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jenis Lowongan gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDJenisLowongan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Jenis Lowongan belum dipilih";
                }
                else
                {
                    $this->load->model('MsJenisLowongan');
                    if ($this->MsJenisLowongan->Delete($input['IDJenisLowongan']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Jenis Lowongan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Jenis Lowongan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsJenisLowongan');
                $getmsjenislowongan = $this->MsJenisLowongan->GetGridMsJenisLowongan(10,$page);
                $data['MsJenisLowonganData'] = $getmsjenislowongan->result();
                $config['base_url'] = site_url('admin/jenislowongan');
                $config['total_rows'] = $this->MsJenisLowongan->GetCountMsJenisLowongan()->total_rows;
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
                $data['route'] = $this->uri->segment(2);
                $this->template->load('backend', 'admin/daftar_jenislowongan', $data);
                // $this->load->view('index',$data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function keahlian()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idkeahlian = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsKeahlian');
                $getmskeahlian = $this->MsKeahlian->GetMsKeahlianByIDKeahlian($idkeahlian);
                if ($getmskeahlian != NULL)
                {
                    $data['IDKeahlian'] = $getmskeahlian->IDKeahlian;
                    $data['IDJenisLowongan'] = $getmskeahlian->IDJenisLowongan;
                    $data['NamaKeahlian'] = $getmskeahlian->NamaKeahlian;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                $input = $this->input->post();
                $this->load->model('MsKeahlian');
                if ($input['IDJenisLowongan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Jenis Lowongan belum dipilih";
                }
                else if ($input['NamaKeahlian'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Keahlian harus diisi";
                }
                else if ($this->MsKeahlian->CekNamaKeahlian($input['NamaKeahlian'],$input['IDJenisLowongan'],NULL))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Keahlian sudah dipakai";
                }
                else
                {
                    if ($this->MsKeahlian->Insert($input['NamaKeahlian'],$input['IDJenisLowongan']) != NULL)
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Keahlian Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Keahlian gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $input = $this->input->post();
                $this->load->model('MsKeahlian');
                if ($input['NamaKeahlian'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Keahlian harus diisi";
                }
                else if ($this->MsKeahlian->CekNamaKeahlian($input['NamaKeahlian'],$input['IDKeahlian']))
                {
                    $data['valid'] = false;
                    $data['error'] = "Nama Keahlian sudah dipakai";
                }
                else
                {
                    if ($this->MsKeahlian->Update($input,$input['IDKeahlian']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Keahlian Berhasil Diubah", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Keahlian gagal disimpan";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDKeahlian'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Keahlian belum dipilih";
                }
                else
                {
                    $this->load->model('MsKeahlian');
                    if ($this->MsKeahlian->Delete($input['IDKeahlian']))
                    {
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Keahlian Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Keahlian gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $idjenislowongan = $this->uri->segment(3);
                $this->load->model('MsJenisLowongan');
                $getmsjenislowongan = $this->MsJenisLowongan->GetMsJenisLowonganByIDJenisLowongan($idjenislowongan);
                if ($getmsjenislowongan != NULL)
                {
                    $data['MsJenisLowonganData'] = $getmsjenislowongan;
                    $page = $this->uri->segment(4);
                    $this->load->model('MsKeahlian');
                    $getmskeahlian = $this->MsKeahlian->GetGridMsKeahlianByIDJenisLowongan($idjenislowongan,10,$page);
                    $data['MsKeahlianData'] = $getmskeahlian->result();
                    $config['uri_segment']      = 4;
                    $config['base_url']         = site_url('admin/keahlian/'.$idjenislowongan);
                    $config['total_rows']       = $this->MsKeahlian->GetCountMsKeahlianByIDJenisLowongan($idjenislowongan)->total_rows;
                    $config['per_page']         = 10;
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
                    $data['route'] = $this->uri->segment(2);
                    // $this->load->view('index',$data);
                    $this->template->load('backend', 'admin/daftar_keahlian', $data);
                }
            }
        }
        else
        {
            redirect();
        }
    }

    public function lowongan()
    {
        if ($this->isadmin())
        {
            $page = $this->uri->segment(3);
            $this->load->model('MsLowongan');
            $getmslowongan = $this->MsLowongan->GetGridMsLowongan(10,$page);
            $data['MsLowonganData'] = $getmslowongan->result();
            $config['base_url'] = site_url('admin/lowongan');
            $config['total_rows'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
            $config['per_page'] = 10;
            $this->pagination->initialize($config);
            $data['route'] = $this->uri->segment(2);
            // $this->load->view('index',$data);
            $this->template->load('backend', 'admin/daftar_lowongan', $data);
        }
        else
        {
            redirect();
        }
    }
    public function lowonganBaru()
    {
        if ($this->isadmin())
        {
            $page = $this->uri->segment(3);
            $this->load->model('MsLowongan');
            $getmslowongan = $this->MsLowongan->GetGridMsLowongan(10,$page);
            $data['MsLowonganData'] = $getmslowongan->result();
            $config['base_url'] = site_url('admin/lowongan');
            $config['total_rows'] = $this->MsLowongan->GetCountMsLowongan()->total_rows;
            $config['per_page'] = 10;
            $this->pagination->initialize($config);
            $data['route'] = $this->uri->segment(2);
            // $this->load->view('index',$data);
            $this->template->load('backend', 'admin/daftar_lowongan', $data);
        }
        else
        {
            redirect();
        }
    }

    public function berita()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idberita = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsBerita');
                $getmsberita = $this->MsBerita->GetMsBeritaByIDBerita($idberita);
                if ($getmsberita != NULL)
                {
                    $data['IDBerita'] = $getmsberita->IDBerita;
                    $data['TglBerita'] = $getmsberita->TglBerita;
                    $data['JudulBerita'] = $getmsberita->JudulBerita;
                    $data['IsiBerita'] = $getmsberita->IsiBerita;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                if (($this->input->post())) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalberita',
                            'label' => 'Tanggal Berita',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Lowongan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulberita',
                            'label' => 'Judul Lowongan Pekerjaan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Lowongan Harus diisi ',
                                'min_length' => 'Judul Lowongan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isiberita',
                            'label'  => 'Isi Berita',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Berita Harus diisi ',
                                'min_length' => 'Isi Berita Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    
                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/berita/tambahdata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglBerita'     => $post['tanggalberita'],
                            'JudulBerita'   => $post['judulberita'],
                            'IsiBerita'     => $post['isiberita']
                        );
                        $this->load->model('MsBerita');

                        if($this->MsBerita->Insert($data) != NULL)
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Gagal Ditambahkan", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/berita');
                    }
                }
                else
                {
                    $data['post'] = [];
                    $this->template->load('backend', 'admin/berita/tambahdata', $data);
                }
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $idberita = $this->uri->segment(4);
                $this->load->model('MsBerita');

                if ($this->input->post()) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalberita',
                            'label' => 'Tanggal Berita',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Lowongan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulberita',
                            'label' => 'Judul Lowongan Pekerjaan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Lowongan Harus diisi ',
                                'min_length' => 'Judul Lowongan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isiberita',
                            'label'  => 'Isi Berita',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Berita Harus diisi ',
                                'min_length' => 'Isi Berita Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/berita/tambahdata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglBerita'     => $post['tanggalberita'],
                            'JudulBerita'   => $post['judulberita'],
                            'IsiBerita'     => $post['isiberita']
                        );

                        if($this->MsBerita->Update($data,$idberita))
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Diubah", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Gagal Diubah", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/berita');
                    }
                }
                else
                {
                    $getmsberita = $this->MsBerita->GetMsBeritaByIDBerita($idberita);
                    if ($getmsberita != NULL)
                    {
                        $tglberita = explode('-', $getmsberita->TglBerita);
                        $data['post'] = array(
                            'idberita'      => $getmsberita->IDBerita,
                            'tanggalberita' => $tglberita[2] . '-' . $tglberita[1] . '-' . $tglberita[0],
                            'judulberita'   => $getmsberita->JudulBerita,
                            'isiberita'     => $getmsberita->IsiBerita
                        );
                        
                        $this->template->load('backend', 'admin/berita/updatedata', $data);
                    }
                }
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDBerita'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Berita belum dipilih";
                }
                else
                {
                    $this->load->model('MsBerita');
                    if ($this->MsBerita->Delete($input['IDBerita']))
                    {
                        unlink('assets/file/berita/'.$input['IDBerita'].'.jpg');
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Berita gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'foto')
            {
                $input = $this->input->post();
                if ($this->uri->segment(4) != NULL)
                {
                    $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                    $this->load->view('index',$data);
                }
                else
                {
                    redirect('admin/berita');
                }
            }
            else if ($this->uri->segment(3) == 'upload')
            {
                $input = $this->input->post();
                $idberita = $input['idberita'];
                if ($_FILES['photo']['error'] > 0)
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
                    list($width, $height, $type, $attr) = getimagesize($_FILES['photo']['tmp_name']);
                    if(in_array($type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
                    {
                        if ($_FILES['photo']['size'] != null)
                        {
                            $this->load->model('UploadModel');
                            $this->UploadModel->Upload('photo', $idberita, 'assets/file/berita');
                            $this->seterrormsg($input,"Foto berhasil diupload");
                        }
                    }
                    else
                    {
                        $this->seterrormsg($input,"File yang diupload harus berupa gambar");
                    }
                }
                redirect('admin/berita/foto/'.$idberita);
            }
            else if ($this->uri->segment(3) == 'deleteimage')
            {
                $input = $this->input->post();
                if ($input['IDBerita'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Foto belum dipilih";
                }
                else
                {
                    unlink('assets/file/berita/'.$input['IDBerita'].'.jpg');
                    $data['valid'] = true;
                    $data['error'] = "Foto berhasil dihapus";
                }
                $this->seterrormsg(NULL,$data['error']);
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsBerita');
                $getmsberita = $this->MsBerita->GetGridMsBerita(10,$page);
                $data['MsBeritaData'] = $getmsberita->result();
                $config['base_url'] = site_url('admin/berita');
                $config['total_rows'] = $this->MsBerita->GetCountMsBerita()->total_rows;
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
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/berita/daftar_berita', $data);
            }
        }
        else
        {
            redirect();
        }
    }
    public function beritaBaru()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idberita = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsBerita');
                $getmsberita = $this->MsBerita->GetMsBeritaByIDBerita($idberita);
                if ($getmsberita != NULL)
                {
                    $data['IDBerita'] = $getmsberita->IDBerita;
                    $data['TglBerita'] = $getmsberita->TglBerita;
                    $data['JudulBerita'] = $getmsberita->JudulBerita;
                    $data['IsiBerita'] = $getmsberita->IsiBerita;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                if (($this->input->post())) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalberita',
                            'label' => 'Tanggal Berita',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Lowongan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulberita',
                            'label' => 'Judul Lowongan Pekerjaan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Lowongan Harus diisi ',
                                'min_length' => 'Judul Lowongan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isiberita',
                            'label'  => 'Isi Berita',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Berita Harus diisi ',
                                'min_length' => 'Isi Berita Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    
                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/berita/tambahdata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglBerita'     => $post['tanggalberita'],
                            'JudulBerita'   => $post['judulberita'],
                            'IsiBerita'     => $post['isiberita']
                        );
                        $this->load->model('MsBerita');

                        if($this->MsBerita->Insert($data) != NULL)
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Gagal Ditambahkan", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/berita');
                    }
                }
                else
                {
                    $data['post'] = [];
                    $this->template->load('backend', 'admin/berita/tambahdata', $data);
                }
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $idberita = $this->uri->segment(4);
                $this->load->model('MsBerita');

                if ($this->input->post()) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalberita',
                            'label' => 'Tanggal Berita',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Lowongan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulberita',
                            'label' => 'Judul Lowongan Pekerjaan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Lowongan Harus diisi ',
                                'min_length' => 'Judul Lowongan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isiberita',
                            'label'  => 'Isi Berita',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Berita Harus diisi ',
                                'min_length' => 'Isi Berita Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/berita/tambahdata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglBerita'     => $post['tanggalberita'],
                            'JudulBerita'   => $post['judulberita'],
                            'IsiBerita'     => $post['isiberita']
                        );

                        if($this->MsBerita->Update($data,$idberita))
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Diubah", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Gagal Diubah", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/berita');
                    }
                }
                else
                {
                    $getmsberita = $this->MsBerita->GetMsBeritaByIDBerita($idberita);
                    if ($getmsberita != NULL)
                    {
                        $tglberita = explode('-', $getmsberita->TglBerita);
                        $data['post'] = array(
                            'idberita'      => $getmsberita->IDBerita,
                            'tanggalberita' => $tglberita[2] . '-' . $tglberita[1] . '-' . $tglberita[0],
                            'judulberita'   => $getmsberita->JudulBerita,
                            'isiberita'     => $getmsberita->IsiBerita
                        );
                        
                        $this->template->load('backend', 'admin/berita/updatedata', $data);
                    }
                }
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['IDBerita'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Berita belum dipilih";
                }
                else
                {
                    $this->load->model('MsBerita');
                    if ($this->MsBerita->Delete($input['IDBerita']))
                    {
                        unlink('assets/file/berita/'.$input['IDBerita'].'.jpg');
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Berita Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Berita gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'foto')
            {
                $input = $this->input->post();
                if ($this->uri->segment(4) != NULL)
                {
                    $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                    $this->load->view('index',$data);
                }
                else
                {
                    redirect('admin/berita');
                }
            }
            else if ($this->uri->segment(3) == 'upload')
            {
                $input = $this->input->post();
                $idberita = $input['idberita'];
                if ($_FILES['photo']['error'] > 0)
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
                    list($width, $height, $type, $attr) = getimagesize($_FILES['photo']['tmp_name']);
                    if(in_array($type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
                    {
                        if ($_FILES['photo']['size'] != null)
                        {
                            $this->load->model('UploadModel');
                            $this->UploadModel->Upload('photo', $idberita, 'assets/file/berita');
                            $this->seterrormsg($input,"Foto berhasil diupload");
                        }
                    }
                    else
                    {
                        $this->seterrormsg($input,"File yang diupload harus berupa gambar");
                    }
                }
                redirect('admin/berita/foto/'.$idberita);
            }
            else if ($this->uri->segment(3) == 'deleteimage')
            {
                $input = $this->input->post();
                if ($input['IDBerita'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Foto belum dipilih";
                }
                else
                {
                    unlink('assets/file/berita/'.$input['IDBerita'].'.jpg');
                    $data['valid'] = true;
                    $data['error'] = "Foto berhasil dihapus";
                }
                $this->seterrormsg(NULL,$data['error']);
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsBerita');
                $getmsberita = $this->MsBerita->GetGridMsBerita(10,$page);
                $data['MsBeritaData'] = $getmsberita->result();
                $config['base_url'] = site_url('admin/berita');
                $config['total_rows'] = $this->MsBerita->GetCountMsBerita()->total_rows;
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
                $data['route'] = $this->uri->segment(2);
                // $this->load->view('index',$data);
                $this->template->load('backend', 'admin/berita/daftar_berita', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    public function event()
    {
        if ($this->isadmin())
        {
            if ($this->uri->segment(3) == 'getdata')
            {
                $idevent = $this->uri->segment(4);
                $input = $this->input->post();
                $this->load->model('MsEvent');
                $getmsevent = $this->MsEvent->GetMsEventByIDEvent($idevent);
                if ($getmsevent != NULL)
                {
                    $data['IDEvent'] = $getmsevent->IDEvent;
                    $data['TglEvent'] = $getmsevent->TglEvent;
                    $data['JudulEvent'] = $getmsevent->JudulEvent;
                    $data['IsiEvent'] = $getmsevent->IsiEvent;
                    $data['exists'] = true;
                }
                else
                {
                    $data['exists'] = false;
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'tambahdata')
            {
                if (($this->input->post())) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalkegiatan',
                            'label' => 'Tanggal Kegiatan',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Kegiatan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulkegiatan',
                            'label' => 'Judul Kegiatan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Kegiatan Harus diisi ',
                                'min_length' => 'Judul Kegiatan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isikegiatan',
                            'label'  => 'Isi Kegiatan',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Kegiatan Harus diisi ',
                                'min_length' => 'Isi Kegiatan Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    
                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/kegiatan/tambahdata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglEvent'     => $post['tanggalkegiatan'],
                            'JudulEvent'   => $post['judulkegiatan'],
                            'IsiEvent'     => $post['isikegiatan']
                        );
                        $this->load->model('MsEvent');

                        if($this->MsEvent->Insert($data) != NULL)
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kegiatan Berhasil Ditambahkan", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kegiatan Gagal Ditambahkan", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/event');
                    }
                }
                else
                {
                    $data['post'] = [];
                    $this->template->load('backend', 'admin/kegiatan/tambahdata', $data);
                }
            }
            else if ($this->uri->segment(3) == 'updatedata')
            {
                $idkegiatan = $this->uri->segment(4);
                $this->load->model('MsEvent');

                if ($this->input->post()) 
                {
                    $post = $this->input->post();

                    $config = array(
                        array(
                            'field' => 'tanggalkegiatan',
                            'label' => 'Tanggal Kegiatan',
                            'rules' => 'required',
                            'errors' => array(
                                'required' => 'Tanggal Kegiatan Harus diisi '
                            )
                        ),
                        array(
                            'field' => 'judulkegiatan',
                            'label' => 'Judul Kegiatan',
                            'rules' => 'required|min_length[10]',
                            'errors' => array(
                                'required' => 'Judul Kegiatan Harus diisi ',
                                'min_length' => 'Judul Kegiatan Setidaknya Minimal 10 Karakter'
                            )
                        ),
                        array(
                            'field'  => 'isikegiatan',
                            'label'  => 'Isi Kegiatan',
                            'rules'  => 'required|min_length[20]',
                            'errors' => array(
                                'required' => 'Isi Kegiatan Harus diisi ',
                                'min_length' => 'Isi Kegiatan Setidaknya Minimal 20 Karakter'
                            )
                        )
                    );

                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $data['post'] = $post;
                        $this->template->load('backend', 'admin/kegiatan/updatedata', $data);
                    }
                    else
                    { 
                        $data = array(
                            'TglEvent'      => $post['tanggalkegiatan'],
                            'JudulEvent'   => $post['judulkegiatan'],
                            'IsiEvent'     => $post['isikegiatan']
                        );

                        if($this->MsEvent->Update($data,$idkegiatan))
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kegiatan Berhasil Diubah", "success", "fa fa-check")</script>');
                        }
                        else
                        {
                            $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kegiatan Gagal Diubah", "danger", "fa fa-exclamation")</script>');
                        }

                        redirect('admin/event');
                    }
                }
                else
                {
                    $getmsevent = $this->MsEvent->GetMsEventByIDEvent($idkegiatan);
                    if ($getmsevent != NULL)
                    {
                        $tglkegiatan = explode('-', $getmsevent->TglEvent);
                        $data['post'] = array(
                            'idkegiatan'     => $getmsevent->IDEvent,
                            'tanggalkegiatan' => $tglkegiatan[2] . '-' . $tglkegiatan[1] . '-' . $tglkegiatan[0],
                            'judulkegiatan'   => $getmsevent->JudulEvent,
                            'isikegiatan'     => $getmsevent->IsiEvent
                        );
                        
                        $this->template->load('backend', 'admin/kegiatan/updatedata', $data);
                    }
                }
            }
            else if ($this->uri->segment(3) == 'deletedata')
            {
                $input = $this->input->post();
                if ($input['idkegiatan'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Kegiatan belum dipilih";
                }
                else
                {
                    $this->load->model('MsEvent');
                    if ($this->MsEvent->Delete($input['idkegiatan']))
                    {
                        unlink('assets/file/event/'.$input['idkegiatan'].'.jpg');
                        $data['valid'] = true;
                        $this->session->set_flashdata('notifikasi', '<script>notifikasi("Kegiatan Berhasil Dihapus", "success", "fa fa-check")</script>');
                    }
                    else
                    {
                        $data['valid'] = false;
                        $data['error'] = "Kegiatan gagal dihapus";
                    }
                }
                echo json_encode($data);
            }
            else if ($this->uri->segment(3) == 'foto')
            {
                $input = $this->input->post();
                if ($this->uri->segment(4) != NULL)
                {
                    $data['route'] = $this->uri->segment(2).'/'.$this->uri->segment(3);
                    $this->load->view('index',$data);
                }
                else
                {
                    redirect('admin/event');
                }
            }
            else if ($this->uri->segment(3) == 'upload')
            {
                $input = $this->input->post();
                $idevent = $input['idevent'];
                if ($_FILES['photo']['error'] > 0)
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
                    list($width, $height, $type, $attr) = getimagesize($_FILES['photo']['tmp_name']);
                    if(in_array($type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
                    {
                        if ($_FILES['photo']['size'] != null)
                        {
                            $this->load->model('UploadModel');
                            $this->UploadModel->Upload('photo', $idevent, 'assets/file/event');
                            $this->seterrormsg($input,"Foto berhasil diupload");
                        }
                    }
                    else
                    {
                        $this->seterrormsg($input,"File yang diupload harus berupa gambar");
                    }
                }
                redirect('admin/event/foto/'.$idevent);
            }
            else if ($this->uri->segment(3) == 'deleteimage')
            {
                $input = $this->input->post();
                if ($input['IDEvent'] == '')
                {
                    $data['valid'] = false;
                    $data['error'] = "Foto belum dipilih";
                }
                else
                {
                    unlink('assets/file/event/'.$input['IDEvent'].'.jpg');
                    $data['valid'] = true;
                    $data['error'] = "Foto berhasil dihapus";
                }
                $this->seterrormsg(NULL,$data['error']);
                echo json_encode($data);
            }
            else
            {
                $page = $this->uri->segment(3);
                $this->load->model('MsEvent');
                $getmsevent = $this->MsEvent->GetGridMsEvent(10,$page);
                $data['MsEventData'] = $getmsevent->result();
                $config['base_url'] = site_url('admin/berita');
                $config['total_rows'] = $this->MsEvent->GetCountMsEvent()->total_rows;
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
                $data['route'] = $this->uri->segment(2);
                $this->template->load('backend', 'admin/kegiatan/daftar_kegiatan', $data);
            }
        }
        else
        {
            redirect();
        }
    }

    function isadmin()
    {

        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL)
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

    function print_view() {
        $idpencaker = $this->uri->segment(3);
        $this->load->model('MsPencaker');
        $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
        $data['IDPencaker'] = $getmspencakerdata->IDPencaker;
        $data['NomorIndukPencaker'] = $getmspencakerdata->NomerPenduduk;
        $data['NamaPencaker'] = $getmspencakerdata->NamaPencaker;
        $data['TempatLahir'] = $getmspencakerdata->TempatLahir;
        $data['TglLahir'] = $getmspencakerdata->TglLahir;
        $data['JenisKelamin'] = $getmspencakerdata->JenisKelamin;
        $data['Alamat'] = $getmspencakerdata->Alamat;
        $data['NamaAgama'] = $getmspencakerdata->NamaAgama;
        $data['NamaStatusPernikahan'] = $getmspencakerdata->NamaStatusPernikahan;
        $data['NamaStatusPendidikan'] = $getmspencakerdata->NamaStatusPendidikan;
        $data['TahunLulus'] = $getmspencakerdata->TahunLulus;
        $this->load->model('MsPengalaman');
        $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencaker($getmspencakerdata->IDPencaker);
        $data['PengalamanData'] = "";
        if ($getmspengalamandata->num_rows() > 0)
        {
            $data['PengalamanData'] = $getmspengalamandata->result_array();
        }
        else
        {
            $data['PengalamanData'] .= 'belum ada data';
        }
        $this->load->view('admin/view_print',$data); 
    }

        // Cetak AK 1
    function print_ak()
    {
        $idpencaker = $this->uri->segment(3);
        $this->load->model('MsPencaker');
        $this->load->model("MsCMS");
        $data['ak'] = $this->MsCMS->dataAk();
        $getmspencakerdata = $this->MsPencaker->GetMsPencakerByIDPencaker($idpencaker);
        $data['IDPencaker'] = $getmspencakerdata->IDPencaker;
        $data['NomorIndukPencaker'] = $getmspencakerdata->NomorIndukPencaker;
        $data['NamaPencaker'] = $getmspencakerdata->NamaPencaker;
        $data['TempatLahir'] = $getmspencakerdata->TempatLahir;
        $data['TglLahir'] = $getmspencakerdata->TglLahir;
        $data['JenisKelamin'] = $getmspencakerdata->JenisKelamin;
        $data['Alamat'] = $getmspencakerdata->Alamat;
        $data['NamaAgama'] = $getmspencakerdata->NamaAgama;
        $data['NamaStatusPernikahan'] = $getmspencakerdata->NamaStatusPernikahan;
        $data['NamaStatusPendidikan'] = $getmspencakerdata->NamaStatusPendidikan;
        $data['TahunLulus'] = $getmspencakerdata->TahunLulus;
        $data['NomerPenduduk'] = $getmspencakerdata->NomerPenduduk;
        $data['TahunLulus'] = $getmspencakerdata->TahunLulus;
        $data['Keterampilan'] = $getmspencakerdata->Keterampilan;
        $data['Jurusan'] = $getmspencakerdata->Jurusan;
        $data['Minat'] = $getmspencakerdata->TypePekerjaan;

        $this->load->model('MsPengalaman');
        $getmspengalamandata = $this->MsPengalaman->GetMsPengalamanByIDPencakerLIMIT($getmspencakerdata->IDPencaker);
        if ($getmspengalamandata->num_rows() > 0)
        {
            $data['PengalamanData'] = $getmspengalamandata->result_array();
        }
        else
        { 
            $data['PengalamanData'] = array();
        }
        $this->load->view('admin/view_ak',$data); 
    }


    public function report()
    {
        if ($this->isadmin())
        {
            $data = array();
            if ($this->uri->segment(3) == 'lap_penempatan')
            {
                if ($this->uri->segment(4) != '') 
                {
                    if ($this->uri->segment(4) == 'get_data')
                    {
                        $this->load->model('MsBidangPerusahaan');
                        $this->load->model('MsPerusahaan');
                        $this->load->model('MsLowongan');
                        $this->load->model('TrLowonganMasuk');

                        $dataMsBidangPerusahaan = $this->MsBidangPerusahaan->GetMsBidangPerusahaan();
                        foreach ($dataMsBidangPerusahaan as $bid) 
                        {
                            $row['IDBidangPerusahaan'] = $bid->IDBidangPerusahaan;
                            $row['NamaBidangPerusahaan'] = $bid->NamaBidangPerusahaan;
                            $row['diterimaL'] = 0;
                            $row['diterimaP'] = 0;
                            $row['diprosesL'] = 0;
                            $row['diprosesP'] = 0;
                            $row['terdaftarL'] = 0;
                            $row['terdaftarP'] = 0;

                            $dataMsPerusahaan = $this->MsPerusahaan->GetByIDBidangPerusahaan($bid->IDBidangPerusahaan);
                            foreach ($dataMsPerusahaan as $pt) 
                            {
                                $dataMsLowongan = $this->MsLowongan->GetMsLowonganByIDPerusahaan($pt->IDPerusahaan);
                                    // die('test');
                                foreach ($dataMsLowongan as $low) 
                                {
                                    // Diterima 
                                    $row['diterimaL'] += $this->TrLowonganMasuk->GetCountBy(0, 2);
                                    $row['diterimaP'] += $this->TrLowonganMasuk->GetCountBy(1, 2);

                                    //Diproses
                                    $row['diprosesL'] += $this->TrLowonganMasuk->GetCountBy(0, 1);
                                    $row['diprosesP'] += $this->TrLowonganMasuk->GetCountBy(0, 2);

                                    // Terdaftar
                                    $row['terdaftarL'] += $this->TrLowonganMasuk->GetCountBy(0, 0);
                                    $row['terdaftarP'] += $this->TrLowonganMasuk->GetCountBy(1, 0);
                                }
                            }
                            $data[] = $row;
                        }
                        echo json_encode($data);
                    }
                } else 
                {
                    $this->template->load('backend', 'admin/lap_penempatan', $data);
                }
            }
            else 
            {
                if ($this->uri->segment(3) == 'lap_rekap_pencaker')
                {
                    if ($this->uri->segment(4) == 'submit')
                    {
                        $cat    = $this->input->post('kategori');
                        $type   = $this->input->post('jenispencaker');
                        $jenis  = $this->input->post('jenisfilter');
                        $start  = date("Y-m-d", strtotime($this->input->post('date_from')));
                        $end    = date("Y-m-d", strtotime($this->input->post('date_to')));

                        $data   = $this->count_jumlahpencaker($cat, $type, $jenis, $start, $end);
                        echo json_encode($data);
                    }
                    else 
                    {
                        $this->template->load('backend', 'admin/lap_rekap_pencaker', array());
                    }
                }
            }
        }
        else 
        {
            redirect();
        }
    }

    private function count_jumlahpencaker($cat = '', $type = '', $jenis = '', $start = '', $end = '')
    {
        if($this->isadmin())
        {
            if($jenis == 0)
            {
                $data = array(
                    'summary' => array(),
                    'detail' => array()
                );

                // Report Berdasarkan Kecamatan
                if ($cat == 0)
                {
                    $this->load->model('MsKecamatan');
                    $this->load->model('MsKelurahan');
                    $this->load->model('TrLowonganMasuk');

                    $dataKec = $this->MsKecamatan->GetMsKecamatan();
                    foreach ($dataKec as $k)
                    {
                        $row = array(
                            'kecamatan' => $k->NamaKecamatan,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        );

                        $dataKel = $this->MsKelurahan->GetComboMsKelurahanByIDKecamatan($k->IDKecamatan);
                        foreach ($dataKel as $l) 
                        {
                            $wh = array(
                                'kelurahan' => $l->IDKelurahan,
                                'from' => $start,
                                'to' => $end
                            );

                            //get count for male
                            $wh['jk'] = 0;
                            $row['pria'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                            //get count for female
                            $wh['jk'] = 1;
                            $row['wanita'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                        }
                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }

                //Report Berdasarkan Kelompok Umur
                if ($cat ==1)
                {
                    $this->load->model('TrLowonganMasuk');

                    $umur = array(
                        '0 s/d 14' =>array(
                            'batasatas'=>14,
                            'batasbawah'=>0
                        ),
                        '15 s/d 19'=>array(
                            'batasatas'=>19,
                            'batasbawah'=>15
                        ),
                        '20 s/d 29'=>array(
                            'batasatas'=>29,
                            'batasbawah'=>20
                        ),
                        '30 s/d 44'=>array(
                            'batasatas'=>44,
                            'batasbawah'=>30
                        ),
                        '45 s/d 54'=>array(
                            'batasatas'=>54,
                            'batasbawah'=>45
                        ),
                        '55 Keatas'=>array(
                            'batasatas'=>0,
                            'batasbawah'=>55
                        )
                    );

                    foreach ($umur as $key => $value) {
                        $row = array(
                            'Kelompok Umur' => $key,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        );

                        $wh = array(
                            'umur' => $value,
                            'from' => $start,
                            'to' => $end
                        );

                        //jumlah pria
                        $wh['jk'] = 0;
                        $row['pria'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                        //jumlah wanita
                        $wh['jk'] = 1;
                        $row['wanita'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }
                if($cat == 2)
                {
                    // Report Berdasarkan Tingkat Pendidikan & Jurusan

                    // Ambil data pendidikan
                    $this->load->model('MsStatusPendidikan');
                    $this->load->model('TrLowonganMasuk');
                    $this->load->model('MsJurusan');

                    $statusPendidikan = $this->MsStatusPendidikan->GetMsStatusPendidikan();
                    foreach ($statusPendidikan as $p) {

                        // ambil data jurusan
                        $jurusan = $this->MsJurusan->GetJurusanByIDStatusPendidikan($p->IDStatusPendidikan);

                        // deklarasi nilai
                        $row = array(
                            'pendidikan' => $p->NamaStatusPendidikan,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0 
                        );

                        $wh = array(
                            'idpendidikan' => $p->IDStatusPendidikan,
                            'from' => $start,
                            'to' => $end
                        );

                        //jumlah pria
                        $wh['jk'] = 0;
                        $row['pria'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                        $wh['jk'] = 1;
                        $row['wanita'] += $this->TrLowonganMasuk->GetCountCustom($cat, $type, $wh);

                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }
                $data['summary'] = $this->TrLowonganMasuk->GetCountByPeriod($type, $start, $end, $cat);
                $data['jenis'] = 0;
            } else if($jenis == 1)
            {
                $this->load->model('TrLowonganMasuk');
                $data['detail'] = $this->TrLowonganMasuk->GetByRangeDate($start, $end);
                $data['jenis'] = 1;
            }
            else if($jenis == 2)
            {
                $this->load->model('TrLowonganMasuk');
                $this->load->model('MsPencaker');
                $ditempatkan = $this->TrLowonganMasuk->GetByRangeDate($start, $end, 1);
                $data['detail'] = $ditempatkan;
                $data['jenis'] = 2;
            }

            return $data;
        }
    }

    private function newReportPencaker($cat = '', $type = '', $jenis = '', $start = '', $end = '')
    {
        if($this->isadmin())
        {
            if($jenis == 0)
            {
                $data = array(
                    'summary' => array(),
                    'detail' => array()
                );

                // Report Berdasarkan Kecamatan
                if ($cat == 'kecamatan')
                {
                    $this->load->model("MsLaporan");

                    if ($type == '1') {
                        $kecamatan = $this->db->query("SELECT IDKecamatan, NamaKecamatan FROM mskecamatan ORDER BY NamaKecamatan ASC")->result_array();
                        foreach ($kecamatan as $keykecamatan) {
                            $result = $this->MsLaporan->dataNullByKecamatan($start, $end, $type, $keykecamatan['IDKecamatan']);
                            if ($result == NULL) {
                                $row = array(
                                    "NamaKecamatan" => $keykecamatan['NamaKecamatan'], 
                                    "total" => 0, 
                                    "laki" => 0, 
                                    "cewe" => 0, 
                                );
                            }else{
                                $row = $result[0];
                            }

                            $datahasil[] = $row;    
                        }
                        $data['detail'] = $datahasil;
                    }else{
                       $data['detail'] = $this->MsLaporan->dataByKecamatan($start, $end, $type);
                   }
               }
                //Report Berdasarkan Kelompok Umur
               if ($cat == 'umur')
               {
                $this->load->model("MsLaporan");
                if ($type == '1') {
                    $data['detail'] = $this->MsLaporan->dataNullByUmur($start, $end, $type);
                }else{
                    $data['detail'] = $this->MsLaporan->dataByUmur($start, $end, $type);
                }
            }
            if($cat == 'pendidikan')
            {
                $this->load->model("MsLaporan");
                if ($type == '1') {
                    $pendidikan = $this->db->query("SELECT IDStatusPendidikan, NamaStatusPendidikan FROM msstatuspendidikan ORDER BY NamaStatusPendidikan ASC")->result_array();
                    foreach ($pendidikan as $keypendidikan) {
                        $result = $this->MsLaporan->dataNullByPendidikan($start, $end, $type, $keypendidikan['IDStatusPendidikan']);
                        if ($result == NULL) {
                            $row = array(
                                "NamaStatusPendidikan" => $keypendidikan['NamaStatusPendidikan'], 
                                "total" => 0, 
                                "laki" => 0, 
                                "cewe" => 0, 
                            );
                        }else{
                            $row = $result[0];
                        }

                        $datahasil[] = $row;    
                    }
                    $data['detail'] = $datahasil;
                }else{
                    $data['detail'] = $this->MsLaporan->dataByPendidikan($start, $end, $type);
                }
            }

            if($cat == 'posisi')
            {

                $this->load->model("MsLaporan");
                if ($type == '1') {
                    $jabatan = $this->db->query("SELECT IDPosisiJabatan, NamaPosisiJabatan FROM msposisijabatan ORDER BY NamaPosisiJabatan ASC")->result_array();
                    foreach ($jabatan as $keyjabatan) {
                        $result = $this->MsLaporan->dataNullByPosisiJabatan($start, $end, $type, $keyjabatan['IDPosisiJabatan']);
                        if ($result == NULL) {
                            $row = array(
                                "NamaPosisiJabatan" => $keyjabatan['NamaPosisiJabatan'], 
                                "total" => 0, 
                                "laki" => 0, 
                                "cewe" => 0, 
                            );
                        }else{
                            $row = $result[0];
                        }

                        $datahasil[] = $row;    
                    }
                    $data['detail'] = $datahasil;
                }else{
                 $data['detail'] = $this->MsLaporan->dataByPosisiJabatan($start, $end, $type);
             }
         }

         $this->load->model("MsLaporan");
         $data['summary'] = $this->MsLaporan->GetCountByPeriod($type, $start, $end, $cat);
         $data['jenis'] = 0;
     } else if($jenis == 1)
     {
        $this->load->model("MsLaporan");
        $data['detail'] = $this->MsLaporan->dataByLamaran($start, $end);
                // $data['summary'] = $this->MsLaporan->GetCountByPeriod($type, $start, $end, $cat);
        $data['jenis'] = 1;
    }
    else if($jenis == 2)
    {
        $this->load->model("MsLaporan");
                // $data['summary'] = $this->MsLaporan->GetCountByPeriod($type, $start, $end, $cat);
        $data['detail'] = $this->MsLaporan->dataByPenempatan($start, $end);
        $data['jenis'] = 2;
    }
    else if($jenis == 3)
    {
        $this->load->model("MsLaporan");
                // $data['summary'] = $this->MsLaporan->GetCountByPeriod($type, $start, $end, $cat);
        $data['detail'] = $this->MsLaporan->dataByTerdaftar($start, $end);
        $data['jenis'] = 3;
    }

    return $data;
}
}

public function export_laporan()
{
    if ($this->isadmin()) 
    {
        if ($this->input->post()) 
        {
            $this->load->library('PHPExcel');
            $cat    = $this->input->post('xkategori');
            $type   = $this->input->post('xjenispencaker');
            $jenis  = $this->input->post('xjenisfilter');
            $start  = date("Y-m-d", strtotime($this->input->post('xdate_from')));
            $awal  = date("d-m-Y", strtotime($this->input->post('xdate_from')));
            $end    = date("Y-m-d", strtotime($this->input->post('xdate_to')));
            $akhir    = date("d-m-Y", strtotime($this->input->post('xdate_to')));
            $periode = $awal . ' s/d ' . $akhir;
            $data   = $this->newReportPencaker($cat, $type, $jenis, $start, $end);
            $this->load->library('PHPExcel');
            $excel    = new PHPExcel();

            if($type == 0)
                $typestr = 'Pencaker Terdaftar';
            elseif($type == 1)
                $typestr = 'Pencaker Ditempatkan';
            elseif($type == 1)
                $typestr = 'Pencaker Ditempatkan / Diterima';

            $jenispencaker = 'Jenis Pencaker : ' . $typestr;

            $style_col = array(      
                'font' => array('bold' => true), 
                'alignment' => array(        
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, 
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
                ),      
                'borders' => array(        
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
                )    
            );

            $style_num = array(      
                'alignment' => array(        
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,    
                ),      
                'borders' => array(        
                    'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
                )    
            );

            $style_row = array(      
                'alignment' => array(        
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER     
                ),      
                'borders' => array(        
                    'top'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom'=> array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
                    'left'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
                )    
            );
            if($jenis == 0)
            {

                $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP JUMLAH PENCAKER BKOL DEPOK");
                $excel->setActiveSheetIndex(0)->setCellValue('A2', "PERIODE " . $periode);
                $excel->setActiveSheetIndex(0)->setCellValue('A3', $jenispencaker);
                $excel->getActiveSheet()->mergeCells('A1:E1');
                $excel->getActiveSheet()->mergeCells('A2:E2');
                $excel->getActiveSheet()->mergeCells('A3:E3');
                $excel->getActiveSheet()->mergeCells('A4:E4');
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
                $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
                $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                if($cat == 'kecamatan')
                {
                    $kategori = 'Kecamatan';

                    $excel->setActiveSheetIndex(0)->setCellValue('A6', "No.");
                    $excel->setActiveSheetIndex(0)->setCellValue('B6', "Nama Kecamatan");
                    $excel->setActiveSheetIndex(0)->setCellValue('C6', "Jml Pria");
                    $excel->setActiveSheetIndex(0)->setCellValue('D6', "Jml Wanita");
                    $excel->setActiveSheetIndex(0)->setCellValue('E6', "Total");
                    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);    

                    $no = 1;
                    $numrow = 7; 
                    foreach($data['detail'] as $key => $val)
                    {
                        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val['NamaKecamatan']);
                        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['laki']);
                        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['cewe']);
                        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $val['total']);
                        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_num);
                        $numrow++;
                        $no++; 

                    }
                }
                elseif($cat == 'umur')
                {
                    $kategori = 'Kelompok Umur';
                    $excel->setActiveSheetIndex(0)->setCellValue('A6', "No.");
                    $excel->setActiveSheetIndex(0)->setCellValue('B6', "Kelompok Umur");
                    $excel->setActiveSheetIndex(0)->setCellValue('C6', "Jml Pria");
                    $excel->setActiveSheetIndex(0)->setCellValue('D6', "Jml Wanita");
                    $excel->setActiveSheetIndex(0)->setCellValue('E6', "Total");
                    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);    

                    $no = 1;
                    $numrow = 7; 
                    foreach($data['detail'] as $key => $val)
                    {
                        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val['age']);
                        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['laki']);
                        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['cewe']);
                        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $val['Total']);
                        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_num);
                        $numrow++;
                        $no++; 

                    }
                }
                elseif($cat == 'pendidikan')
                {
                    $kategori = 'Tingkat Pendidikan';
                    $excel->setActiveSheetIndex(0)->setCellValue('A6', "No.");
                    $excel->setActiveSheetIndex(0)->setCellValue('B6', "Tingkat Pendidikan");
                    $excel->setActiveSheetIndex(0)->setCellValue('C6', "Jml Pria");
                    $excel->setActiveSheetIndex(0)->setCellValue('D6', "Jml Wanita");
                    $excel->setActiveSheetIndex(0)->setCellValue('E6', "Total");
                    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);    

                    $no = 1;
                    $numrow = 7; 
                    foreach($data['detail'] as $key => $val)
                    {
                        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val['NamaStatusPendidikan']);
                        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['laki']);
                        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['cewe']);
                        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $val['total']);
                        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_num);
                        $numrow++;
                        $no++; 

                    }
                }
                elseif($cat == 'posisi')
                {
                    $kategori = 'Posisi Jabatan';
                    $excel->setActiveSheetIndex(0)->setCellValue('A6', "No.");
                    $excel->setActiveSheetIndex(0)->setCellValue('B6', "Posisi Jabatan");
                    $excel->setActiveSheetIndex(0)->setCellValue('C6', "Jml Pria");
                    $excel->setActiveSheetIndex(0)->setCellValue('D6', "Jml Wanita");
                    $excel->setActiveSheetIndex(0)->setCellValue('E6', "Total");
                    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);    
                    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);    

                    $no = 1;
                    $numrow = 7; 
                    foreach($data['detail'] as $key => $val)
                    {
                        $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                        $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val['NamaPosisiJabatan']);
                        $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['laki']);
                        $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['cewe']);
                        $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $val['total']);
                        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_num);
                        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_num);
                        $numrow++;
                        $no++; 

                    }
                }

                $excel->getActiveSheet()->mergeCells('A'.$numrow.':B'.$numrow);
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, 'Total');      
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['summary'][0]->laki);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['summary'][0]->cewe);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['summary'][0]->total);
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_col);

                $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); 
                $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); 
                $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
                $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
                $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
                $excel->setActiveSheetIndex(0)->setCellValue('A4', 'Kategori Pencaker : Berdasarkan '.$kategori);

                $excel->getProperties()->setCreator('Disnaker Kota Depok')
                ->setLastModifiedBy('Disnaker Kota Depok')                 
                ->setTitle('Rekap Jumlah Pencaker Berdasarkan ' .$kategori)                 
                ->setSubject("Jumlah Pencaker")                 
                ->setDescription("Laporan Jumlah Pencaker")                 
                ->setKeywords("Data Pencaker");

                $excel->getActiveSheet(0)->setTitle('Rekap Pencaker');    
                $excel->setActiveSheetIndex(0);  
                $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
                if (ob_get_length()) ob_end_clean(); 
                header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
                header('Chace-Control: no-store, no-cache, must-revalation');
                header('Chace-Control: post-check=0, pre-check=0', FALSE);
                header('Pragma: no-cache');
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="RekapPencaker-'. date('Ymd') .'.xlsx"');    
                $write->save('php://output');
            }
            elseif($jenis == 1)
            {
                $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN LAMARAN DIPROSES");
                $excel->setActiveSheetIndex(0)->setCellValue('A2', "BKOL KOTA DEPOK");
                $excel->setActiveSheetIndex(0)->setCellValue('A3', "PERIODE " . $periode);
                $excel->getActiveSheet()->mergeCells('A1:E1');
                $excel->getActiveSheet()->mergeCells('A2:E2');
                $excel->getActiveSheet()->mergeCells('A3:E3');
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
                $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
                $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
                $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
                $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                $excel->setActiveSheetIndex(0)->setCellValue('A5', "No.");
                $excel->setActiveSheetIndex(0)->setCellValue('B5', "Nama Pencaker");
                $excel->setActiveSheetIndex(0)->setCellValue('C5', "Nama Lowongan");
                $excel->setActiveSheetIndex(0)->setCellValue('D5', "Nama Perusahaan");
                $excel->setActiveSheetIndex(0)->setCellValue('E5', "Status");

                $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);    
                $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);    
                $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);    
                $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);    
                $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);    

                $no = 1;
                $numrow = 6; 
                foreach($data['detail'] as $key => $val)
                {
                    if ($val['StatusLowongan'] == '0') {
                        $statusLowongan = 'Belum Diproses';
                    }elseif($val['StatusLowongan'] == '1'){
                        $statusLowongan = 'Proses Verifikasi';
                    }elseif($val['StatusLowongan'] == '2'){
                        $statusLowongan = 'Diterima';
                    }elseif($val['StatusLowongan'] == '3'){
                        $statusLowongan = 'Ditolak';
                    }elseif($val['StatusLowongan'] == '4'){
                        $statusLowongan = 'Tidak Memenuhi Persyaratan';
                    }else{
                     $statusLowongan = 'Tidak Memenuhi Persyaratan';
                 }
                 $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                 $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $val['NamaPencaker']);
                 $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['NamaLowongan']);
                 $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['NamaPerusahaan']);
                 $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $statusLowongan);
                 $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_num);
                 $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                 $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                 $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                 $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_num);
                 $numrow++;
                 $no++; 

             }

             $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
             $excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); 
             $excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); 
             $excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
             $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
             $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
             $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

             $excel->getProperties()->setCreator('Disnaker Kota Depok')
             ->setLastModifiedBy('Disnaker Kota Depok')                 
             ->setTitle('Rekap Lamaran yang di proses')                 
             ->setSubject("Lamaran Diproses")                 
             ->setDescription("Laporan Lamaran Diproses")                 
             ->setKeywords("Data Pencaker");

             $excel->getActiveSheet(0)->setTitle('Rekap Lamaran Di Proses');
             $excel->getActiveSheet(0)->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);    
             $excel->setActiveSheetIndex(0);  
             $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
             if (ob_get_length()) ob_end_clean(); 
             header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
             header('Chace-Control: no-store, no-cache, must-revalation');
             header('Chace-Control: post-check=0, pre-check=0', FALSE);
             header('Pragma: no-cache');
             header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
             header('Content-Disposition: attachment;filename="LamaranDiproses-'. date('Ymd') .'.xlsx"');    
             $write->save('php://output');
         }
         elseif($jenis == 2)
         {

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN PENEMPATAN PENCAKER");
            $excel->setActiveSheetIndex(0)->setCellValue('A2', "BKOL KOTA DEPOK");
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "PERIODE " . $periode);
            $excel->getActiveSheet()->mergeCells('A1:H1');
            $excel->getActiveSheet()->mergeCells('A2:H2');
            $excel->getActiveSheet()->mergeCells('A3:H3');
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
            $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $excel->setActiveSheetIndex(0)->setCellValue('A5', "No.");
            $excel->setActiveSheetIndex(0)->setCellValue('B5', "Nomor KTP");
            $excel->setActiveSheetIndex(0)->setCellValue('C5', "Nama Pencaker");
            $excel->setActiveSheetIndex(0)->setCellValue('D5', "Alamat");
            $excel->setActiveSheetIndex(0)->setCellValue('E5', "Nama Perusahaan");
            $excel->setActiveSheetIndex(0)->setCellValue('F5', "Jabatan");
            $excel->setActiveSheetIndex(0)->setCellValue('G5', "Pendidikan");
            $excel->setActiveSheetIndex(0)->setCellValue('H5', "Jenis Kelamin");

            $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);    

            $no = 1;
            $numrow = 6; 
            foreach($data['detail'] as $key => $val)
            {
                if ($val['JenisKelamin'] == '0') {
                    $JKJK = 'Laki - Laki';
                }else{
                    $JKJK = 'Perempuan';
                }
                if($val['NamaPerusahaan'] == null){
                    $namper = 'Perusahaan Tidak Diketahui';
                }else{
                    $namper = $val['NamaPerusahaan'];
                }
                if($val['Jabatan'] == null){
                    $jabatanper = 'Jabatan Tidak Diketahui';
                }else{
                    $jabatanper = $val['Jabatan'];
                }
                $sheet = $excel->setActiveSheetIndex(0);  
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $val['NomerPenduduk'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['NamaPencaker']);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['alamat']);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $namper);
                $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $jabatanper);
                $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $val['NamaStatusPendidikan']);
                $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $JKJK);
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_num);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_num);
                $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_num);
                $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_num);
                $numrow++;
                $no++; 

            }

            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); 
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            $excel->getProperties()->setCreator('Disnaker Kota Depok')
            ->setLastModifiedBy('Disnaker Kota Depok')                 
            ->setTitle('Laporan Penempatan Pencaker')                 
            ->setSubject("Penempatan Pencaker")                 
            ->setDescription("Laporan Penempatan Pencaker")                 
            ->setKeywords("Data Penempatan Pencaker");

            $excel->getActiveSheet(0)->setTitle('Laporan Penempatan Pencaker');
            $excel->getActiveSheet(0)->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);    
            $excel->setActiveSheetIndex(0);  
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
            if (ob_get_length()) ob_end_clean(); 
            header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="LaporanPenempatan-'. date('Ymd') .'.xlsx"');    
            $write->save('php://output');
        }
        elseif($jenis == 3){

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN PENCAKER TERDAFTAR");
            $excel->setActiveSheetIndex(0)->setCellValue('A2', "BKOL KOTA DEPOK");
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "PERIODE " . $periode);
            $excel->getActiveSheet()->mergeCells('A1:H1');
            $excel->getActiveSheet()->mergeCells('A2:H2');
            $excel->getActiveSheet()->mergeCells('A3:H3');
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
            $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $excel->setActiveSheetIndex(0)->setCellValue('A5', "No.");
            $excel->setActiveSheetIndex(0)->setCellValue('B5', "Nomor KTP");
            $excel->setActiveSheetIndex(0)->setCellValue('C5', "Nama Pencaker");
            $excel->setActiveSheetIndex(0)->setCellValue('D5', "Alamat");
            $excel->setActiveSheetIndex(0)->setCellValue('E5', "Pendidikan");
            $excel->setActiveSheetIndex(0)->setCellValue('F5', "Jenis Kelamin");

            $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);    
            $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);    

            $no = 1;
            $numrow = 6; 
            foreach($data['detail'] as $key => $val)
            {
                if ($val['JenisKelamin'] == '0') {
                    $JKJK = 'Laki - Laki';
                }else{
                    $JKJK = 'Perempuan';
                }
                $sheet = $excel->setActiveSheetIndex(0);  
                $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);      
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('B'.$numrow, $val['NomerPenduduk'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $val['NamaPencaker']);
                $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $val['alamat']);
                $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $val['NamaStatusPendidikan']);
                $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $JKJK);
                $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_num);
                $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_num);
                $numrow++;
                $no++; 

            }
            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); 
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(35); 
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            $excel->getProperties()->setCreator('Disnaker Kota Depok')
            ->setLastModifiedBy('Disnaker Kota Depok')                 
            ->setTitle('Laporan Penempatan Pencaker')                 
            ->setSubject("Penempatan Pencaker")                 
            ->setDescription("Laporan Penempatan Pencaker")                 
            ->setKeywords("Data Penempatan Pencaker");

            $excel->getActiveSheet(0)->setTitle('Laporan Penempatan Pencaker');
            $excel->getActiveSheet(0)->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);    
            $excel->setActiveSheetIndex(0);  
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
            if (ob_get_length()) ob_end_clean(); 
            header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="LaporanTerdaftar-'. date('Ymd') .'.xlsx"');    
            $write->save('php://output');
        }
    }
}
}
public function report_lama()
{
    if ($this->isadmin())
    {
        $this->load->model('MsPencakerLama', 'pencaker');

        $data = array();

        if ($this->uri->segment(3) == 'lap_rekap_pencaker')
        {
            if ($this->uri->segment(4) == 'submit')
            {
                $cat = $this->input->post('kategori');
                $type = 0;

                $data = array(
                    'summary' => array(),
                    'detail' => array()
                );

                    // Report Berdasarkan Kecamatan
                if ($cat == 0)
                {

                    $dataKec = $this->pencaker->GetMsKecamatan();
                    foreach ($dataKec as $k)
                    {
                        $row = array(
                            'kecamatan' => $k->NamaKecamatan,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        );

                        $wh = array(
                            'kecamatan' => $k->IDKecamatan,
                        );

                            //get count for male
                        $wh['jk'] = 0;
                        $row['pria'] += $this->pencaker->GetCountCustom($cat, $wh);

                            //get count for female
                        $wh['jk'] = 1;
                        $row['wanita'] += $this->pencaker->GetCountCustom($cat, $wh);
                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }

                    //Report Berdasarkan Kelompok Umur
                if ($cat ==1)
                {
                    $umur = array(
                        '0 s/d 14' =>array(
                            'batasatas'=>14,
                            'batasbawah'=>0
                        ),
                        '15 s/d 19'=>array(
                            'batasatas'=>19,
                            'batasbawah'=>15
                        ),
                        '20 s/d 29'=>array(
                            'batasatas'=>29,
                            'batasbawah'=>20
                        ),
                        '30 s/d 44'=>array(
                            'batasatas'=>44,
                            'batasbawah'=>30
                        ),
                        '45 s/d 54'=>array(
                            'batasatas'=>54,
                            'batasbawah'=>45
                        ),
                        '55 Keatas'=>array(
                            'batasatas'=>0,
                            'batasbawah'=>55
                        )
                    );

                    foreach ($umur as $key => $value) {
                        $row = array(
                            'Kelompok Umur' => $key,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0
                        );

                        $wh = array(
                            'umur' => $value
                        );

                            //jumlah pria
                        $wh['jk'] = 0;
                        $row['pria'] += $this->pencaker->GetCountCustom($cat, $wh);

                            //jumlah wanita
                        $wh['jk'] = 1;
                        $row['wanita'] += $this->pencaker->GetCountCustom($cat, $wh);

                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }
                if($cat == 2)
                {
                        // Report Berdasarkan Tingkat Pendidikan & Jurusan

                        // Ambil data pendidikan

                    $statusPendidikan = $this->pencaker->GetMsStatusPendidikan();
                    foreach ($statusPendidikan as $p) {

                            // deklarasi nilai
                        $row = array(
                            'pendidikan' => $p->NamaTingkatPendidikan,
                            'pria' => 0,
                            'wanita' => 0,
                            'total' => 0 
                        );

                        $wh = array(
                            'pendidikan' => $p->IDTingkatPendidikan,
                        );

                            //jumlah pria
                        $wh['jk'] = 0;
                        $row['pria'] += $this->pencaker->GetCountCustom($cat, $wh);

                        $wh['jk'] = 1;
                        $row['wanita'] += $this->pencaker->GetCountCustom($cat, $wh);

                        $row['total'] = $row['pria'] + $row['wanita'];

                        $data['detail'][] = $row;
                    }
                }

                $data['summary'] = $this->pencaker->GetCount();
                echo json_encode($data);
            }
            else 
            {
                $this->template->load('backend', 'admin/lap_rekap_pencaker_lama', array());
            }
        }
    }
    else 
    {
        redirect();
    }
}

public function cmsContactUs()
{
    if ($this->isadmin())
    {
        $this->load->helper('text');
        $this->load->model("MsCMS");
        $data = array(
            'cms' => $this->MsCMS->dataContactUs(),
        );
        $this->template->load('backend', 'admin/cmsContactUs', $data);
    }
    else
    {
        redirect();
    }
}

public function cmsSlider()
{
    if ($this->isadmin())
    {
        $this->load->model("MsCMS");
        $data = array(
            'cms' => $this->MsCMS->dataSlider(),
        );
        $this->template->load('backend', 'admin/cmsSlider', $data);
    }
    else
    {
        redirect();
    }
}

public function cmsSliderInsert()
{
    if ($this->isadmin())
    {
        // $cek = $this->db->query("SELECT COUNT(idslider) as id FROM msslider WHERE status='1'")->result_array();
        // if ($cek[0]['id'] >= 3) {
        //     echo "kebanyakan";
        // }else{
      date_default_timezone_get("Asia/Jakarta");
      $gambarInsert = $this->input->post("gambarInsert");
      $statusInsert = $this->input->post("statusInsert");
      $config['upload_path']          = './assets/slider/';
      $config['allowed_types']        = 'jpg|png';
      $config['max_size']             = 2097152;
      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambarInsert')){
        echo "error";
    }else{
      $data = array(
        'gambar' => $this->upload->data('file_name')['file_name'],
        'status' => $statusInsert,
    );
      $this->db->insert("msslider", $data);
      echo "success";
  }
  // }
}   
else
{
    redirect();
}
}

public function cmsSliderEdit()
{
    if ($this->isadmin())
    {
        // $cek = $this->db->query("SELECT COUNT(idslider) as id FROM msslider WHERE status='1'")->result_array();
        // if ($cek[0]['id'] >= 3) {
        //     echo "kebanyakan";
        // }else{          
      date_default_timezone_get("Asia/Jakarta");
      $statusEdit = $this->input->post("statusEdit");
      $idEdit = $this->input->post("idedit");
      $this->db->query("UPDATE msslider SET status='$statusEdit' WHERE idslider='$idEdit'");
      echo "success";
  }
// }
  else
  {
    redirect();
}
}

public function cmsSliderEditGambar()
{
    if ($this->isadmin())
    {
        // $cek = $this->db->query("SELECT COUNT(idslider) as id FROM msslider WHERE status='1'")->result_array();
        // if ($cek[0]['id'] >= 3) {
        //     echo "kebanyakan";
        // }else{          
      date_default_timezone_get("Asia/Jakarta");
      $statusEdit = $this->input->post("statusEdit");
      $idEdit = $this->input->post("idedit");
      $gambarEdit = $this->input->post("gambarEdit");
      $config['upload_path']          = './assets/slider/';
      $config['allowed_types']        = 'jpg|png';
      $config['max_size']             = 2097152;
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambarEdit')){
        var_dump($this->upload->display_errors());
        echo "error";
    }else{

      $postgambar = $this->upload->data('file_name')['file_name'];
      $query = $this->db->query("UPDATE msslider SET status='$statusEdit', gambar='$postgambar' WHERE idslider='$idEdit'");
     // var_dump($query);
      echo "success";
  }
// }
}   
else
{
    redirect();
}
}
public function cmsSliderDelete()
{
    if ($this->isadmin())
    {
      $id = $this->input->post("id");
      $query = $this->db->query("DELETE FROM msslider WHERE idslider='$id'");
      if ($query) {
          echo "success";
      }
  }
  else
  {
    redirect();
}
}

public function cmsAK()
{
    if ($this->isadmin())
    {
        $this->load->model("MsCMS");
        $data = array(
            'ak' => $this->MsCMS->dataAk(),
        );
        $this->template->load('backend', 'admin/cmsAK', $data);
    }
    else
    {
        redirect();
    }
}

public function cmsAKEditGambar()
{
    if ($this->isadmin())
    {
      $jabatanEdit = $this->input->post("jabatanEdit");
      $bidangEdit = $this->input->post("bidangEdit");
      $namaEdit = $this->input->post("namaEdit");
      $nipEdit = $this->input->post("nipEdit");
      $idEdit = $this->input->post("idedit");
      $gambarEdit = $this->input->post("gambarEdit");
      $config['upload_path']          = './assets/file/signiture/';
      $config['allowed_types']        = 'jpg|png';
      $config['max_size']             = 2097152;
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambarEdit')){
        var_dump($this->upload->display_errors());
        echo "error";
    }else{

      $postgambar = $this->upload->data('file_name')['file_name'];
      $query = $this->db->query("UPDATE mssigniture SET namaSigniture='$namaEdit', jabatanSigniture='$jabatanEdit', bidangSigniture='$bidangEdit', nipSigniture='$nipEdit', gambarSigniture='$postgambar' WHERE idSigniture='$idEdit'");
      echo "success";
  }
}   
else
{
    redirect();
}
}

public function cmsAKEdit()
{
    if ($this->isadmin())
    {
      $jabatanEdit = $this->input->post("jabatanEdit");
      $bidangEdit = $this->input->post("bidangEdit");
      $namaEdit = $this->input->post("namaEdit");
      $nipEdit = $this->input->post("nipEdit");
      $idEdit = $this->input->post("idedit");
      $query = $this->db->query("UPDATE mssigniture SET namaSigniture='$namaEdit', jabatanSigniture='$jabatanEdit', bidangSigniture='$bidangEdit', nipSigniture='$nipEdit' WHERE idSigniture='$idEdit'");
      echo "success";
  }
  else
  {
    redirect();
}
}


}
?>