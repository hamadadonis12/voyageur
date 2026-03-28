<?php
/*
Template Name: lookbook-page
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
      <div class="col-lg-12 col-md-12">
        <div class="lookbook_area">
          <?php if( have_rows('slides') ) { ?>
          <?php
                    $num = 0;
                    $active = 'active';
                ?>
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <?php $active = 'active'; ?>
              <?php while( have_rows('slides') ) : the_row() ;
					$image      = get_sub_field('image'); ?>
              <div class="item <?php echo $active; ?>"> <img src="<?php echo $image;  ?>" alt="Slider"> </div>
              <?php $active = ''; ?>
              <?php endwhile; ?>
            </div>
            <div class="carousel-controls"> <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo get_template_directory_uri(); ?>/images/left_arrow.jpg" alt="" width="59" height="56"/></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo get_template_directory_uri(); ?>/images/right_arrow.jpg" alt="" width="59" height="56"/></a> </div>
          </div>
          <?php  } ?>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
              <div class="download_btn"> <a href="<?php echo get_field('button_link'); ?>"><?php echo get_field('button_title'); ?></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
