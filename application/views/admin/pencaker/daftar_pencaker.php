<!-- Content Header (Page header) -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/printThis.js'; ?>"></script>
<section class="content-header">
  <h1>
    Daftar
    <small>Pencaker</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
    <li><a href="#">Daftar</a></li>
    <li class="active">Pencaker</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header text-center">
      <h3 class="box-title">DAFTAR PENCARI KERJA</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="tabel-pencaker">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Induk Pencaker</th>
            <th>Nama Lengkap</th>
            <th>Pendidikan Terakhir</th>
            <th>Tgl Registrasi</th>
            <th class="text-center">Detail</th>
          </tr>
        </thead>
      </table>
      <div id="print-area"></div>
      <div id="print-ak"></div>
    </div>
  </div>
</div>
</section>

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
        <td align="left" valign="top" rowspan="4" width="120px">
         <img id="photo" src="<?= site_url('assets/file/temp') ?>" width="120px" height="160px">
       </td>
       <td align="left" valign="top" width="140px">
         ID Pencaker
       </td>
       <td align="left" valign="top">
         <span id="idpencaker"></span>
       </td>
     </tr>
     <tr>
      <td nowrap="nowrap" align="left" valign="top">
       Nomor Induk Pencaker(NIK)
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
 <td align="left" valign="top" colspan="2">
   <span id="jeniskelamin"></span>
 </td>
</tr>
 <tr>
  <td nowrap="nowrap" align="left" valign="top">
   Minat Kerja
 </td>
 <td align="left" valign="top" colspan="2">
   <span id="typePekerjaan"></span>
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
  <span id="namajurusan"></span>
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
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
<script>
  $(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var table = $("#tabel-pencaker").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('input.DT', function() {
          api.search(this.value).draw();
        });
      },
      oLanguage: {
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "&laquo;",
          "sNext":     "&raquo;",
          "sLast":     "Terakhir"
        }
      },
      processing: true,
      serverSide: true,
      ajax: {"url": "<?php echo base_url('ajax/get_pencaker_json')?>", "type": "POST"},
      columns: [
      {"data": "No","sortable" : false,"searchable" : false},
      {"data": "NomorIndukPencaker"},
      {"data": "NamaPencaker"},
      {"data": "NamaStatusPendidikan"},
      {"data": "RegisterDate","sortable" : false,"searchable" : false},
      {"data": "view","sortable" : false,"searchable" : false}
      ],
      order: [[4, 'desc']],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
      }

    });
  });
  function DoView(IDPencaker)
  {

    var src = '<?= site_url('assets/file/pencaker') ?>';
    $.get('<?= site_url('admin/pencaker/getdata') ?>/'+IDPencaker,
      function(getdata)
      {
        if (getdata.exists)
        {
          var inst = $('#modal-detail');
          inst.modal('show');
          ClearAddInput();
          var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
          var tgllahir = getdata.TglLahir.split("-");
          // var cari = src+'/'+getdata.IDPencakerTemp+'.jpg';
          $.ajax({
            url: '<?php echo site_url();?>assets/file/pencaker'+'/'+getdata.IDPencaker+'.jpg',
            type:'HEAD',
            error: function()
            {
              $("#photo").attr('src','http://ssl.gstatic.com/accounts/ui/avatar_2x.png');
            },
            success: function()
            {
              $("#photo").attr('src',src+'/'+getdata.IDPencaker+'.jpg');
            }
          });
          $('#idpencaker').html(getdata.IDPencaker);
          $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
          $('#namapencaker').html(getdata.NamaPencaker);
          $('#tempattgllahir').html(getdata.TempatLahir+', '+parseInt(tgllahir[2])+' '+bulan[parseInt(tgllahir[1]-1)]+' '+tgllahir[0]);
          $('#jeniskelamin').html(getdata.JenisKelamin == 0 ? 'Pria' : 'Wanita');
          $('#typePekerjaan').html(getdata.TypePekerjaan == 0 ? 'Karyawan' : 'Wirausaha');
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
          // $('#dialog-view').dialog('option', 'title', 'Data Pencaker');
          // $("#dialog-view").dialog("open");
        }
        else
        {
          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Pencaker Tidak Ditemukan!'
          })
        }
      },'json')
  }

  function DoDelete(id)
  {
    $.get('<?= site_url('admin/pencaker/getdata') ?>/'+id,
      function(getdata)
      {
       if (getdata.exists)
       {
        swal({
          title: 'Hapus Data Pencaker?',
          text: "Pencaker "+getdata.NamaPencaker+" akan dihapus!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.value) {
            window.location.href = '<?= site_url('admin/pencaker/delete') ?>/' + id;
          }
        })
      }
      else
      {
        swal({
          type: 'error',
          title: 'Oops...',
          text: 'Pencaker Tidak Ditemukan!'
        })
      }
    },'json')
  }

  function ClearAddInput()
  {
    $('#nomorindukpencaker').html("");
    $('#namapencaker').html("");
    $('#tempattgllahir').html("");
    $('#jeniskelamin').html("");
    $('#email').html("");
    $('#telepon').html("");
    $('#typePekerjaan').html("");
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