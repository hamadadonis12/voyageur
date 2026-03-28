<? php
/*
Template Name: choice-page
*/
 ?>
<?php get_header(); ?>

<div class="inner_title_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2>
          <?php the_title(); ?>
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="inner_content_section">
  <div class="container">
    <div class="row">
      <div class="choice_page">
        <div class="col-lg-12 col-md-12">
			
			  <?php echo do_shortcode('[robo-gallery id="318"] '); ?>
			
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
