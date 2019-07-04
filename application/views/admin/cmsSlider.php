 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		CMS
 		<small>Slider</small>
 	</h1>
 	<ol class="breadcrumb">
 		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
 		<li><a href="#">CMS</a></li>
 		<li class="active">Slider</li>
 	</ol>
 </section>
 <section class="content">
 	<div class="box">
 		<div class="box-header text-center">
 			<h3 class="box-title">DAFTAR Slider</h3>
 			<button type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus"></i></button>
 			<div class="modal fade" id="modalTambah" role="dialog">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 							<h4 class="modal-title">Tambah Slider</h4>
 						</div>
 						<div class="modal-body">
 							<div class="row">
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label class="text-left pull-left">Gambar</label>
 										<input type="file" name="gambarInsert" id="gambarInsert" class="form-control btn btn-default">
 									</div>
 								</div>
 								<div class="col-lg-6 col-md-6 col-sm-12">
 									<div class="form-group">
 										<label class="text-left pull-left">Status</label>
 										<select class="form-control" name="statusInsert">
 											<option hidden="">Silahkan Pilih</option>
 											<option value="1">Active</option>
 											<option value="0">Tidak Active</option>
 										</select>
 									</div>
 								</div>
 							</div>
 							<small>* File extensi PNG & JPG. Maximal size 2MB</small>
 						</div>
 						<div class="modal-footer">
 							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 							<button type="button" class="btn btn-primary" id="insert">Simpan</button>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 		<!-- /.box-header -->
 		<div class="box-body table-responsive">
 			<table class="table table-bordered table-striped table-hover" id="dataTable">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Gambar</th>
 						<th>Tanggal Upload</th>
 						<th>Status</th>
 						<th>Aksi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php if (!empty($cms)) {
 						$no = 1;
 						foreach ($cms as $datacms) {?>
 						<tr>
 							<td><?php echo $no++;?></td>
 							<td><?php echo $datacms['gambar'];?></td>
 							<td><?php echo $datacms['tanggalUpload'];?></td>
 							<td><?php if ($datacms['status'] == 1) {
 								echo"<span class='label label-success'>Aktif</span>";
 							}else{
 								echo"<span class='label label-danger'>Tidak Aktif</span>";
 							}?></td>
 							<td>
 								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaldetail<?php echo $datacms['idslider'];?>"><i class="fa fa-info"></i> Detail</button>
 								<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?php echo $datacms['idslider'];?>"><i class="fa fa-edit"></i> Edit</button>
 								<button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?php echo $datacms['idslider'];?>')"><i class="fa fa-remove"></i> Delete</button>
 							</tr>
 							<div class="modal fade" id="modaldetail<?php echo $datacms['idslider'];?>" role="dialog">
 								<div class="modal-dialog">
 									<div class="modal-content">
 										<div class="modal-header">
 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 											<h4 class="modal-title">
 												Slider <?php echo $datacms['gambar'];?>
 												<?php if ($datacms['status'] == 1) {
 													echo"<span class='label label-success'>Aktif</span>";
 												}else{
 													echo"<span class='label label-danger'>Tidak Aktif</span>";
 												}?>
 											</h4>
 										</div>
 										<div class="modal-body">
 											<img src="<?php echo base_url();?>assets/slider/<?php echo $datacms['gambar'];?>" class="img-responsive">
 											
 										</div>
 										<div class="modal-footer">
 											<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 										</div>
 									</div>
 								</div>
 							</div>

 							<div class="modal fade" id="modaledit<?php echo $datacms['idslider'];?>" role="dialog">
 								<div class="modal-dialog">
 									<div class="modal-content">
 										<div class="modal-header">
 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 											<h4 class="modal-title">Edit Slider <?php echo $datacms['gambar'];?></h4>
 										</div>
 										<div class="modal-body">
 											<img src="<?php echo base_url();?>assets/slider/<?php echo $datacms['gambar'];?>" class="img-responsive">
 											<div class="row">
 												<div class="col-lg-6 col-md-6 col-sm-12">
 													<div class="form-group">
 														<label class="text-left pull-left">Gambar</label>
 														<input type="file" id="gambarEdit<?php echo $datacms['idslider'];?>" class="form-control btn btn-default">
 													</div>
 												</div>
 												<div class="col-lg-6 col-md-6 col-sm-12">
 													<div class="form-group">
 														<label class="text-left pull-left">Status</label>
 														<select class="form-control" id="statusEdit<?php echo $datacms['idslider'];?>">
 															<option hidden="">Silahkan Pilih</option>
 															<option value="1" <?php if ($datacms['status'] == 1) {echo "selected";}?>>Active</option>
 															<option value="0" <?php if ($datacms['status'] == 0) {echo "selected";}?>>Tidak Active</option>
 														</select>
 													</div>
 												</div>
 											</div>
 											<small>* File extensi PNG & JPG. Maximal size 2MB</small>
 										</div>
 										<div class="modal-footer">
 											<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
 											<button type="button" class="btn btn-primary" onclick="edit('<?php echo $datacms['idslider'];?>')">Edit</button>
 										</div>
 									</div>
 								</div>
 							</div>
 							<?php } } ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
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

 				$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
 				{
 					return {
 						"iStart": oSettings._iDisplayStart,
 						"iEnd": oSettings.fnDisplayEnd(),
 						"iLength": oSettings._iDisplayLength,
 						"iTotal": oSettings.fnRecordsTotal(),
 						"iFilteredTotal": oSettings.fnRecordsDisplay(),
 						"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
 						"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
 					};
 				};

 				$("#dataTable").dataTable();

 				$("#insert").click(function(){
 					var gambarInsert = $("input[name='gambarInsert']");
 					var statusInsert = $("select[name='statusInsert']").val();
 					var fileInput = document.getElementById('gambarInsert');
 					var file = fileInput.files[0];
 					var formData = new FormData();
 					formData.append('gambarInsert', file);
 					formData.append('statusInsert', statusInsert);
 					if (gambarInsert == '' || statusInsert == '') {
 						swal ( "Error" ,  "Isikan Semua Inputan Terlebih Dahulu!" ,  "warning" );
 					}else{
 						$.ajax({
 							type: "POST",
 							url: "<?php echo base_url();?>admin/cmsSliderInsert",
 							data: formData,
 							contentType: false,
 							processData: false,
 							cache: false,
 							success: function(response) {
 								if(response === "success"){
 									swal ( "Success" , "Data Berhasil Disimpan" , "success" );
 									setTimeout(function() {
 										window.location.reload();
 									}, 2000);
 								}else if(response === "error"){
 									swal ( "Error" ,  "Ada Yang Error! Silahkan Cek Inputan Terlebih Dahulu" ,  "warning" );
 								}else if(response === "kebanyakan"){
 									swal ( "Error" ,  "Slider Yang Aktif Terlalu Banyak, Silahkan Non Aktifkan Salah Satu Slider Terlebih Dahulu!" ,  "warning" );
 								}

 							}
 						});
 					}
 				});
 			});
 			function edit(id){
 				var gambarEdit = $("#gambarEdit" + id).val();
 				var statusEdit = $("#statusEdit" + id).val();
 				var formData = new FormData();
 				formData.append('statusEdit', statusEdit);
 				formData.append('idedit', id);

 				if (gambarEdit != '') {
 					var fileInput = document.getElementById('gambarEdit' + id);
 					var file = fileInput.files[0];
 					formData.append('gambarEdit', file);
 					var url = "<?php echo base_url();?>admin/cmsSliderEditGambar";
 				}else{
 					var url = "<?php echo base_url();?>admin/cmsSliderEdit";
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
 							swal ( "Success" , "Data Berhasil Disimpan" , "success" );
 							setTimeout(function() {
 								window.location.reload();
 							}, 2000);
 						}else if(response === "error"){
 							swal ( "Error" ,  "Ada Yang Error! Silahkan Cek Inputan Terlebih Dahulu" ,  "warning" );
 						}else if(response === "kebanyakan"){
 							swal ( "Error" ,  "Slider Yang Aktif Terlalu Banyak, Silahkan Non Aktifkan Salah Satu Slider Terlebih Dahulu!" ,  "warning" );
 						}
 					}
 				});
 			}
 			function hapus(id){

 				swal({
 					title: "Apa Anda Yakin Data Akan Dihapus?",
 					text: "Data Yang Dihapus Tidak Bisa Dikembalikan Lagi!",
 					icon: "warning",
 					buttons: true,
 					dangerMode: true,
 				})
 				.then((willDelete) => {
 					if (willDelete) {

 						$.ajax({
 							type: "POST",
 							url: "<?php echo base_url();?>admin/cmsSliderDelete",
 							data: {id: id},
 							success: function(response) {
 								if(response === "success"){
 									swal ( "Success" ,  "Data Berhasil Terhapus" ,  "success" );
 									setTimeout(function() {
 										window.location.reload();
 									}, 2000);
 								}else if(response === "error"){
 									swal ( "Error", "Error", "warning" );
 								}
 							}
 						});
 					} else {
 						
 					}
 				});
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