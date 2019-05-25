<?php

class MsPencaker extends CI_Model
{
    
    function GetCountMsPencaker()
    {
       $query = $this->db->query("SELECT COALESCE(COUNT(a.IDPencaker),0) AS total_rows  FROM ".strtolower("MsPencaker")." AS a
        INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
        INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
        INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
        INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
        INNER JOIN ".strtolower("MsJurusan")." AS i ON a.Jurusan=i.IDjurusan
        INNER JOIN ".strtolower("MsUser")." AS j ON a.IDUser=j.IDUser");
       return $query->row();
   }

   function GetCountMsPencakerByGender()
   {
    $query = $this->db->query("SELECT (SELECT COUNT(IDPencaker) FROM mspencaker WHERE JenisKelamin=0) AS TotalPria, (SELECT COUNT(IDPencaker) FROM mspencaker WHERE JenisKelamin=1) AS TotalWanita, COUNT(IDPencaker) AS total_rows FROM mspencaker");
    return $query->row();
}

function GetCountMsPencakerByIDLowongan($idlowongan)
{
    $query = $this->db->query("SELECT COUNT(IDPencaker) as total_rows, COUNT(IF(JenisKelamin=0, IDPencaker, NULL)) as TotalPria, COUNT(IF(JenisKelamin=1, IDPencaker, NULL)) as TotalWanita FROM trlowonganmasuk WHERE IDLowongan = '".$this->db->escape_like_str($idlowongan)."'");
    return $query->row();
}

function GetCountMsPencakerByDate($fromdate, $todate)
{
    $fromdate = explode("-", $fromdate);
    $todate = explode("-", $todate);
    $query = $this->db->query("SELECT COALESCE(COUNT(IDPencaker),0) AS total_rows,(SELECT COALESCE(COUNT(IDPencaker),0) FROM ".strtolower("MsPencaker")." WHERE JenisKelamin=0 AND RegisterDate >= '".$this->db->escape_like_str($fromdate[2]."-".$fromdate[1]."-".$fromdate[0])." 00:00:00' AND RegisterDate <= '".$this->db->escape_like_str($todate[2]."-".$todate[1]."-".$todate[0])." 23:59:59') AS TotalPria,(SELECT COALESCE(COUNT(IDPencaker),0) FROM ".strtolower("MsPencaker")." WHERE JenisKelamin=1 AND RegisterDate >= '".$this->db->escape_like_str($fromdate[2]."-".$fromdate[1]."-".$fromdate[0])." 00:00:00' AND RegisterDate <= '".$this->db->escape_like_str($todate[2]."-".$todate[1]."-".$todate[0])." 23:59:59') AS TotalWanita FROM ".strtolower("MsPencaker"));
    return $query->row();
}

public function get_datatable_pencaker()
{
    $this->datatables->select("a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan, i.Jurusan, a.NomerPenduduk AS NomerPenduduk, j.password");
    $this->datatables->from('mspencaker as a');
    $this->datatables->join('mskelurahan as c', 'a.IDKelurahan=c.IDKelurahan');
    $this->datatables->join('mskecamatan as d', 'c.IDKecamatan=d.IDKecamatan');
    $this->datatables->join('msagama as e', 'a.IDAgama=e.IDAgama');
    $this->datatables->join('msstatuspernikahan as f', 'a.IDStatusPernikahan=f.IDStatusPernikahan');
    $this->datatables->join('msstatuspendidikan as g', 'a.IDStatusPendidikan=g.IDStatusPendidikan');
    $this->datatables->join('msposisijabatan as h', 'a.IDPosisiJabatan=h.IDPosisiJabatan');
    $this->datatables->join('msjurusan as i', 'a.Jurusan=i.IDjurusan');
    $this->datatables->join('msuser as j', 'a.IDUser=j.IDUser');
    $this->datatables->add_column('view', '<a class="btn btn-info btn-sm" onclick="cetak_ak(\''.'$1'.'\') "><i class="fa fa-print"></i> Cetak AK1</a> <a class="btn btn-primary btn-sm" onclick="DoView(\''.'$1'.'\') "><i class="fa fa-eye"></i> Detail</a> <a class="btn btn-danger btn-sm" onclick="DoDelete(\''.'$1'.'\')"><i class="fa fa-trash"></i> Hapus</a>','IDPencaker');
    return $this->datatables->generate();
}

function GetGridMsPencaker($num, $offset)
{
   $query = $this->db->query("SELECT a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan, i.Jurusan, a.NomerPenduduk AS NomerPenduduk, j.password  FROM ".strtolower("MsPencaker")." AS a
    INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
    INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
    INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
    INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
    INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
    INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
    INNER JOIN ".strtolower("MsJurusan")." AS i ON a.Jurusan=i.IDjurusan
    INNER JOIN ".strtolower("MsUser")." AS j ON a.IDUser=j.IDUser
    ORDER BY a.IDPencaker DESC
    LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
   return $query;

   $this->db->select('field1, field2');
}

function GetGridMsPencakerByIDLowongan($idlowongan, $num, $offset)
{
    $query = $this->db->query("SELECT a.IDLowonganMasuk,b.IDPencaker,b.IDUser,b.IDKelurahan,b.IDAgama,b.IDStatusPernikahan,b.IDStatusPendidikan,b.IDPosisiJabatan,a.StatusLowongan,b.NomorIndukPencaker,b.NamaPencaker,b.TempatLahir,b.TglLahir,b.JenisKelamin,b.Email,b.Telepon,b.Alamat,b.KodePos,b.Kewarganegaraan,b.Jurusan,b.Keterampilan,b.NEMIPK,b.Nilai,b.TahunLulus,b.TinggiBadan,b.BeratBadan,b.Keterangan,b.Lokasi,b.UpahYangDicari,b.ExpiredDate,b.RegisterDate,f.NamaStatusPendidikan FROM ".strtolower("TrLowonganMasuk")." AS a
        INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker
        INNER JOIN ".strtolower("MsKelurahan")." AS d ON b.IDKelurahan=d.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS e ON d.IDKecamatan=e.IDKecamatan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS f ON a.IDStatusPendidikan=f.IDStatusPendidikan
        WHERE a.IDLowongan='".$this->db->escape_like_str($idlowongan)."'
        ORDER BY a.RegisterDate
        LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
    return $query;
}

function GetGridMsPencakerByDate($fromdate, $todate, $num, $offset)
{
    $fromdate = explode("-", $fromdate);
    $todate = explode("-", $todate);
    $query = $this->db->query("SELECT a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Jurusan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,e.NamaStatusPendidikan FROM ".strtolower("MsPencaker")." AS a
        INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan
        WHERE a.RegisterDate >= '".$this->db->escape_like_str($fromdate[2]."-".$fromdate[1]."-".$fromdate[0])." 00:00:00' AND a.RegisterDate <= '".$this->db->escape_like_str($todate[2]."-".$todate[1]."-".$todate[0])." 23:59:59'
        ORDER BY a.RegisterDate
        LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
    return $query;
}

function CekNomorIndukPencaker($NomorIndukPencaker, $idpencaker)
{
    $query = $this->db->query("SELECT IDPencaker FROM ".strtolower("MsPencaker")." WHERE NomerPenduduk='".$this->db->escape_like_str($NomorIndukPencaker)."'".($idpencaker != NULL ? " AND IDPencaker!='".$idpencaker."'" : ""));
    return $query;
}

function CekEmail($email, $idpencaker)
{
    $query = $this->db->query("SELECT IDPencaker FROM ".strtolower("MsPencaker")." WHERE Email='".$this->db->escape_like_str($email)."'".($idpencaker != NULL ? " AND IDPencaker!='".$idpencaker."'" : ""));
    return $query;
}

function GetProfilPencakerByIDUser($iduser)
{
    $query = $this->db->query("SELECT IDPencaker,NomorIndukPencaker,NamaPencaker,JenisKelamin,TempatLahir,TglLahir FROM ".strtolower("MsPencaker")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
    if ($query->num_rows() > 0)
    {
        return $query->row();
    }
    else
    {
        return NULL;
    }
}

function GetIDPencakerByIDUser($iduser)
{
    $query = $this->db->query("SELECT IDPencaker FROM ".strtolower("MsPencaker")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
    if ($query->num_rows() > 0)
    {
        $getdata = $query->row();
        return $getdata->IDPencaker;
    }
    else
    {
        return NULL;
    }
}

function GetMsPencakerByIDPencaker($idpencaker)
{
    $query = $this->db->query("SELECT a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan, i.Jurusan, a.NomerPenduduk AS NomerPenduduk, j.password  FROM ".strtolower("MsPencaker")." AS a
        INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
        INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
        INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
        INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
        INNER JOIN ".strtolower("MsJurusan")." AS i ON a.Jurusan=i.IDjurusan
        INNER JOIN ".strtolower("MsUser")." AS j ON a.IDUser=j.IDUser
        WHERE a.IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
    if ($query->num_rows() > 0)
    {
        return $query->row();
    }
    else
    {
        return NULL;
    }
}

function GetMsPencakerByIDUser($iduser)
{
    $query = $this->db->query("SELECT a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Jurusan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan,a.NomerPenduduk AS NomerPenduduk FROM ".strtolower("MsPencaker")." AS a
        INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
        INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
        INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
        INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
        WHERE a.IDUser='".$this->db->escape_like_str($iduser)."'");
    if ($query->num_rows() > 0)
    {
        return $query->row();
    }
    else
    {
        return NULL;
    }
}

function GetMsPencakerByEmail($email)
{
    $query = $this->db->query("SELECT a.IDPencaker,a.IDUser,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,a.Jurusan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.Lokasi,a.UpahYangDicari,a.ExpiredDate,a.RegisterDate,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan FROM ".strtolower("MsPencaker")." AS a
        INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
        INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
        INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
        INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
        INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
        WHERE a.Email='".$this->db->escape_like_str($email)."'");
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

function Insert($input,$registerdate)
{

    $tgllahir = explode("-", $input['tgllahir']);
    $save['IDPencaker'] = $this->GetLastID();
    $save['IDUser'] = $input['iduser'];
    $save['IDKelurahan'] = $input['idkelurahan'];
    $save['IDAgama'] = $input['idagama'];
    $save['IDStatusPernikahan'] = $input['idstatuspernikahan'];
    $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
    $save['IDPosisiJabatan'] = $input['idposisijabatan'];
    $save['NomorIndukPencaker'] = $input['nomorindukpencaker'];
    $save['NomerPenduduk'] = $input['nomerpenduduk'];
    $save['NamaPencaker'] = $input['namapencaker'];
    $save['JenisKelamin'] = (int)$input['jeniskelamin'];
    $save['TempatLahir'] = $input['tempatlahir'];
    $save['TglLahir'] = $tgllahir[2].$tgllahir[1].$tgllahir[0];
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
    $this->db->insert(strtolower('MsPencaker'), $save);
    if ($this->db->affected_rows() > 0)
    {
        return $save['IDPencaker'];
    }
    else
    {
        $this->load->model('MsUser');
        $this->MsUser->Delete($iduser);
        return NULL;
    }
}

function UpdateProfile($input, $idpencaker)
{
    $tgllahir = explode("-", $input['tgllahir']);
    $save['IDKelurahan'] = $input['idkelurahan'];
    $save['IDAgama'] = $input['idagama'];
    $save['IDStatusPernikahan'] = $input['idstatuspernikahan'];
    $save['NomorIndukPencaker'] = $input['nomorindukpencaker'];
    $save['NamaPencaker'] = $input['namapencaker'];
    $save['JenisKelamin'] = (int)$input['jeniskelamin'];
    $save['TempatLahir'] = $input['tempatlahir'];
    $save['TglLahir'] = $tgllahir[2].$tgllahir[1].$tgllahir[0];
    $save['Email'] = $input['email'];
    $save['Telepon'] = $input['telepon'];
    $save['Alamat'] = $input['alamat'];
    $save['KodePos'] = $input['kodepos'];
    $save['Kewarganegaraan'] = (int)$input['kewarganegaraan'];
    $this->db->where('IDPencaker', $idpencaker);
    $this->db->update(strtolower('MsPencaker'), $save);
    return $this->db->affected_rows() != -1;
}

function UpdateCV($input, $idpencaker)
{
    $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
    $save['IDPosisiJabatan'] = $input['idposisijabatan'];
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
    $this->db->where('IDPencaker', $idpencaker);
    $this->db->update(strtolower('MsPencaker'), $save);
    return $this->db->affected_rows() != -1;
}

function UpdateExpiredDate($idpencaker)
{
    $save['ExpiredDate'] = date("Y-m-d H:i:s", strtotime(date("Y-m-d", strtotime(date('Y-m-d H:i:s'))) . " +1 month"));
    $this->db->where('IDPencaker', $idpencaker);
    $this->db->update(strtolower('MsPencaker'), $save);
    return $this->db->affected_rows() != -1;
}

function DeleteByIDPencaker($idpencaker)
{
    $this->db->where('IDPencaker', $idpencaker);
    $this->db->delete(strtolower(('MsPencaker')));
    return $this->db->affected_rows() != -1;
}

function Check_login($username, $password)
{
    $this->db->select('IDPencaker');
    $this->db->from(strtolower('MsPencaker'));
    $this->db->where('Username', $username);
    $this->db->where('password', $password);
    return $this->db->get();
}

function Check_session($idpencaker,$idsession)
{
    $this->db->select('IDPencaker');
    $this->db->from(strtolower('MsPencaker'));
    $this->db->where('IDPencaker',$idpencaker);
    $this->db->where('idsession',$idsession);
    return $this->db->get();
}

}

?>