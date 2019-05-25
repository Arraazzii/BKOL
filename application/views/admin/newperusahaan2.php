<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
$input = $this->session->flashdata('input');
?>
<table width="100%">
    <tr>
        <td align="center">
            <table width="100%" class="table-form">
                <tr>
                    <th align="center">
                        <div align="center">
                            DAFTAR PERUSAHAAN MASUK
                        </div>
                    </th>
                </tr>
                <tr>
                    <td align="left">
                        <div align="center">
                            <?php
                            if ($this->session->flashdata('error') != null){
                                echo $this->session->flashdata('error');
                            }
                            ?>
                        </div>
                        <input id="idperusahaantemp" name="idperusahaantemp" type="hidden" />
                        <div id="dialog-confirm" title="Aktivasi Perusahaan">
                            Aktifkan Perusahaan?
                        </div>
                        <div id="dialog-deleteconfirm" title="Hapus Perusahaan">
                            Hapus Perusahaan?
                        </div>
                        <div align="center">
                            <?php
                            $this->table->set_heading(
                                array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                array('data'=>'Nama Perusahaan', 'style'=>'text-align:center;'),
                                array('data'=>'Nama Pemberi Kerja', 'style'=>'text-align:center;'),
                                array('data'=>'Telepon', 'style'=>'text-align:center;'),
                                array('data'=>'Email', 'style'=>'text-align:center;'),
                                array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                            );

                            if ($this->pagination->total_rows > 0)
                            {
                                $i = 0;
                                foreach ($MsPerusahaanTempData as $getdata)
                                {
                                    $i++;
                                    $accept = '<a class="button" onclick="DoActivateConfirm(\''.$getdata->IDPerusahaanTemp.'\')">Terima</a>';
                                    $reject = '<a class="button" onclick="DoDeleteConfirm(\''.$getdata->IDPerusahaanTemp.'\')">Hapus</a>';
                                    $this->table->add_row(
                                        array('data'=>$i),
                                        array('data'=>$getdata->NamaPerusahaan),
                                        array('data'=>$getdata->NamaPemberiKerja),
                                        array('data'=>$getdata->TeleponPemberiKerja),
                                        array('data'=>$getdata->EmailPemberiKerja),
                                        array('data'=>$accept.$reject)
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
            </table>
        </td>
    </tr>
</table>

<script>
    $("#dialog-confirm").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
            "Aktifkan" : function() {
                window.location.href = '<?= site_url('admin/exportperusahaantemp/')?>/' + $('#idperusahaantemp').val();
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    $("#dialog-deleteconfirm").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
            "Hapus" : function() {
                window.location.href = '<?= site_url('admin/deleteperusahaantemp')?>/' + $('#idperusahaantemp').val();
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });


    function DoActivateConfirm(IDPerusahaanTemp)
    {
        $.get('<?= site_url('admin/perusahaantemp/getdata') ?>/'+IDPerusahaanTemp,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idperusahaantemp').val(getdata.IDPerusahaanTemp);
                    $("#dialog-confirm").html('Aktifkan Perusahaan '+getdata.NamaPerusahaan+'?');
                    $("#dialog-confirm").dialog("open");
                }
                else
                {
                    alert('Perusahaan tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDPerusahaanTemp)
    {
        $.get('<?= site_url('admin/perusahaantemp/getdata') ?>/'+IDPerusahaanTemp,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idperusahaantemp').val(getdata.IDPerusahaanTemp);
                    $("#dialog-deleteconfirm").html('Hapus Perusahaan '+getdata.NamaPerusahaan+'?');
                    $("#dialog-deleteconfirm").dialog("open");
                }
                else
                {
                    alert('Perusahaan tidak ditemukan');
                }
            },'json')
    }
</script>
