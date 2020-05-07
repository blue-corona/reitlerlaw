<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reitler_Law
 * @since 1.0
 * @version 1.0
 */
global $setting_post_id;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php 
	wp_enqueue_script('jquery');
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
   <div class="container">
      <div class="header-top-logo text-center">
         <a href="<?php echo esc_url(home_url('/'))?>"><?php 
            $image = get_field('header_logo', $setting_post_id);
            
            if( !empty($image) ): ?>
         <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
         <?php endif; ?></a>
      </div>
      <div class="header-menus-bar text-center">
		<div class="toggle-icon"><span>Menu</span><a class="responsive-toggle hamburger-toggle"><i class="fa-bars"></i></a></div>
		<div class="mobile-navigation slide-menu">

              <div class="hamburger-toggle close-toggle"><i class="fa-bars"></i></div>
			 <div class="sticky-menus">
				<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'christianhealth' ); ?>">
				   <?php
					  wp_nav_menu(
						array(
							'theme_location' => 'top',
							'menu_class'      => 'menus',
							'container'       => false
						)
					  );
					  ?>
				</nav>
			 </div>
         </div>
      
      </div>
   </div>
</header>
<div class="top-offset"></div>