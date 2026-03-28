<?php
/*
Template Name: about-page
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
<div class="inner_content_section" id="about_page">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <p><?php echo get_field('section_one_content'); ?></p>
        <h3><?php echo get_field('section_one_quote'); ?></h3>
        <img src="<?php echo get_field('signature'); ?>" width="215" height="105"/> </div>
    </div>
  </div>
</div>
<div class="journey_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php echo get_field('section_two_title'); ?></h2>
        <p><?php echo get_field('section_two_content'); ?></p>
        <p> 
      </div>
    </div>
  </div>
</div>
<div class="dream_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php echo get_field('section_three_title'); ?></h2>
        <p><?php echo get_field('section_three_content'); ?></p>
      </div>
    </div>
  </div>
</div>
<div class="journey_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php echo get_field('section_four_title'); ?></h2>
        <p><?php echo get_field('section_four_content'); ?></p>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
