<?php
/**
 * Template Name: People Template
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
      <div class="people-col">
        <h1><?php the_title() ; ?></h1>
		    <?php while (have_posts() ) : the_post() ; ?>
                  	<?php  the_content() ; ?>
                  <?php endwhile ; ?>
        <div class="row text-center"> 
          <div class="col-12 col-md-10 sidebar-col  people-section">
   
     <div class="row people-slider">
      <?php $args = array('post_type'=> 'team', 'posts_per_page'=> -1  ) ; ?>
      <?php $loop = new WP_Query($args) ; ?>
	  <?php 
	  /* print_r($loop->posts);
	  $title = strtolower($a->post_title);
	  $title_parts = explode(" ",strtolower($a->post_title));
	  $last_name = end(explode(" ",strtolower($a->post_title))); */

	  usort($loop->posts, function($a, $b) {
	   return strcasecmp( 
					end(explode(" ",strtolower($a->post_title))), 
					end(explode(" ",strtolower($b->post_title))) 
				);
	});

	  
	  ?>
	  
	  
        <?php $nc = 1 ; ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post() ;  ?>
		  <?php if(!get_field('hide_bio')){ ?>

            <div class="col-12 col-md-6 side-slide">
            <a href="<?php the_permalink(); ?>">
              <div class="slide-content">
			  
                 <?php $partner_img = get_field('member_image') ; ?>
                 <div class="img-col" style="background-image: url(<?php echo $partner_img['url'] ; ?>)"><!--img src="<?php echo $partner_img['url'] ; ?>" alt="<?php echo $partner_img['alt'] ; ?>" /--></div>
                 <div class="text-col">
                    <div class="name"><?php the_title() ; ?></div>
                    <div class="designation"><?php the_field('add_designation') ; ?></div>
                 </div>
				 
              </div></a>

        </div> 

	
		  <?php } //end of if(get_field)?>
         <?php endwhile ; ?>

         </div>
          
        <?php wp_reset_postdata() ;  ;?>
     </div>
        </div>
      </div>
    </div>
  </section>
</main>
<style>
.transection-col-inner-ds{display:none}
</style>
<?php
get_footer();
?>

<script>
jQuery(document).ready(function(){
jQuery( ".transection-col" ).click(function() {	
  var htmlString = jQuery(this).next('.transection-col-inner-ds').html();
 //alert(htmlString);
 jQuery('#disclaimerModal1 .modal-body').html( htmlString );


});
});






</script>
