<style>
.showhidebox
{
    width:100%;
    float:left;
    display:none;
    background-color:#F2F5A9;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Lowongan Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Pencaker</a></li>
        <li class="active">Lowongan Kerja</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border text-center">
            <h3 class="box-title">DAFTAR LOWONGAN KERJA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <div class="col-md-5">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td width="200">Nama Pencaker</td>
                            <td><?php echo $MsPencakerData->NamaPencaker ?></td>
                        </tr>
                        <tr>
                            <td>Pendidikan Terakhir</td>
                            <td><?= $MsPencakerData->NamaStatusPendidikan ?></td>
                        </tr>
                        <tr>
                            <td>Status Pencaker</td>
                            <td>
                                <?php 
                                $fromdate = explode("-", substr($MsPencakerData->RegisterDate,0,10));
                                $todate = explode("-", $MsPencakerData->ExpiredDate);
                                echo date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? 'Aktif' : 'Tidak Aktif'; 
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px;">
                <button type="button" class="btn btn-default" onclick="window.location.href='<?php echo base_url('admin/pencaker') ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="100">Nomor Loker</th>
                            <th class="text-center">Lowongan Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($this->pagination->total_rows > 0): ?>
                            <?php foreach ($MsLowonganData as $getdata): ?>
                                <?php 

                                $fromdate = explode("-", $getdata->TglBerlaku);
                                $todate = explode("-", $getdata->TglBerakhir);
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $getdata->IDLowongan ?></td>
                                    <td><?php echo '<div style="float:right;">
                                    <i>Jatuh Tempo : <b>'.$getdata->TglBerakhir.'</b></i>
                                    </div>
                                    <div style="float:left;">'.$getdata->NamaLowongan.'<br />
                                    '.$getdata->NamaPerusahaan.'<br />
                                    <a href="javascript:void(0)" class="showhidebtn">Detail</a>
                                    </div>
                                    <div class="showhidebox">
                                    Alamat Perusahaan : '.$getdata->Alamat.' '.$getdata->KodePos.'<br /><br />
                                    Nama Jabatan : '.$getdata->NamaPosisiJabatan.'<br />
                                    Persyaratan Jabatan:<br />
                                    '.($getdata->JmlPria > 0 ? 'Pria: '.$getdata->JmlPria.' Orang' : '').($getdata->JmlPria > 0 && $getdata->JmlPria > 0 ? '<br />' : '').($getdata->JmlWanita > 0 ? 'Wanita: '.$getdata->JmlWanita.' Orang' : '').'<br />
                                    Usia Max. '.$getdata->BatasUmur.' Tahun<br />
                                    Pendidikan '.$getdata->NamaStatusPendidikan.'<br />
                                    Syarat Khusus : <b>'.$getdata->SyaratKhusus.'</b>'.($getdata->Pengalaman != '' ? '<br />
                                        Pengalaman : '.$getdata->Pengalaman : '').'<br />
                                    Batas waktu : '.$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0].' s/d '.$todate[2].'-'.$todate[1].'-'.$todate[0].'
                                    <br>'.(date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? '<br />Jika Anda Berminat Mengisi Jabatan Pada Perusahaan Ini.<br />Silahkan kirim data anda <a class="confirmLink" onclick="KirimCV(\''.$MsPencakerData->IDPencaker.'\',\''.$getdata->IDLowongan.'\')" href="#">disini</a></div>' : '<br />Masa aktif lowongan sudah tidak berlaku lagi.').'</div>' ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2" class="text-center">Belum ada data</td>
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
</section>
<script>
    function KirimCV(idpencaker,idlowongan) {
        swal({
            title: 'Kirim CV?',
            text: "CV Pencaker Akan Di Kirimkan !",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location.href = '<?= site_url('admin/pencaker/registerlowongan') ?>/' + idpencaker + '/' + idlowongan;
            }
        })
    }

    $(document).ready(function() {
        

        $(".showhidebox").hide();

        $('.showhidebtn').click(function(){
            $(this).parent().next().slideToggle();
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