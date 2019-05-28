
<section class="content-header">
	<h1>
		Import
		<small>Pencaker</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
		<li>Pencaker</li>
		<li class="active">Import Data</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Import Data Pencaker
					</h3>
					
				</div>
				<div class="box-body">
					<form action="<?php echo base_url('admin/import_pencaker') ?>" method="POST" role="form">
						<div class="form-control">
							<label class="col-md-3 control-label">Pilih File CSV</label>
							<div class="col-md-5">
								<input type="file" name="filepencaker">
							</div>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
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