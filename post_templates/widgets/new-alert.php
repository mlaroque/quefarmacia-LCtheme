<?php

	global $alertStyle;
	global $alertColor;
	global $alertTitle;
	global $alertContent;

?>

<div class="row alert-info shadow">
    <div class="col-12 col-sm-5 col-md-5 col-lg-5 alertSx">
        <h2><?php echo $alertTitle; ?></h2>
    </div>
    <div class="col-12 col-sm-7 col-md-7 col-lg-7 alertDx">
       <?php echo $alertContent; ?>
    </div>
</div>
