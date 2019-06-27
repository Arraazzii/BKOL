
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Home</a></li>
        <li><a href="<?php echo site_url('admin') ?>">Perusahaan</a></li>
        <li class="active">Status Lowongan Kerja</li>
    </ol>
</section>

<!-- Main content -->
<section class="content" style="min-height: 280px;">
    <div class="col-md-6">
        <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/carilowongan') ?>">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">Periode</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="fromdate" class="control-label col-md-3">Mulai</label>
                        <div class="col-md-6">
                            <input id="fromdate" name="fromdate" type="text" class="form-control input-sm" value="<?= $fromdate != '' ? $fromdate : date('d-m-').(date('Y')-1) ?>" size="10" maxlength="10" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatanpemberikerja" class="control-label col-md-3">Sampai</label>
                        <div class="col-md-6">
                            <input id="todate" name="todate" type="text" class="form-control input-sm" value="<?= $todate != '' ? $todate : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <input id="cari" name="cari" type="submit" class="btn btn-primary btn-sm" value="Cari">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title text-center">Statistik Pencaker</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="fromdate" class="control-label col-md-3">Laki - Laki</label>
                    <div class="col-md-6">
                        <?= $TotalPria ?> Orang
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="jabatanpemberikerja" class="control-label col-md-3">Perempuan</label>
                    <div class="col-md-6">
                        <?= $TotalWanita ?> Orang
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="jabatanpemberikerja" class="control-label col-md-3">Total Pencari Kerja</label>
                    <div class="col-md-6">
                        <?= $TotalPria+$TotalWanita ?> Orang
                    </div>
                </div>
            </div>
            <div class="box-footer">&nbsp;</div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h3 class="box-title text-center">Daftar Status Lowongan Kerja</h3>
                <div class="box-tools pull-right">
                    
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ID Loker</th>
                                <th class="text-center">Nama Pekerjaan</th>
                                <th class="text-center">Tgl Berlaku</th>
                                <th class="text-center">Tgl Berakhir</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Loker Masuk</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($MsLowonganData->num_rows > 0): ?>
                                <?php foreach ($MsLowonganData->result() as $getdata): ?>
                                    <?php  
                                    $this->load->model('MsLowongan');
                                    $count = $this->MsLowongan->GetCountStatusByIDLowongan($getdata->IDLowongan);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $getdata->IDLowongan ?></td>
                                        <td class="text-center"><?php echo $getdata->NamaLowongan ?></td>
                                        <td class="text-center"><?php echo $getdata->TglBerlaku ?></td>
                                        <td class="text-center"><?php echo $getdata->TglBerakhir ?></td>
                                        <td class="text-center"><?php echo (date("Ymd") >= str_replace('-','',$getdata->TglBerlaku) && date("Ymd") <= str_replace('-','',$getdata->TglBerakhir) ? 'Aktif' : 'Tidak Aktif')?></td>
                                        <td class="text-center"><?php echo $count->PencakerMasuk ?></td>
                                        <td class="text-center"><?php echo '<a href="'.site_url('perusahaan/pencaker/'.$getdata->IDLowongan).'" class="btn btn-default btn-sm">Lihat Pencaker</a>' ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum Ada Data</td>
                                </tr> 
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                 <?php if ($this->pagination->create_links()): ?>
                    <div class="pull-right">
                        <?php echo $this->pagination->create_links() ?>
                    </div>
                <!-- /.box-footer -->    
            <?php endif ?>
            </div>
           
        </div>
    </div>
</section>
<!-- /.content -->

<script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = mm + '/' + dd + '/' + yyyy;

    document.addEventListener('DOMContentLoaded', function() {
        $("#fromdate").datepicker({
            format: "dd-mm-yyyy",
            startDate: today
        });
        $("#todate").datepicker({
            format: "dd-mm-yyyy",
            startDate: today
        });

    });
    function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
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