<?php 
$this->_ci=&get_instance();     
$this->_ci->load->model('MsChat');
$jum_chat=$this->_ci->MsChat->GetJumChat($this->session->userdata('iduser'));
?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<tr>
        <td align="center">
                <table width="100%" class="table-form">
                        <tr>
                                <th align="left">
                                        <div align="center">
                                                MENU PENGGUNA
                                        </div>
                                </th>
                        </tr>
                        <tr>
                                <td align="left">
                                        <div id="mega-1" class="mega-menu">
                                                <ul>
                                                        <li>
                                                                <a href="<?= site_url() ?>">PROFIL</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('pencaker/lowongan') ?>">DAFTAR LOWONGAN KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('pencaker/perusahaan') ?>">DAFTAR PERUSAHAAN</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('ubahsandi') ?>">UBAH KATA SANDI</a>
                                                        </li>
                                                        <!-- <li>
                                                                <a href="<?= site_url('pencaker/chat') ?>">PESAN ADMINISTRATOR  
                                                                        <?php if($jum_chat>0){?> <b>(<?php echo $jum_chat;?>)</b><?php } ?></a>
                                                        </li> -->
                                                        <li>
                                                                <a href="<?= site_url('logout') ?>">LOGOUT</a>
                                                        </li>
                                                </ul>
                                        </div>
                                </td>
                        </tr>
                </table>
        </td>
</tr>