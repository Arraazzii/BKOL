<?php

class MsStatusPernikahan extends CI_Model
{
        
        function GetMsStatusPernikahan()
        {
                $query = $this->db->query("SELECT IDStatusPernikahan,NamaStatusPernikahan FROM ".strtolower("MsStatusPernikahan"));
                return $query->result();
        }
        
        function GetComboMsStatusPernikahan()
        {
                $query = $this->db->query("SELECT IDStatusPernikahan,NamaStatusPernikahan FROM ".strtolower("MsStatusPernikahan"));
                return $query->result();
        }

}

?>