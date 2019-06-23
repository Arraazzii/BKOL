<style type="text/css">
.color-indicator-carousel{
	color: #3c8dbc;
	background: #fff;
	border-radius: 50px;
	font-size: 24px !important;
	height: 28px !important; 
}
</style>
<div class="row">
	<?php if (!empty($sliderActive)) { ?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>
		<div class="carousel-inner">
				<?php
				$isFirst = 1;
				foreach ($sliderActive as $dataSliderActive) { ?> 
				<?php $item_class = ($isFirst == 1) ? 'item active' : 'item'; ?>
				<div class="<?php echo $item_class;?>">
					<img src="<?php echo site_url('assets/slider');?>/<?php echo $dataSliderActive['gambar'];?>" alt="" class="img-responsive stretch" style="height: 350px;object-fit: cover;object-position: center;">
				</div>
			<?php $isFirst++; }?>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="color-indicator-carousel glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="color-indicator-carousel glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</div>
<?php } ?>
<!-- <div class="row"> -->
<!-- 	<a href="https://www.depok.go.id/19/09/2018/01-berita-depok/pengumuman-penerimaan-cpns-kota-depok-tahun-2018" target="_blank"><img src="<?php //echo site_url('assets/css/images/banner.png'); ?>" alt="" class="img-responsive stretch"></a>
</div> -->