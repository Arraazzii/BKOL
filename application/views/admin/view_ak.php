<html>
<head>
    <meta charset="utf-8">
    <style type="text/css" media="print">
        @page {
            /*size: 33cm 21cm;   */
            size: 33cm 11.15cm; 
        }
        body, p {
            margin: 0;
            -webkit-margin-before: 0;
            -webkit-margin-after: 0;
            -webkit-margin-start: 0;
            -webkit-margin-end: 0;
        }
        /* left side */
        .pendidikan_formal { margin-top: .9cm; position: fixed; margin-left: .02cm; }
        .pengalaman { position: fixed; margin-left: 0.02cm; }
        .jabatanttd { margin-top: 7.2cm; position: fixed; margin-left: 9.1cm; font-size: .7em; }
        .jabatanalias { margin-top: 7.6cm; position: fixed; margin-left: 9.15cm; font-size: .7em; }
        .namakasi { margin-top: 8.4cm; position: fixed; margin-left: 9.1cm; font-size: .7em; }
        .nip { margin-top: 8.8cm; position: fixed; margin-left: 9.6cm; font-size: .7em; }
		
		/* right side */
		.nip_pencaker { margin-left: 23.3cm; margin-top: 3.2cm; position: fixed; font-size: 16px }
		.nomor_penduduk { margin-left: 23.3cm; margin-top: 3.9cm; position: fixed; position: fixed; font-size: 16px; }
		.nama_pencaker { margin-left: 23.3cm; margin-top: 4.7cm; position: fixed; }
		.tgl_tempat { margin-left: 23.3cm; margin-top: 5.2cm; position: fixed; }
		.jenkel { margin-left: 23.3cm; margin-top: 5.7cm; position: fixed; }
		.status { margin-left: 23.3cm; margin-top: 6.2cm; position: fixed; }
		.agama { margin-left: 23.3cm; margin-top: 6.7cm; position: fixed; }
		.alamat { margin-left: 23.3cm; margin-top: 7.2cm; position: fixed; }
        #print-ak { display: block };

    </style>
    <style type="text/css" media="screen">
            /*size: 33cm 21cm;   */
            /*size: 32.7cm 14cm; */
        /*}
        body, p {
            margin: 0;
            -webkit-margin-before: 0;
            -webkit-margin-after: 0;
            -webkit-margin-start: 0;
            -webkit-margin-end: 0;
        }*/
        /* left side */
        /*.pendidikan_formal { margin-top: 1cm; position: fixed; margin-left: .3cm; }
        .pengalaman { margin-top: 5cm; position: fixed; margin-left: .3cm; }*/
        
        /* right side */
        /*.nip_pencaker { margin-left: 23.4cm; margin-top: 3.2cm; position: fixed; }
        .nomor_penduduk { margin-left: 23.4cm; margin-top: 4cm; position: fixed; }
        .nama_pencaker { margin-left: 23.4cm; margin-top: 4.8cm; position: fixed; }
        .tgl_tempat { margin-left: 23.4cm; margin-top: 5.3cm; position: fixed; }
        .jenkel { margin-left: 23.4cm; margin-top: 5.8cm; position: fixed; }
        .status { margin-left: 23.4cm; margin-top: 6.3cm; position: fixed; }
        .agama { margin-left: 23.4cm; margin-top: 6.8cm; position: fixed; }
        .alamat { margin-left: 23.4cm; margin-top: 5.3cm; position: fixed; }*/
        #print-ak { display: none; }
    </style>
</head>
<body>
	<!-- Left Side -->
    <p class="pendidikan_formal"><?php echo $NamaStatusPendidikan . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $Jurusan . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $TahunLulus; ?></p>
    <?php $line = 4.9; ?>
    <?php foreach ($PengalamanData as $peng): ?>
        <p style="margin-top: <?php echo $line ?>cm;" class="pengalaman"><?php echo $peng['Jabatan'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $peng['NamaPerusahaan'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . substr($peng['TglBerhenti'], 0, 4); ?></p>
        <?php $line += 0.5; ?>
    <?php endforeach ?>
    <p class="jabatanttd">A.N KEPALA DISNAKER KOTA DEPOK</p>
    <p class="jabatanalias">KASI PENEMPATAN TENAGA KERJA</p>
    <p class="namakasi">MEIDI HENDIANTO GUNAWAN, S.Sos</p>
    <p class="nip">NIP: 197405172001121004</p>
	<!-- Right Side -->
	<p class="nip_pencaker"><?php echo substr($NomorIndukPencaker,0,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,1,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,2,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,3,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,4,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,5,1) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,6,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,7,1) .  "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,8,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,9,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,10,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,11,1) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,12,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomorIndukPencaker,13,1) . "&nbsp;&nbsp;" . substr($NomorIndukPencaker,14,1) . "&nbsp;&nbsp;" . substr($NomorIndukPencaker,15,1); ?></p>
	<p class="nomor_penduduk"><?php echo substr($NomerPenduduk,0,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,1,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,2,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,3,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,4,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,5,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,6,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,7,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,8,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,9,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,10,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,11,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,12,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,13,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,14,1) . "&nbsp;&nbsp;&nbsp;" . substr($NomerPenduduk,15,1);?></p>
	<p class="nama_pencaker"><?php echo ucwords($NamaPencaker);?></p> 
	<p class="tgl_tempat"><?php echo $TempatLahir . " / " . $TglLahir; ?></p>
    <p class="jenkel"><?php echo ($JenisKelamin == 0 ? 'Pria' : 'Wanita'); ?></p>
    <p class="status"><?php echo $NamaStatusPernikahan; ?></p>
    <p class="agama"><?php echo $NamaAgama;?></p> 
    <p class="alamat"><?php echo $Alamat;?></p> 
</body>
</html>