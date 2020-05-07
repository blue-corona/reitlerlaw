<?php
/**
 * Template Name: Practice Area Template
 */

get_header(); ?>
<section class="subpage-content">
   
 <div class="container"><h1><?php the_title() ; ?></h1></div>
      <div id="accordion-wrapper">
        <ul class="direction st_tabs_navigation direction--overlay" aria-controls="accordion">
          <li><a id="left_arrow" class="direction-prev" href="#" style="visibility: visible;"></a></li>
          <li><a id="right_arrow" class="direction-next" href="#"></a></li>
        </ul>
        <div id="accordion" class="">
          <ul class="accordion-panels">
           <?php if(have_rows('add_practise_areas')):
            $cnt = 1;
            while(have_rows('add_practise_areas')): the_row();?>
              <li class="accordion-item practice-accordion-item">
                <h3 class="practice-accordion-title"><?php the_sub_field('practise_area_title');?></h3>
                <div class="practice-accordion-wrapper">
                  <div class="practice-accordion-content">    
                    <a data-count="<?php echo $cnt;?>" class="accordion-clicker" href="#">
                      <div class="accordion-img">
                        <?php 
                        $image = get_sub_field('practise_area_image');
                        if( !empty( $image ) ): ?>
                          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                      </div>
                      <div class="accordion-banner">
                        <h3 class="accordion-title"><?php the_sub_field('practise_area_title');?></h3>
                        <div class="accordion-text">
                          <?php the_sub_field('practise_area_content');?>
                        </div>
                      </div>
                    </a>
                    <?php 
                    $link = get_sub_field('practise_area_link');
                    if( $link ):          
                      $link_url = $link['url'] ? $link['url'] : '#';
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                      ?> 
                      <a class="view accordion-view" data-no-turbolink="true" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                      <?php endif; ?>
                      <h4>View more <i class="fa fa-chevron-right" aria-hidden="true"></i></h4>
                    </a>            </div>
                  </div>
                </li>
                <?php 
                $cnt++;
              endwhile;

            endif;?>  
          </ul>
        </div>
      </div>
  
</section>





<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri();?>/assets/js/application-practise.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/accordion-practise.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/practice-accordion-mobile.js"></script>