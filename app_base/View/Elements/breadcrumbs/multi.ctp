<?php $this->start('breadcrumb'); ?>

	<li><a href="/">Home</a></li>
	<?php
	foreach($items as $i) {
		echo '<li>
				<span class="divider"><i class="icon chevron-right"></i></span>
				<a href="'.$i['url'].'">'.$i['title'].'</a>
			</li>';
	}
	?>
<?php $this->end(); ?>