<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Lowongan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin') ?>">Home</a></li>
    <li><a href="<?php echo site_url('admin') ?>">Perusahaan</a></li>
    <li class="active">Lowongan Kerja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header with-border text-center">
      <h3 class="box-title">DAFTAR LOWONGAN KERJA</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body table-responsive">
      <a href="<?php echo base_url();?>perusahaan/tambahdatalowongan" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a><br><br>
      <table class="table table-bordered table-striped" id="tabel-lowongan">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">ID Loker</th>
            <th class="text-center">Nama Pekerjaan</th>
            <th class="text-center">Tgl Berlaku</th>
            <th class="text-center">Tgl Berakhir</th>
            <th class="text-center">Status</th>
            <th class="text-center">Pria</th>
            <th class="text-center">Wanita</th>
            <th class="text-center">Detail</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
</section>

<script>
  $(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var table = $("#tabel-lowongan").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('input.DT', function() {
          api.search(this.value).draw();
        });
      },
      oLanguage: {
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "&laquo;",
          "sNext":     "&raquo;",
          "sLast":     "Terakhir"
        }
      },
      processing: true,
      serverSide: true,
      ajax: {"url": "<?php echo base_url('ajax/daftar_lowongan_json')?>", "type": "POST"},
      columns: [
      {"data": "No","sortable" : false,"searchable" : false},
      {"data": "IDLowongan"},
      {"data": "NamaLowongan"},
      {"data": "RegDate"},
      {"data": "ExpDate"},
      {"data": "Status","sortable" : false,"searchable" : false},
      {"data": "JmlPria","sortable" : false,"searchable" : false},
      {"data": "JmlWanita","sortable" : false,"searchable" : false},
      {"data": "view","sortable" : false,"searchable" : false},
      ],
      order: [[1, 'desc']],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
      }

    });
  });

  function DoDeleteConfirm(id)
  {
    swal({
      title: 'Hapus Data Lowongan?',
      text: "Lowongan ini akan dihapus!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = '<?= site_url('perusahaan/lowongan/delete') ?>/' + id;
      }
    })
  }
</script>