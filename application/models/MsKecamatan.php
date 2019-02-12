<?php

class MsKecamatan extends CI_Model
{
        
        function GetCountMsKecamatan()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKecamatan),0) AS total_rows FROM ".strtolower("MsKecamatan"));
                return $query->row();
        }
        
        function GetCountMsKecamatanByIDKabupaten($idkabupaten)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKecamatan),0) AS total_rows FROM ".strtolower("MsKecamatan")." WHERE IDKabupaten='".$this->db->escape_like_str($idkabupaten)."'");
                return $query->row();
        }
        
        function GetGridMsKecamatan($num, $offset)
        {
                $query = $this->db->query("SELECT IDKecamatan,IDKabupaten,NamaKecamatan FROM ".strtolower("MsKecamatan")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetGridMsKecamatanByIDKabupaten($idkabupaten, $num, $offset)
        {
                $query = $this->db->query("SELECT IDKecamatan,IDKabupaten,NamaKecamatan FROM ".strtolower("MsKecamatan")." WHERE IDKabupaten='".$this->db->escape_like_str($idkabupaten)."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsKecamatan()
        {
                $query = $this->db->query("SELECT IDKecamatan,IDKabupaten,NamaKecamatan FROM ".strtolower("MsKecamatan")." ORDER BY NamaKecamatan");
                return $query->result();
        }
        
        function GetMsKecamatanByIDKecamatan($idkecamatan)
        {
                $query = $this->db->query("SELECT IDKecamatan,IDKabupaten,NamaKecamatan FROM ".strtolower("MsKecamatan")." WHERE IDKecamatan='".$this->db->escape_like_str($idkecamatan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetIDKabupatenByIDKecamatan($idkecamatan)
        {
                $query = $this->db->query("SELECT IDKabupaten FROM ".strtolower("MsKecamatan")." WHERE IDKecamatan='".$this->db->escape_like_str($idkecamatan)."'");
                return $query->row()->IDKabupaten;
        }
        
        function GetComboMsKecamatan()
        {
                $query = $this->db->query("SELECT IDKecamatan,IDKabupaten,NamaKecamatan FROM ".strtolower("MsKecamatan")." ORDER BY IDKecamatan");
                return $query->result();
        }
        
        function GetGridStatisticPencakerByBulanTahun($tahun, $bulan)
        {
                if ($tahun == '')
                {
                        $tahun = date('Y');
                }
                $query = $this->db->query("SELECT b.IDKecamatan,b.NamaKecamatan,COALESCE(SUM(c.TotalPria),0) AS TotalPria,COALESCE(SUM(d.TotalWanita),0) AS TotalWanita FROM ".strtolower("MsKelurahan")." AS a
                INNER JOIN ".strtolower("MsKecamatan")." AS b ON a.IDKecamatan=b.IDKecamatan
                LEFT JOIN
                (SELECT COUNT(IDPencaker) AS TotalPria,IDKelurahan FROM ".strtolower("MsPencaker")." WHERE JenisKelamin=0".($bulan!="" ? " AND Month(RegisterDate)=".$bulan : "")." AND Year(RegisterDate)=".$tahun.")c
                ON a.IDKelurahan=c.IDKelurahan
                LEFT JOIN
                (SELECT COUNT(IDPencaker) AS TotalWanita,IDKelurahan FROM ".strtolower("MsPencaker")." WHERE JenisKelamin=1".($bulan!="" ? " AND Month(RegisterDate)=".$bulan : "")." AND Year(RegisterDate)=".$tahun.")d
                ON a.IDKelurahan=d.IDKelurahan
                GROUP BY a.IDKecamatan");
                return $query;
        }

        function CekNamaKecamatan($namakecamatan,$idkecamatan)
        {
                $this->db->select('IDKecamatan');
                $this->db->from(strtolower('MsKecamatan'));
                $this->db->where('NamaKecamatan', $namakecamatan);
                if ($idkecamatan != NULL)
                {
                        $this->db->where('IDKecamatan != ', $idkecamatan);
                }
                if ($this->db->get()->num_rows() > 0)
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDKecamatan FROM ".strtolower("MsKecamatan")." ORDER BY IDKecamatan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDKecamatan;
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

        function Insert($namakecamatan,$idkabupaten)
        {
                $save['IDKecamatan'] = $this->GetLastID();
                $save['IDKabupaten'] = $idkabupaten;
                $save['NamaKecamatan'] = $namakecamatan;
                $this->db->insert(strtolower('MsKecamatan'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDKecamatan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idkecamatan)
        {
                $save['NamaKecamatan'] = $input['NamaKecamatan'];
                $this->db->where('IDKecamatan', $idkecamatan);
                $this->db->update(strtolower('MsKecamatan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idkecamatan)
        {
                $this->db->where('IDKecamatan', $idkecamatan);
                $this->db->delete(strtolower(('MsKecamatan')));
                return $this->db->affected_rows() != -1;
        }

}

?>