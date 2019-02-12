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
                                DAFTAR PENCARI KERJA
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td align="center">
                            <div align="left">
                                <table>
                                    <tr>
                                        <td align="left">
                                            No Loker
                                        </td>
                                        <td align="left">
                                            <?= $MsLowonganData->IDLowongan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Nama Pekerjaan
                                        </td>
                                        <td align="left">
                                            <?= $MsLowonganData->NamaLowongan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Laki-laki
                                        </td>
                                        <td align="left">
                                            <?= $TotalPria ?> Orang
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Perempuan
                                        </td>
                                        <td align="left">
                                            <?= $TotalWanita ?> Orang
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            Jumlah Pencari Kerja
                                        </td>
                                        <td align="left">
                                            <?= $TotalPria+$TotalWanita ?> Orang
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div align="left">
                                <a href="<?= site_url('perusahaan/statuslowongan') ?>" class="button">Kembali</a>
                            </div>
                            <input id="idlowonganmasuk" name="idlowonganmasuk" type="hidden" />
                            <div id="dialog-edit" title="Data Pencaker">
                                Status : <label id="statuslowongan"></label>
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
                                                <img id="photo" src="<?= site_url('assets/file/pencaker') ?>" width="120px" height="160px">
                                            </td>
                                            <td align="left" valign="top" width="140px">
                                                Nomor Induk Pencaker
                                            </td>
                                            <td align="left" valign="top">
                                                <label id="nomorindukpencaker"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Nama Pencari Kerja
                                            </td>
                                            <td align="left" valign="top">
                                                <label id="namapencaker"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Tempat/Tanggal Lahir
                                            </td>
                                            <td align="left" valign="top">
                                                <label id="tempattgllahir"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Jenis Kelamin
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="jeniskelamin"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Email
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="email"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Telepon
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="telepon"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Alamat
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="alamat"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Kecamatan
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="namakecamatan"></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top">
                                                Kelurahan
                                            </td>
                                            <td align="left" valign="top" colspan="2">
                                                <label id="namakelurahan"></label>
                                            </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Kode Pos
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="kodepos"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Kewarganegaraan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="kewarganegaraan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Agama
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="namaagama"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
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
                                        <td align="left" valign="top">
                                            Pendidikan Terakhir
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="namastatuspendidikan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Jurusan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="jurusan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Keterampilan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="keterampilan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            NEM/IPK
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="nemipk"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Nilai
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="nilai"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Tahun Lulus
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="tahunlulus"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Tinggi Badan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="tinggibadan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Berat Badan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="beratbadan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Keterangan
                                        </td>
                                        <td align="left" valign="top">
                                            <label id="keterangan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th align="center" colspan="3">
                                            JABATAN YANG DIINGINKAN
                                        </th>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Posisi Jabatan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="idposisijabatan"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Lokasi
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="lokasi"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top">
                                            Besar upah yang diinginkan
                                        </td>
                                        <td align="left" valign="top" colspan="2">
                                            <label id="upahyangdicari"></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="nowrap" align="left" valign="top" colspan="3">
                                            <div id="warning" align="center">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <div align="center">
                            <?php

                            $this->load->library('table');

                            $this->table->set_heading(
                                array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                array('data'=>'Nomor Induk Pencaker', 'style'=>'text-align:center;'),
                                array('data'=>'Nama Lengkap', 'style'=>'text-align:center;'),
                                array('data'=>'Pendidikan Terakhir', 'style'=>'text-align:center;'),
                                array('data'=>'Umur', 'style'=>'text-align:center;'),
                                array('data'=>'Status', 'style'=>'text-align:center;'),
                                array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                            );
                            if ($MsPencakerData->num_rows > 0)
                            {
                                $i = 0;
                                foreach ($MsPencakerData->result() as $getdata)
                                {
                                    if ($getdata->StatusLowongan == 1) 
                                    {
                                        $status = 'Diproses';
                                    } 
                                    else if ($getdata->StatusLowongan == 2)
                                    {
                                        $status = 'Diterima';
                                    }
                                    else 
                                    {
                                        $status = 'Belum Diproses';
                                    }
                                    $i++;
                                    $detailbtn = '<a class="button" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') ">Lihat CV</a>';
                                    $tgllahir = explode("-", $getdata->TglLahir);
                                    $this->table->add_row(
                                        array('data'=>$i+$this->uri->segment(4)),
                                        array('data'=>$getdata->NomorIndukPencaker),
                                        array('data'=>$getdata->NamaPencaker),
                                        array('data'=>$getdata->NamaStatusPendidikan),
                                        array('data'=>(date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun'),
                                        array('data'=>$status, 'style'=>'text-align:center;'),
                                        array('data'=>$detailbtn, 'style'=>'text-align:center;')
                                    );
                                }
                            }
                            else
                            {
                                $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>8));
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

    function DoEdit(IDLowonganMasuk)
    {
        var src = '<?= site_url('assets/file/pencaker') ?>';
        $.get('<?= site_url('perusahaan/statuslowongan/getdata') ?>/'+IDLowonganMasuk,
            function(getdata)
            {
                if (getdata.exists)
                {
                    if (getdata.StatusLowongan == 1) 
                    {
                        status = 'Diproses';
                        buttons = {
                            "Terima" : function() {
                                DoUpdate(2);
                            },
                            "Batal" : function() {
                                DoUpdate(1);
                            }
                        }

                    } 
                    else if (getdata.StatusLowongan == 2)
                    {
                        status = 'Diterima';
                        buttons = {
                            "Tutup" : function() {
                                DoUpdate(2);
                            }
                        }
                    }
                    else 
                    {
                        status = 'Belum Diproses';
                        buttons = {
                            "Proses" : function() {
                                DoUpdate(1);
                            },
                            "Batal" : function() {
                                DoUpdate(0);
                            }
                        }
                    }

                    $("#dialog-edit").dialog({
                        autoOpen: false,
                        width: 800,
                        modal: true,
                        buttons: buttons,
                        close: function() {
                        }
                    });

                    var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    var tgllahir = getdata.TglLahir.split("-");
                    $("#idlowonganmasuk").val(IDLowonganMasuk);
                    $('#statuslowongan').html(status);
                    $("#photo").attr('src',src+'/'+getdata.IDPencaker+'.jpg');
                    $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
                    $('#namapencaker').html(getdata.NamaPencaker);
                    $('#tempattgllahir').html(getdata.TempatLahir+', '+parseInt(tgllahir[2])+' '+bulan[parseInt(tgllahir[1])-1]+' '+tgllahir[0]);
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
                    $('#keterangan').html(getdata.Keterangan);
                    $('#namaposisijabatan').html(getdata.NamaPosisiJabatan);
                    if (getdata.Lokasi == 0)
                    {
                        $('#lokasi').html('Dalam Negeri');
                    }
                    else if (getdata.Lokasi == 1)
                    {
                        $('#lokasi').html('Luar Negeri');
                    }
                    else if (getdata.Lokasi == 2)
                    {
                        $('#lokasi').html('Dimana Saja');
                    }
                    $('#upahyangdicari').html('Rp '+getdata.UpahYangDicari);
                    $('#dialog-edit').dialog('option', 'title', 'Data Pencaker');
                    $("#dialog-edit").dialog("open");
                }
                else
                {
                    alert('Pencaker tidak ditemukan');
                }
            },'json')
}

function DoUpdate(idstatuslowongan)
{
    $.post('<?= site_url('perusahaan/statuslowongan/updatedata') ?>',
    {
        IDLowonganMasuk: $("#idlowonganmasuk").val(),
        StatusLowongan: idstatuslowongan
    },
    function(getdata){
        if (getdata.valid)
        {
            $("#dialog-edit").dialog("close");
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
    $("#warning_edit").html('<font color="red"><b>'+error+'</b></font>');
}
</script>
