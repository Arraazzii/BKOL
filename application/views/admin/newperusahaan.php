<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Perusahaan Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Perusahaan Baru</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR PERUSAHAAN MASUK</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="tabel-perusahaan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="200">Nama Perusahaan</th>
                        <th>Pemberi Kerja</th>
                        <th>Telepon</th>
                        <th>E-mail</th>
                        <th>Tanggal Registrasi</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
            </table>
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

            var table = $("#tabel-perusahaan").dataTable({
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
                ajax: {"url": "<?php echo base_url('ajax/get_newperusahaan_json')?>", "type": "POST"},
                columns: [
                {"data": "No","sortable" : false,"searchable" : false},
                {"data": "NamaPerusahaan"},
                {"data": "NamaPemberiKerja"},
                {"data": "Telepon"},
                {"data": "Email"},
                {"data": "RegisterDate"},
                {"data": "view","sortable" : false,"searchable" : false}
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
        function DoActivateConfirm(IDPerusahaanTemp)
        {
            $.get('<?= site_url('admin/perusahaantemp/getdata') ?>/'+IDPerusahaanTemp,
                function(getdata)
                {
                    if (getdata.exists)
                    {
                        swal({
                            title: 'Aktifkan Perusahaan?',
                            text: "Perusahaan "+getdata.NamaPerusahaan+" akan diaktifkan!",
                            type: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aktifkan',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.value) {
                              window.location.href = '<?= site_url('admin/exportperusahaantemp/') ?>/' + getdata.IDPerusahaanTemp;
                          }
                      })
                    }
                    else
                    {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Perusahaan Tidak Ditemukan!'
                        })
                    }
                },'json'
                )
        }

        function DoDeleteConfirm(IDPerusahaanTemp)
        {
            $.get('<?= site_url('admin/perusahaantemp/getdata') ?>/'+IDPerusahaanTemp,
                function(getdata)
                {
                    if (getdata.exists)
                    {
                        swal({
                            title: 'Hapus Perusahaan?',
                            text: "Perusahaan "+getdata.NamaPerusahaan+" akan dihapus!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.value) {
                              window.location.href = '<?= site_url('admin/deleteperusahaantemp/') ?>/' + getdata.IDPerusahaanTemp;
                          }
                      })
                    }
                    else
                    {
                        alert('Perusahaan tidak ditemukan');
                    }
                },'json'
                )
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