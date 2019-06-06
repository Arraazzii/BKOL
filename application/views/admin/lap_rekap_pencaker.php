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
<?php date_default_timezone_get("Asia/Jakarta"); ?>
<!-- Main content -->
<section class="content">
  <form method="POST" class="form-horizontal" role="form" id="formFilter">
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Filter</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="jenisfilter" class="control-label col-md-3">Jenis Filter</label>
          <div class="col-md-6">
            <select name="jenisfilter" id="jenisfilter" class="form-control input-sm">
              <option value="all">--Silahkan Pilih--</option>
              <option value="0">Jumlah Pencaker</option>
              <option value="1">Lamaran Diproses</option>
              <option value="2">Laporan Penempatan</option>
            </select>
          </div>
        </div>
        <div  id="filterjumlah">
          <div class="form-group">
            <label for="jenispencaker" class="control-label col-md-3">Jenis Pencaker</label>
            <div class="col-md-6">
              <select name="jenispencaker" id="jenispencaker" class="form-control input-sm">
                <option value="all">--Silahkan Pilih--</option>
                <option value="0">Terdaftar</option>
                <!-- <option value="2">Diproses</option> -->
                <option value="1">Ditempatkan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="kategori" class="control-label col-md-3">Kategori</label>
            <div class="col-md-6">
              <select name="kategori" id="kategori" class="form-control input-sm">
                <option value="all">--Silahkan Pilih--</option>
                <option value="kecamatan">Kecamatan</option>
                <option value="umur">Umur</option>
                <option value="pendidikan">Tingkat Pendidikan</option>
                <option value="posisi">Posisi Pekerjaan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="date_from" class="control-label col-md-3">Dari</label>
          <div class="col-md-6">
            <input type="text" readonly required name="date_from" placeholder="dd-mm-yyyy" id="date_from" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <label for="date_to" class="control-label col-md-3">Sampai</label>
          <div class="col-md-6">
            <input type="text" readonly required name="date_to" id="date_to" placeholder="dd-mm-yyyy" class="form-control input-sm">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-7 col-md-offset-6">
            <input id="simpan" class="btn btn-primary btn-sm" name="simpan" type="button" value="Filter">
            <button type="button" id="excel" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Excel</button>
            <button type="button" id="reset" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Reset Filter</button>
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
  $(document).ready(function(){
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
 });  
  $("#filterjumlah").hide();

  $("#jenisfilter").change(function(){
    if ($("#jenisfilter").val() != "0") {
      $("#filterjumlah").hide();
    }else{
      $("#filterjumlah").show();
    }
  });
  $("#reset").click(function(){
    $("#table-container").find("#dataTable").remove();
    $("#table-container").find("#dataTable_wrapper").remove();
    $("#jenisfilter").val("all");
    $("#date_from").val("");
    $("#date_to").val("");

    $("#jenispencaker").val("all");
    $("#kategori").val("all");
    $("#filterjumlah").hide();
  });
  $("#simpan").click(function(){
    var jenisfilter = $("#jenisfilter").val();
    var date_from = $("#date_from").val();
    var date_to = $("#date_to").val();
    if (date_from != '' && date_to != '') {
      if (jenisfilter == "0") {
        var jenispencaker = $("#jenispencaker").val();
        var kategori = $("#kategori").val();
        if (kategori != 'all' && jenispencaker != 'all') {

          if (kategori == 'kecamatan') {
           $.ajax({
            url: "<?php echo base_url();?>newLaporan/ajaxKecamatan",
            type: "post",
            data: {date_from: date_from, date_to: date_to, kategori: jenispencaker} ,
            dataType: "JSON",
            success: function (response) {
              $("#table-container").find("#dataTable").remove();
              $("#table-container").find("#dataTable_wrapper").remove();
              if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
              }
              var laki = 0;
              var cewe = 0;
              var total = 0;
              var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th>Kecamatan</th><th  class='text-center'>Jml. Pria</th><th class='text-center'>Jml. Wanita</th><th class='text-center'>Total</th></tr></thead><tbody>";
              $.each(response.data, function(i, resultKecamatan){
                html += "<tr>";
                html += "<td>"+ resultKecamatan.NamaKecamatan +"</td>";
                html += "<td class='text-center'>"+ resultKecamatan.laki +"</td>";
                html += "<td class='text-center'>"+ resultKecamatan.cewe +"</td>";
                html += "<td class='text-center'>"+ resultKecamatan.total +"</td>";
                html += "</tr>";
                laki += parseFloat(resultKecamatan.laki);
                cewe += parseFloat(resultKecamatan.cewe);
                total += parseFloat(resultKecamatan.total);
              });
              html += "</tbody>";
              html += "<tfoot><tr><td><b>Total</b></td><td class='text-center'><b>"+ laki +"</b></td><td class='text-center'><b>"+ cewe +"</b></td><td class='text-center'><b>"+ total +"</b></td></tr></tfoot>";
              html += "</table>"
              
              $("#table-container").append(html);
              $("#dataTable").dataTable();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
         }else if(kategori == 'umur') {
          $.ajax({
            url: "<?php echo base_url();?>newLaporan/ajaxUmur",
            type: "post",
            data: {date_from: date_from, date_to: date_to, kategori: jenispencaker} ,
            dataType: "JSON",
            success: function (response) {
              $("#table-container").find("#dataTable").remove();
              $("#table-container").find("#dataTable_wrapper").remove();
              if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
              }
              var laki = 0;
              var cewe = 0;
              var total = 0;
              var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th>Kelompok Umur</th><th  class='text-center'>Jml. Pria</th><th class='text-center'>Jml. Wanita</th><th class='text-center'>Total</th></tr></thead><tbody>";
              $.each(response.data, function(i, resultUmur){
                html += "<tr>";
                html += "<td>"+ resultUmur.age +"</td>";
                html += "<td class='text-center'>"+ resultUmur.laki +"</td>";
                html += "<td class='text-center'>"+ resultUmur.cewe +"</td>";
                html += "<td class='text-center'>"+ resultUmur.Total +"</td>";
                html += "</tr>";
                laki += parseFloat(resultUmur.laki);
                cewe += parseFloat(resultUmur.cewe);
                total += parseFloat(resultUmur.Total);
              });
              html += "</tbody>";
              html += "<tfoot><tr><td><b>Total</b></td><td class='text-center'><b>"+ laki +"</b></td><td class='text-center'><b>"+ cewe +"</b></td><td class='text-center'><b>"+ total +"</b></td></tr></tfoot>";
              html += "</table>"
              
              $("#table-container").append(html);
              $("#dataTable").dataTable();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
        }else if(kategori == 'pendidikan') {
          $.ajax({
            url: "<?php echo base_url();?>newLaporan/ajaxPendidikan",
            type: "post",
            data: {date_from: date_from, date_to: date_to, kategori: jenispencaker} ,
            dataType: "JSON",
            success: function (response) {
              $("#table-container").find("#dataTable").remove();
              $("#table-container").find("#dataTable_wrapper").remove();
              if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
              }
              var laki = 0;
              var cewe = 0;
              var total = 0;
              var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th>Tingkat Pendidikan</th><th  class='text-center'>Jml. Pria</th><th class='text-center'>Jml. Wanita</th><th class='text-center'>Total</th></tr></thead><tbody>";
              $.each(response.data, function(i, resultPendidikan){
                html += "<tr>";
                html += "<td>"+ resultPendidikan.NamaStatusPendidikan  +"</td>";
                html += "<td class='text-center'>"+ resultPendidikan.laki +"</td>";
                html += "<td class='text-center'>"+ resultPendidikan.cewe +"</td>";
                html += "<td class='text-center'>"+ resultPendidikan.total +"</td>";
                html += "</tr>";
                laki += parseFloat(resultPendidikan.laki);
                cewe += parseFloat(resultPendidikan.cewe);
                total += parseFloat(resultPendidikan.total);
              });
              html += "</tbody>";
              html += "<tfoot><tr><td><b>Total</b></td><td class='text-center'><b>"+ laki +"</b></td><td class='text-center'><b>"+ cewe +"</b></td><td class='text-center'><b>"+ total +"</b></td></tr></tfoot>";
              html += "</table>"
              
              $("#table-container").append(html);
              $("#dataTable").dataTable();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
            }
          });
        }else if(kategori == 'posisi') {
         $.ajax({
          url: "<?php echo base_url();?>newLaporan/ajaxPosisiJabatan",
          type: "post",
          data: {date_from: date_from, date_to: date_to, kategori: jenispencaker} ,
          dataType: "JSON",
          success: function (response) {
            $("#table-container").find("#dataTable").remove();
            $("#table-container").find("#dataTable_wrapper").remove();
            if ($.fn.DataTable.isDataTable('#dataTable')) {
              $('#dataTable').DataTable().destroy();
            }
            var laki = 0;
            var cewe = 0;
            var total = 0;
            var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th>Posisi Jabatan</th><th  class='text-center'>Jml. Pria</th><th class='text-center'>Jml. Wanita</th><th class='text-center'>Total</th></tr></thead><tbody>";
            $.each(response.data, function(i, resultPosisiJabatan){
              html += "<tr>";
              html += "<td>"+ resultPosisiJabatan.NamaPosisiJabatan  +"</td>";
              html += "<td class='text-center'>"+ resultPosisiJabatan.laki +"</td>";
              html += "<td class='text-center'>"+ resultPosisiJabatan.cewe +"</td>";
              html += "<td class='text-center'>"+ resultPosisiJabatan.total +"</td>";
              html += "</tr>";
              laki += parseFloat(resultPosisiJabatan.laki);
              cewe += parseFloat(resultPosisiJabatan.cewe);
              total += parseFloat(resultPosisiJabatan.total);
            });
            html += "</tbody>";
            html += "<tfoot><tr><td><b>Total</b></td><td class='text-center'><b>"+ laki +"</b></td><td class='text-center'><b>"+ cewe +"</b></td><td class='text-center'><b>"+ total +"</b></td></tr></tfoot>";
            html += "</table>"

            $("#table-container").append(html);
            $("#dataTable").dataTable();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
       }else{
        swal('ERROR!', 'Silahkan Pilih Kategori Dan Jenis Pencaker Terlebih Dahulu!', 'warning');
      }

    }else{
      swal('ERROR!', 'Silahkan Pilih Kategori Dan Jenis Pencaker Terlebih Dahulu!', 'warning');
    }
  }else if(jenisfilter == "1"){
    $.ajax({
      url: "<?php echo base_url();?>newLaporan/ajaxLamaran",
      type: "post",
      data: {date_from: date_from, date_to: date_to} ,
      dataType: "JSON",
      success: function (response) {
        $("#table-container").find("#dataTable").remove();
        $("#table-container").find("#dataTable_wrapper").remove();
        if ($.fn.DataTable.isDataTable('#dataTable')) {
          $('#dataTable').DataTable().destroy();
        }
        var count = 1;
        var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th class='text-center'>No</th><th>Nama Pencaker</th><th>Nama Lowongan </th><th>Nama Perusahaan</th><th class='text-center'>Status</th></tr></thead><tbody>";
        $.each(response.data, function(i, resultLamaran){
          html += "<tr>";
          html += "<td class='text-center'>"+ (count++) +"</td>";
          html += "<td>"+ resultLamaran.NamaPencaker +"</td>";
          if (resultLamaran.NamaLowongan == null) {
            html += "<td>Lowongan Tidak Diketahui</td>";
          }else{
            html += "<td>"+ resultLamaran.NamaLowongan +"</td>";
          }
          if (resultLamaran.NamaPerusahaan == null) {
            html += "<td>Perusahaan Tidak Diketahui</td>";
          }else{
            html += "<td>"+ resultLamaran.NamaPerusahaan +"</td>";
          }
          if (resultLamaran.StatusLowongan == '0') {
            html += "<td class='text-center'><span class='label label-warning'>Menunggu</span></td>";
          }else{
            html += "<td class='text-center'><span class='label label-primary'>Diproses</span></td>";
          }
          html += "</tr>";
        });
        html += "</tbody></table>"
        $("#table-container").append(html);
        $("#dataTable").dataTable();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }else if(jenisfilter == "2"){
    $.ajax({
      url: "<?php echo base_url();?>newLaporan/ajaxPenempatan",
      type: "post",
      data: {date_from: date_from, date_to: date_to} ,
      dataType: "JSON",
      success: function (response) {
        $("#table-container").find("#dataTable").remove();
        $("#table-container").find("#dataTable_wrapper").remove();
        if ($.fn.DataTable.isDataTable('#dataTable')) {
          $('#dataTable').DataTable().destroy();
        }
        var count = 1;
        var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th class='text-center'>No</th><th>No KTP</th><th>Nama Pencaker</th><th>Alamat</th><th>Nama Perusahaan</th><th>Jabatan</th><th>Pendidikan</th><th>Jenis Kelamin</th></tr></thead><tbody>";
        $.each(response.data, function(i, resultPenempatan){
          html += "<tr>";
          html += "<td class='text-center'>"+ (count++) +"</td>";
          html += "<td>"+ resultPenempatan.NomerPenduduk +"</td>";
          html += "<td>"+ resultPenempatan.NamaPencaker +"</td>";
          html += "<td>"+ resultPenempatan.alamat +"</td>";
          html += "<td>"+ resultPenempatan.NamaPerusahaan +"</td>";
          html += "<td>"+ resultPenempatan.Jabatan +"</td>";
          html += "<td>"+ resultPenempatan.NamaStatusPendidikan +"</td>";
          if (resultPenempatan.JenisKelamin == '0') {
            html += "<td>Laki - laki</td>";
          }else{
            html += "<td>Perempuan</td>";
          }
          html += "</tr>";
        });
        html += "</tbody></table>"
        $("#table-container").append(html);
        $("#dataTable").dataTable();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  }else if(jenisfilter == "all"){
    swal('ERROR!', 'Silahkan Pilih Jenis Filter Terlebih Dahulu!', 'warning');
  }
}else{
  swal('ERROR!', 'Silahkan Isi Range Tanggal Terlebih Dahulu!', 'warning');
}

});

function getFormattedDate()
{
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear().toString();
  return day + '-' + month + '-' + year;
}
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
    swal('ERROR!', 'Silahkan Isi Range Tanggal Terlebih Dahulu!', 'warning');

  }
  else
  {
    if(jenisfilter == "all"){
      swal('ERROR!', 'Silahkan Pilih Jenis Filter Terlebih Dahulu!', 'warning');
    }else{
      if (jenisfilter == "0") {
        if (kategori != 'all' && jenispencaker != 'all') {
          $("#exform").submit(); 
        }else{
          swal('ERROR!', 'Silahkan Pilih Jenis Pencaker dan Kategori Terlebih Dahulu!', 'warning');
        }
      }
      else{
        $("#exform").submit(); 
      }
    }
  }
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