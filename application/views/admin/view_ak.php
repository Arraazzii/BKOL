
<!DOCTYPE html>
<html>
<head>
    <title>Print AK 1</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400" rel="stylesheet" type="text/css">

    <meta charset="utf-8">
    <style type="text/css">
    @page {
        /*size: 33cm 21cm;   */
        size: 33cm 11.15cm; 
    }
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        color: #111;
        display: table;
        font-weight: 500;
        font-family: 'Lato';
        background: #f1f1f1;
    }
    h3 {
        font-size: 15px;
    }
    h4 {
        font-size: 13px;
    }
    h5 {
        font-size: 10px;
    }
    h6 {
        font-size: 8px;
    }

    .container {
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        background: #fff;
        width: 100%
    }
    .border{
        border: 2px solid #111;
    }
    .title {
        font-size: 72px;
        margin-bottom: 40px;
    }
    .w-50{
        width: 50%
    }
    .f-left{
        float: left;
    }
    .f-right{
        float: right;
    }
    hr{
        border: 1px solid #111;
        margin: 0px;
    }

    .row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
    }

    /* 1/12 */
    .col-1 {
        width: 8.33%;
    }

    /* 2/12 */
    .col-2 {
        width: 16.66%;
    }

    /* 3/12 */
    .col-3 {
        width: 25%;
    }

    /* 4/12 */
    .col-4 {
        width: 33.33%
    }

    /* 5/12 */
    .col-5 {
        width: 41.66%;
    }

    /* 6/12 */
    .col-6 {
        width: 50%;
    }

    /* 7/12 */
    .col-7 {
        width: 58.33%;
    }

    /* 8/12 */
    .col-8 {
        width: 66.66%;
    }

    /* 9/12 */
    .col-9 {
        width: 75%;
    }

    /* 10/12 */
    .col-10 {
        width: 83.33%;
    }

    /* 11/12 */
    .col-11 {
        width: 91.66%;
    }

    /* 12/12 */
    .col-12 {
        width: 100%;
    }

    /* viewport <= 1000px */
    @media screen and (max-width: 1000px) {
        * {
            font-size: 1em;
        }
    }

    /* viewport <= 630px */
    @media screen and (max-width: 630px) {
        .row div {
            padding: 1.5%;  
        }    
    } 

    /* viewport <= 500px */
    @media screen and (max-width: 500px) {
        * {
            font-size: 0.9em;
        }
    }
    .padding-10{
        padding: 3px 10px;
    }
    .{
        padding: 2.5px 10px;
    }
    .float-right{
        float: right;
    }
    h1, h2, h3, h4, h5, h6{
        margin: 2px 0px 0px 0px;
    }
    .text-center{
        text-align: center;
    }
    .margin-5{
        margin: 2px 0px 0px 0px !important;
    }
    .border-bottom-1{
        border-bottom: 1px solid #111;
        padding-bottom: 2px;
    }
    .img-fluid{
        width: 100%;
        margin: 0px auto;
        display: block;
        padding:0px 25px;
    }
    .pasfoto{
        width: 100%;
        height: 100px;
        padding:0px 25px;
        object-position: center;
        object-fit: cover;
    }
    .kotak{
        border: 1px solid #111;
        padding: 0px 2px;
        border-radius: 3px;
        margin-left: 3px;
    }
    .margin-1-top{
        margin-top: 2px;
    }
    .d-flex{
        display: flex;
    }
    .text-left{
        text-align: left !important;
    }
    .padding-l-r-5{
        padding: 0px 5px;
    }
    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin:0px auto;
        font-family: 'Lato';
        margin-bottom: 10px;
    }
    tr{
        border-bottom: 1px solid #111;
    }
    td, th {
        padding: 5px;
        text-align: center;
        font-size: 12px;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
    @media only screen and (max-width: 760px){
        .col-6{
            width: 100%;
        }
    }
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        table { 
            width: 100%; 
        }
    }

</style>
</head>
<body>
    <div class="container">
        <hr>
        <div class="content" style="padding: 5px 15px;">
            <div class="row">
                <div class="col-6">
                    <div class="padding-10">
                        <h4>PENDIDIKAN FORMAL TERAKHIR :</h4>
                        <table class="text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Jurusan</th>
                                    <th>Lulus Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $NamaStatusPendidikan; ?></td>
                                    <td><?php echo $Jurusan;?></td>
                                    <td><?php echo $TahunLulus;?></td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>KETERAMPILAN / PENGALAMAN KERJA :</h4>
                        <table class="text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterampilan / Pengalaman Kerja</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($PengalamanData)) { ?>
                                <?php $no = 1; foreach ($PengalamanData as $peng): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $peng['Jabatan'];?> <?php $peng['NamaPerusahaan']; ?></td>
                                    <td><?php echo substr($peng['TglBerhenti'], 0, 4);?></td>
                                </tr>
                            <?php endforeach ?>
                            <?php }else{ ?> 
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <?php foreach ($ak as $cms) { ?>
                        <div class="text-center">
                            <h5 class="margin-5">MENGETAHUI</h5>
                            <h5 class="margin-5">A.N <?php echo $cms['bidangSigniture']; ?></h5>
                            <h5 class="margin-5"><?php echo $cms['jabatanSigniture']; ?></h5>
                            <img src="<?php echo base_url();?>assets/file/signiture/<?php echo $cms['gambarSigniture']; ?>" style="width: 100px;height: 38px;object-fit: cover;object-position: center;display: block;margin: 0px auto; padding:3px 0px;">
                            <h5 class="border-bottom-1"><?php echo $cms['namaSigniture']; ?></h5>
                            <h5>NIP : <?php echo $cms['nipSigniture']; ?></h5>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="padding-10">
                    <div class="row">
                        <div class="col-3"><br>
                            <img src="<?php echo base_url();?>assets/depok.png" class="img-fluid">
                            <br>
                            <?php $path = 'assets/file/pencaker'.'/'.$IDPencaker.'.jpg';
                            if(file_exists($path)){ ?>
                                <img src="<?php echo base_url();?>assets/file/pencaker/<?php echo $IDPencaker; ?>.jpg" class="pasfoto">
                            <?php }else{ ?>
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="pasfoto">
                            <?php } ?>
                            <br>
                            <h5 class="text-center">Tanda Tangan <br> Pencari Kerja</h5>
                        </div>
                        <div class="col-9">
                            <div class="text-center">
                                <h4>PEMERINTAH KOTA DEPOK</h4>
                                <h4>DINAS TENAGA KERJA</h4>
                                <h5 class="margin-5">Jl. Margonda Raya No. 54 Depok Jawa Barat</h5>
                                <h5 class="margin-5">Telp. (021) 29402280 Fax. 29402280</h5>
                                <br>
                                <h3>KARTU TANDA BUKTI PENDAFTARAN PENCAKER</h3>
                                <br>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 "> 
                                        <h4>No. Pend. Pencaker</h4>
                                    </div>
                                    <div class="col-7 d-flex">
                                        : 
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,1,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,2,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,3,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,4,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,5,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,6,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,7,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,8,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,9,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,10,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,11,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,12,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,13,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,14,1);?></div>
                                        <div class="kotak"><?php echo substr($NomorIndukPencaker,15,1);?></div>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5 margin-1-top">
                                    <div class="col-5 ">
                                        <h4>No. Kependudukan</h4>
                                    </div>
                                    <div class="col-7  d-flex">
                                        : 
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                        <div class="kotak"><?php echo substr($NomerPenduduk,0,1);?></div>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>NAMA LENGKAP</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo ucwords($NamaPencaker);?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>TMP/TGL LAHIR</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo $TempatLahir . " / " . $TglLahir; ?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>JENIS KELAMIN</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo ($JenisKelamin == 0 ? 'Pria' : 'Wanita'); ?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>STATUS</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo $NamaStatusPernikahan; ?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>AGAMA</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo $NamaAgama;?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>ALAMAT</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php echo $Alamat;?></h4>
                                    </div>
                                </div>
                                <div class="row text-left padding-l-r-5">
                                    <div class="col-5 ">
                                        <h4>MINAT KERJA</h4>
                                    </div>
                                    <div class="col-7 ">
                                        <h4>: <?php if($Minat == '0'){echo 'Wirausaha';}else{echo 'Karyawan';}?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
</body>
</html>
