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
                $tgllahir = explode("-", $MsPencakerData->TglLahir);
                $input['nomorindukpencaker'] = $MsPencakerData->NomorIndukPencaker;
                $input['idpencaker'] = $MsPencakerData->IDPencaker;
                $input['namapencaker'] = $MsPencakerData->NamaPencaker;
                $input['jeniskelamin'] = $MsPencakerData->JenisKelamin;
                $input['tempatlahir'] = $MsPencakerData->TempatLahir;
                $input['tgllahir'] = $tgllahir[2].'-'.$tgllahir[1].'-'.$tgllahir[0];
                $input['email'] = $MsPencakerData->Email;
                $input['telepon'] = $MsPencakerData->Telepon;
                $input['alamat'] = $MsPencakerData->Alamat;
                $input['idkecamatan'] = $MsPencakerData->IDKecamatan;
                $input['idkelurahan'] = $MsPencakerData->IDKelurahan;
                $input['kodepos'] = $MsPencakerData->KodePos;
                $input['kewarganegaraan'] = $MsPencakerData->Kewarganegaraan;
                $input['idagama'] = $MsPencakerData->IDAgama;
                $input['idstatuspernikahan'] = $MsPencakerData->IDStatusPernikahan;
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
                                <form method="post" action="<?= site_url('pencaker/doupdate') ?>">
                                        <table width="100%" class="table-form">
                                                <tbody>
                                                        <tr>
                                                                <th align="center" colspan="3">
                                                                        <div align="center">
                                                                                PROFIL PENCARI KERJA
                                                                        </div>
                                                                </th>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" valign="top" rowspan="4" width="120px">
                                                                        <img src="<?= site_url('assets/file/pencaker/'.$MsPencakerData->IDPencaker.'.jpg') ?>" width="120px" height="160px">
                                                                </td>
                                                                <td align="left" valign="top" width="140px">
                                                                        No Pendaftaran
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <label id="idpencaker"><?= $MsPencakerData->IDPencaker ?></label>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Nomor Induk Pencaker
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="nomorindukpencaker" name="nomorindukpencaker" type="text" value="<?= $input != null ? $input['nomorindukpencaker'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Nama Pencari Kerja
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="namapencaker" name="namapencaker" type="text" value="<?= $input != null ? $input['namapencaker'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
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
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input id="tempatlahir" name="tempatlahir" type="text" value="<?= $input != null ? $input['tempatlahir'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                        Tanggal Lahir
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input id="tgllahir" name="tgllahir" type="text" value="<?= $input != null ? $input['tgllahir'] : date('d-m-Y', mktime(0, 0, 0, 1, 1, 1990)) ?>" size="10" maxlength="10" readonly="true">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Email
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input id="email" name="email" type="text" value="<?= $input != null ? $input['email'] : '' ?>" size="20" maxlength="100">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Telepon
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input id="telepon" name="telepon" type="text" value="<?= $input != null ? $input['telepon'] : '' ?>" size="20" maxlength="20">*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Alamat
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
                                                                        <textarea id="alamat" name="alamat" cols="30" rows="3" maxlength="400"><?= $input != null ? $input['alamat'] : '' ?></textarea>*
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                        Kecamatan
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
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
                                                                        Kelurahan
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
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
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input id="kodepos" name="kodepos" type="text" value="<?= $input != null ? $input['kodepos'] : '' ?>" size="20" maxlength="5">
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                        Kewarganegaraan
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
                                                                        <input name="kewarganegaraan" value="0" type="radio" <?= $input['kewarganegaraan'] == 0 ? 'checked="checked"' : '' ?>>WNI
                                                                        &nbsp;&nbsp;
                                                                        <input name="kewarganegaraan" value="1" type="radio" <?= $input['kewarganegaraan'] == 1 ? 'checked="checked"' : '' ?>>WNA
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top" width="120px">
                                                                        Agama
                                                                </td>
                                                                <td align="left" valign="top" colspan="2">
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
                                                                <td align="left" valign="top" colspan="2">
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
                                                                <td align="left" valign="top" colspan="2">
                                                                        Keterangan
                                                                        <br/>
                                                                        * Harus diisi
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td align="left" colspan="3">
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

function GetKelurahan(id)
{
        $.post('<?= site_url('GetKelurahan') ?>/'+id.value,
        function(data){
                document.getElementById('idkelurahan').innerHTML = data
        })
}

$("#kodepos").keypress(function (e){
        return NumericHandleKey(e);
});

function NumericHandleKey(e)
{
        if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
        {
                return false;
        }
}
</script>