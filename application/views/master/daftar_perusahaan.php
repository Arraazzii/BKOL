<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">
<!-- /.content -->
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>
        Daftar
        <small>Perusahaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Perusahaan</li>
    </ol>
</section> -->
<style type="text/css">
    .text-left{
        text-align: center !important;
    }
</style>
<?php $i = 0; ?>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR PERUSAHAAN</h3>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="15">No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat Perusahaan</th>
                    </tr>
                </thead>
                <?php if ($MsPerusahaanData->num_rows > 0): ?>
                    <tbody>
                        <?php foreach ($MsPerusahaanData->result() as $getdata): ?>
                            <?php $i++; ?>
                            <tr>
                                <td><?php echo $i+$this->uri->segment(2) ?></td>
                                <td><?php echo $getdata->NamaPerusahaan;?></td>
                                <td><?php echo $getdata->Alamat; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>    
                <?php else: ?>
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">Belum Ada Data</td>
                        </tr>
                    </tbody>
                <?php endif ?>
            </table>
            <div class="text-center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>
</section>

