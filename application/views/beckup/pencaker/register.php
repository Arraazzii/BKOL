<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
        $input = $this->session->flashdata('input');
        if ($input != NULL)
        {
                $MsKelurahanData = $input['MsKelurahanData'];
        }
?>
<table width="100%">
        <tr>
                <td align="center">
                        <table width="100%" class="table-form">
                                <tbody>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                REGISTRASI PENCARI KERJA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
                                                        <?php
                                                                if ($this->session->flashdata('error') != null){
                                                                    echo $this->session->flashdata('error');
                                                                }
                                                        ?>
                                                        </div>
                                                        <div align="center">
                                                                <form method="post" action="<?= site_url('pencaker/doregister')?>" enctype="multipart/form-data">
                                                                        <table class="table-form" width="100%">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        DATA PENGGUNA
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Nama Pengguna
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="username" name="username" type="text" value="<?= $input != null ? $input['username'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Kata Sandi
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="password" name="password" type="password" value="<?= $input != null ? $input['password'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Konfirmasi Kata Sandi
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="password2" name="password2" type="password" value="<?= $input != null ? $input['password2'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        DATA PENCARI KERJA
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Nomor Induk Pencaker
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="nomorindukpencaker" name="nomorindukpencaker" type="text" value="<?= $input != null ? $input['nomorindukpencaker'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Nama Pencari Kerja
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="namapencaker" name="namapencaker" type="text" value="<?= $input != null ? $input['namapencaker'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Jenis Kelamin
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input name="jeniskelamin" value="0" type="radio" <?= $input['jeniskelamin'] == 0 ? 'checked="checked"' : '' ?>>Pria
                                                                                                        &nbsp;&nbsp;
                                                                                                        <input name="jeniskelamin" value="1" type="radio" <?= $input['jeniskelamin'] == 1 ? 'checked="checked"' : '' ?>>Wanita
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Tempat Lahir
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="tempatlahir" name="tempatlahir" type="text" value="<?= $input != null ? $input['tempatlahir'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Tanggal Lahir
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="tgllahir" name="tgllahir" type="text" value="<?= $input != null ? $input['tgllahir'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10" readonly="true">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Email
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="email" name="email" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Telepon
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="telepon" name="telepon" type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Alamat
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <textarea id="alamat" name="alamat" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Kecamatan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idkecamatan" name="idkecamatan" onchange="GetKelurahan(this)">
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
                                                                                                        </select>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Desa/Kelurahan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idkelurahan" name="idkelurahan">
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
                                                                                                        </select>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Kode Pos
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="kodepos" name="kodepos" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="5" maxlength="5">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Kewarganegaraan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input name="kewarganegaraan" value="0" type="radio" <?= $input['kewarganegaraan'] == 0 ? 'checked="checked"' : '' ?>>WNI
                                                                                                        &nbsp;&nbsp;
                                                                                                        <input name="kewarganegaraan" value="1" type="radio" <?= $input['kewarganegaraan'] == 1 ? 'checked="checked"' : '' ?>>WNA
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Agama
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idagama" name="idagama">
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
                                                                                                        </select>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Status Pernikahan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idstatuspernikahan" name="idstatuspernikahan">
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
                                                                                                        </select>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        DATA PENDIDIKAN FORMAL
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Pendidikan Terakhir
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idstatuspendidikan" name="idstatuspendidikan">
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
                                                                                                        </select>*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Jurusan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jurusan" name="jurusan" type="text" value="<?= $input != null ? $input['jurusan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Keterampilan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="keterampilan" name="keterampilan" type="text" value="<?= $input != null ? $input['keterampilan'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        NEM/IPK
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input name="nemipk" value="0" type="radio" <?= $input['nemipk'] == 0 ? 'checked="checked"' : '' ?>>NEM
                                                                                                        &nbsp;&nbsp;
                                                                                                        <input name="nemipk" value="1" type="radio" <?= $input['nemipk'] == 1 ? 'checked="checked"' : '' ?>>IPK
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Nilai
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="nilai" name="nilai" type="text" value="<?= $input != null ? $input['nilai'] : '' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Tahun Lulus
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="tahunlulus" name="tahunlulus">
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
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Tinggi Badan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="tinggibadan" name="tinggibadan" type="text" value="<?= $input != null ? $input['tinggibadan'] : '0' ?>" size="3" maxlength="3"> Cm
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Berat Badan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="beratbadan" name="beratbadan" type="text" value="<?= $input != null ? $input['beratbadan'] : '0' ?>" size="3" maxlength="3"> Kg
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Keterangan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <textarea id="keterangan" name="keterangan" cols="30" rows="3" maxlength="100"><?= $input != null ? $input['keterangan'] : '' ?></textarea>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        JABATAN YANG DIINGINKAN
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                        Posisi Jabatan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idposisijabatan" name="idposisijabatan">
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
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Lokasi
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input name="lokasi" value="0" type="radio" <?= $input['lokasi'] == 0 ? 'checked="checked"' : '' ?>>Dalam Negeri
                                                                                                        &nbsp;&nbsp;
                                                                                                        <input name="lokasi" value="1" type="radio" <?= $input['lokasi'] == 1 ? 'checked="checked"' : '' ?>>Luar Negeri
                                                                                                        &nbsp;&nbsp;
                                                                                                        <input name="lokasi" value="2" type="radio" <?= $input['lokasi'] == 2 ? 'checked="checked"' : '' ?>>Dimana Saja
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Besar upah yang diinginkan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="upahyangdicari" name="upahyangdicari" type="text" value="<?= $input != null ? $input['upahyangdicari'] : '0' ?>" size="20">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        Data Foto Pencari Kerja
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Upload Foto
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="photo" name="photo" value="" type="file" size="20">*
                                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                                                                                        <br />
                                                                                                        -Ukuran file foto maksimal 2 MB
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top" colspan="2">
                                                                                                        Keterangan
                                                                                                        <br/>
                                                                                                        * Harus diisi
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input type="hidden" value="submit" name="submit">
                                                                                                        <input id="submit" name="submit" type="submit" value="Simpan">
                                                                                                        <a href="<?= site_url() ?>" class="button">Batal</a>
                                                                                                </td>
                                                                                        </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </form>
                                                        </div>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
<script>
$("#tgllahir").datepicker({
        constrainInput: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
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

function NumericHandleKey(e)
{
        if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
        {
                return false;
        }
}

function GetKelurahan(id)
{
        $.post('<?= site_url('GetKelurahan') ?>/'+id.value,
        function(data){
                document.getElementById('idkelurahan').innerHTML = data
        })
}

function getFormattedDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
}
</script>