<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
        <tr>
                <td align="center">
                        <table width="100%" class="table-form">
                                <tbody>
                                        <tr>
                                                <th align="center" colspan="2">
                                                        <div align="center">
                                                                PROFIL PEMBERI KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top" width="120px">
                                                        Nama Pemberi Kerja
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->NamaPemberiKerja ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Jabatan
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->JabatanPemberiKerja ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Telepon
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->TeleponPemberiKerja ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Email
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->EmailPemberiKerja ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                </td>
                                                <td align="left" valign="top">
                                                        <a class="button" href="<?= site_url('pemberikerja/edit') ?>">Edit</a>
                                                </td>
                                        </tr>
                                        <tbody>
                                        </table>
                                </td>
                        </tr>
                </table>
