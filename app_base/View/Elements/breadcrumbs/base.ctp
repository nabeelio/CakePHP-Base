<div class="btn-toolbar search_bar" style="text-align: right;">
<ul class="breadcrumb" style="float: left;">
	<?php
	if(!$this->fetch('breadcrumb')) { ?>
		<li><a href="/">Home</a></li>
	<?php
	} else {
		echo $this->fetch('breadcrumb');
	} ?>
</ul>
<form action="/search" method="get" class="well form-search">
	<input type="text" name="q" class="input-medium search-query" placeholder="Search for something" />
	<button type="submit" class="btn primary">Go</button>
</form>
</div>
