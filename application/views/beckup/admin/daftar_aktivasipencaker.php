<!--
To change this template, choose Tools | Templates
and open the template in the viewor.
-->
<!DOCTYPE html>
<table width="100%">
        <tr>
                <td align="center">
                        <table width="100%" class="table-form">
                                <thead>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                DAFTAR AKTIVASI PENCARI KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td align="center">
                                                        <input id="idpencaker" name="idpencaker" type="hidden" />
                                                        <div id="dialog-confirm" title="Aktivasi Pencari Kerja">
                                                                Aktifkan Pencari Kerja?
                                                        </div>
                                                        <div align="center">
<?php

$this->load->library('table');

$this->table->set_heading(
        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Nomor Induk Pencaker', 'style'=>'text-align:center;'),
        array('data'=>'Nama Lengkap', 'style'=>'text-align:center;'),
        array('data'=>'Pendidikan Terakhir', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Berakhir', 'style'=>'text-align:center;'),
        array('data'=>'Tgl Aktivasi', 'style'=>'text-align:center;'),
        array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
);
if ($this->pagination->total_rows > 0)
{
        $i = 0;
        foreach ($MsAktivasiData as $getdata)
        {
                $i++;
                $submitbtn = '<a class="button" onclick=DoActivateConfirm(\''.$getdata->IDPencaker.'\') ">Aktifkan</a>';
                $expireddate = explode("-", $getdata->ExpiredDate);
                $activationdate = explode("-", substr($getdata->RegisterDate,0,10));
                $this->table->add_row(
                        array('data'=>$i+$this->uri->segment(4)),
                        array('data'=>$getdata->NomorIndukPencaker),
                        array('data'=>$getdata->NamaPencaker),
                        array('data'=>$getdata->NamaStatusPendidikan),
                        array('data'=>$expireddate[2].'-'.$expireddate[1].'-'.$expireddate[0], 'style'=>'text-align:center;'),
                        array('data'=>$activationdate[2].'-'.$activationdate[1].'-'.$activationdate[0], 'style'=>'text-align:center;'),
                        array('data'=>$submitbtn, 'style'=>'text-align:center;')
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

function DoActivateConfirm(IDPencaker)
{
        $.get('<?= site_url('admin/pencaker/getdata') ?>/'+IDPencaker,
        function(getdata)
        {
                if (getdata.exists)
                {
                        $('#idpencaker').val(getdata.IDPencaker);
                        $("#dialog-confirm").html('Aktifkan Pencaker '+getdata.NamaPencaker+'?');
                        $("#dialog-confirm").dialog("open");
                }
                else
                {
                        alert('Pencaker tidak ditemukan');
                }
        },'json')
}

$("#dialog-confirm").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
                "Aktifkan" : function() {
                        DoActive();
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});

function DoActive()
{
        $.post('<?= site_url('admin/pencaker/aktivasi') ?>',
        {
                IDPencaker: $("#idpencaker").val()
        },
        function(getdata){
                if (getdata.valid)
                {
                        $("#dialog-confirm").dialog("close");
                        window.location.reload();
                }
                else
                {
                        $("#dialog-confirm").dialog("close");
                        window.location.reload();
                }
        },'json');
}
</script>
