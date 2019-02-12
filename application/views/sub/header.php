<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
$hari = array(
"1" => "Senin",
"2" => "Selasa",
"3" => "Rabu",
"4" => "Kamis",
"5" => "Jumat",
"6" => "Sabtu",
"7" => "Minggu"
);
$bulan = array(
"01" => "Januari",
"02" => "Februari",
"03" => "Maret",
"04" => "April",
"05" => "Mei",
"06" => "Juni",
"07" => "Juli",
"08" => "Agustus",
"09" => "September",
"10" => "Oktober",
"11" => "November",
"12" => "Desember"
);
?>
<div align="center" class="header roundedCorners">
</div>
<div align="center" style="height: 20px;">
        <table width="100%">
                <tr>
                        <td align="center" valign="top">
                                <marquee>
                                        <b>SELAMAT DATANG DI LAYANAN BURSA KERJA ONLINE DINAS TENAGA KERJA PEMERINTAH KOTA DEPOK </b>
                                </marquee> 
                        </td>
                        <td align="right" valign="top" nowrap="nowrap">
                                <?= $hari[date('N')].', '.(int)date('d').' '.$bulan[date('m')].' '.date('Y') ?>
                        </td>
                </tr>
        </table>
</div>