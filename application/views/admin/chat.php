<?php 
$this->_ci=&get_instance();     
$this->_ci->load->model('MsUser');
if($id_penerima!=""){?>
<div class="table-form" style="height: 500px;" >
    <div style="
    background-color: rgb(128, 204, 128);
    color: rgb(255, 255, 255);
    text-align: left;
    border-bottom: 1px solid rgb(153, 153, 153);
    margin: 0px;
    padding: 5px;

    ">
    <b> PESAN MASUK <font color="blue";><b>[<?php echo strtoupper($this->_ci->MsUser->GetMsUserByIDUser($id_penerima)->Username);?>] </b></font></b>
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
        $.getJSON("<?php echo base_url();?>admin/get_chat/<?php echo $id_penerima;?>/"+jum, function(data) {
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
            textdiv.append('<font color="blue";><b>[<?php echo strtoupper($this->_ci->MsUser->GetMsUserByIDUser($id_penerima)->Username);?>] </b></font><font color="gray";><b>'+tanggal+'</b></font>: '+isi+'<hr>');  
        }
        console.log(textdiv.height());
        chatdiv.scrollTop(textdiv.outerHeight());
    }
    function kirim_now(){
        var isi=$("#pesan").val();
        $.get("<?php echo base_url();?>admin/send_chat/<?php echo $id_penerima;?>/"+isi, function(data, status){
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
<?php } else {?>
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
                                PESAN MASUK
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
                                    array('data'=>'Nama Pencaker', 'style'=>'text-align:center;'),
                                    array('data'=>'Info', 'style'=>'text-align:center;'),
                                    array('data'=>'Detail', 'style'=>'width:0px; text-align:center;')
                                );
                                if ($pesan_masuk->num_rows() > 0)
                                {
                                    $i = 0;
                                    foreach ($pesan_masuk->result() as $getdata)
                                    {
                                        $i++;
                                        $detailbtn = '<a class="button" href="'.site_url('admin/chat/'.$getdata->pengirim).'">Balas Pesan</a>';
                                        $this->table->add_row(
                                            array('data'=>$i+$this->uri->segment(3)),
                                            array('data'=>strtoupper($this->_ci->MsUser->GetMsUserByIDUser($getdata->pengirim)->Username), 'style'=>'text-align:center;'),
                                            array('data'=>$this->_ci->MsChat->GetJumChatPeng($getdata->pengirim)." Pesan", 'style'=>'text-align:center;'),
                                            array('data'=>$detailbtn, 'style'=>'text-align:center;')
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

//echo $this->pagination->create_links();
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>



<?php } ?>
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