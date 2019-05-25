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
                                DAFTAR KELURAHAN
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
                                    <tr>
                                        <td align="left">
                                            Kecamatan
                                        </td>
                                        <td align="left">
                                            <?= $MsKecamatanData->NamaKecamatan ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div align="left">
                                <button id="tambahkelurahan">Tambah Kelurahan</button>
                                <a class="button" href="<?= site_url('admin/kecamatan/'.$MsKecamatanData->IDKabupaten) ?>">Kembali</a>
                            </div>
                            <input id="idkecamatan" name="idkecamatan" type="hidden" value="<?= $MsKecamatanData->IDKecamatan ?>" />
                            <input id="idkelurahan" name="idkelurahan" type="hidden" />
                            <div id="dialog-add" title="Tambah Kelurahan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kelurahan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakelurahan" name="namakelurahan" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-edit" title="Edit Kelurahan">
                                <table width="100%">
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Kelurahan
                                        </td>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            <input id="namakelurahan_edit" name="namakelurahan_edit" class="text ui-widget-content ui-corner-all" type="text" />
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
                            <div id="dialog-delete" title="Hapus Kelurahan">
                                Hapus Kelurahan?
                            </div>
                            <div align="center">
                                <?php

                                $this->load->library('table');

                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Kelurahan', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsKelurahanData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDKelurahan.'\') ">Detail</a>';
                                        $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDKelurahan.'\') ">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(4)),
                                            array('data'=>$getdata->NamaKelurahan),
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
    $("#tambahkelurahan").button().click(function(e){
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
                if ($("#namakelurahan").val() == '')
                {
                    ShowError('Nama Kelurahan harus diisi');
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
                if ($("#namakelurahan_edit").val() == '')
                {
                    ShowError('Nama Kelurahan harus diisi');
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
                DoDelete($('#idkelurahan').val());
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoEdit(IDKelurahan)
    {
        $.get('<?= site_url('admin/kelurahan/getdata') ?>/'+IDKelurahan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    $('#idkelurahan').val(getdata.IDKelurahan);
                    $('#namakelurahan_edit').val(getdata.NamaKelurahan);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Kelurahan '+getdata.NamaKelurahan);
                    $("#dialog-edit").dialog("open");
                    $('#namakelurahan_edit').select();
                }
                else
                {
                    alert('Kelurahan tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDKelurahan)
    {
        $.get('<?= site_url('admin/kelurahan/getdata') ?>/'+IDKelurahan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkelurahan').val(getdata.IDKelurahan);
                    $("#dialog-delete").html('Hapus '+getdata.NamaKelurahan+'?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Kelurahan tidak ditemukan');
                }
            },'json')
    }

    function DoAdd()
    {
        $.post('<?= site_url('admin/kelurahan/tambahdata') ?>',
        {
            IDKecamatan: $("#idkecamatan").val(),
            NamaKelurahan: $("#namakelurahan").val()
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
        $.post('<?= site_url('admin/kelurahan/updatedata') ?>',
        {
            IDKelurahan: $("#idkelurahan").val(),
            NamaKelurahan: $("#namakelurahan_edit").val()
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
        $.post('<?= site_url('admin/kelurahan/deletedata') ?>',
        {
            IDKelurahan: $("#idkelurahan").val()
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
        $("#namakelurahan").val("");
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#idkelurahan").val("");
        $("#namakelurahan_edit").val("");
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
