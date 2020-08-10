<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.2
 */
global $setting_post_id;
?>
<button class="refresh"></button>
<footer class="site-footer text-center">
<div class="footer-top">
   <div class="container">
      <div class="footer-title"><?php the_field('company_name', $setting_post_id)?></div>
      <div class="row">
         <?php if(get_field('add_address', $setting_post_id)): ?>                   
         <?php while(has_sub_field('add_address', $setting_post_id)): ?>
         <div class="col-lg-6">
            <div class="address-col">
              <?php $phone = get_sub_field('phone_number');?>
               <?php $sorted = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1.$2.$3", $phone); ?>     
				<div class="footer-num"><?php the_sub_field('loaction'); ?>:  <span class="d-xl-inline-block d-none"><?php the_sub_field('phone_number'); ?></span><a href="tel:<?php echo $sorted; ?>" class="d-xl-none d-inline-block"><?php the_sub_field('phone_number'); ?></a></div>
               <div class="footer-address"><?php the_sub_field('address'); ?></div>
            </div>
         </div>
         <?php endwhile; ?>  
         <?php endif; ?>
      </div>
      <div class="row bottom-footer d-xl-inline-block d-none">
         <div class="bottom-left col-lg-8" style="letter-spacing: -0.3px;">&copy; <?php echo date('Y'); ?> reitler kailas & rosenblatt llc. All rights reserved   |   <a class="att-ad" href="JavaScript:Void(0);">Attorney Advertising </a>  |   Web Design by  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bluecorona-logo.png" alt="" />     <a href="https://www.bluecorona.com/" target="_blank"> blue corona </a></div>
         <div class="bottom-right col-lg-4">
            <ul>
               <li><a href="JavaScript:Void(0);" data-toggle="modal" data-target="#sitemapModal">Sitemap</a></li>
			   <li><a href="<?php the_field('privacy_policy_link', $setting_post_id)?>">Privacy Policy</a></li>
               <li><a href="<?php the_field('diversity_link', $setting_post_id)?>">diversity </a></li>
               <li><a href="JavaScript:Void(0);" data-toggle="modal" data-target="#disclaimerModal">disclaimer</a></li>
            </ul>
         </div>
      </div>
	  
   </div>
</div>
   <div class="bottom-footer d-xl-none">
	<div class="container">
        <div class="row">
         <div class="bottom-right col-12">
			<span>&copy; <?php echo date('Y'); ?> reitler kailas & rosenblatt llc.</span>
            <ul>
				 
				<li><a href="<?php the_field('attorney_advertising_link', $setting_post_id)?>">Attorney Advertising </a></li>
        <li><a href="JavaScript:Void(0);" data-toggle="modal" data-target="#sitemapModal">Sitemap</a></li>
			   <li><a href="<?php the_field('privacy_policy_link', $setting_post_id)?>">Privacy Policy</a></li>
               <li><a href="<?php the_field('diversity_link', $setting_post_id)?>">diversity </a></li>
			   <li> Web Design by  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bluecorona-logo.png" alt="" />     <a href="http://www.bluecorona.com/" target="_blank"> blue corona </a></li>
               <li><a href="JavaScript:Void(0);" data-toggle="modal" data-target="#disclaimerModal">disclaimer</a></li>
            </ul>
         </div>
      </div>
      </div>
      </div>
</footer>

<div class="modal fade disclaimer-modal" id="disclaimerModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="disclaimerModalCenterTitle">Disclaimer</div> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
        </button>
      </div>
      <div class="modal-body">
	  <p><?php the_field('disclaimer_text', $setting_post_id)?></p>
      </div>

    </div>
  </div>
</div>

<div class="modal fade sitemap-modal" id="sitemapModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Sitemap</div> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">         
        </button>
      </div>
      <div class="modal-body">
	  <ul class="menu">
          <?php wp_nav_menu( array(
            'menu' => 'Header Menu',
            'menu_class' => 'sitemap-menu',
             'menu_id' => 'sitemap-menu',  
            'depth' => 1
          ) );?>
        </ul>
      </div>

    </div>
  </div>
</div>

<!-- Homepage covid-19 sliding banner modal popup -->
<?php if ( is_page(10) ) { // If on homepage then style and show popup ?>
  <style>
    #covid-popup-Modal .modal-header {
      justify-content: center;
    }

    #popupModalCenterTitle {
      font-weight: 700;
      font-size: 23px;
      text-align: center;
    }

    #covid-popup-Modal p {
      text-align: justify;
      color: #000000;
      font-size: 15px;
      line-height: 20px;
    }

    #covid-popup-Modal .modal-content-block img {
      width: 172px;
      float: left;
      margin: 0 20px 0 0;
    }

    #covid-popup-Modal h2 {
      font-size: 25px;
      font-style: italic;
      color: #26027A;
      font-weight: 700;
      text-align: center;
      padding-bottom: 15px;
    }

    #covid-popup-Modal .modal-content-block {
      background-color: #DAE1F2;
      padding: 15px;
      margin: 10px 0;
    }

    #covid-popup-Modal .btn-light.callbtn {
      background-color: #EF4035;
      border-color: #EF4035;
      color: #ffffff;
    }

    #covid-popup-Modal .btn-light.contactbtn {
      background-color: #0246D7;
      border-color: #0246D7;
      color: #ffffff;
    }

    #covid-popup-Modal li {
      font-size: 15px;
      list-style: disc;
      margin-left: 35px;
    }

    #covid-popup-Modal .modal-content-block a {
      font-size: 15px;
      text-decoration: underline;
      color: #1551D1;
    }

    #covid-popup-Modal .modal-content-block a:hover {
      color: #0152ff;
    }

    @media (max-width:991px) {

      #covid-popup-Modal .modal-content-block img {
        margin: 0 0 20px 0;
        width: 100%;
      }

    }
    
  </style>


<!-- Original Frontpage Modal -->


<?php if(is_page(10)) { ?>

  <div class="modal fade" id="home1_link" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="video-wrapper">
            <iframe id="home1_yt_video" width="560" height="315" src="http://s3.amazonaws.com/reitlerlaw/app/public/ckeditor_assets/attachments/82/reitler_ranked_8th_most_active_vc_law_firm_in_the_nation_by_pitchbook_for_q1_2020.pdf" frameborder="0" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>

<style>
.modal-header .close::before {display:none;}
.modal-header .close::after {display:none;}

.modal-content {padding: 0;}
.modal-header {padding: 17px !important;}
.modal-body {padding: 15px 10px !important;}
.video-wrapper {
  position: relative;
    padding-bottom: 56.25%;
    padding-top: 25px;
    height: 0;
}
#home1_yt_video {
  position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.modal-header .close {
  margin-top: 17px;
  left:0%;
}
</style>

<?php } ?>



<!-- Front page modal ends -->


  <div class="modal fade popup-modal" id="covid-popup-Modal" tabindex="-1" role="dialog" aria-labelledby="popupModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title" id="popupModalCenterTitle"> <img src="/wp-content/uploads/2019/11/site-logo.png" alt="REITLER LAW logo" /> </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>As uncertainty grows amid COVID-19 concerns, we assure you that Reitler is taking all necessary measures to stay fully operational for our clients. For those of you who are concerned about how the current COVID-19 situation will affect you, your business and your employees, please do not hesitate to reach out to our attorneys.</p>
          <p>Our attorneys are working around the clock to stay up to date on developing concerns and potential legal implications and requirements that could possibly impact our clients.</p>
          <p>Below you will find Reitler Legal Updates from our Real Estate group, Tax group and Employment group.</p>
          <div class="modal-content-block">
            <img src="/wp-content/uploads/2020/03/real_estate_pen.jpg" alt="real estate pen" />
            <h2>Leasing in a Covid-19 World: Thoughts From the Tenant’s Perspective</h2>
            <p style="clear: both;">Tenants everywhere are asking the same questions about their leases:
              <ul>
                <li>“I have to shut my doors because I have no customers, but I want to re-open when the crisis is over – can I do that?”</li>
                <li>“The government has ordered me to close” – do I still have to pay my rent?” </li>
                <li>“I’m leaving the City for good – can I just give back the keys?”</li>
              </ul>
            </p>
            <p>In his article, “Leasing in a Covid-19 World: Thoughts From the Tenant’s Perspective” , real estate attorney Andrew Baraff shares his thoughts on some of the practical questions and legal principles that business owners should be aware of as they consider their options in the Covid-19 world.</p>
            <a href="https://files.constantcontact.com/73da6604701/69167a0c-6a9d-4c2e-b9c8-dca2d0c1c3af.pdf" target="_blank">Read more</a>
          </div>
          <div class="modal-content-block">
            <h2>Treasury Releases Updated 2020 Tax Filing Guidance</h2>
            <img src="/wp-content/uploads/2020/03/tax-coin-stack.jpg" alt="stack of coins" />
            <p>In their latest effort to keep pace with swiftly-moving dev elopments in the ongoing global pandemic known as COVID-19 and its potential impact on U.S taxpayers, the U.S Treasury Department and Internal Revenue Service today released IRS Notice 2020-18, which extends the deadlines for filing of certain 2019 and 2020 federal income tax returns, as well as payment of taxes due thereunder, from April 15 to July 15, 2020.</p>
            <a href="https://files.constantcontact.com/73da6604701/463dfe46-73e7-4cf5-b03d-64fb50bd95be.pdf" target="_blank">Learn more here</a>
          </div>
          <div class="modal-content-block">
            <h2>Families First Act</h2>
            <img src="/wp-content/uploads/2020/03/multigeneration_family.jpg" alt="family portrait" />
            <p>In this Labor & Employment update, Lauren K. Kluger, writes on the new Families First legislation passed on March 18, 2020. The Families First Act enacts significant changes to FMLA and Paid Sick Leave for employees due to COVID-19.</p>
            <a href="https://files.constantcontact.com/73da6604701/f37d2217-3d68-46f8-9951-0b429b2d1b41.pdf" target="_blank">Read more</a>
          </div>
          <div class="popup-bottom-content"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    jQuery('a[href$="#covid-19"]').on('click',function(){
      // var popupshown = localStorage.getItem('popupshown');
      // if (!popupshown) {
        // localStorage.setItem('popupshown', 'true');
        jQuery('#covid-popup-Modal').modal('show');
      // }
    });
  </script>
<?php } ?>

<?php wp_footer(); ?>

<script>
jQuery(document).ready(function() {
  let $ = jQuery;

  /* homepage service blocks */
  $('.col-md-3.service-cta').hover(
    function() {
      $(this).addClass('service-block-expanded');
    }, function() {
      $(this).removeClass('service-block-expanded');
    }
  );

  /* homepage slider banners */      
  $('.banner-section-image').on('click', function() {
    if (window.innerWidth < 767 ) {
      window.location.href = $(this).data('href');
    }
  });

  $('.people-reset-btn').on('click', function(e) {
    e.preventDefault();
    window.location.href = '/people/';
  });

});
</script>

<script>
// jQuery(window).on('load resize', function () {
// var highestBox = 0;
// jQuery('.accordion-banner').each(function(){  
        // if(jQuery(this).height() > highestBox){  
        // highestBox = jQuery(this).height();  
// }
// });    
// jQuery('.accordion-banner').height(highestBox);
// });
</script> 
</body>
</html>
