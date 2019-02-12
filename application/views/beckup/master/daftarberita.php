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
                                                                DAFTAR BERITA
                                                        </div>
                                                </th>
                                        </tr>
                                        <tr>
                                                <td align="center">
                                                        <div align="center">
<?php
$this->table->set_heading(
        array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Tanggal', 'style'=>'width:0px; text-align:center;'),
        array('data'=>'Judul Berita', 'style'=>'text-align:center;'),
        array('data'=>'Isi Berita', 'style'=>'text-align:center;')
);
if ($this->pagination->total_rows > 0)
{
        $i = 0;
        foreach ($MsBeritaData as $getdata)
        {
                $i++;
                $viewbtn = '<a href="'.site_url('berita/view').'/'.$getdata->IDBerita.'">Selengkapnya</a>';
                $this->table->add_row(
                        array('data'=>$i+$this->uri->segment(3)),
                        array('data'=>$getdata->TglBerita),
                        array('data'=>$getdata->JudulBerita),
                        array('data'=>(strlen($getdata->IsiBerita) > 50 ? substr($getdata->IsiBerita,0,50)."......" : $getdata->IsiBerita).$viewbtn)
                );
        }
}
else
{
        $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>4));
}
$tmpl = array (
                'table_open'          => '<table width="100%" cellpadding="2" cellspacing="1" class="table-form">',

                'heading_row_start'   => '<tr>',
                'heading_row_end'     => '</tr>',
                'heading_cell_start'  => '<th>',
                'heading_cell_end'    => '</th>',

                'row_start'           => '<tr>',
                'row_end'             => '</tr>',
                'cell_start'          => '<td nowrap="nowrap" align="left" valign="top">',
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
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
