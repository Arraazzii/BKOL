
<!-- Content Header (Page header) -->
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
<section class="content-header">
    <h1>
        Profil
        <small>Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Home</a></li>
        <li><a href="<?php echo site_url('admin') ?>">Perusahaan</a></li>
        <li class="active">Lowongan Kerja</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/addlowongan')?>">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Lowongan Kerja</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="tglberlaku" class="control-label col-md-3">Tanggal berlaku</label>
                    <div class="col-md-3">
                        <input id="tglberlaku" name="tglberlaku" class="form-control input-sm" type="text" value="<?= $input != null ? $input['tglberlaku'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tglberakhir" class="control-label col-md-3">Tanggal berakhir</label>
                    <div class="col-md-3">
                        <input id="tglberakhir" name="tglberakhir" class="form-control input-sm" type="text" value="<?= $input != null ? $input['tglberakhir'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="namalowongan" class="control-label col-md-3">Nama Lowongan</label>
                    <div class="col-md-5">
                        <input id="namalowongan" name="namalowongan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['namalowongan'] : '' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uraianpekerjaan" class="control-label col-md-3">Rincian pekerjaan</label>
                    <div class="col-md-5">
                        <input id="uraianpekerjaan" class="form-control input-sm" name="uraianpekerjaan" type="text" value="<?= $input != null ? $input['uraianpekerjaan'] : '' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uraiantugas" class="control-label col-md-3">Uraian tugas</label>
                    <div class="col-md-5">
                        <input id="uraiantugas" name="uraiantugas" class="form-control input-sm" type="text" value="<?= $input != null ? $input['uraiantugas'] : '' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="penempatan" class="control-label col-md-3">Lokasi penempatan</label>
                    <div class="col-md-5">
                        <input id="penempatan" name="penempatan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['penempatan'] : '' ?>" size="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Lowongan Pekerjaan</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="jmlpria" class="control-label col-md-3">Jumlah laki-laki</label>
                    <div class="col-md-3">
                        <input id="jmlpria" name="jmlpria" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jmlpria'] : '0' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jmlwanita" class="control-label col-md-3">Jumlah perempuan</label>
                    <div class="col-md-3">
                        <input id="jmlwanita" name="jmlwanita" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jmlwanita'] : '0' ?>" size="20">
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default box-solid">
            <div class="box-header">
                <h3 class="box-title">Persyaratan Jabatan</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="batasumur" class="control-label col-md-3">Batas umur</label>
                    <div class="col-md-3">
                        <input id="batasumur" name="batasumur" class="form-control input-sm" type="text" value="<?= $input != null ? $input['batasumur'] : '0' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="idstatuspendidikan" class="control-label col-md-3">Pendidikan formal</label>
                    <div class="col-md-4">
                        <select id="idstatuspendidikan" name="idstatuspendidikan" class="form-control input-sm">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="idposisijabatan" class="control-label col-md-3">Posisi jabatan</label>
                    <div class="col-md-4">
                        <select id="idposisijabatan" name="idposisijabatan" class="form-control input-sm">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="jurusan" class="control-label col-md-3">Jurusan</label>
                    <div class="col-md-5">
                        <input id="jurusan" name="jurusan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jurusan'] : '' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="idjenislowongan" class="control-label col-md-3">Kategori</label>
                    <div class="col-md-3">
                        <select id="idjenislowongan" name="idjenislowongan" class="form-control input-sm" onchange="GetKeahlian(this)">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="idkeahlian" class="control-label col-md-3">Keahlian</label>
                    <div class="col-md-3">
                        <select id="idkeahlian" name="idkeahlian" class="form-control input-sm">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="pengalaman" class="control-label col-md-3">Pengalaman</label>
                    <div class="col-md-5">
                        <textarea id="pengalaman" name="pengalaman" class="form-control input-sm" cols="30" rows="3" maxlength="500"><?= $input != null ? $input['pengalaman'] : '' ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="syaratkhusus" class="control-label col-md-3">Syarat khusus</label>
                    <div class="col-md-5">
                        <textarea id="syaratkhusus" name="syaratkhusus" class="form-control input-sm" cols="30" rows="3" maxlength="500"><?= $input != null ? $input['syaratkhusus'] : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Sistem Pengupahan</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="idjenispengupahan" class="control-label col-md-3">Jenis pengupahan</label>
                    <div class="col-md-3">
                        <select id="idjenispengupahan" name="idjenispengupahan" class="form-control input-sm">
                            <option value="">(Pilih Sistem Pengupahan)</option>
                            <?php
                            foreach ($MsJenisPengupahanData as $getcmb)
                            {
                                if ($input['idjenislowongan'] == $getcmb->IDJenisPengupahan)
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="gajiperbulan" class="control-label col-md-3">Gaji Perbulan (Rp)</label>
                    <div class="col-md-5">
                        <input id="gajiperbulan" name="gajiperbulan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['gajiperbulan'] : '0' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="idstatushubungankerja" class="control-label col-md-3">Status Hub. Kerja</label>
                    <div class="col-md-3">
                        <select id="idstatushubungankerja" name="idstatushubungankerja" class="form-control input-sm">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="jamkerjaseminggu" class="control-label col-md-3">Jam Kerja (jam/minggu)</label>
                    <div class="col-md-3">
                        <input id="jamkerjaseminggu" name="jamkerjaseminggu" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jamkerjaseminggu'] : '0' ?>" size="20">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                        <a class="btn btn-default btn-sm" href="<?= site_url('perusahaan/lowongan') ?>">Batal</a>
                        <input id="simpan" class="btn btn-primary btn-sm" name="simpan" type="submit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    function NumericHandleKey(e)
    {
        if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
        {
            return false;
        }
    }

    function GetKeahlian(id)
    {
        $.post('<?= site_url('GetKeahlian') ?>/'+id.value,
            function(data){
                document.getElementById('idkeahlian').innerHTML = data
            })
    }

    function getFormattedDate()
    {
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
    }

    document.addEventListener('DOMContentLoaded', function() {
        $("#tglberlaku").datepicker({
            format: "dd-mm-yyyy",
            startDate: getFormattedDate(),
            autoclose: true,
        });

        $("#tglberakhir").datepicker({
            format: "dd-mm-yyyy",
            startDate: getFormattedDate(),
            autoclose: true,
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
    });
</script>
<!-- /.content -->