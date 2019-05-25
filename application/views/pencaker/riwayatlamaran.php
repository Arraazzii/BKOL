<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Riwayat Lamaran</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Pencaker</a></li>
        <li class="active">Riwayat Lamaran</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title">&nbsp; Daftar Riwayat Lamaran</h3>
        </div>
        <div class="box-body">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Lowongan</th>
                                <th>Tanggal Apply</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0 ?>
                            <?php if ($lowongandata != null): ?>
                                <?php foreach ($lowongandata->result() as $row): ?>
                                    <?php $i++; 
                                    $status = '';
                                    $tgl = '';
                                    if ($row->StatusLowongan == 0)
                                        $status = 'Belum diproses';
                                    elseif ($row->StatusLowongan == 1)
                                        $status = 'Diproses';
                                    elseif ($row->StatusLowongan == 3)
                                        $status = 'Tidak diterima';
                                    else
                                        $status = 'Diterima';

                                    $tgl = date('d-m-Y', strtotime($row->RegisterDate));
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $i+$this->uri->segment(3) ?></td>
                                        <td><?php echo $row->NamaPerusahaan ?></td>
                                        <td><?php echo $row->NamaLowongan ?></td>
                                        <td><?php echo $tgl ?></td>
                                        <td><?php echo $status ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
</section>