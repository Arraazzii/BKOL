<div class="modal fade" id="modal-kecamatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Kecamatan</label></div>
                    <div class="col-md-8">
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input id="idkabupaten" name="idkabupaten" type="hidden" value="<?= $MsKabupatenData->IDKabupaten ?>" />
                        <input type="hidden" name="idkecamatan" id="idkecamatan">
                        <input type="text" name="namakecamatan" id="namakecamatan" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Kecamatan">
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
        <small>Kecamatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li><a href="#">Wilayah</a></li>
        <li class="active">Kecamatan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">DAFTAR KECAMATAN</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <div class="col-md-6">
                        <table class="table">
                            <td class="text-left">Kota / Kabupaten</td>
                            <td class="text-left"><?= $MsKabupatenData->NamaKabupaten ?></td>
                        </table>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <div class="input-group text-center">
                            <button type="button" class="btn btn-default btn-sm" id="tambahdata"><i class="fa fa-plus"></i> Tambah Kecamatan</button>
                            <button type="button" class="btn btn-default btn-sm" id="kembali"><i class="fa fa-arrow-left"></i> Kembali</button>
                        </div>
                    </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th width="200" class="text-center">Nama Kecamatan</th>
                                    <th width="250" class="text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsKecamatanData as $getdata): ?>
                                    <?php 
                                        $i++;
                                        $detailbtn = '<a class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDKecamatan.'\') ">Detail</a>';
                                        $viewbtn = '<a class="btn btn-default btn-sm" href="'.site_url('admin/kelurahan/'.$getdata->IDKecamatan).'">Lihat Kelurahan</a>';
                                        $deletebtn = '<a class="btn btn-default btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDKecamatan.'\') ">Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                        <td><?php echo $getdata->NamaKecamatan ?></td>
                                        <td class="text-center"><?php echo $detailbtn.$viewbtn.$deletebtn ?></td>
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
        window.location.href='<?php echo base_url('admin/kabupaten') ?>'
    });
    $("#tambahdata").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-kecamatan");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Kecamatan');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namakecamatan").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Kecamatan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kecamatan/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKabupaten: $("#idkabupaten").val(),
                        NamaKecamatan: $("#namakecamatan").val()
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
                notifikasi('Nama Kecamatan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kecamatan/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKecamatan: $("#idkecamatan").val(),
                        NamaKecamatan: $("#namakecamatan").val()
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
        $("#namakecamatan").val('');
        $('#modemodal').val('');
        $('#idkecamatan').val('');
    }

    function DoEdit(IDKecamatan)
    {
        var tmodal = $("#modal-kecamatan");
        $.get('<?= site_url('admin/kecamatan/getdata') ?>/'+IDKecamatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idkecamatan').val(getdata.IDKecamatan);
                    $('#namakecamatan').val(getdata.NamaKecamatan);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Kecamatan');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'Kecamatan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDKecamatan)
    {
        $.get('<?= site_url('admin/kecamatan/getdata') ?>/'+IDKecamatan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkecamatan').val(getdata.IDKecamatan);
                    swal({
                        title: 'Hapus Data kecamatan?',
                        text: "kecamatan "+getdata.NamaKecamatan+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/kecamatan/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDKecamatan: getdata.IDKecamatan},
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
                     text: 'kecamatan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

</script>