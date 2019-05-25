<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:site_name" content="BKOL DEPOK">
<meta property="og:title" content="Bursa Lowongan Kerja Online KOTA DEPOK" />
<meta property="og:description" content="Lowongan Dan Data Pekerjaan Kota Depok" />
<meta property="og:image" itemprop="image" content="<?php echo site_url();?>assets/depok.png">
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
<table width="100%" class="table-form">
	<tr>
		<th align="center" colspan="3">
			<div align="center">
				GALERY FOTO
			</div>
		</th>
	</tr>
	<tr>
		<td align="left">
			<div id="gallery">
				<a href="#" class="show">
					<img src="<?php echo base_url();?>assets/css/slides/foto1.png" alt="Foto 1" width="698" height="238" title="" alt="" rel="<h3>Judul Gambar 1</h3>Keterangan Gambar 1."/>
				</a>
				<a href="#">
					<img src="<?php echo base_url();?>assets/css/slides/foto2.png" alt="Foto 2" width="698" height="238" title="" alt="" rel="<h3>Judul Gambar 2</h3>Keterangan Gambar 2."/>
				</a>
				<a href="#">
					<img src="<?php echo base_url();?>assets/css/slides/foto3.png" alt="Foto 3" width="698" height="238" title="" alt="" rel="<h3>Judul Gambar 3</h3>Keterangan Gambar 3."/>
				</a>
				<div class="caption">
					<div class="content">
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</td>
	</tr>
</table>
<script>
	$(document).ready(function() {		
		
	//Execute the slideShow
	slideShow();

});

	function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',5000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '50px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}
</script>
