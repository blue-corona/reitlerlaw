<?php
/**
 * Template Name: People Search Template
 */

get_header();
?>


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


      <!--<div class="row page-img" id="people_img"></div>-->
      <div id="people" class="row">
        <div class="col-lg-6 col-12 mb-5">
          <div id="search-area" class="has-active-search">
            <div class="row" id="alpha_search">
              <div class="col-12">
                <h3>Search Professionals</h3>
                <div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=a">a</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=b">b</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=c">c</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=d">d</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=e">e</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=f">f</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=g">g</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=h">h</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=i">i</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=j">j</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=k">k</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=l">l</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=m">m</a>
                  </div>
                </div>
                <div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=n">n</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=o">o</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=p">p</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=q">q</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=r">r</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=s">s</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=t">t</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=u">u</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=v">v</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=w">w</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=x">x</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=y">y</a>
                  </div>
                  <div class="search-letter">
                    <a href="<?php echo get_permalink(); ?>?a=z">z</a>
                  </div>
                </div>
              </div>
            </div>

            <form action="<?php echo get_permalink(); ?>" method="post">



              <div class="row">
                <div class="col-sm-2 col-12">
                  <h3 class="is-label">Name</h3>
                </div>
                <div class="col-sm-6 col-12">
                  <input name="member_name" type="text" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-2 col-12">
                  <h3 class="is-label">Practice</h3>
                </div>
                <div class="col-sm-6 col-12">
                  <?php
		  if(isset($_POST['member_pa_id'])) {
			$mpi =  $_POST['member_pa_id'];
		  }
		  ?>
                  <?php
		  $the_query = new WP_Query( array( 'post_type' => 'practices', 'posts_per_page'=> -1, 'orderby'=> 'title', 'order'=>'ASC' ) );
			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<select name="member_pa_id" class="form-control">';
				echo '<option selected="selected"></option>';
				
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					if($mpi == get_the_ID())
					{
						echo '<option value="'.get_the_ID().'" selected>'. get_the_title() .'</option>';
					}
					else
					{
						echo '<option value="'.get_the_ID().'">'. get_the_title() .'</option>';
					}
				}
				echo '</select>';
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>




                </div>
              </div>
              <div class="row">
                <div class="offset-sm-2 col-sm-6 col-12">
                  <button type="submit" class="btn btn-gry-bg people-search-btn">Search</button>
                  <button type="reset" id="reset" class="btn btn-gry-bg people-reset-btn">Reset</button>
                </div>
              </div>
            </form>


          </div>
        </div><!-- /.col-sm-6 col-12 -->




        <div class="col-lg-6 col-12">

          <?php


?>
          <?php
if((isset($_POST['member_name']) && !empty($_POST['member_name'])) || isset($_GET['a']))
{
	
	$get_prm = 'abc';
	$get_qs = 'abc';
	if(!empty($_POST['member_name'])) 
	{
	  $get_prm = strtolower($_POST['member_name']);
	}
	else if(isset($_GET['a']) )
	{
	  $get_qs = strtolower($_GET['a']);
	}
	?>
          <?php $args = array('post_type'=> 'team', 'posts_per_page'=> -1  ) ;
	$loop = new WP_Query($args) ; 
	$total = $loop->post_count; 
	$counter = 1;
	?>

          <?php 
	  if( $loop->have_posts() ) :
	  
	  usort($loop->posts, function($a, $b) {
	   return strcasecmp( 
					end(explode(" ",strtolower($a->post_title))), 
					end(explode(" ",strtolower($b->post_title))) 
				);
	});
	  while ( $loop->have_posts() ) : $loop->the_post() ;  ?>
          <?php
	  $title = strtolower(get_the_title());
	  $title_parts = explode(" ",$title);
	  $last_name = end($title_parts);
	  $firstCharacter = substr($last_name, 0, 1);
		if ((strpos($title, $get_prm) !== false) || ($get_qs == $firstCharacter) ) {
		$result_found = true;
		?>
          <div class="col-12 col-md-11 col-lg-10 mb-4">

            <div class="person">
              <div class="row">
                <div class="col-5 col-sm-4">
                  <?php $partner_img = get_field('member_image') ; ?>
                  <a data-no-turbolink="true" href="<?php the_permalink(); ?>"> <img class="profile-photo" src="<?php echo $partner_img['url'] ; ?>" alt="<?php echo $partner_img['alt'] ; ?>"></a>
                </div>
                <div class="col-7 col-sm-8">
                  <a data-no-turbolink="true" href="<?php the_permalink(); ?>">
                    <div class="profile-name"><?php the_title() ; ?></div>
                    <div class="profile-title"><?php the_field('add_designation') ; ?></div>
                  </a>
                  <div class="profile-contact_info">
                    <?php $phonnumr = get_field('phone_number') ; ?>
                    <a href="tel:<?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1$2$3", $phonnumr); ?>"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phonnumr); ?></a> <br>
                    <?php the_field('email') ; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <?php
		}
		else {}
		$counter++;
		endwhile ;
		
endif;
 ?>
          <?php
}
else if(isset($_POST['member_pa_id'])) 
{
		$practice_id = strtolower($_POST['member_pa_id']);
		if(get_field('select_team_block', $practice_id)){
		$result_found = true; ?>
          <?php $posts = get_field('select_team_block', $practice_id); ?>
          <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
          <div class="col-12 col-md-11 col-lg-10 mb-4">

            <div class="person">
              <div class="row">
                <div class="col-5 col-sm-4">
                  <?php $partner_img = get_field('member_image') ; ?>
                  <a data-no-turbolink="true" href="<?php the_permalink(); ?>"><img class="profile-photo" src="<?php echo $partner_img['url'] ; ?>" alt="<?php echo $partner_img['alt'] ; ?>"></a>
                </div>
                <div class="col-7 col-sm-8">
                  <a data-no-turbolink="true" href="<?php the_permalink(); ?>">
                    <div class="profile-name"><?php the_title() ; ?></div>
                    <div class="profile-title"><?php the_field('add_designation') ; ?></div>
                  </a>
                  <div class="profile-contact_info">
                    <?php $phonnumr = get_field('phone_number') ; ?>
                    <a href="tel:<?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1$2$3", $phonnumr); ?>"><?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1)-$2-$3", $phonnumr); ?></a>
                    <br>
                    <?php the_field('email') ; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <?php endforeach; ?>
          <?php wp_reset_postdata();?>
          <?php } 
}
else
{ $result_found = true; }
?>


          <?php
if(!$result_found)
{
	echo "<h4>No results found.</h4>";
}
?>

        </div>
      </div>

    </div>
  </section>
</main>
<style>
.transection-col-inner-ds {
  display: none
}
</style>
<?php
get_footer();
?>

<script>
jQuery(document).ready(function() {
  jQuery(".transection-col").click(function() {
    var htmlString = jQuery(this).next('.transection-col-inner-ds').html();
    //alert(htmlString);
    jQuery('#disclaimerModal1 .modal-body').html(htmlString);


    jQuery('#reset').click(function() {
      location.reload();
    })

  });
});
</script>