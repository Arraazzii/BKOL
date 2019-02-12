<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
    $iduser = $this->session->userdata('iduser');
    if ($iduser == '')
    {
        $this->load->model('MsJenisUser');
        $data['MsJenisUserData'] = $this->MsJenisUser->GetMsJenisUser();
        $data['route'] = $this->uri->segment(1);
        $this->load->view('index2',$data); 
    }
    else
    {
        redirect();
    }
}

public function dologout()
{
    $iduser = $this->session->userdata('iduser');
    if ($iduser != '')
    {
        $this->load->model('MsUser');
        $this->MsUser->Logout($iduser);
    }
    $this->clearsession();
    redirect("login");
}

public function dologin()
{
    $input = $this->input->post();
    if ($input['username'] == "")
    {
        $this->seterrormsg($input,"Nama Pengguna harus diisi");
        redirect("login");
    }
    else if ($input['password'] == "")
    {
        $this->seterrormsg($input,"Kata Sandi harus diisi");
        redirect("login");
    }
    else
    {
        $this->load->model('MsUser');
        $getiduser = $this->MsUser->Login($input['idjenisuser'],$input['username'],$input['password'],$this->session->userdata('session_id'));
        if ($getiduser != NULL)
        {
            $getdata = $this->MsUser->GetMsUserByIDUser($getiduser);
            $this->session->set_userdata("iduser",$getdata->IDUser);
            $this->session->set_userdata("username",$getdata->Username);
            $this->session->set_userdata("idjenisuser",$getdata->IDJenisUser);

            if ($getdata->IDJenisUser == "000002")
            {
                $this->load->model('MsPencaker');
                $getmspencaker = $this->MsPencaker->GetMsPencakerByIDUser($getiduser);
                $fromdate = explode("-", substr($getmspencaker->RegisterDate,0,10));
                $todate = explode("-", $getmspencaker->ExpiredDate);
                $this->session->set_userdata("aktif", (date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2]));
            }
            redirect();
        }
        else
        {
            if($input['idjenisuser'] == '000001')
            {
                $this->load->model('MsPerusahaanTemp');
                $cek = $this->MsPerusahaanTemp->cek_user($input['username'], $input['password']);
                
                if($cek != NULL)
                    $pesan = 'Mohon untuk konfirmasi <br />pendaftaran perusahaan baru<br /> ke nomer WA : 08978186588 <br />';
                else
                    $pesan = "Nama Pengguna atau Kata Sandi salah";
            }
            if($input['idjenisuser'] == '000002')
            {
                $this->load->model('MsPencakerTemp');
                $cek = $this->MsPencakerTemp->cek_user($input['username'], $input['password']);
                if($cek != NULL)
                    $pesan = 'Mohon untuk melakukan konfirmasi <br />pendaftaran pencaker baru <br />ke nomer WA : 08978186588 <br />';
                else
                    $pesan = "Nama Pengguna atau Kata Sandi salah";
            }

            $this->clearsession();
            $this->seterrormsg($input,$pesan);
            redirect("login");
        }
    }
}

public function dosendpassword()
{
    $input = $this->input->post();
    if ($input['email'] == "")
    {
        $this->seterrormsg($input,"Email Pengguna harus diisi");
    }
    else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $input['email']))
    {
        $this->seterrormsg($input,"Email Pengguna tidak valid");
    }
    else
    {
        $this->load->model('MsPencaker');
        $this->load->model('MsUser');
        $getmspencakerdata = $this->MsPencaker->GetMsPencakerByEmail($input['email']);
        $getmsuserdata = NULL;
        if ($getmspencakerdata != NULL)
        {
            $getmsuserdata = $this->MsUser->GetMsUserByIDUser($getmspencakerdata->IDUser);
        }
        else
        {
            $this->load->model('MsPerusahaan');
            $getmsperusahaandata = $this->MsPerusahaan->GetMsPerusahaanByEmailPemberiKerja($input['email']);
            if ($getmsperusahaandata != NULL)
            {
                $getmsuserdata = $this->MsUser->GetMsUserByIDUser($getmsperusahaandata->IDUser);
            }
        }
        if ($getmsuserdata != NULL)
        {
            $this->load->model('EmailModel');
            if (@$this->EmailModel->sendEmail($input['email'],'[Lupa Sandi] Pengguna '.($getmsuserdata->IDJenisUser == "000001" ? "Perusahaan" : "Pencaker"),'Data Pencaker anda telah diaktifkan.<br/>Nama Pengguna : '.$getmsuserdata->Username.'<br/>Kata Sandi : '.$getmsuserdata->Password))
            {
                $this->seterrormsg(NULL,"Kata Sandi telah dikirimkan ke ".$input['email']);
            }
            else
            {
                $this->seterrormsg(NULL,"Kata Sandi gagal dikirimkan");
            }
        }
        else
        {
            $this->seterrormsg(NULL,"Email belum terdaftar");
        }
    }
    redirect("lupasandi");
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