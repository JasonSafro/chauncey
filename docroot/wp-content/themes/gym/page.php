<?php 
get_header(); 
global $PAGE_ID;
$options = get_option('infinite_options');
?>

<?php while ( have_posts() ) : the_post(); 
$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
$featured_image = $featured_image_array[0];
$sidebar = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."select_sidebar", true);

if ($sidebar)
{
?> 
    <div id="inner-content">
<?php
}
else
{
?>
    <div class="one">
<?php
}

if ($featured_image != "")
{
?> 
<p><img src="<?php echo $featured_image; ?>" alt=""></p>
<?php
}
the_content();
?>
    </div><!--END ONE-->
<?php
if (get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."add_class_title", true) != "no")
{
?>
<script type='text/javascript'>
jQuery(document).ready(function($){
    $(".one :header, #inner-content :header").addClass("title");
    $(".team-member-info :header, .no_title").removeClass("title");
	$(".pricing-info :header, .no_title").removeClass("title");
})    
    
</script>
<?php
} 

if ($sidebar) get_sidebar(); 

?>

<?php endwhile; // end of the loop. ?> 
		
<?php get_footer(); ?>
			