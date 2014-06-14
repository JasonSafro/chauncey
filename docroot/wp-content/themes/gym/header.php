<!DOCTYPE html>
<?php
$options = get_option('infinite_options');
	$call = $options['call'];
	$email = $options['email'];
	$network = $options['network'];
	$hsn_facebook = $options['hsn_facebook'];
$PAGE_ID = get_the_ID(); 
$layout = 'stretched';
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
	<?php
	$options = get_option('infinite_options'); 
	?>
	<link rel='stylesheet' type='text/css' data-name="demo-style" href="<?php echo home_url(); ?>/?theme-styles=css" />
	<?php $logo_top = $options['logo_top']; ?>
    <?php $logo_scroll = $options['logo_scroll']; ?>
    <?php $google_fonts = $options['google_fonts']; ?>
    <?php $google_fonts_url = $options['google_fonts_url']; ?>
    <?php $custom_analytics = $options['custom_analytics']; ?>
    <?php $favicon_set = $options['favicon_set']; ?>
	
	<title><?php system_titles(); ?></title>
    <meta name="SYSTEM_VAR_PREFIX" content="<?php echo SYSTEM_VAR_PREFIX; ?>" />
    <meta name="SYSTEM_THEME" content="<?php echo SYSTEM_THEME; ?>" />  
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel='start' href='<?php echo home_url(); ?>'>
    <link rel='alternate' href='<?php echo $logo_scroll['url']; ?>'>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <meta name="viewport" content="width=device-width" /> 
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo $favicon_set['url']; ?>" />	
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>
    
    
    <?php echo $google_fonts_url?>
    <style type="text/css">
    <!--
    h1, h2, h3, h4, h5, h6 ul.products li.product h3, h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, #primary-menu ul li a, .section-title .title, .section-title .title a, .section-title h1.title span, .section-title p, #footer h3, .services h2, .item-info h3, .item-info-overlay h3, #contact-intro h1.title, #contact-intro p, .widget h3.title, .post-title h2.title, .post-title h2.title a, .tweet_text, .tweet_even span, .tweet_odd span, .twitter_header li, div.wpcf7 .watermark, .wpcf7-form-control.wpcf7-submit {
        <?php echo $google_fonts?> !important
    }
    -->
    </style>
    
	
    
<?php echo $custom_analytics; ?>
    

<?php wp_head(); ?>
</head>
<?php 
$width_full_page = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."full_width_page", true);
if ($width_full_page != "yes") { $width_page = 'content-wrapper'; 
} else { $width_page = 'content-full-wrapper'; ?> <style type="text/css"> #header-wrapper { margin-bottom: 0px !important; } #footer { margin-top: 0 !important; } </style> <?php
}
?>
<body id="top" <?php body_class(); ?>>

<?php
if ($layout == "boxed")
{
?>
<div id="wrapper">    

<div class="<?php echo $width_page; ?> clear"> 

<?php
}
?>
    <!-- START HEADER -->
    
    <div id="header-wrapper">
            
            <div class="header clear">     
                <div id="logo">
                <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo_top['url']; ?>" alt="" /></a>
                </div><!--END LOGO-->
            
                <div id="primary-menu">
                <?php
                wp_nav_menu( array( 'theme_location' => 'primary-menu' , 
                                    'container' => false, 
                                    'menu_class' => 'menu', 
                                    'menu_id' => '', 
                                    'fallback_cb' => 'header_fallback'
                                    ) );
                ?>                
                </div><!--END PRIMARY MENU-->
                
            </div><!--END HEADER-->    
        		<?php if (get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."hide_title", true) != "yes") { ?>
                    <div class="section-title">
                    	<div class="control-size rewidth-subtitle">
                            <div class="two-third">
                                <h1 class="title-header">
									<?php $title_page = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."title_page", true);
									
									$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
									
									if (is_month()) 
									{
										$title = __("Monthly archive", SYSTEM_THEME_SHORT);
										$subtitle = __("for ", SYSTEM_THEME_SHORT) . single_month_title('', false);
										if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
										echo $title; ?> <span><?php echo $subtitle; ?></span> <?php
									}
									
									elseif (is_search()) 
									{
										$title = __("Search results", SYSTEM_THEME_SHORT);
										$subtitle = __("for ", SYSTEM_THEME_SHORT) . $_GET["s"];
										if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
										echo $title; ?> <span><?php echo $subtitle; ?></span> <?php
                                        
									}
									
									elseif (is_tag()) 
									{
										$title = __("Tag archive", SYSTEM_THEME_SHORT);
										$subtitle = __("for ", SYSTEM_THEME_SHORT) . single_tag_title('', false);
										if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
										echo $title; ?> <span><?php echo $subtitle; ?></span> <?php
									}
									
									elseif (is_category()) 
									{
										$title = __("Archive", SYSTEM_THEME_SHORT);
										$subtitle = __("for ", SYSTEM_THEME_SHORT) . single_cat_title('', false);
										if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
										echo $title; ?> <span><?php echo $subtitle; ?></span> <?php
									}
									
									elseif (is_home()) 
									{
										$title = get_option('blogname');
										$subtitle = get_option('blogdescription');
										if ($paged > 1) $subtitle .= " - " . __("page", SYSTEM_THEME_SHORT) . " " . $paged;
										echo $title; ?> <span><?php echo $subtitle; ?></span> <?php
									}
									
									elseif(!empty($title_page)){ echo $title_page; }
									
									else { the_title(); }
									
									?>
                                    
								</h1>
                            </div>
                            
                            <ul class="close-container item-nav">
                            <?php previous_post_link("<li class='prev'> %link </li>", "%title"); ?>
                            <li><a class="close" target="_self" href="<?php echo site_url(); ?>"></a></li>
                            <?php next_post_link("<li class='next'> %link </li>", "%title"); ?>
                            </ul>
                        </div>               
                    </div><!--END SECTION TITLE-->
                <?php } ?>
    </div><!--END HEADER-WRAPPER-->   
    <?php $slider = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."slider", true); ?>
	<?php if($slider){
    ?>
    <div id="header-banner"><?php putRevSlider( "$slider" ) ?></div>     
    <?php }  else { ?> <style type="text/css"> #header-wrapper { margin-bottom: 45px; } </style> <?php } ?>
    <!-- END HEADER -->
<?php
if ($layout == "stretched")
{
    if ($page_template == "page-contact-2") $class = "class='fullwidth clear'"; else $class = "class='clear'";
?>
<div id="wrapper"  <?php echo $class; ?>>    

<?php
if ($page_template != "page-contact-2")
{
?>
<div class="<?php echo $width_page; ?> clear">
<?php
}
}
?>