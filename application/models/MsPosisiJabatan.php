<?php

class MsPosisiJabatan extends CI_Model
{
        
        function GetCountMsPosisiJabatan()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDPosisiJabatan),0) AS total_rows FROM ".strtolower("MsPosisiJabatan"));
                return $query->row();
        }
        
        function GetGridMsPosisiJabatan($num, $offset)
        {
                $query = $this->db->query("SELECT IDPosisiJabatan,NamaPosisiJabatan FROM ".strtolower("MsPosisiJabatan")." ORDER BY IDPosisiJabatan LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsPosisiJabatan()
        {
                $query = $this->db->query("SELECT IDPosisiJabatan,NamaPosisiJabatan FROM ".strtolower("MsPosisiJabatan")." ORDER BY IDPosisiJabatan");
                return $query->result();
        }
        
        function GetMsPosisiJabatanByIDPosisiJabatan($idposisijabatan)
        {
                $query = $this->db->query("SELECT IDPosisiJabatan,NamaPosisiJabatan FROM ".strtolower("MsPosisiJabatan")." WHERE IDPosisiJabatan='".$this->db->escape_like_str($idposisijabatan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsPosisiJabatan()
        {
                $query = $this->db->query("SELECT IDPosisiJabatan,NamaPosisiJabatan FROM ".strtolower("MsPosisiJabatan")." ORDER BY IDPosisiJabatan");
                return $query->result();
        }

        function CekNamaPosisiJabatan($namaposisijabatan,$idposisijabatan)
        {
                $this->db->select('IDPosisiJabatan');
                $this->db->from(strtolower('MsPosisiJabatan'));
                $this->db->where('NamaPosisiJabatan', $namaposisijabatan);
                if ($idposisijabatan != NULL)
                {
                        $this->db->where('IDPosisiJabatan != ', $idposisijabatan);
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
                $query = $this->db->query("SELECT IDPosisiJabatan FROM ".strtolower("MsPosisiJabatan")." WHERE IDPosisiJabatan!='999999' ORDER BY IDPosisiJabatan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDPosisiJabatan;
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

        function Insert($namaposisijabatan)
        {
                $save['IDPosisiJabatan'] = $this->GetLastID();
                $save['NamaPosisiJabatan'] = $namaposisijabatan;
                $this->db->insert(strtolower('MsPosisiJabatan'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDPosisiJabatan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idposisijabatan)
        {
                $save['NamaPosisiJabatan'] = $input['NamaPosisiJabatan'];
                $this->db->where('IDPosisiJabatan', $idposisijabatan);
                $this->db->update(strtolower('MsPosisiJabatan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idposisijabatan)
        {
                $this->db->where('IDPosisiJabatan', $idposisijabatan);
                $this->db->delete(strtolower(('MsPosisiJabatan')));
                return $this->db->affected_rows() != -1;
        }

}

?>