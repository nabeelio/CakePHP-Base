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
       <h1>Cake Base Install</h1>
    </div>
    
    <div id="inner_body" class="container_24">
        <div class="grid_24">
            <?php 
            echo $this->Session->flash();
            echo $content_for_layout; 
            ?>
        </div>
    </div>
    
    
</div>
<div id="footer">
    
    </div>

</body>
</html>
