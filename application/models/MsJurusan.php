<?php

class MsJurusan extends CI_Model
{
        
        function GetCountMsJurusan()
        {
                $this->db->select('IDjurusan');
                $this->db->from('msjurusan');
                return $this->db->get();
        }
        
        function GetGridMsJurusan($num, $offset)
        {
                $this->db->select('a.IDjurusan, a.Jurusan, a.IDStatusPendidikan, b.NamaStatusPendidikan');
                $this->db->from('msjurusan AS a');
                $this->db->join('msstatuspendidikan AS b', 'a.IDStatusPendidikan = b.IDStatusPendidikan');
                $this->db->order_by('IDJurusan', 'desc');
                $this->db->limit($num, $offset);
                return $this->db->get();
        }
        
        function GetMsJurusan()
        {
                $query = $this->db->query("SELECT IDjurusan, Jurusan FROM ".strtolower("MsJurusan")." ORDER BY IDjurusan");
                return $query->result();
        }

        public function GetMsTingkatPendidikan()
        {
                $this->db->select('IDTingkatPendidikan, NamaTingkatPendidikan');
                $this->db->from('mstingkatpendidikan');
                $this->db->where('NamaTingkatPendidikan !=', 'SD');
                $this->db->where('NamaTingkatPendidikan !=', 'SLTP');
                $this->db->order_by('IDTingkatPendidikan', 'asc');
                return $this->db->get();
        }
        
        function GetMsJurusanByIDJurusan($idjurusan)
        {
                $this->db->select('a.IDjurusan, a.Jurusan, a.IDStatusPendidikan, b.NamaStatusPendidikan');
                $this->db->from('msjurusan AS a');
                $this->db->join('msstatuspendidikan AS b', 'a.IDStatusPendidikan = b.IDStatusPendidikan');
                $this->db->where('IDjurusan', $idjurusan);
                return $this->db->get()->row();
        }
        
        function GetComboMsJurusan()
        {
                $query = $this->db->query("SELECT IDjurusan, Jurusan FROM ".strtolower("MsJurusan")." ORDER BY IDJurusan");
                return $query->result();
        }

        function GetComboMsJurusanByIDStatusPendidikan($id)
        {
                $this->db->select('a.IDjurusan, a.Jurusan, a.IDStatusPendidikan, b.NamaStatusPendidikan');
                $this->db->from('msjurusan AS a');
                $this->db->join('msstatuspendidikan AS b', 'a.IDStatusPendidikan = b.IDStatusPendidikan');
                $this->db->where('a.IDStatusPendidikan', $id);
                $this->db->order_by('a.IDStatusPendidikan', 'desc');
                return $this->db->get()->result();
        }

        function CekNamaJurusan($jurusan,$idjurusan, $idstatuspendidikan = NULL)
        {
                $this->db->select('IDjurusan');
                $this->db->from(strtolower('MsJurusan'));
                $this->db->where('Jurusan', $jurusan);
                if ($idjurusan != NULL)
                {
                        $this->db->where('IDjurusan != ', $idjurusan);
                }
                if ($idstatuspendidikan != NULL) {
                        $this->db->where('IDStatusPendidikan', $idstatuspendidikan);
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
                $query = $this->db->query("SELECT IDjurusan FROM ".strtolower("MsJurusan")." WHERE IDjurusan!='999999' ORDER BY IDjurusan DESC LIMIT 1");
                if ($query->num_rows() > 0)
                {
                        $getdata = $query->row();
                        $GetLastID = (int)$getdata->IDjurusan;
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

        function Insert($data = array())
        {
                $save['IDjurusan'] = $this->GetLastID();
                $save['IDStatusPendidikan'] = $data['IDStatusPendidikan'];
                $save['Jurusan'] = $data['Jurusan'];
                $this->db->insert('msjurusan', $save);
                
                if ($this->db->affected_rows() > 0)
                {
                        return $save['IDjurusan'];
                }
                else
                {
                        return NULL;
                }
        }

        function Update($input,$idjurusan)
        {
                $save['Jurusan'] = $input['NamaJurusan'];
                $save['IDStatusPendidikan'] = $input['IDStatusPendidikan'];
                $this->db->where('IDjurusan', $idjurusan);
                $this->db->update('msjurusan', $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idjurusan)
        {
                $this->db->where('IDjurusan', $idjurusan);
                $this->db->delete(strtolower(('MsJurusan')));
                return $this->db->affected_rows() != -1;
        }

        function GetJurusanByIDStatusPendidikan($id)
        {
                $this->db->select('IDJurusan, Jurusan');
                $this->db->from('msjurusan');
                $this->db->where('IDStatusPendidikan', $id);
                $this->db->order_by('Jurusan');
                return $this->db->get()->result();
        }

        function GetByIDStatusPendidikan($id)
        {
                $this->db->select('IDJurusan, Jurusan');
                $this->db->from('msjurusan');
                $this->db->where('IDStatusPendidikan', $id);
                $this->db->order_by('Jurusan');
                return $this->db->get();
        }

}

?>