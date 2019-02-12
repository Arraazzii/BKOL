<!-- /.content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Kegiatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Kegiatan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php 
    $i = 0;
    if ($this->pagination->total_rows > 0) :
        foreach ($MsEventData as $getdata) :
        $i++;
    ?>
    <div class="box box-default box-solid" id="<?php echo $getdata->IDEvent; ?>">
        <div class="box-header">
            <h3 class="box-title">No. <?php echo $i+$this->uri->segment(3); ?></h3>
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
                $TglEvent = explode("-", $getdata->TglEvent);
                $gettgl = mktime(0, 0, 0, $TglEvent[1], $TglEvent[2], $TglEvent[0]);

                 ?>
                <button type="button" class="btn btn-box-tool">Tanggal : <?php echo '</b><i>'.$hari[(int)date("w", $gettgl)].', '.(int)date("d", $gettgl).' '.$bulan[(int)date("m", $gettgl)].' '.(int)date("Y", $gettgl).'</i></b>'; ?></button>
            </div>
        </div>
        <div class="box-body">
            <h3 class="text-primary page-header"><?php echo $getdata->JudulEvent; ?></h3>
            <div class="box-description">     
                <?php $viewbtn = '<a href="'.site_url('event/view').'/'.$getdata->IDEvent.'">Selengkapnya</a>';
                echo (strlen($getdata->IsiEvent) > 150 ? substr($getdata->IsiEvent,0,150)." ...... " : $getdata->IsiEvent).$viewbtn; ?>
            </div>
        </div>
    </div>
    <?php  
        endforeach;
    endif;
    ?>
    <?php if ($this->pagination->create_links()): ?>
    <div class="box box-default">
        <div class="box-body">
            <div class="pull-right">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>        
    <?php endif ?>
</section>
<!-- /.content -->