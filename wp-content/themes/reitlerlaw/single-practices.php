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
			<?php if(get_field('select_team_block')){ ?>
               <div class="sidebar-sec">
  <div class="sidebar-col">
     <div class="primery-title">related attorneys</div>
     <div class="slideVertical sidebar-slider">
	 <?php $posts = get_field('select_team_block'); ?>
	  <?php $nc = 1 ; ?>
                         <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                          <?php setup_postdata($post); ?>
						   <?php if ($nc == 1 ) { ?>
            <div class="side-slide">
            <?php } ?>
						   <a href="<?php the_permalink(); ?>">
              <div class="slide-content">
			  
                 <?php $partner_img = get_field('member_image') ; ?>
                 <div class="img-col" style="background-image: url(<?php echo $partner_img['url'] ; ?>)"><!--img src="<?php echo $partner_img['url'] ; ?>" alt="<?php echo $partner_img['alt'] ; ?>" /--></div>
                 <div class="text-col">
                    <div class="name"><?php the_title() ; ?></div>
                    <div class="designation"><?php the_field('add_designation') ; ?></div>
                 </div>
				 
              </div></a>
         <?php if ($nc == 4 ) { ?> 
        </div>
        <?php $nc = 1 ; ?>
         <?php } else {  ?>
      <?php $nc++ ; ?>
    <?php } ?>
						   <?php endforeach; ?>
						   <?php if ($nc != 4 ) { ?>
         </div>
          <?php } ?>
                      <?php wp_reset_postdata();?>
     </div>
  </div>
</div>
<?php } ?>
            </div>
         </div>
      </div>
   </section>
</main>
<?php get_template_part('service-cta'); ?>
<?php
get_footer();
