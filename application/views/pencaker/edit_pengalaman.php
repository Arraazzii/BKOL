<div class="modal fade" id="modal-pengalaman">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Pengalaman</h4>
      </div>
      <div class="modal-body">
      <form action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-3 control-label">Nama Perusahaan</label>
            <div class="col-md-9">
              <input type="text" name="namaperusahaan" id="namaperusahaan" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Jabatan</label>
            <div class="col-md-9">
              <input type="text" name="jabatan" id="jabatan" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Uraian Kerja</label>
            <div class="col-md-9">
              <input type="text" name="uraiankerja" id="uraiankerja" class="form-control">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Tanggal Masuk</label>
            <div class="col-md-9">
              <input type="text" name="tglmasuk" id="tglmasuk" class="form-control" readonly="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Tanggal Berhenti</label>
            <div class="col-md-9">
              <input type="text" name="tglberhenti" id="tglberhenti" class="form-control" readonly="">
              <input type="" id="plc" class="form-control" placeholder="Masih Bekerja" disabled name="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Status Pekerjaan</label>
            <div class="col-md-9">
                <label class="radio-inline"><input name="status" id="status_0" value="0" type="radio">Sudah Berhenti</label>
                <label class="radio-inline"><input name="status" id="status_1" value="1" type="radio">Masih Bekerja</label>
            </div>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="modemodal" value="">
        <input type="hidden" id="idpengalaman" value="">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<section class="content-header">
    <h1>
        Profil
        <small>Pencaker</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li>Profil Pencaker</li>
        <li class="active">Detail Pengalaman Kerja</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pengalaman Kerja</h3>
      </div>
      <div class="box-body table-responsive">
        <div class="col-md-12" style="margin-bottom: 10px">
          <button type="button" class="btn btn-default btn-sm" id="btn-tambah">Tambah Pengalaman</button>
          <button type="button" class="btn btn-default btn-sm" onclick="window.location.href='<?php echo base_url() ?>'">Kembali</button>
        </div>

        <div class="col-md-12">
          <table class="table table-bordered">
          <thead>
            <tr>
              <th width="10">No</th>
              <th>Nama Perusahaan</th>
              <th>Jabatan</th>
              <th>Lama Bekerja</th>
              <th width="150" class="text-center">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($MsPengalamanData->num_rows() > 0): ?>
            <?php $i = 0; ?>
            <?php foreach ($MsPengalamanData->result() as $getdata): ?>
              <?php 
              $i++;
                $detailbtn = '<a class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDPengalaman.'\') "><i class="fa fa-edit"></i> Detail</a>';
                $deletebtn = '<a class="btn btn-default btn-sm" onclick="DoDeleteConfirm(\''.$getdata->IDPengalaman.'\') "><i class="fa fa-trash"></i> Hapus</a>';
                $interval = date_diff(date_create($getdata->TglMasuk), date_create($getdata->TglBerhenti));
                $out = $interval->format("Years:%Y,Months:%M,Days:%d");
                $result = array();
                $newOut = explode(',',$out);
                array_walk($newOut,
                function($val,$key) use(&$result){
                    $v=explode(':',$val);
                    $result[$v[0]] = $v[1];
                });
              ?>
              <tr>
                <td><?php echo $i+$this->uri->segment(3) ?></td>
                <td><?php echo $getdata->NamaPerusahaan ?></td>
                <td><?php echo $getdata->Jabatan ?></td>
                <td><?php echo ((int)$result['Years'] > 0 ? (int)$result['Years'].' tahun' : '').((int)$result['Months'] > 0 ? ' '.(int)$result['Months'].' bulan' : ((int)$result['Days'] > 0 ? ' '.(int)$result['Days'].' hari' : ' 0 hari')) ?></td>
                <td class="text-center"><?php echo $detailbtn.$deletebtn ?></td>
              </tr>
            <?php endforeach ?>
            <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">Belum ada data</td>
            </tr>
            <?php endif ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>

</section>
<script>
  $(document).ready(function() {
    $("#tglmasuk").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
});

    $("#tglberhenti").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
  });

    $('#btn-tambah').click(function() {
        $.get('<?= site_url('pencaker/cekpengalaman') ?>',
        function(getdata)
        {
            if (getdata.status)
            {
                clearForm();
                $('#modal-pengalaman').modal('show');
                $('.modal-title').html('Tambah Pengalaman Kerja');
                $('#btn-simpan').html('Simpan');
                $("#modemodal").val('add');
            }
            else
            {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Maksimal hanya 3 pengalaman!'
                })
            }
        },'json')
        
    });

    function DoDeleteConfirm(IDPengalaman)
    {
        $.get('<?= site_url('pencaker/getdatapengalaman') ?>/'+IDPengalaman,
            function(getdata)
            {
                if (getdata.exists)
                {
                    swal({
                        title: 'Hapus Data Pengalaman?',
                        text: "Data Pengalaman akan dihapus!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '<?= site_url('pencaker/dodeletepengalaman') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {IDPengalaman: getdata.IDPengalaman},
                                success: function(getdata2){
                                    if (getdata2.valid)
                                    {
                                        window.location.reload();
                                    }
                                    else
                                    {
                                        notifikasi(getdata2.error, "danger", "fa fa-exclamation");
                                    }
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
                        text: 'Pengalaman Tidak Ditemukan!'
                    })
                }
            },'json')
    }

    function DoEdit(IDPengalaman) {
        clearForm();
        clearerror();
        $('#modal-pengalaman').modal('show');
        $("#modemodal").val('edit');
        $.get('<?= site_url('pencaker/getdatapengalaman') ?>/'+IDPengalaman,
        function(getdata)
        {
            if (getdata.exists)
            {
                var tglmasuk = getdata.TglMasuk.split("-");
                var tglberhenti = getdata.TglBerhenti.split("-");
                $('#idpengalaman').val(getdata.IDPengalaman);
                $("#jabatan").val(getdata.Jabatan);
                $("#uraiankerja").val(getdata.UraianKerja);
                $("#namaperusahaan").val(getdata.NamaPerusahaan);
                $("#tglmasuk").val(tglmasuk[2]+'-'+tglmasuk[1]+'-'+tglmasuk[0]);
                $("#tglberhenti").val(tglberhenti[2]+'-'+tglberhenti[1]+'-'+tglberhenti[0]);
                var status = getdata.StatusPekerjaan;
                if(status == 0){
                    $("#status_0").prop('checked', true);
                    $("#tglberhenti").show();
                    $("#plc").hide();
                } else {
                    $("#status_1").prop('checked', true);
                    $("#tglberhenti").hide();
                    $("#tglberhenti").val('<?php echo date('d-m-Y') ?>');
                    $("#plc").show();
                }
                $('.modal-title').html('Ubah Data Pengalaman');
                $('#btn-simpan').html('Update');
                $('#modal-pengalaman').modal('show');
            }
            else
            {
                notifikasi('Pengalaman tidak ditemukan', 'danger', 'fa fa-exclamation-triagle');
            }
        },'json')
    }

    function clearForm() {
        $('#namaperusahaan').val('');
        $('#jabatan').val('');
        $('#uraiankerja').val('');
        $('#tglmasuk').val('<?php echo date('d-m-Y') ?>');
        $('#tglberhenti').val('<?php echo date('d-m-Y') ?>');
        $('#idpengalaman').val('');
        $('input[name=status]:checked').removeAttr('checked');
        $('#status_0').prop('checked', true);
        $('#plc').hide();
        $("#tglberhenti").show();

    }

    function clearerror() {
        $('#namaperusahaan').parent().removeClass('has-error');
        $('#jabatan').parent().removeClass('has-error');
        $('#uraiankerja').parent().removeClass('has-error');
        $('#tglberhenti').parent().removeClass('has-error');
        $('input[name=status]').parent().removeClass('has-error');
        $('#namaperusahaan').next().text('');
        $('#jabatan').next().text('');
        $('#tglberhenti').next().text('');
        $('#uraiankerja').next().text('');
        $('input[name=status]').next().text('');
    }

    $("#status_1").change(function() {
        if(this.checked) {
            $("#plc").show();
            $("#tglberhenti").val('<?php echo date('d-m-Y') ?>');
            $("#tglberhenti").hide();
        }
    });

    $("#status_0").change(function() {
        if(this.checked) {
            $("#plc").hide();
            $("#tglberhenti").show();
        }
    });
    $('#btn-simpan').click(function() {

        var mode = $("#modemodal").val();

        if (mode == 'add') {
            clearerror();
            $.ajax({
                url: '<?= site_url('pencaker/tambahpengalaman') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    NamaPerusahaan: $("#namaperusahaan").val(),
                    Jabatan: $("#jabatan").val(),
                    UraianKerja: $("#uraiankerja").val(),
                    TglMasuk: $("#tglmasuk").val(),
                    TglBerhenti: $("#tglberhenti").val(),
                    StatusPekerjaan: $("input[name='status']:checked").val()
                },
                success: function(data) {
                    if(data.ket == 0) {
                        notifikasi(data.error, 'danger', 'fa fa-warning');
                        $("#model-pengalaman").modal('hide');
                    } else if (data.ket == 1) {
                        window.location.reload();
                    } else if (data.ket == 2) {
                        notifikasi('Input Pengalaman maksimal hanya 3', 'danger', 'fa fa-warning');
                        $("#model-pengalaman").modal('hide');
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        }
                    }
                }
            });
        }

        if(mode == 'edit') {
            $.ajax({
                url: '<?= site_url('pencaker/updatepengalaman') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    IDPengalaman: $("#idpengalaman").val(),
                    NamaPerusahaan: $("#namaperusahaan").val(),
                    Jabatan: $("#jabatan").val(),
                    UraianKerja: $("#uraiankerja").val(),
                    TglMasuk: $("#tglmasuk").val(),
                    TglBerhenti: $("#tglberhenti").val(),
                    StatusPekerjaan: $("input[name='status']:checked").val()
                },
                success: function(data) {
                    if(data.ket == 0) {
                        notifikasi(data.error, 'danger', 'fa fa-warning');
                        $("#model-pengalaman").modal('hide');
                    }
                    else if (data.ket == 1) {
                        window.location.reload();
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                        }
                    }
                }
            });
        }
    });
</script>