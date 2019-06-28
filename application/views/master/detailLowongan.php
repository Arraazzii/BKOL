<?php foreach ($MsLowonganData as $data) {
	date_default_timezone_get('Asia/Jakarta');
	$timeLimit = date('Y-m-d');
	$lowonganPekerjaan = $data['NamaLowongan'];
	$posisiPekerjaan = $data['NamaPosisiJabatan'];
	$perusahaanPekerjaan = $data['NamaPerusahaan'];
	$alamatPekerjaan = $data['Alamat'];
	$pendidikanPekerjaan = $data['NamaStatusPendidikan'];
	$jurusanPekerjaan = $data['Jurusan'];
	$priaPekerjaan = $data['JmlPria'];
	$wanitaPekerjaan = $data['JmlWanita'];
	$umurPekerjaan = $data['BatasUmur'];
	$syaratPekerjaan = $data['SyaratKhusus'];
	$jamPekerjaan = $data['JamKerjaSeminggu'];
	$gajiPekerjaan = $data['GajiPerbulan'];
	$penempatanPekerjaan = $data['Penempatan'];
	$idPerusahaanPekerjaan = $data['IDPerusahaan'];
	$TglBerakhirPekerjaan = $data['TglBerakhir'];
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:site_name" content="BKOL DEPOK">
	<meta property="og:title" content="<?php echo $lowonganPekerjaan; ?>" />
	<meta property="og:description" content="<?php echo $posisiPekerjaan; ?>" />
	<?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$idPerusahaanPekerjaan.'.jpg')){ ?>
	<meta property="og:image" itemprop="image" content="<?php echo site_url('assets/file/perusahaan/'.$idPerusahaanPekerjaan.'.jpg') ?>">
	<?php }else{ ?>
	<meta property="og:image" itemprop="image" content=" <?php echo site_url();?>assets/depok.png">
	<?php } ?>
	<meta property="og:type" content="website" />

	<title>BKOL Kota Depok - <?php echo $lowonganPekerjaan;?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Tell the browser to be responsive to screen width -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Ionicons/css/ionicons.min.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  	<link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
  	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">
  	<!-- jQuery 3 -->
  	<script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Custom Style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/footer.css">
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="<?php echo base_url(); ?>" class="navbar-brand"><b>BKOL</b>Depok</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<?php $this->load->view('sub/navbar'); ?>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<?php $iduser = $this->session->userdata('iduser'); 
							if ($iduser == "") : 
								?>
								<li><a href="<?= site_url('login'); ?>">Login</a></li>
								<!-- User Account Menu -->
							<?php else : ?>
								<li class="dropdown user user-menu">
									<!-- Menu Toggle Button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!-- The user image in the navbar-->
										<img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="user-image" alt="User Image">
										<!-- hidden-xs hides the username on small devices so only the image appears. -->
										<span class="hidden-xs"><?php echo $this->session->userdata('username') ?></span>
									</a>
									<ul class="dropdown-menu">
										<!-- The user image in the menu -->
										<li class="user-header">
											<img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" alt="User Image">

											<p>
												<?php echo $this->session->userdata('username') ?>
											</p>
										</li>
										<!-- Menu Body -->
										<li class="user-body">
											<!-- /.row -->
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
											<div class="pull-left">
												<a href="javascript:void(0);" id="gantipass" class="btn btn-default btn-flat">Ubah Sandi</a>
											</div>
											<div class="pull-right">
												<a href="javascript:void(0);" id="logout" class="btn btn-default btn-flat">Logout</a>
											</div>
										</li>
									</ul>
								</li>
							<?php endif; ?>
						</ul>
					</div>
					<!-- /.navbar-custom-menu -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper ">
			<br>
			<div class="container ">
				<div class="box box-primary" style="padding: 0px 15px;">
					<?php if (file_exists(BASEPATH .'/../assets/file/perusahaan/'.$idPerusahaanPekerjaan.'.jpg')){ ?>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-0">
							<img src="<?php echo site_url('assets/file/perusahaan/'.$idPerusahaanPekerjaan.'.jpg') ?>" class="img-responsive col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
						</div>
					</div>
					<?php } ?>
					<div class="row">
						<h3 class="text-center"><?php echo $lowonganPekerjaan; ?></h3>
						<h4 class="text-center">(<?php echo $perusahaanPekerjaan; ?>)</h4>
						<br>
						<div class="col-lg-6">
							<div class="row">
								<label class="col-md-4" >Posisi Jabatan :</label>
								<div class="col-md-8">
									<span id="posisijabatan"><?php echo $posisiPekerjaan; ?></span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Alamat Perusahaan :</label>
								<div class="col-md-8">
									<span id="alamat"><?php echo $alamatPekerjaan; ?></span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Pendidikan Minimal :</label>
								<div class="col-md-8">
									<span id="statuspendidikan"><?php echo $pendidikanPekerjaan; ?> / <?php echo $jurusanPekerjaan; ?></span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Jml Pria Dibutuhkan :</label>
								<div class="col-md-8">
									<span id="jmlpria"><?php echo $priaPekerjaan; ?> Orang</span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Jml Wanita Dibutuhkan :</label>
								<div class="col-md-8">
									<span id="jmlwanita"><?php echo $wanitaPekerjaan; ?> Orang</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<label class="col-md-4" >Batas Umur :</label>
								<div class="col-md-8">
									<span id="batasumur"><?php echo $umurPekerjaan; ?> Tahun</span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Syarat Khusus :</label>
								<div class="col-md-8">
									<pre id="syaratkhusus"><?php echo $syaratPekerjaan; ?></pre>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Jam Kerja Seminggu :</label>
								<div class="col-md-8">
									<span id="jamkerjaseminggu"><?php echo $jamPekerjaan; ?> Jam Per Minggu</span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Gaji Perbulan :</label>
								<div class="col-md-8">
									<span id="gajiperbulan">Rp <?php echo number_format($gajiPekerjaan,0,",","."); ?></span>
								</div>
							</div>

							<div class="row">
								<label class="col-md-4" >Lokasi Penempatan :</label>
								<div class="col-md-8">
									<span id="penempatan"><i class="fa fa-map-marker"></i> <?php echo $penempatanPekerjaan; ?></span>
								</div>
							</div>
						</div>
					</div>

					<br>
					<?php if ($TglBerakhirPekerjaan >= $timeLimit){ ?>
					<div class="pull-right">
						<?php $lowongan = $this->input->get('lowongan'); ?>
						<button type="button" id="send" class="btn btn-success" onclick="SendLowongan('<?php echo $lowongan;?>')"><i class="fa fa-send"></i> Kirim Lowongan</button>
					</div>
					<?php }else{ ?>
					<!-- <div class="pull-right">
						<button type="button" id="send" class="btn btn-danger disabled"><i class="fa fa-send"></i> Kirim Lowongan (Expired)</button>
					</div> -->
					<?php } ?>
					<br><br><br>
				</div>
				<!-- /.container -->
			</div>
		</div>
		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>BKOL<span>Depok</span></h3>

				<p class="footer-company-name">Dinas Tenaga Kerja Kota Depok &copy; 2018</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Jalan Margonda Raya No.54</span> Depok, Pancoran MAS</p>
				</div>

				<div>
					<i class="fa fa-whatsapp"></i>
					<p>(+62) 897 8186 588</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:admin@bkol.depok.go.id">admin@bkol.depok.go.id</a></p>
				</div>

			</div>

			<div class="footer-right">

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>

				</div>

			</div>

		</footer>
	</div>
	<!-- ./wrapper -->

	<div class="modal fade" id="gantipassmodal" >
		<div class="modal-dialog" style="margin-top: 150px">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Ubah Kata Sandi</h4>
				</div>
				<div class="modal-body">
						<input type="password" name="sandilama" id="sandilama" class="form-control" value="" required="required" placeholder="Kata Sandi Lama">
						<span class="help-block"></span>
						<input type="password" name="sandibaru" id="sandibaru" class="form-control" value="" required="required" placeholder="Kata Sandi Baru">
						<span class="help-block"></span>
						<input type="password" name="sandibaru_confirm" id="sandibaru_confirm" class="form-control" value="" required="required" placeholder="Konfirmasi Sandi Baru">
						<span class="help-block"></span>
					</div>   
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" id="simpansandi" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- Sweetalert2 -->
	<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url() ?>assets/plugins/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<!-- Summernote JS -->
	<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
	<script>
		var jumboHeight = $('.jumbotron').outerHeight();
		function parallax(){
			var scrolled = $(window).scrollTop();
			$('.bg').css('height', (jumboHeight-scrolled) + 'px');
		}

		$(window).scroll(function(e){
			parallax();
		});

		function notifikasi(pesan,tipe, ico = '') {
			$.notify({
      // options
      icon: ico,
      message: pesan,
  },{
      // settings
      type: tipe,
      z_index: 9999
  });
		}

		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		})

		$("#logout").click(function() {
			return swal({
				title: 'Logout ?',
				text: "Yakin akan logout?",
				type: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Logout!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.value) {
					window.location.href = '<?php echo site_url('logout') ?>';
				}
			})
		});

		$("#gantipass").click(function() {
			clearmodalpass();
			var inst = $('#gantipassmodal');
			inst.modal('show');
		});

		$("#simpansandi").click(function() {
			clearmodalpass();
			$.ajax({
				url: '<?php echo site_url('pencaker/update_password') ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {
					sandilama: $("#sandilama").val(),
					sandibaru: $("#sandibaru").val(),
					sandibaru_confirm: $("#sandibaru_confirm").val(),
				},
				success: function(data) {
					if (data.ket == 1) {
						$('#gantipassmodal').modal('hide');
						swal({
							title: "Success!",
							text: "Sukses Mengubah Password, Silahkan Login Kembali !",
							type: "success",
							timer: 2000,
							showConfirmButton: false
						}).then(function (result) {
							window.location.href="<?php echo site_url('logout') ?>";
						});
					} else {
						for (var i = 0; i < data.inputerror.length; i++) 
						{
							$('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
							$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
						}
					}
				}
			});

		});

		function clearmodalpass() {
			$("#sandilama").parent().removeClass('has-error');
			$("#sandilama").next().text('');
			$("#sandibaru").parent().removeClass('has-error');
			$("#sandibaru").next().text('');
			$("#sandibaru_confirm").parent().removeClass('has-error');
			$("#sandibaru_confirm").next().text('');
		}
	</script>
	<?php if ($this->session->flashdata('notifikasi')): ?>
		<?php echo $this->session->flashdata('notifikasi'); ?>
	<?php endif ?>
	<script type="text/javascript">
		function SendLowongan(idlow) {
			$('#modal-lowongan').modal('hide');
			<?php  
			$iduser = $this->session->userdata('iduser');
	        	if ($iduser != '') { ?>
	        		 window.location.href='<?php echo site_url('pencaker/registerlowongan') ?>/'+idlow;
	        <?php }else{ ?>
			swal({
				title: '<strong>Anda Harus Login!</strong>',
				type: 'info',
				html:
				'Jika anda sudah punya akun, silahkan login, jika belum anda bisa memilih menu pendaftaran!',
				showCloseButton: true,
				showCancelButton: true,
				focusConfirm: false,
				confirmButtonText:
				'Login',
				confirmButtonAriaLabel: 'Thumbs up, great!',
				cancelButtonText:
				'Daftar',
				cancelButtonAriaLabel: 'Thumbs down',
			});
			$('.swal2-confirm').click(function(){
				window.location.href = "<?php echo site_url();?>login";
			});
		
			$('.swal2-cancel').click(function(){
				window.location.href = "<?php echo site_url();?>register/2";
			});
			<?php } ?>
		}
		function KirimLamaran(IDLowongan) {
		    window.location.href='<?php echo site_url('pencaker/registerlowongan') ?>/'+IDLowongan;
		  }
	</script>
</body>
</html>
