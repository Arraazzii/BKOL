<?php

class MsPengalaman extends CI_Model
{
        
        function GetCountMsPengalaman()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDPengalaman),0) AS total_rows FROM ".strtolower("MsPengalaman"));
                return $query->row();
        }
        
        function GetGridMsPengalaman($num, $offset)
        {
                $query = $this->db->query("SELECT IDPengalaman,IDPencaker,Jabatan,UraianKerja,NamaPerusahaan,TglMasuk,TglBerhenti FROM ".strtolower("MsPengalaman")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }
        
        function GetMsPengalaman()
        {
                $query = $this->db->query("SELECT IDPengalaman,IDPencaker,Jabatan,UraianKerja,NamaPerusahaan,TglMasuk,TglBerhenti FROM ".strtolower("MsPengalaman"));
                return $query->result();
        }
        
        function GetMsPengalamanByIDPencaker($idpencaker)
        {
                $query = $this->db->query("SELECT IDPengalaman,IDPencaker,Jabatan,UraianKerja,NamaPerusahaan,TglMasuk,TglBerhenti,DATEDIFF(TglBerhenti, TglMasuk) as lamabekerja FROM ".strtolower("MsPengalaman")." WHERE IDPencaker='".$this->db->escape_like_str($idpencaker)."'");
                return $query;
        }
        
        function GetMsPengalamanByIDPengalaman($idpengalaman)
        {
                $query = $this->db->query("SELECT IDPengalaman,IDPencaker,Jabatan,UraianKerja,NamaPerusahaan,TglMasuk,TglBerhenti,StatusPekerjaan FROM ".strtolower("MsPengalaman")." WHERE IDPengalaman='".$this->db->escape_like_str($idpengalaman)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetComboMsPengalaman()
        {
                $query = $this->db->query("SELECT IDPengalaman,IDPencaker,Jabatan,UraianKerja,NamaPerusahaan,TglMasuk,TglBerhenti FROM ".strtolower("MsPengalaman")." ORDER BY NamaPengalaman");
                return $query->result();
        }

        function CekNamaPengalaman($namapengalaman,$idpengalaman)
        {
                $this->db->select('IDPengalaman');
                $this->db->from(strtolower('MsPengalaman'));
                $this->db->where('NamaPengalaman', $namapengalaman);
                if ($idpengalaman != NULL)
                {
                        $this->db->where('IDPengalaman != ', $idpengalaman);
                }
                if ($this->db->get()->num_rows() > 0)
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDPengalaman FROM ".strtolower("MsPengalaman")." ORDER BY IDPengalaman DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDPengalaman;
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

        function CountPengalamanByIDPencaker($idpencaker)
        {
                $this->db->select('IDPengalaman');
                $this->db->from('mspengalaman');
                $this->db->where('IDPencaker', $idpencaker);
                return $this->db->get()->num_rows;
        }

        function Insert($input, $idpencaker)
        {       
                $tglmasuk = explode("-", $input['TglMasuk']);
                $tglberhenti = explode("-", $input['TglBerhenti']);
                $save['IDPengalaman'] = $this->GetLastID();
                $save['IDPencaker'] = $idpencaker;
                $save['Jabatan'] = $input['Jabatan'];
                $save['UraianKerja'] = $input['UraianKerja'];
                $save['NamaPerusahaan'] = $input['NamaPerusahaan'];
                $save['TglMasuk'] = $tglmasuk[2].$tglmasuk[1].$tglmasuk[0];
                $save['TglBerhenti'] = $tglberhenti[2].$tglberhenti[1].$tglberhenti[0];
                $save['StatusPekerjaan'] = $input['StatusPekerjaan'];
                // if($input['StatusPekerjaan'] == 1)
                // {
                //         $this->db->where('IDPencaker', $idpencaker);
                //         $this->db->update('mspengalaman', ['StatusPekerjaan'=>0]);
                // }
                $this->db->insert(strtolower('MsPengalaman'), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDPengalaman'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input, $idpengalaman, $idpencaker)
        {
                $tglmasuk = explode("-", $input['TglMasuk']);
                $tglberhenti = explode("-", $input['TglBerhenti']);
                $save['Jabatan'] = $input['Jabatan'];
                $save['UraianKerja'] = $input['UraianKerja'];
                $save['NamaPerusahaan'] = $input['NamaPerusahaan'];
                $save['StatusPekerjaan'] = $input['StatusPekerjaan'];
                $save['TglMasuk'] = $tglmasuk[2].$tglmasuk[1].$tglmasuk[0];
                $save['TglBerhenti'] = $tglberhenti[2].$tglberhenti[1].$tglberhenti[0];
                // if($input['StatusPekerjaan'] == 1)
                // {
                //         $this->db->where('IDPencaker', $idpencaker);
                //         $this->db->update('mspengalaman', ['StatusPekerjaan'=>0]);
                // }
                $this->db->where('IDPengalaman', $idpengalaman);
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->update(strtolower('MsPengalaman'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idpengalaman, $idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->where('IDPengalaman', $idpengalaman);
                $this->db->delete(strtolower(('MsPengalaman')));
                return $this->db->affected_rows() != -1;
        }

        public function DeletePengalamanByIDPencaker($idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->delete(strtolower(('MsPengalaman')));
                return $this->db->affected_rows() != -1;
        }

        public function GetPengalamanByIDPencakerTemp($idpencakertemp)
        {
                $query = $this->db->query("
                        SELECT IDPengalaman,IDPencakerTemp,Jabatan,UraianKerja,NamaPerusahaan,
                        DATEDIFF(TglBerhenti, TglMasuk) as lamabekerja FROM mspengalaman WHERE
                        IDPencakerTemp = '".$idpencakertemp."'");
                return $query->result();
        }

}

?>