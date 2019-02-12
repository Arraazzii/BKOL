<?php

class MsKeahlian extends CI_Model
{
        
        function GetCountMsKeahlian()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKeahlian),0) AS total_rows FROM ".strtolower("MsKeahlian"));
                return $query->row();
        }
        
        function GetCountMsKeahlianByIDJenisLowongan($idjenislowongan)
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKeahlian),0) AS total_rows FROM ".strtolower("MsKeahlian")." WHERE IDJenisLowongan='".$this->db->escape_like_str($idjenislowongan)."'");
                return $query->row();
        }
        
        function GetGridMsKeahlian($num, $offset)
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetGridMsKeahlianByIDJenisLowongan($idjenislowongan, $num, $offset)
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian")." WHERE IDJenisLowongan='".$this->db->escape_like_str($idjenislowongan)."' LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsKeahlian()
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian"));
                return $query->result();
        }
        
        function GetMsKeahlianByIDKeahlian($idkeahlian)
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian")." WHERE IDKeahlian='".$this->db->escape_like_str($idkeahlian)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsKeahlianByIDJenisLowongan($idjenislowongan)
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian")." WHERE IDJenisLowongan='".$this->db->escape_like_str($idjenislowongan)."' ORDER BY NamaKeahlian");
                return $query->result();
        }
        
        function GetComboMsKeahlian()
        {
                $query = $this->db->query("SELECT IDKeahlian,IDJenisLowongan,NamaKeahlian FROM ".strtolower("MsKeahlian")." ORDER BY NamaKeahlian");
                return $query->result();
        }
        
        function CekNamaKeahlian($namakeahlian,$idkeahlian)
        {
                $this->db->select('IDKeahlian');
                $this->db->from(strtolower('MsKeahlian'));
                $this->db->where('NamaKeahlian', $namakeahlian);
                if ($idkeahlian != NULL)
                {
                        $this->db->where('IDKeahlian != ', $idkeahlian);
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
                $query = $this->db->query("SELECT IDKeahlian FROM ".strtolower("MsKeahlian")." WHERE IDKeahlian < 999999 ORDER BY IDKeahlian DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDKeahlian;
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

        function Insert($namakeahlian,$idjenislowongan)
        {
                $save['IDKeahlian'] = $this->GetLastID();
                $save['IDJenisLowongan'] = $idjenislowongan;
                $save['NamaKeahlian'] = $namakeahlian;
                $this->db->insert(strtolower('MsKeahlian'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDKeahlian'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idkeahlian)
        {
                $save['NamaKeahlian'] = $input['NamaKeahlian'];
                $this->db->where('IDKeahlian', $idkeahlian);
                $this->db->update(strtolower('MsKeahlian'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idkeahlian)
        {
                $this->db->where('IDKeahlian', $idkeahlian);
                $this->db->delete(strtolower(('MsKeahlian')));
                return $this->db->affected_rows() != -1;
        }

}

?>