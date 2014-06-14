<?php get_header(); ?>

<?php
$options = get_option('infinite_options');
$blog_style = 1; 
$show_sharing_options = $options['show_sharing_options'];

$comments = comments_open() && get_option("default_comment_status ") == "closed"; 
$blog_single_page_style= $blog_style;

if (have_posts()) : while(have_posts()) : the_post(); 
$subtitle = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."subtitle", true);

$sidebar = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_sidebar", true); 
?>
    
    
    <div class="two-third">
<?php
$additional_html = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."additional_html", true);   
if (extra_images_exists()) include ("slider.inc.php");

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
echo $additional_html; 
?> 
<?php 
if ($show_sharing_options == "1") 
{
?>
<div class="one">
<?php
    include("share.inc.php") ; 
?>
</div>
<?php
}

?> 
<?php if ($comments) 
{
?>
<div class="one">
<?php  
    comments_template();
?>
</div>
<?php 
}?>               
    </div><!--END TWO-THIRD-->    


<div class="one-third last">
            
        <?php
        the_content();
        //$all_link =  get_gallery_page_link(get_the_ID());
        if (get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."parent", true) == "") $all_link =  get_gallery_page_link(get_the_ID()); 
        else $all_link = get_page_link(get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."parent", true))
        ?>      
        
        
        <br /><br />                             
        
    </div><!--END ONE-THIRD-->
<?php
if (get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."add_class_title", true) != "no")
{
?>
<script type='text/javascript'>
jQuery(document).ready(function($){
    $(".one-third h1, .one-third h2, .one-third h3, .one-third h4, .one-third h5, .one-third h6").addClass("title");
})    
    
</script>
<?php
}
?>     

          
<?php 




endwhile; ?>


<?php else: //If no posts are present ?>
	
				<div class="entry">						
					<p><?php _e('No posts were found.', SYSTEM_THEME_SHORT); ?></p>	
				</div>
				
<?php endif; ?>



			
<?php get_footer(); ?>
			