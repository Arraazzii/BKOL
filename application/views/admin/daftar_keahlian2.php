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
                                DAFTAR KEAHLIAN
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
                                <table>
                                    <tr>
                                        <td align="left">
                                            Jenis Lowongan
                                        </td>
                                        <td align="left">
                                            <?= $MsJenisLowonganData->NamaJenisLowongan ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div align="left">
                                <button id="tambahkeahlian">Tambah Keahlian</button>
                                <a class="button" href="<?= site_url('admin/jenislowongan') ?>">Kembali</a>
                            </div>
                            <input id="idjenislowongan" name="idjenislowongan" type="hidden" value="<?= $MsJenisLowonganData->IDJenisLowongan ?>" />
                            <input id="idkeahlian" name="idkeahlian" type="hidden" />
                            <div id="dialog-add" title="Tambah Keahlian">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Keahlian
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakeahlian" name="namakeahlian" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-edit" title="Edit Keahlian">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Keahlian
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakeahlian_edit" name="namakeahlian_edit" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-delete" title="Hapus Keahlian">
                                Hapus Keahlian?
                            </div>
                            <div align="center">
                                <?php

                                $this->load->library('table');

                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Keahlian', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsKeahlianData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDKeahlian.'\') ">Detail</a>';
                                        $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDKeahlian.'\') ">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(4)),
                                            array('data'=>$getdata->NamaKeahlian),
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
    $("#tambahkeahlian").button().click(function(e){
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
                if ($("#namakeahlian").val() == '')
                {
                    ShowError('Nama Keahlian harus diisi');
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
                if ($("#namakeahlian_edit").val() == '')
                {
                    ShowError('Nama Keahlian harus diisi');
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
                DoDelete($('#idkeahlian').val());
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoEdit(IDKeahlian)
    {
        $.get('<?= site_url('admin/keahlian/getdata') ?>/'+IDKeahlian,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    $('#idkeahlian').val(getdata.IDKeahlian);
                    $('#namakeahlian_edit').val(getdata.NamaKeahlian);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Keahlian '+getdata.NamaKeahlian);
                    $("#dialog-edit").dialog("open");
                    $('#namakeahlian_edit').select();
                }
                else
                {
                    alert('Keahlian tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDKeahlian)
    {
        $.get('<?= site_url('admin/keahlian/getdata') ?>/'+IDKeahlian,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkeahlian').val(getdata.IDKeahlian);
                    $("#dialog-delete").html('Hapus '+getdata.NamaKeahlian+'?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Keahlian tidak ditemukan');
                }
            },'json')
    }

    function DoAdd()
    {
        $.post('<?= site_url('admin/keahlian/tambahdata') ?>',
        {
            IDJenisLowongan: $("#idjenislowongan").val(),
            NamaKeahlian: $("#namakeahlian").val()
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
        $.post('<?= site_url('admin/keahlian/updatedata') ?>',
        {
            IDKeahlian: $("#idkeahlian").val(),
            NamaKeahlian: $("#namakeahlian_edit").val()
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
        $.post('<?= site_url('admin/keahlian/deletedata') ?>',
        {
            IDKeahlian: $("#idkeahlian").val()
        },
        function(getdata){
            if (getdata.valid)
            {
                $("#dialog-delete").dialog("close");
                window.location.reload();
            }
            else
            {
                $("#dialog-delete").dialog("close");
                window.location.reload();
            }
        },'json');
    }

    function ClearAddInput()
    {
        $("#namakeahlian").val("");
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#idkeahlian").val("");
        $("#namakeahlian_edit").val("");
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
