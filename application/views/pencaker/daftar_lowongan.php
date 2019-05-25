<div class="modal fade" id="modal-lowongan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Lowongan Pekerjaan</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4" >Lowongan Pekerjaan </label>
            <div class="col-md-8">
              <span id="namalowongan">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Posisi Jabatan </label>
            <div class="col-md-8">
              <span id="posisijabatan">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Nama Perusahaan </label>
            <div class="col-md-8">
              <span id="namaperusahaan">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Alamat Perusahaan </label>
            <div class="col-md-8">
              <span id="alamat">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Pendidikan Minimal </label>
            <div class="col-md-8">
              <span id="statuspendidikan">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jml Pria Dibutuhkan </label>
            <div class="col-md-8">
              <span id="jmlpria">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jml Wanita Dibutuhkan </label>
            <div class="col-md-8">
              <span id="jmlwanita">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Batas Umur </label>
            <div class="col-md-8">
              <span id="batasumur">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Syarat Khusus </label>
            <div class="col-md-8">
              <span id="syaratkhusus">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jam Kerja Seminggu </label>
            <div class="col-md-8">
              <span id="jamkerjaseminggu">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Gaji Perbulan </label>
            <div class="col-md-8">
              <span id="gajiperbulan">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Lokasi Penempatan </label>
            <div class="col-md-8">
              <span id="penempatan">    </span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="idlowongan" value="">
        <button type="button" class="btn btn-success" id="send" onclick="KirimLamaran($('#idlowongan').val())">Kirim Lamaran</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Lowongan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pencaker</a></li>
    <li class="active">Lowongan Kerja</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-map-marker"></i> &nbsp; Daftar Lowongan Pekerjaan</h3>
    </div>
    <div class="box-body">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <?php if ($MsLowonganData->num_rows > 0): ?>
              <?php foreach ($MsLowonganData->result() as $getdata): ?>
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-green">
                    <?php echo $getdata->TglBerlaku ?>
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-bullhorn bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time">Tanggal Berakhir : <?php echo $getdata->TglBerakhir ?></span>

                    <h3 class="timeline-header"><?php echo $getdata->NamaLowongan ?></h3>
                    <?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg')): ?>
                      <div class="col-md-2">
                        <img width="90" src="<?php echo site_url('assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg') ?>">
                      </div>
                    <?php endif ?>
                    <div class="timeline-body col-md-9">
                      <?php echo $getdata->NamaPerusahaan ?><br>    
                      Alamat : <?php echo $getdata->Alamat ?><br>
                      Jumlah Dibutuhkan : <?php echo $getdata->JmlPria+$getdata->JmlWanita ?> Orang
                    </div>
                    <div class="timeline-footer col-md-12">
                      <a class="btn btn-primary btn-xs" onclick="viewLowongan('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
              <?php endforeach ?>
            <?php else: ?>
              
            <?php endif ?>
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
</section>
<!-- /.content -->
<script>

  function viewLowongan(IDLowongan) {
    $.get('<?php echo site_url('pencaker/getlowongan') ?>/'+IDLowongan, function(getdata) {
      if (getdata.exists) 
      {
        $("#modal-lowongan").modal('show');
        $("#idlowongan").val(getdata.IDLowongan);
        $("#namalowongan").html(getdata.NamaLowongan);
        $("#posisijabatan").html(getdata.NamaPosisiJabatan);
        $("#namaperusahaan").html(getdata.NamaPerusahaan);
        $("#alamat").html(getdata.Alamat);
        $("#statuspendidikan").html(getdata.NamaStatusPendidikan + ' / ' + getdata.Jurusan);
        $("#jmlpria").html(getdata.JmlPria+' Orang');
        $("#jmlwanita").html(getdata.JmlWanita+' Orang');
        $("#batasumur").html(getdata.BatasUmur+' Tahun');
        $("#syaratkhusus").html(getdata.SyaratKhusus);
        $("#jamkerjaseminggu").html(getdata.JamKerjaSeminggu + ' Jam Per Minggu');
        $("#gajiperbulan").html('Rp. '+getdata.GajiPerbulan);
        $("#penempatan").html(getdata.Penempatan);
        if(getdata.NamaPerusahaan == 'Pemprov Kota Depok') {
          $("#send").hide();
        } else {
          $("#send").show();
        }

      }
      else
      {
        notifikasi('Lowongan tidak ditemukan', 'danger', 'fa fa-exclamation-triagle');
      }
    }, 'json');
  }

  function KirimLamaran(IDLowongan) {
    window.location.href='<?php echo site_url('pencaker/registerlowongan') ?>/'+IDLowongan;
  }
</script>