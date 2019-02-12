<?php

class MsPerusahaanTemp extends CI_Model
{
        
        function GetCountMsPerusahaanTemp()
        {
            $this->db->select('*');
            $this->db->from('msperusahaantemp AS a');
            $this->db->join('msbidangperusahaan AS b', 'a.IDBidangPerusahaan=b.IDBidangPerusahaan');
            $this->db->join('mskelurahan AS c', 'a.IDKelurahan=c.IDKelurahan');
            $this->db->join('mskecamatan AS d', 'c.IDKecamatan=d.IDKecamatan');
            return $this->db->get();
        }
        
        function GetGridMsPerusahaanTemp($num, $offset)
        {
            $this->db->select('a.IDPerusahaanTemp,a.NamaPerusahaan,b.NamaBidangPerusahaan,a.Email,a.Telepon,a.Alamat,a.KodePos,c.NamaKelurahan,d.NamaKecamatan,a.Kota,a.Propinsi,a.NamaPemberiKerja,a.TeleponPemberiKerja,a.EmailPemberiKerja,a.RegisterDate');
            $this->db->from('msperusahaantemp AS a');
            $this->db->join('msbidangperusahaan AS b', 'a.IDBidangPerusahaan=b.IDBidangPerusahaan');
            $this->db->join('mskelurahan AS c', 'a.IDKelurahan=c.IDKelurahan');
            $this->db->join('mskecamatan AS d', 'c.IDKecamatan=d.IDKecamatan');
            $this->db->order_by('RegisterDate', 'desc');
            $this->db->limit(($offset != "" ? $offset."," : "")." ".$num);
            return $this->db->get();
        }

        public function get_datatable_perusahaan()
        {
                $this->datatables->select("IDPerusahaanTemp,NamaPerusahaan,NamaPemberiKerja,Telepon,Email,RegisterDate");
                $this->datatables->from('msperusahaantemp');
                $button = '<a class="btn btn-default btn-sm" onclick="DoActivateConfirm(\''.'$1'.'\')"><i class="fa fa-check"></i> Terima </a><a class="btn btn-default btn-sm" onclick="DoDeleteConfirm(\''.'$1'.'\')"><i class="fa fa-trash"></i> Hapus </a>';
                $this->datatables->add_column('view', $button, 'IDPerusahaanTemp');
                return $this->datatables->generate();
        }

        function GetMsPerusahaanTempByIDPerusahaanTemp($idperusahaantemp)
        {
                $query = $this->db->query("SELECT a.IDPerusahaanTemp,a.IDBidangPerusahaan,a.IDKelurahan,a.NamaPerusahaan,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kota,a.Propinsi,a.NamaPemberiKerja,a.JabatanPemberiKerja,a.TeleponPemberiKerja,a.EmailPemberiKerja,a.RegisterDate,b.NamaBidangPerusahaan,c.NamaKelurahan,d.NamaKecamatan,c.IDKecamatan FROM ".strtolower("MsPerusahaanTemp")." AS a
                INNER JOIN ".strtolower("MsBidangPerusahaan")." AS b ON a.IDBidangPerusahaan=b.IDBidangPerusahaan
                INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
                WHERE a.IDPerusahaanTemp='".$this->db->escape_like_str($idperusahaantemp)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function CekUsername($username)
        {
                $this->db->select('IDPerusahaanTemp');
                $this->db->from(strtolower('MsPerusahaanTemp'));
                $this->db->where('Username', $username);
                return $this->db->get();
        }

        function CekEmailPemberiKerja($emailpemberikerja,$idperusahaantemp)
        {
                $query = $this->db->query("SELECT IDPerusahaanTemp FROM ".strtolower("MsPerusahaanTemp")." WHERE EmailPemberiKerja='".$this->db->escape_like_str($emailpemberikerja)."'".($idperusahaantemp != NULL ? " AND IDPerusahaanTemp!='".$idperusahaantemp."'" : ""));
                return $query;
        }

        function CekNamaPerusahaan($NamaPerusahaan)
        {
                $this->db->select('IDPerusahaanTemp');
                $this->db->from(strtolower('MsPerusahaanTemp'));
                $this->db->where('NamaPerusahaan', $NamaPerusahaan);
                return $this->db->get();
        }

        function GetProfilPerusahaanByIDUser($iduser)
        {
                $query = $this->db->query("SELECT a.IDPerusahaanTemp,a.NamaPerusahaan,b.NamaBidangPerusahaan,a.Email,a.Telepon,a.Alamat,a.KodePos,c.NamaKelurahan,d.NamaKecamatan,a.Kota,a.Propinsi FROM ".strtolower("MsPerusahaanTemp")." AS a
                INNER JOIN ".strtolower("MsBidangPerusahaan")." AS b ON a.IDBidangPerusahaan=b.IDBidangPerusahaan
                INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan WHERE a.IDUser='".$this->db->escape_like_str($iduser)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function GetPemberiKerjaPerusahaanByIDUser($iduser)
        {
                $query = $this->db->query("SELECT IDPerusahaanTemp,NamaPerusahaan,NamaPemberiKerja,JabatanPemberiKerja,TeleponPemberiKerja,EmailPemberiKerja FROM ".strtolower("MsPerusahaanTemp")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function GetLastID()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDPerusahaanTemp FROM ".strtolower("MsPerusahaanTemp")." ORDER BY IDPerusahaanTemp DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDPerusahaanTemp;
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

        function Insert($input,$registerdate)
        {
                $save['IDPerusahaanTemp'] = $this->GetLastID();
                $save['Username'] = $input['username'];
                $save['Password'] = $input['password'];
                $save['IDBidangPerusahaan'] = $input['idbidangperusahaan'];
                $save['IDKelurahan'] = $input['idkelurahan'];
                $save['NamaPerusahaan'] = $input['namaperusahaan'];
                $save['Email'] = $input['email'];
                $save['Telepon'] = $input['telepon'];
                $save['Alamat'] = $input['alamat'];
                $save['KodePos'] = $input['kodepos'];
                $save['Kota'] = $input['kota'];
                $save['Propinsi'] = $input['propinsi'];
                $save['NamaPemberiKerja'] = $input['namapemberikerja'];
                $save['JabatanPemberiKerja'] = $input['jabatanpemberikerja'];
                $save['TeleponPemberiKerja'] = $input['teleponpemberikerja'];
                $save['EmailPemberiKerja'] = $input['emailpemberikerja'];
                $save['RegisterDate'] = $registerdate;
                $this->db->insert(strtolower(strtolower('MsPerusahaanTemp')), $save);
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDPerusahaanTemp'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($idperusahaan)
        {
                $this->db->from(strtolower('MsPerusahaanTemp'));
                $this->db->where('IDPerusahaanTemp', $idperusahaan);
                return $this->db->affected_rows() != -1;
        }

        function DeleteByIDPerusahaanTemp($idperusahaantemp)
        {
                $this->db->where('IDPerusahaanTemp', $idperusahaantemp);
                $this->db->delete(strtolower('MsPerusahaanTemp'));
                return $this->db->affected_rows() != -1;
        }

        function Export($idperusahaantemp)
        {
                $registerdate = date('Y-m-d H:i:s');
                $query = $this->db->query("SELECT Username,Password,IDBidangPerusahaan,IDKelurahan,NamaPerusahaan,Email,Telepon,Alamat,KodePos,Kota,Propinsi,NamaPemberiKerja,JabatanPemberiKerja,TeleponPemberiKerja,EmailPemberiKerja,RegisterDate FROM ".strtolower('MsPerusahaanTemp')." WHERE IDPerusahaanTemp='".$idperusahaantemp."'");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $username = $getdata->Username;
                        $password = $getdata->Password;
                        $iduser = $this->InsertMsUser('000001', $username, $password, $registerdate);
                        if ($iduser != '')
                        {
                                $input['iduser'] = $iduser;
                                $input['idbidangperusahaan'] = $getdata->IDBidangPerusahaan;
                                $input['idkelurahan'] = $getdata->IDKelurahan;
                                $input['namaperusahaan'] = $getdata->NamaPerusahaan;
                                $input['email'] = $getdata->Email;
                                $input['telepon'] = $getdata->Telepon;
                                $input['alamat'] = $getdata->Alamat;
                                $input['kodepos'] = $getdata->KodePos;
                                $input['kota'] = $getdata->Kota;
                                $input['propinsi'] = $getdata->Propinsi;
                                $input['namapemberikerja'] = $getdata->NamaPemberiKerja;
                                $input['jabatanpemberikerja'] = $getdata->JabatanPemberiKerja;
                                $input['teleponpemberikerja'] = $getdata->TeleponPemberiKerja;
                                $input['emailpemberikerja'] = $getdata->EmailPemberiKerja;
                                $idperusahaan = $this->InsertMsPerusahaan($iduser, $input, $registerdate);
                                if ($idperusahaan != '')
                                {
                                        $this->db->where('IDPerusahaanTemp', $idperusahaantemp);
                                        $this->db->delete(strtolower('MsPerusahaanTemp'));
                                        return $iduser;
                                }
                                else
                                {
                                        $this->db->where('IDUser', $idperusahaantemp);
                                        $this->db->delete(strtolower(('MsUser')));
                                        return NULL;
                                }
                        }
                        return NULL;
                }
                else
                {
                        return NULL;
                }
        }

        function GetLastIDUser()
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

        function InsertMsUser($idjenisuser, $username, $password, $registerdate)
        {
                $data['IDUser'] = $this->GetLastIDUser();
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

        function GetLastIDPerusahaan()
        {
                $LastID = "";
                $query = $this->db->query("SELECT IDPerusahaan FROM ".strtolower("MsPerusahaan")." ORDER BY IDPerusahaan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDPerusahaan;
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

        function InsertMsPerusahaan($iduser,$input,$registerdate)
        {
                if ($iduser != NULL)
                {
                        $save['IDPerusahaan'] = $this->GetLastIDPerusahaan();
                        $save['IDUser'] = $iduser;
                        $save['IDBidangPerusahaan'] = $input['idbidangperusahaan'];
                        $save['IDKelurahan'] = $input['idkelurahan'];
                        $save['NamaPerusahaan'] = $input['namaperusahaan'];
                        $save['Email'] = $input['email'];
                        $save['Telepon'] = $input['telepon'];
                        $save['Alamat'] = $input['alamat'];
                        $save['KodePos'] = $input['kodepos'];
                        $save['Kota'] = $input['kota'];
                        $save['Propinsi'] = $input['propinsi'];
                        $save['NamaPemberiKerja'] = $input['namapemberikerja'];
                        $save['JabatanPemberiKerja'] = $input['jabatanpemberikerja'];
                        $save['TeleponPemberiKerja'] = $input['teleponpemberikerja'];
                        $save['EmailPemberiKerja'] = $input['emailpemberikerja'];
                        $save['RegisterDate'] = $registerdate;
                        $this->db->insert(strtolower(strtolower('MsPerusahaan')), $save);
                        if ($this->db->affected_rows() > 0)
                        {
                                return $save['IDPerusahaan'];
                        }
                        else
                        {
                                $this->load->model('MsUser');
                                $this->MsUser->delete($iduser);
                                return NULL;
                        }
                }
                else
                {
                        return NULL;
                }
        }

        function Check_login($username, $password)
        {
                $this->db->from(strtolower('MsPerusahaanTemp'));
                $this->db->where('Username', $username);
                $this->db->where('password', $password);
                return $this->db->get();
        }

        public function cek_user($username, $password)
        {
            $this->db->select('IDPerusahaanTemp');
            $this->db->from('msperusahaantemp');
            $this->db->where('Username', $username);
            $this->db->where('Password', $password);
            
            $query = $this->db->get();
            
            if ($query->num_rows() > 0)
            {
                $getdata = $query->row();
                return $getdata->IDPerusahaanTemp;
            }
            else
            {
                return NULL;
            }
        }

}

?>