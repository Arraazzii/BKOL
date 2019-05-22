<?php $this->load->view('master/jumbotron'); ?>
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
        <button type="button" id="send" class="btn btn-success" onclick="SendLowongan()"><i class="fa fa-send"></i> Kirim Lowongan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Loker Depok</a></li>
      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Loker Luar Depok</a></li>
      <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Kegiatan</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"><i class="fa fa-map-marker"></i> &nbsp; Daftar Lowongan Pekerjaan</h3>
          </div>
          <div class="box-body">
            <!-- row -->
            <div class="row">
              <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                  <?php
                  date_default_timezone_get('Asia/Jakarta');
                  $timeLimit = date('Y-m-d');
                  if ($CountMsLowonganData > 0): ?>
                  <?php foreach ($MsLowonganData as $getdata): ?>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <div class="timeline-item">
                      <!-- <div class="timeline-item" onclick="viewLowongan('<?php //echo $getdata->IDLowongan ?>')"> -->
                        <?php if ($getdata->TglBerakhir <= $timeLimit){ ?>                            
                        <span class="label label-danger time">EXPIRED</span>
                        <?php } ?>
                        <span class="time">Tanggal Berakhir : <?php echo $getdata->TglBerakhir ?></span>
                        <h3 class="timeline-header"><?php echo $getdata->NamaLowongan ?></h3>
                        <?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg')): ?>
                          <div class="col-md-2">
                            <img width="90" src="<?php echo site_url('assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg') ?>">
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
                        <div class="timeline-footer col-md-12">
                          <?php if ($getdata->TglBerakhir >= $timeLimit){ ?>
                          <a class="btn btn-success btn-xs" onclick="viewLowongan('<?php echo $getdata->IDLowongan ?>')">Baca Selengkapnya</a>
                          <?php }else{?>
                          <a class="btn btn-danger btn-xs disabled">Baca Selengkapnya (EXPIRED)</a>
                          <?php } ?>
                        </div>

                      </div>
                    </li>
                    <!-- END timeline item -->
                  <?php endforeach ?>
                <?php else: ?>

                <?php endif ?>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <div class="box box-default">
        <div class="box-body">
          <div class="text-center">
            <?php echo '<a class="btn btn-primary" href="'.site_url('datalowongan').'">Selengkapnya</a>'; ?>
          </div>
        </div>
        <div class="box-footer">
          <div class="text-center">
            <?php echo
            'Jika Anda Sudah Mempunyai Account dan Berminat Mengisi Jabatan Pada Perusahaan Ini.<br />Silahkan Login <a href="'.site_url('login').'">disini</a> dan Jika Belum Mempunyai Account Silahkan <a href="'.site_url('register/2').'">Daftar</a> Terlebih Dahulu';
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_2">
      <?php
      if ($CountMsBeritaData > 0)
      {
        echo '<ul style="list-style:none;">';
        foreach ($MsBeritaData as $getdata)
        {
          $hari = array(
            "0" => "Minggu",
            "1" => "Senin",
            "2" => "Selasa",
            "3" => "Rabu",
            "4" => "Kamis",
            "5" => "Jumat",
            "6" => "Sabtu"
          );
          $bulan = array(
            "1" => "Januari",
            "2" => "Februari",
            "3" => "Maret",
            "4" => "April",
            "5" => "Mei",
            "6" => "Juni",
            "7" => "Juli",
            "8" => "Agustus",
            "9" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember"
          );
          if($getdata->TglBerita <= $timeLimit){
            $labelEx = " <span class='label label-danger'>EXPIRED</span>";
            $hrefGo = '<a href="#">'.$getdata->JudulBerita.'</a>';
          }else{
            $hrefGo = '<a href="'.site_url('berita/view').'/'.$getdata->IDBerita.'">'.$getdata->JudulBerita.'</a>';
          }
          $tglberita = explode("-", $getdata->TglBerita);
          $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
          echo '<li style="background: #fff;padding: 10px;box-shadow: 0 2px 6px #f1f1f1;border-radius: 3px;margin: 10px 0px;">
          <font>
          <b>Lowongan Kerja : </b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i>'. $labelEx .'<br />' . $hrefGo . '    </font>';
          echo '</li>';
        }
        echo '</ul>';
        echo '<div class="text-center"><a class="btn btn-primary" href="'.site_url('berita').'">Selengkapnya</a></div>';
      }
      else
      {
        echo '<div align="center">Belum Ada Data</div>';
      }
      ?>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_3">
      <?php
      if ($CountMsEventData > 0)
      {
        echo '<ul style="list-style:none;">';
        foreach ($MsEventData as $getdata)
        {
          $hari = array(
            "0" => "Minggu",
            "1" => "Senin",
            "2" => "Selasa",
            "3" => "Rabu",
            "4" => "Kamis",
            "5" => "Jumat",
            "6" => "Sabtu"
          );
          $bulan = array(
            "1" => "Januari",
            "2" => "Februari",
            "3" => "Maret",
            "4" => "April",
            "5" => "Mei",
            "6" => "Juni",
            "7" => "Juli",
            "8" => "Agustus",
            "9" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember"
          );
          $tglevent = explode("-", $getdata->TglEvent);
          $gettgl = mktime(0, 0, 0, $tglevent[1], $tglevent[2], $tglevent[0]);
          echo '<li style="background: #fff;padding: 10px;box-shadow: 0 2px 6px #f1f1f1;border-radius: 3px;margin: 10px 0px;">
          <font size="1">
          <i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i><br /><a href="'.site_url('event/view').'/'.$getdata->IDEvent.'">'.$getdata->JudulEvent.'</a></font>';
          echo '</li>';
        }
        echo '</ul>';
        echo '<div class="text-center"><a class="btn btn-primary" href="'.site_url('event').'">Selengkapnya</a></div>';
      }
      else
      {
        echo '<div align="center">belum ada data</div>';
      }
      ?>
    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->
</div>
</div>
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

  function SendLowongan() {
    $('#modal-lowongan').modal('hide');
    swal(
      'Anda Harus Login!',
      'Jika anda sudah punya akun, silahkan login, jika belum anda bisa memilih menu pendaftaran!',
      'info'
      )
  }

</script>