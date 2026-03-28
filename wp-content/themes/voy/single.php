<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<div class="inner_content_section">
  <div class="container">
    <div class="row">
      <div class="single_page">
        <div class="col-lg-6 col-md-6">
          <div class="single_slider_area">
            <?php if( have_rows('slides') ) { ?>
            <div class="carousel slide article-slide" id="myCarousel">
              <div class="carousel-inner pro-slider">
                <?php $active = 'active'; ?>
                <?php while( have_rows('slides') ) : the_row() ;
					$image      = get_sub_field('image'); ?>
                    
                <div class="item <?php echo $active; ?>"> <img src="<?php echo $image;  ?>"> </div>
                <?php $active = ''; ?>
                <?php endwhile; ?>
              </div>
              <?php
                    $num = 0;
                    $active = 'active';
                ?>
              <ol class="carousel-indicators visible-lg visible-md">
                <?php while( have_rows('slides') ) : the_row() ; $image      = get_sub_field('image'); ?>
                <li class="<?php echo $active; ?>" data-slide-to="<?php echo $num; ?>" data-target="#myCarousel"> <img alt="" title="" src="<?php echo $image;  ?>"> </li>
                <?php 
                            $num++;
                            $active = '';
                        ?>
                <?php endwhile; ?>
              </ol>
              <?php  } ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="single_product_details">
            <h2>
            <?php the_title(); ?>
            <h2>
            <h3>
              <?php single_cat_title(); ?>
            </h3>
            <ul>
              <li><span>MODEL:</span> <?php echo get_field('model'); ?>﻿﻿</li>
              <li><span>18 Kt  GOLD:</span> <?php echo get_field('18_kt__gold'); ?></li>
              <li><span>DIAMOND:</span> <?php echo get_field('diamond'); ?></li>
              <li><span>AMETHYST:</span> <?php echo get_field('amethyst'); ?></li>
            </ul>
            <h4>Description: </h4>
            <p>
              <?php the_content(); ?>
            </p>
            <div class="clearfix"></div>
            <?php /*?><div class="share_area">
              <h4>Share: </h4>
              <img src="images/share_links.jpg"/> </div><?php */?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
