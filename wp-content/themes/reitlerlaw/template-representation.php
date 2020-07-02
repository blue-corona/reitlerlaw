<?php
/**
 * Template Name: Representation Template
 */

get_header();
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable .transection-box").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

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
       
          <?php if (have_rows('add_business_partners') ) : ?>
		   <div class="row text-center">
           <?php while (have_rows('add_business_partners') ) : the_row() ; ?>  
            <div class="col-xl-4  col-sm-6 col-12"> 
              <a href="<?php the_sub_field('add_partner_link') ; ?>" class="transection-col">
                <div class="transection-col-inner">
                  <div class="transection-image">
                    <?php $sec_img = get_sub_field('add_partner_image') ; ?>
                    <img data-src="<?php echo $sec_img['url'] ; ?>" alt="<?php echo $sec_img['alt'] ; ?>" />
                  </div>
                  <div class="transection-text"><?php the_sub_field('add_partner_description') ; ?></div>
                </div>
              </a>
            </div>
          <?php endwhile ; ?>
		   </div>
        <?php endif ;?>
    
    </div>

    
    <div class="transection-bottom" id="myTable">
      
      <div class="transection-bottom-text" >
        <?php if (have_rows('add_transection') ) : ?>
          <?php $cnt = 1 ; ?>
          <?php while (have_rows('add_transection') ) : the_row() ; ?>
            <?php  if( $cnt <= 8  ) {  ?>
              <div class="transection-box">
                <?php the_sub_field('add_box_content') ; ?>
              </div>  
            <?php } ?>
            <?php $cnt++ ; ?>
          <?php endwhile ; ?>
        <?php endif ; ?>
      </div>


      <?php if (have_rows('add_transection') ) : ?>
       <div class="transection-hidden-content hidden-content" data-lr="view">
        <?php $cnt = 1 ; ?>
        <?php while (have_rows('add_transection') ) : the_row() ; ?>
         <?php  if( $cnt > 8  ) {  ?>
           <div class="transection-box">
            <?php the_sub_field('add_box_content') ; ?>
          </div>
        <?php } ?>
        <?php $cnt++ ; ?>
      <?php endwhile ; ?>
    </div>
  <?php endif ; ?>

  <?php $count = count(get_field('add_transection')); ?>

<div class="repres-extra-sec">
    <?php if($count > 9){  ?>
    <div class="transection-extra-col transection-bt section-1 as-sw-hd"><i class="far fa-minus-circle"></i><i class="far fa-plus-circle"></i><span>View More</span></div>  
  <?php } ?>
    <div class="transection-extra-col transection-form"><span><i class="far fa-search"></i> Search</span> 
       <!--<form class="transection-search">
        <input class="search-text" id="myInput" type="text" placeholder="Search..">
      </form> -->
     <form id="representation-form" class="transection-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input class="search-text" id="myInput" type="text" placeholder="Search.." name="search" required/>
       <input type="image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/search-icon.png" class="submit-icon" />
     </form>

   </div>
 </div>

</div>
</div>
</section>
</main>
<script>
jQuery(document).ready(function(){
	jQuery("#representation-form").submit(function(e){
		console.log(1111);
		//alert('submit intercepted');
		e.preventDefault(e);
		var search_val = jQuery('.search-text').val();
		if(search_val){
		console.log(search_val);
			jQuery('.transection-box,.transection-bt').hide();
			jQuery('.transection-box').each(function(){
					var element_cont = jQuery(this).text();
					console.log(element_cont);
					if(element_cont.indexOf(search_val) != -1){
						jQuery(this).show();
					}
			});
			jQuery('.transection-hidden-content').show();
		}
	});
	
});
</script>
<?php
get_footer();
