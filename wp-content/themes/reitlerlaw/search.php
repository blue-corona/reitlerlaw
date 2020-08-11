<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="site-content">
 
   <section class="subpage-content">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="left-content">
                  <h1><?php
						printf( __( 'Search Results for: %s', 'reitlerlaw' ), get_search_query() );
					?>
				</h1>
                  <?php if ( have_posts() ) : 
						$cnt = 1;
						$allpost_array = array();
					while( have_posts() ){
						the_post();
						$Ptype = get_post_type();
						$allpost_array[$cnt] = $Ptype;
						$cnt++;
					}
					//print_r( array_unique($allpost_array));
						$types = array_unique($allpost_array);
					 //$types = array('post', 'page', 'team','transactions','advisory_team_member');
						foreach( $types as $type ){
							echo '<h1>Search Container Type: ' .$type.'</h1>';
							while( have_posts() ){
								the_post();
								if( $type == get_post_type() ){
						?>
									 <div id="post-<?php the_ID(); ?>" class="post_single">
										
										<h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
										<?php $text = get_the_content() ; ?>	
											<?php $trimmed = wp_trim_words( $text, $num_words = 50, $more = null ); ?>
										<p>	<?php echo $trimmed; ?></p>
									  
										 <a href="<?php the_permalink(); ?>" class=" btn btn-blue">Read More</a>  
									  </div>
									<?php
								}
								
							}
							rewind_posts();
						}
				?>
               <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
               <?php else : ?>
               <article id="post-0" class="post no-results not-found">
                  <header class="entry-header">
                     <h1 class="entry-title"><?php _e( 'Nothing Found', 'reitlerlaw' ); ?></h1>
                  </header>
                  <!-- .entry-header -->
                  <div class="entry-content">
                     <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'reitlerlaw' ); ?></p>
                  </div>
                  <!-- .entry-content -->
               </article>
               <!-- #post-0 -->
               <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

<?php
get_footer();
