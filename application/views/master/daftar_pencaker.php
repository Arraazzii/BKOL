<!-- /.content -->
<!-- Content Header (Page header) -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styleBaru.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.css"/>
<link rel="stylesheet" href="http://localhost/bkol/assets/plugins/sweetalert/sweetalert2.min.css">
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">DAFTAR PENCARI KERJA</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <table class="table">
                <tr>
                    <td align="left">
                        PERIODE
                    </td>
                    <td align="left" >
                        <div class="row">
                            <div class="col-lg-4">
                                <input class="form-control" id="fromdate" name="fromdate" type="text" value="<?= $fromdate != '' ? $fromdate : (date('Y')-1).date('-m-d') ?>" size="10" maxlength="10" readonly="true">
                            </div>
                            <div class="col-lg-1 text-center">
                                S/D
                            </div>
                            <div class="col-lg-4">
                                <input class="form-control" id="todate" name="todate" type="text" value="<?= $todate != '' ? $todate : date('Y-m-d') ?>" size="10" maxlength="10" readonly="true">
                            </div>
                            <div class="col-lg-3 pull-right">
                                <input id="cari" name="cari" type="button" value="Cari" class="btn btn-success col-sm-12">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Laki-laki
                    </td>
                    <td align="left">
                        <span class="label label-info" id="LabelPria"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">
                        Perempuan
                    </td>
                    <td align="left">
                       <span class="label label-success" id="LabelWanita"></span>
                   </td>
               </tr>
               <tr>
                <td align="left">
                    Jumlah Pencari Kerja
                </td>
                <td align="left">
                   <span class="label label-warning" id="LabelTotal"></span>
               </td>
           </tr>
       </table>
       <div id="tablePencaker">

       </div>
   </div>
   <!-- /.box-body -->
</div>
</div>
</section>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<script src="http://localhost/bkol/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>

<script>
 $(document).ready(function(){
    DataPencaker($("#fromdate").val(), $("#todate").val());
    $("#fromdate").datepicker({
        constrainInput: true,
        changeMonth: true,
        changeYear: true,
        format: 'yyyy-mm-dd',
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
        format: 'yyyy-mm-dd',
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
});


 function getFormattedDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear().toString();
    return year + '-' + month + '-' + day;
}

$("#cari").click(function(){
    if ($("#fromdate").val() == '' || $("#todate").val() == '') {
        swal('ERROR!', 'Silahkan Pilih Range Tanggal Terlebih Dahulu!', 'warning');
    }else{
        DataPencaker($("#fromdate").val(), $("#todate").val());
    }
});

function DataPencaker(start, end){
    $.ajax({
        url: "<?php echo base_url();?>root/filterPencakerInHome",
        type: "post",
        data: {start: start, end: end} ,
        dataType: "JSON",
        success: function (response) {
          $("#tablePencaker").find("#dataTable").remove();
          $("#tablePencaker").find("#dataTable_wrapper").remove();
          if ($.fn.DataTable.isDataTable('#dataTable')) {
            $('#dataTable').DataTable().destroy();
        }
        var count = 1;
        var html = "<table class='table table-bordered table-hover table-striped' id='dataTable'><thead><tr><th class='text-center'>No</th><th class='text-center'>Nomor Induk Pencaker</th><th class='text-center'>Nama Lengkap</th><th class='text-center'>Pendidikan Terakhir</th><th class='text-center'>Tanggal Registrasi</th></tr></thead><tbody>";
        $.each(response.namaDetail, function(i, result){
            html += "<tr>";
            html += "<td class='text-center'>"+ (count++) +"</td>";
            html += "<td class='text-center'>"+ result.NomorIndukPencaker +"</td>";
            html += "<td class='text-center'>"+ result.NamaPencaker +"</td>";
            html += "<td class='text-center'>"+ result.NamaStatusPendidikan +"</td>";
            html += "<td class='text-center'>"+ result.registerDate +"</td>";
            html += "</tr>";
        });
        html += "</tbody>";
        html += "</table>";

        $("#tablePencaker").append(html);
        $("#dataTable").dataTable();
        $.each(response.total, function(i, resultTotal){
            $("#LabelPria").html(resultTotal.laki + " Orang");
            $("#LabelWanita").html(resultTotal.cewe + " Orang");
            $("#LabelTotal").html(resultTotal.total + " Orang");
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
  }
});
}
</script>