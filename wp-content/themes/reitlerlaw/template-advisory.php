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
      <div class="partener-logo-col">
        <h1><?php the_title() ; ?></h1>
        <?php while (have_posts() ) : the_post() ; ?>
         <?php  the_content() ; ?>
       <?php endwhile ; ?>
       <div class="row text-center">
        <?php if (have_rows('add_advisory') ) : ?>
         <?php while (have_rows('add_advisory') ) : the_row() ; ?>  
          <div class="col-md-6 col-xl-4">
            <?php if(get_sub_field('advisory_link')){?>
              <a href="<?php the_sub_field('advisory_link') ; ?>" class="transection-col">
              <?php } else{ ?>
                <div data-toggle="modal" data-target="#advisoryModal1" class="transection-col">
                <?php } ?>
                <div class="transection-col-inner">
                 <?php $sec_img = get_sub_field('advisory_image') ; ?>
                 <div data-imgsrc="<?php echo $sec_img['url'] ; ?>" class="transection-image" style="background-image: url('<?php echo $sec_img['url'] ; ?>')">
                 </div>
                 <div class="transection-text"><?php the_sub_field('advisory_title') ; ?></div>
                 <div class="p-none"><?php the_sub_field('advisory_content') ; ?></div>
               </div>


            <?php if(get_sub_field('advisory_link')){?>
              </a>
              <?php } else{ ?>
                </div>
                <?php } ?>

             <div class="modal fade advisory-modal" id="advisoryModal1" role="dialog">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
                    </button>
                  </div>
                  <div class="modal-body">
                   <div class="transection-col-inner-ds">
                     <h2></h2>
                     <?php $sec_img = get_sub_field('advisory_image') ; ?>
                     <img src="<?php echo $sec_img['url'] ; ?>" alt="<?php echo $sec_img['alt'] ; ?>" />
                     <div class="transaction-content"><?php the_sub_field('advisory_content') ; ?></div>
                   </div>
                 </div>
               </div>
             </div>
           </div>

         </div>
       <?php endwhile ; ?>
     <?php endif ;?>
   </div>
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


