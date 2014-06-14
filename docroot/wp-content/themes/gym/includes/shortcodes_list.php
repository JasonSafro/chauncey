
<?php
require('../../../../wp-blog-header.php');
$root = "../wp-content/themes/gym";  
$name = "list";
$submit = "Insert list";
?>

<div id="shortcodes_<?php echo $name; ?>-form">

<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">
	
    <tr><?php $field_ = "Style"; $field = "style"; $description = "List style"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
          <option value="arrow-list">Arrow list</option>
          <option value="check-list">Check list</option>
          <option value="marker-list">Marker list</option>
          <option value="more-list">More list</option>
          <option value="pin-list">Pin list</option>
          <option value="star-list">Star list</option> 
          <option value="counter-list">Counter list</option>
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