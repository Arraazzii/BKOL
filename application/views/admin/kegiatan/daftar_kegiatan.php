<section class="content-header">
    <h1>
        Daftar
        <small>Kegiatan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Kegiatan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR KEGIATAN</h3>
            <a class="btn btn-default btn-sm pull-right" title="Tambah Kegiatan" href="<?php echo site_url('admin/event/tambahdata') ?>"><i class="fa fa-plus"></i></a>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">Tanggal Kegiatan</th>
                        <th class="text-center">Judul Kegiatan</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->pagination->total_rows > 0): ?>
                        <?php $i = 0;  ?>
                        <?php foreach ($MsEventData as $getdata): ?>
                            <?php 

                            $detailbtn = '<a class="btn btn-warning btn-sm" href="'.site_url('admin/event/updatedata')."/".$getdata->IDEvent.'" "><i class="fa fa-edit"></i> Edit</a> ';
                            $deletebtn = '<a class="btn btn-danger btn-sm" onclick="DoDelete(\''.$getdata->IDEvent.'\') "><i class="fa fa-trash"></i> Hapus</a>';
                            $i++;
                            ?>
                            <tr>
                                <td class="text-left"><?php echo $i+$this->uri->segment(3) ?></td>
                                <td class="text-left"><?php echo $getdata->TglEvent ?></td>
                                <td class="text-left"><?php echo $getdata->JudulEvent ?></td>
                                <td class="text-center"><?php echo $detailbtn.$deletebtn ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <?php if ($this->pagination->create_links()): ?>
            <div class="box-footer">
                <div class="pull-right">
                    <?php echo $this->pagination->create_links() ?>
                </div>
            </div>
            <!-- /.box-footer -->    
        <?php endif ?>
    </div>
</section>

<script>

  function DoDelete(idkegiatan)
  {
    $.get('<?= site_url('admin/event/getdata') ?>/'+idkegiatan,
        function(getdata)
        {
         if (getdata.exists)
         {
          swal({
            title: 'Hapus Kegiatan?',
            text: "Kegiatan "+getdata.JudulEvent+" akan dihapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= site_url('admin/event/deletedata') ?>',
                    type: 'POST',
                    data: {idkegiatan: idkegiatan},
                    success: function (data) {
                        window.location.reload();
                    }
                });
                
            }
        })
    }
    else
    {
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Kegiatan Tidak Ditemukan!'
    })
  }
},'json')
}

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