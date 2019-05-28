
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li><a href="<?php echo site_url('perusahaan/index') ?>">Perusahaan</a></li>
        <li><a href="<?php echo site_url('perusahaan/lowongan') ?>">Lowongan Kerja</a></li>
        <li class="active">Tambah Data</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/lowongan/tambahdata')?>">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Lowongan Kerja</h3>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo form_error('tglberlaku') ? 'has-error' : '' ?>">
                    <label for="tglberlaku" class="control-label col-md-3">Tanggal berlaku</label>
                    <div class="col-md-5">
                        <input id="tglberlaku" name="tglberlaku" class="form-control input-sm" type="text" value="<?= $input != null ? $input['tglberlaku'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                        <?php echo form_error('tglberlaku', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('tglberakhir') ? 'has-error' : '' ?>">
                    <label for="tglberakhir" class="control-label col-md-3">Tanggal berakhir</label>
                    <div class="col-md-5">
                        <input id="tglberakhir" name="tglberakhir" class="form-control input-sm" type="text" value="<?= $input != null ? $input['tglberakhir'] : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                        <?php echo form_error('tglberakhir', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('namalowongan') ? 'has-error' : '' ?>">
                    <label for="namalowongan" class="control-label col-md-3">Nama Lowongan</label>
                    <div class="col-md-5">
                        <input id="namalowongan" name="namalowongan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['namalowongan'] : '' ?>" size="20">
                        <?php echo form_error('namalowongan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('uraianpekerjaan') ? 'has-error' : '' ?>">
                    <label for="uraianpekerjaan" class="control-label col-md-3">Rincian pekerjaan</label>
                    <div class="col-md-5">
                        <input id="uraianpekerjaan" class="form-control input-sm" name="uraianpekerjaan" type="text" value="<?= $input != null ? $input['uraianpekerjaan'] : '' ?>" size="20">
                        <?php echo form_error('uraianpekerjaan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('uraiantugas') ? 'has-error' : '' ?>">
                    <label for="uraiantugas" class="control-label col-md-3">Uraian tugas</label>
                    <div class="col-md-5">
                        <input id="uraiantugas" name="uraiantugas" class="form-control input-sm" type="text" value="<?= $input != null ? $input['uraiantugas'] : '' ?>" size="20">
                        <?php echo form_error('uraiantugas', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('penempatan') ? 'has-error' : '' ?>">
                    <label for="penempatan" class="control-label col-md-3">Lokasi penempatan</label>
                    <div class="col-md-5">
                        <input id="penempatan" name="penempatan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['penempatan'] : '' ?>" size="20">
                        <?php echo form_error('penempatan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Informasi Lowongan Pekerjaan</h3>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo form_error('jmlpria') ? 'has-error' : '' ?>">
                    <label for="jmlpria" class="control-label col-md-3">Jumlah laki-laki</label>
                    <div class="col-md-5">
                        <input id="jmlpria" name="jmlpria" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jmlpria'] : '0' ?>" size="20">
                        <?php echo form_error('jmlpria', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('jmlwanita') ? 'has-error' : '' ?>">
                    <label for="jmlwanita" class="control-label col-md-3">Jumlah perempuan</label>
                    <div class="col-md-5">
                        <input id="jmlwanita" name="jmlwanita" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jmlwanita'] : '0' ?>" size="20">
                        <?php echo form_error('jmlwanita', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title">Persyaratan Jabatan</h3>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo form_error('batasumur') ? 'has-error' : '' ?>">
                    <label for="batasumur" class="control-label col-md-3">Batas umur</label>
                    <div class="col-md-5">
                        <input id="batasumur" name="batasumur" class="form-control input-sm" type="text" value="<?= $input != null ? $input['batasumur'] : '0' ?>" size="20">
                        <?php echo form_error('batasumur', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idstatuspendidikan') ? 'has-error' : '' ?>">
                    <label for="idstatuspendidikan" class="control-label col-md-3">Pendidikan formal</label>
                    <div class="col-md-5">
                        <select id="idstatuspendidikan" name="idstatuspendidikan" class="form-control input-sm">
                            <option value="">(Pilih Status Pendidikan)</option>
                            <?php
                            foreach ($MsStatusPendidikanData as $getcmb)
                            {
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idstatuspendidikan'] == $getcmb->IDStatusPendidikan)
                                    {
                                        echo "<option value='".$getcmb->IDStatusPendidikan."' selected=\"selected\">".$getcmb->NamaStatusPendidikan."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDStatusPendidikan."'>".$getcmb->NamaStatusPendidikan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idstatuspendidikan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idposisijabatan') ? 'has-error' : '' ?>">
                    <label for="idposisijabatan" class="control-label col-md-3">Posisi jabatan</label>
                    <div class="col-md-5">
                        <select id="idposisijabatan" name="idposisijabatan" class="form-control input-sm">
                            <option value="">(Pilih Jabatan)</option>
                            <?php
                            foreach ($MsPosisiJabatanData as $getcmb)
                            {
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idposisijabatan'] == $getcmb->IDPosisiJabatan)
                                    {
                                        echo "<option value='".$getcmb->IDPosisiJabatan."' selected=\"selected\">".$getcmb->NamaPosisiJabatan."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDPosisiJabatan."'>".$getcmb->NamaPosisiJabatan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idposisijabatan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('jurusan') ? 'has-error' : '' ?>">
                    <label for="jurusan" class="control-label col-md-3">Jurusan</label>
                    <div class="col-md-5">
                        <input id="jurusan" name="jurusan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jurusan'] : '' ?>" size="20">
                        <?php echo form_error('jurusan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idjenislowongan') ? 'has-error' : '' ?>">
                    <label for="idjenislowongan" class="control-label col-md-3">Kategori</label>
                    <div class="col-md-5">
                        <select id="idjenislowongan" name="idjenislowongan" class="form-control input-sm" onchange="GetKeahlian(this)">
                            <option value="">(Pilih Kategori)</option>
                            <?php
                            foreach ($MsJenisLowonganData as $getcmb)
                            {   
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idjenislowongan'] == $getcmb->IDJenisLowongan)
                                    {
                                        echo "<option value='".$getcmb->IDJenisLowongan."' selected=\"selected\">".$getcmb->NamaJenisLowongan."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDJenisLowongan."'>".$getcmb->NamaJenisLowongan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idjenislowongan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idkeahlian') ? 'has-error' : '' ?>">
                    <label for="idkeahlian" class="control-label col-md-3">Keahlian</label>
                    <div class="col-md-5">
                        <select id="idkeahlian" name="idkeahlian" class="form-control input-sm">
                            <option value="">(Pilih Keahlian)</option>
                            <?php
                            foreach ($MsKeahlianData as $getcmb)
                            {
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idkeahlian'] == $getcmb->IDKeahlian)
                                    {
                                        echo "<option value='".$getcmb->IDKeahlian."' selected=\"selected\">".$getcmb->NamaKeahlian."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDKeahlian."'>".$getcmb->NamaKeahlian."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idkeahlian', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('pengalaman') ? 'has-error' : '' ?>">
                    <label for="pengalaman" class="control-label col-md-3">Pengalaman</label>
                    <div class="col-md-5">
                        <textarea id="pengalaman" name="pengalaman" class="form-control input-sm" cols="30" rows="3" maxlength="500"><?= $input != null ? $input['pengalaman'] : '' ?></textarea>
                        <?php echo form_error('pengalaman', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('syaratkhusus') ? 'has-error' : '' ?>">
                    <label for="syaratkhusus" class="control-label col-md-3">Syarat khusus</label>
                    <div class="col-md-5">
                        <textarea id="syaratkhusus" name="syaratkhusus" class="form-control input-sm" cols="30" rows="3" maxlength="500"><?= $input != null ? $input['syaratkhusus'] : '' ?></textarea>
                        <?php echo form_error('syaratkhusus', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Sistem Pengupahan</h3>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo form_error('idjenispengupahan') ? 'has-error' : '' ?>">
                    <label for="idjenispengupahan" class="control-label col-md-3">Jenis pengupahan</label>
                    <div class="col-md-5">
                        <select id="idjenispengupahan" name="idjenispengupahan" class="form-control input-sm">
                            <option value="">(Pilih Sistem Pengupahan)</option>
                            <?php
                            foreach ($MsJenisPengupahanData as $getcmb)
                            {
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idjenispengupahan'] == $getcmb->IDJenisPengupahan)
                                    {
                                        echo "<option value='".$getcmb->IDJenisPengupahan."' selected=\"selected\">".$getcmb->NamaJenisPengupahan."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDJenisPengupahan."'>".$getcmb->NamaJenisPengupahan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idjenispengupahan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('gajiperbulan') ? 'has-error' : '' ?>">
                    <label for="gajiperbulan" class="control-label col-md-3">Gaji Perbulan (Rp)</label>
                    <div class="col-md-5">
                        <input id="gajiperbulan" name="gajiperbulan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['gajiperbulan'] : '0' ?>" size="20">
                        <?php echo form_error('gajiperbulan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idstatushubungankerja') ? 'has-error' : '' ?>">
                    <label for="idstatushubungankerja" class="control-label col-md-3">Status Hub. Kerja</label>
                    <div class="col-md-5">
                        <select id="idstatushubungankerja" name="idstatushubungankerja" class="form-control input-sm">
                            <option value="">(Pilih Status Hubungan Kerja)</option>
                            <?php
                            foreach ($MsStatusHubunganKerjaData as $getcmb)
                            {
                                if ($this->uri->segment(4) == "detail") {
                                    if ($input['idstatushubungankerja'] == $getcmb->IDStatusHubunganKerja)
                                    {
                                        echo "<option value='".$getcmb->IDStatusHubunganKerja."' selected=\"selected\">".$getcmb->NamaStatusHubunganKerja."</option>";
                                    }
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDStatusHubunganKerja."'>".$getcmb->NamaStatusHubunganKerja."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idstatushubungankerja', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('jamkerjaseminggu') ? 'has-error' : '' ?>">
                    <label for="jamkerjaseminggu" class="control-label col-md-3">Jam Kerja (jam/minggu)</label>
                    <div class="col-md-5">
                        <input id="jamkerjaseminggu" name="jamkerjaseminggu" class="form-control input-sm" type="text" value="<?= $input != null ? $input['jamkerjaseminggu'] : '0' ?>" size="20">
                        <?php echo form_error('jamkerjaseminggu', '<span class="help-block">', '</span>'); ?>
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