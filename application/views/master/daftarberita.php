<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">
<!-- /.content -->
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>
        Daftar
        <small>Lowongan Kerja Luar Depok</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Lowongan Kerja Luar Depok</li>
    </ol>
</section> -->
<style type="text/css">
.text-left{
    text-align: center !important;
}
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <?php 
        $i = 0;
        if ($this->pagination->total_rows > 0) :
            foreach ($MsBeritaData as $getdata) :
                $i++;
                ?>
                <div class="col-lg-6" style="display: block;z-index: 1000;">
                    <div class="box box-primary box-solid" id="<?php echo $getdata->IDBerita; ?>">
                        <div class="box-header">
                            <h3 class="box-title" style="color:#fff;"><?php echo $getdata->JudulBerita; ?></h3>
                            <div class="box-tools pull-right">
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
                                $tglberita = explode("-", $getdata->TglBerita);
                                $gettgl = mktime(0, 0, 0, $tglberita[1], $tglberita[2], $tglberita[0]);
                                date_default_timezone_get('Asia/Jakarta');
                                $timeLimit = date('Y-m-d');
                                ?>
                                <button type="button" class="btn btn-box-tool">Tanggal : <?php echo '</b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i></b>'; ?></button>
                                <?php if ($getdata->TglBerita <= $timeLimit){ ?>
                                <span class="label label-danger time">EXPIRED</span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="box-body">
                            <!-- <h3 class="text-primary page-header"></h3> -->
                            <div class="box-description">     
                                <?php $viewbtn = '';
                                echo strip_tags(strlen($getdata->IsiBerita) > 150 ? substr($getdata->IsiBerita,0,150)." ...... " : $getdata->IsiBerita).$viewbtn; ?><br>
                                <div class="text-right">
                                    <a class="btn btn-primary btn-sm" href="<?php echo site_url('berita/view').'/'.$getdata->IDBerita;?>">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  
            endforeach;
        endif;
        ?>
        <?php if ($this->pagination->create_links()): ?>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="text-center">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>        
        <?php endif ?>
    </div>
</section>
<!-- /.content -->