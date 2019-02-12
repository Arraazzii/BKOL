<?php

class MsStatusPendidikan extends CI_Model
{
        
        function GetMsStatusPendidikan()
        {
                $query = $this->db->query("SELECT IDStatusPendidikan,NamaStatusPendidikan FROM ".strtolower("MsStatusPendidikan")." ORDER BY NamaStatusPendidikan");
                return $query->result();
        }
        
        function GetComboMsStatusPendidikan()
        {
                $query = $this->db->query("SELECT IDStatusPendidikan,NamaStatusPendidikan FROM ".strtolower("MsStatusPendidikan"));
                return $query->result();
        }

}

?>