<?php
	global $accordion_btn_text, $accordion_content, $accordion_id;

?>
<button onclick="toggleAccordionContent('<?php echo $accordion_id;?>');" class="btn btn-accordion"><?php echo $accordion_btn_text;?></button>

<div id="<?php echo $accordion_id;?>" style="display:none;">
  <?php echo $accordion_content;?>
</div>
 