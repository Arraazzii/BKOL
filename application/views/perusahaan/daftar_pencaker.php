<div class="modal fade" id="modal-detail">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title text-center">DATA PENCARI KERJA</h4>
  </div>
  <div class="modal-body">
    <div class="table-responsive">
     <table class="table table-hover">
      <tbody>
       <tr>
        <input type="hidden" name="idlowonganmasuk" id="idlowonganmasuk">
        <td align="left" valign="top" rowspan="4" width="120px">
         <img id="photo" src="<?= site_url('assets/file/temp') ?>" width="120px" height="160px">
       </td>
       <td align="left" valign="top" width="140px">
         Nomor Induk Pencaker
       </td>
       <td align="left" valign="top">
         <span id="nomorindukpencaker"></span>
       </td>
     </tr>
     <tr>
      <td nowrap="nowrap" align="left" valign="top">
       Nama Pencari Kerja
     </td>
     <td align="left" valign="top">
       <span id="namapencaker"></span>
     </td>
   </tr>
   <tr>
    <td nowrap="nowrap" align="left" valign="top">
     Tempat/Tanggal Lahir
   </td>
   <td align="left" valign="top">
     <span id="tempattgllahir"></span>
   </td>
 </tr>
 <tr>
  <td nowrap="nowrap" align="left" valign="top">
   Jenis Kelamin
 </td>
 <td align="left" valign="top">
   <span id="jeniskelamin"></span>
 </td>
</tr>
<tr>
  <td nowrap="nowrap" align="left" valign="top">
   Email
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="email"></span>
 </td>
</tr>
<tr>
  <td nowrap="nowrap" align="left" valign="top">
   Telepon
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="telepon"></span>
 </td>
</tr>
<tr>
  <td nowrap="nowrap" align="left" valign="top">
   Alamat
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="alamat"></span>
 </td>
</tr>
<tr>
  <td nowrap="nowrap" align="left" valign="top">
   Kecamatan
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="namakecamatan"></span>
 </td>
</tr>
<tr>
  <td nowrap="nowrap" align="left" valign="top">
   Kelurahan
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="namakelurahan"></span>
 </td>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Kode Pos
</td>
<td align="left" valign="top" colspan="2">
  <span id="kodepos"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Kewarganegaraan
</td>
<td align="left" valign="top" colspan="2">
  <span id="kewarganegaraan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Agama
</td>
<td align="left" valign="top" colspan="2">
  <span id="namaagama"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Status Pernikahan
</td>
<td align="left" valign="top" colspan="2">
  <span id="namastatuspernikahan"></span>
</td>
</tr>
<tr>
 <th class="text-center" colspan="3">
  DATA PENDIDIKAN FORMAL
</th>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Pendidikan Terakhir
</td>
<td align="left" valign="top" colspan="2">
  <span id="namastatuspendidikan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Jurusan
</td>
<td align="left" valign="top" colspan="2">
  <span id="jurusan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Keterampilan
</td>
<td align="left" valign="top" colspan="2">
  <span id="keterampilan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  NEM/IPK
</td>
<td align="left" valign="top" colspan="2">
  <span id="nemipk"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Nilai
</td>
<td align="left" valign="top" colspan="2">
  <span id="nilai"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Tahun Lulus
</td>
<td align="left" valign="top" colspan="2">
  <span id="tahunlulus"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Tinggi Badan
</td>
<td align="left" valign="top" colspan="2">
  <span id="tinggibadan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Berat Badan
</td>
<td align="left" valign="top" colspan="2">
  <span id="beratbadan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Penguasaan Bahasa
</td>
<td align="left" valign="top" colspan="2">
  <span id="bahasa"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Pengalaman Kerja
</td>
<td align="left" valign="top" colspan="2">
  <span id="pengalaman"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Keterangan
</td>
<td align="left" valign="top" colspan="2">
  <span id="keterangan"></span>
</td>
</tr>
<tr>
 <th class="text-center" colspan="3">
  JABATAN YANG DIINGINKAN
</th>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Posisi Jabatan
</td>
<td align="left" valign="top" colspan="2">
  <span id="namaposisijabatan"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Lokasi
</td>
<td align="left" valign="top" colspan="2">
  <span id="lokasi"></span>
</td>
</tr>
<tr>
 <td nowrap="nowrap" align="left" valign="top">
  Besar upah yang diinginkan
</td>
<td align="left" valign="top" colspan="2">
  <span id="upahyangdicari"></span>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="modal-footer" id="btnAction">
  <button id="modaldiss" type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin') ?>">Home</a></li>
    <li><a href="<?php echo site_url('admin') ?>">Perusahaan</a></li>
    <li class="active">Daftar Pencaker</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Detail Lowongan</h3>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="180">No Loker</td>
                <td><?= $MsLowonganData->IDLowongan ?></td>
              </tr>
              <tr>
                <td>Nama Pekerjaan</td>
                <td><?= $MsLowonganData->NamaLowongan ?></td>
              </tr>
              <tr>
                <td>Total Pencaker Pria</td>
                <td><?= $TotalPria ?> Orang</td>
              </tr>
              <tr>
                <td>Total Pencaker Wanita</td>
                <td><?= $TotalWanita ?> Orang</td>
              </tr>
              <tr>
                <td>Total Pencaker</td>
                <td><?= $TotalWanita+$TotalPria ?> Orang</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header">
          <h3 class="box-title text-center">Daftar Pencari Kerja</h3>
          <div class="box-tools pull-right">

          </div>
        </div>
        <div class="box-body">
         <?php 

         if ($MsPencakerData0->num_rows > 0 || !empty($MsPencakerData0)){
          $total0 = 0;
          foreach ($MsPencakerData0->result_array() as $getdata0){
            $totals0 = count($getdata0['IDPencaker']);
            $total0 += $totals0; 

          }
        }

          if ($MsPencakerData1->num_rows > 0 || !empty($MsPencakerData1)){
            $total1 = 0;
            foreach ($MsPencakerData1->result_array() as $getdata1){
              $totals1 = count($getdata1['IDPencaker']);
              $total1 += $totals1; 

            }
          }

            if ($MsPencakerData2->num_rows > 0 || !empty($MsPencakerData2)){
              $total2 = 0;
              foreach ($MsPencakerData2->result_array() as $getdata2){
                $totals2 = count($getdata2['IDPencaker']);
                $total2 += $totals2; 

              }
            }

              if ($MsPencakerData3->num_rows > 0 || !empty($MsPencakerData3)){
                $total3 = 0;
                foreach ($MsPencakerData3->result_array() as $getdata3){
                  $totals3 = count($getdata3['IDPencaker']);
                  $total3 += $totals3; 

                }
              }

                if ($MsPencakerData4->num_rows > 0 || !empty($MsPencakerData4)){
                  $total4 = 0;
                  foreach ($MsPencakerData4->result_array() as $getdata4){
                    $totals4 = count($getdata4['IDPencaker']);
                    $total4 += $totals4; 

                  }
                }

                 ?>
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Semua Pencari Kerja <span class="label label-default">(<?php echo $total0; ?>)</span></a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Di Proses <span class="label label-primary">(<?php echo $total1; ?>)</span></a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Di Terima <span class="label label-success">(<?php echo $total2; ?>)</span></a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Di Tolak <span class="label label-danger">(<?php echo $total3; ?>)</span></a></li>
                    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Tidak Memenuhi Syarat <span class="label label-warning">(<?php echo $total4; ?>)</span></a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <h4 class="text-center">Semua Pelamar Kerja</h4>
                      <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table1">
                          <thead>
                            <tr>
                              <th class="text-center">No</th>
                              <th class="text-left">Nomor Induk Pencaker</th>
                              <th class="text-left">Nama Lengkap</th>
                              <th class="text-center">Pendidikan Terakhir</th>
                              <th class="text-center">Umur</th>
                              <th class="text-center">Status</th>
                              <th class="text-center">Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if ($MsPencakerData0->num_rows > 0): ?>
                              <?php $i = 0; 

                              ?>
                              <?php foreach ($MsPencakerData0->result() as $getdata): ?>
                                <?php 
                                if ($getdata->StatusLowongan == 0) 
                                {
                                  $status = '<span class="label label-info">Belum di Proses</span>';
                                } 
                                else if ($getdata->StatusLowongan == 1)
                                {
                                  $status = '<span class="label label-primary">Proses Verifikasi</span>';
                                }
                                else if ($getdata->StatusLowongan == 2)
                                {
                                  $status = '<span class="label label-success">Diterima</span>';
                                }
                                else if ($getdata->StatusLowongan == 3)
                                {
                                  $status = '<span class="label label-danger">Ditolak</span>';
                                }
                                else if ($getdata->StatusLowongan == 4)
                                {
                                  $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                                }
                                $i++;

                                if ($getdata->StatusLowongan == 0) 
                                {
                                 $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                               } 
                               else if ($getdata->StatusLowongan == 1)
                               {
                                 $detailbtn = '<button type="button" class="btn btn-primary btn-sm" disabled="">Pencaker Proses</button>';
                               }
                               else if ($getdata->StatusLowongan == 2)
                               {
                                 $detailbtn = '<button type="button" class="btn btn-success btn-sm" disabled="">Pencaker Diterima</button>';
                               }
                               else if ($getdata->StatusLowongan == 3)
                               {
                                $detailbtn = '<button type="button" class="btn btn-danger btn-sm" disabled="">Pencaker Ditolak</button>';
                              }
                              else if ($getdata->StatusLowongan == 3)
                              {
                                $detailbtn = '<button type="button" class="btn btn-warning btn-sm" disabled="">Pencaker Tidak Memenuhi Syarat</button>';
                              }

                              $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                              $tgllahir = explode("-", $getdata->TglLahir);
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                <td class="text-left"><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td class="text-left"><?php echo $getdata->NamaPencaker ?></td>
                                <td class="text-center"><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td class="text-center"><?php echo (date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun' ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center"><?php echo $detailbtn ?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr> 
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_2">
                    <h4 class="text-center">Pelamar Kerja Yang Diproses</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table2">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-left">Nomor Induk Pencaker</th>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-center">Pendidikan Terakhir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($MsPencakerData1->num_rows > 0): ?>
                            <?php $i = 0; 

                            ?>
                            <?php foreach ($MsPencakerData1->result() as $getdata): ?>
                              <?php 
                              if ($getdata->StatusLowongan == 0) 
                              {
                                $status = '<span class="label label-info">Belum di Proses</span>';
                              } 
                              else if ($getdata->StatusLowongan == 1)
                              {
                                $status = '<span class="label label-primary">Proses Verifikasi</span>';
                              }
                              else if ($getdata->StatusLowongan == 2)
                              {
                                $status = '<span class="label label-success">Diterima</span>';
                              }
                              else if ($getdata->StatusLowongan == 3)
                              {
                                $status = '<span class="label label-danger">Ditolak</span>';
                              }
                              else if ($getdata->StatusLowongan == 4)
                              {
                                $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                              }
                              $i++;
                              $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                              $tgllahir = explode("-", $getdata->TglLahir);
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                <td class="text-left"><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td class="text-left"><?php echo $getdata->NamaPencaker ?></td>
                                <td class="text-center"><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td class="text-center"><?php echo (date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun' ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center"><?php echo $detailbtn ?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr> 
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_3">
                    <h4 class="text-center">Pelamar Kerja Yang Diterima</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table3">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-left">Nomor Induk Pencaker</th>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-center">Pendidikan Terakhir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($MsPencakerData2->num_rows > 0): ?>
                            <?php $i = 0; 

                            ?>
                            <?php foreach ($MsPencakerData2->result() as $getdata): ?>
                              <?php 
                              if ($getdata->StatusLowongan == 0) 
                              {
                                $status = '<span class="label label-info">Belum di Proses</span>';
                              } 
                              else if ($getdata->StatusLowongan == 1)
                              {
                                $status = '<span class="label label-primary">Proses Verifikasi</span>';
                              }
                              else if ($getdata->StatusLowongan == 2)
                              {
                                $status = '<span class="label label-success">Diterima</span>';
                              }
                              else if ($getdata->StatusLowongan == 3)
                              {
                                $status = '<span class="label label-danger">Ditolak</span>';
                              }
                              else if ($getdata->StatusLowongan == 4)
                              {
                                $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                              }
                              $i++;
                              $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                              $tgllahir = explode("-", $getdata->TglLahir);
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                <td class="text-left"><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td class="text-left"><?php echo $getdata->NamaPencaker ?></td>
                                <td class="text-center"><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td class="text-center"><?php echo (date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun' ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center"><?php echo $detailbtn ?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr> 
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_4">
                    <h4 class="text-center">Pelamar Kerja Yang Ditolak</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table4">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-left">Nomor Induk Pencaker</th>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-center">Pendidikan Terakhir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($MsPencakerData3->num_rows > 0): ?>
                            <?php $i = 0; 

                            ?>
                            <?php foreach ($MsPencakerData3->result() as $getdata): ?>
                              <?php 
                              if ($getdata->StatusLowongan == 0) 
                              {
                                $status = '<span class="label label-info">Belum di Proses</span>';
                              } 
                              else if ($getdata->StatusLowongan == 1)
                              {
                                $status = '<span class="label label-primary">Proses Verifikasi</span>';
                              }
                              else if ($getdata->StatusLowongan == 2)
                              {
                                $status = '<span class="label label-success">Diterima</span>';
                              }
                              else if ($getdata->StatusLowongan == 3)
                              {
                                $status = '<span class="label label-danger">Ditolak</span>';
                              }
                              else if ($getdata->StatusLowongan == 4)
                              {
                                $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                              }
                              $i++;
                              $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                              $tgllahir = explode("-", $getdata->TglLahir);
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                <td class="text-left"><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td class="text-left"><?php echo $getdata->NamaPencaker ?></td>
                                <td class="text-center"><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td class="text-center"><?php echo (date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun' ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center"><?php echo $detailbtn ?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr> 
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_5">
                    <h4 class="text-center">Pelamar Kerja Yang Tidak Sesuai</h4>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table5">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-left">Nomor Induk Pencaker</th>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-center">Pendidikan Terakhir</th>
                            <th class="text-center">Umur</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($MsPencakerData4->num_rows > 0): ?>
                            <?php $i = 0; 

                            ?>
                            <?php foreach ($MsPencakerData4->result() as $getdata): ?>
                              <?php 
                              if ($getdata->StatusLowongan == 0) 
                              {
                                $status = '<span class="label label-info">Belum di Proses</span>';
                              } 
                              else if ($getdata->StatusLowongan == 1)
                              {
                                $status = '<span class="label label-primary">Proses Verifikasi</span>';
                              }
                              else if ($getdata->StatusLowongan == 2)
                              {
                                $status = '<span class="label label-success">Diterima</span>';
                              }
                              else if ($getdata->StatusLowongan == 3)
                              {
                                $status = '<span class="label label-danger">Ditolak</span>';
                              }
                              else if ($getdata->StatusLowongan == 4)
                              {
                                $status = '<span class="label label-warning">Tidak Memenuhi Syarat</span>';
                              }
                              $i++;
                              $detailbtn = '<btn class="btn btn-default btn-sm" onclick="DoEdit(\''.$getdata->IDLowonganMasuk.'\') "><i class="fa fa-file-text"></i> Lihat CV</btn>';
                              $tgllahir = explode("-", $getdata->TglLahir);
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i+$this->uri->segment(4) ?></td>
                                <td class="text-left"><?php echo $getdata->NomorIndukPencaker ?></td>
                                <td class="text-left"><?php echo $getdata->NamaPencaker ?></td>
                                <td class="text-center"><?php echo $getdata->NamaStatusPendidikan ?></td>
                                <td class="text-center"><?php echo (date("md", date("U", mktime(0, 0, 0, $tgllahir[2], $tgllahir[1], $tgllahir[0]))) > date("md") ? ((date("Y")-$tgllahir[0])-1):(date("Y")-$tgllahir[0])).' tahun' ?></td>
                                <td class="text-center"><?php echo $status ?></td>
                                <td class="text-center"><?php echo $detailbtn ?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php else: ?>
                            <tr>
                              <td colspan="7" class="text-center">Belum Ada Data</td>
                            </tr> 
                          <?php endif ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-- <?php //if ($this->pagination->create_links()): ?>
            <div class="box-footer">
                <div class="pull-right">
                    <?php //echo $this->pagination->create_links() ?>
                </div>
            </div>
            <?//php endif ?> -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#table1").dataTable();
        $("#table2").dataTable();
        $("#table3").dataTable();
        $("#table4").dataTable();
        $("#table5").dataTable();
      });
    </script>
    <script type="text/javascript">
      function DoEdit(IDLowonganMasuk)
      {
        var src = '<?= site_url('assets/file/pencaker') ?>';
        $.get('<?= site_url('perusahaan/statuslowongan/getdata') ?>/'+IDLowonganMasuk, function(getdata)
        {
          if (getdata.exists)
          {
            var btnAction;
            if (getdata.StatusLowongan == 1) 
            {
              btnAction = [
              ['Tolak', 3],
              ['Terima', 2]
              ];
              createButton(btnAction, getdata.IDPencaker);
            } 
            else if (getdata.StatusLowongan == 0)
            {
              btnAction = [
              ['Tidak Sesuai', 4],
              ['Proses', 1]
              ];
              createButton(btnAction, getdata.IDPencaker);
            }
            else if (getdata.StatusLowongan == 2)
            {
              btnAction = [
              // ['Diproses', 1],
              // ['Batalkan', 0]
              ];
              createButton(btnAction, getdata.IDPencaker);
            }
            else if (getdata.StatusLowongan == 3)
            {
              btnAction = [
              // ['Diproses', 1],
              // ['Batalkan', 0]
              ];
              createButton(btnAction, getdata.IDPencaker);
            }
            else if (getdata.StatusLowongan == 4)
            {
              btnAction = [
              // ['Diproses', 1],
              // ['Tolak', 3],
              // ['Terima', 2]
              ];
              createButton(btnAction, getdata.IDPencaker);
            }
            var inst = $('#modal-detail');
            var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            var tgllahir = getdata.TglLahir.split("-");
            $("#idlowonganmasuk").val(IDLowonganMasuk);
            $('#statuslowongan').html(status);
            $("#photo").attr('src',src+'/'+getdata.IDPencaker+'.jpg');
            $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
            $('#namapencaker').html(getdata.NamaPencaker);
            $('#tempattgllahir').html(getdata.TempatLahir+', '+parseInt(tgllahir[2])+' '+bulan[parseInt(tgllahir[1])-1]+' '+tgllahir[0]);
            $('#jeniskelamin').html(getdata.JenisKelamin == 0 ? 'Pria' : 'Wanita');
            $('#email').html(getdata.Email);
            $('#telepon').html(getdata.Telepon);
            $('#alamat').html(getdata.Alamat);
            $('#namakecamatan').html(getdata.NamaKecamatan);
            $('#namakelurahan').html(getdata.NamaKelurahan);
            $('#kodepos').html(getdata.KodePos);
            $('#kewarganegaraan').html(getdata.Kewarganegaraan == 0 ? 'WNI' : 'WNA');
            $('#namaagama').html(getdata.NamaAgama);
            $('#namastatuspernikahan').html(getdata.NamaStatusPernikahan);
            $('#namastatuspendidikan').html(getdata.NamaStatusPendidikan);
            $('#jurusan').html(getdata.Jurusan);
            $('#keterampilan').html(getdata.Keterampilan);
            $('#nemipk').html(getdata.NEMIPK == 0 ? 'NEM' : 'IPK');
            $('#nilai').html(getdata.Nilai);
            $('#tahunlulus').html(getdata.TahunLulus);
            $('#tinggibadan').html(getdata.TinggiBadan+' cm');
            $('#beratbadan').html(getdata.BeratBadan+' kg');
            $('#keterangan').html(getdata.Keterangan);
            $('#namaposisijabatan').html(getdata.NamaPosisiJabatan);
            $('#bahasa').html(getdata.BahasaData);
            $('#pengalaman').html(getdata.PengalamanData);
            if (getdata.Lokasi == 0)
            {
              $('#lokasi').html('Dalam Negeri');
            }
            else if (getdata.Lokasi == 1)
            {
              $('#lokasi').html('Luar Negeri');
            }
            else if (getdata.Lokasi == 2)
            {
              $('#lokasi').html('Dimana Saja');
            }
            $('#upahyangdicari').html('Rp '+getdata.UpahYangDicari);
                // $('#dialog-edit').dialog('option', 'title', 'Data Pencaker');
                // $("#dialog-edit").dialog("open");
                inst.modal('show');
              }
              else
              {
                alert('Pencaker tidak ditemukan');
              }
            },'json');
}

function clearButton() {
  $("#btnAction").find('button').remove();
}

function createButton(arr, IDPencakers) {
    // console.log(arr);
    // var container = document.getElementById('btnAction');
    // for (var i = 0; i < arr.length; i++) {
    //     var btn = document.createElement('button');
    //     btn.appendChild(document.createTextNode(arr[i][0]));
    //     btn.className = 'btn btn-default';
    //     btn.onclick = DoUpdate(arr[i][0]);
    //     container.insertBefore(btn, container.childNodes[0]);
    // }
    clearButton();
    var container = $("#btnAction");

    for (var i = 0; i < arr.length; i++) {
      var btn = $("<button></button>").text(arr[i][0]); 
      var isibutton = "DoUpdate('" + arr[i][1] + "', '" + IDPencakers + "')";

      btn.attr({
        'class': 'btn btn-default',
        'onclick': isibutton
      });
      container.append(btn);
    }
    container.append('<button id="modaldiss" type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>');
  }

  function DoUpdate(idstatuslowongan, IDPencakerss)
  {
    $.post('<?= site_url('perusahaan/statuslowongan/updatedata') ?>',
    {
      IDLowonganMasuk: $("#idlowonganmasuk").val(),
      StatusLowongan: idstatuslowongan,
      IDPencaker: IDPencakerss
    },
    function(getdata){
      if (getdata.valid)
      {
        $('#modal-detail').modal('hide');
        window.location.reload();
      }
      else
      {
        ShowError(getdata.error);
      }
    },'json');
  }

</script>

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