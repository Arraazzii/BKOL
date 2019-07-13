 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		CMS
 		<small>AK 1</small>
 	</h1>
 	<ol class="breadcrumb">
 		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
 		<li><a href="#">Data Master</a></li>
 		<li class="active">CMS AK 1</li>
 	</ol>
 </section>
 <section class="content">
 	<div class="box">
 		<div class="box-header text-center">
 			<?php foreach ($ak as $cms) { ?>
 			<button type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#modalEdit<?php echo $cms['idSigniture'];?>">EDIT Signiture</button>
 			<div class="modal fade" id="modalEdit<?php echo $cms['idSigniture'];?>" role="dialog">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 							<h4 class="modal-title">Edit Signiture</h4>
 						</div>
 						<div class="modal-body">
 							<img src="<?php echo base_url();?>assets/file/signiture/<?php echo $cms['gambarSigniture']; ?>" style="width: 400px;height: 150px;object-fit: cover;object-position: center;display: block;margin: 0px auto;border: 2px solid #111;margin-bottom: 20px; padding: 10px;border-radius: 5px;">
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label>Jabatan</label>
 										<input type="text" name="jabatanEdit<?php echo $cms['idSigniture']; ?>" id="jabatanEdit<?php echo $cms['idSigniture']; ?>" class="form-control text-center" placeholder="Jabatan" value="<?php echo $cms['jabatanSigniture']; ?>">
 									</div>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label>Bidang Jabatan</label>
 										<input type="text" name="bidangEdit<?php echo $cms['idSigniture']; ?>" id="bidangEdit<?php echo $cms['idSigniture']; ?>" class="form-control text-center" placeholder="Bidang Jabatan" value="<?php echo $cms['bidangSigniture']; ?>">
 									</div>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label>Nama</label>
 										<input type="text" name="namaEdit<?php echo $cms['idSigniture']; ?>" id="namaEdit<?php echo $cms['idSigniture']; ?>" class="form-control text-center" placeholder="Nama Lengkap" value="<?php echo $cms['namaSigniture']; ?>"">
 									</div>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label>NIP</label>
 										<input type="number" name="nipEdit<?php echo $cms['idSigniture']; ?>" id="nipEdit<?php echo $cms['idSigniture']; ?>" class="form-control text-center" placeholder="NIP" value="<?php echo $cms['nipSigniture']; ?>">
 									</div>
 								</div>
 								<div class="col-lg-12 col-md-12 col-sm-12">
 									<div class="form-group">
 										<label>Gambar Tanda Tangan</label>
 										<input type="file" name="gambarEdit" id="gambarEdit<?php echo $cms['idSigniture']; ?>" class="form-control btn btn-default" accept="png, jpg">
 									</div>
 								</div>
 							</div>
 							<small>* File extensi PNG & JPG. Maximal size 2MB</small><br>
 							<small>* Pastikan gambar beresolusi 400px x 150px agar sesuai dengan format </small>
 						</div>
 						<div class="modal-footer">
 							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 							<button type="button" class="btn btn-primary" onclick="edit('<?php echo $cms['idSigniture']; ?>')">Simpan</button>
 						</div>
 					</div>
 				</div>
 			</div><br>
 			<div class="col-lg-3"></div>
 			<div class="col-lg-6" style="border:2px solid #111;">
 				<div class="text-center">
 					<h4 class="margin-5">MENGETAHUI</h4>
 					<h4 class="margin-5">A.N <?php echo $cms['bidangSigniture']; ?></h4>
 					<h4 class="margin-5"><?php echo $cms['jabatanSigniture']; ?></h4>
 					<img src="<?php echo base_url();?>assets/file/signiture/<?php echo $cms['gambarSigniture']; ?>" style="width: 400px;height: 150px;object-fit: cover;object-position: center;display: block;margin: 0px auto;">
 					<h4 class="border-bottom-1"><?php echo $cms['namaSigniture']; ?></h4>
 					<hr style="border:1px solid #111;margin-top: 0px;margin-bottom: 0px;">
 					<h4 class="border-bottom-1">NIP : <?php echo $cms['nipSigniture']; ?></h4>
 				</div>
 			</div>
 			<?php } ?>
 		</div>
 		<!-- /.box-header -->

 	</section>
 	<script type="text/javascript">
 		$(document).ready(function(){
 			$(":file").change(function() {
 				if (this.files && this.files[0] && (this.files[0].name.substr((this.files[0].name.lastIndexOf('.')+1)).toLowerCase() == 'jpg' || this.files[0].name.substr((this.files[0].name.lastIndexOf('.')+1)).toLowerCase() == 'png') ){
 					if(this.files[0].size>2097152) {
 						$(':file').val('');
 						swal ( "Error" ,  "Batas Maximal Ukuran File 2MB !" ,  "warning" );
 					}
 					else {
 						var reader = new FileReader();
 						reader.readAsDataURL(this.files[0]);
 					}
 				} else{
 					$(':file').val('');
 					swal ( "Error" ,  "Hanya File JPG & PNG Yang Diizinkan !" ,  "warning" );
 				}
 			});
});

 			function edit(id){
 				var gambarEdit = $("#gambarEdit" + id).val();
 				var jabatanEdit = $("#jabatanEdit" + id).val();
 				var bidangEdit = $("#bidangEdit" + id).val();
 				var namaEdit = $("#namaEdit" + id).val();
 				var nipEdit = $("#nipEdit" + id).val();
 				if (jabatanEdit == '' || bidangEdit == '' || namaEdit == '' || nipEdit == '') {
 					swal ( "Error" ,  "Ada Yang Error! Silahkan Cek Inputan Terlebih Dahulu" ,  "warning" );
 				}else{
 					var formData = new FormData();
 					formData.append('jabatanEdit', jabatanEdit);
 					formData.append('bidangEdit', bidangEdit);
 					formData.append('namaEdit', namaEdit);
 					formData.append('nipEdit', nipEdit);
 					formData.append('idedit', id);

 					if (gambarEdit != '') {
 						var fileInput = document.getElementById('gambarEdit' + id);
 						var file = fileInput.files[0];
 						formData.append('gambarEdit', file);
 						var url = "<?php echo base_url();?>admin/cmsAKEditGambar";
 					}else{
 						var url = "<?php echo base_url();?>admin/cmsAKEdit";
 					}

 					$.ajax({
 						type: "POST",
 						url: url,
 						data: formData,
 						contentType: false,
 						processData: false,
 						cache: false,
 						success: function(response) {
 							if(response === "success"){
 								swal ( "Success" , "Data Berhasil Diubah!" , "success" );
 								setTimeout(function() {
 									window.location.reload();
 								}, 2000);
 							}else if(response === "error"){
 								swal ( "Error" ,  "Ada Yang Error! Silahkan Cek Inputan Terlebih Dahulu" ,  "warning" );
 							}
 						}
 					});
 				}
 			}
 		</script>
 		<script type="text/javascript">
 			window.addEventListener( "pageshow", function ( event ) {
 				var historyTraversal = event.persisted || 
 				( typeof window.performance != "undefined" && 
 					window.performance.navigation.type === 2 );
 				if ( historyTraversal ) {
 					window.location.reload();
 				}
 			});
 		</script>