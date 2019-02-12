<div class="modal fade" id="modal-jenis">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodaljenis">Tambah Jenis Lowongan</h4>
            </div>
            <div class="modal-body" style="margin-bottom: 30px">
                <div class="form-group">
                    <div class="col-md-4"><label for="">Nama Jenis Lowongan</label></div>
                    <div class="col-md-8">
                        <input type="hidden" name="modemodal" id="modemodal">
                        <input type="hidden" name="idjenislowongan" id="idjenislowongan">
                        <input type="text" name="namajenislowongan" id="namajenislowongan" class="form-control" value="" required="required" pattern="" placeholder="Masukan Nama Jenis Lowongan">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanjenis">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Jenis Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Jenis Lowongan Kerja</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header text-center">
                    <h3 class="box-title">DAFTAR JENIS LOWONGAN KERJA</h3>
                        <button type="button" class="btn btn-default btn-sm pull-right" title="Tambah Jenis Lowongan" id="tambahjenislowongan"><i class="fa fa-plus"></i></button>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10">No</th>
                                <th class="text-center">Nama Jenis Lowongan Pekerjaan</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($this->pagination->total_rows > 0): ?>
                            <?php $i = 0; ?>
                            <?php foreach ($MsJenisLowonganData as $getdata): ?>
                                <?php 
                                    $i++;
                                    $detailbtn = '<a class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDJenisLowongan.'\') ">Edit</a>';
                                    $viewbtn = '<a class="btn btn-default btn-sm" href="'.site_url('admin/keahlian/'.$getdata->IDJenisLowongan).'">Lihat Keahlian</a>';
                                    $deletebtn = '<a class="btn btn-default btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDJenisLowongan.'\') ">Hapus</a>';
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i+$this->uri->segment(3) ?></td>
                                    <td><?php echo $getdata->NamaJenisLowongan ?></td>
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

    $("#tambahjenislowongan").click(function() {
        clearmodaljenis();
        var tmodal = $("#modal-jenis");
        $('#modemodal').val('add');
        $('#simpanjenis').html('Simpan');
        $('#judulmodaljenis').html('Tambah Jenis Lowongan');
        tmodal.modal('show');
    });

    $("#simpanjenis").click(function() {
        namajenis = $("#namajenislowongan").val();
        modemodal = $("#modemodal").val();
        if (modemodal == 'add') {
            if (namajenis == '') {
                notifikasi('Nama Jenis Lowongan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/jenislowongan/tambahdata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {NamaJenisLowongan: namajenis},
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
                notifikasi('Nama Jenis Lowongan Harus Diisi', 'danger', 'fa fa-exclamation');
            } else {
                $.ajax({
                    url: '<?= site_url('admin/jenislowongan/updatedata') ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        IDJenisLowongan: $("#idjenislowongan").val(),
                        NamaJenisLowongan: $("#namajenislowongan").val()
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
        $("#namajenislowongan").val('');
        $('#modemodal').val('');
        $('#idjenislowongan').val('');
    }

    function DoEdit(IDJenisLowongan)
    {
        var tmodal = $("#modal-jenis");
        $.get('<?= site_url('admin/jenislowongan/getdata') ?>/'+IDJenisLowongan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    clearmodaljenis();
                    $('#modemodal').val('edit');
                    $('#idjenislowongan').val(getdata.IDJenisLowongan);
                    $('#namajenislowongan').val(getdata.NamaJenisLowongan);
                    $('#simpanjenis').html('Ubah');
                    $('#judulmodaljenis').html('Ubah Jenis Lowongan');
                    tmodal.modal('show');
                }
                else
                {
                    swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'Jenis Lowongan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

    function DoDeleteConfirm(IDJenisLowongan)
    {
        $.get('<?= site_url('admin/jenislowongan/getdata') ?>/'+IDJenisLowongan,
            function(getdata)
            {
                if (getdata.exists)
                {
                    $('#idjenislowongan').val(getdata.IDJenisLowongan);
                    swal({
                        title: 'Hapus Data Lowongan?',
                        text: "Lowongan "+getdata.NamaJenisLowongan+" akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('admin/jenislowongan/deletedata') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDJenisLowongan: getdata.IDJenisLowongan},
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
                     text: 'Jenis Lowongan Tidak Ditemukan!'
                   })
                }
            },'json')
    }

</script>