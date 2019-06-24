<style type="text/css">
.text-left{
  text-align: center;
}
.height-300 {
  height: 300px;
}
</style>
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
<!-- Content Header (Page header) -->
<section class="content-header container">
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
<section class="content container">
  <div class="box">
    <div class="box-header text-center">
      <h3 class="box-title">Daftar Lowongan Pekerjaan</h3>
    </div>
    <div class="box-body">
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <?php if ($MsLowonganData->num_rows > 0): ?>
              <?php 
              date_default_timezone_get('Asia/Jakarta');
              $timeLimit = date('Y-m-d');
              foreach ($MsLowonganData->result() as $getdata): ?>
              <!-- timeline time label -->
               <!--  <li class="time-label">
                  <span class="bg-green">
                    <?php echo $getdata->TglBerlaku ?>
                  </span>
                </li> -->
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12 height-300">
                  <!-- <i class="fa fa-bullhorn bg-blue"></i> -->
                  <div class="timeline-item">
                    <span class="time">Tanggal Berakhir : <?php echo $getdata->TglBerakhir ?>
                      <?php if ($getdata->TglBerakhir <= $timeLimit){ ?>                            
                      <span class="label label-danger time">EXPIRED</span>
                      <?php } ?>
                      <?php
                      date_default_timezone_get("Asia/Jakarta");
                      $time = date("Y-m-d");
                      $date = date_create($getdata->RegisterDate);
                      $dateDB = date_format($date, "Y-m-d");
                      $diff = abs(strtotime($time) - strtotime($dateDB));
                      $total = floor(($diff)/ (60*60*24));
                      if ($total >= 7) { ?>
                      <span class="label label-info time">Lowongan Baru</span>
                      <?php } ?>
                    </span>

                    <h3 class="timeline-header"><?php echo $getdata->NamaLowongan ?></h3>
                    <?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg')): ?>
                      <div class="col-md-2">
                        <img class="img-responsive" src="<?php echo site_url('assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg') ?>">
                      </div>
                    <?php endif ?>
                    <div class="timeline-body col-md-9">
                      <b>Perusahaan : </b><?php echo $getdata->NamaPerusahaan ?><br>    
                      <b>Alamat : </b><?php echo $getdata->Alamat ?><br>
                      <b>Jumlah Dibutuhkan : </b><?php echo $getdata->JmlPria;?> Orang Pria, <?php echo $getdata->JmlWanita ?> Orang Wanita <br>
                      <b>Gaji : </b>Rp <?php echo number_format($getdata->GajiPerbulan); ?><br>
                      - <?php echo $getdata->JamKerjaSeminggu . ' Jam Per Minggu' ?><br>
                      - <?php echo $getdata->UraianTugas ?><br>
                    </div>
                    <div class="timeline-footer col-md-12  text-right">
                     <?php if ($getdata->TglBerakhir >= $timeLimit){ ?>
                     <a class="btn btn-success btn-sm" onclick="viewLowongan('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya</a>
                     <a href="https://wa.me/?text=<?php echo site_url();?>detailLowonganPekerjaan?lowongan=<?php echo $getdata->IDLowongan;?>" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Share Jobs To Whatsapp!" target="_blank"><i class="fa fa-whatsapp"></i></a>
                     <?php }else{?>
                     <a class="btn btn-success btn-sm" onclick="viewLowonganEx('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya (EXPIRED)</a>
                     <a href="#" class="btn btn-primary btn-sm disabled" target="_blank"><i class="fa fa-whatsapp"></i></a>
                     <?php } ?>
                     <!-- <a class="btn btn-primary btn-xs" onclick="viewLowongan('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya</a> -->
                   </div>
                 </div>
               </li>
               <!-- END timeline item -->
             <?php endforeach ?>
           <?php else: ?>

           <?php endif ?>
            <!-- <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li> -->
          </ul>
        </div>
        <div class="text-center">
          <?php echo $this->pagination->create_links(); ?>
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
        $("#gajiperbulan").html('Rp. '+ noRupiah(getdata.GajiPerbulan));
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
        $("#gajiperbulanEX").html('Rp. '+ noRupiah(getdata.GajiPerbulan));
        $("#penempatanEX").html(getdata.Penempatan);
      }
      else
      {
        notifikasi('Lowongan tidak ditemukan', 'danger', 'fa fa-exclamation-triagle');
      }
    }, 'json');
  }
  function noRupiah(value) {
    value = value.split(/(?=(?:...)*$)/);
    value = value.join('.');
    return value;
  }
  function KirimLamaran(IDLowongan) {
    window.location.href='<?php echo site_url('pencaker/registerlowongan') ?>/'+IDLowongan;
  }
</script>
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