<?php
/**
 * Template Name: Transaction Template
 */

get_header();
?>
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
		<?php 
			if(get_field('list_of_transaction_category')){
				
				$selected_term_id = get_field('list_of_transaction_category');
				$child_terms = get_terms( array(
						'taxonomy' => 'transactions_cat',
						'hide_empty' => false,
						'parent' => $selected_term_id
					) );
					
				//print_r($child_terms);
			}
		
		?>
		<div class="transection-bottom" id="myTable">
		   <div class="experience-row row">
		   <!--column-->
		   
				<?php 
				$termarray = array();
				foreach($child_terms as $child_term){ 
					$termarray[]  = $child_term->term_id;
				}
				 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
					$query = new WP_Query( array(
					  'post_type' => 'transactions',
					  'posts_per_page' => 6,
					  'paged' => $paged,
					  'tax_query' => array(
						'relation' => 'AND',
						array(
						  'taxonomy' => 'transactions_cat',
						  'field'    => 'term_id',
						  'terms'    => array_values($termarray)
						)
					  )
					));
					if($query->have_posts()) {
					while($query->have_posts()) : $query->the_post();
					$output ='';
					$current_title = get_the_title(); 
					$current_title_cnt = mb_strlen($current_title);
					$wrd_cnt = ($current_title_cnt > 28)? 162 : 199;
					$current_content = get_the_content(); 
					$final_content =str_ireplace('<p>','',$current_content);
					$final_content=str_ireplace('</p>','',$final_content); 
					$totlalphabet_count =  mb_strlen($final_content);
					if($totlalphabet_count > $wrd_cnt ){
						$first_content = substr($final_content,0,$wrd_cnt );
						$output .= '<p>'.$first_content.'<span class="read-more-dot">...</span></p>';
						$second_content = substr($final_content,$wrd_cnt);
						$output .= '<div id="column'.get_the_ID().'" class="collapse"><p>'.$second_content.'</p></div>';
						$output .= '<div class="block-expnd">+</div>';
					}else{
						$output .= '<p>'.$final_content.'</p>';
					}
					?>
					<div class="col-12 col-sm-6 col-lg-4 transection-box-single">
						 <div class="transection-box experience-column">
							<h2><a href="<?php the_permalink(); ?>" target="_blank"><?php echo get_field('client_name'); ?></a></h2>
							<img src="http://reitlerlaw.wpengine.com/wp-content/uploads/2020/08/place-holder.jpg" alt="" >
							<div class="experience-column-content">
								<?php echo $output; ?>
							</div>
						 </div>
					</div>
				
				<?php endwhile; ?>
				
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
						'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
						'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
						'add_args'     => false,
						'add_fragment' => '',
					) );
				?>		
				<div class="transection-extra-col transection-form"><span><i class="far fa-search"></i> Search</span> 
				<form id="representation-form" class="transection-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<input class="search-text" id="myInput" type="text" placeholder="Search.." name="search" required/>
				<input type="image" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/reitlerlaw/assets/images/search-icon.png" class="submit-icon" />
				</form>

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
<script>
jQuery(document).ready(function(){
	jQuery("#representation-form").submit(function(e){
		e.preventDefault(e);
		var search_val = jQuery('#myInput').val().toLowerCase();
		if(search_val){
		console.log(search_val);
			jQuery('.transection-box-single').hide();
			jQuery('.transection-box-single').each(function(){
					var element_cont = jQuery(this).text();
					console.log(element_cont);
					if(element_cont.toLowerCase().indexOf(search_val) != -1){
						jQuery(this).show();
					}
			});
			jQuery('.transection-hidden-content').show();
		}
	});
	
	jQuery( ".block-expnd" ).toggle(function() {
	  var elmn_content = jQuery(this).siblings('.collapse').text();
	  jQuery(this).siblings('p').children('.read-more-dot').html(elmn_content).slideDown("slow");
	  jQuery(this).addClass('close-block');
	}, function() {
	  jQuery(this).siblings('p').children('.read-more-dot').text('...');
	  jQuery(this).removeClass('close-block');
	});
});
</script>
<?php
get_footer();
