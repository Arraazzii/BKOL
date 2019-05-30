<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
    <tr>
        <td align="center">
            <div align="center">
                <table width="100%" class="table-form">
                    <tbody>
                        <tr>
                            <th align="center" colspan="2">
                                <div align="center" class="text-center">
                                    PENGUASAAN BAHASA
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td align="left" valign="top" colspan="2">
                                <div align="center">
                                    <?php
                                    if ($this->session->flashdata('error') != null){
                                        echo $this->session->flashdata('error');
                                    }
                                    ?>
                                </div>
                                <div align="left">
                                    <button id="tambahbahasa" class="btn btn-pr">Tambah Bahasa</button>
                                    <a class="button" href="<?= site_url() ?>">Kembali</a>
                                </div>
                                <div id="dialog-add" title="Tambah Bahasa">
                                    <table width="100%">
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Nama Bahasa
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <select id="namabahasa" name="namabahasa" onchange="showInputBahasa()">
                                                    <option value="">(Pilih Bahasa)</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Inggris">Inggris</option>
                                                    <option value="Mandarin">Mandarin</option>
                                                    <option value="Jerman">Jerman</option>
                                                    <option value="Perancis">Perancis</option>
                                                    <option value="-">Lainnya</option>
                                                </select>
                                                <div id="inputbahasa" style="display:none;">
                                                    <input id="namabahasa2" name="namabahasa2" class="text ui-widget-content ui-corner-all" type="text" />
                                                </div>
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
                                <div align="left">
                                    <?php

                                    $this->load->library('table');
                                    $this->table->set_heading(
                                        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                        array('data'=>'Nama Bahasa', 'style'=>'text-align:center;'),
                                        array('data'=>'', 'style'=>'width:0px; text-align:center;')
                                    );
                                    if ($MsBahasaData->num_rows() > 0)
                                    {
                                        $i = 0;
                                        foreach ($MsBahasaData->result() as $getdata)
                                        {
                                            $i++;
                                            $deletebtn = '<a class="button" href="'.site_url('pencaker/dodeletebahasa').'/'.$getdata->IDBahasa.'">Hapus Bahasa</a>';
                                            $this->table->add_row(
                                                array('data'=>$i+$this->uri->segment(3)),
                                                array('data'=>$getdata->NamaBahasa),
                                                array('data'=>$deletebtn)
                                            );
                                        }
                                    }
                                    else
                                    {
                                        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>3));
                                    }
                                    $tmpl = array (
                                        'table_open'          => '<table width="100%" cellpadding="2" cellspacing="1" class="table-form">',

                                        'heading_row_start'   => '<tr>',
                                        'heading_row_end'     => '</tr>',
                                        'heading_cell_start'  => '<th>',
                                        'heading_cell_end'    => '</th>',

                                        'row_start'           => '<tr>',
                                        'row_end'             => '</tr>',
                                        'cell_start'          => '<td nowrap="nowrap" align="left" valign="middle">',
                                        'cell_end'            => '</td>',

                                        'row_alt_start'       => '<tr>',
                                        'row_alt_end'         => '</tr>',
                                        'cell_alt_start'      => '<td align="left" valign="middle">',
                                        'cell_alt_end'        => '</td>',

                                        'table_close'         => '</table>'
                                    );
                                    $this->table->set_template($tmpl); 
                                    echo $this->table->generate();
                                    $this->table->clear();
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>
<script>
    $("#tambahbahasa").button().click(function(e){
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
                if ($("#namabahasa").val() == '')
                {
                    ShowError('Bahasa harus dipilih');
                }
                else if ($("#namabahasa").val() == '-' && $("#namabahasa2").val() == '-')
                {
                    ShowError('Nama Bahasa harus diisi');
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

    function DoAdd()
    {
        $.post('<?= site_url('pencaker/tambahbahasa') ?>',
        {
            NamaBahasa: ($("#namabahasa").val() != "-") ? $("#namabahasa").val() : $("#namabahasa2").val()
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

    function ShowError(error)
    {
        $("#warning").html('<font color="red"><b>'+error+'</b></font>');
    }

    function ClearAddInput()
    {
        $("#namabahasa").val("");
        $("#namabahasa2").val("");
        $("#warning").html("");
    }

    function showInputBahasa() 
    {
        $("#inputbahasa").css("display",($("#namabahasa").val() == "-") ? "block" : "none");
    }
</script>