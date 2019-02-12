<?php
        $iduser = $this->session->userdata('iduser');
        $idjenisuser = $this->session->userdata('idjenisuser');
        if ($iduser == "")
        {
                $this->load->view('master/menu2');
        }
        else
        {
                if ($idjenisuser == "000000")
                {
                        $this->load->view('admin/menu2');
                        $this->load->view('master/menu2');
                }
                else if ($idjenisuser == "000001")
                {
                        $this->load->view('perusahaan/menu2');
                        $this->load->view('master/menu2');
                }
                else if ($idjenisuser == "000002")
                {
                        $this->load->view('pencaker/menu2');
                        $this->load->view('master/menu2');
                }
                else
                {
                        redirect("logout");
                }
        }
?>