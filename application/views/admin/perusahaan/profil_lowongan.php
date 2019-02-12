<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
        $input = $this->session->flashdata('input');
        if ($input == NULL)
        {
                $tglberlaku = explode("-", $MsLowonganData->TglBerlaku);
                $tglberakhir = explode("-", $MsLowonganData->TglBerakhir);
                $IDLowongan = $MsLowonganData->IDLowongan;
                $input['idposisijabatan'] = $MsLowonganData->IDPosisiJabatan;
                $input['idjenislowongan'] = $MsLowonganData->IDJenisLowongan;
                $input['idkeahlian'] = $MsLowonganData->IDKeahlian;
                $input['idstatuspendidikan'] = $MsLowonganData->IDStatusPendidikan;
                $input['idjenispengupahan'] = $MsLowonganData->IDJenisPengupahan;
                $input['idstatushubungankerja'] = $MsLowonganData->IDStatusHubunganKerja;
                $input['tglberlaku'] = $tglberlaku[2].'-'.$tglberlaku[1].'-'.$tglberlaku[0];
                $input['tglberakhir'] = $tglberakhir[2].'-'.$tglberakhir[1].'-'.$tglberakhir[0];
                $input['namalowongan'] = $MsLowonganData->NamaLowongan;
                $input['uraianpekerjaan'] = $MsLowonganData->UraianPekerjaan;
                $input['uraiantugas'] = $MsLowonganData->UraianTugas;
                $input['penempatan'] = $MsLowonganData->Penempatan;
                $input['batasumur'] = $MsLowonganData->BatasUmur;
                $input['jmlpria'] = $MsLowonganData->JmlPria;
                $input['jmlwanita'] = $MsLowonganData->JmlWanita;
                $input['jurusan'] = $MsLowonganData->Jurusan;
                $input['pengalaman'] = $MsLowonganData->Pengalaman;
                $input['syaratkhusus'] = $MsLowonganData->SyaratKhusus;
                $input['gajiperbulan'] = $MsLowonganData->GajiPerbulan;
                $input['jamkerjaseminggu'] = $MsLowonganData->JamKerjaSeminggu;
        }
?>
<table width="100%">
        <tr>
                <td align="center">
                        <table width="100%" class="table-form">
                                <thead>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                PROFIL LOWONGAN KERJA   
                                                        </div>
                                                </th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
                                                        <?php
                                                                if ($this->session->flashdata('error') != null){
                                                                    echo $this->session->flashdata('error');
                                                                }
                                                        ?>
                                                        </div>
                                                        <div align="center">
                                                                <form method="post" action="<?= site_url('admin/perusahaan/'.$IDPerusahaan.'/updatelowongan/'.$IDLowongan)?>">
                                                                        <table class="table-form" width="100%">
                                                                                <tbody>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        DATA LOWONGAN KERJA
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top" width="200px">
                                                                                                        Tanggal Berlaku
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="tglberlaku" name="tglberlaku" type="text" value="<?= $input != null ? $input['tglberlaku'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Tanggal Berakhir
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="tglberakhir" name="tglberakhir" type="text" value="<?= $input != null ? $input['tglberakhir'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Nama Lowongan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="namalowongan" name="namalowongan" type="text" value="<?= $input != null ? $input['namalowongan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Uraian Singkat Pekerjaan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="uraianpekerjaan" name="uraianpekerjaan" type="text" value="<?= $input != null ? $input['uraianpekerjaan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Uraian Tugas
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="uraiantugas" name="uraiantugas" type="text" value="<?= $input != null ? $input['uraiantugas'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Lokasi Penempatan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="penempatan" name="penempatan" type="text" value="<?= $input != null ? $input['penempatan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Jumlah Laki-laki
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jmlpria" name="jmlpria" type="text" value="<?= $input != null ? $input['jmlpria'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Jumlah Perempuan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jmlwanita" name="jmlwanita" type="text" value="<?= $input != null ? $input['jmlwanita'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Posisi Jabatan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idposisijabatan" name="idposisijabatan">
                                                                                                                <option value="">(Pilih Jabatan)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsPosisiJabatanData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idposisijabatan'] == $getcmb->IDPosisiJabatan)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDPosisiJabatan."' selected=\"selected\">".$getcmb->NamaPosisiJabatan."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDPosisiJabatan."'>".$getcmb->NamaPosisiJabatan."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        PERSYARATAN JABATAN
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Batas Umur
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="batasumur" name="batasumur" type="text" value="<?= $input != null ? $input['batasumur'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Pendidikan Formal
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idstatuspendidikan" name="idstatuspendidikan">
                                                                                                                <option value="">(Pilih Status Pendidikan)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsStatusPendidikanData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idstatuspendidikan'] == $getcmb->IDStatusPendidikan)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDStatusPendidikan."' selected=\"selected\">".$getcmb->NamaStatusPendidikan."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDStatusPendidikan."'>".$getcmb->NamaStatusPendidikan."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Jurusan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jurusan" name="jurusan" type="text" value="<?= $input != null ? $input['jurusan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Kategori
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idjenislowongan" name="idjenislowongan" onchange="GetKeahlian(this)">
                                                                                                                <option value="">(Pilih Kategori)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsJenisLowonganData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idjenislowongan'] == $getcmb->IDJenisLowongan)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDJenisLowongan."' selected=\"selected\">".$getcmb->NamaJenisLowongan."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDJenisLowongan."'>".$getcmb->NamaJenisLowongan."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Keahlian
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idkeahlian" name="idkeahlian">
                                                                                                                <option value="">(Pilih Keahlian)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsKeahlianData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idkeahlian'] == $getcmb->IDKeahlian)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDKeahlian."' selected=\"selected\">".$getcmb->NamaKeahlian."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDKeahlian."'>".$getcmb->NamaKeahlian."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Pengalaman
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="pengalaman" name="pengalaman" type="text" value="<?= $input != null ? $input['pengalaman'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Syarat Khusus
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="syaratkhusus" name="syaratkhusus" type="text" value="<?= $input != null ? $input['syaratkhusus'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        SISTEM PENGUPAHAN
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Sistem Pengupahan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idjenispengupahan" name="idjenispengupahan">
                                                                                                                <option value="">(Pilih Sistem Pengupahan)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsJenisPengupahanData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idjenispengupahan'] == $getcmb->IDJenisPengupahan)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDJenisPengupahan."' selected=\"selected\">".$getcmb->NamaJenisPengupahan."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDJenisPengupahan."'>".$getcmb->NamaJenisPengupahan."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Gaji Perbulan (Rp)
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="gajiperbulan" name="gajiperbulan" type="text" value="<?= $input != null ? $input['gajiperbulan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Status Hubungan Kerja
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idstatushubungankerja" name="idstatushubungankerja">
                                                                                                                <option value="">(Pilih Status Hubungan Kerja)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsStatusHubunganKerjaData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idstatushubungankerja'] == $getcmb->IDStatusHubunganKerja)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDStatusHubunganKerja."' selected=\"selected\">".$getcmb->NamaStatusHubunganKerja."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDStatusHubunganKerja."'>".$getcmb->NamaStatusHubunganKerja."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Jumlah Jam Kerja Seminggu (Jam)
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jamkerjaseminggu" name="jamkerjaseminggu" type="text" value="<?= $input != null ? $input['jamkerjaseminggu'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top" colspan="2">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input type="hidden" value="submit" name="submit">
                                                                                                        <input id="submit" name="submit" type="submit" value="Simpan">
                                                                                                        <a class="confirmLink button" href="<?= site_url('admin/perusahaan/'.$IDPerusahaan.'/deletelowongan/'.$IDLowongan) ?>">Hapus</a>
                                                                                                        <a class="button" href="<?= site_url('admin/perusahaan/'.$IDPerusahaan.'/lowongan') ?>">Batal</a>
                                                                                                        <div id="dialog" title="Konfirmasi">
                                                                                                                Apakah anda yakin ingin menghapus lowongan?
                                                                                                        </div>

                                                                                                </td>
                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </form>
                                                        </div>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>

<script>
$(document).ready(function() {
        $("#dialog:ui-dialog").dialog( "destroy" );
        $("#dialog").dialog({
                autoOpen: false,
                modal: true
        });
        $(".confirmLink").click(function(e) {
                e.preventDefault();
                var targetUrl = $(this).attr("href");
                $("#dialog").dialog({
                        buttons : {
                                "Hapus" : function() {
                                        window.location.href = targetUrl;
                                },
                                "Batal" : function() {
                                        $(this).dialog("close");
                                }
                        }
                });
                $("#dialog").dialog("open");
        });
});


$("#tglberlaku").datepicker({
        constrainInput: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        defaultDate: new Date(),
        onSelect: function(dateText, instance)
        {
                //alert(dateText);
        },
        onClose: function()
        {
            //this.focus();
        }
});

$("#tglberakhir").datepicker({
        constrainInput: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        defaultDate: new Date(),
        onSelect: function(dateText, instance)
        {
                //alert(dateText);
        },
        onClose: function()
        {
            //this.focus();
        }
});

$("#batasumur").keypress(function (e){
        return NumericHandleKey(e);
});

$("#jmlpria").keypress(function (e){
        return NumericHandleKey(e);
});

$("#jmlwanita").keypress(function (e){
        return NumericHandleKey(e);
});

$("#gajiperbulan").keypress(function (e){
        return NumericHandleKey(e);
});

$("#jamkerjaseminggu").keypress(function (e){
        return NumericHandleKey(e);
});

function NumericHandleKey(e)
{
        if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
        {
                return false;
        }
}

function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
}

function GetKeahlian(id)
{
        $.post('<?= site_url('GetKeahlian') ?>/'+id.value,
        function(data){
                document.getElementById('idkeahlian').innerHTML = data
        })
}

function getFormattedDate(date)
{
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
}
</script>