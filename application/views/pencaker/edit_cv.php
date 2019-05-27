<?php
if (!$this->input->post()) 
{
    $input['idstatuspendidikan'] = $MsPencakerData->IDStatusPendidikan;
    $input['idjurusan'] = $MsPencakerData->Jurusan;
    $input['keterampilan'] = $MsPencakerData->Keterampilan;
    $input['nemipk'] = $MsPencakerData->NEMIPK;
    $input['nilai'] = $MsPencakerData->Nilai;
    $input['tahunlulus'] = $MsPencakerData->TahunLulus;
    $input['tinggibadan'] = $MsPencakerData->TinggiBadan;
    $input['beratbadan'] = $MsPencakerData->BeratBadan;
    $input['keterangan'] = $MsPencakerData->Keterangan;
    $input['idposisijabatan'] = $MsPencakerData->IDPosisiJabatan;
    $input['lokasi'] = $MsPencakerData->Lokasi;
    $input['upahyangdicari'] = $MsPencakerData->UpahYangDicari;
}
?>

<!-- Content Header (Page header) -->
<section class="content-header container">
    <h1>
        Profil
        <small>Pencaker</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('') ?>">Home</a></li>
        <li>Pencaker</li>
        <li class="active">Edit CV</li>
    </ol>
</section>
<!-- Main content -->
<section class="content container">
    <form action="<?php echo site_url('pencaker/editcv') ?>" method="POST" class="form-horizontal" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Pendidikan Formal</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group <?php echo form_error('idstatuspendidikan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Pendidikan Terakhir</label>
                            <div class="col-md-7">
                                <select id="idstatuspendidikan" name="idstatuspendidikan" class="form-control">
                                    <option value=""> Pilih Status Pendidikan</option>
                                    <?php
                                    foreach ($MsStatusPendidikanData as $getcmb)
                                    {
                                        if ($input['idstatuspendidikan'] == $getcmb->IDStatusPendidikan)
                                        {
                                            echo "<option value='".$getcmb->IDStatusPendidikan."' selected=\"selected\">".$getcmb->NamaStatusPendidikan."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$getcmb->IDStatusPendidikan."'>".$getcmb->NamaStatusPendidikan."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('idstatuspendidikan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('jurusan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Jurusan</label>
                            <div class="col-md-7">
                                <select id="jurusan" name="jurusan" class="form-control">
                                    <option value=""> Pilih Jurusan</option>
                                </select>
                                <?php echo form_error('jurusan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('keterampilan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Keterampilan</label>
                            <div class="col-md-7">
                                <input id="keterampilan" name="keterampilan" type="text" value="<?= $input != null ? $input['keterampilan'] : '' ?>" class="form-control">
                                <?php echo form_error('keterampilan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('nemipk') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">NEM / IPK</label>
                            <div class="col-md-7">
                                <label class="control-label">
                                  <input name="nemipk" value="0" class="minimal" type="radio" <?= $input['nemipk'] == 0 ? 'checked="checked"' : '' ?>>&nbsp;NEM
                                  &nbsp;&nbsp;
                              </label>
                              <label class="control-label">
                                  <input name="nemipk" value="1" class="minimal" type="radio" <?= $input['nemipk'] == 1 ? 'checked="checked"' : '' ?>>&nbsp;IPK
                              </label>
                              <?php echo form_error('nemipk', '<span class="help-block">', '</span>') ?>
                          </div>
                      </div>
                      <div class="form-group <?php echo form_error('nilai') ? 'has-error' : '' ?>">
                        <label class="col-md-4 control-label">Nilai</label>
                        <div class="col-md-7">
                            <input id="nilai" name="nilai" type="text" value="<?= $input != null ? $input['nilai'] : '' ?>" class="form-control">
                            <?php echo form_error('nilai', '<span class="help-block">', '</span>') ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('tahunlulus') ? 'has-error' : '' ?>">
                        <label class="col-md-4 control-label">Tahun Lulus</label>
                        <div class="col-md-4">
                            <select id="tahunlulus" name="tahunlulus" class="form-control">
                                <?php
                                $tahun = date('Y');
                                for ($i=$tahun;$i>1900;$i--)
                                {
                                    if ($i == ($input != null ? $input['tahunlulus'] : ''))
                                        {
                                            echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('tahunlulus', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('tinggibadan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Tinggi Badan</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="tinggibadan" name="tinggibadan" type="text" value="<?= $input != null ? $input['tinggibadan'] : '' ?>" size="3" maxlength="3" class="form-control"> 
                                    <span class="input-group-addon">CM</span>
                                </div>
                                <?php echo form_error('tinggibadan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('beratbadan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Berat Badan</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input id="beratbadan" name="beratbadan" type="text" value="<?= $input != null ? $input['beratbadan'] : '' ?>" size="3" maxlength="3" class="form-control" size="2">
                                    <span class="input-group-addon">KG</span>
                                </div>
                                <?php echo form_error('beratbadan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-7">
                                <textarea class="form-control" id="keterangan" name="keterangan" cols="30" rows="3" maxlength="100"><?= $input != null ? $input['keterangan'] : '' ?></textarea>
                                <?php echo form_error('keterangan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Jabatan yang diinginkan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group <?php echo form_error('idposisijabatan') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Posisi Jabatan</label>
                            <div class="col-md-7">
                                <select id="idposisijabatan" name="idposisijabatan" class="form-control">
                                    <option value="">Pilih Jabatan</option>
                                    <?php
                                    foreach ($MsPosisiJabatanData as $getcmb)
                                    {
                                        if ($input['idposisijabatan'] == $getcmb->IDPosisiJabatan)
                                        {
                                            echo "<option value='".$getcmb->IDPosisiJabatan."' selected=\"selected\">".$getcmb->NamaPosisiJabatan."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$getcmb->IDPosisiJabatan."'>".$getcmb->NamaPosisiJabatan."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('idposisijabatan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        <div class="form-group <?php echo form_error('lokasi') ? 'has-error' : '' ?>">
                            <label class="col-md-4 control-label">Lokasi</label>
                            <div class="col-md-7">
                                <label class="control-label">
                                  <input name="lokasi" value="0" class="minimal" type="radio" <?= $input['lokasi'] == 0 ? 'checked="checked"' : '' ?>>&nbsp;&nbsp;Dalam Negeri
                              </label>
                              &nbsp;&nbsp;
                              <label class="control-label">
                               <input name="lokasi" class="minimal" value="1" type="radio" <?= $input['lokasi'] == 1 ? 'checked="checked"' : '' ?>>&nbsp;&nbsp;Luar Negeri
                           </label>
                           <label class="control-label">
                            <input name="lokasi" class="minimal" value="2" type="radio" <?= $input['lokasi'] == 2 ? 'checked="checked"' : '' ?>>&nbsp;&nbsp;Dimana Saja
                        </label>
                        &nbsp;&nbsp;
                        <?php echo form_error('lokasi', '<span class="help-block">', '</span>') ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('upahyangdicari') ? 'has-error' : '' ?>">
                    <label class="col-md-4 control-label">Gaji yang diinginkan</label>
                    <div class="col-md-7">
                       <input id="upahyangdicari" name="upahyangdicari" type="text" value="<?= $input != null ? $input['upahyangdicari'] : '0' ?>" class="form-control">
                       <?php echo form_error('upahyangdicari', '<span class="help-block">', '</span>') ?>
                   </div>
               </div>
           </div>
           <div class="box-footer">
            <div class="col-md-offset-2">
                <button type="button" class="btn btn-default" onclick="window.location.href='<?php echo site_url() ?>'">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>    
            </div>
        </div>
    </div>
</div>
</div>
</form>
</section>


<script type="text/javascript">
    function GetJurusan(IDStatusPendidikan, selected = 0) {
      $.ajax({
        url: '<?php echo site_url('ajax/get_jurusan') ?>',
        type: 'POST',
        dataType: 'html',
        data: {
          IDStatusPendidikan: IDStatusPendidikan,
          selected: selected
      },
      success: function(data) {
        $("#jurusan").html(data);
    }
});
  }

  <?php if (isset($input) && $input['idjurusan'] != ''): ?>
  GetJurusan('<?php echo $input['idstatuspendidikan'] ?>', '<?php echo $input['idjurusan'] ?>');
  <?php endif ?>
</script>