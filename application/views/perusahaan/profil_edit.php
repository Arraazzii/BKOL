<?php
if($this->input->post() == NULL)
{
    $input['namaperusahaan'] = $MsPerusahaanData->NamaPerusahaan;
    $input['idbidangperusahaan'] = $MsPerusahaanData->IDBidangPerusahaan;
    $input['email'] = $MsPerusahaanData->Email;
    $input['telepon'] = $MsPerusahaanData->Telepon;
    $input['alamat'] = $MsPerusahaanData->Alamat;
    $input['kodepos'] = $MsPerusahaanData->KodePos;
    $input['idkecamatan'] = $MsPerusahaanData->IDKecamatan;
    $input['idkelurahan'] = $MsPerusahaanData->IDKelurahan;
    $input['kota'] = $MsPerusahaanData->Kota;
    $input['propinsi'] = $MsPerusahaanData->Propinsi;
}
?>
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Profil Perusahaan
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li><a href="<?php echo site_url('') ?>">Perusahaan</a></li>
        <li class="active">Edit Profil</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/editprofil') ?>" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">EDIT PROFIL PERUSAHAAN</h3>
            </div>
            <div class="box-body">
                <div class="form-group <?php echo form_error('logoperusahaan') ? 'has-error' : '' ?>">
                    <label for="nomorindukpencaker" class="control-label col-md-3">Logo perusahaan</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Pilih File... <input type="file" id="logoperusahaan" name="logoperusahaan">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'
                        <?php  
                        if (file_exists(BASEPATH.'/../assets/file/perusahaan/'.$MsPerusahaanData->IDPerusahaan.'.jpg')) {
                            echo "src='".site_url('assets/file/perusahaan')."/".$MsPerusahaanData->IDPerusahaan.".jpg'";
                        }
                        ?>
                        />
                        <?php echo form_error('logoperusahaan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('namaperusahaan') ? 'has-error' : '' ?>">
                    <label for="nomorindukpencaker" class="control-label col-md-3">Nama perusahaan</label>
                    <div class="col-md-5">
                        <input id="namaperusahaan" class="form-control input-sm" name="namaperusahaan" type="text" value="<?= $input != null ? $input['namaperusahaan'] : '' ?>" size="20" maxlength="50">
                        <?php echo form_error('namaperusahaan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idbidangperusahaan') ? 'has-error' : '' ?>">
                    <label for="jeniskelamin" class="control-label col-md-3">Bidang perusahaan</label>
                    <div class="col-md-5">
                        <select id="idbidangperusahaan" class="form-control input-sm" name="idbidangperusahaan">
                            <option value="">(Pilih Bidang)</option>
                            <?php
                            foreach ($MsBidangPerusahaanData as $getcmb)
                            {
                                if ($input['idbidangperusahaan'] == $getcmb->IDBidangPerusahaan)
                                {
                                    echo "<option value='".$getcmb->IDBidangPerusahaan."' selected=\"selected\">".$getcmb->NamaBidangPerusahaan."</option>";
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDBidangPerusahaan."'>".$getcmb->NamaBidangPerusahaan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idbidangperusahaan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                    <label for="tgllahir" class="control-label col-md-3">Email</label>
                    <div class="col-md-5">
                        <input id="email" name="email" class="form-control input-sm" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">
                        <?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('telepon') ? 'has-error' : '' ?>">
                    <label for="telepon" class="control-label col-md-3">Telepon</label>
                    <div class="col-md-5">
                        <input id="telepon" name="telepon" class="form-control input-sm" type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">
                        <?php echo form_error('telepon', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
                    <label for="alamant" class="control-label col-md-3">Alamat</label>
                    <div class="col-md-5">
                        <textarea id="alamat" name="alamat" class="form-control input-sm" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>
                        <?php echo form_error('alamat', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idkecamatan') ? 'has-error' : '' ?>">
                    <label for="kecamatan" class="control-label col-md-3">Kecamatan</label>
                    <div class="col-md-5">
                        <select id="idkecamatan" class="form-control input-sm" name="idkecamatan" onchange="GetKelurahan(this)">
                            <option value="">(Pilih Kecamatan)</option>
                            <?php
                            foreach ($MsKecamatanData as $getcmb)
                            {
                                if ($input['idkecamatan'] == $getcmb->IDKecamatan)
                                {
                                    echo "<option value='".$getcmb->IDKecamatan."' selected=\"selected\">".$getcmb->NamaKecamatan."</option>";
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDKecamatan."'>".$getcmb->NamaKecamatan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idkecamatan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('idkelurahan') ? 'has-error' : '' ?>">
                    <label for="kelurahan" class="control-label col-md-3">Kelurahan</label>
                    <div class="col-md-5">
                        <select id="idkelurahan" class="form-control input-sm" name="idkelurahan">
                            <option value="">(Pilih Kelurahan)</option>
                            <?php
                            foreach ($MsKelurahanData as $getcmb)
                            {
                                if ($input['idkelurahan'] == $getcmb->IDKelurahan)
                                {
                                    echo "<option value='".$getcmb->IDKelurahan."' selected=\"selected\">".$getcmb->NamaKelurahan."</option>";
                                }
                                else
                                {
                                    echo "<option value='".$getcmb->IDKelurahan."'>".$getcmb->NamaKelurahan."</option>";
                                }
                            }
                            ?>
                        </select>
                        <?php echo form_error('idkelurahan', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('kodepos') ? 'has-error' : '' ?>">
                    <label for="kodepos" class="control-label col-md-3">Kode pos</label>
                    <div class="col-md-4">
                        <input id="kodepos" name="kodepos" class="form-control input-sm" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kota" class="control-label col-md-3">Kota</label>
                    <div class="col-md-4">
                        <input id="kota" class="form-control input-sm" name="kota" type="text" value="<?= $input != null ? $input['kota'] : '' ?>" size="20" maxlength="20">
                        <?php echo form_error('kota', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('propinsi') ? 'has-error' : '' ?>">
                    <label for="propinsi" class="control-label col-md-3">Provinsi</label>
                    <div class="col-md-4">
                        <input id="propinsi" class="form-control input-sm" name="propinsi" type="text" value="<?= $input != null ? $input['propinsi'] : '' ?>" size="20" maxlength="20">
                        <?php echo form_error('propinsi', '<span class="help-block">', '</span>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-3">
                        <a class="btn btn-default btn-sm" href="<?= site_url() ?>">Kembali</a>
                        <input id="simpan" class="btn btn-primary btn-sm" name="simpan" type="submit" value="Simpan">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    function GetKelurahan(id)
    {
        $.post('<?= site_url('GetKelurahan') ?>/'+id.value,
            function(data){
                document.getElementById('idkelurahan').innerHTML = data
            })
    }

    function getFormattedDate(date)
    {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
    }
    document.addEventListener('DOMContentLoaded', function() {
        $("#username").keypress(function (e){
            if (e.which==32)
            {
                return false
            }
        });
    });

    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
            log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logoperusahaan").change(function(){
            readURL(this);
        });   
    });
</script>
<!-- /.content -->