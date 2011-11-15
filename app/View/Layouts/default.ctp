<!doctype html>
<head>
	<meta charset="utf-8">

	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">
	
    <?php
    echo $this->Html->css('blueprint');
    echo $this->Html->css('960_24');
    echo $this->Html->css('styles');
        
    echo $scripts_for_layout;
	?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
      
</head>
<body>

<div id="body">

    <div id="topheader">
        <img src="/img/logos/logo_mini.png" alt="" style="padding-left: 36px;" />
        <img src="/img/logos/logo_mobile.gif" alt="" />
    </div>
    
    <div class="container_24">
        <?php 
        echo $this->Session->flash();
        echo $content_for_layout; 
        ?>
    </div>
    
    <div id="footer">
    
    </div>
</div>


</body>
</html>
