<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
$input = $this->session->flashdata('input');
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:site_name" content="BKOL DEPOK">
<meta property="og:title" content="Bursa Lowongan Kerja Online KOTA DEPOK" />
<meta property="og:description" content="Lowongan Dan Data Pekerjaan Kota Depok" />
<meta property="og:image" itemprop="image" content="<?php echo site_url();?>assets/depok.png">
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
<table width="100%">
	<tr>
		<td align="center">
			<table width="100%" class="table-form">
				<thead>
					<tr>
						<th align="center">
							<div align="center">
								LUPA KATA SANDI
							</div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="center">
							<div align="center">
								<form method="post" action="<?= site_url('login/dosendpassword') ?>">
									<table width="100%">
										<tbody>
											<tr>
												<td align="left" width="130px">
													Email Pengguna
												</td>
												<td align="left">
													<input id="email" name="email" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="50">
												</td>
											</tr>
											<tr>
												<td align="left">
												</td>
												<td align="left">
													<div align="left">
														<?php
														if ($this->session->flashdata('error') != null){
															echo $this->session->flashdata('error');
														}
														?>
													</div>
												</td>
											</tr>
											<tr>
												<td align="left">
												</td>
												<td align="left">
													<input type="hidden" value="submit" name="submit">
													<input id="button" type="submit" value="Kirim Sandi" name="submit">
												</td>
											</tr>
											<tbody>
											</table>
										</form>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</table>
