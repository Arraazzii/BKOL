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
                                                                DAFTAR BERITA
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
                                                                <button id="tambahberita">Tambah Berita</button>
                                                        </div>
                                                        <input id="idberita" name="idberita" type="hidden" />
                                                        <div id="dialog-add" title="Tambah Berita">
                                                                <table width="100%">
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Judul Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="judulberita" name="judulberita" class="text ui-widget-content ui-corner-all" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Tanggal Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="tglberita" name="tglberita" type="text" size="10" maxlength="10" readonly="true">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Isi Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <textarea id="isiberita" name="isiberita" class="text ui-widget-content ui-corner-all" type="text" cols="70" rows="15" maxlength="2000"></textarea>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top" colspan="2">
                                                                                        <div id="warning" align="center">
                                                                                        </div>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                        </div>
                                                        <div id="dialog-edit" title="Edit Berita">
                                                                <table width="100%">
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Judul Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="judulberita_edit" name="judulberita_edit" class="text ui-widget-content ui-corner-all" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Tanggal Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="tglberita_edit" name="tglberita_edit" type="text" size="10" maxlength="10" readonly="true">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Isi Berita
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <textarea id="isiberita_edit" name="isiberita_edit" class="text ui-widget-content ui-corner-all" type="text" cols="70" rows="15" maxlength="2000"></textarea>
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top" colspan="2">
                                                                                        <div id="warning_edit" align="center">
                                                                                        </div>
                                                                                </td>
                                                                        </tr>
                                                                </table>
                                                        </div>
                                                        <div id="dialog-delete" title="Hapus Berita">
                                                                Hapus Berita?
                                                        </div>
                                                        <div align="center">
<?php

$this->load->library('table');
$this->table->set_heading(
        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Tanggal Berita', 'style'=>'text-align:center;'),
        array('data'=>'Judul Berita', 'style'=>'text-align:center;'),
        array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
);
if ($this->pagination->total_rows > 0)
{
        $i = 0;
        foreach ($MsBeritaData as $getdata)
        {
                $i++;
                $uploadbtn = '<a class="button" href="'.site_url('admin/berita/foto')."/".$getdata->IDBerita.'" ">Foto</a>';
                $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDBerita.'\') ">Detail</a>';
                $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDBerita.'\') ">Hapus</a>';
                $this->table->add_row(
                        array('data'=>$i+$this->uri->segment(3)),
                        array('data'=>$getdata->TglBerita),
                        array('data'=>$getdata->JudulBerita),
                        array('data'=>$uploadbtn.$detailbtn.$deletebtn, 'style'=>'text-align:center;')
                );
        }
}
else
{
        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>4));
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
$("#tglberita").datepicker({
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
$("#tglberita_edit").datepicker({
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

$("#tambahberita").button().click(function(e){
        e.preventDefault();
        ClearAddInput();
        $("#dialog-add").dialog("open");
});

$("#dialog-add").dialog({
        autoOpen: false,
        width: 700,
        modal: true,
        buttons: {
                "Simpan" : function() {
                        if ($("#tglberita").val() == '')
                        {
                                ShowError('Tanggal Berita harus diisi');
                        }
                        else if ($("#judulberita").val() == '')
                        {
                                ShowError('Judul Berita harus diisi');
                        }
                        else if ($("#isiberita").val() == '')
                        {
                                ShowError('Isi Berita harus diisi');
                        }
                        else
                        {
                                DoAdd();
                        }
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});

$("#dialog-edit").dialog({
        autoOpen: false,
        width: 700,
        modal: true,
        buttons: {
                "Simpan" : function() {
                        if ($("#tglberita_edit").val() == '')
                        {
                                ShowError('Tanggal Berita harus diisi');
                        }
                        else if ($("#judulberita_edit").val() == '')
                        {
                                ShowError('Judul Berita harus diisi');
                        }
                        else if ($("#isiberita_edit").val() == '')
                        {
                                ShowError('Isi Berita harus diisi');
                        }
                        else
                        {
                                DoUpdate();
                        }
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});

$("#dialog-delete").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
                "Hapus" : function() {
                        DoDelete($('#idberita').val());
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});

function DoEdit(IDBerita)
{
        $.get('<?= site_url('admin/berita/getdata') ?>/'+IDBerita,
        function(getdata)
        {
                if (getdata.exists)
                {
                        ClearEditInput();
                        var tglberita = getdata.TglBerita.split("-");
                        $('#idberita').val(getdata.IDBerita);
                        $("#tglberita_edit").val(tglberita[2]+'-'+tglberita[1]+'-'+tglberita[0]);
                        $('#judulberita_edit').val(getdata.JudulBerita);
                        $('#isiberita_edit').val(getdata.IsiBerita);
                        $('#dialog-edit').dialog('option', 'title', 'Edit Berita '+getdata.JudulBerita);
                        $("#dialog-edit").dialog("open");
                        $('#judulberita_edit').select();
                }
                else
                {
                        alert('Berita tidak ditemukan');
                }
        },'json')
}

function DoDeleteConfirm(IDBerita)
{
        $.get('<?= site_url('admin/berita/getdata') ?>/'+IDBerita,
        function(getdata)
        {
                if (getdata.exists)
                {
                        $('#idberita').val(getdata.IDBerita);
                        $("#dialog-delete").html('Hapus Berita '+getdata.JudulBerita+'?');
                        $("#dialog-delete").dialog("open");
                }
                else
                {
                        alert('Berita tidak ditemukan');
                }
        },'json')
}

function DoAdd()
{
        $.post('<?= site_url('admin/berita/tambahdata') ?>',
        {
                TglBerita: $("#tglberita").val(),
                JudulBerita: $("#judulberita").val(),
                IsiBerita: $("#isiberita").val()
        },
        function(getdata){
                if (getdata.valid)
                {
                        $("#dialog-add").dialog("close");
                        window.location.reload();
                }
                else
                {
                        ShowError(getdata.error);
                }
        },'json');
}

function DoUpdate()
{
        $.post('<?= site_url('admin/berita/updatedata') ?>',
        {
                IDBerita: $("#idberita").val(),
                TglBerita: $("#tglberita_edit").val(),
                JudulBerita: $("#judulberita_edit").val(),
                IsiBerita: $("#isiberita_edit").val()
        },
        function(getdata){
                if (getdata.valid)
                {
                        $("#dialog-edit").dialog("close");
                        window.location.reload();
                }
                else
                {
                        ShowError2(getdata.error);
                }
        },'json');
}

function DoDelete()
{
        $.post('<?= site_url('admin/berita/deletedata') ?>',
        {
                IDBerita: $("#idberita").val()
        },
        function(getdata){
                if (getdata.valid)
                {
                        $("#dialog-delete").dialog("close");
                        window.location.reload();
                }
                else
                {
                        ShowError2(getdata.error);
                }
        },'json');
}

function ClearAddInput()
{
        $("#tglberita").val(getFormattedDate(new Date()));
        $("#judulberita").val("");
        $("#isiberita").val("");
        $("#warning").html("");
}

function ClearEditInput()
{
        $("#idberita").val("");
        $("#tglberita_edit").val(getFormattedDate(new Date()));
        $("#isiberita_edit").val("");
        $("#warning_edit").html("");
}

function ShowError(error)
{
        $("#warning").html('<font color="red"><b>'+error+'</b></font>');
}

function ShowError2(error)
{
        $("#warning_edit").html('<font color="red"><b>'+error+'</b></font>');
}

function getFormattedDate(date) {
        var day = date.getDate().toString();
        if (day.length < 2)
        {
                day = '0'+day;
        }
        var month = (date.getMonth() + 1).toString();
        if (month.length < 2)
        {
                month = '0'+month;
        }
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
}
</script>