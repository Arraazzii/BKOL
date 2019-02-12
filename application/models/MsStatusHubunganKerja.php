<?php

class MsStatusHubunganKerja extends CI_Model
{
        
        function GetMsStatusHubunganKerja()
        {
                $query = $this->db->query("SELECT IDStatusHubunganKerja,NamaStatusHubunganKerja FROM ".strtolower("MsStatusHubunganKerja"));
                return $query->result();
        }
        
        function GetComboMsStatusHubunganKerja()
        {
                $query = $this->db->query("SELECT IDStatusHubunganKerja,NamaStatusHubunganKerja FROM ".strtolower("MsStatusHubunganKerja")." ORDER BY NamaStatusHubunganKerja");
                return $query->result();
        }

}

?>