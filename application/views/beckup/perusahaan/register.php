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
                                <thead>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                REGISTRASI PERUSAHAAN
                                                        </div>
                                                </th>
                                        </tr>
                                </thead>
                                <tbody>
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
                                                                <form method="post" action="<?= site_url('perusahaan/doregister')?>">
                                                                        <table class="table-form" width="100%">
                                                                                <tbody>
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
                                                                                                        DATA PERUSAHAAN
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Nama Perusahaan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="namaperusahaan" name="namaperusahaan" type="text" value="<?= $input != null ? $input['namaperusahaan'] : '' ?>" size="20" maxlength="50">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Bidang Perusahaan
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <select id="idbidangperusahaan" name="idbidangperusahaan">
                                                                                                                <option value="">(Pilih Bidang)</option>
                                                                                                                <?php
                                                                                                                foreach ($MsBidangPerusahaanData as $getcmb)
                                                                                                                {
                                                                                                                        if ($input['idbidangperusahaan'] == $getcmb->IDBidangPerusahaan)
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDBidangPerusahaan."' selected=\"selected\">".$getcmb->NamaBidangPerusahaan."</option>";
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                                echo "<option value='".$getcmb->IDBidangPerusahaan."'>".$getcmb->NamaBidangPerusahaan."</option>";
                                                                                                                        }
                                                                                                                }
                                                                                                                ?>
                                                                                                        </select>*
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
                                                                                                        <textarea id="alamat" name="alamat" cols="30" rows="3" maxlength="100"><?= $input != null ? $input['alamat'] : '' ?></textarea>*
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
                                                                                                        <input id="kodepos" name="kodepos" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="20" maxlength="5">
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Kota/Kabupaten
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="kota" name="kota" type="text" value="<?= $input != null ? $input['kota'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Propinsi
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="propinsi" name="propinsi" type="text" value="<?= $input != null ? $input['propinsi'] : '' ?>" size="20" maxlength="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        DATA PEMBERI KERJA
                                                                                                </th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Nama Pemberi Kerja
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="namapemberikerja" name="namapemberikerja" type="text" value="<?= $input != null ? $input['namapemberikerja'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Jabatan Pemberi Kerja
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="jabatanpemberikerja" name="jabatanpemberikerja" type="text" value="<?= $input != null ? $input['jabatanpemberikerja'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Telepon
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="teleponpemberikerja" name="teleponpemberikerja" type="text" value="<?= $input != null ? $input['teleponpemberikerja'] : '' ?>" size="20">*
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                                                        Email
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="emailpemberikerja" name="emailpemberikerja" type="text" value="<?= $input != null ? $input['emailpemberikerja'] : '' ?>" size="20">*
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
function GetKelurahan(id)
{
        $.post('<?= site_url('GetKelurahan') ?>/'+id.value,
        function(data){
                document.getElementById('idkelurahan').innerHTML = data
        })
}

function getFormattedDate(date)
{
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear().toString();
        return day + '-' + month + '-' + year;
}

$("#username").keypress(function (e){
        if (e.which==32)
        {
                return false
        }
});
</script>