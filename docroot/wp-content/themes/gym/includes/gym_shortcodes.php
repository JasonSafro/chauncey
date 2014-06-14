<?php

/***************************/
/*  System WP SHORT CODES  */
/***************************/

add_action('admin_head', 'infinite_add_my_tc_button');

function infinite_add_my_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "infinite_add_tinymce_plugin");
		add_filter('mce_buttons', 'infinite_register_my_tc_button');
	}
}

function infinite_add_tinymce_plugin($plugin_array) {
   	$plugin_array['infinite_tc_button'] = SYSTEM_ROOT . '/includes/gym_shortcodes_options.js'; // CHANGE THE BUTTON SCRIPT HERE
   	return $plugin_array;
}

function infinite_register_my_tc_button($buttons) {
   array_push($buttons, "infinite_tc_button");
   return $buttons;
}

/*******************************************************************************************************************
* COLUMNS SHORTCODES                                                                                               *
*                                                                                                                  *
*******************************************************************************************************************/
function One( $atts, $content = null ) {
   return '<div class="one">' . do_shortcode($content) . '</div>';
}
add_shortcode('one', 'One'); 

function One_third( $atts, $content = null ) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'One_third');

function One_third_last( $atts, $content = null ) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third_last', 'One_third_last');

function Two_thirds( $atts, $content = null ) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds', 'Two_thirds');

function Two_thirds_last( $atts, $content = null ) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_thirds_last', 'Two_thirds_last');

function One_half( $atts, $content = null ) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'One_half');

function One_half_last( $atts, $content = null ) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half_last', 'One_half_last');

function One_fourth( $atts, $content = null ) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'One_fourth');

function One_fourth_last( $atts, $content = null ) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth_last', 'One_fourth_last');



function gym_google_map($atts, $content = null) {
/*******************************************************************************************************************
* GOOGLE MAP                                                                                                     *
*                                                                    *
*******************************************************************************************************************/
	$options = get_option('infinite_options');
$choose_global_color = $options['choose_global_color'];
	?>
    <script>
	(function($){
    $.fn.extend({
        gym_google_map: function(options) {
 
            var defaults = {
                //google_api: 'AIzaSyDs8JCxbOANzW9db8UG1LLNDmSq4DUNv4w',
                location: '',
				zoom: 4,
            };

            var options = $.extend(defaults, options);
         
            return this.each(function() {
			  var o = options;
			  var obj = $(this); 
			  
			  var obj_id = obj.attr("id");

			  var wait = setInterval(function() {
				  if( $("#" + obj_id).is(":visible") ) {
					  clearInterval(wait);
					  // This piece of code will be executed
					  var obj_class = obj.attr("class");
					  var geocoder;
					  var map;
					  geocoder = new google.maps.Geocoder();
					  //alert("usao2")
					  var latlng = new google.maps.LatLng(40, 40); // starting default location
					  
					  var customColor = [
						{
						  featureType: "all",
						  stylers: [{ saturation: -100 } ] } ];
					  
					  var myOptions = {
						zoom: o.zoom,
						styles: customColor,
						center: latlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						zoomControl: true,
						scrollwheel: false,
						zoomControlOptions: {
						  style: google.maps.ZoomControlStyle.DEFAULT
					  },
						scaleControl: true,
					  }
					  map = new google.maps.Map(document.getElementById(obj_id), myOptions);						
					  var address = o.location;
					  geocoder.geocode( { 'address': address}, function(results, status) {	  
								
						  if (status == google.maps.GeocoderStatus.OK) {
							  map.setCenter(results[0].geometry.location);
							  var marker = new google.maps.Marker({
								  map: map,
								  position: results[0].geometry.location
							  });
						  } else {
							  alert("Geocode was not successful for the following reason: " + status);
						  }
			
					  });		  
					  
				  }
			  }, 200);

 
            }); // return this.each
        }
    });
})(jQuery);
	</script>
    <?php
    extract(shortcode_atts(array("location" => "Chicago", "zoom" => 15), $atts)); 
    $unique_id =  $location . $zoom ;
    $unique_id = preg_replace("/[^A-Za-z0-9]/", '', $unique_id);
    $html = ""; 
    $html .= '<div class="one"><div class="google-map" id="' . $unique_id  .'"></div></div>';
    $html .= '<script type="text/javascript"> jQuery(document).ready(function($){';
    $html .= '$("#' . $unique_id .'").gym_google_map({location: "' . $location . '", zoom:' . $zoom . '})';
    $html .= '}); </script>';
    
    return $html;
}
add_shortcode('gym_google_map', 'gym_google_map');

function gym_border_divider($atts, $content = null) {
/*******************************************************************************************************************
* BORDER DIVIDER WITH NOTHING                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("top" => "40", "bottom" => "40"), $atts));
   return "<div class='divider-border' style='margin-top: $top" . "px; margin-bottom: $bottom" . "px'></div><div class='clear'></div>";
}
add_shortcode('gym_border_divider', 'gym_border_divider');

function gym_divider($atts, $content = null) {
/*******************************************************************************************************************
* DIVIDER WITH NOTHING - ONLY EMPTY SPACE                                                                          *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("height" => '80'), $atts));
   return "<div class='divider' style='height: $height" . "px;'></div><div class='clear'></div>";
}
add_shortcode('gym_divider', 'gym_divider');

function gym_graph_container($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BARS CONTAINER                                                                                             *
*                                                                                                                  *
*******************************************************************************************************************/
    $rand = rand(0,10000);
    $html = '<ul id="skills-graph-' . $rand . '" class="skills-graph"> ' . parse_shortcode_content($content) .'</ul>'; 
    $html .= '<script type="text/javascript">jQuery(document).ready(function($){$("#skills-graph-' . $rand . '").gym_sliding_graph({speed: 1000});})</script> ';      
    return parse_shortcode_content($html);
}
add_shortcode('gym_graph_container', 'gym_graph_container');

function gym_graph($atts, $content = null) {
/*******************************************************************************************************************
* GRAPH BAR SHORTCODE (MUST BE INSIDE THE GRAPH CONTAINER)                                                         *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "Title", "percent" => 50), $atts));   
    $html = ' <li><p>' . $title . ' <strong>' . $percent .'%</strong></p><span class="' . $percent . '"></span></li>';
    return $html;
}
add_shortcode('gym_graph', 'gym_graph');

function gym_social_icons($atts, $content = null) {
/*******************************************************************************************************************
* SOCIAL ICONS                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array(), $atts));
    $html = ""; 
    $html .=  "       <ul class='social-bookmarks'>";  
    $social_list_array = explode(",", $content);
    for ($i = 0 ; $i < count($social_list_array) ; $i = $i + 2)
    {
    $html .=  "<li class='" . trim($social_list_array[$i]) . "'><a href='" . trim($social_list_array[$i + 1]) . "'>" . trim($social_list_array[$i]) . "</a></li>";   
    }
     $html .=  "           </ul>";


    return $html;
}
add_shortcode('gym_social_icons', 'gym_social_icons');


function gym_list($atts, $content = null) {
/*******************************************************************************************************************
* SOCIAL ICONS                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
    $html =  "<div class='$style'>" . $content . "</div>";  
    return $html;
}
add_shortcode('gym_list', 'gym_list');


function gym_team_member($atts, $content = null) {
/*******************************************************************************************************************
* TEAM MEMBER                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("member_name" => "", "member_position" => "", "member_img_src" => "", "member_social_list" => "", "member_columns" => ""), $atts));
    $html = ""; 
    if ($member_img_src == "")
    {
        $member_images = gym_get_images($content);
        if (count($member_images) > 0) $member_img_src = $member_images[0];
    }
    $text = gym_remove_images($content, false);
    if ($member_columns == "2") $class = "one-half"; 
    if ($member_columns == "3") $class = "one-third";
    if ($member_columns == "4") $class = "one-fourth";
    
     $html .=  "<div class='team $class'>";
     if ($member_img_src != "") $html .=  " <img src='" . $member_img_src . "' alt='' />";                       
     $html .=  "       <div class='team-member-info'>\n";
     $html .=  "           <ul>\n";
     $html .=  "               <li><h2>" . $member_name . "</h2></li>";
     $html .=  "               <li><h3>" . $member_position . "</h3></li>";        
     $html .=  "           </ul>\n";
     $html .=  "           <p>" . $text ."</p>\n";         
     $html .=  "           <ul class='social-personal'>\n";        
     
     if ($member_social_list != "") 
     {
         $member_social_list_array = explode(",", $member_social_list);
         for ($i = 0 ; $i < count($member_social_list_array) ; $i = $i + 2)
         {
               $html .=  "<li><a href='" . $member_social_list_array[$i + 1] . "'>" . $member_social_list_array[$i] . "</a><span>|</span></li>";   
         }
    
     }
     $html .=  "           </ul>";
     $html .=  "       </div>";
     $html .=  "</div>";

    return $html;
}
add_shortcode('gym_team_member', 'gym_team_member');


function gym_pricing($atts, $content = null) {
/*******************************************************************************************************************
* PRICING                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("pricing_name" => "", "pricing_value" => "", "pricing_local_currency" => "", "pricing_columns" => "", "pricing_advantages" => "", "pricing_text" => ""), $atts));
    $html = ""; 
    if ($pricing_columns == "2") $class = "one-half"; 
    if ($pricing_columns == "3") $class = "one-third";
    if ($pricing_columns == "4") $class = "one-fourth";
    
     $html .=  "<div class='pricing $class'>";                    
     $html .=  "       <div class='pricing-info'>\n";
     $html .=  "           <ul>\n";
     $html .=  "               <li><h2>" . $pricing_name . "</h2></li>";
     $html .=  "               <li class='pricing-value-container'><span class='pricing-local-currency'>" . $pricing_local_currency . "</span><span class='pricing-value'>" . $pricing_value . "</span></li>";   
	 $html .=  "			   <li><p class='pricing-text'>"  . $pricing_text .  "</p></li>";
     $html .=  "           </ul>\n";      
     $html .=  "           <ul class='pricing-advantages-container'>\n";    
	 
     if ($pricing_advantages != "") 
     {
         $pricing_advantages_array = explode(",", $pricing_advantages);
         for ($i = 0 ; $i < count($pricing_advantages_array) ; $i = $i + 2)
         {
               $html .=  "<li>" . $pricing_advantages_array[$i] . "</li><li>"  . $pricing_advantages_array[$i + 1] . "</li>";   
         }
    
     }
     $html .=  "           </ul>";
     $html .=  "       </div>";
     $html .=  "</div>";

    return $html;
}
add_shortcode('gym_pricing', 'gym_pricing');


function gym_icon_boxes_container($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOXES CONTAINER                                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    $html =  "<ul class='grid row4 services'>" . parse_shortcode_content($content) ."</ul>";
    return $html;
}
add_shortcode('gym_icon_boxes_container', 'gym_icon_boxes_container');


function gym_icon_box($atts, $content = null) {
/*******************************************************************************************************************
* ICON BOX                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("icon" => "", "caption" => "", "url" => "", "target" => ""), $atts));
    
    $text = gym_remove_images($content, false);
    $html = ""; 
     $html .=  "<li>";
     $html .=  "<div>";
     if ($url != "") $html .=  "<a href='$url' target='$target'>"; 
     $html .=  "<h2>$caption</h2>"; 
     if ($icon != "") $html .=  "<img class='check_path' src='$icon' alt='' />";
     $html .=  "<p>" . no_wpautop($text) ."</p>";
     if ($url != "") $html .=  "</a>"; 
     $html .=  "</div>";
     $html .=  "</li>";
     
     //$html = no_wpautop($html);

    return $html;
}
add_shortcode('gym_icon_box', 'gym_icon_box');

function gym_boxed_text($atts, $content = null) {
/*******************************************************************************************************************
* BOXED TEXT                                                                                                    *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "", "description" => ""), $atts));
    $html = ""; 
     $html .=  "<div class='section-title home'>\n";
     $html .=  "   <h2 class='title'>$title</h2>\n";                        
     $html .=  "   <p>$description</p>\n";
     $html .=  " </div><!--END SECTION TITLE-->\n";

    return $html;
}
add_shortcode('gym_boxed_text', 'gym_boxed_text');

function gym_icons($atts, $content = null) {
/*******************************************************************************************************************
* ICONS                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("icons" => ""), $atts));
    
    $html = ""; 
     if ($icons != "") $html .=  "<img class='check_path' src='$icons' alt='' />";

    return $html;
}
add_shortcode('gym_icons', 'gym_icons');

function gym_button($atts, $content = null) {
/*******************************************************************************************************************
* BUTTONS                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("text" => "Button", "url" => "http://www.jaredsdias.com", "target" => "_self", "size" => "small", "style" => "", "color" => ""), $atts));
   return "<a target='$target' href='$url' class='button $size $style' style='background-color: $color;'>$text</a>";
}
add_shortcode('gym_button', 'gym_button');

function gym_highlight($atts, $content = null) {
/*******************************************************************************************************************
* HIGHLIGHTS                                                                                                       *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
   return "<span class='$style'>" .no_wpautop($content). "</span>";
}
add_shortcode('gym_highlight', 'gym_highlight');

function gym_dropcaps($atts, $content = null) {
/*******************************************************************************************************************
* DROPCAPS                                                                                                         *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("style" => ""), $atts));
   return "<span class='$style'>" .no_wpautop($content). "</span>";
}
add_shortcode('gym_dropcaps', 'gym_dropcaps');


function gym_blockquote($atts, $content = null) {
/*******************************************************************************************************************
* BLOCKQUOTES                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("align" => "left"), $atts));
   return "<blockquote class='$align'>" .no_wpautop($content). "</blockquote>";
}
add_shortcode('gym_blockquote', 'gym_blockquote');

function gym_toggle($atts, $content = null) {
/*******************************************************************************************************************
* TOGGLE                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("caption" => "Toggle", "collapsable" => "yes"), $atts));
    $html = ""; 
     if ($collapsable == "yes")
     {
         $html .=  '<div class="trigger-button"><span>' . $caption . '</span></div> <div class="accordion">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END ACCORDION-->';
     }
     else
     {
         $html .= '<div class="toggle-wrap">';    
         $html .=  '<span class="trigger"><a href="#">' . $caption . '</a></span><div class="toggle-container">';
         $html .= no_wpautop($content);                                                             
         $html .= '</div><!--END TOGGLE-WRAP--></div><!--END TOGGLE-CONTAINER-->';
     }
   return $html;
}
add_shortcode('gym_toggle', 'gym_toggle');

function gym_gallery($atts, $content = null) {
/*******************************************************************************************************************
* GALLERY                                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "Recent Gallery", "cat_id" => "", "no" => "-1", "show_filters" => "no", "columns" => "4"), $atts));
    // The Query
    
    $my_cat_object = get_category($cat_id);
    
    if (!($my_cat_object)) $my_cat_object = get_term($cat_id, "gallery_category");
    
    $taxonomy = $my_cat_object->taxonomy;
    
    if ($taxonomy ==  "gallery_category") $post_type = "gallery_item"; else $post_type = "post";
    
    $args=array(
    'tax_query' => array(
        array(
            'taxonomy' => $taxonomy,
            //'field' => $termID
            'terms' => $cat_id
        )
    ),
    'post_type' => $post_type,
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $no
    );
    global $wp_query, $post;
    $taxonomyName = $taxonomy;
    $termchildren = get_term_children( $cat_id, $taxonomyName );
    $html = "";
    if ($title != "")
    {
    $html .= '<h3 class="title">' . $title . '</h3>';
    }
    if ($show_filters != "no")
    {
    
    $html .=    '<div class="filterable"><ul id="gallery-nav">';
    $html .=    '<li class="current"><a href="#" data-filter="*">' . __('All', SYSTEM_THEME_SHORT) . '</a></li>';
    $k = 0;
    foreach ($termchildren as $child) 
    {
        $term = get_term_by( 'id', $child, $taxonomyName );
        $k++;
        $html .= '<li><a href="#" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';
    }
    
    $html .= '</ul><!--END GALLERY-NAV--></div><!--END FILTERABLE-->';
    }
    
    $html .= '<div class="gallery-grid">';
    if ($shape != "") $html .= '<ul id="thumbs" class="shaped ' . $shape . '">';   
    else $html .= '<ul id="thumbs">';
    
    $temp = $wp_query;
    $wp_query = new WP_Query( $args );

// The Loop
while ( $wp_query->have_posts() ) : $wp_query->the_post();
//$sve = print_r($post, false);
    $title = get_the_title();
    $permalink = get_permalink();
    $queried_post = get_post(get_the_ID());
    $excerpt = $queried_post->post_excerpt;
    
    if ($excerpt == "") $excerpt = gym_excerpt(20);
    if ($shape != "" && $shape != "triangle") $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-square' );
    else $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
    
    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);
    $subtitle = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."subtitle", true); 
    
    $featured_image = $featured_image_array[0];
    // get the gallery cats
    $terms = get_the_terms( $post->ID, $taxonomy );                           
    if ( $terms && ! is_wp_error( $terms ) ) : 
        $names = array();
        $slugs = array();
        foreach ( $terms as $term ) {
            $names[] = $term->name;
            $slugs[] = $term->slug;
        }                                
        $name_list = join( ", ", $names );
        $slug_list = join( " ", $slugs ); 
    endif;
    if ($shape != "") $html .= '<li class="item ' . $slug_list . '"><div class="item-container">'; 
    else $html .= '<li class="col' . $columns . ' item ' . $slug_list . '">';
    
    $html .= '<img src="' . $featured_image . '" alt="" />';
    
    if ($shape != "")  $html .= '</div>';
    else $html .= '<div class="col' . $columns . ' item-info"><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3></div>';
    
    //if ($subtitle != "") $title = $title . " - " . $subtitle;  
    
    if ($shape != "") $html .= '<div class="item-info-overlay"><div><h3 class="title"><a href="' . $permalink . '">' . $title . '</a></h3><h4 class="no_title"> ' . $name_list . '</h4>';
    else $html .= '<div class="item-info-overlay"><div>';   
    
    $html .= '<a href="' . $permalink . '" class="view">details</a>';
    
    if ($video_link != "") $featured_image = $video_link;
    
    $slug_list_ = "pretty_photo_gallery";
    
    $html .= '<a title="' . $title . ' / ' . $name_list . '" href="' . $featured_image . '" class="preview" data-rel="prettyPhoto[' . $slug_list_ . ']">preview</a>';
    $html .= '</div></div><!--END ITEM-INFO-OVERLAY-->';
    $html .= '</li>';
endwhile;

$wp_query = $temp;  //reset back to original query

// Reset Post Data
//wp_reset_postdata();
    $html .= '</ul>';
    $html .= '</div>';
    return $html;
}
add_shortcode('gym_gallery', 'gym_gallery');

function gym_grid($atts, $content = null) {
/*******************************************************************************************************************
* HIGHLIGHTS                                                                                     *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("grid_columns" => "4"), $atts));
    $html = ""; 
    $html .= "<ul class='grid row$grid_columns clients'><li>" .no_wpautop($content). "</li></ul>";
    $html .= "<script type='text/javascript'> jQuery(document).ready(function($) {";
    $html .= "$('.grid').gym_last_last_row();";
    $html .= "}) </script>";
   return $html;
}
add_shortcode('gym_grid', 'gym_grid');

function gym_fullwidth_container($atts, $content = null) {
/*******************************************************************************************************************
* FULLWIDTH CONTAINER                                                                                                      *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("fullwidth_container_img_src" => "", "fullwidth_container_img_position" => "", "fullwidth_container_img_local" => "", "fullwidth_container_color_overlay" => "", "fullwidth_container_color_scheme" => "", "fullwidth_container_padding" => "", "fullwidth_container_border" => ""), $atts));
    $html = ""; 
    if ($fullwidth_container_img_src == "")
    {
        $fullwidth_container_img_src = gym_get_images($content);
        if (count($fullwidth_container_img_src) > 0) $fullwidth_container_img_src = $fullwidth_container_img_src;
    }
    $text = gym_remove_images($content, false);
	
	$title_subtitle = "";
	
	if ($fullwidth_container_color_scheme != "normal" ) $fullwidth_container_color_scheme = "color:#FFF;";
	
	else {$fullwidth_container_color_scheme = "";}
	
	if ($fullwidth_container_color_overlay != "") $fullwidth_container_color_overlay = "background-color: $fullwidth_container_color_overlay;";
	
	if ($fullwidth_container_border != "") $fullwidth_container_border = "border-top: 1px solid $fullwidth_container_border;";
	
	
	if ($fullwidth_container_img_src != "url" ) $fullwidth_container_style = "style='background: url( $fullwidth_container_img_src ) $fullwidth_container_img_position $fullwidth_container_img_local;'";
    
     $html .=  "<div class='fullwidth-container $class' style='$fullwidth_container_color_overlay $fullwidth_container_border $fullwidth_container_color_scheme' >";
		 $html .=  "<div class='fullwidth-container' $fullwidth_container_style >";
			$html .= "<div class='content-wrapper clear'>";
				$html .= "<div class='one' style='padding: $fullwidth_container_padding 0'>" . do_shortcode($content) . "</div>";
			$html .=  "</div>"; 
		 $html .=  "</div>"; 
     $html .=  "</div>";

    return $html;
}
add_shortcode('gym_fullwidth_container', 'gym_fullwidth_container');

function gym_title_subtitle($atts, $content = null) {
/*******************************************************************************************************************
* TITLE AND SUBTITLE                                                                                    *
*                                                                                                                  *
*******************************************************************************************************************/
    extract(shortcode_atts(array("title" => "", "subtitle" => "", "align" => "", "color" => ""), $atts));
	
	if ($color != "normal" ) $color = 'color:#FFF;';
	
    $html = ""; 
    $html .= "<div class='title_subtitle' style='text-align:$align; margin-bottom: 50px;'><h1 style='$color';>$title</h1><br /><h2>$subtitle</h2></div>";
   return $html;
}
add_shortcode('gym_title_subtitle', 'gym_title_subtitle');



?>