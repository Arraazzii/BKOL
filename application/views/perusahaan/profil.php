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
    </div>
</section>
<script>
   
</script>