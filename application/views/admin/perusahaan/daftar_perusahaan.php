<section class="content-header">
    <h1>
        Daftar
        <small>Perusahaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Perusahaan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR PERUSAHAAN</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="tabel-perusahaan">
                <thead>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">Nama Perusahaan</th>
                        <th class="text-left">Nama Pemberi Kerja</th>
                        <th class="text-left">Email</th>
                        <th class="text-center">Telepon</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">PROFIL PERUSAHAAN</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td id="namaperusahaan"></td>
                            </tr>
                            <tr>
                                <td>Bidang Perusahaan</td>
                                <td id="bidangperusahaan"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td id="telepon"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td id="alamat"></td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td id="kelurahan"></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td id="kecamatan"></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td id="kodepos"></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td id="kota"></td>
                            </tr>
                            <tr>
                                <td>Propinsi</td>
                                <td id="provinsi"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
             </div>
        </div>
    </div>
</div>
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
            ajax: {"url": "<?php echo base_url('ajax/get_perusahaan_json')?>", "type": "POST"},
            columns: [
            {"data": "No","sortable" : false,"searchable" : false},
            {"data": "NamaPerusahaan"},
            {"data": "NamaPemberiKerja"},
            {"data": "Email"},
            {"data": "Telepon","sortable" : false,"searchable" : false},
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
function DoView(id)
  {
    
    $.get('<?= site_url('admin/perusahaan/getdata') ?>/'+id,
      function(getdata)
      {
        if (getdata.exists)
        {
            var inst = $('#modal-detail');
            inst.modal('show');
            ClearAddInput();
            $("#namaperusahaan").html(getdata.NamaPerusahaan);
            $('#bidangperusahaan').html(getdata.NamaBidangPerusahaan);
            $('#email').html(getdata.Email);
            $('#telepon').html(getdata.Telepon);
            $('#alamat').html(getdata.Alamat);
            $('#kelurahan').html(getdata.NamaKelurahan);
            $('#kecamatan').html(getdata.NamaKecamatan);
            $('#kodepos').html(getdata.KodePos);
            $('#kota').html(getdata.Kota);
            $('#provinsi').html(getdata.Propinsi);
        }
        else
        {
          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Perusahaan Tidak Ditemukan!'
          })
        }
      },'json')
  }

  function DoDelete(id)
  {
    $.get('<?= site_url('admin/perusahaan/getdata') ?>/'+id,
    function(getdata)
    {
       if (getdata.exists)
       {
          swal({
            title: 'Hapus Data Perusahaan?',
            text: "Perusahaan "+getdata.NamaPerusahaan+" akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.value) {
              window.location.href = '<?= site_url('admin/perusahaan/') ?>/' + id + '/delete';
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
    },'json')
  }

  function ClearAddInput()
  {
    $('#namaperusahaan').html("");
    $('#bidangperusahaan').html("");
    $('#email').html("");
    $('#telepon').html("");
    $('#alamat').html("");
    $('#kelurahan').html("");
    $('#kecamatan').html("");
    $('#kodepos').html("");
    $('#kota').html("");
    $('#provinsi').html("");
  }

  </script>