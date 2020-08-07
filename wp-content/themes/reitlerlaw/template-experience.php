<?php
/**
 * Template Name: Experience Page Template
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
      <!--<div class="transection-extra-col transection-form" style="text-align: center;"><span><i class="far fa-search"></i> Search</span> 
      <form class="transection-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input type="text" name="s" id="search" class="search-text">
        <input type="image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/search-icon.png" class="submit-icon">
      </form>
      </div>-->
      <div class="partener-logo-col">
        <h1><?php the_title() ; ?></h1>
			<?php 
				$all_parents_tax = get_terms( array( 'taxonomy' => 'transactions_cat', 'parent' => 0 ) );
				$term_ary = array();
				foreach($all_parents_tax as $single_parent_tax){
					$term_order = (get_field('transaction_category_order', $single_parent_tax))? get_field('transaction_category_order', $single_parent_tax) : 0 ;
					$term_ary[$term_order]['name'] = $single_parent_tax->name;
					$term_ary[$term_order]['slug'] = $single_parent_tax->slug;
					$term_ary[$term_order]['id']   = $single_parent_tax->term_taxonomy_id;
					$term_ary[$term_order]['page'] = get_field('transaction_page', $single_parent_tax);
					$term_img = get_field('transaction_category_image', $single_parent_tax);
					if($term_img){
						$term_ary[$term_order]['image']['url'] =$term_img['url'];
						$term_ary[$term_order]['image']['alt'] =$term_img['alt'];
					}else{
						$term_ary[$term_order]['image']['url'] = get_template_directory_uri().'/assets/images/experience_dummy.jpg';
						$term_ary[$term_order]['image']['alt'] = 'Transaction Category Block';
					}
					
				}
				ksort($term_ary);
				//print_r($term_ary);
			?>
		   <div class="row text-center">
           <?php foreach($term_ary as $single_term_ary){ ?>  
            <div class="col-12 col-sm-6 col-lg-4 col-xl-1-5 mb-4"> 
              <a href="<?php echo $single_term_ary['page']; ?>" class="transection-col experience-col">
                <div class="transection-col-inner">
                  <div class="transection-image">
                    <img data-src="<?php echo $single_term_ary['image']['url']; ?>" alt="<?php echo $single_term_ary['image']['alt']; ?>" />
                  </div>
                  <div class="transection-text"><?php echo $single_term_ary['name']; ?></div>
                </div>
              </a>
            </div>
		   <?php } ?>
		   </div>
    </div>
</div>
</section>
</main>
<?php
get_footer();
