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
        <li><a href="#">Daftar</a></li>
        <li class="active">Lowongan Kerja</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR LOWONGAN KERJA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th width="100">Nomor Loker</th>
                        <th class="text-center">Lowongan Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->pagination->total_rows > 0): ?>
                    <?php $i = 0;  ?>
                    <?php foreach ($MsLowonganData as $getdata): ?>
                        <?php 

                        $fromdate = explode("-", $getdata->TglBerlaku);
                        $todate = explode("-", $getdata->TglBerakhir);
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i+$this->uri->segment(3) ?></td>
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
                                </div>' ?>
                            </td>
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
</section>
<script>
$(document).ready(function() {
    $(".showhidebox").hide();

    $('.showhidebtn').click(function(){
        $(this).parent().next().slideToggle();
    });
});
</script>