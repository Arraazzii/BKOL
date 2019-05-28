<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pendaftaran
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Register</a></li>
    <li class="active">Pencaker</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div align="center">
    <?php
    if ($this->session->flashdata('error') != null){
      echo $this->session->flashdata('error');
    }
    $input = $this->session->flashdata('input');
    if ($input != NULL)
    {
      $MsKelurahanData = $input['MsKelurahanData'];
    }
    ?>
  </div>
  <form action="<?= site_url('pencaker/doregister')?>" method="POST" class="form-horizontal" role="form">
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="username" class="control-label col-md-3">Nama pengguna</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="username" name="username" type="text" value="<?= $input != null ? $input['username'] : ''; ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="control-label col-md-3">Password</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="password" name="password" type="password" value="<?= $input != null ? $input['password'] : ''; ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="password2" class="control-label col-md-3">Konfirmasi kata sandi</label>
          <div class="col-md-5">
            <input class="form-control input-sm" required id="password2" name="password2" type="password" value="<?= $input != null ? $input['password2'] : ''; ?>" size="20">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pencari Kerja</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="nomorindukpencaker" class="control-label col-md-3">Nomor KTP</label>
          <div class="col-md-5">
            <input id="nomorindukpencaker" class="form-control input-sm" required name="nomorindukpencaker" type="text" value="<?= $input != null ? $input['nomorindukpencaker'] : ''; ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="namapencaker" class="control-label col-md-3">Nama Pencari Kerja</label>
          <div class="col-md-5">
            <input id="namapencaker" name="namapencaker" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['namapencaker'] : ''; ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="jeniskelamin" class="control-label col-md-3">Nama Pencari Kerja</label>
          <div class="col-md-5">
            <label class="radio-inline"><input name="jeniskelamin" required value="0" type="radio" <?= $input['jeniskelamin'] == 0 ? 'checked="checked"' : ''; ?>>Pria</label>
            <label class="radio-inline"><input name="jeniskelamin" required value="1" type="radio" <?= $input['jeniskelamin'] == 1 ? 'checked="checked"' : ''; ?>>Wanita</label>
          </div>
        </div>
        <div class="form-group">
          <label for="tempatlahir" class="control-label col-md-3">Tempat Lahir</label>
          <div class="col-md-5">
            <input id="tempatlahir" class="form-control input-sm" required name="tempatlahir" type="text" value="<?= $input != null ? $input['tempatlahir'] : '' ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="tgllahir" class="control-label col-md-3">Tanggal Lahir</label>
          <div class="col-md-2">
            <input id="tgllahir" name="tgllahir" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['tgllahir'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" readonly size="10" maxlength="10">
          </div>
        </div>
        <div class="form-group">
          <label for="tgllahir" class="control-label col-md-3">Email</label>
          <div class="col-md-5">
            <input id="email" name="email" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">
          </div>
        </div>
        <div class="form-group">
          <label for="telepon" class="control-label col-md-3">Telepon</label>
          <div class="col-md-5">
            <input id="telepon" name="telepon" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">
          </div>
        </div>
        <div class="form-group">
          <label for="alamant" class="control-label col-md-3">Alamat</label>
          <div class="col-md-5">
            <textarea id="alamat" name="alamat" class="form-control input-sm" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="kecamatan" class="control-label col-md-3">Kecamatan</label>
          <div class="col-md-5">
            <select id="idkecamatan" class="form-control input-sm" required name="idkecamatan" onchange="GetKelurahan(this)">
              <option value="">(Pilih Kecamatan)</option>
              <?php
              foreach ($MsKecamatanData as $getcmb)
              {
                if ($input['idkecamatan'] == $getcmb->IDKecamatan)
                {
                  echo "<option value='".$getcmb->IDKecamatan."' selected=\"selected\">".$getcmb->NamaKecamatan."</option>";
                }
                else
                {
                  echo "<option value='".$getcmb->IDKecamatan."'>".$getcmb->NamaKecamatan."</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="kelurahan" class="control-label col-md-3">Kelurahan</label>
          <div class="col-md-5">
            <select id="idkelurahan" class="form-control input-sm" required name="idkelurahan">
              <option value="">(Pilih Kelurahan)</option>
              <?php
              foreach ($MsKelurahanData as $getcmb)
              {
                if ($input['idkelurahan'] == $getcmb->IDKelurahan)
                {
                  echo "<option value='".$getcmb->IDKelurahan."' selected=\"selected\">".$getcmb->NamaKelurahan."</option>";
                }
                else
                {
                  echo "<option value='".$getcmb->IDKelurahan."'>".$getcmb->NamaKelurahan."</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="kodepos" class="control-label col-md-3">Kode pos</label>
          <div class="col-md-4">
            <input id="kodepos" name="kodepos" class="form-control input-sm" required type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
          </div>
        </div>
        <div class="form-group">
          <label for="kewarganegaraan" class="control-label col-md-3">Kewarganegaraan</label>
          <div class="col-md-5">
            <label class="radio-inline"><input name="kewarganegaraan" required value="0" type="radio" <?= $input['kewarganegaraan'] == 0 ? 'checked="checked"' : '' ?>>WNI</label>
            <label class="radio-inline"><input name="kewarganegaraan" required value="1" type="radio" <?= $input['kewarganegaraan'] == 1 ? 'checked="checked"' : '' ?>>WNA</label>
          </div>
        </div>
        <div class="form-group">
          <label for="agama" class="control-label col-md-3">Agama</label>
          <div class="col-md-5">
            <select id="idagama" class="form-control input-sm" required name="idagama">
              <option value="">(Pilih Agama)</option>
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
          </div>
        </div>
        <div class="form-group">
          <label for="idstatuspernikahan" class="control-label col-md-3">Status Pernikahan</label>
          <div class="col-md-5">
            <select id="idstatuspernikahan" class="form-control input-sm" required name="idstatuspernikahan">
              <option value="">(Pilih Status)</option>
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
          </div>
        </div>
        <div class="form-group">
          <label for="photo" class="control-label col-md-3">Foto</label>
          <div class="col-md-5">
            <input id="photo" name="photo" value="" type="file" size="20">
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
          </div>
        </div>
      </div>
    </div>
    <div class="box box-default box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Data Pendidikan</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
          <label for="idstatuspendidikan" class="control-label col-md-3">Pendidikan Terakhir</label>
          <div class="col-md-4">
            <select id="idstatuspendidikan" class="form-control input-sm" required name="idstatuspendidikan">
              <option value="">(Pilih Status Pendidikan)</option>
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
          <label for="jurusan" class="control-label col-md-3">Jurusan</label>
          <div class="col-md-4">
            <select id="jurusan" class="form-control input-sm" required name="jurusan">
              <option value="">(Pilih Jurusan)</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="keterampilan" class="control-label col-md-3">Keterampilan</label>
          <div class="col-md-5">
            <input id="keterampilan" name="keterampilan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['keterampilan'] : '' ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="nemipk" class="control-label col-md-3">NEM/IPK</label>
          <div class="col-md-5">
            <label for="" class="radio-inline"><input name="nemipk" value="0" type="radio" <?= $input['nemipk'] == 0 ? 'checked="checked"' : '' ?>>NEM</label>
            <label for="" class="radio-inline"><input name="nemipk" value="1" type="radio" <?= $input['nemipk'] == 1 ? 'checked="checked"' : '' ?>>IPK</label>
          </div>
        </div>
        <div class="form-group">
          <label for="nilai" class="control-label col-md-3">Nilai</label>
          <div class="col-md-2">
            <input id="nilai" name="nilai" class="form-control input-sm" type="text" value="<?= $input != null ? $input['nilai'] : '' ?>" size="20">
          </div>
        </div>
        <div class="form-group">
          <label for="tahunlulus" class="control-label col-md-3">Tahun lulus</label>
          <div class="col-md-3">
            <select id="tahunlulus" class="form-control input-sm" name="tahunlulus">
              <?php
              $tahun = date('Y');
              for ($i=$tahun;$i>1870;$i--)
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
            </div>
          </div>
          <div class="form-group">
            <label for="tinggibadan" class="control-label col-md-3">Tinggi badan</label>
            <div class="col-md-2">
              <div class="input-group">
                <input id="tinggibadan" name="tinggibadan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['tinggibadan'] : '0' ?>" size="3" maxlength="3">
                <span class="input-group-addon">cm</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="beratbadan" class="control-label col-md-3">Berat badan</label>
            <div class="col-md-2">
              <div class="input-group">
                <input id="beratbadan" name="beratbadan" class="form-control input-sm" type="text" value="<?= $input != null ? $input['beratbadan'] : '0'; ?>" size="3" maxlength="3">
                <span class="input-group-addon">Kg</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan" class="control-label col-md-3">Keterangan</label>
            <div class="col-md-5">
              <textarea id="keterangan" name="keterangan" class="form-control input-sm" cols="30" rows="3" maxlength="100"><?= $input != null ? $input['keterangan'] : '' ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-default box-solid">
        <div class="box-header">
          <h3 class="box-title">Jabatan yang diinginkan</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label for="posisijabatan" class="control-label col-md-3">Posisi / Jabatan</label>
            <div class="col-md-4">
              <select id="idposisijabatan" class="form-control input-sm" name="idposisijabatan">
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
              <label class="radio-inline"><input name="lokasi" value="0" type="radio" <?= $input['lokasi'] == 0 ? 'checked="checked"' : '' ?>>Dalam Negeri</label>
              <label class="radio-inline"><input name="lokasi" value="1" type="radio" <?= $input['lokasi'] == 1 ? 'checked="checked"' : '' ?>>Luar Negeri</label>
              <label class="radio-inline"><input name="lokasi" value="2" type="radio" <?= $input['lokasi'] == 2 ? 'checked="checked"' : '' ?>>Dimana Saja</label>
            </div>
          </div>
          <div class="form-group">
            <label for="upahyangdicari" class="control-label col-md-3">Upah yang diinginkan</label>
            <div class="col-md-4">
              <input id="upahyangdicari" class="form-control input-sm" name="upahyangdicari" type="text" value="<?= $input != null ? $input['upahyangdicari'] : '0' ?>" size="20">
            </div>
          </div>
        </div>
      </div>
      <div class="box box-default box-solid">
        <div class="box-header">
          <h3 class="box-title">Pengalaman kerja</h3>
        </div>
        <div class="box-body" id="tambah_pengalaman">
          <div class="row clan">
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-addon">Jabatan</span>
                <input id="jabatan1" name="jabatan1" class="form-control input-sm" type="text" value="" size="14">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-addon">Perusahaan</span>
                <input id="perusahaan1" class="form-control input-sm" name="perusahaan1" type="text" value="" size="14">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-addon">Tanggal masuk</span>
                <input id="tglmasuk1" class="form-control input-sm input-date" readonly name="tglmasuk1" type="text" value="<?= $input != null ? $input['tglmasuk1'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <span class="input-group-addon">Tanggal keluar</span>
                <input id="tglkeluar1" class="form-control input-sm input-date" readonly name="tglkeluar1" type="text" value="<?= $input != null ? $input['tglmasuk1'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10">
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="row" id="">
            <div class="col-md-12">
              <div class="text-center" style="margin-top: 20px;">
                <input type="hidden" name="jumlah_view" id="jumlah_view" class="form-control" value="1">
                <button type="button" onclick="tambah_member()" class="btn btn-default btn-sm">Tambah pengalaman</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-default box-solid">
        <div class="box-body">
          <div class="text-center">
            <input type="hidden" name="submit" value="submit">
            <a href="<?= site_url() ?>" class="btn btn-default btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </section>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
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
      $('#idstatuspendidikan').change(function() {
        $.get('<?php echo base_url('root/getjurusan'); ?>/'+this.value, function(res){
          var obj = JSON.parse(res);
          var cmb = '<option value="">(Pilih Jurusan)</option>';
          for (var key in obj) {
            cmb += '<option value="'+obj[key].IDJurusan+'">'+obj[key].Jurusan+'</option>';
          }
          $('#jurusan').html(cmb);
        });
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

    function reinitialize()
    {
      $('.input-date').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
      });
    }

    function GetKelurahan(el)
    {
      $.get('<?php echo base_url('GetKelurahan'); ?>/'+el.value, function(res){
        $('#idkelurahan').html(res);
      });
    }

    function getFormattedDate() {
      date = new Date();
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear().toString();
      return day + '-' + month + '-' + year;
    }

    function tambah_member()
    {
      var tampung = "";
      var id ="";
      var tampung = '';
      var row = document.getElementById('tambah_pengalaman').getElementsByClassName("clan").length;
      var nomer = row + 1;
      if(nomer<6){
        tampung = '<div class="row clan">' +
        '<div class="col-md-3">' +
        '<div class="input-group">' +
        '<span class="input-group-addon">Jabatan</span>' +
        '<input id="jabatan' + nomer + '" name="jabatan' + nomer + '" class="form-control input-sm" type="text" value="" size="14">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="input-group">' +
        '<span class="input-group-addon">Perusahaan</span>' +
        '<input id="perusahaan' + nomer + '" class="form-control input-sm" name="perusahaan' + nomer + '" type="text" value="" size="14">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="input-group">' +
        '<span class="input-group-addon">Tanggal masuk</span>' +
        '<input id="tglmasuk' + nomer + '" class="form-control input-date input-sm" readonly name="tglmasuk' + nomer + '" type="text" value="<?= $input != null ? $input['tglmasuk1'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10">' +
        '</div>' +
        '</div>' +
        '<div class="col-md-3">' +
        '<div class="input-group">' +
        '<span class="input-group-addon">Tanggal keluar</span>' +
        '<input id="tglkeluar' + nomer + '" class="form-control input-date input-sm" readonly name="tglkeluar' + nomer + '" type="text" value="<?= $input != null ? $input['tglmasuk1'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10">' +
        '</div>' +
        '</div>' +
        '</div>';
        $("#tambah_pengalaman").append(tampung);
    //tambah_tanggal(nomer);
    $("#jumlah_view").val(nomer);
    reinitialize();
  }else{
    alert("Maxsimal Pengalaman kerja adalah 5!");
  }
}
</script>
<!-- /.content -->
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