<?php
/*
Template Name: collection-page
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

      <div class="collections_posts_area">

        <?php
          // IMPORTANT: change this if your images are in /2026/01/ or similar
          $uploads_base = site_url('/wp-content/uploads/2026/');

          $items = [
            [
              'id'    => 310,
              'title' => 'Royal Collection',
              'img'   => $uploads_base . rawurlencode('DSC02312.jpg'),
            ],
            [
              'id'    => 305,
              'title' => 'Flame of Loves',
              'img'   => $uploads_base . rawurlencode('Post2-2.jpg'),
            ],
            [
              'id'    => 298,
              'title' => 'Simplicity',
              'img'   => $uploads_base . rawurlencode('Artboard2-100.jpg'),
            ],
            [
              'id'    => 295,
              'title' => 'Eternal Vow',
              'img'   => $uploads_base . rawurlencode('Post12.jpg'),
            ],
            // Add more items here if you want (same format)
            // ['id'=>123,'title'=>'New Item','img'=>$uploads_base . rawurlencode('image.jpg')],
          ];

          foreach ($items as $item):
            $link = get_permalink($item['id']);
        ?>

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="collection_post collection_post_clean">
              <a href="<?php echo esc_url($link); ?>" class="collection_link">
                <div class="collection_post_pic collection_post_pic_clean">
                  <img src="<?php echo esc_url($item['img']); ?>" class="img-responsive" alt="<?php echo esc_attr($item['title']); ?>">
                </div>

                <div class="collection_post_detail collection_post_detail_clean">
                  <h3><?php echo esc_html($item['title']); ?></h3>
                </div>
              </a>
            </div>
          </div>

        <?php endforeach; ?>

        <div class="clearfix"></div>

      </div>

    </div>
  </div>
</div>

<!-- Inline CSS so it matches your screenshot immediately (no cache/CSS file issues) -->
<style>
.collection_post_clean{
  margin-bottom: 45px;
  text-align: center;
}
.collection_post_clean .collection_link{
  text-decoration: none !important;
  color: inherit;
  display: block;
}
.collection_post_pic_clean img{
  width: 100%;
  height: 320px;          /* adjust height if needed */
  object-fit: cover;
  display: block;
}
.collection_post_detail_clean h3{
  margin-top: 18px;
  font-size: 22px;
  font-weight: 400;
}
</style>

<?php get_footer(); ?>
