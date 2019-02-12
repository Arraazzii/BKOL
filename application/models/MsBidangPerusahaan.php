<?php

class MsBidangPerusahaan extends CI_Model
{
        
        function GetMsBidangPerusahaan()
        {
                $query = $this->db->query("SELECT IDBidangPerusahaan,NamaBidangPerusahaan FROM ".strtolower("MsBidangPerusahaan")." ORDER BY NamaBidangPerusahaan");
                return $query->result();
        }
        
        function GetComboMsBidangPerusahaan()
        {
                $query = $this->db->query("SELECT IDBidangPerusahaan,NamaBidangPerusahaan FROM ".strtolower("MsBidangPerusahaan")." ORDER BY NamaBidangPerusahaan");
                return $query->result();
        }

}

?>