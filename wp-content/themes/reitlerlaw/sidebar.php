<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar-sec">
  <div class="sidebar-col">
     <div class="primery-title">related partners</div>
     <div class="slideVertical sidebar-slider">
      <?php $args = array('post_type'=> 'team', 'posts_per_page'=> -1  ) ; ?>
      <?php $loop = new WP_Query($args) ; ?>
        <?php $nc = 1 ; ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post() ;  ?>
            <?php if ($nc == 1 ) { ?>
            <div class="side-slide">
            <?php } ?><a href="<?php the_permalink(); ?>">
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
         <?php endwhile ; ?>
         <?php if ($nc != 4 ) { ?>
         </div>
          <?php } ?>
        <?php wp_reset_postdata() ;  ;?>
     </div>
  </div>
</div>
