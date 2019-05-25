<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lowongan Kerja
        <small>Luar Depok</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url() ?>">Home</a></li>
        <li><a href="<?php echo site_url('berita') ?>">Loker Luar Depok</a></li>
        <li class="active">Lihat Loker</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Lihat Loker</h3>
        </div>
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
            $tglberita = explode("-", $MsBeritaData->TglBerita);
            $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
            echo '</b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i></b>';
            ?>
            <strong class="text-center"><h2><?= $MsBeritaData->JudulBerita ?></h2></strong>
            <?php if (file_exists(BASEPATH.'/../assets/file/berita/'.$MsBeritaData->IDBerita.'.jpg')): ?>
                <center><img class="" src="<?= site_url('assets/file/berita/'.$MsBeritaData->IDBerita.'.jpg') ?>"></center>
            <?php endif ?>
            <p><font size="3" style="line-height: 100%;"><?= $MsBeritaData->IsiBerita ?></font><p>
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