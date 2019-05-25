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
                                                <th align="center" colspan="3">
                                                        <div align="center">
                                                                PROFIL PENCARI KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top" rowspan="4" width="120px">
                                                        <img src="<?php echo base_url().'assets/file/pencaker/'.$MsPencakerData->IDPencaker.'.jpg';?>" width="120px" height="160px">
                                                </td>
                                                <td align="left" valign="top" width="140px">
                                                        No Pendaftaran
                                                </td>
                                                <td align="left" valign="top">
                                                        <label id="idpencaker"><?= $MsPencakerData->IDPencaker ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Nomor Induk Pencaker
                                                </td>
                                                <td align="left" valign="top">
                                                        <label id="nomorindukpencaker"><?= $MsPencakerData->NomorIndukPencaker ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Nama Pencari Kerja
                                                </td>
                                                <td align="left" valign="top">
                                                        <label id="namapencaker"><?= $MsPencakerData->NamaPencaker ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" valign="top">
                                                        Jenis Kelamin
                                                </td>
                                                <td align="left" valign="top">
                                                        <label id="jeniskelamin"><?= !$MsPencakerData->JenisKelamin ? 'Pria' : 'Wanita' ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Tempat/Tanggal Lahir
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="tempattgllahir">
                                                                <?php
                                                                $tgllahir = explode("-", $MsPencakerData->TglLahir);
                                                                $bulan = array(
                                                                        "Januari",
                                                                        "Februari",
                                                                        "Maret",
                                                                        "April",
                                                                        "Mei",
                                                                        "Juni",
                                                                        "Juli",
                                                                        "Agustus",
                                                                        "September",
                                                                        "Oktober",
                                                                        "November",
                                                                        "Desember"
                                                                );
                                                                ?>
                                                                <?= $MsPencakerData->TempatLahir.', '.(int)$tgllahir[2].' '.$bulan[$tgllahir[1]-1].' '.$tgllahir[0] ?>
                                                        </label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Email
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="email"><?= $MsPencakerData->Email ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Telepon
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="telepon"><?= $MsPencakerData->Telepon ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Alamat
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="alamat"><?= $MsPencakerData->Alamat ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Kelurahan
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="namakelurahan"><?= $MsPencakerData->NamaKelurahan ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Kecamatan
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="namakecamatan"><?= $MsPencakerData->NamaKecamatan ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Kode Pos
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="kodepos"><?= $MsPencakerData->KodePos ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Kewarganegaraan
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="jeniskelamin"><?= $MsPencakerData->Kewarganegaraan == 0 ? 'WNI' : 'WNA' ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Agama
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="namagama"><?= $MsPencakerData->NamaAgama ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td nowrap="nowrap" align="left" valign="top">
                                                        Status Pernikahan
                                                </td>
                                                <td align="left" valign="top" colspan="2">
                                                        <label id="namastatuspernikahan"><?= $MsPencakerData->NamaStatusPernikahan ?></label>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" colspan="2">
                                                        <a class="button" href="<?php echo base_url();?>pencaker/edit">Detail Profil</a>
                                                        <a class="button" href="<?php echo base_url();?>pencaker/editcv">Detail CV</a>
                                                </td>
                                        </tr>
                                        <tr>
                                                <th align="center" colspan="3">
                                                        <div align="center">
                                                                PENGUASAAN BAHASA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="left" colspan="2">
                                                        <div align="left">
                                                                <?php
                                                                if ($MsBahasaData->num_rows > 0)
                                                                {
                                                                        echo '<ul>';
                                                                        foreach ($MsBahasaData->result() as $getdata)
                                                                        {
                                                                                echo '<li>'.$getdata->NamaBahasa.'</li>';
                                                                        }
                                                                        echo '</ul>';
                                                                }
                                                                else
                                                                {
                                                                        echo 'belum ada data';
                                                                }
                                                                ?>
                                                        </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="left" colspan="3">
                                                        <a class="button" href="<?php echo base_url();?>pencaker/editbahasa">Detail Bahasa</a>
                                                </td>
                                        </tr>
                                        <tr>
                                                <th align="center" colspan="3">
                                                        <div align="center">
                                                                PENGALAMAN KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="left" colspan="3">
                                                        <div align="left">
                                                                <?php
                                                                if ($MsPengalamanData->num_rows > 0)
                                                                {
                                                                        echo '<div>';
                                                                        $i = 0;
                                                                        foreach ($MsPengalamanData->result() as $getdata)
                                                                        {
                                                                                $i++;
                                                                                echo '<table>';
                                                                                echo '<tr>';
                                                                                echo '<td align="left">'.$i.'</td>';
                                                                                echo '<td align="left">Jabatan</td>';
                                                                                echo '<td align="left">'.$getdata->Jabatan.'</td>';
                                                                                echo '</tr>';
                                                                                
                                                                                // echo '<tr>';
                                                                                // echo '<td align="left"></td>';
                                                                                // echo '<td align="left">Uraian Tugas</td>';
                                                                                // echo '<td align="left">'.$getdata->UraianKerja.'</td>';
                                                                                // echo '</tr>';
                                                                                
                                                                                echo '<tr>';
                                                                                echo '<td align="left"></td>';
                                                                                echo '<td align="left">Lama Bekerja</td>';
                                                                                $interval = date_diff(date_create($getdata->TglMasuk), date_create($getdata->TglBerhenti));
                                                                                $out = $interval->format("Years:%Y,Months:%M,Days:%d");
                                                                                $result = array();
                                                                                array_walk(explode(',',$out),
                                                                                        function($val,$key) use(&$result){
                                                                                            $v=explode(':',$val);
                                                                                            $result[$v[0]] = $v[1];
                                                                                    });
                                                                                echo '<td align="left">'.((int)$result['Years'] > 0 ? (int)$result['Years'].' tahun' : '').((int)$result['Months'] > 0 ? ' '.(int)$result['Months'].' bulan' : ((int)$result['Days'] > 0 ? ' '.(int)$result['Days'].' hari' : ' 0 hari')).'</td>';
                                                                                echo '</tr>';
                                                                                
                                                                                echo '<tr>';
                                                                                echo '<td align="left"></td>';
                                                                                echo '<td align="left">Nama Perusahaan</td>';
                                                                                echo '<td align="left">'.$getdata->NamaPerusahaan.'</td>';
                                                                                echo '</tr>';
                                                                                echo '</table>';
                                                                        }
                                                                        echo '</div>';
                                                                }
                                                                else
                                                                {
                                                                        echo 'belum ada data';
                                                                }
                                                                ?>
                                                        </div>
                                                </td>
                                        </tr>
                                        <!-- <tr>
                                                <td align="left" colspan="3">
                                                        <a class="button" href="<?php echo base_url();?>pencaker/editpengalaman">Detail Pengalaman</a>
                                                </td>
                                        </tr> -->
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
