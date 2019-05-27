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
        <button type="button" class="btn btn-success" id="send" onclick="SendLowongan()"><i class="fa fa-send"></i> Kirim Lowongan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-lowonganEx">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Lowongan Pekerjaan (Expired)</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-4" >Lowongan Pekerjaan </label>
            <div class="col-md-8">
              <span id="namalowonganEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Posisi Jabatan </label>
            <div class="col-md-8">
              <span id="posisijabatanEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Nama Perusahaan </label>
            <div class="col-md-8">
              <span id="namaperusahaanEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Alamat Perusahaan </label>
            <div class="col-md-8">
              <span id="alamatEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Pendidikan Minimal </label>
            <div class="col-md-8">
              <span id="statuspendidikanEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jml Pria Dibutuhkan </label>
            <div class="col-md-8">
              <span id="jmlpriaEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jml Wanita Dibutuhkan </label>
            <div class="col-md-8">
              <span id="jmlwanitaEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Batas Umur </label>
            <div class="col-md-8">
              <span id="batasumurEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Syarat Khusus </label>
            <div class="col-md-8">
              <span id="syaratkhususEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Jam Kerja Seminggu </label>
            <div class="col-md-8">
              <span id="jamkerjasemingguEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Gaji Perbulan </label>
            <div class="col-md-8">
              <span id="gajiperbulanEX">    </span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4" >Lokasi Penempatan </label>
            <div class="col-md-8">
              <span id="penempatanEX">    </span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Lowongan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Daftar</a></li>
    <li class="active">Lowongan Kerja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-map-marker"></i> &nbsp; Daftar Lowongan Pekerjaan</h3>
    </div>
    <div class="box-body">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline row">
            <?php 
            date_default_timezone_get('Asia/Jakarta');
            $timeLimit = date('Y-m-d');
            if ($MsLowonganData->num_rows > 0): ?>
            <?php foreach ($MsLowonganData->result() as $getdata): ?>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li class="col-lg-6 col-xs-12">
                <div class="timeline-item">
                  <?php if ($getdata->TglBerakhir <= $timeLimit){ ?>                            
                  <span class="label label-danger time">EXPIRED</span>
                  <?php } ?>
                  <span class="time">Tanggal Berakhir : <?php echo $getdata->TglBerakhir ?></span>

                  <h3 class="timeline-header"><?php echo $getdata->NamaLowongan ?></h3>
                  <?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg')): ?>
                    <div class="col-md-2">
                      <img class="img-responsive" src="<?php echo site_url('assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg') ?>">
                    </div>
                  <?php endif ?>
                  <?php  

                  ?>
                  <div class="timeline-body col-md-9">
                    <i class="fa fa-building"></i> <?php echo $getdata->NamaPerusahaan ?><br>    
                    <i class="fa fa-map-marker"></i> <?php echo $getdata->Penempatan ?><br>
                    - <?php echo $getdata->JamKerjaSeminggu . ' Jam Per Minggu' ?><br>
                    - <?php echo $getdata->UraianTugas ?><br>
                    <?php echo 'Rp. ' . number_format($getdata->GajiPerbulan) . ' / Bulan' ?>
                  </div>
                  <div class="timeline-footer col-md-12 text-right">
                    <?php if ($getdata->TglBerakhir >= $timeLimit){ ?>
                    <a class="btn btn-success btn-sm" onclick="viewLowongan('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya</a>
                    <a href="https://wa.me/?text=<?php echo site_url();?>detailLowonganPekerjaan?lowongan=<?php echo $getdata->IDLowongan;?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Share Jobs To Whatsapp!" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    <?php }else{?>
                    <a class="btn btn-success btn-sm" onclick="viewLowonganEx('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya (EXPIRED)</a>
                    <a href="#" class="btn btn-primary btn-sm disabled" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
            <?php endforeach ?>
          <?php else: ?>

          <?php endif ?>
          <div class="pull-right">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
<div class="box box-primary">
  <div class="box-footer">
    <div class="text-center">
      <?php echo
      'Jika Anda Sudah Mempunyai Account dan Berminat Mengisi Jabatan Pada Perusahaan Ini.<br />Silahkan Login <a href="'.site_url('login').'">disini</a> dan Jika Belum Mempunyai Account Silahkan <a href="'.site_url('register/2').'">Daftar</a> Terlebih Dahulu';
      ?>
    </div>
  </div>
</div>
</section>
<!-- /.content -->

<script>

  function viewLowongan(IDLowongan) {
    $.get('<?php echo site_url('root/getlowongan') ?>/'+IDLowongan, function(getdata) {
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

   function viewLowonganEx(IDLowongan) {
    $.get('<?php echo site_url('root/getlowongan') ?>/'+IDLowongan, function(getdata) {
      if (getdata.exists) 
      {
        $("#modal-lowonganEx").modal('show');
        $("#idlowonganEX").val(getdata.IDLowongan);
        $("#namalowonganEX").html(getdata.NamaLowongan);
        $("#posisijabatanEX").html(getdata.NamaPosisiJabatan);
        $("#namaperusahaanEX").html(getdata.NamaPerusahaan);
        $("#alamatEX").html(getdata.Alamat);
        $("#statuspendidikanEX").html(getdata.NamaStatusPendidikan + ' / ' + getdata.Jurusan);
        $("#jmlpriaEX").html(getdata.JmlPria+' Orang');
        $("#jmlwanitaEX").html(getdata.JmlWanita+' Orang');
        $("#batasumurEX").html(getdata.BatasUmur+' Tahun');
        $("#syaratkhususEX").html(getdata.SyaratKhusus);
        $("#jamkerjasemingguEX").html(getdata.JamKerjaSeminggu + ' Jam Per Minggu');
        $("#gajiperbulanEX").html('Rp. '+getdata.GajiPerbulan);
        $("#penempatanEX").html(getdata.Penempatan);
      }
      else
      {
        notifikasi('Lowongan tidak ditemukan', 'danger', 'fa fa-exclamation-triagle');
      }
    }, 'json');
  }

  function SendLowongan() {
    $('#modal-lowongan').modal('hide');
    swal({
      title: '<strong>Anda Harus Login!</strong>',
      type: 'info',
      html:
      'Jika anda sudah punya akun, silahkan login, jika belum anda bisa memilih menu pendaftaran!',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText:
      'Login',
      confirmButtonAriaLabel: 'Thumbs up, great!',
      cancelButtonText:
      'Daftar',
      cancelButtonAriaLabel: 'Thumbs down',
    });
    $('.swal2-confirm').click(function(){
      window.location.href = "<?php echo site_url();?>login";
    });
    $('.swal2-cancel').click(function(){
      window.location.href = "<?php echo site_url();?>register/2";
    });
  }
</script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });
</script>