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
                                                                DAFTAR KEGIATAN
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
                                                                <button id="tambahevent">Tambah Kegiatan</button>
                                                        </div>
                                                        <input id="idevent" name="idevent" type="hidden" />
                                                        <div id="dialog-add" title="Tambah Kegiatan">
                                                                <table width="100%">
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Judul Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="judulevent" name="judulevent" class="text ui-widget-content ui-corner-all" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Tanggal Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="tglevent" name="tglevent" type="text" size="10" maxlength="10" readonly="true">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Isi Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <textarea id="isievent" name="isievent" class="text ui-widget-content ui-corner-all" type="text" cols="70" rows="15" maxlength="2000"></textarea>
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
                                                        <div id="dialog-edit" title="Edit Event">
                                                                <table width="100%">
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Judul Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="judulevent_edit" name="judulevent_edit" class="text ui-widget-content ui-corner-all" type="text" />
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Tanggal Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <input id="tglevent_edit" name="tglevent_edit" type="text" size="10" maxlength="10" readonly="true">
                                                                                </td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        Isi Kegiatan
                                                                                </td>
                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                        <textarea id="isievent_edit" name="isievent_edit" class="text ui-widget-content ui-corner-all" type="text" cols="70" rows="15" maxlength="2000"></textarea>
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
                                                        <div id="dialog-delete" title="Hapus Event">
                                                                Hapus Kegiatan?
                                                        </div>
                                                        <div align="center">
<?php

$this->load->library('table');
$this->table->set_heading(
        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Tanggal Event', 'style'=>'text-align:center;'),
        array('data'=>'Judul Event', 'style'=>'text-align:center;'),
        array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
);
if ($this->pagination->total_rows > 0)
{
        $i = 0;
        foreach ($MsEventData as $getdata)
        {
                $i++;
                $uploadbtn = '<a class="button" href="'.site_url('admin/event/foto')."/".$getdata->IDEvent.'" ">Foto</a>';
                $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDEvent.'\') ">Detail</a>';
                $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDEvent.'\') ">Hapus</a>';
                $this->table->add_row(
                        array('data'=>$i+$this->uri->segment(3)),
                        array('data'=>$getdata->TglEvent),
                        array('data'=>$getdata->JudulEvent),
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
$("#tglevent").datepicker({
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
$("#tglevent_edit").datepicker({
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

$("#tambahevent").button().click(function(e){
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
                        if ($("#tglevent").val() == '')
                        {
                                ShowError('Tanggal Kegiatan harus diisi');
                        }
                        else if ($("#judulevent").val() == '')
                        {
                                ShowError('Judul Kegiatan harus diisi');
                        }
                        else if ($("#isievent").val() == '')
                        {
                                ShowError('Isi Kegiatan harus diisi');
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
                        if ($("#tglevent_edit").val() == '')
                        {
                                ShowError('Tanggal Kegiatan harus diisi');
                        }
                        else if ($("#judulevent_edit").val() == '')
                        {
                                ShowError('Judul Kegiatan harus diisi');
                        }
                        else if ($("#isievent_edit").val() == '')
                        {
                                ShowError('Isi Kegiatan harus diisi');
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
                        DoDelete($('#idevent').val());
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});

function DoEdit(IDEvent)
{
        $.get('<?= site_url('admin/event/getdata') ?>/'+IDEvent,
        function(getdata)
        {
                if (getdata.exists)
                {
                        ClearEditInput();
                        var tglevent = getdata.TglEvent.split("-");
                        $('#idevent').val(getdata.IDEvent);
                        $("#tglevent_edit").val(tglevent[2]+'-'+tglevent[1]+'-'+tglevent[0]);
                        $('#judulevent_edit').val(getdata.JudulEvent);
                        $('#isievent_edit').val(getdata.IsiEvent);
                        $('#dialog-edit').dialog('option', 'title', 'Edit Event '+getdata.JudulEvent);
                        $("#dialog-edit").dialog("open");
                        $('#judulevent_edit').select();
                }
                else
                {
                        alert('Kegiatan tidak ditemukan');
                }
        },'json')
}

function DoDeleteConfirm(IDEvent)
{
        $.get('<?= site_url('admin/event/getdata') ?>/'+IDEvent,
        function(getdata)
        {
                if (getdata.exists)
                {
                        $('#idevent').val(getdata.IDEvent);
                        $("#dialog-delete").html('Hapus Kegiatan '+getdata.JudulEvent+'?');
                        $("#dialog-delete").dialog("open");
                }
                else
                {
                        alert('Kegiatan tidak ditemukan');
                }
        },'json')
}

function DoAdd()
{
        $.post('<?= site_url('admin/event/tambahdata') ?>',
        {
                TglEvent: $("#tglevent").val(),
                JudulEvent: $("#judulevent").val(),
                IsiEvent: $("#isievent").val()
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
        $.post('<?= site_url('admin/event/updatedata') ?>',
        {
                IDEvent: $("#idevent").val(),
                TglEvent: $("#tglevent_edit").val(),
                JudulEvent: $("#judulevent_edit").val(),
                IsiEvent: $("#isievent_edit").val()
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
        $.post('<?= site_url('admin/event/deletedata') ?>',
        {
                IDEvent: $("#idevent").val()
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
        $("#tglevent").val(getFormattedDate(new Date()));
        $("#judulevent").val("");
        $("#isievent").val("");
        $("#warning").html("");
}

function ClearEditInput()
{
        $("#idevent").val("");
        $("#tglevent_edit").val(getFormattedDate(new Date()));
        $("#isievent_edit").val("");
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