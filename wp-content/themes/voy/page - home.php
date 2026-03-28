<?php
/*
Template Name: home-page
*/
 ?>
<?php get_header(); ?>


      <?php query_posts('post_type=banner');?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'')?>

<div class="banner" style="background:url('wp-content/uploads/voybanner.jpg') no-repeat; background-size:cover; background-position:center;">
  <div class="container" style="
    height: 900px">
    <div class="row">
      <div class="col-lg-12 col-md-12">
      
      
    
        
      <?php endwhile; ?>
      <?php endif; wp_reset_query();?>
        
      </div>
    </div>
  </div>
</div>
<div class="featured_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2>Featured Pieces</h2>
        <p>The rose gold obsession</p>
      </div>
      <div class="clearfix"></div>
      <div class="featured_posts_area">

<?php
$uploads_base = site_url('/wp-content/uploads/2026/');

$featured = [
  [
    'id'    => 310,
    'title' => 'Royal Collection',
    'img'   => $uploads_base . rawurlencode('DSC02312.jpg'),
  ],
  [
    'id'    => 305,
    'title' => 'Flame of Love',
    'img'   => $uploads_base . rawurlencode('Post2-2.jpg'),
  ],
  [
    'id'    => 298,
    'title' => 'Simplicity',
    'img'   => $uploads_base . rawurlencode('Artboard2-100.jpg'),
  ],
  [
    'id'    => 295,
    'title' => 'Eternal Vows',
    'img'   => $uploads_base . rawurlencode('Post12.jpg'),
  ],
];

foreach ($featured as $item):
  $link = get_permalink($item['id']);
?>
  <div class="col-lg-3 col-md-3">
    <a href="<?php echo esc_url($link); ?>">
      <div class="featured_post">
        <img src="<?php echo esc_url($item['img']); ?>" class="img-responsive" alt="<?php echo esc_attr($item['title']); ?>"/>
        <h3><?php echo esc_html($item['title']); ?></h3>
      </div>
    </a>
  </div>
<?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
<div class="about_section">
  <div class="container">
  
      <?php query_posts('post_type=about');?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'')?>
  
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php the_title(); ?></h2>
        <p><?php echo get_field('sub_title'); ?></p>
      </div>
      <div class="clearfix"></div>
      <div class="about_details_section">
        <div class="col-lg-6 col-md-6">
          <div class="about_left">
<div class="col-lg-6 col-md-6">
  <div class="about_left">
    <img
      src="<?php echo esc_url( site_url('/wp-content/uploads/2026/pictureaboutsection.jpg') ); ?>"
      class="img-responsive"
      alt="About image"
      style="max-width:200%; height:auto; margin-bottom:15px;"
    />

    <h3><?php echo get_field('brown_text'); ?></h3>
  </div>
</div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="about_right">
            <p><?php the_content(); ?></p>
          </div>
        </div>
      </div>
    </div>
    
      <?php endwhile; ?>
      <?php endif; wp_reset_query();?>
    
  </div>
</div>

      <?php query_posts('post_type=sale');?>
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'')?>

<div class="mid_banner" style=" background:url(<?php echo get_template_directory_uri(); ?>/images/bottom_banner.jpg) no-repeat;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="banner_caption">
          <p><?php the_title(); ?></p>
          <h2><?php echo get_field('sub_title'); ?></h2>
          <p><?php the_content(); ?></p>
          <a href="<?php echo get_field('button_link'); ?>"><?php echo get_field('button_text'); ?></a> </div>
      </div>
    </div>
  </div>
</div>

      <?php endwhile; ?>
      <?php endif; wp_reset_query();?>

<div class="insta_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2>#VoyageurJewelry</h2>
        <p>Latest from Instagram</p>
      </div>
    </div>
  </div>
  <div class="insta_banner"> <img src="<?php echo get_template_directory_uri(); ?>/images/insta.jpg" class="img-responsive"/> </div>
</div>
  <?php get_footer(); ?>
