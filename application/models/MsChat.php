<?php

class MsChat extends CI_Model
{


        function GetBypengirim($idpengirim)
        {
                $data=$this->db->order_by('date','ASC');
                $data=$this->db->where('pengirim',$idpengirim)->or_where("penerima",$idpengirim);
                $data=$this->db->get('mschat');
                return $data;
        }

        function GetJumChat($idpenerima)
        {
                        //$data=$this->db->order_by('date','ASC');
                $data=$this->db->where('penerima',$idpenerima);
                $data=$this->db->where('status',"D");
                $data=$this->db->get('mschat');
                return $data->num_rows();
        }
        function GetJumChatPeng($pengirim)
        {
                        //$data=$this->db->order_by('date','ASC');
                $data=$this->db->where('pengirim',$pengirim);
                $data=$this->db->where('status',"D");
                $data=$this->db->get('mschat');
                return $data->num_rows();
        }

        function get_chatadmin(){
                $query="SELECT DISTINCT mschat.pengirim FROM mschat WHERE mschat.pengirim != 'admin' ORDER BY pengirim DESC";
                $data= $this->db->query($query);
                return $data;
        }

        function Insert($data)
        {
                $this->db->insert(strtolower('MsChat'), $data);
                if ($this->db->affected_rows() > 0)
                {
                        return TRUE;
                }
                else
                {
                        return NULL;
                }
        }

        function Read_user($idpencaker)
        {
                $save['status'] = "R";
                $this->db->where('penerima', $idpencaker);
                $this->db->where('status', "D");
                $this->db->update(strtolower('MsChat'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Read_admin($idpencaker)
        {
                $save['status'] = "R";
                $this->db->where('penerima', 'admin');
                $this->db->where('pengirim', $idpencaker);
                $this->db->where('status', "D");
                $this->db->update(strtolower('MsChat'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Update($input, $idbahasa, $idpencaker)
        {
                $save['NamaBahasa'] = $input['NamaBahasa'];
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->where('IDBahasa', $idbahasa);
                $this->db->update(strtolower('MsBahasa'), $save);
                return $this->db->affected_rows() != -1;
        }

        function Delete($idbahasa, $idpencaker)
        {
                $this->db->where('IDPencaker', $idpencaker);
                $this->db->where('IDBahasa', $idbahasa);
                $this->db->delete(strtolower(('MsBahasa')));
                return $this->db->affected_rows() != -1;
        }

}

?>