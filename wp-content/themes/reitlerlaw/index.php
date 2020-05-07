<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
   	<?php $page_for_posts = get_option( 'page_for_posts' ); ?>
   	<?php 
   		$banner_img = get_field('add_banner', $page_for_posts );
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
                  <h1>Our Blog</h1>
                  <?php if ( have_posts() ) : ?>
               <?php /* Start the Loop */ ?>
               <?php while ( have_posts() ) : the_post(); ?>
               <div id="post-<?php the_ID(); ?>" class="post_single">
                  <?php if ( is_sticky() ) : ?>
                  <hgroup>
                     <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                     <h3 class="entry-format"><?php _e( 'Featured', 'axberg' ); ?></h3>
                  </hgroup>
                  <?php else : ?>
                  <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                  <?php endif; ?>
                  <div class="posted_date">
                     <span class="sep">Posted on: </span><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y') ?></a>							
                  </div>
                  <?php the_excerpt(); ?>
                  
                     <a href="<?php the_permalink(); ?>" class="btn btn-blue">Read More</a> 
                 
               </div>
               <!-- #post-<?php the_ID(); ?> -->
               <?php endwhile; ?>
               <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
               <?php else : ?>
               <article id="post-0" class="post no-results not-found">
                  <header class="entry-header">
                     <h1 class="entry-title"><?php _e( 'Nothing Found', 'axberg' ); ?></h1>
                  </header>
                  <!-- .entry-header -->
                  <div class="entry-content">
                     <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'axberg' ); ?></p>
                  </div>
                  <!-- .entry-content -->
               </article>
               <!-- #post-0 -->
               <?php endif; ?>
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
