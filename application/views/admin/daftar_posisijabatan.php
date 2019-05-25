<div class="modal fade" id="modal-posisijabatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Posisi Jabatan</label></div>
                    <div class="col-md-8">
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input type="hidden" name="idposisijabatan" id="idposisijabatan">
                        <input type="text" name="namaposisijabatan" id="namaposisijabatan" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Posisi Jabatan">
                    </div>
                </div>
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
        <small>Posisi Jabatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Posisi Jabatan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header text-center">
                    <h3 class="box-title">DAFTAR POSISI JABATAN</h3>
                    <button type="button" class="btn btn-default btn-sm pull-right" title="Tambah Posisi Jabatan" id="tambahdata"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th class="text-center">Nama Posisi Jabatan</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsPosisiJabatanData as $getdata): ?>
                                    <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-warning btn-sm" onclick="DoEdit(\''.$getdata->IDPosisiJabatan.'\') "><i class="fa fa-edit"></i> Edit</a> ';
                                    $deletebtn = '<a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDPosisiJabatan.'\') "><i class="fa fa-trash"></i> Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(3) ?></td>
                                        <td><?php echo $getdata->NamaPosisiJabatan ?></td>
                                        <td class="text-center"><?php echo $detailbtn.$deletebtn ?></td>
                                    </tr>
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
        </div>
    </div>
</section>
<script>
 
    $("#tambahdata").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-posisijabatan");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Posisi Jabatan');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namaposisijabatan").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Posisi Jabatan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/posisijabatan/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        NamaPosisiJabatan: namajenis,
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
        }
        else if (modemodal == 'edit') {
            if (namajenis == '') {
                notifikasi('Nama Posisi Jabatan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/posisijabatan/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDPosisiJabatan: $("#idposisijabatan").val(),
                        NamaPosisiJabatan: $("#namaposisijabatan").val()
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
        }
        
    });

    function clearmodaljenis() {
        $("#namaposisijabatan").val('');
        $('#modemodal').val('');
        $('#idposisijabatan').val('');
    }

    function DoEdit(IDPosisiJabatan)
    {
        var tmodal = $("#modal-posisijabatan");
        $.get('<?= site_url('admin/posisijabatan/getdata') ?>/'+IDPosisiJabatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idposisijabatan').val(getdata.IDPosisiJabatan);
                    $('#namaposisijabatan').val(getdata.NamaPosisiJabatan);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Posisi Jabatan');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Posisi Jabatan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDPosisiJabatan)
    {
        $.get('<?= site_url('admin/posisijabatan/getdata') ?>/'+IDPosisiJabatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idposisijabatan').val(getdata.IDPosisiJabatan);
                    swal({
                        title: 'Hapus Data Posisi Jabatan?',
                        text: "Posisi Jabatan "+getdata.NamaPosisiJabatan+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/posisijabatan/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDPosisiJabatan: getdata.IDPosisiJabatan},
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
                       text: 'Posisi Jabatan Tidak Ditemukan!'
                   })
                }
            },'json')
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