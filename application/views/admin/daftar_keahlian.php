
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Keahlian</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li><a href="<?php echo base_url('admin/jenislowongan') ?>">Jenis Lowongan</a></li>
        <li class="active">Keahlian</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">DAFTAR KEAHLIAN</h3>
                    <button type="button" class="btn btn-default btn-sm pull-right" title="Tambah Keahlian" id="tambahjenislowongan"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-default btn-sm pull-left" title="Kembali" id="kembali"><i class="fa fa-arrow-left"></i></button>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <table class="table">
                        <tr>
                            <td>Jenis Lowongan</td>
                            <td><?= $MsJenisLowonganData->NamaJenisLowongan ?></td>
                        </tr>
                    </table>
                    <div class="col-md-12" style="margin-bottom: 10px;">
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th class="text-center">Nama Keahlian</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                                <?php $i = 0; ?>
                                <?php foreach ($MsKeahlianData as $getdata): ?>
                                    <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-warning btn-sm" onclick="DoEdit(\''.$getdata->IDKeahlian.'\') "><i class="fa fa-edit"></i> Edit</a>';
                                    $deletebtn = ' <a class="btn btn-danger btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDKeahlian.'\') "><i class="fa fa-trash"></i> Hapus</a>';
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                        <td><?php echo $getdata->NamaKeahlian ?></td>
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
        window.location.href='<?php echo base_url('admin/jenislowongan') ?>';
    });
    $("#tambahjenislowongan").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-keahlian");
        $('#modemodal').val('add');
        $('#btnsimpan').html('Simpan');
        $('#judulmodal').html('Tambah Keahlian');
        tmodal.modal('show');
    });

    $("#btnsimpan").click(function() {
        namajenis = $("#namakeahlian").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Keahlian Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/keahlian/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        NamaKeahlian: namajenis,
                        IDJenisLowongan: $("#idjenislowongan").val(),
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
                notifikasi('Nama Keahlian Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/keahlian/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDKeahlian: $("#idkeahlian").val(),
                        NamaKeahlian: $("#namakeahlian").val()
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
        $("#namakeahlian").val('');
        $('#modemodal').val('');
        $('#idkeahlian').val('');
    }

    function DoEdit(IDKeahlian)
    {
        var tmodal = $("#modal-keahlian");
        $.get('<?= site_url('admin/keahlian/getdata') ?>/'+IDKeahlian,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idkeahlian').val(getdata.IDKeahlian);
                    $('#namakeahlian').val(getdata.NamaKeahlian);
                    $('#btnsimpan').html('Ubah');
                    $('#judulmodal').html('Ubah Keahlian');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Keahlian Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDKeahlian)
    {
        $.get('<?= site_url('admin/keahlian/getdata') ?>/'+IDKeahlian,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idkeahlian').val(getdata.IDKeahlian);
                    swal({
                        title: 'Hapus Data Keahlian?',
                        text: "Keahlian "+getdata.NamaKeahlian+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/keahlian/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDKeahlian: getdata.IDKeahlian},
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
                       text: 'Keahlian Tidak Ditemukan!'
                   })
                }
            },'json')
    }

</script>

<div class="modal fade" id="modal-keahlian">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal"></h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Keahlian</label></div>
                    <div class="col-md-8">
                        <input id="idjenislowongan" name="idjenislowongan" type="hidden" value="<?= $MsJenisLowonganData->IDJenisLowongan ?>" />
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input type="hidden" name="idkeahlian" id="idkeahlian">
                        <input type="text" name="namakeahlian" id="namakeahlian" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Keahlian">
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