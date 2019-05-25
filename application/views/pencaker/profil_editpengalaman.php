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
                                <div align="center">
                                    PENGALAMAN KERJA
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
                                    <button id="tambahpengalaman">Tambah Pengalaman</button>
                                    <input id="idpengalaman" name="idpengalaman" type="hidden" />
                                    <a class="button" href="<?= site_url() ?>">Kembali</a>
                                </div>
                                <div id="dialog-add" title="Tambah Pengalaman">
                                    <table width="100%">
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Nama Perusahaan
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="namaperusahaan" name="namaperusahaan" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Posisi Jabatan
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="jabatan" name="jabatan" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Uraian Kerja
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="uraiankerja" name="uraiankerja" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Tanggal Masuk
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="tglmasuk" name="tglmasuk" type="text" size="10" maxlength="10" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Tanggal Berhenti
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="tglberhenti" name="tglberhenti" type="text" size="10" maxlength="10" readonly="true">
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
                                <div id="dialog-edit" title="Edit Pengalaman">
                                    <table width="100%">
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Nama Perusahaan
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="namaperusahaan_edit" name="namaperusahaan_edit" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Posisi Jabatan
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="jabatan_edit" name="jabatan_edit" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Uraian Kerja
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="uraiankerja_edit" name="uraiankerja_edit" class="text ui-widget-content ui-corner-all" type="text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Tanggal Masuk
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="tglmasuk_edit" name="tglmasuk_edit" type="text" size="10" maxlength="10" readonly="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                Tanggal Berhenti
                                            </td>
                                            <td nowrap="nowrap" align="left" valign="top">
                                                <input id="tglberhenti_edit" name="tglberhenti_edit" type="text" size="10" maxlength="10" readonly="true">
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
                                <div id="dialog-delete" title="Hapus Bahasa">
                                    Hapus Bahasa?
                                </div>
                                <div align="left">
                                    <?php

                                    $this->load->library('table');
                                    $this->table->set_heading(
                                        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                        array('data'=>'Nama Perusahaan', 'style'=>'text-align:center;'),
                                        array('data'=>'Jabatan', 'style'=>'text-align:center;'),
                                        array('data'=>'Lama Bekerja', 'style'=>'text-align:center;'),
                                        array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                    );

                                    if ($MsPengalamanData->num_rows() > 0)
                                    {
                                        $i = 0;
                                        foreach ($MsPengalamanData->result() as $getdata)
                                        {
                                            $i++;
                                            $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDPengalaman.'\') ">Detail</a>';
                                            $deletebtn = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDPengalaman.'\') ">Hapus</a>';
                                            $interval = date_diff(date_create($getdata->TglMasuk), date_create($getdata->TglBerhenti));
                                            $out = $interval->format("Years:%Y,Months:%M,Days:%d");
                                            $result = array();
                                            array_walk(explode(',',$out),
                                                function($val,$key) use(&$result){
                                                    $v=explode(':',$val);
                                                    $result[$v[0]] = $v[1];
                                                });
                                            $this->table->add_row(
                                                array('data'=>$i+$this->uri->segment(3)),
                                                array('data'=>$getdata->NamaPerusahaan),
                                                array('data'=>$getdata->Jabatan),
                                                array('data'=>((int)$result['Years'] > 0 ? (int)$result['Years'].' tahun' : '').((int)$result['Months'] > 0 ? ' '.(int)$result['Months'].' bulan' : ((int)$result['Days'] > 0 ? ' '.(int)$result['Days'].' hari' : ' 0 hari'))),
                                                array('data'=>$detailbtn.$deletebtn)
                                            );
                                        }
                                    }
                                    else
                                    {
                                        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>5));
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
    $("#tglmasuk").datepicker({
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

    $("#tglberhenti").datepicker({
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


    $("#tglmasuk_edit").datepicker({
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

    $("#tglberhenti_edit").datepicker({
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

    $("#tambahpengalaman").button().click(function(e){
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
                if ($("#jabatan").val() == '')
                {
                    ShowError('Jabatan harus diisi');
                }
                else if ($("#uraiankerja").val() == '')
                {
                    ShowError('Uraian Kerja harus diisi');
                }
                else if ($("#namaperusahaan").val() == '')
                {
                    ShowError('Nama Perusahaan harus diisi');
                }
                else if ($("#tglmasuk").val() == '')
                {
                    ShowError('Tanggal Masuk harus diisi');
                }
                else if ($("#tglberhenti").val() == '')
                {
                    ShowError('Tanggal Berhenti harus diisi');
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
                if ($("#jabatan_edit").val() == '')
                {
                    ShowError2('Jabatan harus diisi');
                }
                else if ($("#uraiankerja_edit").val() == '')
                {
                    ShowError2('Uraian Kerja harus diisi');
                }
                else if ($("#namaperusahaan_edit").val() == '')
                {
                    ShowError2('Nama Perusahaan harus diisi');
                }
                else if ($("#tglmasuk_edit").val() == '')
                {
                    ShowError2('Tanggal Masuk harus diisi');
                }
                else if ($("#tglberhenti_edit").val() == '')
                {
                    ShowError2('Tanggal Berhenti harus diisi');
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
                DoDelete($('#idpengalaman').val());
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
        $.post('<?= site_url('pencaker/tambahpengalaman') ?>',
        {
            Jabatan: $("#jabatan").val(),
            UraianKerja: $("#uraiankerja").val(),
            NamaPerusahaan: $("#namaperusahaan").val(),
            TglMasuk: $("#tglmasuk").val(),
            TglBerhenti: $("#tglberhenti").val()
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

    function DoEdit(IDPengalaman)
    {
        $.get('<?= site_url('pencaker/getdatapengalaman') ?>/'+IDPengalaman,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearEditInput();
                    var tglmasuk = getdata.TglMasuk.split("-");
                    var tglberhenti = getdata.TglBerhenti.split("-");
                    $('#idpengalaman').val(getdata.IDPengalaman);
                    $("#jabatan_edit").val(getdata.Jabatan);
                    $("#uraiankerja_edit").val(getdata.UraianKerja);
                    $("#namaperusahaan_edit").val(getdata.NamaPerusahaan);
                    $("#tglmasuk_edit").val(tglmasuk[2]+'-'+tglmasuk[1]+'-'+tglmasuk[0]);
                    $("#tglberhenti_edit").val(tglberhenti[2]+'-'+tglberhenti[1]+'-'+tglberhenti[0]);
                    $('#dialog-edit').dialog('option', 'title', 'Edit Pengalaman');
                    $("#dialog-edit").dialog("open");
                    $('#namapengalaman_edit').select();
                }
                else
                {
                    alert('Pengalaman tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDPengalaman)
    {
        $.get('<?= site_url('pencaker/getdatapengalaman') ?>/'+IDPengalaman,
            function(getdata)
            {
                
                if (getdata.exists)
                {
                    $('#idpengalaman').val(getdata.IDPengalaman);
                    $("#dialog-delete").html('Hapus Pengalaman?');
                    $("#dialog-delete").dialog("open");
                }
                else
                {
                    alert('Pengalaman tidak ditemukan');
                }
            },'json')
    }

    function DoUpdate()
    {
        $.post('<?= site_url('pencaker/updatepengalaman') ?>',
        {
            IDPengalaman: $("#idpengalaman").val(),
            Jabatan: $("#jabatan_edit").val(),
            UraianKerja: $("#uraiankerja_edit").val(),
            NamaPerusahaan: $("#namaperusahaan_edit").val(),
            TglMasuk: $("#tglmasuk_edit").val(),
            TglBerhenti: $("#tglberhenti_edit").val()
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
        $.post('<?= site_url('pencaker/dodeletepengalaman') ?>',
        {
            IDPengalaman: $("#idpengalaman").val()
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
        $("#jabatan").val("");
        $("#uraiankerja").val("");
        $("#namaperusahaan").val("");
        $("#tglmasuk").val(getFormattedDate(new Date()));
        $("#tglberhenti").val(getFormattedDate(new Date()));
        $("#warning").html("");
    }

    function ClearEditInput()
    {
        $("#jabatan_edit").val("");
        $("#uraiankerja_edit").val("");
        $("#namaperusahaan_edit").val("");
        $("#tglmasuk_edit").val(getFormattedDate(new Date()));
        $("#tglberhenti_edit").val(getFormattedDate(new Date()));
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