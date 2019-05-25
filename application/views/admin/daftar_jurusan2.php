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
                                DAFTAR POSISI JURUSAN
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
                                <button id="tambahjurusan">Tambah Jurusan</button>
                            </div>
                            <input id="IDjurusan" name="IDjurusan" type="hidden" />
                            <div id="dialog-add" title="Tambah Jurusan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Jurusan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="NamaJurusan" name="NamaJurusan" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-edit" title="Edit Jurusan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Jabatan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="NamaJurusan_edit" name="NamaJurusan_edit" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-delete" title="Hapus Jurusan">
                                Hapus Jurusan?
                            </div>
                            <div align="center">
                                <?php

                                $this->load->library('table');
                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Jurusan', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsJurusanData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDjurusan.'\') ">Detail</a>';
                                        $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDjurusan.'\') ">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(3)),
                                            array('data'=>$getdata->Jurusan),
                                            array('data'=>$detailbtn.$deletebtn, 'style'=>'text-align:center;')
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
    $("#tambahjurusan").button().click(function(e){
        e.preventDefault();
        ClearAddInput();
        $("#dialog-add").dialog("open");
    });

    $("#dialog-add").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
            "Simpan" : function() {
                if ($("#NamaJurusan").val() == '')
                {
                    ShowError('Nama Jurusan harus diisi');
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
        width: 350,
        modal: true,
        buttons: {
            "Simpan" : function() {
                if ($("#NamaJurusan_edit").val() == '')
                {
                    ShowError('Nama Jurusan harus diisi');
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
                DoDelete($('#IDjurusan').val());
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoEdit(IDjurusan)
    {
        $.get('<?= site_url('admin/jurusan/getdata') ?>/'+IDjurusan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    $('#IDjurusan').val(getdata.IDjurusan);
                    $('#NamaJurusan_edit').val(getdata.Jurusan);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Jurusan '+getdata.Jurusan);
                    $("#dialog-edit").dialog("open");
                    $('#NamaJurusan_edit').select();
                }
                else
                {
                    alert('PosisiJabatan tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDjurusan)
    {
        $.get('<?= site_url('admin/jurusan/getdata') ?>/'+IDjurusan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#IDjurusan').val(getdata.IDjurusan);
                    $("#dialog-delete").html('Hapus '+getdata.Jurusan+'?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Jurusan tidak ditemukan');
                }
            },'json')
    }

    function DoAdd()
    {
        $.post('<?= site_url('admin/jurusan/tambahdata') ?>',
        {
            NamaJurusan: $("#NamaJurusan").val()
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
        $.post('<?= site_url('admin/jurusan/updatedata') ?>',
        {
            IDjurusan: $("#IDjurusan").val(),
            NamaJurusan: $("#NamaJurusan_edit").val()
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
        $.post('<?= site_url('admin/jurusan/deletedata') ?>',
        {
            IDjurusan: $("#IDjurusan").val()
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
        $("#NamaJurusan").val("");
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#IDjurusan").val("");
        $("#NamaJurusan").val("");
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
</script>