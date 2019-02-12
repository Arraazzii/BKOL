<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
        <tr>
                <td align="center">
                        <table width="100%" class="table-form">
                                <tbody>
                                        <tr>
                                                <th align="center">
                                                        <div align="center">
                                                                FOTO KEGIATAN
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
                                                        <div id="dialog-delete" title="Hapus Foto Kegiatan">
                                                                Hapus Foto Kegiatan?
                                                        </div>
                                                        <div align="center">
                                                                <form method="post" action="<?= site_url('admin/event/upload')?>" enctype="multipart/form-data">
                                                                        <table class="table-form" width="100%">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th align="center" colspan="2">
                                                                                                        Upload Foto
                                                                                                </th>
                                                                                        </tr>
                                                                                </thead>
                                                                                </tbody>
                                                                                
                                                                                        <tr>
                                                                                                <td nowrap="nowrap" align="left" valign="top">
                                                                                                        Upload Foto
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input id="idevent" name="idevent" type="hidden" value="<?= $this->uri->segment(4) ?>" />
                                                                                                        <input id="photo" name="photo" value="" type="file" size="20">*
                                                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                                                                                        <br />
                                                                                                        -Ukuran file foto maksimal 2 MB
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top">
                                                                                                </td>
                                                                                                <td align="left" valign="top">
                                                                                                        <input type="hidden" value="submit" name="submit">
                                                                                                        <input id="submit" name="submit" type="submit" value="Upload">
                                                                                                        <a href="<?= site_url('admin/event') ?>" class="button">Kembali</a>
                                                                                                        <?php
                                                                                                                if (file_exists('assets/file/event/'.$this->uri->segment(4).'.jpg'))
                                                                                                                {
                                                                                                                        echo '<a class="button" onclick="DoDeleteConfirm()">Hapus Foto</a>';
                                                                                                                }
                                                                                                        ?>
                                                                                                </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td align="left" valign="top" colspan="2">
                                                                                                        <div align="center" >
                                                                                                                <img src="<?= site_url('assets/file/event/'.$this->uri->segment(4).'.jpg') ?>" style="max-width: 800px; max-height: 300px;">
                                                                                                        </div>
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
$("#dialog-delete").dialog({
        autoOpen: false,
        width: 350,
        modal: true,
        buttons: {
                "Hapus" : function() {
                        DoDelete();
                },
                "Batal" : function() {
                        $(this).dialog("close");
                }
        },
        close: function() {
        }
});
function DoDeleteConfirm()
{
        $("#dialog-delete").html('Hapus Foto Kegiatan?');
        $("#dialog-delete").dialog("open");
}
function DoDelete()
{
        $.post('<?= site_url('admin/event/deleteimage') ?>',
        {
                IDEvent: "<?= $this->uri->segment(4) ?>"
        },
        function(getdata)
        {
                if (getdata.valid)
                {
                }
                else
                {
                }
                $("#dialog-delete").dialog("close");
                window.location.reload();
        },'json');
}
</script>