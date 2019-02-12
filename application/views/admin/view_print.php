<html>

<head>
	<style type="text/css" media="print">
		@page {
			size: landscape;
		}

		.kolom {
			visibility: visible;
		}
	</style>
</head>

<body class="kolom">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div style="width:50%;float: left;">
		<h2 style="
    margin: 0px;
    font-size: 15pxpx;
">PENDIDIKAN FORMAL TERAKHIR</h2>
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:70%">
						<b>1.
							<?php echo strtoupper($NamaStatusPendidikan);?>
						</b>
					</td>
					<td style="width:50%">
						<b>TH
							<?php echo $TahunLulus;?>
					</td>
				</tr>
			</tbody>
		</table>
		<h2 style="
    margin: 0px;
    font-size: 15pxpx;
">PENGALAMAN KERJA</h2>
		<table style="width:100%;">
			<tbody>
				<?php echo $PengalamanData;?>
			</tbody>
		</table>
		<div style="padding-left: 50%;width: 50%;">
			<p></p>
			<center>
				<b>MENGETAHUI
					<br>a.n KEPALA DISNAKER KOTA DEPOK</b>KASIE PERLUASAN KERJA DAN TRANSMIGRASI</b>
			</center>
			<br>
			<p></p>
			<center>
				<b>Agus S.Sos</b>
			</center>
			<p style="
margin: 0;"></p>
			<center>
				<b>NIP : 197308241993111001</b>
			</center>
			<p></p>
		</div>
	</div>
	<div style="width:50%;float: left;">
		<img src="<?php echo base_url();?>assets/logo.png" style="height: 60px;float: left;">
		<center>
			<h2 style="margin-bottom: 1px;margin-top: 1px;margin: 0;"></h2>
			<h3 style="margin-top: 1px;margin: 0;font-size: 15px;">
				<br>
			</h3>
		</center>
		<hr>
		<h2 style="
    margin: 0px;
    font-size: 17px;
"></h2>
		<table>
			<tbody>
				<tr>
					<td>
						<b style="
    font-size: 15px;
"> </b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $IDPencaker;?>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<b style="
    font-size: 15px;
"></b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $NomorIndukPencaker;?>
						</b>
					</td>
				</tr>
			</tbody>
		</table>

		<img src="<?php echo base_url();?>assets/file/pencaker/foto.png" style="height:140px;width:110px;float: left;padding-right: 5px;">
		<table>
			<tbody>
				<tr>
					<td>
						<b></b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $NamaPencaker;?>
						</b>
						<b></b>
					</td>
				</tr>
				<tr>
					<td>
						<b> </b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $TempatLahir;?>,
							<?php echo $TglLahir;?>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<b> </b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php if($JenisKelamin==0){echo "Laki-Laki";}else{echo "Perempuan";}?>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<b></b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $NamaStatusPernikahan;?>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<b></b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $NamaAgama;?>
						</b>
					</td>
				</tr>
				<tr>
					<td>
						<b></b>
					</td>
					<td>
						<b>:</b>
					</td>
					<td>
						<b>
							<?php echo $Alamat;?>
						</b>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>