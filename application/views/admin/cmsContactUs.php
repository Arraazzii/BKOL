 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1>
 		CMS
 		<small>Contact Us</small>
 	</h1>
 	<ol class="breadcrumb">
 		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
 		<li><a href="#">CMS</a></li>
 		<li class="active">Contact Us</li>
 	</ol>
 </section>

 <!-- Main content -->
 <section class="content">
 	<div class="box">
 		<div class="box-header text-center">
 			<h3 class="box-title">DAFTAR KRITIK DAN SARAN</h3>
 		</div>
 		<!-- /.box-header -->
 		<!-- form start -->
 		<div class="box-body table-responsive">
 			<table class="table table-bordered table-striped table-hover" id="dataTable">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Email</th>
 						<th>Isi</th>
 						<th>Tanggal Kirim</th>
 						<th>Aksi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php if (!empty($cms)) {
 						$no = 1;
 						foreach ($cms as $datacms) {?>
 						<tr>
 							<td><?php echo $no++;?></td>
 							<td><?php echo $datacms['email'];?></td>
 							<td><?php echo word_limiter($datacms['isi'],500);?> ...</td>
 							<td><?php echo $datacms['tanggal'];?></td>
 							<td>
 								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaldetail<?php echo $datacms['idKritikSaran'];?>"><i class="fa fa-info"></i> Detail</button>
 								<a href="mailto:<?php echo $datacms['email'];?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Balas</a></td>
 							</tr>
 							<div class="modal fade" id="modaldetail<?php echo $datacms['idKritikSaran'];?>" role="dialog">
 								<div class="modal-dialog">
 									<div class="modal-content">
 										<div class="modal-header">
 											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 											<h4 class="modal-title">Kritik dan Saran Dari <?php echo $datacms['email'];?></h4>
 										</div>
 										<div class="modal-body">
 											<label>isi</label>
 											<div class="jumbotron">
 												<p class="text-center">
 													<?php echo $datacms['isi'];?>
 												</p>
 											</div>
 										</div>
 										<div class="modal-footer">
 											<a href="mailto:<?php echo $datacms['email'];?>" target="_blank" class="btn btn-success"><i class="fa fa-reply"></i> Balas</a>
 											<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
 			});
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