<?php

class MsUser extends CI_Model
{
    
    function GetGrid($num, $offset)
    {
        $this->db->query('YOUR QUERY HERE');
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->limit($num, $offset);
        return $this->db->get();
    }

    function CekUsername($username,$idjenisuser)
    {
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->where('Username', $username);
        $this->db->where('IDJenisUser', $idjenisuser);
        return $this->db->get();
    }

    function GetLastID()
    {
        $LastID = "";
        $query = $this->db->query("SELECT IDUser FROM ".strtolower("MsUser")." ORDER BY IDUser DESC LIMIT 1");
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $GetLastID = (int)$getdata->IDUser;
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
    
    function GetMsUserByIDUser($iduser)
    {
        $query = $this->db->query("SELECT IDUser,IDJenisUser,Username,Password,RegisterDate FROM ".strtolower("MsUser")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }

    function GetMsUserByIDUserEmail($iduser)
    {
        $query = $this->db->query("SELECT a.IDUser,a.IDJenisUser,a.Username,a.Password,a.RegisterDate,b.Email FROM msuser as a JOIN mspencaker as b ON a.IDUser = b.IDUser WHERE a.IDUser='".$this->db->escape_like_str($iduser)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }
    
    function GetMsUserByIDPencaker($idpencaker)
    {
        $query = $this->db->query("SELECT a.IDUser,a.IDJenisUser,a.Username,a.Password,a.RegisterDate FROM ".strtolower("MsUser")." AS a INNER JOIN ".strtolower("MsPencaker")." AS b ON a.IDUser=b.IDUser WHERE b.IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
        if ($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return NULL;
        }
    }

    function Insert($idjenisuser, $username, $password, $registerdate)
    {
        $data['IDUser'] = $this->GetLastID();
        $data['IDJenisUser'] = $idjenisuser;
        $data['Username'] = $username;
        $data['Password'] = $password;
        $data['RegisterDate'] = $registerdate;
        $this->db->query(
            "INSERT INTO ".strtolower("MsUser")."
            SELECT * FROM (SELECT ".$this->db->escape($data['IDUser'])." AS IDUser,".$this->db->escape($data['IDJenisUser'])." AS IDJenisUser,".$this->db->escape($data['Username'])." AS Username,".$this->db->escape($data['Password'])." AS Password,'0' AS session_id,".$this->db->escape($data['RegisterDate'])." AS RegisterDate) as TMP
            WHERE NOT EXISTS (
                SELECT IDUser FROM ".strtolower("MsUser")." WHERE IDJenisUser='".$this->db->escape_like_str($data['IDJenisUser'])."' AND Username='".$this->db->escape_like_str($data['Username']).")'
            ) LIMIT 1");
        if ($this->db->affected_rows() > 0)
        {
            return $data['IDUser'];
        }
        else
        {
            return NULL;
        }
    }

    function Update($iduser)
    {
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->where('IDUser', $iduser);
        return $this->db->affected_rows() != -1;
    }

    function UpdatePassword($iduser, $oldpassword, $password)
    {
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->where('IDUser', $iduser);
        $this->db->where('Password', $oldpassword);
        if ($this->db->get()->num_rows() > 0)
        {
            $save['Password'] = $password;
            $this->db->where('IDUser', $iduser);
            $this->db->where('Password', $oldpassword);
            $this->db->update(strtolower('MsUser'), $save);
            return $this->db->affected_rows() != -1;
        }
        else
        {
            return false;
        }
    }

    function Delete($iduser)
    {
        $this->db->select('IDUser');
        $this->db->where('IDUser', $iduser);
        $this->db->delete(strtolower(('MsUser')));
        return $this->db->affected_rows() != -1;
    }

    function Login($idjenisuser,$username,$password,$sessionid)
    {
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->where('IDJenisUser', $idjenisuser);
        $this->db->where('Username', $username);
        $this->db->where('Password', $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            $getdata = $query->row();
            $update['session_id'] = $sessionid;
            $this->db->where("IDUser",$getdata->IDUser);
            $this->db->update(strtolower(strtolower('MsUser')), $update);
            $getdata = $query->row();
            return $getdata->IDUser;
        }
        else
        {
            return NULL;
        }
    }

    function Logout($iduser)
    {
        $update['session_id'] = '0';
        $this->db->where("IDUser",$iduser);
        $this->db->update(strtolower(strtolower('MsUser')), $update);
    }

    function Check_session($iduser,$idsession)
    {
        $this->db->select('IDUser');
        $this->db->from(strtolower('MsUser'));
        $this->db->where('IDUser',$iduser);
        $this->db->where('session_id',$idsession);
        return $this->db->get();
    }

}

?>