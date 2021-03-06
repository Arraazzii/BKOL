<!-- Content Header (Page header) -->
<section class="content-header container">
    <h1>
        Daftar
        <small>Riwayat Lamaran</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Pencaker</a></li>
        <li class="active">Riwayat Lamaran</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title" style="color: #fff;">&nbsp; Daftar Riwayat Lamaran</h3>
        </div>
        <div class="box-body">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <?php if (!empty($lowongandata)) { ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" onchange="statusFilter()" id="statusFilter">
                                    <option value="">Semua Status</option> 
                                    <option>CV Terkirim</option> 
                                    <option>Proses Verifikasi</option>
                                    <option>Diterima</option>
                                    <option>Ditolak</option>
                                    <option>Tidak Memenuhi Syarat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="text" name="tglAwal" id="tglAwal" class="form-control date-range-filter" readonly="" data-date-split-input="true" value="01-01-2018">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="text" name="tglAkhir" id="tglAkhir" class="form-control date-range-filter" readonly="" data-date-split-input="true" value="31-12-2019">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <table class="table table-bordered table-striped table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Lowongan</th>
                                <th class="text-center">Tanggal Apply</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0 ?>
                            <?php if ($lowongandata != null): ?>
                                <?php foreach ($lowongandata->result() as $row): ?>
                                    <?php $i++; 
                                    $status = '';
                                    $tgl = '';
                                    if ($row->StatusLowongan == 0)
                                        $status = '<span class="label label-info">CV Terkirim</span>';
                                    elseif ($row->StatusLowongan == 1)
                                        $status = '<span class="label label-primary">Proses Verifikasi</span>';
                                    elseif ($row->StatusLowongan == 2)
                                        $status = '<span class="label label-success">Diterima</span>';
                                    elseif ($row->StatusLowongan == 3)
                                        $status = '<span class="label label-danger">Ditolak</span>';
                                    elseif($row->StatusLowongan == 4)
                                        $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                                    else
                                        $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';

                                    $tgl = date('d-m-Y', strtotime($row->RegisterDate));
                                    
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(3) ?></td>
                                        <td><?php echo $row->NamaPerusahaan ?></td>
                                        <td><?php echo $row->NamaLowongan ?></td>
                                        <td class="text-center"><?php echo $tgl ?></td>
                                        <td class="text-center"><?php echo $status ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var table = $("#datatable").dataTable();

        $("#tglAwal").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,

        });

        $("#tglAkhir").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
        });
    });


    function filterRows() {
      var from = $('#tglAwal').val();
      var to = $('#tglAkhir').val();
      
  $('#datatable tbody tr').each(function(i, tr) {
    var val = $(tr).find("td:eq(3)").html();
    var dateVal = moment(val, "dd-mm-yyyy");
    if (val >= from && val <= to) {
        $(tr).css("display","table-row");
    } else {
        $(tr).css("display","none");
    }
});
}

$('#tglAwal').on("change", filterRows);
$('#tglAkhir').on("change", filterRows);
</script>
<script>
    function statusFilter() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("statusFilter");
      filter = input.value.toUpperCase();
      table = document.getElementById("datatable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }       
}
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