<!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Perusahaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Perusahaan</li>
    </ol>
</section>
<?php $i = 0; ?>
<!-- Main content -->
<section class="content">
    <div class="box box-default box-solid">
        <div class="box-header">
            <h3 class="box-title">DAFTAR PERUSAHAAN</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="15">No</th>
                        <th>Nama Perusahaan</th>
                    </tr>
                </thead>
                <?php if ($MsPerusahaanData->num_rows > 0): ?>
                <tbody>
                    <?php foreach ($MsPerusahaanData->result() as $getdata): ?>
                    <?php $i++; ?>
                    <tr>
                        <td><?php echo $i+$this->uri->segment(2) ?></td>
                        <td><?php echo $getdata->NamaPerusahaan.'<br />'.$getdata->Alamat ?></td>
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
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
</section>
