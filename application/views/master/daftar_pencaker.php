<!-- /.content -->
<!-- Content Header (Page header) -->
<?php 
$prias = (isset($TotalPria)?$TotalPria:0);
$wanitas = (isset($TotalWanita)?$TotalWanita:0);
$GTotal = $prias + $wanitas;
?>
<section class="content-header">
    <h1>
        Daftar
        <small>Pencari Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Pencari Kerja</li>
    </ol>
</section>
<?php $i = 0; ?>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">DAFTAR PENCARI KERJA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <form method="post" action="<?= site_url('datapencaker') ?>">
                <table class="table">
                    <tr>
                        <td align="left">
                            PERIODE
                        </td>
                        <td align="left" >
                            <div class="row">
                                <div class="col-lg-4">
                                    <input class="form-control" id="fromdate" name="fromdate" type="text" value="<?= $fromdate != '' ? $fromdate : date('d-m-').(date('Y')-1) ?>" size="10" maxlength="10" readonly="true">
                                </div>
                                <div class="col-lg-1 text-center">
                                    S/D
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" id="todate" name="todate" type="text" value="<?= $todate != '' ? $todate : date('d-m-Y') ?>" size="10" maxlength="10" readonly="true">
                                </div>
                                <div class="col-lg-3 pull-right">
                                    <input id="cari" name="cari" type="submit" value="Cari" class="btn btn-success col-sm-12">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            Laki-laki
                        </td>
                        <td align="left">
                            <span class="label label-info"><?= $prias; ?> Orang</span>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            Perempuan
                        </td>
                        <td align="left">
                           <span class="label label-success"><?= $wanitas; ?> Orang</span>
                       </td>
                   </tr>
                   <tr>
                    <td align="left">
                        Jumlah Pencari Kerja
                    </td>
                    <td align="left">
                       <span class="label label-warning"><?= $GTotal; ?> Orang</span>
                   </td>
               </tr>
           </table>
       </form>

       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Induk Pencaker</th>
                <th>Nama Lengkap</th>
                <th>Pendidikan Terakhir</th>
                <th>Tgl Berlaku</th>
                <th>Tgl Berakhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($MsPencakerData->num_rows > 0): ?>
                <?php $i = 0;  ?>
                <?php foreach ($MsPencakerData->result() as $getdata): ?>
                    <?php 
                    
                    $fromdate = explode("-", substr($getdata->RegisterDate,0,10));
                    $todate = explode("-", $getdata->ExpiredDate);
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i+$this->uri->segment(3) ?></td>
                        <td><?php echo $getdata->NomorIndukPencaker ?></td>
                        <td><?php echo $getdata->NamaPencaker ?></td>
                        <td><?php echo $getdata->NamaStatusPendidikan ?></td>
                        <td><?php echo $fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0] ?></td>
                        <td><?php echo $todate[2].'-'.$todate[1].'-'.$todate[0] ?></td>
                        <td> <?php echo (date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? '<span class="label label-primary">Aktif</span>' : '<span class="label label-danger">Tidak Aktif</span>') ?></span></td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada data</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<!-- /.box-body -->
<div class="box-footer">

</div>
<!-- /.box-footer -->
</div>
</div>
</section>

<script>
    $(document).ready(function(){
        $("#fromdate").datepicker({
            constrainInput: true,
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yyyy',
            defaultDate: new Date(1990, 1 - 1, 1),
            minDate: new Date(1970, 1 - 1, 1),
            maxDate: new Date(),
            onSelect: function(dateText, instance)
            {
                    //alert(dateText);
                },
                onClose: function()
                {
                //this.focus();
            }
        });
        $("#todate").datepicker({
            constrainInput: true,
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yyyy',
            defaultDate: new Date(1990, 1 - 1, 1),
            minDate: new Date(1970, 1 - 1, 1),
            maxDate: new Date(),
            onSelect: function(dateText, instance)
            {
                    //alert(dateText);
                },
                onClose: function()
                {
                //this.focus();
            }
        });
        
        function getFormattedDate(date) {
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString();
            return day + '-' + month + '-' + year;
        }
    });
</script>