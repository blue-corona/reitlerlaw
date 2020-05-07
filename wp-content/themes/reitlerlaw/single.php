<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
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
   <section class="subpage-content">
      <div class="container">
         <div class="row">
            <div class="col-xl-9">
               <div class="left-content">
                  <h1><?php the_title() ; ?></h1>
                  <?php while (have_posts() ) : the_post() ; ?>
                  	<?php  the_content() ; ?>
                  <?php endwhile ; ?>
               </div>
            </div>
            <div class="col-xl-3">
               <?php include('sidebar.php') ; ?>
            </div>
         </div>
      </div>
   </section>
</main>
<?php get_template_part('service-cta'); ?>
<?php
get_footer();
