<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Rekapitulasi Data 
    <small>Pencari Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Admin</a></li>
    <li><a href="#">Laporan</a></li>
    <li class="active">Rekap Pencaker Lama</li>
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
        var columns = new Array('Pendidikan', 'Jml. Pria', 'Jml. Wanita', 'Total');
      } 
      createTable(columns);
    });

    $('#date_from').datepicker({
      format: "dd-mm-yyyy", 
      autoclose: true,
      endDate: getFormattedDate()
    });

    $('#date_to').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      endDate: getFormattedDate()
    });

    $('#formFilter').submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        dataType: 'json',
        url: '<?php echo base_url('admin/report_lama/lap_rekap_pencaker/submit') ?>',
        contentType: false,
        processData: false,
        cache: false,
        data: new FormData(this),
        success: function(res) {
          var tbody = document.getElementById('data-body');
          var tfoot = document.getElementById('data-foot');
          
          tbody.innerHTML = '';
          tfoot.innerHTML = '';
          detail = res.detail;
          summ = res.summary;

          for(var k in detail)
          {
            obj = detail[k];
            var tr = document.createElement('tr');

            for (var i in obj)
            {
              var td = document.createElement('td');
              td.appendChild(document.createTextNode(obj[i]));
              tr.appendChild(td);
            }
            tbody.appendChild(tr);
          }

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
            tr.appendChild(th);
          }
          tfoot.appendChild(tr);
          
        }
      });
    });
  });

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
      tr.appendChild(th);
    }
    thead.appendChild(tr);
    table.appendChild(thead);
    table.appendChild(tbody);
    table.appendChild(tfoot);
    container.appendChild(table);
  }
</script>
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