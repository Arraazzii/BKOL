<div class="modal fade" id="modal-kelurahan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Kelurahan</label></div>
                    <div class="col-md-8">
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input id="idkecamatan" name="idkecamatan" type="hidden" value="<?= $MsKecamatanData->IDKecamatan ?>" />
                        <input type="hidden" name="idkelurahan" id="idkelurahan">
                        <input type="text" name="namakelurahan" id="namakelurahan" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Kelurahan">
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
        <small>Kelurahan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li><a href="#">Wilayah</a></li>
        <li class="active">Kelurahan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">DAFTAR KELURAHAN</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td class="text-left">Kota / Kabupaten</td>
                                <td class="text-left"><?= $MsKabupatenData->NamaKabupaten ?></td>
                            </tr>
                            <tr>
                                <td align="left">
                                    Kecamatan
                                </td>
                                <td align="left">
                                    <?= $MsKecamatanData->NamaKecamatan ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="input-group text-center">
                            <button type="button" class="btn btn-default btn-sm" id="tambahdata"><i class="fa fa-plus"></i> Tambah Kelurahan</button>
                            <button type="button" class="btn btn-default btn-sm" id="kembali"><i class="fa fa-arrow-left"></i> Kembali</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th width="200" class="text-center">Nama Kelurahan</th>
                                <th width="250" class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsKelurahanData as $getdata): ?>
                                    <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-primary btn-sm" onclick="DoEdit(\''.$getdata->IDKelurahan.'\') ">Detail</a>';
                                    $deletebtn = '<a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDKelurahan.'\') ">Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                        <td><?php echo $getdata->NamaKelurahan ?></td>
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
    $("#kembali").click(function() {
        window.location.href='<?php echo base_url('admin/kecamatan') ?>/<?php echo $MsKabupatenData->IDKabupaten ?>';
    });
    $("#tambahdata").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-kelurahan");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Kelurahan');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namakelurahan").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Kelurahan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kelurahan/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKecamatan: $("#idkecamatan").val(),
                        NamaKelurahan: $("#namakelurahan").val()
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
                notifikasi('Nama Kelurahan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kelurahan/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKelurahan: $("#idkelurahan").val(),
                        NamaKelurahan: $("#namakelurahan").val()
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
        $("#namakelurahan").val('');
        $('#modemodal').val('');
        $('#idkelurahan').val('');
    }

    function DoEdit(IDKelurahan)
    {
        var tmodal = $("#modal-kelurahan");
        $.get('<?= site_url('admin/kelurahan/getdata') ?>/'+IDKelurahan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idkelurahan').val(getdata.IDKelurahan);
                    $('#namakelurahan').val(getdata.NamaKelurahan);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Kelurahan');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Kelurahan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDKelurahan)
    {
        $.get('<?= site_url('admin/kelurahan/getdata') ?>/'+IDKelurahan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkelurahan').val(getdata.IDKelurahan);
                    swal({
                        title: 'Hapus Data Kelurahan?',
                        text: "Kelurahan "+getdata.NamaKelurahan+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/kelurahan/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDKelurahan: getdata.IDKelurahan},
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
                       text: 'Kelurahan Tidak Ditemukan!'
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