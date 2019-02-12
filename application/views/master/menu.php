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
                                                MENU UMUM
                                        </div>
                                </th>
                        </tr>
                        <tr>
                                <td align="left">

                                        <div id="mega-1" class="mega-menu">
                                                <ul>
                                                        <?php
                                                        $iduser = $this->session->userdata('iduser');
                                                        if ($iduser == "")
                                                        {
                                                        ?>
                                                        <li>
                                                                <a href="<?php echo site_url() ?>">BERANDA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('dataperusahaan') ?>">DAFTAR PERUSAHAAN</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('datapencaker') ?>">DAFTAR PENCARI KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('datalowongan') ?>">DAFTAR LOWONGAN KERJA</a>
                                                        </li>
                                                        <?php  
                                                        }
                                                        ?>
                                                        <li>
                                                                <a href="<?= site_url('persyaratan') ?>">PERSYARATAN PENCARI KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('statistik') ?>">STATISTIK</a>
                                                        </li>
                                                        <?php
                                                        if ($iduser == "")
                                                        {
                                                        ?>
                                                        <li>
                                                                <a href="<?= site_url('login') ?>">LOGIN</a>
                                                        </li>
                                                        <?php  
                                                        }
                                                        ?>
                                                </ul>
                                        </div>
                                </td>
                        </tr>
                </table>
        </td>
</tr>