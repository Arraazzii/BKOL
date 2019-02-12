<?php

class ci_sessions extends CI_Model
{
        
        function GetCountOnline()
        {
                $query = $this->db->query("SELECT COUNT(ip_address) AS Online FROM ci_sessions WHERE TIME_TO_SEC(TIMEDIFF(NOW(),FROM_UNIXTIME(last_activity)))/60<60");
                return $query->row();
        }
}

?>