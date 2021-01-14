<?php global $med_info;?>

<ul>
	<?php foreach($med_info["rl"] as $med_rel):?>
		<a href="<?php echo get_permalink($med_rel['ID']);?>">
			<li>
				<img data-src="<?php echo get_the_post_thumbnail_url($med_rel['ID']);?>" class="lazy-img">
				<p><?php echo $med_rel["post_title"];?></p>
			</li>
		</a>
	<?php endforeach;?>
</ul>