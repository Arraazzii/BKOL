<!--Content Header (Page header) -->


<!-- <section class="content-header">
  <h1>
    Pendaftaran
    <small>Pencari Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Pencaker</li>
  </ol>
</section> -->

<!-- Main content -->
<style type="text/css">
  .box-title{
    color: #fff;
  }
</style>
<section class="content container">
  <form action="<?= site_url('register/2')?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Perhatian !!</strong> Untuk mencetak kartu kuning, pendaftar harus mendatangi pelayanan disnaker depok dengan membawa <a href="<?php echo site_url('persyaratan/2') ?>">persyaratan pencaker</a> ...
    </div>
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo form_error('username') ? 'has-error' : '' ?>">
          <label for="username" class="control-label col-md-3">*Nama pengguna</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="username" name="username" type="text" value="<?= isset($input['username']) ? $input['username'] : '' ?>" size="20" required="" autofocus>
            <?php echo form_error('username', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
          <label for="password" class="control-label col-md-3">*Kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="password" name="password" type="password" value="<?= isset($input) ? $input['password'] : ''; ?>" size="20" required="">
            <?php echo form_error('password', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('password2') ? 'has-error' : '' ?>">
          <label for="password2" class="control-label col-md-3">*Konfirmasi kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" id="password2" name="password2" type="password" value="<?= isset($input) ? $input['password2'] : ''; ?>" size="20" required="">
            <?php echo form_error('password2', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pencari Kerja</h3>
      </div>
      <div class="box-body">
        <div class="form-group <?php echo form_error('nomorindukpencaker') ? 'has-error' : '' ?>">
          <label for="nomorindukpencaker" class="control-label col-md-3">*Nomor KTP</label>
          <div class="col-md-5">
            <input id="nomorindukpencaker" class="form-control input-sm" name="nomorindukpencaker" type="text" value="<?= isset($input) ? $input['nomorindukpencaker'] : ''; ?>" size="20" maxlength="20" required="">
            <?php echo form_error('nomorindukpencaker', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('namapencaker') ? 'has-error' : '' ?>">
          <label for="namapencaker" class="control-label col-md-3">*Nama Pencari Kerja</label>
          <div class="col-md-5">
            <input id="namapencaker" name="namapencaker" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['namapencaker'] : ''; ?>" size="20" maxlength="20" required="">
            <?php echo form_error('namapencaker', '<span class="help-block">', '</span>'); ?>
          </div>
        </div>
        <div class="form-group <?php echo form_error('jeniskelamin') ? 'has-error' : '' ?>">
          <label for="jeniskelamin" class="control-label col-md-3">*Jenis Kelamin</label>
          <div class="col-md-5">
            <label class="radio-inline"><input name="jeniskelamin" value="0" type="radio" 
              <?php  
              if (isset($input['jeniskelamin'])) {
                if($input['jeniskelamin'] == 0)
                  echo 'checked="checked"';
              }
              ?>
              >Pria</label>
              <label class="radio-inline"><input name="jeniskelamin" value="1" type="radio"
                <?php  
                if (isset($input['jeniskelamin'])) {
                  if($input['jeniskelamin'] == 1)
                    echo 'checked="checked"';
                }
                ?>
                >Wanita</label>
                <p><?php echo form_error('jeniskelamin', '<span class="help-block">', '</span>'); ?></p>
              </div>
            </div>
            <div class="form-group <?php echo form_error('tempatlahir') ? 'has-error' : '' ?>">
              <label for="tempatlahir" class="control-label col-md-3">*Tempat Lahir</label>
              <div class="col-md-5">
                <input id="tempatlahir" class="form-control input-sm" name="tempatlahir" type="text" value="<?= isset($input) ? $input['tempatlahir'] : '' ?>" size="20" maxlength="20" required="">
                <?php echo form_error('tempatlahir', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('tgllahir') ? 'has-error' : '' ?>">
              <label for="tgllahir" class="control-label col-md-3">*Tanggal Lahir</label>
              <div class="col-md-2">
                <input id="tgllahir" name="tgllahir" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['tgllahir'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" readonly size="10" maxlength="10" required="">
                <?php echo form_error('tgllahir', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
              <label for="tgllahir" class="control-label col-md-3">*Email</label>
              <div class="col-md-5">
                <input id="email" name="email" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['email'] : '' ?>" size="20" maxlength="100" required="">
                <?php echo form_error('email', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('telepon') ? 'has-error' : '' ?>">
              <label for="telepon" class="control-label col-md-3">*Telepon</label>
              <div class="col-md-5">
                <input id="telepon" name="telepon" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['telepon'] : '' ?>" size="20" maxlength="20" required="">
                <?php echo form_error('telepon', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('idkecamatan') ? 'has-error' : '' ?>">
              <label for="idkecamatan" class="control-label col-md-3">*Kecamatan</label>
              <div class="col-md-5">
                <?php
                $active = isset($input['idkecamatan']) ? $input['idkecamatan'] : 0;
                echo combo_kecamatan($active); 
                ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('idkelurahan') ? 'has-error' : '' ?>">
              <label for="kelurahan" class="control-label col-md-3">*Kelurahan</label>
              <div class="col-md-5">
                <select id="idkelurahan" class="form-control input-sm" name="idkelurahan" required="">
                  <option value="">- Pilih Kelurahan -</option>
                </select>
                <?php echo form_error('idkelurahan', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
              <label for="alamant" class="control-label col-md-3">*Alamat</label>
              <div class="col-md-5">
                <textarea id="alamat" name="alamat" class="form-control input-sm" cols="30" rows="3" maxlength="400" required=""><?= isset($input) ? $input['alamat'] : '' ?></textarea>
                <?php echo form_error('alamat', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('kodepos') ? 'has-error' : '' ?>">
              <label for="kodepos" class="control-label col-md-3">Kode pos</label>
              <div class="col-md-4">
                <input id="kodepos" name="kodepos" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
                <?php echo form_error('kodepos', '<span class="help-block">', '</span>'); ?>
              </div>
            </div>
            <div class="form-group <?php echo form_error('kewarganegaraan') ? 'has-error' : '' ?>">
              <label for="kewarganegaraan" class="control-label col-md-3">Kewarganegaraan</label>
              <div class="col-md-5">
                <label class="radio-inline"><input name="kewarganegaraan" value="0" type="radio" 
                  <?php  
                  if (isset($input['kewarganegaraan'])) {
                    if($input['kewarganegaraan'] == 0)
                      echo 'checked="checked"';
                  }
                  ?>
                  >WNI</label>
                  <label class="radio-inline"><input name="kewarganegaraan" value="1" type="radio" 
                    <?php  
                    if (isset($input['kewarganegaraan'])) {
                      if($input['kewarganegaraan'] == 1)
                        echo 'checked="checked"';
                    }
                    ?>
                    >WNA</label>
                    <p><?php echo form_error('kewarganegaraan', '<span class="help-block">', '</span>'); ?></p>
                  </div>
                </div>
                <div class="form-group <?php echo form_error('idagama') ? 'has-error' : '' ?>">
                  <label for="agama" class="control-label col-md-3">*Agama</label>
                  <div class="col-md-5">
                    <select id="idagama" class="form-control input-sm" name="idagama" required="">
                      <option value="">- Pilih Agama -</option>
                      <?php
                      foreach ($MsAgamaData as $getcmb)
                      {
                        if ($input['idagama'] == $getcmb->IDAgama)
                        {
                          echo "<option value='".$getcmb->IDAgama."' selected=\"selected\">".$getcmb->NamaAgama."</option>";
                        }
                        else
                        {
                          echo "<option value='".$getcmb->IDAgama."'>".$getcmb->NamaAgama."</option>";
                        }
                      }
                      ?>
                    </select>
                    <?php echo form_error('idagama', '<span class="help-block">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group <?php echo form_error('idstatuspernikahan') ? 'has-error' : '' ?>">
                  <label for="idstatuspernikahan" class="control-label col-md-3">*Status Pernikahan</label>
                  <div class="col-md-5">
                    <select id="idstatuspernikahan" class="form-control input-sm" name="idstatuspernikahan" required="">
                      <option value="">- Pilih Status -</option>
                      <?php
                      foreach ($MsStatusPernikahanData as $getcmb)
                      {
                        if ($input['idstatuspernikahan'] == $getcmb->IDStatusPernikahan)
                        {
                          echo "<option value='".$getcmb->IDStatusPernikahan."' selected=\"selected\">".$getcmb->NamaStatusPernikahan."</option>";
                        }
                        else
                        {
                          echo "<option value='".$getcmb->IDStatusPernikahan."'>".$getcmb->NamaStatusPernikahan."</option>";
                        }
                      }
                      ?>
                    </select>
                    <?php echo form_error('idstatuspernikahan', '<span class="help-block">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group <?php echo form_error('photo') ? 'has-error' : '' ?>">
                  <label for="photo" class="control-label col-md-3">Foto</label>
                  <div class="col-md-5">
                    <input id="photo" name="photo" value="" type="file" size="20">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <?php echo form_error('photo', '<span class="help-block">', '</span>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="box box-primary box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pendidikan</h3>
              </div>
              <div class="box-body" id="datapendidikan">
                <div class="form-group">
                  <label for="idstatuspendidikan" class="control-label col-md-3">*Pendidikan Terakhir</label>
                  <div class="col-md-4">
                    <select id="idstatuspendidikan" class="form-control input-sm" name="idstatuspendidikan" required="">
                      <option value="">- Pilih Status Pendidikan -</option>
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
                  </div>
                </div>
                <div class="form-group">
                  <label for="jurusan" class="control-label col-md-3">*Jurusan</label>
                  <div class="col-md-4">
                    <select id="jurusan" class="form-control input-sm" name="jurusan" required="">
                      <option value="">- Pilih Jurusan -</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterampilan" class="control-label col-md-3">Keterampilan</label>
                  <div class="col-md-5">
                    <input id="keterampilan" name="keterampilan" class="form-control input-sm" type="text"  size="20">
                  </div>
                </div>
                <div class="form-group">
                  <label for="nemipk" class="control-label col-md-3">NEM/IPK</label>
                  <div class="col-md-5">
                    <label for="" class="radio-inline"><input name="nemipk" value="0" type="radio"
                      <?php  
                      if (isset($input['nemipk'])) {
                        if($input['nemipk'] == 0)
                          echo 'checked="checked"';
                      }
                      ?>
                      >NEM</label>
                      <label for="" class="radio-inline"><input name="nemipk" value="1" type="radio" 
                        <?php  
                        if (isset($input['nemipk'])) {
                          if($input['nemipk'] == 1)
                            echo 'checked="checked"';
                        }
                        ?>
                        >IPK</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nilai" class="control-label col-md-3">Nilai</label>
                      <div class="col-md-2">
                        <input id="nilai" name="nilai" class="form-control input-sm" type="text" size="20">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tahunlulus" class="control-label col-md-3">Tahun lulus</label>
                      <div class="col-md-3">
                        <select id="tahunlulus" class="form-control input-sm" name="tahunlulus">
                          <?php
                          $tahun = date('Y');
                          for ($i=$tahun;$i>1900;$i--)
                          {
                            if ($i == (isset($input) ? $input['tahunlulus'] : ''))
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
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tinggibadan" class="control-label col-md-3">Tinggi badan</label>
                        <div class="col-md-2">
                          <div class="input-group">
                            <input id="tinggibadan" name="tinggibadan" class="form-control input-sm" type="text"  size="3" maxlength="3">
                            <span class="input-group-addon">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="beratbadan" class="control-label col-md-3">Berat badan</label>
                        <div class="col-md-2">
                          <div class="input-group">
                            <input id="beratbadan" name="beratbadan" class="form-control input-sm" type="text" size="3" maxlength="3">
                            <span class="input-group-addon">Kg</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="keterangan" class="control-label col-md-3">Keterangan</label>
                        <div class="col-md-5">
                          <textarea id="keterangan" name="keterangan" class="form-control input-sm" cols="30" rows="3" maxlength="100"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box box-primary box-solid">
                    <div class="box-header">
                      <h3 class="box-title">Jabatan yang diinginkan</h3>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="posisijabatan" class="control-label col-md-3">*Posisi / Jabatan</label>
                        <div class="col-md-4">
                          <select id="idposisijabatan" class="form-control input-sm" name="idposisijabatan" required="">
                            <option value="">(Pilih Jabatan)</option>
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
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lokasi" class="control-label col-md-3">Lokasi</label>
                        <div class="col-md-5">
                          <label class="radio-inline"><input name="lokasi" value="0" type="radio" 
                            <?php  
                            if (isset($input['lokasi'])) {
                              if($input['lokasi'] == 0)
                                echo 'checked="checked"';
                            }
                            ?>
                            >Dalam Negeri</label>
                            <label class="radio-inline"><input name="lokasi" value="1" type="radio" 
                              <?php  
                              if (isset($input['lokasi'])) {
                                if($input['lokasi'] == 1)
                                  echo 'checked="checked"';
                              }
                              ?>
                              >Luar Negeri</label>
                              <label class="radio-inline"><input name="lokasi" value="2" type="radio" 
                                <?php  
                                if (isset($input['lokasi'])) {
                                  if($input['lokasi'] == 2)
                                    echo 'checked="checked"';
                                }
                                ?>
                                >Dimana Saja</label>
                                <p><?php echo form_error('lokasi', '<span class="help-block">', '</span>'); ?></p>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="upahyangdicari" class="control-label col-md-3">Upah yang diinginkan</label>
                              <div class="col-md-4">
                                <input id="upahyangdicari" class="form-control input-sm" name="upahyangdicari" type="text" size="20">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box box-primary box-solid">
                          <div class="box-header">
                            <h3 class="box-title">Pengalaman kerja</h3>
                          </div>
                          <div class="box-body" id="tambah_pengalaman">
                            <div class="row">
                              <div class="col-md-12">
                                <p><i>Note : </i></p>
                                <p><i>Kosongkan jika belum memiliki pengalaman kerja</i></p>
                                <p><i>Ceklist masih kerja jika anda masih bekerja di perusahaan yang anda tulis di pengalaman</i></p>
                              </div>
                            </div>
                            <div class="row clan">
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Jabatan</span>
                                  <input id="jabatan1" name="jabatan1" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['jabatan1'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Perusahaan</span>
                                  <input id="perusahaan1" class="form-control input-sm" name="perusahaan1" type="text" value="<?= isset($input) ? $input['perusahaan1'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal masuk</span>
                                  <input id="tglmasuk1" class="form-control input-sm input-date" readonly name="tglmasuk1" type="text" value="<?= isset($input) ? $input['tglmasuk1'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 2000)) ?>" size="10" maxlength="10">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal keluar</span>
                                  <input id="tglkeluar1" class="form-control input-sm input-date" readonly name="tglkeluar1" type="text" value="<?= isset($input) ? $input['tglkeluar1'] : date('d-m-Y') ?>" size="10" maxlength="10">
                                  <input type="text" disabled id="plc_1" placeholder="Masih Bekerja" class="form-control input-sm">
                                </div>
                                <div class="checkbox" id="divkerja_1">
                                  <label>
                                    <input type="checkbox" name="kerja_1" id="kerja_1" value="1">
                                    Masih Bekerja
                                  </label>
                                </div>
                                <br>
                              </div>
                            </div>
                            <div class="row clan">
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Jabatan</span>
                                  <input id="jabatan2" name="jabatan2" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['jabatan2'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Perusahaan</span>
                                  <input id="perusahaan2" class="form-control input-sm" name="perusahaan2" type="text" value="<?= isset($input) ? $input['perusahaan2'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal masuk</span>
                                  <input id="tglmasuk2" class="form-control input-sm input-date" readonly name="tglmasuk2" type="text" value="<?= isset($input) ? $input['tglmasuk2'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 2000)) ?>" size="10" maxlength="10">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal keluar</span>
                                  <input id="tglkeluar2" class="form-control input-sm input-date" readonly name="tglkeluar2" type="text" value="<?= isset($input) ? $input['tglkeluar2'] : date('d-m-Y') ?>" size="10" maxlength="10">
                                  <input type="text" disabled id="plc_2" placeholder="Masih Bekerja" class="form-control input-sm">
                                </div>
                                <div class="checkbox" id="divkerja_2">
                                  <label>
                                    <input type="checkbox" name="kerja_2" id="kerja_2" value="1">
                                    Masih Bekerja
                                  </label>
                                </div>
                                <br>
                              </div>
                            </div>
                            <div class="row clan">
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Jabatan</span>
                                  <input id="jabatan3" name="jabatan3" class="form-control input-sm" type="text" value="<?= isset($input) ? $input['jabatan3'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Perusahaan</span>
                                  <input id="perusahaan3" class="form-control input-sm" name="perusahaan3" type="text" value="<?= isset($input) ? $input['perusahaan3'] : '' ?>" size="14">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal masuk</span>
                                  <input id="tglmasuk3" class="form-control input-sm input-date" readonly name="tglmasuk3" type="text" value="<?= isset($input) ? $input['tglmasuk3'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 2000)) ?>" size="10" maxlength="10">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">Tanggal keluar</span>
                                  <input id="tglkeluar3" class="form-control input-sm input-date" readonly name="tglkeluar3" type="text" value="<?= isset($input) ? $input['tglkeluar3'] : date('d-m-Y') ?>" size="10" maxlength="10">
                                  <input type="text" disabled id="plc_3" placeholder="Masih Bekerja" class="form-control input-sm">
                                </div>
                                <div class="checkbox" id="divkerja_3">
                                  <label>
                                    <input type="checkbox" name="kerja_3" id="kerja_3" value="1">
                                    Masih Bekerja
                                  </label>
                                </div>
                                <br>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="box box-primary box-solid">
                          <div class="box-body">
                            <div class="text-center">
                              <input type="hidden" name="submit" value="submit">
                              <a href="<?= site_url() ?>" class="btn btn-default btn-sm">Batal</a>
                              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </section>
                    <script type="text/javascript">
                      $("#kerja_1").change(function() {
                        if(this.checked) {
                          $("#plc_1").show();
                          $("#tglkeluar1").hide();
                          $("#tglkeluar1").val('<?php echo date('d-m-Y') ?>');
                          $("#divkerja_2").hide();
                          $("#divkerja_3").hide();
                        }
                        else {
                          $("#plc_1").hide();
                          $("#tglkeluar1").show();
                          $("#divkerja_2").show();
                          $("#divkerja_3").show();
                        }
                      });
                      $("#kerja_2").change(function() {
                        if(this.checked) {
                          $("#plc_2").show();
                          $("#tglkeluar2").hide();
                          $("#tglkeluar2").val('<?php echo date('d-m-Y') ?>');
                          $("#divkerja_1").hide();
                          $("#divkerja_3").hide();
                        }
                        else {
                          $("#plc_2").hide();
                          $("#tglkeluar2").show();
                          $("#divkerja_1").show();
                          $("#divkerja_3").show();
                        }
                      });
                      $("#kerja_3").change(function() {
                        if(this.checked) {
                          $("#plc_3").show();
                          $("#tglkeluar3").hide();
                          $("#tglkeluar3").val('<?php echo date('d-m-Y') ?>');
                          $("#divkerja_1").hide();
                          $("#divkerja_2").hide();
                        }
                        else {
                          $("#plc_3").hide();
                          $("#tglkeluar3").show();
                          $("#divkerja_1").show();
                          $("#divkerja_2").show();
                        }
                      });
                      document.addEventListener('DOMContentLoaded', function() {
                        $("#plc_1").hide();
                        $("#plc_2").hide();
                        $("#plc_3").hide();
                        
                        $("#username").keypress(function (e){
                          if (e.which==32)
                          {
                            return false;
                          }
                        });

                        $("#nomorindukpencaker").keypress(function (e){
                          return NumericHandleKey(e);
                        });

                        $("#nilai").keypress(function (e){
                          if(e.which!=8 && e.which!=0 && e.which!=46 && (e.which<48 || e.which>57) || e.which==32)
                          {
                            return false;
                          }
                        });

                        $("#kodepos").keypress(function (e){
                          return NumericHandleKey(e);
                        });

                        $("#tahunlulus").keypress(function (e){
                          return NumericHandleKey(e);
                        });

                        $("#tinggibadan").keypress(function (e){
                          return NumericHandleKey(e);
                        });

                        $("#beratbadan").keypress(function (e){
                          return NumericHandleKey(e);
                        });
                        
                        $('#tgllahir').datepicker({
                          format: "dd-mm-yyyy",
                          autoclose: true
                        });
                        $('.input-date').datepicker({
                          format: "dd-mm-yyyy",
                          autoclose: true
                        });
                      });

                      function NumericHandleKey(e)
                      {
                        if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
                        {
                          return false;
                        }
                      }

                      $("#idstatuspendidikan").change(function() {
                        var id = $("#idstatuspendidikan").val();
                        GetJurusan(id);
                      });

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
                      <?php  
                      if (isset($input['idstatuspendidikan'])) {
                        $activejur = isset($input['jurusan']) ? $input['jurusan'] : '';
                        echo "GetJurusan('".$input['idstatuspendidikan']."', '".$activejur."');";
                      }
                      ?>

                      $("#idkecamatan").change(function() {
                        var IDKecamatan = $("#idkecamatan").val();
                        GetKelurahan(IDKecamatan);
                      });


                      function GetKelurahan(IDKecamatan, selected = 0)
                      {
                        $.ajax({
                          url: '<?php echo site_url('ajax/get_kelurahan') ?>',
                          type: 'POST',
                          dataType: 'html',
                          data: {
                            IDKecamatan: IDKecamatan,
                            selected: selected
                          },
                          success: function(data) {
                            $("#idkelurahan").html(data);
                          }
                        });
                      }
                      <?php  
                      if (isset($input['idkecamatan'])) {
                        $activekec = isset($input['idkecamatan']) ? $input['idkecamatan'] : '';
                        echo "GetKelurahan('".$input['idkecamatan']."', '".$activekec."');";
                      }
                      ?>

                      function getFormattedDate() {
                        date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear().toString();
                        return day + '-' + month + '-' + year;
                      }

                    </script>
<!-- /.content