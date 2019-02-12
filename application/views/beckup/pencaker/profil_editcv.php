<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
        $input = $this->session->flashdata('input');
        if ($input == NULL)
        {
                $input['idstatuspendidikan'] = $MsPencakerData->IDStatusPendidikan;
                $input['jurusan'] = $MsPencakerData->Jurusan;
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
                                <form method="post" action="<?= site_url('pencaker/doupdatecv') ?>">
                                        <table width="100%" class="table-form">
                                                <tbody>
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
                                                                        </select>
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
                                                                                for ($i=$tahun;$i+10>$tahun;$i--)
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
                                                                        <input id="tinggibadan" name="tinggibadan" type="text" value="<?= $input != null ? $input['tinggibadan'] : '' ?>" size="3" maxlength="3"> Cm
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                        Berat Badan
                                                                </td>
                                                                <td align="left" valign="top">
                                                                        <input id="beratbadan" name="beratbadan" type="text" value="<?= $input != null ? $input['beratbadan'] : '' ?>" size="3" maxlength="3"> Kg
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
                                                                <td align="left" colspan="2">
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

$("#nilai").keypress(function (e){
        if(e.which!=8 && e.which!=0 && e.which!=46 && (e.which<48 || e.which>57) || e.which==32)
        {
                return false;
        }
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
</script>