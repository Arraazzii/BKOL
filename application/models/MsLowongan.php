<?php

class MsLowongan extends CI_Model
{
        //Perusahaan
        function GetCountMsLowongan()
        {
                $query = $this->db->query("SELECT COUNT(a.IDLowongan) AS total_rows FROM ".strtolower("MsLowongan")." a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja");
                return $query->row();
        }
        
        function GetCountMsLowonganByDate($fromdate, $todate)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT COALESCE(COUNT(IDLowongan),0) AS total_rows FROM ".strtolower("MsLowongan")." WHERE TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."'");
                return $query->row();
        }

        function GetCountStatusByIDLowongan($idlowongan)
        {
                $query = $this->db->query("SELECT COUNT(IDPencaker) as PencakerMasuk FROM `trlowonganmasuk` WHERE IDLowongan = '".$idlowongan."'");
                return $query->row();
                
        }
        
        function GetCountMsLowonganByIDPerusahaan($idperusahaan)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDLowongan),0) AS total_rows FROM ".strtolower("MsLowongan")." WHERE IDPerusahaan='".$this->db->escape_like_str($idperusahaan)."'");
                return $query->row();
        }
        
        function GetCountMsLowonganByDateIDPerusahaan($idperusahaan, $fromdate, $todate)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT COALESCE(COUNT(IDLowongan),0) AS total_rows FROM ".strtolower("MsLowongan")." WHERE IDPerusahaan='".$this->db->escape_like_str($idperusahaan)."' AND TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."'");
                return $query->row();
        }
        
        function GetGridMsLowongan($num, $offset)
        {
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja ORDER BY a.TglBerakhir DESC LIMIT ".$num.($offset != "" ? " OFFSET ".$offset : "")) ;
                return $query;
        }
        
        function GetGridMsLowonganByDate($fromdate, $todate, $num, $offset)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja WHERE a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetGridMsLowonganByIDPerusahaan($idperusahaan, $num, $offset)
        {
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja WHERE a.IDPerusahaan='".$this->db->escape_like_str($idperusahaan)."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }

        public function get_byidperusahaan($idperusahaan)
        {
                $this->datatables->select('a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan');
                $this->datatables->from('mslowongan as a');
                $this->datatables->join('msperusahaan as b', 'a.IDPerusahaan=b.IDPerusahaan');
                $this->datatables->join('msposisijabatan as c', 'a.IDPosisiJabatan=c.IDPosisiJabatan');
                $this->datatables->join('mskeahlian as d', 'a.IDKeahlian=d.IDKeahlian');
                $this->datatables->join('msstatuspendidikan as e', 'a.IDStatusPendidikan=e.IDStatusPendidikan');
                $this->datatables->join('msjenispengupahan as f', 'a.IDJenisPengupahan=f.IDJenisPengupahan');
                $this->datatables->join('msstatushubungankerja as g', 'a.IDStatusHubunganKerja=g.IDStatusHubunganKerja');
                $this->datatables->where('a.IDPerusahaan', $idperusahaan);
                $this->datatables->add_column('view', '<a href="'.site_url().'perusahaan/lowongan/detail/$1" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a> <button type="button" onclick="DoDeleteConfirm(\''.'$1'.'\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>','IDLowongan');
                return $this->datatables->generate();
        }
        
        function GetGridMsLowonganByDateIDPerusahaan($idperusahaan, $fromdate, $todate, $num, $offset)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja WHERE a.IDPerusahaan='".$this->db->escape_like_str($idperusahaan)."' AND a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        //StatusLowongan
        
        function GetCountMsLowonganStatus()
        {
                $query = $this->db->query("SELECT COUNT(a.IDLowongan) as total_rows, COUNT(IF(c.JenisKelamin=0,c.IDPencaker, NULL)) as TotalPria, COUNT(IF(c.JenisKelamin=1,c.IDPencaker,NULL)) as TotalWanita FROM (`mslowongan` as a) JOIN `msperusahaan` as b ON `a`.`IDPerusahaan` = `b`.`IDPerusahaan` JOIN `trlowonganmasuk` as c ON `c`.`IDLowongan` = `a`.`IDLowongan` WHERE b.IDUser='".$this->session->userdata('iduser')."'");
                return $query->row();
        }

        function GetCountNEWMsLowonganStatus()
        {
                $query = $this->db->query("SELECT COUNT(a.IDLowongan) as total_rows, COUNT(IF(c.JenisKelamin=0,c.IDPencaker, NULL)) as TotalPria, COUNT(IF(c.JenisKelamin=1,c.IDPencaker,NULL)) as TotalWanita FROM (`mslowongan` as a) JOIN `msperusahaan` as b ON `a`.`IDPerusahaan` = `b`.`IDPerusahaan` LEFT JOIN `trlowonganmasuk` as c ON `c`.`IDLowongan` = `a`.`IDLowongan` WHERE b.IDUser='".$this->session->userdata('iduser')."'");
                return $query->row();
        }
        
        function GetCountMsLowonganStatusByDate($fromdate, $todate)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT COUNT(a.IDLowongan) as total_rows, COUNT(IF(c.JenisKelamin=0,c.IDPencaker, NULL)) as TotalPria, COUNT(IF(c.JenisKelamin=1,c.IDPencaker,NULL)) as TotalWanita FROM (`mslowongan` as a) JOIN `msperusahaan` as b ON `a`.`IDPerusahaan` = `b`.`IDPerusahaan` JOIN `trlowonganmasuk` as c ON `c`.`IDLowongan` = `a`.`IDLowongan` WHERE a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' AND b.IDUser='".$this->session->userdata('iduser')."'");
                return $query->row();
        }

        function GetCountNEWMsLowonganStatusByDate($fromdate, $todate)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT COUNT(a.IDLowongan) as total_rows, COUNT(IF(c.JenisKelamin=0,c.IDPencaker, NULL)) as TotalPria, COUNT(IF(c.JenisKelamin=1,c.IDPencaker,NULL)) as TotalWanita FROM (`mslowongan` as a) JOIN `msperusahaan` as b ON `a`.`IDPerusahaan` = `b`.`IDPerusahaan` LEFT JOIN `trlowonganmasuk` as c ON `c`.`IDLowongan` = `a`.`IDLowongan` WHERE a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' AND b.IDUser='".$this->session->userdata('iduser')."'");
                return $query->row();
        }
        
        function GetGridMsLowonganStatus($num, $offset)
        {
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan,COALESCE(h.TotalPria,0) AS TotalPria,COALESCE(i.TotalWanita,0) AS TotalWanita, b.IDUser FROM ".strtolower("MsLowongan ")." AS a INNER JOIN ".strtolower("MsPerusahaan ")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja LEFT JOIN (SELECT a.IDLowongan,COUNT(b.IDPencaker) AS TotalPria FROM ".strtolower("TrLowonganMasuk ")." AS a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker WHERE b.JenisKelamin=0)h ON a.IDLowongan=h.IDLowongan LEFT JOIN (SELECT a.IDLowongan,COUNT(a.IDPencaker) AS TotalWanita FROM ".strtolower("TrLowonganMasuk")." As a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker WHERE b.JenisKelamin=1)i ON a.IDLowongan=i.IDLowongan WHERE b.IDUser='".$this->session->userdata('iduser')."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetGridMsLowonganStatusByDate($fromdate, $todate, $num, $offset)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan,COALESCE(h.TotalPria,0) AS TotalPria,COALESCE(i.TotalWanita,0) AS TotalWanita FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja LEFT JOIN (SELECT a.IDLowongan,COUNT(b.IDPencaker) AS TotalPria FROM ".strtolower("TrLowonganMasuk")." AS a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker WHERE b.JenisKelamin=0)h ON a.IDLowongan=h.IDLowongan LEFT JOIN (SELECT a.IDLowongan,COUNT(a.IDPencaker) AS TotalWanita FROM ".strtolower("TrLowonganMasuk")." As a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker WHERE b.JenisKelamin=1)i ON a.IDLowongan=i.IDLowongan WHERE a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' AND b.IDUser='".$this->session->userdata('iduser')."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        //Pencaker
        function GetCountMsLowonganByIDPencaker($idpencaker)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDLowongan),0) AS total_rows FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDStatusPendidikan=b.IDStatusPendidikan WHERE b.IDPencaker='".$this->db->escape_like_str($idpencaker)."' AND a.BatasUmur>=(YEAR(CURDATE())-YEAR(b.TglLahir))-(RIGHT(CURDATE(),5)<RIGHT(b.TglLahir,5))");
                return $query->row();
        }

        function GetCountMsLowonganByIDPencakerAll($idpencaker)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(a.IDLowongan),0) AS total_rows FROM mslowongan as a");
                return $query->row();
        }
        
        function GetCountMsLowonganByDateIDPencaker($fromdate, $todate, $idpencaker)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT COALESCE(COUNT(IDLowongan),0) AS total_rows FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDStatusPendidikan=b.IDStatusPendidikan WHERE b.IDPencaker='".$this->db->escape_like_str($idpencaker)."' AND a.BatasUmur>=(YEAR(CURDATE())-YEAR(b.TglLahir))-(RIGHT(CURDATE(),5)<RIGHT(b.TglLahir,5)) AND TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."'");
                return $query->row();
        }
        
        function GetGridMsLowonganByIDPencaker($idpencaker, $num, $offset)
        {
                $this->db->select('*');
                $this->db->from('mspencaker');
                $this->db->where('IDPencaker', $idpencaker);
                $pencaker = $this->db->get()->row();
                // Tanggal Lahir
                $birthday = $pencaker->TglLahir;
                
                // Convert Ke Date Time
                $biday = new DateTime($birthday);
                $today = new DateTime();
                
                $diff = $today->diff($biday);
                // echo $diff->y; die;
                $this->db->select('a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan');
                $this->db->from('mslowongan as a');
                $this->db->join('msperusahaan as b', 'a.IDPerusahaan=b.IDPerusahaan');
                $this->db->join('msposisijabatan as c', 'a.IDPosisiJabatan=c.IDPosisiJabatan');
                $this->db->join('mskeahlian as d', 'a.IDKeahlian=d.IDKeahlian');
                $this->db->join('msstatuspendidikan as e', 'a.IDStatusPendidikan=e.IDStatusPendidikan');
                $this->db->join('msjenispengupahan as f', 'a.IDJenisPengupahan=f.IDJenisPengupahan');
                $this->db->join('msstatushubungankerja as g', 'a.IDStatusHubunganKerja=g.IDStatusHubunganKerja');
                // $this->db->where('a.BatasUmur >=', $diff->y);

                // if ($pencaker->IDStatusPendidikan == '000004' || $pencaker->IDStatusPendidikan == '000005') 
                // {
                //         $this->db->where('a.IDStatusPendidikan', '000004');
                //         $this->db->or_where('a.IDStatusPendidikan', '000005');
                // }
                // else
                // {
                //         $this->db->where('a.IDStatusPendidikan', $pencaker->IDStatusPendidikan);
                // }
                $this->db->order_by("a.TglBerakhir", "DESC");
                $this->db->limit($num, $offset);
                return $this->db->get();
        }
        
        function GetGridMsLowonganByDateIDPencaker($fromdate, $todate, $idpencaker, $num, $offset)
        {
                $fromdate = explode("-", $fromdate);
                $todate = explode("-", $todate);
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja INNER JOIN ".strtolower("MsPencaker")." AS h ON a.IDStatusPendidikan=h.IDStatusPendidikan WHERE h.IDPencaker='".$this->db->escape_like_str($idpencaker)."' AND a.BatasUmur>=(YEAR(CURDATE())-YEAR(h.TglLahir))-(RIGHT(CURDATE(),5)<RIGHT(h.TglLahir,5)) AND a.TglBerlaku >= '".$this->db->escape_like_str($fromdate[2].$fromdate[1].$fromdate[0])."' AND a.TglBerlaku <= '".$this->db->escape_like_str($todate[2].$todate[1].$todate[0])."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        //Misc
        function GetMsLowonganByIDLowongan($idlowongan)
        {
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan,d.IDJenisLowongan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja WHERE a.IDLowongan='".$this->db->escape_like_str($idlowongan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function LowonganByIDLowongan($idlowongan)
        {
                $query = $this->db->query("SELECT a.IDLowongan,a.IDPerusahaan,a.IDPosisiJabatan,a.IDKeahlian,a.IDStatusPendidikan,a.IDJenisPengupahan,a.IDStatusHubunganKerja,a.TglBerlaku,a.TglBerakhir,a.NamaLowongan,a.UraianPekerjaan,a.UraianTugas,a.Penempatan,a.BatasUmur,a.JmlPria,a.JmlWanita,a.Jurusan,a.Pengalaman,a.SyaratKhusus,a.GajiPerbulan,a.JamKerjaSeminggu,a.RegisterDate,b.NamaPerusahaan,b.Alamat,b.KodePos,b.EmailPemberiKerja,c.NamaPosisiJabatan,e.NamaStatusPendidikan,d.IDJenisLowongan FROM ".strtolower("MsLowongan")." AS a INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan INNER JOIN ".strtolower("MsPosisiJabatan")." AS c ON a.IDPosisiJabatan=c.IDPosisiJabatan INNER JOIN ".strtolower("MsKeahlian")." AS d ON a.IDKeahlian=d.IDKeahlian INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON a.IDStatusPendidikan=e.IDStatusPendidikan INNER JOIN ".strtolower("MsJenisPengupahan")." AS f ON a.IDJenisPengupahan=f.IDJenisPengupahan INNER JOIN ".strtolower("MsStatusHubunganKerja")." AS g ON a.IDStatusHubunganKerja=g.IDStatusHubunganKerja WHERE a.IDLowongan='".$this->db->escape_like_str($idlowongan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->result_array();
                }
                else
                {
                        return NULL;
                }
        }

        function GetLastID()
        {       
                $LastID = "";
                $query = $this->db->query("SELECT IDLowongan FROM ".strtolower("MsLowongan")." ORDER BY IDLowongan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDLowongan;
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

        function Insert($idperusahaan, $input, $registerdate)
        {
                $tglberlaku = explode("-", $input['tglberlaku']);
                $tglberakhir = explode("-", $input['tglberakhir']);
                $save['IDLowongan'] = $this->GetLastID();
                $save['IDPerusahaan'] = $idperusahaan;
                $save['IDPosisiJabatan'] = $input['idposisijabatan'];
                $save['IDKeahlian'] = $input['idkeahlian'];
                $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
                $save['IDJenisPengupahan'] = $input['idjenispengupahan'];
                $save['IDStatusHubunganKerja'] = $input['idstatushubungankerja'];
                $save['TglBerlaku'] = $tglberlaku[2].$tglberlaku[1].$tglberlaku[0];
                $save['TglBerakhir'] = $tglberakhir[2].$tglberakhir[1].$tglberakhir[0];
                $save['NamaLowongan'] = $input['namalowongan'];
                $save['UraianPekerjaan'] = $input['uraianpekerjaan'];
                $save['UraianTugas'] = $input['uraiantugas'];
                $save['Penempatan'] = $input['penempatan'];
                $save['BatasUmur'] = $input['batasumur'];
                $save['JmlPria'] = $input['jmlpria'];
                $save['JmlWanita'] = $input['jmlwanita'];
                $save['Jurusan'] = $input['jurusan'];
                $save['Pengalaman'] = $input['pengalaman'];
                $save['SyaratKhusus'] = $input['syaratkhusus'];
                $save['GajiPerbulan'] = $input['gajiperbulan'];
                $save['JamKerjaSeminggu'] = $input['jamkerjaseminggu'];
                $save['RegisterDate'] = $registerdate;
                $this->db->insert(strtolower('MsLowongan'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDLowongan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($idlowongan,$idperusahaan,$input,$registerdate)
        {
                $tglberlaku = explode("-", $input['tglberlaku']);
                $tglberakhir = explode("-", $input['tglberakhir']);
                $save['IDPerusahaan'] = $idperusahaan;
                $save['IDPosisiJabatan'] = $input['idposisijabatan'];
                $save['IDKeahlian'] = $input['idkeahlian'];
                $save['IDStatusPendidikan'] = $input['idstatuspendidikan'];
                $save['IDJenisPengupahan'] = $input['idjenispengupahan'];
                $save['IDStatusHubunganKerja'] = $input['idstatushubungankerja'];
                $save['TglBerlaku'] = $tglberlaku[2].$tglberlaku[1].$tglberlaku[0];
                $save['TglBerakhir'] = $tglberakhir[2].$tglberakhir[1].$tglberakhir[0];
                $save['NamaLowongan'] = $input['namalowongan'];
                $save['UraianPekerjaan'] = $input['uraianpekerjaan'];
                $save['UraianTugas'] = $input['uraiantugas'];
                $save['Penempatan'] = $input['penempatan'];
                $save['BatasUmur'] = $input['batasumur'];
                $save['JmlPria'] = $input['jmlpria'];
                $save['JmlWanita'] = $input['jmlwanita'];
                $save['Jurusan'] = $input['jurusan'];
                $save['Pengalaman'] = $input['pengalaman'];
                $save['SyaratKhusus'] = $input['syaratkhusus'];
                $save['GajiPerbulan'] = $input['gajiperbulan'];
                $save['JamKerjaSeminggu'] = $input['jamkerjaseminggu'];
                $save['RegisterDate'] = $registerdate;
                $this->db->where('IDLowongan', $idlowongan);
                $this->db->update(strtolower('MsLowongan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idlowongan)
        {
                $this->load->model('TrLowonganMasuk');
                $this->TrLowonganMasuk->DeleteByIDLowongan($idlowongan);
                $this->db->where('IDLowongan', $idlowongan);
                $this->db->delete(strtolower(('MsLowongan')));
                return $this->db->affected_rows() != -1;
        }

        function DeleteByIDPerusahaan($idperusahaan)
        {
                $this->load->model('TrLowonganMasuk');
                $this->TrLowonganMasuk->DeleteByIDPerusahaan($idperusahaan);
                $this->db->where('IDPerusahaan', $idperusahaan);
                $this->db->delete(strtolower(('MsLowongan')));
                return $this->db->affected_rows() != -1;
        }

        function GetMsLowonganByIDPerusahaan($id)
        {
                $query = $this->db->query("SELECT * FROM mslowongan WHERE IDPerusahaan='".$id."'");
                return $query->result();
        }

}

?>