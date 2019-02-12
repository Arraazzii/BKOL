<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%" class="table-form">
        <tbody>
                <tr>
                        <th align="center">
                                <div align="center">
                                        INFO KERJA
                                </div>
                        </th>
                </tr>
                <tr>
                        <td align="left">
                                <div align="center">
                                <?php
                                        if ($this->session->flashdata('error') != null){
                                            echo $this->session->flashdata('error');
                                        }
                                ?>
                                </div>
                                <div align="center">
        <?php
$this->table->set_heading(
        array('data'=>'Lowongan Pekerjaan', 'style'=>'text-align:center;')
);
if ($CountMsLowonganData > 0)
{
        foreach ($MsLowonganData as $getdata)
        {
                $fromdate = explode("-", $getdata->TglBerlaku);
                $todate = explode("-", $getdata->TglBerakhir);
                $this->table->add_row(
                        array('data'=>'<div style="float:right;">
                                <i>Jatuh Tempo : <b>'.$getdata->TglBerakhir.'</b></i>
                                </div>
                                <div style="float:left;">'.$getdata->NamaLowongan.'<br />
                                        '.$getdata->NamaPerusahaan.'<br />
                                                <a href="javascript:void(0)" class="showhidebtn">Detail</a></div>
                                                <div class="showhidebox">
                                                Alamat Perusahaan : '.$getdata->Alamat.($getdata->KodePos != '000000' ? ' '.$getdata->KodePos : '').'<br /><br />
                                                Nama Jabatan : '.$getdata->NamaPosisiJabatan.'<br />
                                                Persyaratan Jabatan:<br />
                                                '.($getdata->JmlPria > 0 ? 'Pria: '.$getdata->JmlPria.' Orang' : '').($getdata->JmlPria > 0 && $getdata->JmlPria > 0 ? '<br />' : '').($getdata->JmlWanita > 0 ? 'Wanita: '.$getdata->JmlWanita.' Orang' : '').'<br />
                                                        Usia Max. '.$getdata->BatasUmur.' Tahun<br />
                                                        Pendidikan '.$getdata->NamaStatusPendidikan.'<br />
                                                        Syarat Khusus : <b>'.$getdata->SyaratKhusus.'</b>'.($getdata->Pengalaman != '' ? '<br />
                                                                Pengalaman : '.$getdata->Pengalaman : '').'<br />
                                                                        Batas waktu : '.$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0].' s/d '.$todate[2].'-'.$todate[1].'-'.$todate[0].'<br />
                                                                                <br />Jika Anda Sudah Mempunyai Account dan Berminat Mengisi Jabatan Pada Perusahaan Ini.<br />Silahkan Login <a href="'.site_url('login').'">disini</a> dan Jika Belum Mempunyai Account Silahkan <a href="'.site_url('register/2').'">Daftar</a> Terlebih Dahulu</div>')
                );
        }
        $this->table->add_row(array('data'=>'<a href="'.site_url('datalowongan').'">Selengkapnya</a>', 'align'=>'center'));
}
else
{
        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center'));
}
$tmpl = array (
                'table_open'          => '<table width="100%" cellpadding="2" cellspacing="1" class="table-form">',

                'heading_row_start'   => '<tr>',
                'heading_row_end'     => '</tr>',
                'heading_cell_start'  => '<th>',
                'heading_cell_end'    => '</th>',

                'row_start'           => '<tr>',
                'row_end'             => '</tr>',
                'cell_start'          => '<td align="left" valign="top">',
                'cell_end'            => '</td>',

                'row_alt_start'       => '<tr>',
                'row_alt_end'         => '</tr>',
                'cell_alt_start'      => '<td align="left" valign="top">',
                'cell_alt_end'        => '</td>',

                'table_close'         => '</table>'
);
$this->table->set_template($tmpl); 
echo $this->table->generate();
$this->table->clear();

echo $this->pagination->create_links();
?>
                                </div>
                                <div id="dialog" title="Konfirmasi">Kirimkan CV anda?</div>
                        </td>
                </tr>
        </tbody>
</table>

<script>
$(document).ready(function() {
        $("#dialog:ui-dialog").dialog( "destroy" );
        $("#dialog").dialog({
                autoOpen: false,
                modal: true
        });
        $(".confirmLink").click(function(e) {
                e.preventDefault();
                var targetUrl = $(this).attr("href");
                $("#dialog").dialog({
                        buttons : {
                                "Kirim CV" : function() {
                                        window.location.href = targetUrl;
                                },
                                "Batal" : function() {
                                        $(this).dialog("close");
                                }
                        }
                });
                $("#dialog").dialog("open");
        });
});
</script>
