<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
$input = $this->session->flashdata('input');
if ($input == NULL)
{
    $input['namapemberikerja'] = $MsPerusahaanData->NamaPemberiKerja;
    $input['jabatanpemberikerja'] = $MsPerusahaanData->JabatanPemberiKerja;
    $input['teleponpemberikerja'] = $MsPerusahaanData->TeleponPemberiKerja;
    $input['emailpemberikerja'] = $MsPerusahaanData->EmailPemberiKerja;
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
                <form method="post" action="<?= site_url('pemberikerja/doupdateprofile') ?>">
                    <table width="100%" class="table-form">
                        <tbody>
                            <tr>
                                <th align="center" colspan="2">
                                    <div align="center">
                                        PROFIL PEMBERI KERJA
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <td align="left" valign="top" width="120px">
                                    Nama Pemberi Kerja
                                </td>
                                <td align="left" valign="top">
                                    <input id="namapemberikerja" name="namapemberikerja" type="text" value="<?= $input != null ? $input['namapemberikerja'] : '' ?>" size="20" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Jabatan
                                </td>
                                <td align="left" valign="top">
                                    <input id="jabatanpemberikerja" name="jabatanpemberikerja" type="text" value="<?= $input != null ? $input['jabatanpemberikerja'] : '' ?>" size="20" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Telepon
                                </td>
                                <td align="left" valign="top">
                                    <input id="teleponpemberikerja" name="teleponpemberikerja" type="text" value="<?= $input != null ? $input['teleponpemberikerja'] : '' ?>" size="20" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    Email
                                </td>
                                <td align="left" valign="top">
                                    <input id="emailpemberikerja" name="emailpemberikerja" type="text" value="<?= $input != null ? $input['emailpemberikerja'] : '' ?>" size="20" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                </td>
                                <td align="left" valign="top">
                                    <input id="simpan" name="simpan" type="submit" value="Simpan">
                                    <a class="button" href="<?= site_url('pemberikerja') ?>">Kembali</a>
                                </td>
                            </tr>
                            <tbody>
                            </table>
                        </form>
                    </div>
                </td>
            </tr>
        </table>

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