<?php get_header(); ?>
<?php
$options = get_option('infinite_options');
$paged = (get_query_var("paged")) ? get_query_var("paged") : 1;
?>

    <div id="inner-content" class="blog1"> 
<?php if(have_posts()) : while ( have_posts() ) : the_post(); 

$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); 
$featured_image = $featured_image_array[0];
?>

            <div class="post">      
                
                <div class="post-content">    
            
                    <div class="post-media">        
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_image; ?>" alt="" width="700" /></a>
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



<?php endwhile; // End the loop. Whew. ?>

<?php else: //If no posts are present ?>
    
                <div class="entry">                        
                    <p><?php _e('No posts were found.', SYSTEM_THEME_SHORT); ?></p>    
                </div>
                
<?php endif; ?>

<?php
if(function_exists('wp_pagenavi_gym')) { wp_pagenavi_gym(); }  
?>   
        </div><!--END INNER-CONTENT-->  
<?php
get_sidebar();
?> 
			
<?php get_footer(); ?>
			