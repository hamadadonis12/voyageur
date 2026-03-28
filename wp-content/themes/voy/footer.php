<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="newsletter_section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
        <h2>Our Newsletter</h2>
        <p>Get E-mail updates about our new arrivals and special offers.</p>
        <div class="newsletter_field_area">
          <input class="newsletter_field" name="" type="text" placeholder="Email Address">
          <input class="newsletter_btn" name="" type="button" value="Subscribe">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="footer">
  <div class="container">
    <div class="row">

      <div class="col-lg-4 col-md-4">
        <div class="footer_post">
          <h2>Contact</h2>

          <p>Address: Beirut-Charles El Helou Avenue - One oak building – ground floor</p>
          <p>
            Dbayeh: +961 4 54 17 77<br>
            Beirut: +961 1 111 490
          </p>

          <ul class="footer_social">
            <li><a href="http://www.facebook.com/voyageurjewelry" target="_blank" rel="noopener"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="http://www.instagram.com/voyageurjewelry" target="_blank" rel="noopener"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>

        </div>
      </div>

      <div class="col-lg-4 col-md-4">
        <div class="footer_post" id="footer_post_mid"></div>
      </div>

      <div class="col-lg-4 col-md-4">
        <div class="footer_post"></div>
      </div>

    </div>
  </div>
</div>

<div class="footer_bottom">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="pull-left copyright">
          <?php
            if (is_active_sidebar('sidebar-6')) {
              dynamic_sidebar('sidebar-6');
            }
          ?>
        </div>

        <div class="pull-right designby">
          <?php
            if (is_active_sidebar('sidebar-7')) {
              dynamic_sidebar('sidebar-7');
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<a id="back-to-top" href="#" class="back-to-top" role="button" title="">
  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/top_btn.jpg" width="38" height="38" alt="Top">
</a>

<!-- jQuery -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
  jQuery('.carousel').carousel({ interval: 5000 });
</script>

<script>
  jQuery(document).scroll(function() {
    var y = jQuery(this).scrollTop();
    if (y > 200) {
      jQuery('.topMenu').fadeIn();
    } else {
      jQuery('.topMenu').fadeOut();
    }
  });
</script>

<script>
jQuery(document).ready(function() {
  jQuery('#pinBoot').pinterest_grid({
    no_columns: 4,
    padding_x: 30,
    padding_y: 30,
    margin_bottom: 50,
    single_column_breakpoint: 700
  });
});

;(function ($, window, document, undefined) {
  var pluginName = 'pinterest_grid',
      defaults = {
        padding_x: 10,
        padding_y: 10,
        no_columns: 3,
        margin_bottom: 50,
        single_column_breakpoint: 700
      },
      columns,
      $article,
      article_width;

  function Plugin(element, options) {
    this.element = element;
    this.options = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  }

  Plugin.prototype.init = function () {
    var self = this, resize_finish;
    $(window).resize(function() {
      clearTimeout(resize_finish);
      resize_finish = setTimeout(function () {
        self.make_layout_change(self);
      }, 11);
    });
    self.make_layout_change(self);
    setTimeout(function() { $(window).resize(); }, 500);
  };

  Plugin.prototype.calculate = function (single_column_mode) {
    var self = this,
        row = 0,
        $container = $(this.element);

    $article = $(this.element).children();

    if (single_column_mode === true) {
      article_width = $container.width() - self.options.padding_x;
    } else {
      article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
    }

    $article.each(function() {
      $(this).css('width', article_width);
    });

    columns = self.options.no_columns;

    $article.each(function(index) {
      var current_column,
          left_out = 0,
          top = 0,
          $this = $(this),
          prevAll = $this.prevAll();

      current_column = (single_column_mode === false) ? (index % columns) : 0;

      for (var t = 0; t < columns; t++) { $this.removeClass('c'+t); }

      if (index % columns === 0) { row++; }

      $this.addClass('c' + current_column);
      $this.addClass('r' + row);

      prevAll.each(function() {
        if ($(this).hasClass('c' + current_column)) {
          top += $(this).outerHeight() + self.options.padding_y;
        }
      });

      left_out = (single_column_mode === true) ? 0 : (index % columns) * (article_width + self.options.padding_x);

      $this.css({ 'left': left_out, 'top' : top });
    });

    this.tallest($container);
    $(window).resize();
  };

  Plugin.prototype.tallest = function (_container) {
    var column_heights = [], largest = 0;

    for (var z = 0; z < columns; z++) {
      var temp_height = 0;
      _container.find('.c'+z).each(function() { temp_height += $(this).outerHeight(); });
      column_heights[z] = temp_height;
    }

    largest = Math.max.apply(Math, column_heights);
    _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
  };

  Plugin.prototype.make_layout_change = function (_self) {
    if ($(window).width() < _self.options.single_column_breakpoint) {
      _self.calculate(true);
    } else {
      _self.calculate(false);
    }
  };

  $.fn[pluginName] = function (options) {
    return this.each(function () {
      if (!$.data(this, 'plugin_' + pluginName)) {
        $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
      }
    });
  };

})(jQuery, window, document);
</script>

<script>
jQuery(document).ready(function(){
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 50) {
      jQuery('#back-to-top').fadeIn();
    } else {
      jQuery('#back-to-top').fadeOut();
    }
  });

  jQuery('#back-to-top').click(function () {
    jQuery('body,html').animate({ scrollTop: 0 }, 800);
    return false;
  });
});
</script>

<script>
jQuery(document).ready(function(){
  jQuery('p').each(function() {
    var $this = jQuery(this);
    if ($this.html().replace(/\s|&nbsp;/g, '').length == 0) $this.remove();
  });
});
</script>

<!-- WhatsApp Floating Button -->
<a class="whatsapp-float"
   href="https://wa.me/96103636346?text=<?php echo urlencode('Hello, I need help'); ?>"
   target="_blank" rel="noopener">
  <span class="wa-icon">WA</span>
</a>

<?php wp_footer(); ?>

</body>
</html>
