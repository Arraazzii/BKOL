<?php

class MsBahasa extends CI_Model
{
        
        function GetCountMsBahasa()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDBahasa),0) AS total_rows FROM ".strtolower("MsBahasa"));
                return $query->row();
        }
        
        function GetGridMsBahasa($num, $offset)
        {
                $query = $this->db->query("SELECT IDBahasa,IDPencaker,NamaBahasa FROM ".strtolower("MsBahasa")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsBahasa()
        {
                $query = $this->db->query("SELECT IDBahasa,IDPencaker,NamaBahasa FROM ".strtolower("MsBahasa"));
                return $query->result();
        }
        
        function GetMsBahasaByIDPencaker($idpencaker)
        {
                $query = $this->db->query("SELECT IDBahasa,IDPencaker,NamaBahasa FROM ".strtolower("MsBahasa")." WHERE IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
                return $query;
        }
        
        function GetMsBahasaByIDBahasa($idbahasa)
        {
                $query = $this->db->query("SELECT IDBahasa,IDPencaker,NamaBahasa FROM ".strtolower("MsBahasa")." WHERE IDBahasa='".$this->db->escape_like_str($idbahasa)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsBahasa()
        {
                $query = $this->db->query("SELECT IDBahasa,IDPencaker,NamaBahasa FROM ".strtolower("MsBahasa")." ORDER BY NamaBahasa");
                return $query->result();
        }

        function CekNamaBahasa($namabahasa,$idbahasa,$idpencaker)
        {
                $this->db->select('IDBahasa');
                $this->db->from(strtolower('MsBahasa'));
                $this->db->where('NamaBahasa', $namabahasa);
                $this->db->where('IDPencaker', $idpencaker);
                if ($idbahasa != NULL)
                {
                        $this->db->where('IDBahasa != ', $idbahasa);
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
                $query = $this->db->query("SELECT IDBahasa FROM ".strtolower("MsBahasa")." ORDER BY IDBahasa DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDBahasa;
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

        function Insert($input,$idpencaker)
        {
                $save['IDBahasa'] = $this->GetLastID();
                $save['IDPencaker'] = $idpencaker;
                $save['NamaBahasa'] = $input['NamaBahasa'];
                $this->db->insert(strtolower('MsBahasa'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDBahasa'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input, $idbahasa, $idpencaker)
        {
                $save['NamaBahasa'] = $input['NamaBahasa'];
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->where('IDBahasa', $idbahasa);
                $this->db->update(strtolower('MsBahasa'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idbahasa, $idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->where('IDBahasa', $idbahasa);
                $this->db->delete(strtolower(('MsBahasa')));
                return $this->db->affected_rows() != -1;
        }

        function DeleteByIDPencaker($idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->delete(strtolower(('MsBahasa')));
                return $this->db->affected_rows() != -1;
        }

}

?>