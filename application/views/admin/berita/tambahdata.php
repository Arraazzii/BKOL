
<section class="content-header">
	<h1>
		Tambah
		<small>Loker Luar Depok</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
		<li>Loker Luar Depok</li>
		<li class="active">Tambah Data</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Tambah Data Loker
					</h3>
					
				</div>
				<div class="box-body">
					<form action="<?php echo base_url('admin/berita/tambahdata') ?>" method="POST" role="form">
						<div class="form-group">
							<div class="col-md-3 <?php echo form_error('tanggalberita') != '' ? 'has-error' : '' ?>">
								<label for="">Tanggal Lowongan </label>
								<input type="text" readonly="true" class="form-control" id="tanggalberita" name="tanggalberita" value="<?php echo $post != null ? $post['tanggalberita'] : date('d-m-Y'); ?>">
								<?php echo form_error('tanggalberita', '<span class="help-block">', '</span>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9 <?php echo form_error('judulberita') != '' ? 'has-error' : '' ?>">
								<label for="">Judul Lowongan </label>
								<input type="text" class="form-control" id="judulberita" name="judulberita" placeholder="Tulis Judul Lowongan Pekerjaan" value="<?php echo $post != null ? $post['judulberita'] : ''; ?>" autofocus>
								<?php echo form_error('judulberita', '<span class="help-block">', '</span>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 <?php echo form_error('isiberita') != '' ? 'has-error' : '' ?>">
								<label for="">Keterangan / Isi</label> <?php echo form_error('isiberita', '<span class="help-block">', '</span>'); ?>
								<textarea id="isiberita" name="isiberita" hidden><?php echo $post != null ? $post['isiberita'] : ''; ?></textarea>
								
							</div>
						</div>
						<hr>
						<div class="col-md-6">
							<a type="button" class="btn btn-default" href="<?php echo base_url('admin/berita') ?>">Kembali</a>
							<input type="hidden" name="submit">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

	<script>
		$(document).ready(function() {
			$('#isiberita').summernote({
				placeholder: 'Tulis Isi Berita',
				tabsize: 2,
				height: 300
			});
			$("#tanggalberita").datepicker({
				constrainInput: true,
				changeMonth: true,
				changeYear: true,
				format: 'dd-mm-yyyy',
				defaultDate: new Date(1990, 1 - 1, 1),
				minDate: new Date(1970, 1 - 1, 1),
				maxDate: new Date(),
				onSelect: function(dateText, instance)
				{
                //alert(dateText);
            },
            onClose: function()
            {
            //this.focus();
        }
    });
		});
	</script>
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