<div class="modal fade" id="modal-kabupaten">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Kabupaten</label></div>
                    <div class="col-md-8">
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input type="hidden" name="idkabupaten" id="idkabupaten">
                        <input type="text" name="namakabupaten" id="namakabupaten" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Kabupaten">
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
        <small>Kabupaten</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li><a href="#">Wilayah</a></li>
        <li class="active">Kabupaten</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">DAFTAR KABUPATEN</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <button type="button" class="btn btn-default btn-sm" id="tambahdata"><i class="fa fa-plus"></i> Tambah Kabupaten</button>
                        <!-- <button type="button" class="btn btn-default" id="kembali"><i class="fa fa-arrow-left"></i> kembali</button> -->
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th class="text-center">Nama Kabupaten</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsKabupatenData as $getdata): ?>
                                    <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-primary btn-sm" onclick="DoEdit(\''.$getdata->IDKabupaten.'\') ">Detail</a>';
                                    $viewbtn = '<a class="btn btn-primary btn-sm" href="'.site_url('admin/kecamatan/'.$getdata->IDKabupaten).'">Lihat Kecamatan</a>';
                                    $deletebtn = '<a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDKabupaten.'\') ">Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(3) ?></td>
                                        <td><?php echo $getdata->NamaKabupaten ?></td>
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
 
    $("#tambahdata").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-kabupaten");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Kabupaten');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namakabupaten").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Kabupaten Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kabupaten/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        NamaKabupaten: namajenis,
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
                notifikasi('Nama Kabupaten Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/kabupaten/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKabupaten: $("#idkabupaten").val(),
                        NamaKabupaten: $("#namakabupaten").val()
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
        $("#namakabupaten").val('');
        $('#modemodal').val('');
        $('#idkabupaten').val('');
    }

    function DoEdit(IDKabupaten)
    {
        var tmodal = $("#modal-kabupaten");
        $.get('<?= site_url('admin/kabupaten/getdata') ?>/'+IDKabupaten,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idkabupaten').val(getdata.IDKabupaten);
                    $('#namakabupaten').val(getdata.NamaKabupaten);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Kabupaten');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Kabupaten Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDKabupaten)
    {
        $.get('<?= site_url('admin/kabupaten/getdata') ?>/'+IDKabupaten,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkabupaten').val(getdata.IDKabupaten);
                    swal({
                        title: 'Hapus Data Kabupaten?',
                        text: "Kabupaten "+getdata.NamaKabupaten+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/kabupaten/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDKabupaten: getdata.IDKabupaten},
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
                       text: 'Kabupaten Tidak Ditemukan!'
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