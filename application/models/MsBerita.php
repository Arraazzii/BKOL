<?php

class MsBerita extends CI_Model
{
        
        function GetCountMsBerita()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDBerita),0) AS total_rows FROM ".strtolower("MsBerita"));
                return $query->row();
        }
        
        function GetGridMsBerita($num, $offset)
        {
                $query = $this->db->query("SELECT IDBerita,TglBerita,JudulBerita,IsiBerita FROM ".strtolower("MsBerita")." ORDER BY TglBerita DESC LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsBeritaByIDBerita($idberita)
        {
                $query = $this->db->query("SELECT IDBerita,TglBerita,JudulBerita,IsiBerita FROM ".strtolower("MsBerita")." WHERE IDBerita='".$this->db->escape_like_str($idberita)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsBerita()
        {
                $query = $this->db->query("SELECT IDBerita,NamaBerita FROM ".strtolower("MsBerita")." ORDER BY NamaBerita");
                return $query->result();
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDBerita FROM ".strtolower("MsBerita")." ORDER BY IDBerita DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDBerita;
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

        function Insert($input)
        {
                $tglberita = explode("-", $input['TglBerita']);
                $save['IDBerita'] = $this->GetLastID();
                $save['TglBerita'] = $tglberita[2].$tglberita[1].$tglberita[0];
                $save['JudulBerita'] = $input['JudulBerita'];
                $save['IsiBerita'] = $input['IsiBerita'];
                $this->db->insert(strtolower('MsBerita'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDBerita'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idberita)
        {
                $tglberita = explode("-", $input['TglBerita']);
                $save['TglBerita'] = $tglberita[2].$tglberita[1].$tglberita[0];
                $save['JudulBerita'] = $input['JudulBerita'];
                $save['IsiBerita'] = $input['IsiBerita'];
                $this->db->where('IDBerita', $idberita);
                $this->db->update(strtolower('MsBerita'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idberita)
        {
                $this->db->where('IDBerita', $idberita);
                $this->db->delete(strtolower(('MsBerita')));
                return $this->db->affected_rows() != -1;
        }

}

?>