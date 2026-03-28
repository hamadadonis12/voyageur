<?php get_header(); ?>
<div class="inner_title_area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2><?php single_cat_title(); ?></h2>
      </div>
    </div>
  </div>
</div>

<div class="inner_content_section">
  <div class="container">
    <div class="row">
      <div class="clearfix"></div>
      <div class="collections_posts_area">
      
      
      
      
      
      

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<?php query_posts( array( 'post_type'=>'product', 'product_category' => $term->name, 'posts_per_page'=>9, 'paged'=>$paged ) ); ?>

  
<?php if ( have_posts() ) : ?>

    
<!-- the loop -->
    
<?php while ( have_posts() ) : the_post(); ?>            
	
<?php $image_path = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'')?> 
      
      
      
      
        <div class="col-lg-4 col-md-4">
          <div class="collection_post">
            <div class="collection_post_pic"> <img src="<?php echo $image_path[0]; ?>" class="img-responsive"/>
              <div class="new_overlay"></div>
              <div class="new_overlay_btn"> <a href="<?php the_permalink(); ?>">View Detail</a> </div>
            </div>
            <div class="collection_post_detail">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <h4><?php $categories = get_the_category();
$separator = ' ';
$output = '';
if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
    }
    echo trim( $output, $separator );
} ?></h4>
            </div>
          </div>
        </div>
<?php endwhile; wp_reset_postdata();?>         
        <div class="clearfix"></div>
       
        <div class="pagenetion">
        <div class="col-lg-12 col-md-12">
        
         <ul>
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
          </ul>
        
        </div>
<?php endif; ?> 
        </div>
        
        
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>