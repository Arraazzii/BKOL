<html>

<head>
    <style type="text/css" media="print">
    

    @page {
        size: letter;
        width: 50cm;
        /* height: cm; */
    }
    

    .kolom {
        visibility: visible;
    }

    .ak {
        width: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
    }
    
    .nip_pencaker {
        margin-left: 43.2em;
        margin-top: 7.8em;
        /* letter-spacing: 0.16em; */
    }

    .nomor_penduduk {
        margin-left: 43.2em;
        margin-top: -1.2em;
        /* letter-spacing: 0.15em; */
    }

    .nama_pencaker {
        margin-left: 43.2em;
        margin-top: -1.2em;
        letter-spacing: 0.15em;
    }

    .tgl_tempat {
        margin-left: 43.2em;
        margin-top: -1.5em;
        letter-spacing: 0.15em;
    }

    .jenkel {
        margin-left: 43.2em;
        margin-top: -1.5em;
        letter-spacing: 0.15em;
    }

    .status {
        margin-left: 43.2em;
        margin-top: -1.5em;
        letter-spacing: 0.15em;
    }
    
    .agama {
        margin-left: 43.2em;
        margin-top: -1.5em;
        letter-spacing: 0.15em;
    }

    .alamat {
        margin-left: 43.2em;
        margin-top: -1.5em;
        letter-spacing: 0.15em;
    }

    .pendidikan_formal {
        position: relative;
        top: -14.7em;
    }

    .keterampilan {
        position: relative;
        top: -9.5em;
    }
</style>
</head>

<body>
    <?php
    $fromdate = explode("-", substr($getdata->RegisterDate,0,10));
    $todate = explode("-", $getdata->ExpiredDate);
    ?>
    <p class="id_pencaker"><?php //echo $IDPencaker;?></p>
    <p class="nip_pencaker"><?php echo substr($NomorIndukPencaker,0,1) . "&nbsp;" . substr($NomorIndukPencaker,1,1) . "&nbsp;" . substr($NomorIndukPencaker,2,1) . "&nbsp;" . substr($NomorIndukPencaker,3,1) . "&nbsp;" . substr($NomorIndukPencaker,4,1) . "&nbsp;" . substr($NomorIndukPencaker,5,1) . "&nbsp;&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,6,1) . "&nbsp;" . substr($NomorIndukPencaker,7,1) .  "&nbsp;" . substr($NomorIndukPencaker,8,1) . "&nbsp;&nbsp;" . substr($NomorIndukPencaker,9,1) . "&nbsp;" . substr($NomorIndukPencaker,10,1) . "&nbsp;" . substr($NomorIndukPencaker,11,1) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,12,1) . "&nbsp;" . substr($NomorIndukPencaker,13,1) . "&nbsp;" . substr($NomorIndukPencaker,14,1) . "&nbsp;&nbsp;" . substr($NomorIndukPencaker,15,1); ?></p>
    <p class="nomor_penduduk"><?php echo substr($NomerPenduduk,0,1) . "&nbsp;" . substr($NomerPenduduk,1,1) . "&nbsp;" . substr($NomerPenduduk,2,1) . "&nbsp;" . substr($NomerPenduduk,3,1) . "&nbsp;" . substr($NomerPenduduk,4,1) . "&nbsp;" . substr($NomerPenduduk,5,1) . "&nbsp;" . substr($NomerPenduduk,6,1) . "&nbsp;" . substr($NomerPenduduk,7,1) . "&nbsp;&nbsp;" . substr($NomerPenduduk,8,1) . "&nbsp;&nbsp;" . substr($NomerPenduduk,9,1) . "&nbsp;" . substr($NomerPenduduk,10,1) . "&nbsp;" . substr($NomerPenduduk,11,1) . "&nbsp;&nbsp;" . substr($NomerPenduduk,12,1) . "&nbsp;" . substr($NomerPenduduk,13,1) . "&nbsp;" . substr($NomerPenduduk,14,1) . "&nbsp;&nbsp;" . substr($NomerPenduduk,15,1);?></p>
    <p class="nama_pencaker"><?php echo $NamaPencaker;?></p> 
    <p class="tgl_tempat"><?php echo $TempatLahir . " / " . $TglLahir; ?></p>
    <p class="jenkel"><?php echo ($JenisKelamin == 0 ? 'Pria' : 'Wanita'); ?></p>
    <p class="status"><?php echo (date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? 'Aktif' : 'Tidak Aktif') ?></p>
    <p class="agama"><?php echo $NamaAgama;?></p> 
    <p class="alamat"><?php echo $Alamat;?></p> 
    <p class="pendidikan_formal"><?php echo $NamaStatusPendidikan . "&nbsp;" . $Jurusan . "&nbsp;" . $TahunLulus; ?></p>
    <p class="keterampilan"><?php echo $Keterampilan  . "&nbsp;" . $NamaPerusahaan; ?></p>
    <img class="ak" src="<?php echo base_url();?>assets/css/images/ak_one.jpg">
</body>

</html>