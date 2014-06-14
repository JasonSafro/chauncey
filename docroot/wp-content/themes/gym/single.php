<?php get_header(); ?>
<?php
$options = get_option('infinite_options');
$show_sharing_options = $options['show_sharing_options'];

$comments = comments_open() && get_option("default_comment_status ") == "open"; 
$blog_single_page_style= 1;

if (have_posts()) : while(have_posts()) : the_post(); 
$subtitle = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."subtitle", true);
$hide_title = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."hide_title", true); 
$centered_title = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."centered_title", true);
$select_blog_category = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_blog_category", true); 
$sidebar = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_sidebar", true); 


if ($blog_single_page_style == 1) $inner_content_class = "blog1";
if ($blog_single_page_style == 2) $inner_content_class = "blog1"; 
if ($blog_single_page_style == 3) $inner_content_class = "blog3"; 
if ($blog_single_page_style == 4) $inner_content_class = "blog1"; 
if ($blog_single_page_style == 5) $inner_content_class = "blog5"; 
if ($blog_single_page_style == 6) $inner_content_class = "blog6"; 
?>
<div id="inner-content" class="<?php echo $inner_content_class; ?>">
<?php 
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
if ($blog_single_page_style == 3) $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-square' ); 
$featured_image = $featured_image_array[0];
?>

            <div class="post" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php
if ($blog_single_page_style == "1")
{
?>      
                
                <div class="post-content">    
            
                    <div class="post-media">
                    <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?> 
                        <?php if (extra_images_exists()) { include ("slider.inc.php"); } else { ?>       
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
                        <?php } ?>
                    <?php } ?> 
                    </div><!--END POST-MEDIA-->
                
                    <div class="post-title">                
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!--END POST-TITLE-->
                
                    <div class="post-meta">                
                        <ul>
                            <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                        </ul>
                    </div><!--END POST-META-->  
<?php
}
?>
<?php
if ($blog_single_page_style == "2")
{
?>
                <div class="post-info">                        
                    <div class="date"><span class="month"><?php the_time('M'); ?></span><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('Y'); ?></span></div>                    
                    <div class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></div>                            
                </div><!--END POST-INFO-->        
                
                <div class="post-content">  
                
                    <div class="post-title">                
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!--END POST-TITLE-->
                    
                    <div class="post-meta">                
                        <ul>
                            <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                        </ul>
                    </div><!--END POST-META-->  
            
                    <div class="post-media">
                    <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?>        
                        <?php if (extra_images_exists()) { include ("slider.inc.php"); } else { ?>        
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
                        <?php } ?>
                    <?php } ?> 
                    </div><!--END POST-MEDIA-->
<?php
}
?>
<?php
if ($blog_single_page_style == "3")
{
?>
            
                <div class="post-info">                        
                    <div class="date"><span class="month"><?php the_time('M'); ?></span><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('Y'); ?></span></div>                    
                    <div class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></div>                            
                </div><!--END POST-INFO-->          
            
                <div class="post-media">
                <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="200" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?>        
                        <?php if (extra_images_exists()) { include ("slider.inc.3.php"); } else { ?>         
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="270" height"270" /></a>
                        <?php } ?>
                    <?php } ?> 
                </div><!--END POST-MEDIA-->
                
                <div class="post-content">
                    
                    <div class="post-title">                
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!--END POST-TITLE-->
                
                    <div class="post-meta">                
                        <ul>
                            <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                        </ul>
                    </div><!--END POST-META-->  
<?php
}
?>
<?php
if ($blog_single_page_style == "4")
{
?>
                <div class="post-media"> 
                <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?>       
                        <?php if (extra_images_exists()) { include ("slider.inc.php"); } else { ?>         
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
                        <?php } ?>
                    <?php } ?> 
                </div><!--END POST-MEDIA-->
            
                <div class="post-info">                        
                    <div class="date"><span class="month"><?php the_time('M'); ?></span><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('Y'); ?></span></div>                    
                    <div class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></div>                            
                </div><!--END POST-INFO-->        
                
                <div class="post-content">    
                
                    <div class="post-title">                
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!--END POST-TITLE-->
                
                    <div class="post-meta">                
                        <ul>
                            <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                        </ul>
                    </div><!--END POST-META-->  
<?php
}
?>
<?php
if ($blog_single_page_style == "5")
{
?>
                <div class="post-title">                
                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div><!--END POST-TITLE-->
                
                <div class="post-meta">                
                    <ul>
                        <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                    </ul>
                </div><!--END POST-META-->
                
                <div class="post-media">
                <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?>        
                        <?php if (extra_images_exists()) { include ("slider.inc.php"); } else { ?>         
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
                        <?php } ?>
                    <?php } ?> 
                </div><!--END POST-MEDIA-->
            
                <div class="post-info">                        
                    <div class="date"><span class="month"><?php the_time('M'); ?></span><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('Y'); ?></span></div>                    
                    <div class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></div>                            
                </div><!--END POST-INFO-->        
                
                <div class="post-content">  
<?php
}
?>
<?php
if ($blog_single_page_style == "6")
{
?>
                <div class="post-title">                
                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div><!--END POST-TITLE-->
                
                <div class="post-meta">                
                    <ul>
                        <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories_single_page'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page_single'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                    </ul>
                </div><!--END POST-META--> 
                
                <div class="post-media"> 
                <?php
                    $video_link = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."video_link", true);

                    if ($video_link != "")
                    {
                        if (gym_is_mov($video_link) || gym_is_swf($video_link))
                        {
                        ?>
                        <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        <?php
                        }
                        if (gym_is_vimeo($video_link) || gym_is_youtube($video_link))
                        {
                            if (gym_is_vimeo($video_link))
                            {
                                $video_link = "http://player.vimeo.com/video/" . gym_get_vimeo_id($video_link);
                            }
                            if (gym_is_youtube($video_link))
                            {
                                $video_link = "http://www.youtube.com/embed/" . gym_get_youtube_id($video_link);
                            }
                            ?>
                            <iframe src="<?php echo $video_link; ?>" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            <?php
                        }
                    }
                    else
                    {
                    ?>       
                        <?php if (extra_images_exists()) { include ("slider.inc.php"); } else { ?>         
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
                        <?php } ?>
                    <?php } ?> 
                </div><!--END POST-MEDIA-->
            
                <div class="post-info">                        
                    <div class="date"><span class="month"><?php the_time('M'); ?></span><span class="day"><?php the_time('d'); ?></span><span class="month"><?php the_time('Y'); ?></span></div>                    
                    <div class="comments"><?php comments_popup_link('<span>0</span> Comments', '<span>1</span> Comment', '<span>%</span> Comments'); ?></div>                            
                </div><!--END POST-INFO-->        
                
                <div class="post-content"> 
<?php
}
?>




  
<?php

the_content();
?>

<?php 
if ($show_sharing_options == "1") include("share.inc.php") ; ?>

                </div><!--END POST-CONTENT -->
                
            </div><!--END POST-->




          
            <?php if ($comments) 
            {  
                comments_template(); 
            }?>
          
     </div><!--END INNER-CONTENT-->
          
          <?php 
get_sidebar(); 



endwhile; ?>


<?php else: //If no posts are present ?>
	
				<div class="entry">						
					<p><?php _e('No posts were found.', SYSTEM_THEME); ?></p>	
				</div>
				
<?php endif; ?>



			
<?php get_footer(); ?>
			