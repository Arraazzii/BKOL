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
                            DAFTAR PENCAKER MASUK
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
                        <input id="idpencakertemp" name="idpencakertemp" type="hidden" />
                        <div id="dialog-confirm" title="Aktivasi Pencari Kerja">
                            Aktifkan Pencari Kerja?
                        </div>
                        <div id="dialog-deleteconfirm" title="Hapus Pencari Kerja">
                            Hapus Pencari Kerja?
                        </div>
                        <div id="dialog-view" title="Data Pencaker">
                            <table class="table-form" width="100%">
                                <thead>
                                    <tr>
                                        <th align="center" colspan="3">
                                            DATA PENCARI KERJA
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="left" valign="top" rowspan="4" width="120px">
                                            <img id="photo" src="<?= site_url('assets/file/temp') ?>" width="120px" height="160px">
                                        </td>
                                        <td align="left" valign="top" width="140px">
                                            Nomor Induk Pencaker
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="nomorindukpencaker"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Nama Pencari Kerja
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="namapencaker"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Tempat/Tanggal Lahir
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="tempattgllahir"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Jenis Kelamin
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="jeniskelamin"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Email
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="email"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Telepon
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="telepon"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Alamat
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="alamat"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Kecamatan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="namakecamatan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top">
                                            Kelurahan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="namakelurahan"></label>
                                        </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Kode Pos
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="kodepos"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Kewarganegaraan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="kewarganegaraan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Agama
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="namaagama"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Status Pernikahan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="namastatuspernikahan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th align="center" colspan="3">
                                        DATA PENDIDIKAN FORMAL
                                    </th>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Pendidikan Terakhir
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="namastatuspendidikan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Jurusan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="jurusan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Keterampilan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="keterampilan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        NEM/IPK
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="nemipk"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Nilai
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="nilai"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Tahun Lulus
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="tahunlulus"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Tinggi Badan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="tinggibadan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Berat Badan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="beratbadan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Penguasaan Bahasa
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="bahasa"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Pengalaman Kerja
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="pengalaman"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Keterangan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="keterangan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <th align="center" colspan="3">
                                        JABATAN YANG DIINGINKAN
                                    </th>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Posisi Jabatan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="namaposisijabatan"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Lokasi
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="lokasi"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td nowrap="nowrap" align="left" valign="top">
                                        Besar upah yang diinginkan
                                    </td>
                                    <td align="left" valign="top" colspan="2">
                                        <label id="upahyangdicari"></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <?php
                        $this->table->set_heading(
                            array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                            array('data'=>'Nomor Induk Pencaker', 'style'=>'text-align:center;'),
                            array('data'=>'Nama Lengkap', 'style'=>'text-align:center;'),
                            array('data'=>'Pendidikan Terakhir', 'style'=>'text-align:center;'),
                            array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                        );

                        if ($this->pagination->total_rows > 0)
                        {
                            $i = 0;
                            foreach ($MsPencakerTempData as $getdata)
                            {
                                $i++;
                                $detailbtn = '<a class="btn btn-primary btn-sm" onclick="DoView(\''.$getdata->IDPencakerTemp.'\') ">Detail</a>';
                                $accept = '<a class="btn btn-success btn-sm" onclick="DoActivateConfirm(\''.$getdata->IDPencakerTemp.'\')">Terima</a>';
                                $reject = '<a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDPencakerTemp.'\')">Hapus</a>';
                                $this->table->add_row(
                                    array('data'=>$i),
                                    array('data'=>$getdata->NomorIndukPencaker."--".$getdata->IDPencakerTemp),
                                    array('data'=>$getdata->NamaPencaker),
                                    array('data'=>$getdata->NamaStatusPendidikan),
                                    array('data'=>$detailbtn.$accept.$reject, 'style'=>'text-align:center;')
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
    $("#dialog-view").dialog({
        autoOpen: false,
        width: 800,
        modal: true,
        buttons: {
            "Tutup" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    $("#dialog-confirm").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
            "Aktifkan" : function() {
                window.location.href = '<?= site_url('admin/exportpencakertemp/')?>/' + $('#idpencakertemp').val();
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
                window.location.href = '<?= site_url('admin/deletepencakertemp/') ?>/' + $('#idpencakertemp').val();
            },
            "Batal" : function() {
                $(this).dialog("close");
            }
        },
        close: function() {
        }
    });

    function DoActivateConfirm(IDPencakerTemp)
    {
        $.get('<?= site_url('admin/pencakertemp/getdata') ?>/'+IDPencakerTemp,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idpencakertemp').val(getdata.IDPencakerTemp);
                    $("#dialog-confirm").html('Aktifkan Pencaker '+getdata.NamaPencaker+'?');
                    $("#dialog-confirm").dialog("open");
                }
                else
                {
                    alert('Pencaker tidak ditemukan');
                }
            },'json')
    }

    function DoDeleteConfirm(IDPencakerTemp)
    {
        $.get('<?= site_url('admin/pencakertemp/getdata') ?>/'+IDPencakerTemp,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idpencakertemp').val(getdata.IDPencakerTemp);
                    $("#dialog-deleteconfirm").html('Hapus Pencaker '+getdata.NamaPencaker+'?');
                    $("#dialog-deleteconfirm").dialog("open");
                }
                else
                {
                    alert('Pencaker tidak ditemukan');
                }
            },'json')
    }

    function DoView(IDPencaker)
    {
        var src = '<?= site_url('assets/file/temp') ?>';
        
        $.get('<?= site_url('admin/pencakertemp/getdata') ?>/'+IDPencaker,
            function(getdata)
            {
                if (getdata.exists)
                {
                    ClearAddInput();
                    var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    var tgllahir = getdata.TglLahir.split("-");
                    $("#photo").attr('src',src+'/'+getdata.IDPencakerTemp+'.jpg');
                    $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
                    $('#namapencaker').html(getdata.NamaPencaker);
                    $('#tempattgllahir').html(getdata.TempatLahir+', '+parseInt(tgllahir[2])+' '+bulan[parseInt(tgllahir[1]-1)]+' '+tgllahir[0]);
                    $('#jeniskelamin').html(getdata.JenisKelamin == 0 ? 'Pria' : 'Wanita');
                    $('#email').html(getdata.Email);
                    $('#telepon').html(getdata.Telepon);
                    $('#alamat').html(getdata.Alamat);
                    $('#namakecamatan').html(getdata.NamaKecamatan);
                    $('#namakelurahan').html(getdata.NamaKelurahan);
                    $('#kodepos').html(getdata.KodePos);
                    $('#kewarganegaraan').html(getdata.Kewarganegaraan == 0 ? 'WNI' : 'WNA');
                    $('#namaagama').html(getdata.NamaAgama);
                    $('#namastatuspernikahan').html(getdata.NamaStatusPernikahan);
                    $('#namastatuspendidikan').html(getdata.NamaStatusPendidikan);
                    $('#jurusan').html(getdata.Jurusan);
                    $('#keterampilan').html(getdata.Keterampilan);
                    $('#nemipk').html(getdata.NEMIPK == 0 ? 'NEM' : 'IPK');
                    $('#nilai').html(getdata.Nilai);
                    $('#tahunlulus').html(getdata.TahunLulus);
                    $('#tinggibadan').html(getdata.TinggiBadan+' cm');
                    $('#beratbadan').html(getdata.BeratBadan+' kg');
                    $('#bahasa').html(getdata.BahasaData);
                    $('#pengalaman').html(getdata.PengalamanData);
                    $('#keterangan').html(getdata.Keterangan);
                    $('#namaposisijabatan').html(getdata.NamaPosisiJabatan);
                    $('#lokasi').html(getdata.Lokasi == 0 ? 'Dalam Negeri' : 'Luar Negeri');
                    $('#upahyangdicari').html('Rp '+getdata.UpahYangDicari);
                    $('#dialog-view').dialog('option', 'title', 'Data Pencaker');
                    $("#dialog-view").dialog("open");
                }
                else
                {
                    alert('Pencaker tidak ditemukan');
                }
            },'json')
    }

    function ClearAddInput()
    {
        $('#nomorindukpencaker').html("");
        $('#namapencaker').html("");
        $('#tempattgllahir').html("");
        $('#jeniskelamin').html("");
        $('#email').html("");
        $('#telepon').html("");
        $('#alamat').html("");
        $('#namakecamatan').html("");
        $('#namakelurahan').html("");
        $('#kodepos').html("");
        $('#kewarganegaraan').html("");
        $('#namaagama').html("");
        $('#namastatuspernikahan').html("");
        $('#namastatuspendidikan').html("");
        $('#jurusan').html("");
        $('#keterampilan').html("");
        $('#nemipk').html("");
        $('#nilai').html("");
        $('#tahunlulus').html("");
        $('#tinggibadan').html("");
        $('#beratbadan').html("");
        $('#bahasa').html("");
        $('#pengalaman').html("");
        $('#keterangan').html("");
        $('#namaposisijabatan').html("");
        $('#lokasi').html("");
        $('#upahyangdicari').html("");
    }
</script>
