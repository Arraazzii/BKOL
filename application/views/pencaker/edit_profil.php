<?php
if (!$this->input->post()) 
{
  $tgllahir = explode("-", $MsPencakerData->TglLahir);
  $input['nomorindukpencaker'] = $MsPencakerData->NomorIndukPencaker;
  $input['idpencaker'] = $MsPencakerData->IDPencaker;
  $input['namapencaker'] = $MsPencakerData->NamaPencaker;
  $input['jeniskelamin'] = $MsPencakerData->JenisKelamin;
  $input['tempatlahir'] = $MsPencakerData->TempatLahir;
  $input['tgllahir'] = $tgllahir[2].'-'.$tgllahir[1].'-'.$tgllahir[0];
  $input['email'] = $MsPencakerData->Email;
  $input['telepon'] = $MsPencakerData->Telepon;
  $input['alamat'] = $MsPencakerData->Alamat;
  $input['idkecamatan'] = $MsPencakerData->IDKecamatan;
  $input['idkelurahan'] = $MsPencakerData->IDKelurahan;
  $input['kodepos'] = $MsPencakerData->KodePos;
  $input['kewarganegaraan'] = $MsPencakerData->Kewarganegaraan;
  $input['idagama'] = $MsPencakerData->IDAgama;
  $input['idstatuspernikahan'] = $MsPencakerData->IDStatusPernikahan;
}
?>

<!-- Content Header (Page header) -->
<section class="content-header container">
  <h1>
    Profil
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('') ?>">Home</a></li>
    <li>Pencaker</li>
    <li class="active">Edit Profil</li>
  </ol>
</section>
<!-- Main content -->
<section class="content container">
  <form class="form-horizontal" method="post" id="formedit" action="<?php echo site_url('pencaker/edit') ?>" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="panel-body text-center">
        <?php $filename = '/assets/file/pencaker/' . $MsPencakerData->IDPencaker .'.jpg' ?>
        <?php if (file_exists(BASEPATH.'/..'.$filename)): ?>
          <img src="<?php echo site_url($filename) ?>" class="img-circle profile-avatar" height="200" alt="User avatar">  
        <?php else: ?>
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle profile-avatar" alt="User avatar">  
        <?php endif ?>
        <h3 class="profile-username text-center"><?= $input != null ? $input['namapencaker'] : ''; ?></h3>
        <p class="text-muted text-center"><?= $input != null ? $input['email'] : '' ?></p>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">Edit Data Profil</h4>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label for="idpencaker" class="control-label col-md-3 col-md-offset-1">No. Pendaftaran</label>
          <div class="col-md-5">
            <input id="idpencaker" class="form-control" disabled type="text" value="<?= $MsPencakerData->IDPencaker ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="nomorindukpencaker" class="control-label col-md-3 col-md-offset-1">Nomor Induk Pencaker</label>
          <div class="col-md-5">
            <input type="hidden" name="nomorindukpencaker" value="<?= $input != null ? $input['nomorindukpencaker'] : ''; ?>">
            <input id="nomorindukpencaker" class="form-control" disabled type="text" value="<?= $input != null ? $input['nomorindukpencaker'] : ''; ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group <?php echo form_error('namapencaker') ? 'has-error' : '' ?>">
          <label for="namapencaker" class="control-label col-md-3 col-md-offset-1">Nama Pencari Kerja</label>
          <div class="col-md-5">
            <input id="namapencaker" name="namapencaker" class="form-control" type="text" value="<?= $input != null ? $input['namapencaker'] : ''; ?>" size="20" maxlength="20">
            <?php echo form_error('namapencaker', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('jeniskelamin') ? 'has-error' : '' ?>">
          <label for="jeniskelamin" class="control-label col-md-3 col-md-offset-1">Jenis Kelamin</label>
          <div class="col-md-5">
            <label class="radio-inline"><input name="jeniskelamin" value="0" type="radio" <?= $input['jeniskelamin'] == 0 ? 'checked="checked"' : ''; ?>>Pria</label>
            <label class="radio-inline"><input name="jeniskelamin" value="1" type="radio" <?= $input['jeniskelamin'] == 1 ? 'checked="checked"' : ''; ?>>Wanita</label>
          </div>
        </div> 
        <div class="form-group <?php echo form_error('tempatlahir') ? 'has-error' : '' ?>">
          <label for="tempatlahir" class="control-label col-md-3 col-md-offset-1">Tempat Lahir</label>
          <div class="col-md-5">
            <input id="tempatlahir" class="form-control" name="tempatlahir" type="text" value="<?= $input != null ? $input['tempatlahir'] : '' ?>" size="20" maxlength="20">
            <?php echo form_error('tempatlahir', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('tgllahir') ? 'has-error' : '' ?>">
          <label for="tgllahir" class="control-label col-md-3 col-md-offset-1">Tanggal Lahir</label>
          <div class="col-md-5">
            <input id="tgllahir" name="tgllahir" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['tgllahir'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" readonly size="10" maxlength="10">
            <?php echo form_error('tgllahir', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
          <label for="tgllahir" class="control-label col-md-3 col-md-offset-1">Email</label>
          <div class="col-md-5">
            <input id="email" name="email" class="form-control" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">
            <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('telepon') ? 'has-error' : '' ?>">
          <label for="telepon" class="control-label col-md-3 col-md-offset-1">Telepon</label>
          <div class="col-md-5">
            <input id="telepon" name="telepon" class="form-control" type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">
            <?php echo form_error('telepon', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('foto') ? 'has-error' : '' ?>">
          <label for="photo" class="control-label col-md-3 col-md-offset-1">Foto</label>
          <div class="col-md-5">
            <input id="photo" name="photo" type="file">
            <?php echo form_error('photo', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('foto') ? 'has-error' : '' ?>">
          <label for="alamant" class="control-label col-md-3 col-md-offset-1">Alamat</label>
          <div class="col-md-5">
            <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idkecamatan') ? 'has-error' : '' ?>">
          <label for="kecamatan" class="control-label col-md-3 col-md-offset-1">Kecamatan</label>
          <div class="col-md-5">
            <select id="idkecamatan" class="form-control" name="idkecamatan" onchange="GetKelurahan(this)">
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
        <div class="form-group <?php echo form_error('idkelurahan') ? 'has-error' : '' ?>">
          <label for="kelurahan" class="control-label col-md-3 col-md-offset-1">Kelurahan</label>
          <div class="col-md-5">
            <select id="idkelurahan" class="form-control" name="idkelurahan">
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
            <?php echo form_error('idkelurahan', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('kodepos') ? 'has-error' : '' ?>">
          <label for="kodepos" class="control-label col-md-3 col-md-offset-1">Kode pos</label>
          <div class="col-md-5">
            <input id="kodepos" name="kodepos" class="form-control" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
            <?php echo form_error('kodepos', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group">
          <label for="kewarganegaraan" class="control-label col-md-3 col-md-offset-1">Kewarganegaraan</label>
          <div class="col-md-5">
            <label class="radio-inline"><input name="kewarganegaraan" value="0" type="radio" <?= $input['kewarganegaraan'] == 0 ? 'checked="checked"' : '' ?>>WNI</label>
            <label class="radio-inline"><input name="kewarganegaraan" value="1" type="radio" <?= $input['kewarganegaraan'] == 1 ? 'checked="checked"' : '' ?>>WNA</label>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idagama') ? 'has-error' : '' ?>">
          <label for="agama" class="control-label col-md-3 col-md-offset-1">Agama</label>
          <div class="col-md-5">
            <select id="idagama" class="form-control" name="idagama">
              <option value="">(Pilih Agama)</option>
              <?php
              foreach ($MsAgamaData as $getcmb)
              {
                if ($input['idagama'] == $getcmb->IDAgama)
                {
                  echo "<option value='".$getcmb->IDAgama."' selected=\"selected\">".$getcmb->NamaAgama."</option>";
                }
                else
                {
                  echo "<option value='".$getcmb->IDAgama."'>".$getcmb->NamaAgama."</option>";
                }
              }
              ?>
            </select>
            <?php echo form_error('idagama', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('idstatuspernikahan') ? 'has-error' : '' ?>">
          <label for="idstatuspernikahan" class="control-label col-md-3 col-md-offset-1">Status Pernikahan</label>
          <div class="col-md-5">
            <select id="idstatuspernikahan" class="form-control" name="idstatuspernikahan">
              <option value="">(Pilih Status)</option>
              <?php
              foreach ($MsStatusPernikahanData as $getcmb)
              {
                if ($input['idstatuspernikahan'] == $getcmb->IDStatusPernikahan)
                {
                  echo "<option value='".$getcmb->IDStatusPernikahan."' selected=\"selected\">".$getcmb->NamaStatusPernikahan."</option>";
                }
                else
                {
                  echo "<option value='".$getcmb->IDStatusPernikahan."'>".$getcmb->NamaStatusPernikahan."</option>";
                }
              }
              ?>
            </select>
            <?php echo form_error('idstatuspernikahan', '<span class="help-block">', '</span>') ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-5 col-md-offset-4">
            <a class="btn btn-default" href="<?= site_url() ?>">Kembali</a>
            <input id="simpan" name="simpan" class="btn btn-primary" type="submit" value="Simpan">
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    $('#tgllahir').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true
    });

    $("#kodepos").keypress(function (e){
      return NumericHandleKey(e);
    });
  });

  function GetKelurahan(id)
  {
    $.post('<?= site_url('GetKelurahan') ?>/'+id.value,
      function(data){
        document.getElementById('idkelurahan').innerHTML = data
      })
  }

  function NumericHandleKey(e)
  {
    if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
    {
      return false;
    }
  }

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