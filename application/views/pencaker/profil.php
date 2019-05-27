<!-- Content Header (Page header) -->
<section class="content-header container">
    <h1>
        Profil
        <small>Pencaker</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li>Pencaker</li>
        <li class="active">Profil</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid box-default">
                <div class="box-header">
                    <h3 class="box-title">Profil Pencari Kerja</h3>
                </div>
                <div class="box-body table-responsive">
                    <table width="100%" class="table table-condensed">
                        <tbody>
                            <tr>
                                <td align="left" valign="top" rowspan="4" width="120px">
                                    <?php  
                                    $filepath = BASEPATH.'/../assets/file/pencaker/'.$MsPencakerData->IDPencaker.'.jpg';
                                    if (file_exists($filepath)) 
                                    {
                                        $profilepic = base_url().'assets/file/pencaker/'.$MsPencakerData->IDPencaker.'.jpg';
                                    }
                                    else
                                    {
                                        $profilepic = base_url().'assets/file/pencaker/default.jpg';
                                    }
                                    ?>
                                    <img src="<?php echo $profilepic;?>" width="120px" height="160px">
                                </td>
                                <td align="left" valign="top" width="180px">
                                    No Pendaftaran
                                </td>
                                <td align="left" valign="top">
                                    <span id="idpencaker"><?= $MsPencakerData->IDPencaker ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Nomor Induk Pencaker
                                </td>
                                <td align="left" valign="top">
                                    <span id="nomorindukpencaker"><?= $MsPencakerData->NomorIndukPencaker ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Nama Pencari Kerja
                                </td>
                                <td align="left" valign="top">
                                    <span id="namapencaker"><?= $MsPencakerData->NamaPencaker ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Jenis Kelamin
                                </td>
                                <td align="left" valign="top">
                                    <span id="jeniskelamin"><?= !$MsPencakerData->JenisKelamin ? 'Pria' : 'Wanita' ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top" width="180px">
                                    Tempat/Tanggal Lahir
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="tempattgllahir">
                                        <?php
                                        $tgllahir = explode("-", $MsPencakerData->TglLahir);
                                        $bulan = array(
                                            "Januari",
                                            "Februari",
                                            "Maret",
                                            "April",
                                            "Mei",
                                            "Juni",
                                            "Juli",
                                            "Agustus",
                                            "September",
                                            "Oktober",
                                            "November",
                                            "Desember"
                                        );
                                        ?>
                                        <?= $MsPencakerData->TempatLahir.', '.(int)$tgllahir[2].' '.$bulan[$tgllahir[1]-1].' '.$tgllahir[0] ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Email
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="email"><?= $MsPencakerData->Email ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Telepon
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="telepon"><?= $MsPencakerData->Telepon ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Alamat
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="alamat"><?= $MsPencakerData->Alamat ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Kelurahan
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="namakelurahan"><?= $MsPencakerData->NamaKelurahan ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Kecamatan
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="namakecamatan"><?= $MsPencakerData->NamaKecamatan ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Kode Pos
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="kodepos"><?= $MsPencakerData->KodePos ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Kewarganegaraan
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="jeniskelamin"><?= $MsPencakerData->Kewarganegaraan == 0 ? 'WNI' : 'WNA' ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Agama
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="namagama"><?= $MsPencakerData->NamaAgama ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td nowrap="nowrap" align="left" valign="top">
                                    Status Pernikahan
                                </td>
                                <td align="left" valign="top" colspan="2">
                                    <span id="namastatuspernikahan"><?= $MsPencakerData->NamaStatusPernikahan ?></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>pencaker/edit"><i class="fa fa-edit"></i> Edit Profil</a>
                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>pencaker/editcv"><i class="fa fa-file-text"></i> Detail CV</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid box-default">
                <div class="box-header">
                    <h3 class="box-title">Penggunaan Bahasa</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-condensed">
                        <tr>
                            <td align="left" colspan="2">
                                <div align="left">
                                    <?php
                                    if ($MsBahasaData->num_rows > 0)
                                    {
                                        echo '<ul>';
                                        foreach ($MsBahasaData->result() as $getdata)
                                        {
                                            echo '<li>'.$getdata->NamaBahasa.'</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    else
                                    {
                                        echo 'belum ada data';
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url();?>pencaker/editbahasa"><i class="fa fa-edit"></i> Detail Bahasa</a>
                </div>
            </div>
            <div class="box box-solid box-default">
                <div class="box-header">
                    <h3 class="box-title">PENGALAMAN KERJA</h3>
                </div>
                <div class="box-body table-responsive">
                    <?php if ($MsPengalamanData->num_rows > 0): $i=1; ?>
                        <?php foreach ($MsPengalamanData->result() as $getdata): ?>
                            <div class="row"><div class="col-xs-5">Jabatan</div><div class="col-xs-7">: <?php echo $getdata->Jabatan ?></div></div>
                            <?php  
                            $i++;
                            $interval = date_diff(date_create($getdata->TglMasuk), date_create($getdata->TglBerhenti));
                            $out = $interval->format("Years:%Y,Months:%M,Days:%d");
                            $result = array();
                            $newOut = explode(',',$out);
                            array_walk($newOut,
                                function($val,$key) use(&$result){
                                    $v=explode(':',$val);
                                    $result[$v[0]] = $v[1];
                                });
                                ?>
                                <div class="row"><div class="col-xs-5">Nama Perusahaan</div><div class="col-xs-7">: <?php echo $getdata->NamaPerusahaan ?></div></div>
                                <div class="row"><div class="col-xs-5">Lama Bekerja</div><div class="col-xs-7">: <?php echo ((int)$result['Years'] > 0 ? (int)$result['Years'].' tahun' : '').((int)$result['Months'] > 0 ? ' '.(int)$result['Months'].' bulan' : ((int)$result['Days'] > 0 ? ' '.(int)$result['Days'].' hari' : ' 0 hari')) ?></div></div>
                                <br>
                            <?php endforeach ?>
                        <?php else: ?>
                            <p>Belum Ada Data</p>
                        <?php endif ?>
                    </div>
                    <div class="box-footer">
                       <a class="btn btn-default btn-sm" href="<?php echo base_url();?>pencaker/pengalaman"><i class="fa fa-edit"></i> Detail Pengalaman</a>
                   </div>
               </div>
           </div>
       </div>
   </section>
