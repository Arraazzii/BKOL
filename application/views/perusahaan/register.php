<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pendaftaran
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url() ?>">Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form method="POST" class="form-horizontal" role="form" action="<?= site_url('register/1')?>" enctype="multipart/form-data">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo form_error('username') ? 'has-error' : '' ?>">
          <label for="username" class="control-label col-md-3">Nama pengguna</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="username" name="username" type="text" value="<?= isset($input['username']) ? $input['username'] : '' ?>" size="20" autofocus>
            <?php echo form_error('username', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
          <label for="password" class="control-label col-md-3">Kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="password" name="password" type="password" value="<?= isset($input) ? $input['password'] : ''; ?>" size="20">
            <?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('password2') ? 'has-error' : '' ?>">
          <label for="password2" class="control-label col-md-3">Konfirmasi kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="password2" name="password2" type="password" value="<?= isset($input) ? $input['password2'] : ''; ?>" size="20">
            <?php echo form_error('password2', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        </div>
      <!-- /.box-body -->
    </div>
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Perusahaan</h3>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo form_error('namaperusahaan') ? 'has-error' : '' ?>">
          <label for="namaperusahaan" class="control-label col-md-3">Nama perusahaan</label>
          <div class="col-md-5">
            <input id="namaperusahaan" class="form-control input-sm" name="namaperusahaan" type="text" value="<?= isset($input) ? $input['namaperusahaan'] : '' ?>" size="20" maxlength="50">
            <?php echo form_error('namaperusahaan', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idbidangperusahaan') ? 'has-error' : '' ?>">
          <label for="" class="control-label col-md-3">Bidang perusahaan</label>
          <div class="col-md-5">
            <?php 
                $idbidang = 0;
                if (isset($input['idbidangperusahaan'])) {
                    $idbidang = $input['idbidangperusahaan'];
                }
                echo combo_bidang($idbidang);
            ?>
            <?php echo form_error('idbidangperusahaan', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
          <label for="tgllahir" class="control-label col-md-3">Email</label>
          <div class="col-md-5">
            <input id="email" name="email" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['email'] : '' ?>" size="20" maxlength="100">
            <?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('telepon') ? 'has-error' : '' ?>">
          <label for="telepon" class="control-label col-md-3">Telepon</label>
          <div class="col-md-5">
            <input id="telepon" name="telepon" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['telepon'] : '' ?>" size="20" maxlength="20">
            <?php echo form_error('telepon', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idkecamatan') ? 'has-error' : '' ?>">
          <label for="idkecamatan" class="control-label col-md-3">Kecamatan</label>
          <div class="col-md-5">
            <?php
              $active = isset($input['idkecamatan']) ? $input['idkecamatan'] : 0;
              echo combo_kecamatan($active); 
            ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idkelurahan') ? 'has-error' : '' ?>">
          <label for="kelurahan" class="control-label col-md-3">Kelurahan</label>
          <div class="col-md-5">
            <select id="idkelurahan" class="form-control input-sm" name="idkelurahan">
                <option value="">- Pilih Desa / Kelurahan -</option>
            </select>
            <?php echo form_error('idkelurahan', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
          <label for="alamant" class="control-label col-md-3">Alamat</label>
          <div class="col-md-5">
            <textarea id="alamat" name="alamat" class="form-control input-sm" cols="30" rows="3" maxlength="400"><?= isset($input) ? $input['alamat'] : '' ?></textarea>
            <?php echo form_error('alamat', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('kodepos') ? 'has-error' : '' ?>">
          <label for="kodepos" class="control-label col-md-3">Kode pos</label>
          <div class="col-md-4">
            <input id="kodepos" name="kodepos" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
            <?php echo form_error('kodepos', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('kota') ? 'has-error' : '' ?>">
          <label for="kota" class="control-label col-md-3">Kota</label>
          <div class="col-md-4">
            <input id="kota" class="form-control input-sm" name="kota" type="text" value="<?= isset($input) ? $input['kota'] : '' ?>" size="20" maxlength="20">
            <?php echo form_error('kota', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('propinsi') ? 'has-error' : '' ?>">
          <label for="propinsi" class="control-label col-md-3">Provinsi</label>
          <div class="col-md-4">
            <input id="propinsi" class="form-control input-sm" name="propinsi" type="text" value="<?= isset($input) ? $input['propinsi'] : '' ?>" size="20" maxlength="20">
            <?php echo form_error('propinsi', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pemberi Kerja</h3>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo form_error('namapemberikerja') ? 'has-error' : '' ?>">
          <label for="namapemberikerja" class="control-label col-md-3">Nama lengkap</label>
          <div class="col-md-4">
            <input id="namapemberikerja" class="form-control input-sm" name="namapemberikerja" type="text" value="<?= isset($input) ? $input['namapemberikerja'] : '' ?>" size="20">
            <?php echo form_error('namapemberikerja', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('jabatanpemberikerja') ? 'has-error' : '' ?>">
          <label for="jabatanpemberikerja" class="control-label col-md-3">Jabatan </label>
          <div class="col-md-5">
            <input id="jabatanpemberikerja" class="form-control input-sm" name="jabatanpemberikerja" type="text" value="<?= isset($input) ? $input['jabatanpemberikerja'] : '' ?>" size="20">
            <?php echo form_error('jabatanpemberikerja', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('teleponpemberikerja') ? 'has-error' : '' ?>">
          <label for="teleponpemberikerja" class="control-label col-md-3">Telepon </label>
          <div class="col-md-5">
            <input id="teleponpemberikerja" class="form-control input-sm" name="teleponpemberikerja" type="text" value="<?= isset($input) ? $input['teleponpemberikerja'] : '' ?>" size="20">
            <?php echo form_error('teleponpemberikerja', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('emailpemberikerja') ? 'has-error' : '' ?>">
          <label for="emailpemberikerja" class="control-label col-md-3">Email</label>
          <div class="col-md-5">
            <input id="emailpemberikerja" class="form-control input-sm" name="emailpemberikerja" type="text" value="<?= isset($input) ? $input['emailpemberikerja'] : '' ?>" size="20">
            <?php echo form_error('emailpemberikerja', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-primary box-solid">
      <div class="box-body">
        <div class="text-center">
          <input type="hidden" name="submit" value="submit">
          <a href="<?= site_url() ?>" class="btn btn-default btn-sm">Batal</a>
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</section>
<script type="text/javascript">
$("#idkecamatan").change(function() {
    var IDKecamatan = $("#idkecamatan").val();
    GetKelurahan(IDKecamatan);
});


function GetKelurahan(IDKecamatan, selected = 0)
{
    $.ajax({
        url: '<?php echo site_url('ajax/get_kelurahan') ?>',
        type: 'POST',
        dataType: 'html',
        data: {
          IDKecamatan: IDKecamatan,
          selected: selected
        },
        success: function(data) {
            $("#idkelurahan").html(data);
        }
    });
}

<?php  
  if (isset($input['idkecamatan'])) {
    if ($input['idkecamatan'] != '') {
        $activekec = $input['idkecamatan'];
        $activekel = isset($input['idkelurahan']) && $input['idkelurahan'] != '' ? $input['idkelurahan'] : 0;
        echo "GetKelurahan(".$activekec.",".$activekel.");";
    }
  }
?>

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
</script>
<!-- /.content -->