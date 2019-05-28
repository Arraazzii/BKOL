<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Laporan Penempatan
    <small>Tenaga Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Admin</a></li>
    <li><a href="#">Laporan</a></li>
    <li class="active">Penempatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form method="POST" class="form-horizontal" role="form" id="formFilter">
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Filter</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="bulan" class="control-label col-md-3">Bulan</label>
          <div class="col-md-3">
            <select name="bulan" id="bulan" class="form-control input-sm">
              <option value="">--Semua Bulan--</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="tahun" class="control-label col-md-3">Tahun</label>
          <div class="col-md-2">
            <select name="tahun" id="tahun" class="form-control input-sm">
              <?php
              $yend = date('Y');
              for($ystart = 2018; $ystart <= $yend; $ystart++): ?>
              <option value="<?=$ystart; ?>"><?=$ystart; ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-5 col-md-offset-3">
          <input id="simpan" class="btn btn-primary btn-sm" name="simpan" type="submit" value="Filter">
        </div>
      </div>
    </div>
  </div>
</form>

<div class="box box-default">
  <div class="box-body">
    <div class="table-responsive">
      <table id="table" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Sektor Lapangan Usaha</th>
            <th colspan="2">Yang belum<br>ditempatan<br>s/d akhir<br>bulan lalu</th>
            <th colspan="2">Yang<br>terdaftar s/d<br>bulan ini</th>
            <th colspan="2">Yang<br>ditempatkan s/d<br>bulan ini</th>
            <th colspan="2">Yang belum<br>ditempatkan<br>s/d bulan ini</th>
          </tr>
          <tr>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
<!-- /.content -->

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    var table = $('#table');
    $.get('<?php echo base_url().'admin/report/lap_penempatan/get_data' ?>', function(res) {
      var obj = JSON.parse(res);
      var tbody = table.children('tbody');
      var content = '';
      var num = 1;
      for (var key in obj) {
        content += '<tr><td>'+num+'</td><td>'+obj[key].NamaBidangPerusahaan+'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        num++;
      }
      tbody.html(content);
    })
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