<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Profil Perusahaan
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li>Perusahaan</li>
        <li class="active">Profil</li>
    </ol>
</section>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="judulmodal">Edit Profil Pemberi Kerja</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="" class="col-md-4">Nama Pemberi Kerja</label>
                        <div class="col-md-8">
                            <input type="text" name="namapemberikerja" id="namapemberikerja" class="form-control" placeholder="Nama Pemberi Kerja" value="<?php echo $MsPerusahaanData->NamaPemberiKerja ?>">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Jabatan</label>
                        <div class="col-md-8">
                            <input type="text" name="jabatanpemberikerja" id="jabatanpemberikerja" class="form-control" value="<?php echo $MsPerusahaanData->JabatanPemberiKerja ?>" required="required" pattern="" placeholder="Jabatan Pemberi Kerja">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Telepon</label>
                        <div class="col-md-8">
                            <input type="text" name="teleponpemberikerja" id="teleponpemberikerja" class="form-control" value="<?php echo $MsPerusahaanData->TeleponPemberiKerja ?>" required="required" pattern="" placeholder="Telepon Pemberi Kerja">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="emailpemberikerja" id="emailpemberikerja" class="form-control" value="<?php echo $MsPerusahaanData->EmailPemberiKerja ?>" required="required" pattern="" placeholder="Email Pemberi Kerja">
                            <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnsimpan">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">PROFIL PERUSAHAAN</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body table-responsive">
                    <?php  
                    $filename = BASEPATH.'/../assets/file/perusahaan/'.$MsPerusahaanData->IDPerusahaan.'.jpg';
                    if(file_exists($filename))
                    {
                        echo '<img class="profile-user-img img-responsive" src="'.site_url('assets/file/perusahaan').'/'.$MsPerusahaanData->IDPerusahaan.'.jpg">';
                    }

                    ?>
                    <h3 class="profile-username text-center"><?= $MsPerusahaanData->NamaPerusahaan ?></h3>
                    <div class="col-md-12">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Bidang Perusahaan</b> <a class="pull-right"><?= $MsPerusahaanData->NamaBidangPerusahaan ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $MsPerusahaanData->Email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon</b> <a class="pull-right"><?= $MsPerusahaanData->Telepon ?></a>
                            </li>
                        </ul>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                        <p class="">
                            <?= $MsPerusahaanData->Alamat . ', Kel. ' . ucfirst(strtolower($MsPerusahaanData->NamaKelurahan)) . ', Kec. '. ucfirst(strtolower($MsPerusahaanData->NamaKecamatan)) . ', ' . ucfirst(strtolower($MsPerusahaanData->Kota)) . ', ' . ucfirst(strtolower($MsPerusahaanData->Propinsi)) . ', ' . $MsPerusahaanData->KodePos ?>
                        </p>
                        <div class="text-center">
                            <a href="<?php echo site_url('perusahaan/editprofil') ?>" class="btn btn-default"><i class="fa fa-edit"></i> Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">PROFIL PEMBERI KERJA</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama Pemberi Kerja</b> <a class="pull-right"><?= $MsPerusahaanData->NamaPemberiKerja ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Jabatan</b> <a class="pull-right"><?= $MsPerusahaanData->JabatanPemberiKerja ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telepon</b> <a class="pull-right"><?= $MsPerusahaanData->TeleponPemberiKerja ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right"><?= $MsPerusahaanData->EmailPemberiKerja ?></a>
                            </li>
                        </ul>
                        <div class="text-center">
                            <button type="button" id="btnedit" class="btn btn-default btn-square"><i class="fa fa-edit"></i> Edit Profil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $("#btnedit").click(function() {
            var ins = $("#modal-edit");
            ins.modal('show');
        });

        $("#btnsimpan").click(function() {
            $.ajax({
                url: '<?php echo site_url('pemberikerja') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    namapemberikerja: $("#namapemberikerja").val(),
                    jabatanpemberikerja: $("#jabatanpemberikerja").val(),
                    teleponpemberikerja: $("#teleponpemberikerja").val(),
                    emailpemberikerja: $("#emailpemberikerja").val()
                },
                success: function(data) {
                    if (data.ket == 1) {
                        $('#modal-edit').modal('hide');
                        window.location.href="<?php echo site_url('perusahaan/index') ?>";
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        }
                    }
                }
            });
        });
    });
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