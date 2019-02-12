<?php

class MsAgama extends CI_Model
{
        
        function GetMsAgama()
        {
                $query = $this->db->query("SELECT IDAgama,NamaAgama FROM ".strtolower("MsAgama"));
                return $query->result();
        }
        
        function GetComboMsAgama()
        {
                $query = $this->db->query("SELECT IDAgama,NamaAgama FROM ".strtolower("MsAgama"));
                return $query->result();
        }

}

?>