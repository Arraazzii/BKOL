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
                                                                DAFTAR LOWONGAN KERJA PERUSAHAAN
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="left">
                                                                <form method="post" action="<?= site_url('admin/perusahaan/'.$IDPerusahaan.'/carilowongan') ?>">
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
                                                                                                Nama Perusahaan
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <?= $MsPerusahaan->NamaPerusahaan ?>
                                                                                        </td>
                                                                                </tr>
                                                                        </table>
                                                                </form>
                                                        </div>
                                                        <div align="left">
                                                                <a href="<?= site_url('admin/perusahaan/'.$IDPerusahaan.'/lowongan/tambahdata') ?>" class="button">Tambah Lowongan</a>
                                                                <a href="<?= site_url('admin/perusahaan') ?>" class="button">Kembali</a>
                                                        </div>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
<?php
$this->table->set_heading(
        array('data'=>'No Loker', 'style'=>'width:60px; text-align:center;'),
        array('data'=>'Nama Pekerjaan', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Berlaku', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Berakhir', 'style'=>'text-align:center;'),
        array('data'=>'Status', 'style'=>'text-align:center;'),
        array('data'=>'Pria', 'style'=>'text-align:center;'),
        array('data'=>'Wanita', 'style'=>'text-align:center;'),
        array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
);
if ($MsLowonganData->num_rows > 0)
{
        foreach ($MsLowonganData->result() as $getdata)
        {
                $this->table->add_row(
                        array('data'=>$getdata->IDLowongan),
                        array('data'=>$getdata->NamaLowongan),
                        array('data'=>$getdata->TglBerlaku, 'style'=>'text-align:center;'),
                        array('data'=>$getdata->TglBerakhir, 'style'=>'text-align:center;'),
                        array('data'=>(date("Ymd") >= str_replace('-','',$getdata->TglBerlaku) && date("Ymd") <= str_replace('-','',$getdata->TglBerakhir) ? 'Aktif' : 'Tidak Aktif'), 'style'=>'text-align:center;'),
                        array('data'=>$getdata->JmlPria, 'style'=>'text-align:center;'),
                        array('data'=>$getdata->JmlWanita, 'style'=>'text-align:center;'),
                        array('data'=>'<a href="'.site_url('admin/perusahaan/'.$IDPerusahaan.'/lowongan/detail/'.$getdata->IDLowongan).'" class="button">Detail</a>', 'style'=>'text-align:center;')
                );
        }
}
else
{
        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>8));
}
$tmpl = array ( 'table_open'  => '<table width="100%" cellpadding="2" cellspacing="1" class="table-form">' );
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