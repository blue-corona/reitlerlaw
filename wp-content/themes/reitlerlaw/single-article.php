<?php
/**
 * The template for displaying all individual articles that are stored in the Reitler Library
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<main class="site-content">
  <section class="subpage-banner">
    <picture>
      <source media="(max-width: 480px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
      <source media="(max-width: 767px)" srcset="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
      <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2019/11/subpage-banner.jpg" alt="Banner Image" />
    </picture>
  </section>
  <section class="subpage-content">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div style="padding: 25px; display: flex; flex-direction: column;">
            <a href="/"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Return Home</a>
            <br />
            <a href="/reitler-library/"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Return to Library</a>
          </div>
          <div>
            <h1 style="line-height: normal;"><?php echo the_title() ?></h1>
            <?php while (have_posts() ) : the_post(); ?>
              <?php if ( get_field('instructions') == 'pdf' ) { ?>
                <div class="article-box">
                  <p class="article-text"><?php the_field('article_pdf_text'); ?></p>
                  <div class="article-pdf-box">
                    <a href="<?php the_field('article_pdf') ?>" target="_blank"><img src="/wp-includes/images/media/document.png" /><span style="font-size: 15px; padding: 20px;">Click here to view</span></a>
                  </div>
                </div>
              <?php } elseif ( get_field('instructions') == 'text' ) { ?>
                <div class="article-box">
                  <p class="article-text"><?php the_field('article_text_content'); ?></p>
                </div>
              <?php } elseif ( get_field('instructions') == 'url' ) { ?>
                <div class="article-box">
                  <a href="<?php the_field('article_url') ?>" target="_blank">
                    <p class="article-text"><?php the_field('article_url_text') ?></p>
                    <p>Click here to view</p>
                  </a>
                </div>
              <?php } else {
                echo 'No content was provided!';
              } ?>
            <?php endwhile ; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();