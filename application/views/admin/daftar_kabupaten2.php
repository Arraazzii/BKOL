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
                                DAFTAR KABUPATEN
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
                                <button id="tambahkabupaten">Tambah Kabupaten</button>
                            </div>
                            <input id="idkabupaten" name="idkabupaten" type="hidden" />
                            <div id="dialog-add" title="Tambah Kabupaten">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kabupaten
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakabupaten" name="namakabupaten" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-edit" title="Edit Kabupaten">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kabupaten
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakabupaten_edit" name="namakabupaten_edit" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-delete" title="Hapus Kabupaten">
                                Hapus Kabupaten?
                            </div>
                            <div align="center">
                                <?php

                                $this->load->library('table');
                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Kabupaten', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsKabupatenData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDKabupaten.'\') ">Detail</a>';
                                        $viewbtn = '<a class="button" href="'.site_url('admin/kecamatan/'.$getdata->IDKabupaten).'">Lihat Kecamatan</a>';
                                        $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDKabupaten.'\') ">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(3)),
                                            array('data'=>$getdata->NamaKabupaten),
                                            array('data'=>$detailbtn.$viewbtn.$deletebtn, 'style'=>'text-align:center;')
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
    $("#tambahkabupaten").button().click(function(e){
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
                if ($("#namakabupaten").val() == '')
                {
                    ShowError('Nama Kabupaten harus diisi');
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
                if ($("#namakabupaten_edit").val() == '')
                {
                    ShowError('Nama Kabupaten harus diisi');
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
                DoDelete($('#idkabupaten').val());
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoEdit(IDKabupaten)
    {
        $.get('<?= site_url('admin/kabupaten/getdata') ?>/'+IDKabupaten,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    $('#idkabupaten').val(getdata.IDKabupaten);
                    $('#namakabupaten_edit').val(getdata.NamaKabupaten);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Kabupaten '+getdata.NamaKabupaten);
                    $("#dialog-edit").dialog("open");
                    $('#namakabupaten_edit').select();
                }
                else
                {
                    alert('Kabupaten tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDKabupaten)
    {
        $.get('<?= site_url('admin/kabupaten/getdata') ?>/'+IDKabupaten,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkabupaten').val(getdata.IDKabupaten);
                    $("#dialog-delete").html('Hapus '+getdata.NamaKabupaten+'?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Kabupaten tidak ditemukan');
                }
            },'json')
    }

    function DoAdd()
    {
        $.post('<?= site_url('admin/kabupaten/tambahdata') ?>',
        {
            NamaKabupaten: $("#namakabupaten").val()
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
        $.post('<?= site_url('admin/kabupaten/updatedata') ?>',
        {
            IDKabupaten: $("#idkabupaten").val(),
            NamaKabupaten: $("#namakabupaten_edit").val()
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
        $.post('<?= site_url('admin/kabupaten/deletedata') ?>',
        {
            IDKabupaten: $("#idkabupaten").val()
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
        $("#namakabupaten").val("");
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#idkabupaten").val("");
        $("#namakabupaten_edit").val("");
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