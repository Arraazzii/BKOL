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
        else
        {
                $input['namaperusahaan'] = $MsPerusahaanData->NamaPerusahaan;
                $input['idbidangperusahaan'] = $MsPerusahaanData->IDBidangPerusahaan;
                $input['email'] = $MsPerusahaanData->Email;
                $input['telepon'] = $MsPerusahaanData->Telepon;
                $input['alamat'] = $MsPerusahaanData->Alamat;
                $input['kodepos'] = $MsPerusahaanData->KodePos;
                $input['idkecamatan'] = $MsPerusahaanData->IDKecamatan;
                $input['idkelurahan'] = $MsPerusahaanData->IDKelurahan;
                $input['kota'] = $MsPerusahaanData->Kota;
                $input['propinsi'] = $MsPerusahaanData->Propinsi;
        }
?>
<table width="100%">
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
                                <form method="post" action="<?= site_url('perusahaan/doupdateprofile') ?>">
                                        <table width="100%" class="table-form">
                                                <tbody>
                                                        <tr>
                                                                <th align="center" colspan="2">
                                                                        <div align="center">
                                                                                PROFIL PERUSAHAAN
                                                                        </div>
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top" width="120px">
                                                                        Nama Perusahaan
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="namaperusahaan" name="namaperusahaan" type="text" value="<?= $input != null ? $input['namaperusahaan'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
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
                                                                <td align="left" valign="top">
                                                                        Email
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="email" name="email" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
                                                                        Telepon
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="telepon" name="telepon" type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
                                                                        Alamat
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <textarea id="alamat" name="alamat" cols="30" rows="3" maxlength="200"><?= $input != null ? $input['alamat'] : '' ?></textarea>*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
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
                                                                <td align="left" valign="top">
                                                                        Kelurahan
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
                                                                <td align="left" valign="top">
                                                                        Kode Pos
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="kodepos" name="kodepos" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="20" maxlength="5">
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
                                                                        Kota/Kabupaten
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="kota" name="kota" type="text" value="<?= $input != null ? $input['kota'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top">
                                                                        Propinsi
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="propinsi" name="propinsi" type="text" value="<?= $input != null ? $input['propinsi'] : '' ?>" size="20" maxlength="20">*
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
                                                                        <input id="simpan" name="simpan" type="submit" value="Simpan">
                                                                        <a class="button" href="<?= site_url() ?>">Kembali</a>
                                                                </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </form>
                        </div>
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
</script>