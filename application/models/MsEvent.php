<?php

class MsEvent extends CI_Model
{
        
        function GetCountMsEvent()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDEvent),0) AS total_rows FROM ".strtolower("MsEvent"));
                return $query->row();
        }
        
        function GetGridMsEvent($num, $offset)
        {
                $query = $this->db->query("SELECT IDEvent,TglEvent,JudulEvent,IsiEvent FROM ".strtolower("MsEvent")." ORDER BY TglEvent DESC LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsEventByIDEvent($idevent)
        {
                $query = $this->db->query("SELECT IDEvent,TglEvent,JudulEvent,IsiEvent FROM ".strtolower("MsEvent")." WHERE IDEvent='".$this->db->escape_like_str($idevent)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsEvent()
        {
                $query = $this->db->query("SELECT IDEvent,NamaEvent FROM ".strtolower("MsEvent")." ORDER BY NamaEvent");
                return $query->result();
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDEvent FROM ".strtolower("MsEvent")." ORDER BY IDEvent DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDEvent;
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
                $tglevent = explode("-", $input['TglEvent']);
                $save['IDEvent'] = $this->GetLastID();
                $save['TglEvent'] = $tglevent[2].$tglevent[1].$tglevent[0];
                $save['JudulEvent'] = $input['JudulEvent'];
                $save['IsiEvent'] = $input['IsiEvent'];
                $this->db->insert(strtolower('MsEvent'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDEvent'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idevent)
        {
                $tglevent = explode("-", $input['TglEvent']);
                $save['TglEvent'] = $tglevent[2].$tglevent[1].$tglevent[0];
                $save['JudulEvent'] = $input['JudulEvent'];
                $save['IsiEvent'] = $input['IsiEvent'];
                $this->db->where('IDEvent', $idevent);
                $this->db->update(strtolower('MsEvent'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idevent)
        {
                $this->db->where('IDEvent', $idevent);
                $this->db->delete(strtolower(('MsEvent')));
                return $this->db->affected_rows() != -1;
        }

}

?>