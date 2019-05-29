<style>
.showhidebox
{
  width:100%;
  float:left;
  display:none;
  background-color:#F2F5A9;
}
.pull-right strong{
  background: #3c8dbc;
  color: #fff;
  box-shadow: 0 2px 6px #3c8dbc30;
  padding: 7px;
  border-radius: 3px;
  margin: 1px;
}
.pull-right a{
  background: #fff;
  box-shadow: 0 2px 6px #3c8dbc30;
  padding: 7px;
  border-radius: 3px;
  margin: 3px;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Lowongan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
    <li><a href="#">Daftar</a></li>
    <li class="active">Lowongan Kerja</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header text-center">
      <h3 class="box-title">DAFTAR LOWONGAN KERJA</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body table-responsive">
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
            <th width="10">No</th>
            <th width="100">Nomor Loker</th>
            <th class="text-center">Lowongan Pekerjaan</th>
            <th class="text-center">Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($this->pagination->total_rows > 0): ?>
            <?php $i = 0;  ?>
            <?php foreach ($MsLowonganData as $getdata): ?>
              <?php 

              $fromdate = explode("-", $getdata->TglBerlaku);
              $todate = explode("-", $getdata->TglBerakhir);
              $i++;
              date_default_timezone_get('Asia/Jakarta');
              $timeLimit = date('Y-m-d');
              ?>
              <tr>
                <td><?php echo $i+$this->uri->segment(3) ?></td>
                <td class="text-center"><?php echo $getdata->IDLowongan ?></td>
                
                <td><?php echo '<div style="float:right;">
                <i>Jatuh Tempo : <b>'.$getdata->TglBerakhir.'</b></i>
                </div>
                <div style="float:left;">'.$getdata->NamaLowongan . '<br />
                ' .$getdata->NamaPerusahaan.'<br /></div></div>' ?>
              </td>
              <?php if ($timeLimit <= $getdata->TglBerakhir) { ?>
              
              <td class="text-center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?php echo $getdata->IDLowongan ?>">Detail</button></td>

              <?php }else{ ?>
              <td class="text-center"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal<?php echo $getdata->IDLowongan ?>">Detail (Expired)</button></td>
              <?php } ?>
            </tr>

            <div class="modal fade" id="modal<?php echo $getdata->IDLowongan;?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Lowongan Pekerjaan</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <label class="col-md-4" >Lowongan Pekerjaan </label>
                      <div class="col-md-8">
                        <span id="namalowongan"><?php echo $getdata->NamaLowongan; ?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Posisi Jabatan </label>
                      <div class="col-md-8">
                        <span id="posisijabatan"><?php echo $getdata->NamaPosisiJabatan; ?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Nama Perusahaan </label>
                      <div class="col-md-8">
                        <span id="namaperusahaan"><?php echo $getdata->NamaPerusahaan; ?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Alamat Perusahaan </label>
                      <div class="col-md-8">
                        <span id="alamat"><?php echo $getdata->Alamat; ?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Pendidikan Minimal </label>
                      <div class="col-md-8">
                        <span id="statuspendidikan"><?php echo $getdata->NamaStatusPendidikan; ?> / <?php echo $getdata->Jurusan; ?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Jml Pria Dibutuhkan </label>
                      <div class="col-md-8">
                        <span id="jmlpria"><?php echo $getdata->JmlPria; ?> Orang</span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Jml Wanita Dibutuhkan </label>
                      <div class="col-md-8">
                        <span id="jmlwanita"><?php echo $getdata->JmlWanita; ?> Orang</span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Batas Umur </label>
                      <div class="col-md-8">
                        <span id="batasumur"><?php echo $getdata->BatasUmur; ?> Tahun</span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Syarat Khusus </label>
                      <div class="col-md-8">
                        <span id="syaratkhusus"><pre><?php echo $getdata->SyaratKhusus; ?></pre></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Jam Kerja Seminggu </label>
                      <div class="col-md-8">
                        <span id="jamkerjaseminggu"><?php echo $getdata->JamKerjaSeminggu; ?> Jam Per Minggu</span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Gaji Perbulan </label>
                      <div class="col-md-8">
                        <span id="gajiperbulan">Rp <?php echo number_format($getdata->GajiPerbulan);?></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <label class="col-md-4" >Lokasi Penempatan </label>
                      <div class="col-md-8">
                        <span id="penempatan"><?php echo $getdata->Penempatan; ?> </span>
                      </div>
                    </div>
                    <?php 
                    $idUserDaftar = $getdata->IDLowongan;
                    $no = 1;
                    $tabledaftar = $this->db->query("SELECT NamaPencaker, Email, StatusLowongan FROM trlowonganmasuk WHERE IDLowongan = '$idUserDaftar' ORDER BY IDLowonganMasuk DESC")->result_array();
                    if ($tabledaftar == NULL || $tabledaftar == 0) { ?>
                    <h4>Pelamar Kerja :</h4>
                    <ul class="list-group">
                      <li class="list-group-item text-center">KOSONG</li>
                    </ul>
                    <?php }else{
                      ?>
                      <br>
                      <h4>Pelamar Kerja :</h4>
                      <ul class="list-group">
                        <?php foreach ($tabledaftar as $keydaftar) { ?>
                        <li class="list-group-item"><?php echo $no++; ?>. <?php echo $keydaftar['NamaPencaker'];?> (<?php echo $keydaftar['Email']; ?>) <?php if($keydaftar['StatusLowongan'] == '0'){echo "<span class='label label-warning pull-right'>Menunggu</span>";}else{echo "<span class='label label-primary pull-right'>Diproses</span>";} ?></span></li>
                        <?php } ?>
                      </ul>
                      <?php } ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="3" class="text-center">Belum ada data</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
    <?php if ($this->pagination->create_links()): ?>
      <div class="box-footer">
        <div class="pull-right">
          <?php echo $this->pagination->create_links() ?>
        </div>
      </div>
      <!-- /.box-footer -->    
    <?php endif ?>
  </div>
</section>
<script>
  $(document).ready(function() {
    $(".showhidebox").hide();

    $('.showhidebtn').click(function(){
      $(this).parent().next().slideToggle();
    });
  });
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