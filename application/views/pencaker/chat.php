
<div class="table-form" style="height: 500px;" >
  <div style="
  background-color: #3c8dbc;
  color: rgb(255, 255, 255);
  text-align: left;
  border-bottom: 1px solid rgb(153, 153, 153);
  margin: 0px;
  padding: 5px;

  ">
  <b> KIRIM PESAN ADMIN</b>
</div>
<div style="padding:5px;height: 400px;overflow-y: scroll;" id="chatdiv">

  <div id="textdiv">
  </div>
</div>
<table class="table-form" width="100%">

  <tr>
    <td nowrap="nowrap" align="left" valign="top" style="width: 70%;">
     <textarea id="pesan" name="pesan" cols="30" rows="3" maxlength="400" style="margin: 0px;width: 611px;height: 52px;" placeholder="Isi Pesan...!"></textarea>
   </td>
   <td align="left" valign="top">
    <div align="center"><br />
      <button class="button" onclick="kirim_now();">Kirim</button>

    </div>
  </td>
</tr>
</table>
</div>
</div>
<input type="hidden" id="jum" value="0">
<script>
  setInterval(function(){ get_chat(); }, 1000);
  function get_chat(){
    var jum=$("#jum").val();
    $.getJSON("<?php echo base_url();?>pencaker/get_chat/<?php echo $iduser;?>/"+jum, function(data) {
      console.log(data);
      var i=1;
      if(data.jum_message>jum){
        $.each(data.message,function(key,val) {
              //  alert(i);
              if(i>jum){
                output_scroll(val.pengirim,val.date,val.pesan);
                console.log(val.pesan);
              }
              i=i+1;
            });
        $("#jum").val(data.jum_message);
      }
    });
  }
  function output_scroll(pengirim,tanggal,isi){
    var textdiv = $("#textdiv");
    var chatdiv = $("#chatdiv");

    if(pengirim=="admin"){
      textdiv.append('<font color="red";><b>[ADMIN] </b></font><font color="gray";><b>'+tanggal+'</b></font>: '+isi+'<hr>');
    }else{
      textdiv.append('<font color="blue";><b>[ME] </b></font><font color="gray";><b>'+tanggal+'</b></font>: '+isi+'<hr>');  
    }
    console.log(textdiv.height());
    chatdiv.scrollTop(textdiv.outerHeight());
  }
  function kirim_now(){
    var isi=$("#pesan").val();
    $.get("<?php echo base_url();?>pencaker/send_chat/<?php echo $iduser;?>/"+isi, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        console.log(data);
      });
    $("#pesan").val("");
  }
  $(document).keypress(function(e) {
    if(e.which == 13) {
      var isi=$("#pesan").val();
      if(isi!=""){
       kirim_now(); 
     }

     $("#pesan").val("");
   }
 });
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