
<?php
require('../../../../wp-blog-header.php');
$root = "../wp-content/themes/gym"; 
$name = "title_subtitle";
$submit = "Insert title and subtitle";
?>

<div id="shortcodes_<?php echo $name; ?>-form">

<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

	 <tr><?php $field = "title"; $field_ = "Title"; $default = "Title"; $description = "Insert Title"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="40"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
	 <tr><?php $field = "subtitle"; $field_ = "Subtitle"; $default = "Subtitle"; $description = "Insert Subtitle"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" size="40"/><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
        <tr><?php $field_ = "Align"; $field = "align"; $description = "Align title and subtitle"; ?>
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
    
    </tr>
    
        <tr><?php $field_ = "Color Scheme"; $field = "color"; $description = "Select the base color of the texts."; ?>
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
                     
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>