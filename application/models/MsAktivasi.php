<?php

class MsAktivasi extends CI_Model
{
        
        function GetCountMsAktivasi()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDAktivasi),0) AS total_rows FROM ".strtolower("MsAktivasi"));
                return $query->row();
        }
        
        function GetGridMsAktivasi($num, $offset)
        {
                $query = $this->db->query("SELECT a.IDAktivasi,b.IDPencaker,b.IDUser,b.IDKelurahan,b.IDAgama,b.IDStatusPernikahan,b.IDStatusPendidikan,b.IDPosisiJabatan,b.NomorIndukPencaker,b.NamaPencaker,b.TempatLahir,b.TglLahir,b.JenisKelamin,b.Email,b.Telepon,b.Alamat,b.KodePos,b.Kewarganegaraan,b.Jurusan,b.Keterampilan,b.NEMIPK,b.Nilai,b.TahunLulus,b.TinggiBadan,b.BeratBadan,b.Keterangan,b.Lokasi,b.UpahYangDicari,b.ExpiredDate,b.RegisterDate,e.NamaStatusPendidikan FROM ".strtolower("MsAktivasi")." AS a
                INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDPencaker=b.IDPencaker
                INNER JOIN ".strtolower("MsKelurahan")." AS c ON b.IDKelurahan=c.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
                INNER JOIN ".strtolower("MsStatusPendidikan")." AS e ON b.IDStatusPendidikan=e.IDStatusPendidikan
                ORDER BY a.RegisterDate
                LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }

        function GetIDAktivasiByIDPencaker($idpencaker)
        {
                $query = $this->db->query("SELECT IDAktivasi FROM ".strtolower("MsAktivasi")." WHERE IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        return $getdata->IDAktivasi;
                }
                else
                {
                        return NULL;
                }
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDAktivasi FROM ".strtolower("MsAktivasi")." ORDER BY IDAktivasi DESC LIMIT 1");
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

        function Insert($idpencaker)
        {
                $save['IDAktivasi'] = $this->GetLastID();
                $save['IDPencaker'] = $idpencaker;
                $save['RegisterDate'] = date('Y-m-d H:i:s');
                $this->db->insert(strtolower('MsAktivasi'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDAktivasi'];
                }
                else
                {
                        $this->load->model('MsUser');
                        $this->MsUser->Delete($iduser);
                        return NULL;
                }
        }

        function DeleteByIDAktivasi($idaktivasi)
        {
                $this->db->where('IDAktivasi', $idaktivasi);
                $this->db->delete(strtolower(('MsAktivasi')));
                return $this->db->affected_rows() != -1;
        }

        function DeleteByIDPencaker($idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->delete(strtolower(('MsAktivasi')));
                return $this->db->affected_rows() != -1;
        }

}

?>