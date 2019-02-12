<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
        <tr>
                <td align="center">
                        <table id="statistik" width="100%" class="table-form">
                                <tbody>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                DATA STATISTIK
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
                                                                PERIODE BULAN
                                                                <select id="idbulan" name="idbulan">
                                                                        <option value="">(Pilih Bulan)</option>
                                                                        <?php
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
                                                                        foreach ($bulan as $key => $value)
                                                                        {
                                                                                if ($key == $this->uri->segment(3))
                                                                                {
                                                                                        echo "<option value='".$key."' selected=\"selected\">".$value."</option>";
                                                                                }
                                                                                else
                                                                                {
                                                                                        echo "<option value='".$key."'>".$value."</option>";
                                                                                }
                                                                        }
                                                                        ?>
                                                                </select>
                                                                TAHUN
                                                                <select id="tahun" name="tahun">
                                                                        <?php
                                                                        $tahun = date('Y');
                                                                        for ($i=$tahun;$i+10>$tahun;$i--)
                                                                        {
                                                                                if ($i == $this->uri->segment(2))
                                                                                {
                                                                                        echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                                                                }
                                                                                else
                                                                                {
                                                                                        echo "<option value='".$i."'>".$i."</option>";
                                                                                }
                                                                        }
                                                                        ?>
                                                                </select>
                                                                <a class="button" onclick="GetStatistic()">Cari</a>
                                                                <?php
                                                                        $idjenisuser = $this->session->userdata('idjenisuser');
                                                                        if ($idjenisuser != NULL)
                                                                        {
                                                                                if ($idjenisuser == "000000")
                                                                                {
                                                                                        echo '<a class="button" onclick="printpage()">Cetak<a/>';
                                                                                }
                                                                        }
                                                                ?>
                                                        </div>
                                                        <div align="center">
                                                                <table class="table-form" width="500px">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <th align="left" valign="top">
                                                                                                KECAMATAN
                                                                                        </th>
                                                                                        <th align="left" valign="top">
                                                                                                LAKI-LAKI
                                                                                        </th>
                                                                                        <th align="left" valign="top">
                                                                                                PEREMPUAN
                                                                                        </th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td align="left" valign="top">
                                                                                                Cikarang
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                                0
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                                0
                                                                                        </td>
                                                                                </tr>
                                                                                <?php
                                                                                        $TotalPria = 0;
                                                                                        $TotalWanita = 0;
                                                                                        foreach ($MsKecamatanData as $getcmb)
                                                                                        {
                                                                                                $TotalPria+=$getcmb->TotalPria;
                                                                                                $TotalWanita+=$getcmb->TotalWanita;
                                                                                                echo "<tr>
                                                                                                        <td align=\"left\" valign=\"top\">
                                                                                                                ".$getcmb->NamaKecamatan."
                                                                                                        </td>
                                                                                                        <td align=\"left\" valign=\"top\">
                                                                                                                ".$getcmb->TotalPria."
                                                                                                        </td>
                                                                                                        <td align=\"left\" valign=\"top\">
                                                                                                                ".$getcmb->TotalWanita."
                                                                                                        </td>
                                                                                                </tr>";
                                                                                        }
                                                                                ?>
                                                                        <tfoot
                                                                                <tr>
                                                                                        <th align="left" valign="top">
                                                                                                TOTAL
                                                                                        </th>
                                                                                        <th align="left" valign="top">
                                                                                                <?= $TotalPria ?> Orang
                                                                                        </th>
                                                                                        <th align="left" valign="top">
                                                                                                <?= $TotalWanita ?> Orang
                                                                                        </th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th align="left" valign="top">
                                                                                                TOTAL SELURUHNYA
                                                                                        </th>
                                                                                        <th align="left" valign="top" colspan="2">
                                                                                                <?= $TotalPria+$TotalWanita ?> Orang
                                                                                        </th>
                                                                                </tr>
                                                                        </tfoot>
                                                                </table>
                                                        </div>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
<script>
function GetStatistic()
{
        window.location.replace('<?= site_url('statistik') ?>/'+$("#tahun").val()+'/'+$("#idbulan").val());
}
function printpage()
{
        w=window.open();
        w.document.write($('#statistik').html());
        w.print();
        w.close();
}
</script>
