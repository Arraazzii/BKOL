<div class="modal fade" id="modal-jurusan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="" class="col-md-3">Pendidikan</label>
                        <div class="col-md-9">
                            <?php echo combo_pendidikan(0, 'Pilih', 'IDStatusPendidikan != "000001" AND IDStatusPendidikan != "000002" AND IDStatusPendidikan != "000003"') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3">Nama Jurusan</label>
                        <div class="col-md-9">
                            <input type="hidden" name="modemodal" id="modemodal">
                            <input type="hidden" name="idjurusan" id="idjurusan">
                            <input type="text" name="namajurusan" id="namajurusan" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Jurusan">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnsimpan"></button>
            </div>
        </div>
    </div>
</div>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Jurusan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Jurusan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header text-center">
                    <h3 class="box-title">DAFTAR JURUSAN</h3>
                    <button type="button" class="btn btn-default btn-sm pull-right" title="Tambah Jurusan" id="tambahdata"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th class="text-left">Tingkat Pendidikan</th>
                                <th class="text-center">Nama Jurusan</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsJurusanData as $getdata): ?>
                                    <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-warning btn-sm" onclick="DoEdit(\''.$getdata->IDjurusan.'\') "><i class="fa fa-edit"></i> Edit</a> '; 
                                    $deletebtn = '<a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDjurusan.'\') "><i class="fa fa-trash"></i> Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(3) ?></td>
                                        <td><?php echo $getdata->NamaStatusPendidikan ?></td>
                                        <td><?php echo $getdata->Jurusan ?></td>
                                        <td class="text-center"><?php echo $detailbtn.$deletebtn ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data</td>
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
        </div>
    </div>
</section>
<script>
 
    $("#tambahdata").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-jurusan");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Jurusan');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namajurusan").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            $.ajax({
                url: '<?= site_url('admin/jurusan/tambahdata') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    NamaJurusan: $("#namajurusan").val(),
                    IDStatusPendidikan: $("#idstatuspendidikan").val()
                },
                success: function(getdata) {
                    if (getdata.valid)
                    {
                        window.location.reload();
                    }
                    else
                    {
                        notifikasi(getdata.error, "danger", "fa fa-exclamation");
                    }
                }
            });
        }
        else if (modemodal == 'edit') {
            $.ajax({
                url: '<?= site_url('admin/jurusan/updatedata') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    IDjurusan: $("#idjurusan").val(),
                    NamaJurusan: $("#namajurusan").val(),
                    IDStatusPendidikan: $("#idstatuspendidikan").val()
                },
                success: function(getdata) {
                    if (getdata.valid)
                    {
                        window.location.reload();
                    }
                    else
                    {
                        notifikasi(getdata.error, "danger", "fa fa-exclamation");
                    }
                }
            });
        }
        
    });

    function clearmodaljenis() {
        $("#idstatuspendidikan").val('');
        $("#namajurusan").val('');
        $('#modemodal').val('');
        $('#idjurusan').val('');
    }

    function DoEdit(IDjurusan)
    {
        var tmodal = $("#modal-jurusan");
        $.get('<?= site_url('admin/jurusan/getdata') ?>/'+IDjurusan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idstatuspendidikan').val(getdata.IDStatusPendidikan);
                    $('#idjurusan').val(getdata.IDjurusan);
                    $('#namajurusan').val(getdata.Jurusan);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Jurusan');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Jurusan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDjurusan)
    {
        $.get('<?= site_url('admin/jurusan/getdata') ?>/'+IDjurusan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idjurusan').val(getdata.IDjurusan);
                    swal({
                        title: 'Hapus Data Jurusan?',
                        text: "Jurusan "+getdata.Jurusan+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/jurusan/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDjurusan: getdata.IDjurusan},
                                success: function(getdata2){
                                    if (getdata2.valid)
                                    {
                                        window.location.reload();
                                    }
                                    else
                                    {
                                        notifikasi(getdata2.error, "danger", "fa fa-exclamation");
                                    }
                                }
                            });
                        }
                    })
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Jurusan Tidak Ditemukan!'
                   })
                }
            },'json')
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