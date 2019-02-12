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
                                                <th align="center">
                                                        <div align="center">
                                                                LIHAT BERITA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
                                                        <?php
                                                                if ($this->session->flashdata('error') != null){
                                                                    echo $this->session->flashdata('error');
                                                                }
                                                        ?>
                                                        </div>
                                                        <div align="left">
                                                                <?php
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
                                                                        $tglberita = explode("-", $MsBeritaData->TglBerita);
                                                                        $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
                                                                        echo '</b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i></b>';
                                                                ?>
                                                        </div>
                                                        <div align="center">
                                                                <p><b><font size="6" style="line-height: 100%;"><?= $MsBeritaData->JudulBerita ?></font></b><p>
                                                        </div>
                                                        <div align="center" >
                                                                <img src="<?= site_url('assets/file/berita/'.$MsBeritaData->IDBerita.'.jpg') ?>" style="max-width: 800px; max-height: 300px;">
                                                        </div>
                                                        <div align="left" >
                                                                <p><font size="2" style="line-height: 100%;"><?= $MsBeritaData->IsiBerita ?></font><p>
                                                        </div>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
