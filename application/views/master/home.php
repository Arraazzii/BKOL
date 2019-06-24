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
      <div class="modal-footer" id="footermodal">

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
</div><br>
<div class="container">
  <div class="row">
    <div class="nav-tabs-custom">
      <ul class="nav nav-pills nav-justified">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Loker Depok</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Loker Luar Depok</a></li>
        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Informasi</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="box box-primary">
            <div class="box-header text-center">
              <h2 class="box-title">Daftar Lowongan Pekerjaan</h2>
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
                    if ($CountMsLowonganData > 0): ?>
                    <?php foreach ($MsLowonganData as $getdata): ?>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12 height-250">
                        <div class="timeline-item">
                          <!-- <div class="timeline-item" onclick="viewLowongan('<?php //echo $getdata->IDLowongan ?>')"> -->
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
                            <span class="time">Tanggal Berakhir : <?php echo $getdata->TglBerakhir ?></span>
                            <h3 class="timeline-header"><?php echo $getdata->NamaLowongan ?></h3>
                            <?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg')): ?>
                              <div class="col-md-3 col-sm-12 col-xs-12">
                                <img class="img-responsive" src="<?php echo site_url('assets/file/perusahaan/'.$getdata->IDPerusahaan.'.jpg') ?>" style="margin-top: 5px;">
                              </div>
                            <?php endif ?>
                            <?php  

                            ?>
                            <div class="timeline-body col-md-9 col-sm-12 col-xs-12">
                              <!-- <i class="fa fa-building"></i> --><b>Perusahaan : </b> <?php echo $getdata->NamaPerusahaan ?><br>    
                              <!-- <i class="fa fa-map-marker"></i> --><b>Lokasi : </b> <?php echo $getdata->Penempatan ?><br>
                              <b>Gaji : </b><?php echo 'Rp ' . number_format($getdata->GajiPerbulan) . ' / Bulan' ?><br>
                              - <?php echo $getdata->JamKerjaSeminggu . ' Jam Per Minggu' ?><br>
                              - <?php echo $getdata->UraianTugas ?><br>
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
                  </ul>
                </div>
                <div class="text-center">
                  <?php echo '<a class="btn btn-primary" href="'.site_url('datalowongan').'">Lowongan Lainnya</a>'; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <?php
          if ($CountMsBeritaData > 0)
          {
            echo '<ul style="list-style:none;padding-inline-start: 15px;" class="row">';
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
                $hrefGo = '<a href="'.site_url('berita/view').'/'.$getdata->IDBerita.'">'.$getdata->JudulBerita.'</a>';
              }else{
                $hrefGo = '<a href="'.site_url('berita/view').'/'.$getdata->IDBerita.'">'.$getdata->JudulBerita.'</a>';
              }
              $tglberita = explode("-", $getdata->TglBerita);
              $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
              echo '<li style="background: #fff;padding: 10px;box-shadow: 0 2px 6px #f1f1f1;border-radius: 3px;margin: 10px 10px;" class="li-content col-lg-6 col-md-6 col-sm-12 col-xs-12" ><div class="li-card-padding-media">
              <font>
              <b>Lowongan Kerja : </b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i>'. $labelEx .'<br />' . $hrefGo . '    </font>';
              echo '</div></li>';
            }
            echo '</ul>';
            echo '<div class="text-center row"><a class="btn btn-primary" href="'.site_url('berita').'">Selengkapnya</a></div>';
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
            echo '<ul style="list-style:none;padding-inline-start: 0px;">';
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
              <font size="3">
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
</div>
<script>

  function viewLowongan(IDLowongan) {
    $.get('<?php echo site_url('root/getlowongan') ?>/'+IDLowongan, function(getdata) {
      if (getdata.exists) 
      {
        $("#footermodal").find("#buttonSend").remove();
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
        $("#gajiperbulan").html('Rp '+ noRupiah(getdata.GajiPerbulan));
        $("#penempatan").html(getdata.Penempatan);
        if(getdata.NamaPerusahaan == 'Pemprov Kota Depok') {
          $("#send").hide();
        } else {
          $("#send").show();
        }
        var idlow = "SendLowongan('" + getdata.IDLowongan + "')" ;
        var html = '<div id="buttonSend"><button type="button" class="btn btn-success" id="send" onclick="'+ idlow +'"><i class="fa fa-send"></i> Kirim Lowongan</button> <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button></div>';
        $("#footermodal").append(html);

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
        $("#gajiperbulanEX").html('Rp '+ noRupiah(getdata.GajiPerbulan));
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

  function SendLowongan(idlowongan) {
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
      window.location.href = "<?php echo site_url();?>login?lowongan=" + idlowongan;
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