<?php $this->start('breadcrumb'); ?>
<li><a href="/">Home</a></li>
<li><span class="divider"><i class="icon-chevron-right"></i></span>
	<a href="<?php echo $url; ?>"><?php echo $title;?></a></li>
<?php $this->end(); ?>