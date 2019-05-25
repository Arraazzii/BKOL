<?php

class TrLowonganMasuk extends CI_Model
{
    protected $table = 'trlowonganmasuk';
    function GetMsPencakerByIDLowonganMasuk($idlowonganmasuk)
    {
        $query = $this->db->query("SELECT a.IDLowonganMasuk,a.IDPencaker,a.IDKelurahan,a.IDAgama,a.IDStatusPernikahan,a.IDStatusPendidikan,a.IDPosisiJabatan,a.NomorIndukPencaker,a.NamaPencaker,a.TempatLahir,a.TglLahir,a.JenisKelamin,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kewarganegaraan,i.Jurusan,a.Keterampilan,a.NEMIPK,a.Nilai,a.TahunLulus,a.TinggiBadan,a.BeratBadan,a.Keterangan,a.IDPosisiJabatan,a.Lokasi,a.UpahYangDicari,a.StatusLowongan,c.NamaKelurahan,d.NamaKecamatan,e.NamaAgama,f.NamaStatusPernikahan,g.NamaStatusPendidikan,c.IDKecamatan,h.NamaPosisiJabatan FROM ".strtolower("TrLowonganMasuk")." AS a
            INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
            INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
            INNER JOIN ".strtolower("MsAgama")." AS e ON a.IDAgama=e.IDAgama
            INNER JOIN ".strtolower("MsStatusPernikahan")." AS f ON a.IDStatusPernikahan=f.IDStatusPernikahan
            INNER JOIN ".strtolower("MsStatusPendidikan")." AS g ON a.IDStatusPendidikan=g.IDStatusPendidikan
            INNER JOIN ".strtolower("MsPosisiJabatan")." AS h ON a.IDPosisiJabatan=h.IDPosisiJabatan
            INNER JOIN ".strtolower("MsJurusan")." AS i ON a.Jurusan=i.IDJurusan
            WHERE a.IDLowonganMasuk='".$this->db->escape_like_str($idlowonganmasuk)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }

    public function GetByIDPencaker($idpencaker, $num, $offset)
    {
        $query = $this->db->query("SELECT a.IDLowonganMasuk, a.IDLowongan,b.NamaLowongan, c.NamaPerusahaan, a.StatusLowongan, a.RegisterDate FROM ".strtolower("TrLowonganMasuk")." AS a
            INNER JOIN ".strtolower("MsLowongan")." AS b ON a.IDLowongan=b.IDLowongan
            INNER JOIN ".strtolower("MsPerusahaan")." AS c ON b.IDPerusahaan=c.IDPerusahaan
            WHERE a.IDPencaker='".$this->db->escape_like_str($idpencaker)."'
            ORDER BY a.IDLowonganMasuk DESC
            LIMIT ".($offset != "" ? $offset."," : "")." ".$num
        );

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return NULL;
        }
    }

    public function GetByRangeDate($start, $end, $status = '')
    {
        
        $this->db->query("SET @no = 0");

        if($status == '')
        {
            $query = $this->db->query("SELECT @no:=@no+1 as nomor, a.NamaPencaker, b.NamaLowongan, c.NamaPerusahaan, IF(a.StatusLowongan = 0, 'Belum Diproses', IF(a.StatusLowongan = 1, 'Diproses', IF(a.StatusLowongan = 2, 'Diterima', IF(a.StatusLowongan = 3, 'Tidak Diterima', '')))) as Status FROM ".strtolower("TrLowonganMasuk")." AS a
                INNER JOIN ".strtolower("MsLowongan")." AS b ON a.IDLowongan=b.IDLowongan
                INNER JOIN ".strtolower("MsPerusahaan")." AS c ON b.IDPerusahaan=c.IDPerusahaan
                INNER JOIN ".strtolower("MsPencaker")." AS d ON a.IDPencaker=d.IDPencaker
                WHERE DATE(a.RegisterDate) >= '".$start."' AND DATE(a.RegisterDate) <= '".$end."'
                AND a.StatusLowongan = 1
                ORDER BY a.IDLowonganMasuk DESC
                ");

            if($query->num_rows > 0)
                return $query->result_array();
            else
                return NULL;
        }
        else
        {

            $query = $this->db->query("SELECT @no:=@no+1 as nomor, a.NomerPenduduk, a.NamaPencaker, a.Alamat, b.NamaPerusahaan, b.Jabatan as NamaLowongan, c.NamaStatusPendidikan, IF(a.JenisKelamin=0, 'Laki-laki','Perempuan') as JenisKelamin 
                FROM ".strtolower("MsPencaker")." as a
                INNER JOIN ".strtolower("MsPengalaman")." as b ON b.IDPencaker = a.IDPencaker
                INNER JOIN ".strtolower("MsStatusPendidikan")." as c ON a.IDStatusPendidikan = c.IDStatusPendidikan
                WHERE DATE(a.RegisterDate) >= '".$start."' AND DATE(a.RegisterDate) <= '".$end."'
                AND b.StatusPekerjaan = '1'
                ");

            if($query->num_rows > 0) {
                $data = $query->result_array();
            } else {
                $data = NULL;
                $query2 = $this->db->query("SELECT @no:=@no+1 as nomor, a.NomerPenduduk, a.NamaPencaker, a.Alamat, b.NamaPerusahaan, b.Jabatan as NamaLowongan, c.NamaStatusPendidikan, IF(a.JenisKelamin=0, 'Laki-laki','Perempuan') as JenisKelamin 
                    FROM ".strtolower("MsPencaker")." as a
                    INNER JOIN ".strtolower("MsPengalaman")." as b ON b.IDPencaker = a.IDPencaker
                    INNER JOIN ".strtolower("MsStatusPendidikan")." as c ON a.IDStatusPendidikan = c.IDStatusPendidikan
                    WHERE DATE(a.RegisterDate) >= '".$start."' AND DATE(a.RegisterDate) <= '".$end."'
                    AND b.StatusPekerjaan = '1'
                    ");

                if($query2->num_rows > 0)
                {
                    $data2 = $query2->result_array();
                    $count = $data != NULL ? count($data) : 0;
                    foreach ($data2 as $key => $value) {
                        $data[$key+$count] = $value;
                    }
                }

            }

            return $data;

        }
        
    }

    function GetLastID()
    {       
        $LastID = "";
        $query = $this->db->query("SELECT IDLowonganMasuk FROM ".strtolower("TrLowonganMasuk")." ORDER BY IDLowonganMasuk DESC LIMIT 1");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $GetLastID = (int)$getdata->IDLowonganMasuk;
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

    function Insert($idlowongan, $idpencaker)
    {
        $query = $this->db->query("SELECT IDKelurahan,IDAgama,IDStatusPernikahan,IDStatusPendidikan,NomorIndukPencaker,NamaPencaker,TempatLahir,TglLahir,JenisKelamin,Email,Telepon,Alamat,KodePos,Kewarganegaraan,Jurusan,Keterampilan,NEMIPK,Nilai,TahunLulus,TinggiBadan,BeratBadan,Keterangan,IDPosisiJabatan,Lokasi,UpahYangDicari FROM ".strtolower("MsPencaker")." WHERE IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $save['IDLowonganMasuk'] = $this->GetLastID();
            $save['IDLowongan'] = $idlowongan;
            $save['IDPencaker'] = $idpencaker;
            $save['IDKelurahan'] = $getdata->IDKelurahan;
            $save['IDAgama'] = $getdata->IDAgama;
            $save['IDStatusPernikahan'] = $getdata->IDStatusPernikahan;
            $save['IDStatusPendidikan'] = $getdata->IDStatusPendidikan;
            $save['IDPosisiJabatan'] = $getdata->IDPosisiJabatan;
            $save['StatusLowongan'] = 0;
            $save['NomorIndukPencaker'] = $getdata->NomorIndukPencaker;
            $save['NamaPencaker'] = $getdata->NamaPencaker;
            $save['TempatLahir'] = $getdata->TempatLahir;
            $save['TglLahir'] = $getdata->TglLahir;
            $save['JenisKelamin'] = (int)$getdata->JenisKelamin;
            $save['Email'] = $getdata->Email;
            $save['Telepon'] = $getdata->Telepon;
            $save['Alamat'] = $getdata->Alamat;
            $save['KodePos'] = $getdata->KodePos;
            $save['Kewarganegaraan'] = (int)$getdata->Kewarganegaraan;
            $save['Jurusan'] = $getdata->Jurusan;
            $save['Keterampilan'] = $getdata->Keterampilan;
            $save['NEMIPK'] = (int)$getdata->NEMIPK;
            $save['Nilai'] = $getdata->Nilai;
            $save['TahunLulus'] = $getdata->TahunLulus;
            $save['TinggiBadan'] = $getdata->TinggiBadan;
            $save['BeratBadan'] = $getdata->BeratBadan;
            $save['Keterangan'] = $getdata->Keterangan;
            $save['Lokasi'] = (int)$getdata->Lokasi;
            $save['UpahYangDicari'] = $getdata->UpahYangDicari;
            $save['RegisterDate'] = date('Ymd');
            $this->db->insert(strtolower('TrLowonganMasuk'), $save);
            if ($this->db->affected_rows() > 0)
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

    function UpdateStatusLowongan($input,$idlowonganmasuk)
    {
        $save['StatusLowongan'] = (int)$input['StatusLowongan'];
        $this->db->where('IDLowonganMasuk', $idlowonganmasuk);
        $this->db->update(strtolower('TrLowonganMasuk'), $save);
        return $this->db->affected_rows() != -1;
    }

    function Delete($idlowonganmasuk)
    {
        $this->db->where('IDLowonganMasuk', $idlowonganmasuk);
        $this->db->delete(strtolower(('TrLowonganMasuk')));
        return $this->db->affected_rows() != -1;
    }

    public function DeleteByIDLowongan($idlowongan)
    {
        $this->db->where('IDLowongan', $idlowongan);
        $this->db->delete(strtolower(('TrLowonganMasuk')));
        return $this->db->affected_rows() != -1;
    }

    function DeleteByIDPerusahaan($idperusahaan)
    {
        $this->db->select('a.IDPerusahaan,b.IDLowongan');
        $this->db->from('msperusahaan as a');
        $this->db->join('mslowongan as b', 'a.IDPerusahaan = b.IDPerusahaan');
        $this->db->where('a.IDPerusahaan', $idperusahaan);
        $return = $this->db->get()->result();

        $idlowongan = array();

        foreach ($return as $key) {
            $idlowongan[$key->IDLowongan] = $key->IDLowongan;
        }
        if($idlowongan != NULL)
        {
            $this->db->where_in('IDLowongan', $idlowongan);
            $this->db->delete('trlowonganmasuk');
        }
        
        return $this->db->affected_rows() != -1;
    }

    function GetCountBy($j, $s)
    {
        $query = $this->db->query("SELECT IDLowonganMasuk FROM trlowonganmasuk WHERE JenisKelamin = '".$j."' AND StatusLowongan = '".$s."'");
        return $query->num_rows();
    }

    function GetCountCustom($cat, $type, $wh)
    {
        if ($type == 0) 
        {
            $this->db->select('IDPencaker');
            $this->db->from('mspencaker');

            if ($cat == 0) {
                $this->db->where('IDKelurahan', $wh['kelurahan']);
            }
            else if ($cat == 1) {
                if ($wh['umur']['batasatas'] != 0) {
                 $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) <=', $wh['umur']['batasatas']);
                 $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
             }
             else {
                $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
            }
            
        }
        else if ($cat == 2) {
            $this->db->where('IDStatusPendidikan', $wh['idpendidikan']);
        }
        $this->db->where('JenisKelamin', $wh['jk']);
        $this->db->where('DATE(RegisterDate) >=', $wh['from']);
        $this->db->where('DATE(RegisterDate) <=', $wh['to']);
        $query = $this->db->get();
        return $query->num_rows();
    }
    else
    {
        $this->db->select('mspengalaman.IDPencaker');
        $this->db->from('mspengalaman');
        $this->db->join('mspencaker', 'mspengalaman.IDPencaker = mspencaker.IDPencaker', 'right');
        if ($cat == 0) {
            $this->db->where('mspencaker.IDKelurahan', $wh['kelurahan']);
        }
        else if ($cat == 1) {
            if ($wh['umur']['batasatas'] != 0) {
             $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) <=', $wh['umur']['batasatas']);
             $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
         }
         else {
            $this->db->where('TIMESTAMPDIFF(YEAR, TglLahir, CURDATE()) >=', $wh['umur']['batasbawah']);
        }
        
    }
    else if ($cat == 2) {
        $this->db->where('mspencaker.IDStatusPendidikan', $wh['idpendidikan']);
    }
    $this->db->where('mspencaker.JenisKelamin', $wh['jk']);
    $this->db->where('mspengalaman.StatusPekerjaan', $type);
    $this->db->where('DATE(mspencaker.RegisterDate) >=', $wh['from']);
    $this->db->where('DATE(mspencaker.RegisterDate) <=', $wh['to']);
    $query = $this->db->get();
    return $query->num_rows();
}

}

function GetCountByPeriod($type, $start, $end, $cat)
{
                // $query = $this->db->query("SELECT ( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE JenisKelamin=0 AND DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS pria,( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE JenisKelamin=1 AND DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS wanita, ( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS total");
                // return $query->result();

    if ($type == 0) 
    {
        if ($cat == 1) 
        {
            $query = $this->db->query("SELECT COUNT(IF(JenisKelamin=0, IDPencaker, NULL)) as pria, COUNT(IF(JenisKelamin=1, IDPencaker, NULL)) as wanita, COUNT(IDPencaker) as total FROM mspencaker WHERE DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."'");
        }
        else if($cat == 0)
        {
            $query = $this->db->query("SELECT COUNT(IF(JenisKelamin=0, IDPencaker, NULL)) as pria, COUNT(IF(JenisKelamin=1, IDPencaker, NULL)) as wanita, COUNT(IDPencaker) as total FROM mspencaker, mskelurahan, mskecamatan WHERE mspencaker.IDKelurahan = mskelurahan.IDKelurahan AND mskelurahan.IDKecamatan = mskecamatan.IDKecamatan AND DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."'");
        }
        else if($cat == 2)
        {
            $query = $this->db->query("SELECT COUNT(IF(JenisKelamin=0, IDPencaker, NULL)) as pria, COUNT(IF(JenisKelamin=1, IDPencaker, NULL)) as wanita, COUNT(IDPencaker) as total FROM mspencaker WHERE DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."'");
        }
    }
    else
    {
        $query = $this->db->query("SELECT ( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE JenisKelamin=0 AND DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS pria,( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE JenisKelamin=1 AND DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS wanita, ( SELECT COUNT(IDLowonganMasuk) FROM trlowonganmasuk WHERE DATE(RegisterDate)>='".$start."' AND DATE(RegisterDate)<='".$end."' AND StatusLowongan = '".$type."') AS total");
    }

    return $query->result();
}

function GetCountByPencakerID($IDPencaker, $IDLowongan)
{
    $this->db->select('IDLowonganMasuk')
    ->from('trlowonganmasuk')
    ->where('IDPencaker', $IDPencaker)
    ->where('IDLowongan', $IDLowongan);
    return $this->db->get()->num_rows();
}

public function CountByIDPencaker($idpencaker)
{
    $query = $this->db->query("SELECT a.IDLowonganMasuk FROM ".strtolower("TrLowonganMasuk")." AS a
        INNER JOIN ".strtolower("MsLowongan")." AS b ON a.IDLowongan=b.IDLowongan
        INNER JOIN ".strtolower("MsPerusahaan")." AS c ON b.IDPerusahaan=c.IDPerusahaan
        WHERE IDPencaker='".$this->db->escape_like_str($idpencaker)."'"
    );

    if ($query->num_rows() > 0)
    {
        return $query->num_rows;
    }
    else
    {
        return 0;
    }
}
}

?>