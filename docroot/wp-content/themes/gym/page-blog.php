<?php
/*
Template Name: Blog
*/ 
get_header(); 
?>
<?php
$options = get_option('infinite_options');
?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
$subtitle = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."subtitle", true);
$hide_title = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."hide_title", true); 
$centered_title = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."centered_title", true);
$select_blog_category = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_blog_category", true); 
$sidebar = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_sidebar", true); 
?>

    <div id="inner-content" class="blog1"> 
    <?php
    the_content();
    ?> 
<?php
    $args=array(
    'cat' => $select_blog_category,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
    );
    $temp = $wp_query;
    $wp_query = new WP_Query( $args );

// The Loop
while ( $wp_query->have_posts() ) : $wp_query->the_post();
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
$featured_image = $featured_image_array[0];
?>

            <div class="post">      
                
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
                    <?php
                    }
                    ?>
                    </div><!--END POST-MEDIA-->
                
                    <div class="post-title">                
                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div><!--END POST-TITLE-->
                
                    <div class="post-meta">                
                        <ul>
                            <li><span><?php _e('Posted by', SYSTEM_THEME_SHORT); ?></span> <?php the_author_link(); ?></li>
<?php if ($options['show_blog_categories'] == "1") { ?><li><span><?php _e('in', SYSTEM_THEME_SHORT); ?></span> <?php the_category(', '); ?></li><?php } ?>
<?php if ($options['show_tags_page'] == "1") { ?><li><span><?php _e(' Tagged with', SYSTEM_THEME_SHORT); ?></span> <?php the_tags('', ', ', ''); ?></li><?php } ?>
                        </ul>
                    </div><!--END POST-META-->    
<?php
the_excerpt();
?>
<p><a href="<?php the_permalink(); ?>" class="more-link"><?php _e('Continue reading', SYSTEM_THEME_SHORT); ?></a></p>
                </div><!--END POST-CONTENT -->
                
            </div><!--END POST-->
<?php
endwhile;
if(function_exists('wp_pagenavi_gym')) { wp_pagenavi_gym(); }  
?>  
        
        </div><!--END INNER-CONTENT-->
<?php 

get_sidebar(); 

$wp_query = $temp;  //reset back to original query
?>

<?php endwhile; // end of the loop. ?> 		
<?php get_footer(); ?>
			