<?php
/*
Plugin Name: Infinite Ad Pay 
Description: Infinite Ad Pay creates infinite Monitization widget area within your blog content. You can customize this widget areas, put ads (banner images /Script ad) inside posts and enjoy more ad views and clicks. Infinite Ad Pay also have awesome wordpress header widget area meant for header banner ad(728px X 90px).
Plugin URI: http://mrparagon.me/infinite-ad-pay
Author:  Kingsley Paragon
Author URI: http://mrparagon.me
Version: 1.1
Licence: GPLV2 
*/
function iap_pro_register_infinite_styles(){

	wp_enqueue_style('iap_pro_infinite_ad_pay_style',plugins_url('/css/infinite_ad_pro_styles.css', __FILE__));

}
add_action('wp_enqueue_scripts', 'iap_pro_register_infinite_styles');
add_action('admin_enqueue_scripts','iap_pro_register_infinite_styles' );

class IAP_Infinite_ad_pay_pro_img extends WP_Widget {
function IAP_Infinite_ad_pay_pro_img() {
$iap_pro_options = array( 'classname'=> 'iap-pro-infinite-ad-img','description'=>__('Ad Space for greater or less than 728X90 Responsive') );

 $this->WP_Widget( 'iap_pro_infinite_ad_img', __('Infinite Ad Pay Pro 728 X 90'), $iap_pro_options );
}



function widget( $args, $instance ){
extract($args, EXTR_SKIP);
if(is_array($instance)) { 
foreach( $instance as $k => $v ) {
     $$k = esc_attr($v);
 }
$img_url_here= (!empty($img_url_here))? $img_url_here: "http:// ";

$img_go_to= (!empty($img_go_to))? $img_go_to: " ";

$title= (!empty($title))? $title:  " ";

}
echo $before_widget;
echo $before_title. $title . $after_title; 
?>
<a href ="<?php echo $img_go_to;   ?> "><div class ="iap-img">
<img class ="iap-ad-image" src="<?php echo $img_url_here; ?>" target ="_blank">
</div> </a>
<?php
echo $after_widget;
}

function form($instance){
if(is_array($instance)) { 
foreach( $instance as $k => $v ) {
     $$k = esc_attr($v);
 }
$img_url_here= (!empty($img_url_here))? $img_url_here: " ";

$img_go_to= (!empty($img_go_to))? $img_go_to: " ";

$title= (!empty($title))? $title:  " ";
} ?>
<p>
<label for ="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title'); ?></label>
<input type ="text"
name ="<?php echo $this->get_field_name('title'); ?>"
id ="<?php echo $this->get_field_id('title'); ?>"
placeholder="sponsored"
class ="widefat"
value ="<?php echo $title; ?>"> </p>
<p>
<label for ="<?php echo $this->get_field_id('img_url_here'); ?>"><?php _e(' Advert Image'); ?></label>
<input type ="url"
name ="<?php echo $this->get_field_name('img_url_here'); ?>"
id ="<?php echo $this->get_field_id('img_url_here'); ?>"
placeholder="http://..."
class ="widefat"
value ="<?php echo $img_url_here;?>"> </p>

<p>
<label for ="<?php echo $this->get_field_id('img_go_to'); ?>"><?php _e('Image Link'); ?></label>
<input type ="url"
name ="<?php echo $this->get_field_name('img_go_to'); ?>"
id ="<?php echo $this->get_field_id('img_go_to'); ?>"
placeholder="http://..."
class ="widefat"
value ="<?php echo $img_go_to; ?>"> </p>
<p> </p>
<?php
}

 function update($new_instance, $old_instance){
return $new_instance;

 }
}

class IAP_Infinite_ad_pay_pro_sct extends WP_Widget {
function IAP_Infinite_ad_pay_pro_sct() {
$iap_pro_options = array( 'classname'=> 'iap-pro-infinite-ad-sct','description'=>__('Widget for script based ad like google adsense greater or less than 728x90') );
$this->WP_Widget( 'iap_pro_infinite_ad_sct', __('Infinite Ad Pay Pro for Script'), $iap_pro_options );
}


function widget( $args, $instance ){
extract($args, EXTR_SKIP);
if(is_array($instance)) { 
foreach( $instance as $k => $v ) {
     $$k = esc_attr($v);
 }
$script_go_here= (!empty($script_go_here))? $script_go_here: ' ';

$title= (!empty($title))? $title:  " ";

}
echo $before_widget;
echo $before_title. $title . $after_title; ?>
<div class = "iap-sct">

<?php echo $script_go_here;?>
</div>
<?php

echo $after_widget;
}


function form($instance){
if(is_array($instance)) { 
foreach( $instance as $k => $v ) {
     $$k = esc_attr($v);
 }
$img_url_here= (!empty($img_url_here))? $img_url_here: " ";

$script_go_here= (!empty($script_go_here))? $script_go_here: " ";

$title= (!empty($title))? $title:  " ";

}
?>
<p>
<label for ="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?></label>
<input type ="text"
name ="<?php echo $this->get_field_name('title'); ?>"
id ="<?php echo $this->get_field_id('title'); ?>"
placeholder="sponsored"
class ="widefat"
value ="<?php echo $title; ?>"> </p>

<p>
<label for ="<?php echo $this->get_field_id('script_go_here'); ?>"> <?php _e('Ad Code'); ?></label>
<textarea 
name ="<?php echo $this->get_field_name('script_go_here'); ?>"
id ="<?php echo $this->get_field_id('script_go_here'); ?>"
class ="widefat">
<?php echo $script_go_here; ?></textarea> </p>
<p> </p>
<?php

}

 function update($new_instance, $old_instance){
return $new_instance;
 }

}

function iap_pro_register_infinite_ad(){
	register_widget('IAP_Infinite_ad_pay_pro_img');
	register_widget('IAP_Infinite_ad_pay_pro_sct');
}

add_action('widgets_init', 'iap_pro_register_infinite_ad');




function iap_pro_make_inpost_sidebar($name, $id, $description){
$args = array(
 'name'=>$name,
 'id'=> $id,
 'description' => $description,
'before_widget'=> '<div class ="widget">',
'after_widget' => '</div>',
'before_title'=> '<h3>',
'after_title'=>'</h3>'
);
	register_sidebar($args);

}


function iap_pro_make_inheader_sidebar($name, $id, $description){
$args = array(
 'name'=>$name,
 'id'=> $id,
 'description' => $description,
'before_widget'=> '<div class ="head-widget">',
'after_widget' => '</div>',
'before_title'=> '<h3>',
'after_title'=>'</h3>'
);
	register_sidebar($args);

}

//dynamic sidebar flusher
function iap_sidebar_flusher($iap_bar)
{
$iap_sidebar_cnt = "";
ob_start();
dynamic_sidebar($iap_bar);
$iap_sidebar_cnt = ob_get_clean();
return $iap_sidebar_cnt;
}

//content filter if fulltext
 if( get_option('full_or_summary')=='fulltext' OR get_option('full_or_summary')=='' ):
 $iap_pro_counter =0;

function iap_pro_increment_iap_counter( $post_object ){
	global $iap_pro_counter;
	 $iap_pro_counter++;
 }


add_action('the_post','iap_pro_increment_iap_counter');

function iap_pro_add_advert_inside_contentx($contentx){
	if( is_home() OR is_archive() ):
global $iap_pro_counter;
$i =2;	$j = 1;
while( $i<=(int)get_option( 'posts_per_page' ) AND ( $j<=(int)get_option( 'posts_per_page' ) )): 
if($iap_pro_counter ==$j):
	print _e( $contentx );

	
endif;
$j+=2;
if($iap_pro_counter ==$i):
	print _e( $contentx );
dynamic_sidebar('insidepost'.$iap_pro_counter);


 return;
  endif;  // $iap_counter == $i text
  
  $i+=2; 



endwhile; // while $i <= posts per page

endif;	// is_home is_archive ends here
}

add_filter('the_content', 'iap_pro_add_advert_inside_contentx');


endif;


 if(get_option('full_or_summary')=='summary'):
 $iap_pro_counter =0;

function iap_pro_increment_iap_counter( $post_object ){
	global $iap_pro_counter;
	 $iap_pro_counter++;
 }


add_action('the_post','iap_pro_increment_iap_counter');

function iap_pro_add_advert_inside_summary($summary){
	if( is_home() OR is_archive() ):
global $iap_pro_counter;
$i =2;	$j = 1;
while( $i<=(int)get_option( 'posts_per_page' ) AND ( $j<=(int)get_option( 'posts_per_page' ) )): 
if($iap_pro_counter ==$j):
	
print _e( $summary );


	
endif;
$j+=2;
if($iap_pro_counter ==$i):

("<p>"._e( $summary ). '</p>');

dynamic_sidebar( 'insidepost'.$iap_pro_counter );
//iap_sidebar_flusher('insidepost'.$iap_pro_counter);
 return;

  endif;  // $iap_counter == $i text
  
  $i+=2; 



endwhile; // while $i <= posts per page

endif;	// is_home is_archive ends here
}

add_filter( 'the_excerpt', 'iap_pro_add_advert_inside_summary' );


endif;







$i = 2;
(int)get_option( 'posts_per_page' );
while($i <= (int)get_option('posts_per_page')){ 
iap_pro_make_inpost_sidebar(__( 'Infinite AP Pro Insidepost Ad Area ' ).$i, 'insidepost'.$i, __( 'Place Widget here for Adverts to be displayed on post no ' ). $i);
$i =$i+2;
}


//single post display
function iap_pro_ad_inside_blog( $singlecontent ){
$excluded_post_id = explode(',', get_option( 'iap_remove_post_id' ));
$get_current_post_id = get_the_id();

  if(is_single($excluded_post_id)):
$iap_pro_content_single =get_the_content();
echo "<p>". _e( $iap_pro_content_single )."</p>";

elseif(is_single() ):
$iap_pro_content_single =get_the_content();
echo "<p>". _e( $iap_pro_content_single ) ."</p>";
dynamic_sidebar('insidepost_infinite_single_blog');


endif; 

}

add_filter('the_content','iap_pro_ad_inside_blog');

iap_pro_make_inpost_sidebar(__( 'infinite AP Pro single post Widget Area' ), 'insidepost_infinite_single_blog', __( 'Place Advert Widget to be displayed below all single posts' ));

// Single page display
function iap_pro_ad_inside_page($singlepage){
$included_page_id = explode(',', get_option('iap_add_post_id'));
if(is_page($included_page_id) ):
$iap_pro_content_single =get_the_content();
echo "<p>". _e( $iap_pro_content_single ) ." </p>";
dynamic_sidebar('insidepost_infinite_single_page');

elseif(!is_page($included_page_id) AND is_singular( 'page' ) ):

$iap_pro_content_single =get_the_content();
echo "<p>". _e( $iap_pro_content_single ) ."</p>";
endif;
}

add_filter('the_content','iap_pro_ad_inside_page');

iap_pro_make_inpost_sidebar(__( 'infinite AP Pro single page Widget Area' ), 'insidepost_infinite_single_page', __( 'Place Advert Widget to be displayed below all single page selected' ) );


// HEADER SECTION AD
add_action('wp_head', 'iap_pro_just_get_find_wp_head');

iap_pro_make_inheader_sidebar(__( 'Infinite Ad Pay Header Area ' ), 'insidehead_infinite_top', __( 'Place Advert widget to be displayed on the header' ) );

function iap_pro_just_get_find_wp_head() {
	ob_start();	
}

function iap_pro_do_get_find_footer(){
$iap_pro_ad_body= ob_get_clean();

$pattern ='/<[bB][oO][dD][yY]\s[A-Za-z]{2,5}[A-Za-z0-9 "_=\-\.]+>|<body>/';
ob_start();
if(preg_match($pattern, $iap_pro_ad_body, $iap_pro_head_return)){
//PREG_OFFSET_CAPTURE

$rep_pro =$iap_pro_head_return[0].iap_sidebar_flusher('insidehead_infinite_top');

echo preg_replace($pattern, $rep_pro, $iap_pro_ad_body);

}
ob_flush();
}
add_action('wp_footer', 'iap_pro_do_get_find_footer');


/* PLUGIN OPTIONS PAGE ====*/

class IAP_options_settings {

public function __construct(){
add_action('admin_init', array($this, 'iap_pro_register_settings'));
add_action('admin_menu', array($this,'iap_pro_add_into_menu_iap_settings'));
}

public function iap_pro_add_into_menu_iap_settings(){
add_menu_page('Infinite Ad Pay Settings', 'Infinite Ad Pay Settings', 'manage_options','iap_options_display_page', array( $this,'IAPay_pro_do_main_settings_page' ));
}

public function iap_pro_register_settings(){
	register_setting( 'iap_options_display_page','iap_add_post_id', array( $this, 'iap_add_id_validate_cb' ));
	register_setting( 'iap_options_display_page','full_or_summary', array( $this, 'full_or_summary_validate_cb' ));
	register_setting( 'iap_options_display_page','iap_remove_post_id', array( $this, 'iap_remove_id_validate_cb' ));
} 
public function IAPay_pro_do_main_settings_page(){
$iap_add_post_id = get_option('iap_add_post_id');
$iap_remove_post_id =get_option('iap_remove_post_id');
$full_or_summary =get_option('full_or_summary');

//print_r($iap_add_post_id); 
//print_r($iap_remove_post_id);
if ( isset($_GET['settings-updated']) ){

if($_GET['settings-updated'] =='true')  {
echo "<p class ='success'> Settings saved </p>";
}
} 
?>
<div class="wrap iap_white">
<h1> Infinite Ad Pay Pro Settings  </h1>
<form action="options.php" method="POST">
<?php settings_fields( 'iap_options_display_page' );?>
<p>
<label for ="iap_add_post_id"> <?php _e( 'Comma separated page ids to include' ); ?> </label>
<input type ="text" name="iap_add_post_id" placeholder ="999, 1123, 666"
class="widefat" id="iap_add_post_id" value="
<?php echo $iap_add_post_id ?>">
</p>
<p>
<label for ="iap_remove_post_id"> <?php _e( 'Comma separated post ids to exclude' ); ?>  </label>
<input type ="text" name="iap_remove_post_id" placeholder ="999, 1123, 666"
class="widefat" id="iap_remove_post_id" value="<?php echo $iap_remove_post_id ?>">
</p>

<p>
<label for ="iap_remove_post_id"><?php _e(' My Homepage and Archive page is ' ); ?>  </label>

<select name="full_or_summary" id="full_or_summary">
<option value ='fulltext' <?php if(isset($full_or_summary)){ if($full_or_summary =='fulltext') echo 'selected';}     ?>> Full Text </option>
<option value='summary' <?php if(isset($full_or_summary)){ if($full_or_summary =='summary') echo 'selected';}     ?>> Summary or Excerpt </option>
</select>
<!-- <input type ="text" name="iap_remove_post_id" placeholder ="999, 1123, 666"
class="widefat" id="iap_remove_post_id" value="<?php echo $iap_remove_post_id ?>"> -->
</p>
<?php submit_button(); ?>
</div>
 <?php
}
public function full_or_summary_validate_cb($input){
if($input['full_or_summary'] !='') return $input;

}
public function iap_add_id_validate_cb($input){
	$d_check = explode(',', $input);
	$bad_post_id =array();
	foreach ($d_check as $post_id) {
 $bad_post_id[] =preg_match('/[^0-9]/', trim($post_id) );
}
$bad_post_id =array_filter($bad_post_id);
if(!empty($bad_post_id) ){
	return  "Error: Post ID(s) must be comma separated numbers";
 }
 else{
 	return $input;
 }
}

public function iap_remove_id_validate_cb($input){
	$d_check = explode(',', $input);
	$bad_post_id =array();
	foreach ($d_check as $post_id) {
 $bad_post_id[] =preg_match('/[^0-9]/', trim($post_id) );
}
$bad_post_id =array_filter($bad_post_id);
if(!empty($bad_post_id) ){
	return  "Error: Post ID(s) must be comma separated numbers";
 }
 else{
 	return $input;
 }
}


}
if(is_admin()) $iap_pro_settings = new IAP_options_settings(); 
   
//little clean up 
register_deactivation_hook(__FILE__,'iap_clear_on_deactivate');

function iap_clear_on_deactivate(){
	unregister_setting('iap_options_display_page', 'iap_add_post_id');
	unregister_setting('iap_options_display_page', 'iap_remove_post_id');
	unregister_setting('iap_options_display_page', 'full_or_summary');
}
?>