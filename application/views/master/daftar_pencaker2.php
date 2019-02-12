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
                                                                DAFTAR PENCARI KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="left">
                                                                <form method="post" action="<?= site_url('datapencaker') ?>">
                                                                        <table>
                                                                                <tr>
                                                                                        <td align="left">
                                                                                                PERIODE
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <input id="fromdate" name="fromdate" type="text" value="<?= $fromdate != '' ? $fromdate : date('d-m-').(date('Y')-1) ?>" size="10" maxlength="10" readonly="true">
                                                                                                s/d
                                                                                                <input id="todate" name="todate" type="text" value="<?= $todate != '' ? $todate : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                                                                                                <input id="cari" name="cari" type="submit" value="Cari">
                                                                                        </td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td align="left">
                                                                                                Laki-laki
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <?= $TotalPria ?> Orang
                                                                                        </td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td align="left">
                                                                                                Perempuan
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <?= $TotalWanita ?> Orang
                                                                                        </td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td align="left">
                                                                                                Jumlah Pencari Kerja
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <?= $TotalPria+$TotalWanita ?> Orang
                                                                                        </td>
                                                                                </tr>
                                                                        </table>
                                                                </form>
                                                        </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
<?php

$this->load->library('table');

$this->table->set_heading(
        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Nomor Induk Pencaker', 'style'=>'text-align:center;'),
        array('data'=>'Nama Lengkap', 'style'=>'text-align:center;'),
        array('data'=>'Pendidikan Terakhir', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Berlaku', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Berakhir', 'style'=>'text-align:center;'),
        array('data'=>'Status', 'style'=>'text-align:center;')
);
if ($MsPencakerData->num_rows > 0)
{
        $i = 0;
        foreach ($MsPencakerData->result() as $getdata)
        {
                $i++;
                $fromdate = explode("-", substr($getdata->RegisterDate,0,10));
                $todate = explode("-", $getdata->ExpiredDate);
                $this->table->add_row(
                        array('data'=>$i+$this->uri->segment(3)),
                        array('data'=>$getdata->NomorIndukPencaker),
                        array('data'=>$getdata->NamaPencaker),
                        array('data'=>$getdata->NamaStatusPendidikan),
                        array('data'=>$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0], 'style'=>'text-align:center;'),
                        array('data'=>$todate[2].'-'.$todate[1].'-'.$todate[0], 'style'=>'text-align:center;'),
                        array('data'=>(date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? 'Aktif' : 'Tidak Aktif'), 'style'=>'text-align:center;')
                );
        }
}
else
{
        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>6));
}
$tmpl = array (
                'table_open'          => '<table width="100%" cellpadding="2" cellspacing="1" class="table-form">',

                'heading_row_start'   => '<tr>',
                'heading_row_end'     => '</tr>',
                'heading_cell_start'  => '<th>',
                'heading_cell_end'    => '</th>',

                'row_start'           => '<tr>',
                'row_end'             => '</tr>',
                'cell_start'          => '<td nowrap="nowrap" align="left" valign="top">',
                'cell_end'            => '</td>',

                'row_alt_start'       => '<tr>',
                'row_alt_end'         => '</tr>',
                'cell_alt_start'      => '<td align="left" valign="top">',
                'cell_alt_end'        => '</td>',

                'table_close'         => '</table>'
);
$this->table->set_template($tmpl); 
echo $this->table->generate();
$this->table->clear();

echo $this->pagination->create_links();
?>
                                                        </div>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>

<script>
$(document).ready(function(){
        $("#fromdate").datepicker({
                constrainInput: true,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                defaultDate: new Date(1990, 1 - 1, 1),
                minDate: new Date(1970, 1 - 1, 1),
                maxDate: new Date(),
                onSelect: function(dateText, instance)
                {
                        //alert(dateText);
                },
                onClose: function()
                {
                    //this.focus();
                }
        });
        $("#todate").datepicker({
                constrainInput: true,
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                defaultDate: new Date(1990, 1 - 1, 1),
                minDate: new Date(1970, 1 - 1, 1),
                maxDate: new Date(),
                onSelect: function(dateText, instance)
                {
                        //alert(dateText);
                },
                onClose: function()
                {
                    //this.focus();
                }
        });
        
        function getFormattedDate(date) {
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear().toString();
                return day + '-' + month + '-' + year;
        }
});
</script>