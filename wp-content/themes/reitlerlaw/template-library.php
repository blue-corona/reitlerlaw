<?php
/**
 * Template Name: Library Page Template
 */

get_header();
?>


<main class="site-content">
  <section class="subpage-banner">
    <?php 
  $banner_img = get_field('add_banner');
  ?>
    <?php if ($banner_img ) { ?>
    <picture>
      <source media="(max-width: 480px)" srcset="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($add_banner['alt']); ?>" />
      <source media="(max-width: 767px)" srcset="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($add_banner['alt']); ?>" />
      <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($add_banner['alt']); ?>" />
    </picture>
    <?php }  else { ?>

    <picture>
      <source media="(max-width: 480px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
      <source media="(max-width: 767px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
      <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
    </picture>
    <?php } ?>
  </section>
  <section class="subpage-content page-transection-content">
    <div class="container">
      <div class="partener-logo-col">
        <h1><?php the_title() ; ?></h1>
      </div>

      <div class="library-category-container row">
        <div class="col-md-6 col-xl-4" style="margin-bottom: 15px;">
          <a href="/reitler-library/newsletters/">
            <div class="library-category-block">
              <h2>Reitler Newsletters</h2>
            </div>
          </a>
        </div>
        <div class="col-md-6 col-xl-4" style="margin-bottom: 15px;">
          <a href="/reitler-library/press-releases/">
            <div class="library-category-block">
              <h2>Press Releases</h2>
            </div>
          </a>
        </div>
      </div>

    </div>

    <div class="repres-extra-sec">
      <?php if($count > 5){  ?>
      <div class="transection-extra-col transection-bt section-1 as-sw-hd"><i class="far fa-minus-circle"></i><i class="far fa-plus-circle"></i><span>View More</span></div>
      <?php } ?>
      <div class="transection-extra-col transection-form"><span><i class="far fa-search"></i> Search</span>
        <form class="transection-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
          <input type="text" name="s" id="search" class="search-text">
          <input type="image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/search-icon.png" class="submit-icon">
        </form>

      </div>
    </div>

    </div>
    </div>
  </section>
</main>
<?php
get_footer();