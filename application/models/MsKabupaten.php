<?php

class MsKabupaten extends CI_Model
{
        
        function GetCountMsKabupaten()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDKabupaten),0) AS total_rows FROM ".strtolower("MsKabupaten"));
                return $query->row();
        }
        
        function GetGridMsKabupaten($num, $offset)
        {
                $query = $this->db->query("SELECT IDKabupaten,NamaKabupaten FROM ".strtolower("MsKabupaten")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsKabupaten()
        {
                $query = $this->db->query("SELECT IDKabupaten,NamaKabupaten FROM ".strtolower("MsKabupaten"));
                return $query->result();
        }
        
        function GetMsKabupatenByIDKabupaten($idkabupaten)
        {
                $query = $this->db->query("SELECT IDKabupaten,NamaKabupaten FROM ".strtolower("MsKabupaten")." WHERE IDKabupaten='".$this->db->escape_like_str($idkabupaten)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsKabupaten()
        {
                $query = $this->db->query("SELECT IDKabupaten,NamaKabupaten FROM ".strtolower("MsKabupaten")." ORDER BY NamaKabupaten");
                return $query->result();
        }

        function CekNamaKabupaten($namakabupaten,$idkabupaten)
        {
                $this->db->select('IDKabupaten');
                $this->db->from(strtolower('MsKabupaten'));
                $this->db->where('NamaKabupaten', $namakabupaten);
                if ($idkabupaten != NULL)
                {
                        $this->db->where('IDKabupaten != ', $idkabupaten);
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
                $query = $this->db->query("SELECT IDKabupaten FROM ".strtolower("MsKabupaten")." ORDER BY IDKabupaten DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDKabupaten;
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

        function Insert($namakabupaten)
        {
                $save['IDKabupaten'] = $this->GetLastID();
                $save['NamaKabupaten'] = $namakabupaten;
                $this->db->insert(strtolower('MsKabupaten'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDKabupaten'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idkabupaten)
        {
                $save['NamaKabupaten'] = $input['NamaKabupaten'];
                $this->db->where('IDKabupaten', $idkabupaten);
                $this->db->update(strtolower('MsKabupaten'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idkabupaten)
        {
                $this->db->where('IDKabupaten', $idkabupaten);
                $this->db->delete(strtolower(('MsKabupaten')));
                return $this->db->affected_rows() != -1;
        }

}

?>