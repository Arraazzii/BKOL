<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>
        Kegiatan
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php //echo site_url() ?>">Home</a></li>
        <li><a href="<?php //echo site_url('event') ?>">Kegiatan</a></li>
        <li class="active">Lihat Kegiatan</li>
    </ol>
</section> -->

<!-- Main content -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <?php
            $hari = array(
                "0" => "Minggu",
                "1" => "Senin",
                "2" => "Selasa",
                "3" => "Rabu",
                "4" => "Kamis",
                "5" => "Jumat",
                "6" => "Sabtu"
            );
            $bulan = array(
                "1" => "Januari",
                "2" => "Februari",
                "3" => "Maret",
                "4" => "April",
                "5" => "Mei",
                "6" => "Juni",
                "7" => "Juli",
                "8" => "Agustus",
                "9" => "September",
                "10" => "Oktober",
                "11" => "November",
                "12" => "Desember"
            );
            $tglevent = explode("-", $MsEventData->TglEvent);
            $gettgl = mktime(0, 0, 0, $tglevent[1], $tglevent[2], $tglevent[0]);
            ?>
            <?php if (file_exists(BASEPATH.'/../assets/file/berita/'.$MsEventData->IDEvent.'.jpg')): ?>
                <center><img class="" src="<?= site_url('assets/file/berita/'.$MsEventData->IDEvent.'.jpg') ?>"></center>
            <?php endif ?>
            <div class="box-header text-center">
                <h2 class="box-title"><?= $MsEventData->JudulEvent ?></h2>
            </div>
            <div class="text-center">
                <span class="label label-warning"></b><i><?php echo $hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl);?></i></b></span>
            </div><br><br>
            <p><font size="3" style="line-height: 100%;"><?= $MsEventData->IsiEvent ?></font><p>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.box-body').find('img').attr({
                class: 'img-responsive',
            });
        });
    </script>