
<?php
require('../../../../wp-blog-header.php');
$root = "../wp-content/themes/gym";  
$name = "fullwidth_container";
$submit = "Insert the container";
?>

<div id="shortcodes_<?php echo $name; ?>-form">
<script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($){  	
});
</script>
<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    
    <tr><?php $field = "fullwidth_container_img_src"; $field_ = "IMG or Pattern SRC"; $default = "url"; $description = "Pattern or Full SRC of the image (you can also insert image directly into HTML editor inside the shortcode"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="100"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
    <tr><?php $field_ = "Custom Background Repeat"; $field = "fullwidth_container_img_position"; $description = "If no is selected, image will be stretched."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">

    <option value="no-repeat">No repeat</option>
    <option value="repeat-y">Repeat Horizontally</option>
    <option value="repeat-x">Repeat Vertically</option>
    <option value="repeat">Repeat</option>

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field_ = "Background Position"; $field = "fullwidth_container_img_local"; $description = "Select a position for the background."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">

    <option value="left">Left</option>
    <option value="right">Right</option>
    <option value="center">Center</option>

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field = "fullwidth_container_color_overlay"; $field_ = "Color Overlay"; $default = ""; $description = "Enter a color in hexadecimal. Example: #57CA8E"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="20"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
        <tr><?php $field_ = "Color Scheme"; $field = "fullwidth_container_color_scheme"; $description = "Select the base color of the texts."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">

    <option value="normal">Normal</option>
    <option value="light">Light</option>

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field = "fullwidth_container_padding"; $field_ = "Padding Height & Bottom"; $default = ""; $description = "Enter a value for the padding. Example: 20px"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="20"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
        <tr><?php $field = "fullwidth_container_border"; $field_ = "Border Top"; $default = ""; $description = "Enter a value for the color the border. Example: #e5e5e5"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="20"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
                      
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>