<div class="modal fade" id="modal-bahasa">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Bahasa</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-3">Bahasa</label>
            <div class="col-md-9">
              <select name="namabahasa" id="namabahasa" class="form-control" >
                <option value="">Pilih Bahasa</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Inggris">Inggris</option>
                <option value="Mandarin">Mandarin</option>
                <option value="Jerman">Jerman</option>
                <option value="Perancis">Perancis</option>
                <option value="-">Lainnya</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<section class="content-header container">
  <h1>
    Profil
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('') ?>">Home</a></li>
    <li>Profil Pencaker</li>
    <li class="active">Detail Bahasa</li>
  </ol>
</section>
<!-- Main content -->
<section class="content container">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Penguasaan Bahasa</h3>
    </div>
    <div class="box-body table-responsive">
      <div class="col-md-12" style="margin-bottom: 10px">
        <button type="button" class="btn btn-default btn-sm" id="btn-tambah">Tambah Bahasa</button>
        <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo base_url() ?>'">Kembali</button>
      </div>

      <div class="col-md-6">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama Bahasa</th>
              <th width="50"></th>
            </tr>
          </thead>
          <tbody>
            <?php if ($MsBahasaData->num_rows() > 0): ?>
              <?php $i = 0; ?>
              <?php foreach ($MsBahasaData->result() as $getdata): ?>
                <?php $i++ ?>
                <tr>
                  <td><?php echo $i+$this->uri->segment(3) ?></td>
                  <td><?php echo $getdata->NamaBahasa ?></td>
                  <td class="text-center"><?php echo '<a class="btn btn-default btn-sm" href="'.site_url('pencaker/dodeletebahasa').'/'.$getdata->IDBahasa.'">Hapus Bahasa</a>' ?></td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td class="text-center" colspan="3">Belum ada data</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</section>
<script>
  $('#btn-tambah').click(function() {
    $('#modal-bahasa').modal('show');
    $('#namabahasa').val('');
  });

  $('#btn-simpan').click(function() {
    namabahasa = $('#namabahasa').val();

    $.ajax({
      url: '<?= site_url('pencaker/tambahbahasa') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {
        NamaBahasa: namabahasa
      },
      success: function(data) {
        if (data.valid) {
          window.location.reload();
        }
        else {
          notifikasi(data.error, 'danger', 'fa fa-exclamation');
        }
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