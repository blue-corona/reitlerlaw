<?php
/**
 * Template Name: Advisory Template
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
         <img data-src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($add_banner['alt']); ?>" />
       </picture>
     <?php }  else { ?>

       <picture>
         <source media="(max-width: 480px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
         <source media="(max-width: 767px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
         <img data-src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
       </picture>
     <?php } ?>
   </section>
   <section class="subpage-content page-transection-content">
    <div class="container">
      <div class="partener-logo-col1">
        <h1><?php the_title() ; ?></h1>
        <?php while (have_posts() ) : the_post() ; ?>
         <?php  the_content() ; ?>
       <?php endwhile ; ?>
     
   <?php
   $args = array(
		'post_type' => 'advisory_team_member',
		'posts_per_page' => -1,
		'order' => 'ASC'
	);
	$query = new WP_Query( $args );
    
	if ( $query->have_posts() ) { ?>
  <h2 class="our-team-heading">Our Team</h2>
   <div class="section-details-text col-xs-12">
		<div class="row">
			 <?php while ( $query->have_posts() ) { // variable must be called $post (IMPORTANT) ?>
			<?php $query->the_post();
				$mem_img = get_field('advisory_headshot');
			?>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12" style="margin-bottom:15px">
        <div class="col-12 col-md-11 col-lg-10 mb-4">
          <div class="person">
          <a href="<?php the_permalink();?>" class="row align-items-center" style="cursor: pointer;">
          <div class="col-5 col-sm-4"><img class="profile-photo" src="<?php echo $mem_img['url']; ?>" alt="Joyce Y. Reitler" /></div>
          <div class="col-7 col-sm-8">
          <p class="profile-name"><?php the_title(); ?></p>
          <p class="profile-title"><?php echo get_field('advisory_designation'); ?></p>
          <p class="profile-contact_info"><?php echo get_field('advisory_phone_number'); ?> <br><?php echo get_field('advisory_email'); ?></p>

          </div>
          </a>
          </div>
        </div>
			</div>
			<?php // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php } ?>
		</div>
	</div>
   <?php }
	wp_reset_postdata(); 
   ?>
   
 </div>
</div>
</section>
</main>
<script>
  jQuery(document).ready(function(){

    jQuery('.transection-col').click(function(){ 
      var imgval = jQuery(this).find('.transection-image').attr('data-imgsrc');
      imgval1 = imgval.replace('url(','').replace(')','');

      var get_head = jQuery(this).find('.transection-text').html();
      var get_data = jQuery(this).find('.p-none').html();
//alert(get_data); 
jQuery('body').find('.transection-col-inner-ds img').attr('src', imgval1 );
jQuery('body').find('.transection-col-inner-ds h2').text( get_head );
jQuery('body').find('.transection-col-inner-ds .transaction-content').html( get_data );


});



  });






</script>
<?php
get_footer();
?>


