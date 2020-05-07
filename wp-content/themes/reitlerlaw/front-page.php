<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section class="banner-section">
  <div class="banner-slider">
    <?php if(get_field('add_slider')): ?>
    <?php while(has_sub_field('add_slider')): ?>
    <div class="banner-section-image" data-href="<?php the_sub_field('slider_mobile_link'); ?>" style="background-image: url(<?php the_sub_field('slider_image'); ?>);">
      <div class="container">
        <div class="banner-content">
          <h1 class="banner-title">
            <?php the_sub_field('slider_text'); ?>
          </h1>
          <?php if(get_sub_field('slider_sub_text')): ?>
          <span class="banner-sub-text"><?php the_sub_field('slider_sub_text'); ?></span>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
<main class="site-content">
  <?php get_template_part('service-cta'); ?>
  <section class="video-section">
    <div class="video-inner-section">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-xl-6">
            <div class="row align-items-center">
              <div class="col-xl-4">
                <div class="video-logo">
                  <?php 
                              $event_logo = get_field('event_logo');
                              if( !empty( $event_logo ) ): ?>
                  <a target="_blank" href="https://www.vcsonskis.com"><img data-src="<?php echo esc_url($event_logo['url']); ?>" alt="<?php echo esc_attr($event_logo['alt']); ?>" /></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-xl-8">
                <div class="video-content-section">
                  <div class="video-heading">
                    <?php the_field('event_heading'); ?>
                  </div>
                  <span class="video-text"><?php the_field('event_sub_heading'); ?><span><br /><a href="JavaScript:Void(0);" class="video-bt" data-toggle="modal" data-target="#myModal"><i class="far fa-play-circle"></i><span>play video</span> </a>
                </div>
                <div class="video-content-section">
                  <div class="video-heading">
                    <?php the_field('event_location'); ?>
                  </div>
                  <span class="video-text"><?php the_field('event_content'); ?><span><br /><a href="JavaScript:Void(0);" class="video-bt" data-toggle="modal" data-target="#myModal-1"><i class="far fa-play-circle"></i><span>play video</span> </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="video-right-image">
              <?php 
                        $event_large_image = get_field('event_large_image');
                        if( !empty( $event_large_image ) ): ?>
              <img data-src="<?php echo esc_url($event_large_image['url']); ?>" alt="<?php echo esc_attr($event_large_image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<div id="myModal" class="modal fade video-popup" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body">
        <iframe src="<?php the_field('event_iframe_url'); ?>" frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

    </div>

  </div>
</div>
<div id="myModal-1" class="modal fade video-popup" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <div class="modal-body">
        <iframe src="<?php the_field('another_event_iframe_url'); ?>" frameborder="0" allow="accelerometer; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

    </div>

  </div>
</div>
<?php get_footer();