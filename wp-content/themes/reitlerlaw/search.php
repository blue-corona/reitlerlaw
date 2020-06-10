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
                  <?php if ( have_posts() ) : ?>
               <?php /* Start the Loop */ ?>
               <?php while ( have_posts() ) : the_post(); ?>
               <div id="post-<?php the_ID(); ?>" class="post_single">
                  <?php if ( is_sticky() ) : ?>
                  <hgroup>
                     <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                     <h3 class="entry-format"><?php _e( 'Featured', 'reitlerlaw' ); ?></h3>
                  </hgroup>
                  <?php else : ?>
                  <h2><a href="<?php the_permalink(); ?>"  rel="bookmark"><?php the_title(); ?></a></h2>
                  <?php endif; ?>
               
                   <?php $text = get_the_content() ; ?>	
						<?php $trimmed = wp_trim_words( $text, $num_words = 50, $more = null ); ?>
					<p>	<?php echo $trimmed; ?></p>
                  
                     <a href="<?php the_permalink(); ?>" class=" btn btn-blue">Read More</a>  
                 
               </div>
               <!-- #post-<?php the_ID(); ?> -->
               <?php endwhile; ?>
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
