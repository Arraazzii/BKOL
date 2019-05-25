<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:site_name" content="BKOL DEPOK">
<meta property="og:title" content="Bursa Lowongan Kerja Online KOTA DEPOK" />
<meta property="og:description" content="Lowongan Dan Data Pekerjaan Kota Depok" />
<meta property="og:image" itemprop="image" content="<?php echo site_url();?>assets/depok.png">
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
<table width="100%" class="table-form">
    <tr>
        <th align="left">
            <div align="center">
                LOWONGAN KERJA LUAR DEPOK
            </div>
        </th>
    </tr>
    <tr>
        <td align="left">
            <?php
            if ($CountMsBeritaData > 0)
            {
                echo '<ul>';
                foreach ($MsBeritaData as $getdata)
                {
                    $hari = array(
                        "0" => "Minggu",
                        "1" => "Senin",
                        "2" => "Selasa",
                        "3" => "Rabu",
                        "4" => "Kamis",
                        "5" => "Jumat",
                        "6" => "Sabtu"
                    );
                    $bulan = array(
                        "1" => "Januari",
                        "2" => "Februari",
                        "3" => "Maret",
                        "4" => "April",
                        "5" => "Mei",
                        "6" => "Juni",
                        "7" => "Juli",
                        "8" => "Agustus",
                        "9" => "September",
                        "10" => "Oktober",
                        "11" => "November",
                        "12" => "Desember"
                    );
                    $tglberita = explode("-", $getdata->TglBerita);
                    $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
                    echo '<li>
                    <font size="1">
                    <b>Lowongan Kerja : </b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i><br /><a href="'.site_url('berita/view').'/'.$getdata->IDBerita.'">'.$getdata->JudulBerita.'</a></font>';
                    echo '</li>';
                }
                echo '</ul>';
                echo '<div align="left"><a href="'.site_url('berita').'">Selengkapnya</a></div>';
            }
            else
            {
                echo '<div align="center">belum ada data</div>';
            }
            ?>
        </td>
    </tr>
</table>
