<?php
$options = get_option('infinite_options');
$layout = 'stretched';
$page_template = get_page_template();
$path = pathinfo($page_template);
$page_template = $path['filename'];

?>
    
    <p id="back-top">
		<a href="#top"><span></span></a>
	</p>
</div><!-- END WRAPPER --> 
    
    
    <!-- START FOOTER -->
    
    <div id="footer">
        
        <div id="footer-content">
<?php
$all_sidebars = wp_get_sidebars_widgets();
if (count($all_sidebars["Footer_01"]) > 0 || count($all_sidebars["Footer_02"]) > 0 || count($all_sidebars["Footer_03"]) > 0)
{
?>                    
                <div id="footer-top" class="clear">
                    
                <div class="one-third">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_01") ) : endif; ?>
                </div><!--END one-third-->
                
                <div class="one-third">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_02") ) : endif; ?>
                </div><!--END one-third-->
                
                <div class="one-third last">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer_03") ) : endif;  ?>
                </div><!--END one-third last-->
                    
                </div><!--END FOOTER-TOP-->
<?php
}
?>         
            
                  
            
        </div><!--END FOOTER-CONTENT-->        
    
    </div><!--END FOOTER-->
    
    			<div id="footer-bottom" class="clear">
                     <div class="control-size clear">   
                         <div class="one">    
                            <div class="one-half">
                            <?php echo $options['footer_text']; ?>
                            </div>  
                                    
                            <div class="one-half last"> 
                                    <?php
                                    wp_nav_menu( array( 'theme_location' => 'footer_menu' , 
                                                        'container' => false, 
                                                        'menu_class' => 'menu', 
                                                        'menu_id' => '', 
                                                        'fallback_cb' => 'footer_fallback'
                                                        ) );
                                    ?>                
                            </div>
                            </div>
                    </div>
                </div><!--END FOOTER-BOTTOM-->  
                
    <!-- END FOOTER -->    


<script type='text/javascript'>
jQuery(document).ready(function($){
<?php
$options = get_option('infinite_options'); 
$bg_global_custom = $options['bg_global_custom'];
$tile_image = $options['tile_image'];
$bg_image_global = $bg_global_custom['url'];
$tile_background_global = $tile_image;
$bg_image_local = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."background_image", true);

if ($bg_image_local != "")
{ 
    $bg_image = $bg_image_local;
    $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', $bg_image, get_the_ID() );
    $page_bg_image = wp_get_attachment_image_src( $image_id, "page_" . $bg_image );
    $bg_image = $page_bg_image[0];
    $tile_background = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."tile_background", true);
}
else
{
    $bg_image = $bg_image_global;
    $tile_background = $tile_background_global;
}

if ($bg_image != "" && $tile_background == "1")
{
?>
    $("body").css("background", "url(<?php echo $bg_image; ?>) repeat");
<?php
}
if ($bg_image != "" && $tile_background != "1") 
{
?> 
    $.backstretch("<?php echo $bg_image; ?>");
<?php
}
?>
})
	<?php $options = get_option('infinite_options'); ?>
	<?php if(!empty($options['custom_javascript'])) echo '<script type="text/javascript">' . $options['custom_javascript'] . '</script>'; ?>
</script>
<?php
$options = get_option('infinite_options');
if ($options['panel_samples'] == "1")
{
?>
<!-- Theme Option --> 
<script type="text/javascript" src="<?php echo SYSTEM_ROOT."/javascript/theme-option.js" ; ?>"></script>

<?php
}
?>
<?php $options = get_option('infinite_options'); ?>
<?php if ($options['custom_css'] != "")
{
?> 
<style type="text/css">
<!--
<?php echo $options['custom_css']; ?>
-->
</style>
<?php
}
?>
<?php wp_footer(); ?>
</body>
</html>