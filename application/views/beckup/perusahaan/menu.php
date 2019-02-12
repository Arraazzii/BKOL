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
                                                                <a href="<?= site_url() ?>">PROFIL PERUSAHAAN</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('pemberikerja') ?>">PROFIL PEMBERI KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('perusahaan/lowongan') ?>">DAFTAR LOWONGAN KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('perusahaan/statuslowongan') ?>">DAFTAR STATUS LOWONGAN KERJA</a>
                                                        </li>
                                                        <li>
                                                                <a href="<?= site_url('ubahsandi') ?>">UBAH KATA SANDI</a>
                                                        </li>
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
