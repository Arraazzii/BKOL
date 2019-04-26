<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Rekapitulasi Data 
    <small>Pencari Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Admin</a></li>
    <li><a href="#">Laporan</a></li>
    <li class="active">Rekap Pencaker</li>
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
          <label for="jenisfilter" class="control-label col-md-3">Jenis Filter</label>
          <div class="col-md-2">
            <select name="jenisfilter" id="jenisfilter" class="form-control input-sm">
              <option value="0">Jumlah Pencaker</option>
              <option value="1">Lamaran Diproses</option>
              <option value="2">Laporan Penempatan</option>
            </select>
          </div>
        </div>
        <div  id="filterjumlah">
          <div class="form-group">
            <label for="jenispencaker" class="control-label col-md-3">Jenis Pencaker</label>
            <div class="col-md-2">
              <select name="jenispencaker" id="jenispencaker" class="form-control input-sm">
                <option value="0">Terdaftar</option>
                <!-- <option value="2">Diproses</option> -->
                <option value="1">Ditempatkan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="kategori" class="control-label col-md-3">Kategori</label>
            <div class="col-md-3">
              <select name="kategori" id="kategori" class="form-control input-sm">
                <option value="0">Kecamatan</option>
                <option value="1">Umur</option>
                <option value="2">Tingkat Pendidikan</option>
                <!-- <option value="3">Semua</option> -->
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="date_from" class="control-label col-md-3">Dari</label>
          <div class="col-md-2">
            <input type="text" readonly required name="date_from" placeholder="dd-mm-yyyy" id="date_from" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="date_to" class="control-label col-md-3">Sampai</label>
          <div class="col-md-2">
            <input type="text" readonly required name="date_to" id="date_to" placeholder="dd-mm-yyyy" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-5 col-md-offset-3">
            <input id="simpan" class="btn btn-primary btn-sm" name="simpan" type="submit" value="Filter">
            <button type="button" id="excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Excel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <form action="<?php echo site_url('admin/export_laporan') ?>" method="POST" role="form" id="exform" class="hidden">
    <input type="hidden" class="form-control" id="xjenisfilter" name="xjenisfilter">
    <input type="hidden" class="form-control" id="xjenispencaker" name="xjenispencaker">
    <input type="hidden" class="form-control" id="xkategori" name="xkategori">
    <input type="hidden" class="form-control" id="xdate_from" name="xdate_from">
    <input type="hidden" class="form-control" id="xdate_to" name="xdate_to">
  </form>
  <div class="box box-default">
    <div class="box-body">
      <div id="table-container" class="table-responsive">
        
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    //initial table structure
    createTable(['Kecamatan', 'Jml. Pria', 'Jml. Wanita', 'Total']);
    $('#kategori').change(function() {
      var cat = this.value;
      if (cat == 0) {
        var columns = new Array('Kecamatan', 'Jml. Pria', 'Jml. Wanita', 'Total');
      } else if (cat == 1) {
        var columns = new Array('Kelompok Umur', 'Jml. Pria', 'Jml. Wanita', 'Total');
      } else if (cat == 2) {
        var columns = new Array('Tingkat Pendidikan', 'Jml. Pria', 'Jml. Wanita', 'Total');
      } else if (cat == 3) {
        var columns = new Array('Semua', 'Jml. Pria', 'Jml. Wanita', 'Total');
      }
      createTable(columns);
    });

    $("#jenisfilter").change(function() {
      var jenis = $("#jenisfilter").val();

      if(jenis == 0)
      {
        $("#filterjumlah").show(50);
        var cat = $("#kategori").val();
        if (cat == 0) {
          var columns = new Array('Kecamatan', 'Jml. Pria', 'Jml. Wanita', 'Total');
        } else if (cat == 1) {
          var columns = new Array('Kelompok Umur', 'Jml. Pria', 'Jml. Wanita', 'Total');
        } else if (cat == 2) {
          var columns = new Array('Tingkat Pendidikan', 'Jml. Pria', 'Jml. Wanita', 'Total');
        } else if (cat == 3) {
          var columns = new Array('Semua', 'Jml. Pria', 'Jml. Wanita', 'Total');
        }
        createTable(columns);
      }
      else if(jenis == 1)
      {
        $("#filterjumlah").hide(50);
        createTable(new Array('No', 'Nama Pencaker', 'Nama Lowongan', 'Nama Perusahaan', 'Status'));
      }
      else if(jenis == 2)
      {
        $("#filterjumlah").hide(50);
        createTable(new Array('No', 'No KTP', 'Nama Pencaker','Alamat', 'Nama Perusahaan', 'Jabatan', 'Pendidikan','Jenis Kelamin'));
      }
    });

    $('#date_from').datepicker({
      format: "dd-mm-yyyy", 
      orientation: 'bottom',
      autoclose: true,
      endDate: getFormattedDate()
    });
    
    $('#date_to').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      endDate: getFormattedDate()
    });

    $('#date_to').change(function() {
      filter();
    });
    
    $("#excel").click(function(e) {
      e.preventDefault();
      var jenisfilter = $("#jenisfilter").val();
      var jenispencaker = $("#jenispencaker").val();
      var kategori = $("#kategori").val();
      var date_from = $("#date_from").val();
      var date_to = $("#date_to").val();

      $("#xjenisfilter").val(jenisfilter);
      $("#xjenispencaker").val(jenispencaker);
      $("#xkategori").val(kategori);
      $("#xdate_from").val(date_from);
      $("#xdate_to").val(date_to);

      if(date_from == '' || date_to == '')
      {
        alert('Periode Tidak Boleh Kosong');
      }
      else
      {
        $("#exform").submit(); 
      }
    });
    $("#jenispencaker").change(function() {
      filter();
    });
    $("#kategori").change(function() {
      filter();
    });
    $('#formFilter').submit(function(e) {
      e.preventDefault();
      filter();
    });
  });

  function filter() {
      var myForm = document.getElementById('formFilter');
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: '<?php echo base_url('admin/report/lap_rekap_pencaker/submit') ?>',
        contentType: false,
        processData: false,
        cache: false,
        data: new FormData(myForm),
        success: function(res) {
          var tbody = document.getElementById('data-body');
          var tfoot = document.getElementById('data-foot');
        
          tbody.innerHTML = '';
          tfoot.innerHTML = '';
          detail = res.detail;
          summ = res.summary;
          jenis = res.jenis;

          if(detail == null)
          {
            var tr = document.createElement('tr');
            var td = document.createElement('td');
            td.appendChild(document.createTextNode('Tidak ada data'));
            td.setAttribute('class', 'text-center');
            if(jenis == 0) {
              td.setAttribute('colspan', '4');
            } else if(jenis == 1) {
              td.setAttribute('colspan', '5');
            } else if(jenis == 2) {
              td.setAttribute('colspan', '8');
            }
            tr.appendChild(td);
            tbody.appendChild(tr);
          }
          else
          {
            for(var k in detail)
            {
              obj = detail[k];
              var tr = document.createElement('tr');

              for (var i in obj)
              {
                var td = document.createElement('td');
                td.appendChild(document.createTextNode(obj[i]));
                if(i == 'kecamatan' || i == 'Kelompok Umur' || i == 'pendidikan') {
                  td.setAttribute('class', 'text-left');
                } else {
                  td.setAttribute('class', 'text-center');
                }
                tr.appendChild(td);
              }
              tbody.appendChild(tr);
            }

            if(jenis == 0)
            {
              // for table footer
              var tr = document.createElement('tr');
              var th = document.createElement('th');
              th.appendChild(document.createTextNode('Total'));
              th.setAttribute('id', 'td-footer-title');
              tr.appendChild(th);
              for (var j in summ[0]) 
              {
                th = document.createElement('th');
                th.appendChild(document.createTextNode(summ[0][j]));
                th.setAttribute('class', 'text-center');
                tr.appendChild(th);
              }
              tfoot.appendChild(tr);
            }
          }
        }
      });
    }

  function getFormattedDate()
  {
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear().toString();
    return day + '-' + month + '-' + year;
  }

  function createTable(col) {
    var container = document.getElementById('table-container');
    var table = document.createElement('table');
    var thead = document.createElement('thead');
    var tbody = document.createElement('tbody');
    var tfoot = document.createElement('tfoot');
    var tr = document.createElement('tr');
    
    tbody.setAttribute('id', 'data-body');
    tfoot.setAttribute('id', 'data-foot');
    
    container.innerHTML = "";
    table.className = 'table table-bordered table-striped table-hover';
    for (i = 0; i < col.length; i++) {
      var th = document.createElement('th');
      th.appendChild(document.createTextNode(col[i]));
      if(col[i] == 'Kecamatan' || col[i] == 'Kelompok Umur' || col[i] == 'pendidikan') {
        th.setAttribute('class', 'text-left');
      } else {
        th.setAttribute('class', 'text-center');
      }
      tr.appendChild(th);
    }
    thead.appendChild(tr);
    table.appendChild(thead);
    table.appendChild(tbody);
    table.appendChild(tfoot);
    container.appendChild(table);
    filter();
  }
</script>