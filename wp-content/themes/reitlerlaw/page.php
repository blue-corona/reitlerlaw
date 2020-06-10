<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
		 <?php /* if(get_field('hide_sidebar'))? echo ""; endif; */ ?>
		 
            <div class="<?php echo get_field('hide_sidebar')? "col-lg-12" :"col-lg-8 col-xl-9"; ?>">
               <div class="left-content">
                  <h1><?php the_title() ; ?></h1>
                  <?php while (have_posts() ) : the_post() ; ?>
                  	<?php  the_content() ; ?>
                  <?php endwhile ; ?>
                  <div class="hidden-content" data-lr="learn">
                     <?php the_field('add_hidden_content') ; ?>
                  </div>
                  <?php if (get_field('add_hidden_content') ) { ?>
                  <span class="expandable-btn as-sw-hd"><i class="fal fa-chevron-circle-right"></i><span>learn more</span></span>
                  <?php } ?>
				  
               </div>
            </div>
			<?php if(!get_field('hide_sidebar')): ?>
            <div class="col-lg-4 col-xl-3">
               <?php include('sidebar.php') ; ?>
            </div>
			<?php endif; ?>
         </div>
      </div>
   </section>
</main>

<?php get_footer();
