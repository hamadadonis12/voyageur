<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <!-- Theme CSS -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>

  <?php wp_head(); ?>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-29RSBBVCB7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-29RSBBVCB7');
</script>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>

<div class="topMenu">
  <div class="top_menu_header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2">
          <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <img
                src="<?php echo esc_url( 'https://kagensee.com/wp-content/uploads/2025/08/0.jpg' ); ?>"
                alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                loading="lazy"
                style="max-height:40px;height:auto;width:auto;"
              />
            </a>
          </div>
        </div>

        <div class="col-lg-10 col-md-10">
          <div class="nav_section">
            <nav class="navbar navbar-inverse" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav-top">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="primary-nav-top">
                <?php
                  wp_nav_menu( [
                    'theme_location' => 'primary',       // use location (not a menu name)
                    'menu_id'        => 'top-primary',   // unique id for this instance
                    'depth'          => 2,
                    'container'      => '',
                    'menu_class'     => 'nav navbar-nav',
                    'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
                    'walker'         => new wp_bootstrap_navwalker(),
                  ] );
                ?>
              </div>
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="header">
  <div class="top_bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="header_left">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ) { dynamic_sidebar( 'sidebar-1' ); } ?>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header_right">
            <ul>
              <?php if ( is_active_sidebar( 'sidebar-2' ) ) { dynamic_sidebar( 'sidebar-2' ); } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="logo_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-lg-offset-4 col-md-offset-4">
          <div class="logo">
            <span>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img
                  src="<?php echo esc_url( 'https://kagensee.com/wp-content/uploads/2025/08/0.jpg' ); ?>"
                  alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                  loading="lazy"
                  style="max-height:60px;height:auto;width:auto;"
                />
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nav_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="nav_section">
            <nav class="navbar navbar-inverse" role="navigation">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-nav-main">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>

              <div class="collapse navbar-collapse" id="primary-nav-main">
                <?php
                  wp_nav_menu( [
                    'theme_location' => 'primary',        // use location (not a menu name)
                    'menu_id'        => 'main-primary',   // unique id for this instance
                    'depth'          => 2,
                    'container'      => '',
                    'menu_class'     => 'nav navbar-nav',
                    'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
                    'walker'         => new wp_bootstrap_navwalker(),
                  ] );
                ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
