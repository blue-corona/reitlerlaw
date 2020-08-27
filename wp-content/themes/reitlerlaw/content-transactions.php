<?php
$output ='';
$post_terms1 =  get_the_terms(get_the_ID(), 'transactions_img');
$term_img = get_field('transaction_category_image', 'transactions_cat_'.$post_terms1[0]->term_id);
if(!$term_img){
	 $term_img['url'] = get_template_directory_uri().'/assets/images/place-holder.jpg';
	 $term_img['alt'] = 'default transaction image';
}
$current_title = get_the_title(); 
$current_client = get_field('client_name');
$current_client_cnt = mb_strlen($current_client);
$wrd_cnt = ($current_client_cnt > 28)? 159 : 196;
$current_content = get_the_content(); 
$final_content =str_ireplace('<p>','',$current_content);
$final_content=str_ireplace('</p>','',$final_content); 
$totlalphabet_count =  mb_strlen($final_content);
if($totlalphabet_count > $wrd_cnt ){
	$first_content = substr($final_content,0,$wrd_cnt );
	$output .= '<p>'.$first_content.'<span class="read-more-dot">...</span></p>';
	$second_content = substr($final_content,$wrd_cnt);
	$output .= '<div id="column'.get_the_ID().'" class="collapse"><p>'.$second_content.'</p></div>';
	$output .= '<div class="block-expnd-btn"><div class="block-expnd"></div></div>';
}else{
	$output .= '<p>'.$final_content.'</p>';
}
?>
<div class="col-12 col-sm-6 col-lg-4 transection-box-single">
	 <div class="transection-box experience-column">
		<h2><?php if($current_client){echo $current_client;}else{the_title();} ?></h2>
		
		<div class="experience-image" style="background-image:url('<?php echo $term_img['url']; ?>');">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/place-holder.jpg" alt="<?php echo $term_img['alt']; ?>" >
		</div>
		<div class="experience-column-content">
			<?php echo $output; ?>
		</div>
	 </div>
</div>
