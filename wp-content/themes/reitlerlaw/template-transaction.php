<?php
/**
 * Template Name: Transaction Template
 */

get_header();
?>
<style>.transaction_loader {display:none;   width: 22px;    position: absolute;    right: -15px;    top: 0;}</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
		<?php if(get_field('list_of_transaction_category')){ $selected_term_id = get_field('list_of_transaction_category');} ?>
		<div class="align-middle d-inline-block mb-5">
			<div class="transection-extra-col transection-form">
				<form id="representation-form" class="transection-search active-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<input class="search-text" id="myInput" type="text" placeholder="Search.." name="search" required/>
				<input  type="hidden" name="cat_id"value="<?php echo $selected_term_id; ?>"/>
				<input type="image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/search-icon.png" class="submit-icon" />
				</form>
				<div class="transaction_loader"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/transaction_loader.gif" alt="transaction loader"/></div>
			</div>
			
		</div>
		<div class="transection-bottom" id="myTable">
		   <div class="experience-row row">
		   
		   <!--column-->
		   
				<?php 

				 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
					$query = new WP_Query( array(
					  'post_type' => 'transactions',
					  'posts_per_page' => 12,
					  'orderby' => 'date',
					  'order' => 'DESC', 
					  'paged' => $paged,
					  'tax_query' => array(
						'relation' => 'AND',
						array(
						  'taxonomy' => 'transactions_cat',
						  'field'    => 'term_id',
						  'terms'    => $selected_term_id
						)
					  )
					));
					if($query->have_posts()) {
					while($query->have_posts()) : $query->the_post();
						
						get_template_part( 'content', 'transactions' );
						
					endwhile; ?>
				<div class="col-12 text-center text-sm-left">
				<div class="align-middle d-inline-block mb-4 mb-sm-0">
				<div class="nav-links">
				<?php // S
					echo paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => sprintf( '<i class="fal fa-angle-double-left"></i> %1$s', __( '', 'text-domain' ) ),
						'next_text'    => sprintf( '%1$s <i class="fal fa-angle-double-right"></i>', __( '', 'text-domain' ) ),
						'add_args'     => false,
						'add_fragment' => '',
					) );
				?>	
</div>				
</div>				
				</div>
			
					<?php wp_reset_postdata();
						}
					?>
		   </div>
		</div>

    
    </div>
</div>
</section>
</main>
<?php
get_footer();
