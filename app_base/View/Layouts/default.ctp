<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title_for_layout; ?></title>

	<link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />

	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/jq/jq.history.js"></script>
	<script type="text/javascript" src="/js/global.js"></script>
	<script type="text/javascript">

	</script>
	<?php
	echo $scripts_for_layout;
	?>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span3 sidebar">
				<div class="logo"><img class="logo" src="/img/logo_75.png" alt="" /></div>
				<div class="sidebar_nav" >
					<ul class="nav nav-list">

						<li class="nav-header">&nbsp;</li>
						<li class="">
							<a href="/"><i class="icon-home"></i>&nbsp;home</a>
						</li>

					</ul>
				</div>
			</div>
			<div class="span9 body">

				<?php
				echo $this->element('breadcrumbs/base');
				?>

				<div id="loading_message">
					<span class="label label-info">loading...</span>&nbsp;<img src="/img/loading.gif" alt="" />
				</div>
				<div id="body_content">
				<?php
				echo '<div id="flash_message">'.$this->Session->flash().'</div>';
				echo $content_for_layout;
				?>
				</div>
			</div>
		</div>
	</div>

	<div id="modal_container" style="display:none"></div>
<script type="text/javascript">
$(function() {
	$('li#messages')
		.popover({
			animation: true, trigger: 'manual', delay: 200,
			title: 'New Message', content: 'You have a new message<br />Click to close'
		});//.popover('show');

	$("div.popover").live('click', function(e) { $('li#messages').popover('hide'); });
});

var _gaq = _gaq || [];
_gaq.push(['_setAccount', '']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<script type="text/html" id="modal_tmpl">
<div class="modal">
  <div class="modal-header">
	<a class="close" data-dismiss="modal">×</a>
	<h3><%=title%></h3>
  </div>
  <div class="modal-body">
	<%=body%>
  </div>
</div>
</script>
<script type="text/html" id="alrt_s_tmpl">
<?php echo $this->element('flash/success', array('message' => '<%=message%>')); ?>
</script>
<script type="text/html" id="alrt_e_tmpl">
<?php echo $this->element('flash/error', array('message' => '<%=message%>')); ?>
</script>
</body>
</html>