<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
    <tr>
        <td align="center">
            <table width="100%" class="table-form">
                <thead>
                    <tr>
                        <th align="center">
                            <div align="center">
                                DAFTAR PERUSAHAAN
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">
                            <div align="center">
                                <?php
                                $this->table->set_heading(
                                    array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                                    array('data'=>'Nama Perusahaan', 'style'=>'text-align:center;'),
                                    array('data'=>'Nama Pemberi Kerja', 'style'=>'text-align:center;'),
                                    array('data'=>'Email', 'style'=>'text-align:center;'),
                                    array('data'=>'Telepon', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($this->pagination->total_rows > 0)
                                {
                                    $i = 0;
                                    foreach ($MsPerusahaanData as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" href="'.site_url('admin/perusahaan/'.$getdata->IDPerusahaan).'/detail">Detail</a>';
                                        $lowonganbtn = '<a class="button" href="'.site_url('admin/perusahaan/'.$getdata->IDPerusahaan).'/lowongan">Lowongan</a>';
                                        $deletebtn = '<a class="button" onclick="DoDelete(\''.$getdata->IDPerusahaan.'\')">Hapus</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(3)),
                                            array('data'=>$getdata->NamaPerusahaan),
                                            array('data'=>$getdata->NamaPemberiKerja),
                                            array('data'=>$getdata->EmailPemberiKerja),
                                            array('data'=>$getdata->TeleponPemberiKerja),
                                            array('data'=>$detailbtn.$lowonganbtn.$deletebtn)
                                        );
                                    }
                                }
                                else
                                {
                                    $this->table->add_row(array('data'=>'belum ada data', 'align'=>'center', 'colspan'=>6));
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

<script type="text/javascript">
    function DoDelete(id)
    {
        if (confirm("Anda yakin?") == true)
        {
            window.location.href="<?php echo site_url('admin/perusahaan/') ?>/" + id + '/delete'
        }
    }
</script>
