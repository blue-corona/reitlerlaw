<?php
/**
 * The template for displaying all single Advisory Team Members
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
      <section class="subpage-content page-bio-content">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="left-content">
                     <div class="bio-top">
                        <div class="row">
                           <div class="col-xl-3 col-md-5">
                              <?php $bio_img = get_field('member_image') ; ?>
                              <div class="bio-image" style="background:url(<?php echo esc_url($bio_img['url']); ?>);"></div>
                           </div>
                           <div class="col-xl-9 col-md-7">
                              <div class="bio-header">
                                 <div class="bio-header-left">
                                    <h1><?php the_title() ; ?><span><?php the_field('add_designation') ; ?></span></h1>
                                 </div>
                                 <div class="bio-header-right">
                                    <div class="bio-socials">
                                       <ul>
                                          <?php if (get_field('add_mail') ) { ?>
                                             <li><a target="_blank" href="mailto:<?php the_field('add_mail')?>"><i class="fas fa-envelope"></i></a></li>
                                          <?php } ?>
                                          <?php if (get_field('add_linkedin') ) { ?>
                                             <li><a target="_blank" href="<?php the_field('add_linkedin')?>"><i class="fab fa-linkedin"></i></a></li>
                                          <?php } ?>
                                          <?php if (get_field('add_twitter') ) { ?>
                                             <li><a target="_blank" href="<?php the_field('add_twitter')?>"><i class="fab fa-twitter"></i></a></li>
                                          <?php } ?>
                                          <?php if (get_field('add_file') ) { ?>
                                             <li><a target="_blank" href="<?php the_field('add_file')?>"><i class="fas fa-file-pdf"></i></a></li>
                                          <?php } ?>
                                          <?php if (get_field('add_card') ) { ?>   
                                             <li><a target="_blank" href="<?php the_field('add_card')?>"><i class="fas fa-id-card-alt"></i></a></li>
                                          <?php } ?>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="bio-contect">
                                 <ul>
                                    <?php if (get_field('location') ) { ?>
                                       <li><?php the_field('location')?></li>
                                    <?php } ?>
                                    <?php if (get_field('email') ) { ?>
                                       <li><span>E:</span> <a href="mailto:<?php the_field('email')?>"><?php the_field('email')?></a></li>
                                    <?php } ?>
                                    <?php if (get_field('phone_number') ) { ?>
                                       <?php $phonnumr = get_field('phone_number') ; ?>
                                       <li><span>P:</span> <span class="d-lg-block d-none"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phonnumr); ?></span><a class="d-lg-none d-block responsive-mob" href="tel:<?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1.$2.$3", $phonnumr); ?>"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phonnumr); ?></a></li>
                                    <?php } ?>
                                    <?php if (get_field('fax_number') ) { ?>
                                       <?php $faxphonnum = get_field('fax_number') ; ?>
                                       <li><span>F:</span> <span class="fax"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $faxphonnum); ?></span></li>
                                    <?php } ?>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php while( have_posts() ) : the_post() ; ?>
                        <?php the_content() ; ?>
                     <?php endwhile ; ?>
                     
                     <!---Sub Tabs Starts Here------>  
                     <div class="sub-tabs-section">
                        <div id="verticalTab" class="resp-vtabs row">
                           <ul class="resp-tabs-list vert_1 col-xl-4">
                              <?php if (have_rows('add_accordian_content') ) : ?>
                                 <?php while (have_rows('add_accordian_content') ) : the_row() ; ?>
								 <?php if(!get_sub_field('hide_this_section')): ?>
                                    <li class="resp-tab-item"><span><?php the_sub_field('add_title') ; ?></span></li>
								 <?php endif; ?>
                                 <?php endwhile ; ?>
                              <?php endif ; ?>
                           </ul>

                           <div class="resp-tabs-container vert_1 col-xl-8">
                              <?php if (have_rows('add_accordian_content') ) : 
                                 $cnt = 0; ?>
                                 <?php while (have_rows('add_accordian_content') ) : the_row() ; ?>
								 <?php if(!get_sub_field('hide_this_section')): ?>
                                    <h2><?php the_sub_field('add_content_title') ; ?></h2>
                                    <div class="resp-tab-content <?php echo $cnt;?>">
                                       <?php the_sub_field('add_content') ; ?>
                                        <?php if($cnt== 0) { ?>
                                       <div class="Bio-hidden-content hidden-content" data-lr="read">
                                          <?php the_field('add_hidden_content')?>
                                       </div>
                                      
                                          <?php if(get_field('add_hidden_content')) { ?>
                                             <span class="read-btn as-sw-hd"><i class="fal fa-chevron-circle-up"></i><i class="fal fa-chevron-circle-down"></i><span>Read more</span></span>
                                          <?php } ?>
                                       <?php } ?>
                                    </div>
                                    <?php 
									endif;
                                    $cnt++;
                                 endwhile ; ?>
                              <?php endif ; ?>
                           </div>
                        </div>
                     </div>
                     <!---Sub Tabs Ends Here------>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<?php get_template_part('service-cta'); ?>
<?php get_footer();
