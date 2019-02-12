<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
        <?php
                $iduser = $this->session->userdata('iduser');
                $idjenisuser = $this->session->userdata('idjenisuser');
                if ($iduser == "")
                {
                        $this->load->view('master/menu');
                        $this->load->view('master/menu_register');
                }
                else
                {
                        if ($idjenisuser == "000000")
                        {
                                $this->load->view('admin/menu');
                                $this->load->view('master/menu');
                        }
                        else if ($idjenisuser == "000001")
                        {
                                $this->load->view('perusahaan/menu');
                                $this->load->view('master/menu');
                        }
                        else if ($idjenisuser == "000002")
                        {
                                $this->load->view('pencaker/menu');
                                $this->load->view('master/menu');
                        }
                        else
                        {
                                redirect("logout");
                        }
                }
                //$this->load->view('master/menu_kategori');
                $this->load->view('master/messenger');
                $this->load->view('master/webstatistik');
                $this->load->view('master/pooling');
                $this->load->view('master/linksite');
        ?>
</table>