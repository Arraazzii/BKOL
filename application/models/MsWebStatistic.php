<?php

class MsWebStatistic extends CI_Model
{

        function GetCountStatistic()
        {
                $query = $this->db->query("SELECT TotalVisited FROM ".strtolower("MsWebStatistic"));
                if ($query->num_rows() == 0)
                {
                        $save['TotalVisited'] = 1;
                        $this->db->insert(strtolower('MsWebStatistic'), $save);
                        if ($this->db->affected_rows() > 0)
                        {
                        }
                        else
                        {
                        }
                }
                return $query->row();
        }

        function AddCountStatistic()
        {
                $this->db->query("UPDATE ".strtolower("MsWebStatistic")." SET TotalVisited=TotalVisited+1");
                return $this->db->affected_rows() != -1;
        }
}

?>