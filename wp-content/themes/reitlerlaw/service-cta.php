<?php $frontpage_id = get_option( 'page_on_front' ); ?>
<section class="service-section">
      <div class="container-fluid">
         <div class="row">
            <?php if(get_field('add_service', $frontpage_id)): 
               $i=1;
               ?>                   
            <?php while(has_sub_field('add_service', $frontpage_id)): ?>
            <div class="col-md-3 service-cta">
            <div id="down_arrow" class="<?php if ($i % 2 == 0) { ?>addcolor <?php } ?>"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
               <a href=" <?php the_sub_field('service_linking'); ?>" title="<?php the_sub_field('service_heading'); ?>"><div class="service-single-content <?php if ($i % 2 == 0) { ?>service-cta-color <?php } ?>">
                  <div class="service-heading">
                     <?php the_sub_field('service_heading'); ?>
                  </div>
                  <?php the_sub_field('service_content'); ?>
               </div></a>
            </div>
            <?php 
               $i++;
               endwhile; ?>  
            <?php endif; ?>
         </div>
      </div>
   </section>