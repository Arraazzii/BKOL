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
                                                                PROFIL PERUSAHAAN
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top" width="120px">
                                                        Nama Perusahaan
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->NamaPerusahaan ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Bidang Perusahaan
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->NamaBidangPerusahaan ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Email
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->Email ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Telepon
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->Telepon ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Alamat
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->Alamat ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Kelurahan
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->NamaKelurahan ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Kecamatan
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->NamaKecamatan ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Kode Pos
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->KodePos ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Kota/Kabupaten
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->Kota ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Propinsi
                                                </td>
                                                <td align="left" valign="top">
                                                        <?= $MsPerusahaanData->Propinsi ?>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                </td>
                                                <td align="left" valign="top">
                                                        <a class="button" href="<?= site_url('perusahaan/edit') ?>">Edit</a>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
