
<section class="content-header">
	<h1>
		Edit
		<small>Kegiatan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
		<li>Kegiatan</li>
		<li class="active">Edit Data</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Edit Data Kegiatan
					</h3>
					
				</div>
				<div class="box-body">
					<form action="<?php echo base_url('admin/event/updatedata') ?>" method="POST" role="form">
						<div class="form-group">
							<div class="col-md-3 <?php echo form_error('tanggalkegiatan') != '' ? 'has-error' : '' ?>">
								<label for="">Tanggal Kegiatan </label>
								<input type="text" readonly="true" class="form-control" id="tanggalkegiatan" name="tanggalkegiatan" value="<?php echo $post != null ? $post['tanggalkegiatan'] : date('d-m-Y'); ?>">
								<?php echo form_error('tanggalkegiatan', '<span class="help-block">', '</span>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9 <?php echo form_error('judulkegiatan') != '' ? 'has-error' : '' ?>">
								<label for="">Judul Kegiatan </label>
								<input type="text" class="form-control" id="judulkegiatan" name="judulkegiatan" placeholder="Tulis Judul Kegiatan" value="<?php echo $post != null ? $post['judulkegiatan'] : ''; ?>" autofocus>
								<?php echo form_error('judulkegiatan', '<span class="help-block">', '</span>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 <?php echo form_error('isikegiatan') != '' ? 'has-error' : '' ?>">
								<label for="">Keterangan / Isi</label> <?php echo form_error('isikegiatan', '<span class="help-block">', '</span>'); ?>
								<textarea id="isikegiatan" name="isikegiatan" hidden><?php echo $post != null ? $post['isikegiatan'] : ''; ?></textarea>
								
							</div>
						</div>
						<hr>
						<div class="pull-right">
							<a type="button" class="btn btn-default" href="<?php echo base_url('admin/kegiatan') ?>">Kembali</a>
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
			$('#isikegiatan').summernote({
				placeholder: 'Tulis Isi kegiatan',
				tabsize: 2,
				height: 300
			});
			$("#tanggalkegiatan").datepicker({
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