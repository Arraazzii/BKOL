
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Home</a></li>
        <li><a href="<?php echo site_url('admin') ?>">Perusahaan</a></li>
        <li class="active">Lowongan Kerja</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-md-6">
        <form method="POST" class="form-horizontal" role="form" action="<?= site_url('perusahaan/carilowongan') ?>">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">PERIODE</h3>
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
    <div class="col-md-12">
        <div class="box box-default" style="margin-bottom: 50px">
            <div class="box-header">
                <h3 class="box-title">DAFTAR LOWONGAN KERJA</h3>
                <div class="box-tools pull-right">
                    <a href="<?= site_url('perusahaan/lowongan/tambahdata') ?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
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
                                <th class="text-center">Pria</th>
                                <th class="text-center">Wanita</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($MsLowonganData->num_rows > 0): ?>
                            <?php foreach ($MsLowonganData->result() as $getdata): ?>
                            <tr>
                                <td class="text-center"><?php echo $getdata->IDLowongan ?></td>
                                <td class="text-center"><?php echo $getdata->NamaLowongan ?></td>
                                <td class="text-center"><?php echo $getdata->TglBerlaku ?></td>
                                <td class="text-center"><?php echo $getdata->TglBerakhir ?></td>
                                <td class="text-center"><?php echo (date("Ymd") >= str_replace('-','',$getdata->TglBerlaku) && date("Ymd") <= str_replace('-','',$getdata->TglBerakhir) ? 'Aktif' : 'Tidak Aktif')?></td>
                                <td class="text-center"><?php echo $getdata->JmlPria ?></td>
                                <td class="text-center"><?php echo $getdata->JmlWanita ?></td>
                                <td class="text-center"><?php echo '<a href="'.site_url('perusahaan/lowongan/detail/'.$getdata->IDLowongan).'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                           <button type="button" onclick="DoDeleteConfirm(\''.$getdata->IDLowongan.'\')" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Hapus</button>' ?></td>
                            </tr>
                            <?php endforeach ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum Ada Data</td>
                            </tr> 
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
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
</section>

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
        $('#btnDelete').click(function() {
            const IDLowongan = $('#IDLowonganTemp').val();
            window.location.href="<?php echo site_url('perusahaan/lowongan/delete'); ?>/" + IDLowongan;
        })

    });
    function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
    }

    function changeIDLowonganTemp(id) {
        $('#IDLowonganTemp').val(id);
    }

    function DoDeleteConfirm(IDLowongan)
    {
        swal({
            title: 'Hapus Data Lowongan?',
            text: "Lowongan ini akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            $.ajax({
                url: '<?php echo site_url('perusahaan/lowongan/delete') ?>',
                type: 'POST',
                data: {idlowongan: IDLowongan},
            })
            .done(function() {
                console.log("success");
                window.location.reload();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        })
    }
</script>
<!-- /.content -->