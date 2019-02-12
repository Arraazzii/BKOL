<?php

class MsKelurahan extends CI_Model
{
        
        function GetCountMsKelurahan()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKelurahan),0) AS total_rows FROM ".strtolower("MsKelurahan"));
                return $query->row();
        }
        
        function GetCountMsKelurahanByIDKecamatan($idkecamatan)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKelurahan),0) AS total_rows FROM ".strtolower("MsKelurahan")." WHERE IDKecamatan='".$this->db->escape_like_str($idkecamatan)."'");
                return $query->row();
        }
        
        function GetGridMsKelurahan($num, $offset)
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetGridMsKelurahanByIDKecamatan($idkecamatan, $num, $offset)
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." WHERE IDKecamatan='".$this->db->escape_like_str($idkecamatan)."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsKelurahan()
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." ORDER BY NamaKelurahan");
                return $query->result();
        }
        
        function GetMsKelurahanByIDKelurahan($idkelurahan)
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." WHERE IDKelurahan='".$this->db->escape_like_str($idkelurahan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsKelurahanByIDKecamatan($idkecamatan)
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." WHERE IDKecamatan='".$this->db->escape_like_str($idkecamatan)."' ORDER BY NamaKelurahan");
                return $query->result();
        }
        
        function GetComboMsKelurahan()
        {
                $query = $this->db->query("SELECT IDKelurahan,IDKecamatan,NamaKelurahan FROM ".strtolower("MsKelurahan")." ORDER BY NamaKelurahan");
                return $query->result();
        }
        
        function CekNamaKelurahan($namakelurahan,$idkelurahan)
        {
                $this->db->select('IDKelurahan');
                $this->db->from(strtolower('MsKelurahan'));
                $this->db->where('NamaKelurahan', $namakelurahan);
                if ($idkelurahan != NULL)
                {
                        $this->db->where('IDKelurahan != ', $idkelurahan);
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
                $query = $this->db->query("SELECT IDKelurahan FROM ".strtolower("MsKelurahan")." ORDER BY IDKelurahan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDKelurahan;
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

        function Insert($namakelurahan,$idkecamatan)
        {
                $save['IDKelurahan'] = $this->GetLastID();
                $save['IDKecamatan'] = $idkecamatan;
                $save['NamaKelurahan'] = $namakelurahan;
                $this->db->insert(strtolower('MsKelurahan'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDKelurahan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idkelurahan)
        {
                $save['NamaKelurahan'] = $input['NamaKelurahan'];
                $this->db->where('IDKelurahan', $idkelurahan);
                $this->db->update(strtolower('MsKelurahan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idkelurahan)
        {
                $this->db->where('IDKelurahan', $idkelurahan);
                $this->db->delete(strtolower(('MsKelurahan')));
                return $this->db->affected_rows() != -1;
        }

        public function GetKelurahanByIDKecamatan($idkecamatan)
        {
                $this->db->select('*');
                $this->db->where('IDKecamatan', $idkecamatan);
                $this->db->order_by('NamaKelurahan', 'asc');
                return $this->db->get('mskelurahan');
        }

}

?>