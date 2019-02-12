<?php

class MsJenisPengupahan extends CI_Model
{
        
        function GetMsJenisPengupahan()
        {
                $query = $this->db->query("SELECT IDJenisPengupahan,NamaJenisPengupahan FROM ".strtolower("MsJenisPengupahan"));
                return $query->result();
        }
        
        function GetComboMsJenisPengupahan()
        {
                $query = $this->db->query("SELECT IDJenisPengupahan,NamaJenisPengupahan FROM ".strtolower("MsJenisPengupahan")." ORDER BY NamaJenisPengupahan");
                return $query->result();
        }

}

?>