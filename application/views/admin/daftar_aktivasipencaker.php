<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar
        <small>Aktivasi Pencaker</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li><a href="#">Daftar</a></li>
        <li class="active">Aktivasi Pencaker</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR AKTIVASI PENCARI KERJA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Induk Pencaker</th>
                        <th>Nama Lengkap</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Tgl Berakhir</th>
                        <th>Tgl Aktivasi</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($this->pagination->total_rows > 0): ?>
                        <?php $i = 0;  ?>
                        <?php foreach ($MsAktivasiData as $getdata): ?>
                            <?php 

                            $submitbtn = '<a class="btn btn-default btn-sm" onclick=DoActivateConfirm(\''.$getdata->IDPencaker.'\') "><i class="fa fa-check"></i> Aktifkan</a>';
                            $expireddate = explode("-", $getdata->ExpiredDate);
                            $activationdate = explode("-", substr($getdata->RegisterDate,0,10));
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i+$this->uri->segment(4) ?></td>
                                <td><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td><?php echo $getdata->NamaPencaker ?></td>
                                <td><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td><?php echo $expireddate[2].'-'.$expireddate[1].'-'.$expireddate[0] ?></td>
                                <td><?php echo $activationdate[2].'-'.$activationdate[1].'-'.$activationdate[0] ?></td>
                                <td class="text-center"><?php echo $submitbtn ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data</td>
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
    function DoActivateConfirm(IDPencaker)
    {
        $.get('<?= site_url('admin/pencaker/getdata') ?>/'+IDPencaker,
            function(getdata)
            {
                if (getdata.exists)
                {
                    swal({
                        title: 'Aktifkan Pencaker?',
                        text: "Pencaker "+getdata.NamaPencaker+" akan diaktifkan!",
                        type: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aktifkan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.post('<?= site_url('admin/pencaker/aktivasi') ?>',
                            {
                                IDPencaker: IDPencaker
                            },
                        }
                    })
                        }
                        else
                        {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Pencaker Tidak Ditemukan!'
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