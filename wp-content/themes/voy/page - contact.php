<?php
/*
Template Name: contact-page
*/
 ?>
<?php get_header(); ?>

<div class="inner_title_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php the_title(); ?></h2>
      </div>
    </div>
  </div>
</div>
<div class="inner_content_section">
  <div class="container">
    <div class="row">
      <div class="contact_page">
      
      <?php while (have_posts()) : the_post(); ?>
      
        <div class="col-lg-12 col-md-12">
          <p><?php the_content(); ?></p>
        </div>
        
      <?php endwhile; ?>  
        <div class="clearfix"></div>
        <div class="contact_form_area">
          <?php echo do_shortcode('[contact-form-7 id="5" title="Contact Form"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contact_info_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php echo get_field('title'); ?></h2>
        <p><?php echo get_field('sub_title'); ?></p>
      </div>
      <div class="clearfix"></div>
      <div class="contact_posts_area">
        <div class="col-lg-4 col-md-4">
          <div class="contact_post">
          <?php echo get_field('section_one'); ?>
            
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="contact_post">
          <?php echo get_field('section_two'); ?>
           
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="contact_post">
		 <?php echo get_field('section_three'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
