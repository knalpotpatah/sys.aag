<!--==========================
    Intro Section
	============================-->
	<section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>We provide<br><span>solutions</span><br>for your business!</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
          <a href="#services" class="btn-services scrollto">Our Services</a>
        </div>
      </div>

    </div>
	</section>
	<!-- #intro -->
<div class="conwidth">	
<br><br>
        <div class="row" id="">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2></h2>
            </div>
          </div>
        </div>
<br>
		<div class="conwidth2" >
		<div class="row mb-4" >
			<?php 
			foreach ($new as $ne) :
			?>
			<div class="col-sm-6 col-lg-4 mb-3 " data-aos="fade-up" >
				<div class="post-entry-1 h-100">
				  <a href="">
					<img src="<?=base_url('img/blog/').$ne->img.$ne->img_type;?>" alt="" 
						style="border-radius: px; 
									box-shadow: 0 0 px black;
									-o-border-radius: px;
									width:100%;
									height:50%;
									margin-bottom:10px;">
				  </a>
				<div class="post-entry-1-contents">
					
				<h2><a href="single.html"><?= $ne->nama ?></a></h2>
				<p><?= substr($ne-> ket,0,100);?></p>
				<center>
				<a href="<?= site_url('news/detail/'.$ne->id) ?>" class="btn btn-info">Read more</a>
				</center>
				</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
		</div>
  <!-- End Blog -->

	   
	<?php $this->load->view('front/client')?>
	
	
	<?php $this->load->view('front/contact')?>
</div> 	
<div class="conwidth3">	
	<?php $this->load->view('front/template/foot')?> 
	</main>
</div>