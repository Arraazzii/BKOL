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
                                DAFTAR KECAMATAN
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
                                            Kabupaten
                                        </td>
                                        <td align="left">
                                            <?= $MsKabupatenData->NamaKabupaten ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div align="left">
                                <button id="tambahkecamatan">Tambah Kecamatan</button>
                                <a class="button" href="<?= site_url('admin/kabupaten') ?>">Kembali</a>
                            </div>
                            <input id="idkabupaten" name="idkabupaten" type="hidden" value="<?= $MsKabupatenData->IDKabupaten ?>" />
                            <input id="idkecamatan" name="idkecamatan" type="hidden" />
                            <div id="dialog-add" title="Tambah Kecamatan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kecamatan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakecamatan" name="namakecamatan" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-edit" title="Edit Kecamatan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kecamatan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakecamatan_edit" name="namakecamatan_edit" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-delete" title="Hapus Kecamatan">
                                Hapus Kecamatan?
                            </div>
                            <div align="center">
                                <?php

                                $this->load->library('table');

                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Kecamatan', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsKecamatanData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDKecamatan.'\') ">Detail</a>';
                                        $viewbtn = '<a class="button" href="'.site_url('admin/kelurahan/'.$getdata->IDKecamatan).'">Lihat Kelurahan</a>';
                                        $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDKecamatan.'\') ">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(4)),
                                            array('data'=>$getdata->NamaKecamatan),
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
    $("#tambahkecamatan").button().click(function(e){
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
                if ($("#namakecamatan").val() == '')
                {
                    ShowError('Nama Kecamatan harus diisi');
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
                if ($("#namakecamatan_edit").val() == '')
                {
                    ShowError('Nama Kecamatan harus diisi');
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
                DoDelete($('#idkecamatan').val());
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoEdit(IDKecamatan)
    {
        $.get('<?= site_url('admin/kecamatan/getdata') ?>/'+IDKecamatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    $('#idkecamatan').val(getdata.IDKecamatan);
                    $('#namakecamatan_edit').val(getdata.NamaKecamatan);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Kecamatan '+getdata.NamaKecamatan);
                    $("#dialog-edit").dialog("open");
                    $('#namakecamatan_edit').select();
                }
                else
                {
                    alert('Kecamatan tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDKecamatan)
    {
        $.get('<?= site_url('admin/kecamatan/getdata') ?>/'+IDKecamatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkecamatan').val(getdata.IDKecamatan);
                    $("#dialog-delete").html('Hapus '+getdata.NamaKecamatan+'?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Kecamatan tidak ditemukan');
                }
            },'json')
    }

    function DoAdd()
    {
        $.post('<?= site_url('admin/kecamatan/tambahdata') ?>',
        {
            IDKabupaten: $("#idkabupaten").val(),
            NamaKecamatan: $("#namakecamatan").val()
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
        $.post('<?= site_url('admin/kecamatan/updatedata') ?>',
        {
            IDKecamatan: $("#idkecamatan").val(),
            NamaKecamatan: $("#namakecamatan_edit").val()
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
        $.post('<?= site_url('admin/kecamatan/deletedata') ?>',
        {
            IDKecamatan: $("#idkecamatan").val()
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
        $("#namakecamatan").val("");
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#idkecamatan").val("");
        $("#namakecamatan_edit").val("");
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
