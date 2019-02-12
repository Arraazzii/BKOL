<!--
To change this template, choose Tools | Templates
and open the template in the viewor.
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
                DAFTAR PENCARI KERJA
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center">
              <div id="dialog-view" title="Data Pencaker">
                <table class="table-form" width="100%">
                  <thead>
                    <tr>
                      <th align="center" colspan="3">
                        DATA PENCARI KERJA
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td align="left" valign="top" rowspan="4" width="120px">
                        <img id="photo" src="<?= site_url('assets/file/pencaker') ?>" width="120px" height="160px">
                      </td>
                      <td align="left" valign="top" width="140px">
                        Nomor Induk Pencaker
                      </td>
                      <td align="left" valign="top">
                        <label id="nomorindukpencaker"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Nama Pencari Kerja
                      </td>
                      <td align="left" valign="top">
                        <label id="namapencaker"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Tempat/Tanggal Lahir
                      </td>
                      <td align="left" valign="top">
                        <label id="tempattgllahir"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Jenis Kelamin
                      </td>
                      <td align="left" valign="top">
                        <label id="jeniskelamin"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Email
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="email"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Password
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="password"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Telepon
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="telepon"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Alamat
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="alamat"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Kecamatan
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="namakecamatan"></label>
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        Kelurahan
                      </td>
                      <td align="left" valign="top" colspan="2">
                        <label id="namakelurahan"></label>
                      </td>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Kode Pos
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="kodepos"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Kewarganegaraan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="kewarganegaraan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Agama
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="namaagama"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Status Pernikahan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="namastatuspernikahan"></label>
                    </td>
                  </tr>
                  <tr>
                    <th align="center" colspan="3">
                      DATA PENDIDIKAN FORMAL
                    </th>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Pendidikan Terakhir
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="namastatuspendidikan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Jurusan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="namajurusan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Keterampilan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="keterampilan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      NEM/IPK
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="nemipk"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Nilai
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="nilai"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Tahun Lulus
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="tahunlulus"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Tinggi Badan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="tinggibadan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Berat Badan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="beratbadan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Penguasaan Bahasa
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="bahasa"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Pengalaman Kerja
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="pengalaman"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Keterangan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="keterangan"></label>
                    </td>
                  </tr>
                  <tr>
                    <th align="center" colspan="3">
                      JABATAN YANG DIINGINKAN
                    </th>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Posisi Jabatan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="namaposisijabatan"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Lokasi
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="lokasi"></label>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      Besar upah yang diinginkan
                    </td>
                    <td align="left" valign="top" colspan="2">
                      <label id="upahyangdicari"></label>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div align="center">
              <?php

              $this->load->library('table');

              $this->table->set_heading(
                array('data'=>'No', 'style'=>'width:0px; text-align:center;'),
                array('data'=>'Nomor Induk Pencaker', 'style'=>'text-align:center;'),
                array('data'=>'Nama Lengkap', 'style'=>'text-align:center;'),
                array('data'=>'Pendidikan Terakhir', 'style'=>'text-align:center;'),
                array('data'=>'Tgl Berakhir', 'style'=>'text-align:center;'),
                array('data'=>'Status', 'style'=>'text-align:center;'),
                array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
              );
              if ($this->pagination->total_rows > 0)
              {
                $i = 0;
                foreach ($MsPencakerData as $getdata)
                {
                  $i++;
                // $cetakbtn = '<a class="button" onclick="cetak_now(\''.$getdata->IDPencaker.'\') ">Cetak</a>';
                  $cetakak = '<a class="button" onclick="cetak_ak(\''.$getdata->IDPencaker.'\') ">Cetak AK1</a>';
                  $detailbtn = '<a class="button" onclick="DoView(\''.$getdata->IDPencaker.'\') ">Detail</a>';
                  $sendbtn = '<a class="button" href="'.site_url('admin/pencaker/lowongan/'.$getdata->IDPencaker).'">Kirim CV</a>';
                  $deletebtn = '<a class="button" onclick="DoDelete(\''.$getdata->IDPencaker.'\')">Hapus</a>';
                  $fromdate = explode("-", substr($getdata->RegisterDate,0,10));
                  $todate = explode("-", $getdata->ExpiredDate);
                  $this->table->add_row(
                    array('data'=>$i+$this->uri->segment(3)),
                    array('data'=>$getdata->NomorIndukPencaker),
                    array('data'=>$getdata->NamaPencaker),
                    array('data'=>$getdata->NamaStatusPendidikan),
                    array('data'=>$todate[2].'-'.$todate[1].'-'.$todate[0], 'style'=>'text-align:center;'),
                    array('data'=>(date('Ymd') >= $fromdate[0].$fromdate[1].$fromdate[2] && date('Ymd') <= $todate[0].$todate[1].$todate[2] ? 'Aktif' : 'Tidak Aktif'), 'style'=>'text-align:center;'),
                    array('data'=>$cetakak.$detailbtn.$sendbtn.$deletebtn, 'style'=>'text-align:center;')
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
<div style="height:0px;overflow:scroll;">
  <div id="print-area"></div>
  <div id="print-ak"></div>
</div>
<script>
  $("#fromdate").datepicker({
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
  $("#todate").datepicker({
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
  $("#dialog-view").dialog({
    autoOpen: false,
    width: 800,
    modal: true,
    buttons: {
      "Tutup" : function() {
        $(this).dialog("close");
      }
    },
    close: function() {
    }
  });

  function DoView(IDPencaker)
  {
    var src = '<?= site_url('assets/file/pencaker') ?>';
    $.get('<?= site_url('admin/pencaker/getdata') ?>/'+IDPencaker,
      function(getdata)
      {
        if (getdata.exists)
        {
          ClearAddInput();
          var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
          var tgllahir = getdata.TglLahir.split("-");
          $("#photo").attr('src',src+'/'+getdata.IDPencaker+'.jpg');
          $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
          $('#namapencaker').html(getdata.NamaPencaker);
          $('#tempattgllahir').html(getdata.TempatLahir+', '+parseInt(tgllahir[2])+' '+bulan[parseInt(tgllahir[1]-1)]+' '+tgllahir[0]);
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
          $('#namajurusan').html(getdata.Jurusan);
          $('#keterampilan').html(getdata.Keterampilan);
          $('#nemipk').html(getdata.NEMIPK == 0 ? 'NEM' : 'IPK');
          $('#nilai').html(getdata.Nilai);
          $('#tahunlulus').html(getdata.TahunLulus);
          $('#tinggibadan').html(getdata.TinggiBadan+' cm');
          $('#beratbadan').html(getdata.BeratBadan+' kg');
          $('#bahasa').html(getdata.BahasaData);
          $('#pengalaman').html(getdata.PengalamanData);
          $('#keterangan').html(getdata.Keterangan);
          $('#password').html(getdata.Password);
          $('#namaposisijabatan').html(getdata.NamaPosisiJabatan);
          $('#lokasi').html(getdata.Lokasi == 0 ? 'Dalam Negeri' : 'Luar Negeri');
          $('#upahyangdicari').html(getdata.UpahYangDicari);
          $('#dialog-view').dialog('option', 'title', 'Data Pencaker');
          $("#dialog-view").dialog("open");
        }
        else
        {
          alert('Pencaker tidak ditemukan');
        }
      },'json')
  }

  function DoDelete(id)
  {
    if (confirm("Anda yakin?") == true)
    {
      window.location.href="<?php echo site_url('admin/pencaker/delete') ?>/" + id
    }
  }

  function ClearAddInput()
  {
    $('#nomorindukpencaker').html("");
    $('#namapencaker').html("");
    $('#tempattgllahir').html("");
    $('#jeniskelamin').html("");
    $('#email').html("");
    $('#telepon').html("");
    $('#alamat').html("");
    $('#namakecamatan').html("");
    $('#namakelurahan').html("");
    $('#kodepos').html("");
    $('#kewarganegaraan').html("");
    $('#namaagama').html("");
    $('#namastatuspernikahan').html("");
    $('#namastatuspendidikan').html("");
    $('#jurusan').html("");
    $('#keterampilan').html("");
    $('#nemipk').html("");
    $('#nilai').html("");
    $('#tahunlulus').html("");
    $('#tinggibadan').html("");
    $('#beratbadan').html("");
    $('#bahasa').html("");
    $('#keterangan').html("");
    $('#namaposisijabatan').html("");
    $('#lokasi').html("");
    $('#upahyangdicari').html("");
    $('#password').html("");
  }
// function cetak_now(id) { //fungsi proses dan cetak
//       $.ajax({
//         type: 'GET',
//         url: '<?php echo base_url();?>admin/print_view/'+id,
//         success: function(data) {
//           $('#print-area').html(data);
//           //printContent("print-area");
//           //window.location = '<?php echo base_url();?>admin/pencaker';
//           $('#print-area').printThis();
//         }
//       });
//     }

    function cetak_ak(id) { //fungsi proses dan cetak
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url();?>admin/print_ak/'+id,
        success: function(data) {
          $('#print-ak').html(data);
          //printContent("print-area");
          $('#print-ak').printThis();
        }
      });
          // window.location = '<?php echo base_url();?>admin/print_ak/'+id;
    }

  </script>
