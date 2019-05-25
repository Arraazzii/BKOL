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
<tr>
    <td align="center">
        <table width="100%" class="table-form">
            <tr>
                <th align="left">
                    <div align="center">
                        STATISTIK PENGUNJUNG
                    </div>
                </th>
            </tr>
            <tr>
                <td align="left">
                    <div align="left">
                        <table>
                            <tr>
                                <td>
                                    Jumlah Online
                                </td>
                                <td>
                                    <label id="Online">0</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jumlah Kunjungan
                                </td>
                                <td>
                                    <label id="TotalVisited">0</label>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </td>
</tr>
<script>
    $.post('<?= site_url('updatewebstatistic') ?>');
    $.get('<?= site_url('getwebstatistic') ?>',
        function(getdata)
        {
            $("#Online").text(getdata.Online);
            $("#TotalVisited").text(getdata.TotalVisited);
        },'json')
    </script>