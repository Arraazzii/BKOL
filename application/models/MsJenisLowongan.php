<?php

class MsJenisLowongan extends CI_Model
{
        
        function GetCountMsJenisLowongan()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDJenisLowongan),0) AS total_rows FROM ".strtolower("MsJenisLowongan"));
                return $query->row();
        }
        
        function GetGridMsJenisLowongan($num, $offset)
        {
                $query = $this->db->query("SELECT IDJenisLowongan,NamaJenisLowongan FROM ".strtolower("MsJenisLowongan")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsJenisLowongan()
        {
                $query = $this->db->query("SELECT IDJenisLowongan,NamaJenisLowongan FROM ".strtolower("MsJenisLowongan"));
                return $query->result();
        }
        
        function GetMsJenisLowonganByIDJenisLowongan($idjenislowongan)
        {
                $query = $this->db->query("SELECT IDJenisLowongan,NamaJenisLowongan FROM ".strtolower("MsJenisLowongan")." WHERE IDJenisLowongan='".$this->db->escape_like_str($idjenislowongan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsJenisLowongan()
        {
                $query = $this->db->query("SELECT IDJenisLowongan,NamaJenisLowongan FROM ".strtolower("MsJenisLowongan")." ORDER BY IDJenisLowongan");
                return $query->result();
        }

        function CekNamaJenisLowongan($namajenislowongan,$idjenislowongan)
        {
                $this->db->select('IDJenisLowongan');
                $this->db->from(strtolower('MsJenisLowongan'));
                $this->db->where('NamaJenisLowongan', $namajenislowongan);
                if ($idjenislowongan != NULL)
                {
                        $this->db->where('IDJenisLowongan != ', $idjenislowongan);
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
                $this->db->select('IDJenisLowongan');
                $this->db->from('msjenislowongan');
                $this->db->order_by('IDJenisLowongan', 'desc');
                $data = $this->db->get();
                if ($data->num_rows() > 0)
                {
                        $getdata = $data->row();
                        $GetLastID = (int)$getdata->IDJenisLowongan;
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

        function Insert($namajenislowongan)
        {
                $save['IDJenisLowongan'] = $this->GetLastID();
                $save['NamaJenisLowongan'] = $namajenislowongan;
                $this->db->insert(strtolower('MsJenisLowongan'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDJenisLowongan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idjenislowongan)
        {
                $save['NamaJenisLowongan'] = $input['NamaJenisLowongan'];
                $this->db->where('IDJenisLowongan', $idjenislowongan);
                $this->db->update(strtolower('MsJenisLowongan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idjenislowongan)
        {
                $this->db->where('IDJenisLowongan', $idjenislowongan);
                $this->db->delete(strtolower(('MsJenisLowongan')));
                return $this->db->affected_rows() != -1;
        }

}

?>