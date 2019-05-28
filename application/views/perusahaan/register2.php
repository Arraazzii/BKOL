<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pendaftaran
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Register</a></li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div align="center">
    <?php
    if ($this->session->flashdata('error') != null){
      echo $this->session->flashdata('error');
    }
    $input = $this->session->flashdata('input');
    if ($input != NULL)
    {
      $MsKelurahanData = $input['MsKelurahanData'];
    }
    ?>
  </div>
  <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/doregister')?>">
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="username" class="control-label col-md-3">Nama pengguna</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="username" name="username" type="text" value="<?= $input != null ? $input['username'] : ''; ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="control-label col-md-3">Password</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="password" name="password" type="password" value="<?= $input != null ? $input['password'] : ''; ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="password2" class="control-label col-md-3">Konfirmasi kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="password2" name="password2" type="password" value="<?= $input != null ? $input['password2'] : ''; ?>" size="20">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Perusahaan</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="nomorindukpencaker" class="control-label col-md-3">Nama perusahaan</label>
          <div class="col-md-5">
            <input id="namaperusahaan" class="form-control input-sm" required name="namaperusahaan" type="text" value="<?= $input != null ? $input['namaperusahaan'] : '' ?>" size="20" maxlength="50">
          </div>
        </div>
        <div class="form-group">
          <label for="jeniskelamin" class="control-label col-md-3">Bidang perusahaan</label>
          <div class="col-md-5">
            <select id="idbidangperusahaan" class="form-control input-sm" required name="idbidangperusahaan">
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
          </div>
        </div>
        <div class="form-group">
          <label for="tgllahir" class="control-label col-md-3">Email</label>
          <div class="col-md-5">
            <input id="email" name="email" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">
          </div>
        </div>
        <div class="form-group">
          <label for="telepon" class="control-label col-md-3">Telepon</label>
          <div class="col-md-5">
            <input id="telepon" name="telepon" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="alamant" class="control-label col-md-3">Alamat</label>
          <div class="col-md-5">
            <textarea id="alamat" name="alamat" class="form-control input-sm" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="kecamatan" class="control-label col-md-3">Kecamatan</label>
          <div class="col-md-5">
            <select id="idkecamatan" class="form-control input-sm" required name="idkecamatan" onchange="GetKelurahan(this)">
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
          </div>
        </div>
        <div class="form-group">
          <label for="kelurahan" class="control-label col-md-3">Kelurahan</label>
          <div class="col-md-5">
            <select id="idkelurahan" class="form-control input-sm" required name="idkelurahan">
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
          </div>
        </div>
        <div class="form-group">
          <label for="kodepos" class="control-label col-md-3">Kode pos</label>
          <div class="col-md-4">
            <input id="kodepos" name="kodepos" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
          </div>
        </div>
        <div class="form-group">
          <label for="kota" class="control-label col-md-3">Kota</label>
          <div class="col-md-4">
            <input id="kota" class="form-control input-sm" required name="kota" type="text" value="<?= $input != null ? $input['kota'] : '' ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="propinsi" class="control-label col-md-3">Provinsi</label>
          <div class="col-md-4">
            <input id="propinsi" class="form-control input-sm" required name="propinsi" type="text" value="<?= $input != null ? $input['propinsi'] : '' ?>" size="20" maxlength="20">
          </div>
        </div>
      </div>
    </div>
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pemberi Kerja</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="namapemberikerja" class="control-label col-md-3">Nama lengkap</label>
          <div class="col-md-4">
            <input id="namapemberikerja" class="form-control input-sm" required name="namapemberikerja" type="text" value="<?= $input != null ? $input['namapemberikerja'] : '' ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="jabatanpemberikerja" class="control-label col-md-3">Jabatan </label>
          <div class="col-md-5">
            <input id="jabatanpemberikerja" class="form-control input-sm" required name="jabatanpemberikerja" type="text" value="<?= $input != null ? $input['jabatanpemberikerja'] : '' ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="teleponpemberikerja" class="control-label col-md-3">Telepon </label>
          <div class="col-md-5">
            <input id="teleponpemberikerja" class="form-control input-sm" required name="teleponpemberikerja" type="text" value="<?= $input != null ? $input['teleponpemberikerja'] : '' ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="emailpemberikerja" class="control-label col-md-3">Email</label>
          <div class="col-md-5">
            <input id="emailpemberikerja" class="form-control input-sm" required name="emailpemberikerja" type="text" value="<?= $input != null ? $input['emailpemberikerja'] : '' ?>" size="20">
          </div>
        </div>
      </div>
    </div>
    <div class="box box-default box-solid">
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
</script>
<!-- /.content -->
<script type="text/javascript">
    window.addEventListener( "pageshow", function ( event ) {
      var historyTraversal = event.persisted || 
      ( typeof window.performance != "undefined" && 
          window.performance.navigation.type === 2 );
      if ( historyTraversal ) {
        window.location.reload();
    }
});
</script>