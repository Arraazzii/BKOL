<?php

class MsPencakerTemp extends CI_Model
{
    
    function GetCountMsPencakerTemp()
    {
        $query = $this->db->query("SELECT COALESCE(COUNT(IDPencakerTemp),0) AS total_rows FROM ".strtolower("MsPencakerTemp"));
        return $query->row();
    }
    
    function GetGridMsPencakerTemp($num, $offset)
    {
        $query = $this->db->query("SELECT a.IDPencakerTemp,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Jurusan,a.NomerPenduduk,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.RegisterDate,e.NamaStatusPendidikan FROM ".strtolower("MsPencakerTemp")." AS a
            INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
            INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
            INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan
            ORDER BY RegisterDate
            LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
        return $query;
    }

    public function get_datatable_pencaker()
    {
        $this->datatables->select("a.IDPencakerTemp, a.NomerPenduduk, a.NamaPencaker, g.NamaStatusPendidikan, a.RegisterDate");
        $this->datatables->from('mspencakertemp as a');
        $this->datatables->join('mskelurahan as c', 'a.IDKelurahan=c.IDKelurahan');
        $this->datatables->join('mskecamatan as d', 'c.IDKecamatan=d.IDKecamatan');
        $this->datatables->join('msagama as e', 'a.IDAgama=e.IDAgama');
        $this->datatables->join('msstatuspernikahan as f', 'a.IDStatusPernikahan=f.IDStatusPernikahan');
        $this->datatables->join('msstatuspendidikan as g', 'a.IDStatusPendidikan=g.IDStatusPendidikan');
        $this->datatables->join('msposisijabatan as h', 'a.IDPosisiJabatan=h.IDPosisiJabatan');
        $this->datatables->join('msjurusan as i', 'a.Jurusan=i.IDjurusan');
        $button = '<a class="btn btn-primary btn-sm" onclick="DoView(\''.'$1'.'\') "><i class="fa fa-eye"></i> Detail </a> <a class="btn btn-success btn-sm" onclick="DoActivateConfirm(\''.'$1'.'\')"><i class="fa fa-check"></i> Terima </a> <a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.'$1'.'\')"><i class="fa fa-trash"></i> Hapus </a>';
        $this->datatables->add_column('view', $button,'IDPencakerTemp');
        return $this->datatables->generate();
    }

    function CekUsername($username)
    {
        $this->db->select('IDPencakerTemp');
        $this->db->from(strtolower('MsPencakerTemp'));
        $this->db->where('Username', $username);
        return $this->db->get();
    }

    function CekNomorIndukPencaker($NomorIndukPencaker,$idpencakertemp)
    {
        $query = $this->db->query("SELECT IDPencakerTemp FROM ".strtolower("MsPencakerTemp")." WHERE NomerPenduduk='".$this->db->escape_like_str($NomorIndukPencaker)."'".($idpencakertemp != NULL ? " AND IDPencakerTemp!='".$idpencakertemp."'" : ""));
        return $query;
    }

    function CekEmail($email,$idpencakertemp)
    {
        $this->db->select('IDPencakerTemp');
        $this->db->from(strtolower('MsPencakerTemp'));
        $this->db->where('Email', $email);
        if ($idpencakertemp != NULL)
        {
            $this->db->where('IDPencakerTemp', $idpencakertemp);
        }
        return $this->db->get();
    }

    function GetMsPencakerTempByIDPencakerTemp($idpencakertemp)
    {
        $query = $this->db->query("SELECT a.IDPencakerTemp,a.NomerPenduduk,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.TypePekerjaan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Jurusan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan FROM ".strtolower("MsPencakerTemp")." AS a
            INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
            INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
            INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
            INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
            INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
            INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
            WHERE a.IDPencakerTemp='".$this->db->escape_like_str($idpencakertemp)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }

    function GetProfilPencakerTempByIDUser($iduser)
    {
        $query = $this->db->query("SELECT IDPencakerTemp,NomorIndukPencaker,NamaPencaker,JenisKelamin,TempatLahir,TglLahir FROM ".strtolower("MsPencakerTemp")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }

    function GetLastID()
    {
        $LastID = "";
        $query = $this->db->query("SELECT IDPencakerTemp FROM ".strtolower("MsPencakerTemp")." ORDER BY IDPencakerTemp DESC LIMIT 1");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $GetLastID = (int)$getdata->IDPencakerTemp;
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

    function Insert($input,$registerdate,$jumlah,$data_jabatan,$data_perusahaan,$data_status,$data_tglmasuk,$data_tglkeluar,$idpencakerok)
    {
        $tgllahir = explode("-", $input['tgllahir']);
        $getid=$this->MsPencakerTemp->GetLastID();
        $save['IDPencakerTemp'] = $getid;
        $save['Username'] = $input['username'];
        $save['Password'] = $input['password'];
        $save['IDKelurahan'] = $input['idkelurahan'];
        $save['IDAgama'] = $input['idagama'];
        $save['IDStatusPernikahan'] = $input['idstatuspernikahan'];
        $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
        $save['IDPosisiJabatan'] = $input['idposisijabatan'];
        $save['NomerPenduduk'] = $input['nomorindukpencaker'];
        $save['NomorIndukPencaker'] = $idpencakerok;
        $save['NamaPencaker'] = $input['namapencaker'];
        $save['TempatLahir'] = $input['tempatlahir'];
        $save['TglLahir'] = $tgllahir[2].$tgllahir[1].$tgllahir[0];
        $save['JenisKelamin'] = (int)$input['jeniskelamin'];
        $save['TypePekerjaan'] = (int)$input['typePekerjaan'];
        $save['Email'] = $input['email'];
        $save['Telepon'] = $input['telepon'];
        $save['Alamat'] = $input['alamat'];
        $save['KodePos'] = $input['kodepos'];
        $save['Kewarganegaraan'] = (int)$input['kewarganegaraan'];
        $save['Jurusan'] = $input['jurusan'];
        $save['Keterampilan'] = $input['keterampilan'];
        $save['NEMIPK'] = (int)$input['nemipk'];
        $save['Nilai'] = $input['nilai'];
        $save['TahunLulus'] = $input['tahunlulus'];
        $save['TinggiBadan'] = $input['tinggibadan'] != '' ? (int)$input['tinggibadan'] : 0;
        $save['BeratBadan'] = $input['beratbadan'] != '' ? (int)$input['beratbadan'] : 0;
        $save['Keterangan'] = $input['keterangan'];
        $save['Lokasi'] = (int)$input['lokasi'];
        $save['UpahYangDicari'] = (int)$input['upahyangdicari'];
        $save['RegisterDate'] = $registerdate;
        $save['NomerPenduduk'] = $input['nomorindukpencaker'];
        $this->db->insert(strtolower('MsPencakerTemp'), $save);
        for($a=0; $a<$jumlah; $a++){
            $tampung_jabatan = $data_jabatan[$a];
            $tampung_status = $data_status[$a];
                    // $tampung_uraian = $data_uraian[$a];
            $tampung_perusahaan = $data_perusahaan[$a];
            $pecahtglmasuk = explode("-", $data_tglmasuk[$a]);
            $pecahtglkeluar = explode("-", $data_tglkeluar[$a]);
            $tampung_tglmasuk = $pecahtglmasuk[2].$pecahtglmasuk[1].$pecahtglmasuk[0];
            $tampung_tglkeluar = $pecahtglkeluar[2].$pecahtglkeluar[1].$pecahtglkeluar[0];
            if($tampung_perusahaan!=""){
                $this->load->model('MsPengalaman');
                $idpengalaman=$this->MsPengalaman->GetLastID();
                $data_pengalaman=array('IDPengalaman '=>$idpengalaman, 'IDPencaker'=>$idpencakerok, 'Jabatan'=>$tampung_jabatan,'StatusPekerjaan'=>$tampung_status, 'UraianKerja'=>'', 'NamaPerusahaan'=>$tampung_perusahaan, 'IDPencakerTemp'=>$getid, 'TglMasuk'=>$tampung_tglmasuk, 'TglBerhenti'=>$tampung_tglkeluar);
                $this->db->insert(strtolower('MsPengalaman'), $data_pengalaman);
            }

            
        }
        if ($this->db->affected_rows() > 0)
        {
            return $save['IDPencakerTemp'];
        }
        else
        {
            return NULL;
        }
    }

    function Update($idpencaker, $username, $password, $namapencaker)
    {
        $save['Username'] = $username;
        $save['Password'] = $password;
        $save['NamaPencaker'] = $namapencaker;
        $this->db->where('IDPencaker', $idpencaker);
        $this->db->update(strtolower('MsPencakerTemp'), $save);
        return $this->db->affected_rows() != -1;
    }

    function DeleteByIDPencakerTemp($idpencakertemp)
    {
        $this->db->where('IDPencakerTemp', $idpencakertemp);
        $this->db->delete(strtolower(('MsPencakerTemp')));
        $this->db->where('IDPencakerTemp', $idpencakertemp);
        $this->db->delete('mspengalaman');
        return $this->db->affected_rows() != -1;
    }

    function generateNomerInduk($idkelurahan)
    {
        $tanggal = date('dmy');
        $LastID = "";
        
        $query = $this->db->query("SELECT NomorIndukPencaker, RegisterDate FROM ".strtolower("MsPencaker")." WHERE DATE(RegisterDate) = CURDATE() AND IDKelurahan = '".$idkelurahan."' ORDER BY NomorIndukPencaker DESC LIMIT 1");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $GetLastID = intval(substr($getdata->NomorIndukPencaker, -4));
            $GetLastID++;
            for($i=strlen($GetLastID);$i<4;$i++)
            {
                $LastID .= "0";
            }
            $LastID .= $GetLastID;
        }
        else
        {
            $LastID = "0001";
        }

        return $tanggal . $idkelurahan . $LastID;
    }

    function Export($idpencakertemp)
    {
        $registerdate = date('Y-m-d H:i:s');
        $query = $this->db->query("SELECT Username,Password,IDKelurahan,IDAgama,IDStatusPernikahan,IDStatusPendidikan,NomorIndukPencaker,NomerPenduduk,NamaPencaker,TempatLahir,TglLahir,JenisKelamin,Email,Telepon,Alamat,KodePos,Kewarganegaraan,Jurusan,Keterampilan,NEMIPK,Nilai,TahunLulus,TinggiBadan,BeratBadan,Keterangan,IDPosisiJabatan,Lokasi,UpahYangDicari,RegisterDate FROM ".strtolower('MsPencakerTemp')." WHERE IDPencakerTemp='".$this->db->escape_like_str($idpencakertemp)."'");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $username = $getdata->Username;
            $password = $getdata->Password;
            $iduser = $this->InsertMsUser('000002', $username, $password, $registerdate);
            if ($iduser != '')
            {
                $input['iduser'] = $iduser;
                $input['idkelurahan'] = $getdata->IDKelurahan;
                $input['idagama'] = $getdata->IDAgama;
                $input['idstatuspernikahan'] = $getdata->IDStatusPernikahan;
                $input['idstatuspendidikan'] = $getdata->IDStatusPendidikan;
                $input['nomorindukpencaker'] = $this->generateNomerInduk($getdata->IDKelurahan);
                $input['nomependuduk'] = $getdata->NomerPenduduk;
                $input['namapencaker'] = $getdata->NamaPencaker;
                $input['tempatlahir'] = $getdata->TempatLahir;
                $input['tgllahir'] = $getdata->TglLahir;
                $input['jeniskelamin'] = $getdata->JenisKelamin;
                $input['typepekerjaan'] = $getdata->TypePekerjaan;
                $input['email'] = $getdata->Email;
                $input['telepon'] = $getdata->Telepon;
                $input['alamat'] = $getdata->Alamat;
                $input['kodepos'] = $getdata->KodePos;
                $input['kewarganegaraan'] = $getdata->Kewarganegaraan;
                $input['jurusan'] = $getdata->Jurusan;
                $input['keterampilan'] = $getdata->Keterampilan;
                $input['nemipk'] = $getdata->NEMIPK;
                $input['nilai'] = $getdata->Nilai;
                $input['tahunlulus'] = $getdata->TahunLulus;
                $input['tinggibadan'] = $getdata->TinggiBadan;
                $input['beratbadan'] = $getdata->BeratBadan;
                $input['keterangan'] = $getdata->Keterangan;
                $input['idposisijabatan'] = $getdata->IDPosisiJabatan;
                $input['lokasi'] = $getdata->Lokasi;
                $input['upahyangdicari'] = $getdata->UpahYangDicari;
                $idpencaker = $this->InsertMsPencaker($iduser, $input,$registerdate,$getdata->NomerPenduduk);
                
                $save2['IDPencaker'] = $idpencaker;
                $save2['IDPencakerTemp'] = NULL;
                $this->db->where('IDPencakerTemp', $idpencakertemp);
                $this->db->update('mspengalaman', $save2);
                
                if ($idpencaker != '')
                {
                    $this->db->where('IDPencakerTemp', $idpencakertemp);
                    $this->db->delete(strtolower(('MsPencakerTemp')));
                    return $iduser;
                }
                else
                {
                    $this->db->where('IDUser', $idpencakertemp);
                    $this->db->delete(strtolower(('MsUser')));
                    return NULL;
                }
            }
            return NULL;
        }
        else
        {
            return NULL;
        }
    }

    function GetLastIDUser()
    {
        $LastID = "";
        $query = $this->db->query("SELECT MAX(IDUser) as IDUser FROM ".strtolower("MsUser")." ORDER BY IDUser DESC LIMIT 1");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $GetLastID = (int)$getdata->IDUser;
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

    function InsertMsUser($idjenisuser, $username, $password, $registerdate)
    {
        $data['IDUser'] = $this->GetLastIDUser();
        $data['IDJenisUser'] = $idjenisuser;
        $data['Username'] = $username;
        $data['Password'] = $password;
        $data['RegisterDate'] = $registerdate;
        $this->db->query(
            "INSERT INTO ".strtolower("MsUser")."
            SELECT * FROM (SELECT ".$this->db->escape($data['IDUser'])." AS IDUser,".$this->db->escape($data['IDJenisUser'])." AS IDJenisUser,".$this->db->escape($data['Username'])." AS Username,".$this->db->escape($data['Password'])." AS Password,'0' AS session_id,".$this->db->escape($data['RegisterDate'])." AS RegisterDate) as TMP
            WHERE NOT EXISTS (
                SELECT IDUser FROM ".strtolower("MsUser")." WHERE IDJenisUser='".$this->db->escape_like_str($data['IDJenisUser'])."' AND Username='".$this->db->escape_like_str($data['Username']).")'
            ) LIMIT 1");
        if ($this->db->affected_rows() > 0)
        {
            return $data['IDUser'];
        }
        else
        {
            return NULL;
        }
    }

    function GetLastIDPencaker()
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

    function InsertMsPencaker($iduser,$input,$registerdate,$idpencakertemp)
    {
        if ($iduser != NULL)
        {
            $idpeceker = $this->GetLastIDPencaker();
            $save['IDPencaker'] = $idpeceker;
            $save['IDUser'] = $iduser;
            $save['IDKelurahan'] = $input['idkelurahan'];
            $save['IDAgama'] = $input['idagama'];
            $save['IDStatusPernikahan'] = $input['idstatuspernikahan'];
            $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
            $save['IDPosisiJabatan'] = $input['idposisijabatan'];
            $save['NomorIndukPencaker'] = $input['nomorindukpencaker'];
            $save['NomerPenduduk'] = $input['nomependuduk'];
            $save['NamaPencaker'] = $input['namapencaker'];
            $save['TempatLahir'] = $input['tempatlahir'];
            $save['TglLahir'] = $input['tgllahir'];
            $save['JenisKelamin'] = (int)$input['jeniskelamin'];
            $save['TypePekerjaan'] = (int)$input['typepekerjaan'];
            $save['Email'] = $input['email'];
            $save['Telepon'] = $input['telepon'];
            $save['Alamat'] = $input['alamat'];
            $save['KodePos'] = $input['kodepos'];
            $save['Kewarganegaraan'] = (int)$input['kewarganegaraan'];
            $save['Jurusan'] = $input['jurusan'];
            $save['Keterampilan'] = $input['keterampilan'];
            $save['NEMIPK'] = (int)$input['nemipk'];
            $save['Nilai'] = $input['nilai'];
            $save['TahunLulus'] = $input['tahunlulus'];
            $save['TinggiBadan'] = $input['tinggibadan'] != '' ? (int)$input['tinggibadan'] : 0;
            $save['BeratBadan'] = $input['beratbadan'] != '' ? (int)$input['beratbadan'] : 0;
            $save['Keterangan'] = $input['keterangan'];
            $save['Lokasi'] = (int)$input['lokasi'];
            $save['UpahYangDicari'] = (int)$input['upahyangdicari'];
            $save['ExpiredDate'] = date("Y-m-d H:i:s", strtotime(date("Y-m-d", strtotime($registerdate)) . " +1 month"));
            $save['RegisterDate'] = $registerdate;
            $this->db->insert('mspencaker', $save);
            $numRows = $this->db->affected_rows();

            if ($numRows > 0)
            {
                return $save['IDPencaker'];
            }
            else
            {
                $this->load->model('MsUser');
                $this->MsUser->delete($iduser);
                return NULL;
            }
        }
        else
        {
            return NULL;
        }
    }

    function Check_login($username, $password)
    {
        $this->db->select('IDPencaker');
        $this->db->from(strtolower('MsPencakerTemp'));
        $this->db->where('Username', $username);
        $this->db->where('password', $password);
        return $this->db->get();
    }

    function checkPencaker($nomorInduk) {
        $this->db->select('NomorIndukPencaker');
        $this->db->from(strtolower('MSPencaker'));
        $this->db->where('NomorIndukPencaker', $nomorInduk);
        return $this->db->get()->num_rows();
    }

    public function cek_user($username, $password)
    {
        $this->db->select('IDPencakerTemp');
        $this->db->from('mspencakertemp');
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        
        $query = $this->db->get();
        if ($query->num_rows > 0)
        {
            $getdata = $query->row();
            return $getdata->IDPencakerTemp;
        }
        else
        {
            return NULL;
        }
    }

}

?>