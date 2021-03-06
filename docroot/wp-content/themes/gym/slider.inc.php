<?php
	
  global $post, $wp_query;
  $options = get_option('infinite_options');
  $number_slides = $options['number_slides'];
  $extra_images_no = $number_slides;
  if ($extra_images_no == "") $extra_images_no = 20;
  $post_ID = $post->ID;
  
  $page_template = get_page_template();
  $path = pathinfo($page_template);
  $page_template = $path['filename'];
    
    for ($i = 1 ; $i <= $extra_images_no ; $i++)
        {
            
                                                                                          
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail('page', "extra-image-" . $i . "") ) :
                $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'page', "extra-image-" . $i . "", $post_ID );
                            
                $image_feature_url = wp_get_attachment_image_src( $image_id, "page_extra-image-" . $i . "" );
                $page_extra_images[] = $image_feature_url[0];
                
                $page_url = "page_extra-image-" . $i . "_url";
                $page_caption = "page_extra-image-" . $i . "_caption";  
                $page_description = "page_extra-image-" . $i . "_description";
                $page_captions[$i-1] = get_post_meta($post_ID, $page_caption, true);
                $page_descriptions[$i-1] = get_post_meta($post_ID, $page_description, true);
                $page_urls[$i-1] = get_post_meta($post_ID, $page_url, true);
                
            endif;
            
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail('post', "extra-image-" . $i . "") ) :
                $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', "extra-image-" . $i . "", $post_ID );
                
                $image_feature_url = wp_get_attachment_image_src( $image_id, "post_extra-image-" . $i . "" );
                $post_extra_images[] = $image_feature_url[0];
                
                $post_url = "post_extra-image-" . $i . "_url";
                $post_caption = "post_extra-image-" . $i . "_caption";  
                $post_description = "post_extra-image-" . $i . "_description";
                $post_captions[$i-1] = get_post_meta($post_ID, $post_caption, true);
                $post_descriptions[$i-1] = get_post_meta($post_ID, $post_description, true);
                $post_urls[$i-1] = get_post_meta($post_ID, $post_url, true);
                
            endif;
            
            if (class_exists('MultiPostThumbnails')  && MultiPostThumbnails::has_post_thumbnail('gallery_item', "extra-image-" . $i . "")  ) :
                $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'gallery_item', "extra-image-" . $i . "", $post_ID );
                            
                $image_feature_url = wp_get_attachment_image_src( $image_id, "gallery_item_extra-image-" . $i . "" );
                $gallery_item_extra_images[] = $image_feature_url[0];
                
                $gallery_item_url = "gallery_item_extra-image-" . $i . "_url";
                $gallery_item_caption = "gallery_item_extra-image-" . $i . "_caption";  
                $gallery_item_description = "gallery_item_extra-image-" . $i . "_description";
                $gallery_item_captions[$i-1] = get_post_meta($post_ID, $gallery_item_caption, true);
                $gallery_item_descriptions[$i-1] = get_post_meta($post_ID, $gallery_item_description, true);
                $gallery_item_urls[$i-1] = get_post_meta($post_ID, $gallery_item_url, true);
                
            endif;
        }
        if (isset($page_extra_images))
        {
        ?>
        <div class="slideshow-container">
        
            <div class="flexslider" id="index-slider">
                <ul class="slides">
            <?php
            for($i = 0 ; $i < $extra_images_no ; $i++)
            {
                if (isset($page_extra_images[$i]))
                {
                    if ($page_urls[$i] == "") $page_urls[$i] = "#";
                     ?> 
                     <li>                     
                        <a href="<?php echo $page_urls[$i]; ?>">
                            <img src="<?php echo $page_extra_images[$i]; ?>" alt="<?php echo $page_captions[$i]; ?>">
                        </a>
                     </li><!--END SLIDE-->
                     <?php
                }
            }
            ?>
                </ul><!--END UL SLIDES-->
                
            </div><!--END FLEXSLIDER-->        
            
        </div><!--END SLIDESHOW-CONTAINER-->
        <?php
        }
        ?>
        <?php
        if (isset($post_extra_images))
        {
        ?>        
            <div class="flexslider" id="blog-slider">
                <ul class="slides">
            <?php
            for($i = 0 ; $i < $extra_images_no ; $i++)
            {
                if (isset($post_extra_images[$i]))
                {
                    if ($post_urls[$i] == "") $post_urls[$i] = "#";
                     ?> 
                     <li>                     
                        <a href="<?php echo $post_urls[$i]; ?>">
                            <img src="<?php echo $post_extra_images[$i]; ?>" alt="<?php echo $post_captions[$i]; ?>">
                        </a>
                     </li><!--END SLIDE-->
                     <?php
                }
            }
            ?>
                </ul><!--END UL SLIDES-->
                
            </div><!--END FLEXSLIDER-->        
        <?php
        }
        ?>
        <?php
        if (isset($gallery_item_extra_images))
        {
            $twin_slides = get_post_meta(get_the_ID(), SYSTEM_VAR_PREFIX."twin_slides", true);
        ?>
        
            <div class="flexslider" id="gallery-slider">
                <ul class="slides">
            <?php
            if ($twin_slides == "yes")
            {
                ?>
<style type="text/css">
<!--
.flex-direction-nav li a {bottom: 4px;}
-->
</style>
                <?php
                $half_images = ceil($extra_images_no / 2);
                for($i = 0 ; $i < $half_images ; $i++)
                {
                    if (isset($gallery_item_extra_images[2 * $i]))
                    {
                        if ($gallery_item_urls[2 * $i] == "") $gallery_item_urls[2 * $i] = "#";
                         ?> 
                         <li>                     
                            <a href="<?php echo $gallery_item_urls[2 * $i]; ?>">
                                <img style="width:49%; display: inline" src="<?php echo $gallery_item_extra_images[2 * $i]; ?>" alt="<?php echo $gallery_item_captions[2 * $i]; ?>">
                            </a>
                            
                            <a href="<?php echo $gallery_item_urls[2 * $i + 1]; ?>">
                                <img style="width:49%; display: inline" src="<?php echo $gallery_item_extra_images[2 * $i + 1]; ?>" alt="<?php echo $gallery_item_captions[2 * $i + 1]; ?>">
                            </a>
                         </li><!--END SLIDE-->
                         <?php
                    }
                }
                
            }
            else
            {
                for($i = 0 ; $i < $extra_images_no ; $i++)
                {
                    if (isset($gallery_item_extra_images[$i]))
                    {
                        if ($gallery_item_urls[$i] == "") $gallery_item_urls[$i] = "#";
                         ?> 
                         <li>                     
                            <a href="<?php echo $gallery_item_urls[$i]; ?>">
                                <img src="<?php echo $gallery_item_extra_images[$i]; ?>" alt="<?php echo $gallery_item_captions[$i]; ?>">
                            </a>
                         </li><!--END SLIDE-->
                         <?php
                    }
                }
            }
            ?>
                </ul><!--END UL SLIDES-->
                
            </div><!--END FLEXSLIDER-->        
            
        <?php
        }
        ?>
