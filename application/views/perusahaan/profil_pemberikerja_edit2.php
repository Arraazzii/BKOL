<?php
$input = $this->session->flashdata('input');
if ($input != NULL)
{
    $MsKelurahanData = $input['MsKelurahanData'];
}
else
{
    $input['namapemberikerja'] = $MsPerusahaanData->NamaPemberiKerja;
    $input['jabatanpemberikerja'] = $MsPerusahaanData->JabatanPemberiKerja;
    $input['teleponpemberikerja'] = $MsPerusahaanData->TeleponPemberiKerja;
    $input['emailpemberikerja'] = $MsPerusahaanData->EmailPemberiKerja;
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Profil
    <small>Pemberi Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Profil</a></li>
    <li class="active">Pemberi Kerja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form method="POST" class="form-horizontal" role="form" action="<?= site_url('pemberikerja/doupdateprofile') ?>">
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
</script>
<!-- /.content -->