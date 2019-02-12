<?php

class MsPerusahaan extends CI_Model
{
        function GetCountMsPerusahaan()
        {
                $query = $this->db->query("SELECT COALESCE(COUNT(IDPerusahaan),0) AS total_rows FROM ".strtolower("MsPerusahaan"));
                return $query->row();
        }
        
        function GetGridMsPerusahaan($num, $offset)
        {
                $query = $this->db->query("SELECT IDPerusahaan,IDUser,IDBidangPerusahaan,IDKelurahan,NamaPerusahaan,Email,Telepon,Alamat,KodePos,Kota,Propinsi,NamaPemberiKerja,JabatanPemberiKerja,TeleponPemberiKerja,EmailPemberiKerja,RegisterDate FROM ".strtolower("MsPerusahaan")." LIMIT ".($offset != "" ? $offset."," : "")." ".$num);
                return $query;
        }

        public function get_datatable_perusahaan()
        {
                $this->datatables->select("IDPerusahaan,IDUser,IDBidangPerusahaan,IDKelurahan,NamaPerusahaan,Email,Telepon,Alamat,KodePos,Kota,Propinsi,NamaPemberiKerja,JabatanPemberiKerja,TeleponPemberiKerja,EmailPemberiKerja,RegisterDate");
                $this->datatables->from('msperusahaan');
                $this->datatables->add_column('view', '<a class="btn btn-default btn-sm" onclick="DoView(\''.'$1'.'\')" href="javascript:void(0);"><i class="fa fa-eye"></i> Detail</a><a class="btn btn-default btn-sm" onclick="DoDelete(\''.'$1'.'\')"><i class="fa fa-trash"></i> Hapus</a>', 'IDPerusahaan');
                return $this->datatables->generate();
        }

        function CekEmailPemberiKerja($emailpemberikerja,$idperusahaan)
        {
                $query = $this->db->query("SELECT IDPerusahaan FROM ".strtolower("MsPerusahaan")." WHERE EmailPemberiKerja='".$this->db->escape_like_str($emailpemberikerja)."'".($idperusahaan != NULL ? " AND IDPerusahaan!='".$idperusahaan."'" : ""));
                return $query;
        }

        function CekNamaPerusahaan($NamaPerusahaan)
        {
                $this->db->from(strtolower('MsPerusahaanTemp'));
                $this->db->where('NamaPerusahaan', $NamaPerusahaan);
                return $this->db->get();
        }

        function GetIDPerusahaanByIDUser($iduser)
        {
                $query = $this->db->query("SELECT IDPerusahaan FROM ".strtolower("MsPerusahaan")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        return $getdata->IDPerusahaan;
                }
                else
                {
                        return NULL;
                }
        }

        function GetMsPerusahaanByIDPerusahaan($idperusahaan)
        {
                $this->db->select('
                        a.IDPerusahaan,a.IDUser,a.IDBidangPerusahaan,a.IDKelurahan,b.NamaKelurahan, 
                        c.NamaKecamatan, c.IDKecamatan, a.NamaPerusahaan,a.Email,
                        a.Telepon,a.Alamat,a.KodePos,Kota,Propinsi,
                        a.NamaPemberiKerja,a.JabatanPemberiKerja,a.TeleponPemberiKerja,a.EmailPemberiKerja,
                        a.RegisterDate, f.NamaBidangPerusahaan'
                );
                $this->db->from('msperusahaan as a');
                $this->db->join('mskelurahan as b', 'a.IDKelurahan = b.IDKelurahan');
                $this->db->join('mskecamatan as c', 'b.IDKecamatan = c.IDKecamatan');
                $this->db->join('msbidangperusahaan as f', 'a.IDBidangPerusahaan = f.IDBidangPerusahaan');
                $this->db->where('a.IDPerusahaan', $idperusahaan);
                return $this->db->get()->row();
        }

        function GetMsPerusahaanByIDUser($iduser)
        {
                $query = $this->db->query("SELECT a.IDPerusahaan,a.IDUser,a.IDBidangPerusahaan,a.IDKelurahan,a.NamaPerusahaan,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kota,a.Propinsi,a.NamaPemberiKerja,a.JabatanPemberiKerja,a.TeleponPemberiKerja,a.EmailPemberiKerja,a.RegisterDate,b.NamaBidangPerusahaan,c.NamaKelurahan,d.NamaKecamatan,c.IDKecamatan FROM ".strtolower("MsPerusahaan")." AS a
                INNER JOIN ".strtolower("MsBidangPerusahaan")." AS b ON a.IDBidangPerusahaan=b.IDBidangPerusahaan
                INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
                WHERE a.IDUser='".$this->db->escape_like_str($iduser)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function GetMsPerusahaanByEmailPemberiKerja($emailpemberikerja)
        {
                $query = $this->db->query("SELECT a.IDPerusahaan,a.IDUser,a.IDBidangPerusahaan,a.IDKelurahan,a.NamaPerusahaan,a.Email,a.Telepon,a.Alamat,a.KodePos,a.Kota,a.Propinsi,a.NamaPemberiKerja,a.JabatanPemberiKerja,a.TeleponPemberiKerja,a.EmailPemberiKerja,a.RegisterDate,b.NamaBidangPerusahaan,c.NamaKelurahan,d.NamaKecamatan,c.IDKecamatan FROM ".strtolower("MsPerusahaan")." AS a
                INNER JOIN ".strtolower("MsBidangPerusahaan")." AS b ON a.IDBidangPerusahaan=b.IDBidangPerusahaan
                INNER JOIN ".strtolower("MsKelurahan")." AS c ON a.IDKelurahan=c.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS d ON c.IDKecamatan=d.IDKecamatan
                WHERE a.EmailPemberiKerja='".$this->db->escape_like_str($emailpemberikerja)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }
        
        function GetMsPerusahaanByIDLowongan($idlowongan)
        {
                $query = $this->db->query("SELECT b.IDPerusahaan,b.IDUser,b.IDBidangPerusahaan,b.IDKelurahan,b.NamaPerusahaan,b.Email,b.Telepon,b.Alamat,b.KodePos,b.Kota,b.Propinsi,b.NamaPemberiKerja,b.JabatanPemberiKerja,b.TeleponPemberiKerja,b.EmailPemberiKerja,b.RegisterDate,c.NamaBidangPerusahaan,d.NamaKelurahan,e.NamaKecamatan,d.IDKecamatan FROM ".strtolower("MsLowongan")." AS a
                INNER JOIN ".strtolower("MsPerusahaan")." AS b ON a.IDPerusahaan=b.IDPerusahaan
                INNER JOIN ".strtolower("MsBidangPerusahaan")." AS c ON b.IDBidangPerusahaan=c.IDBidangPerusahaan
                INNER JOIN ".strtolower("MsKelurahan")." AS d ON b.IDKelurahan=d.IDKelurahan
                INNER JOIN ".strtolower("MsKecamatan")." AS e ON d.IDKecamatan=e.IDKecamatan
                WHERE a.IDLowongan='".$this->db->escape_like_str($idlowongan)."'");
                if ($query->num_rows() > 0)
                {
                        return $query->row();
                }
                else
                {
                        return NULL;
                }
        }

        function GetByIDBidangPerusahaan($id)
        {
                $query = $this->db->query("SELECT IDPerusahaan FROM msperusahaan WHERE IDBidangPerusahaan = '".$id."'");
                return $query->result();
        }

        function GetPemberiKerjaPerusahaanByIDUser($iduser)
        {
                $query = $this->db->query("SELECT IDPerusahaan,NamaPerusahaan,NamaPemberiKerja,JabatanPemberiKerja,TeleponPemberiKerja,EmailPemberiKerja FROM ".strtolower("MsPerusahaan")." WHERE IDUser='".$this->db->escape_like_str($iduser)."'");
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

        function Insert($input,$registerdate)
        {
                if ($iduser != NULL)
                {
                        $save['IDPerusahaan'] = $this->GetLastID();
                        $save['IDUser'] = $input['iduser'];
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
                        $this->db->insert(strtolower('MsPerusahaan'), $save);
                        if ($this->db->affected_rows() > 0)
                        {
                                return $save['IDPerusahaan'];
                        }
                        else
                        {
                                $this->load->model('MsUser');
                                $this->MsUser->Delete($iduser);
                                return NULL;
                        }
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input, $idperusahaan)
        {
                $save['IDBidangPerusahaan'] = $input['idbidangperusahaan'];
                $save['IDKelurahan'] = $input['idkelurahan'];
                $save['NamaPerusahaan'] = $input['namaperusahaan'];
                $save['Email'] = $input['email'];
                $save['Telepon'] = $input['telepon'];
                $save['Alamat'] = $input['alamat'];
                $save['KodePos'] = $input['kodepos'];
                $save['Kota'] = $input['kota'];
                $save['Propinsi'] = $input['propinsi'];
                $this->db->where('IDPerusahaan', $idperusahaan);
                $this->db->update(strtolower('MsPerusahaan'), $save);
                return $this->db->affected_rows() != -1;
        }

        function UpdatePemberiKerja($input, $idperusahaan)
        {
                $save['NamaPemberiKerja'] = $input['namapemberikerja'];
                $save['JabatanPemberiKerja'] = $input['jabatanpemberikerja'];
                $save['TeleponPemberiKerja'] = $input['teleponpemberikerja'];
                $save['EmailPemberiKerja'] = $input['emailpemberikerja'];
                $this->db->where('IDPerusahaan', $idperusahaan);
                $this->db->update(strtolower('MsPerusahaan'), $save);
                return $this->db->affected_rows() != -1;
        }

        public function DeletePerusahaan($idperusahaan)
        {
                $this->db->select('*');
                $this->db->from('msperusahaan');
                $this->db->where('IDPerusahaan', $idperusahaan);
                $data = $this->db->get()->row();
                if ($data != NULL) 
                {
                        $this->MsUser->Delete($data->IDUser);
                        
                }
                $this->MsLowongan->DeleteByIDPerusahaan($idperusahaan);
                $this->Delete($idperusahaan);

        }

        function Delete($idperusahaan)
        {
                $this->db->where('IDPerusahaan', $idperusahaan);
                $this->db->delete(strtolower(('MsPerusahaan')));
                return $this->db->affected_rows() != -1;
                
        }

        function Check_login($username, $password)
        {
                $this->db->from(strtolower('MsPerusahaan'));
                $this->db->where('Username', $username);
                $this->db->where('password', $password);
                return $this->db->get();
        }

        function Check_session($idperusahaan,$idsession)
        {
                $this->db->from(strtolower('MsPerusahaan'));
                $this->db->where('IDPerusahaan',$idperusahaan);
                $this->db->where('idsession',$idsession);
                return $this->db->get();
        }

}

?>