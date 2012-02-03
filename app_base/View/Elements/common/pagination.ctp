<div class="pagination pagination-centered">
<?php
$this->Paginator->options(array(
	'url' => array_merge($this->passedArgs, array('?' => ltrim(strstr($_SERVER['QUERY_STRING'], '&'), '&'))),
	'update' => '#body_content', 'evalScripts' => true
));
?>
<ul>
	<?php
    echo $this->Paginator->prev('← Previous',
		array('class' => '', 'tag' => 'li'), #options
		'← Previous', # title when disabled
		array('class'=>'disabled', 'tag' => 'li') #disabled options
	);

    echo $this->Paginator->numbers(array(
		'separator' => '',
		'tag' => 'li',
		'class' => ''
	));
	echo $this->Paginator->next('Next →',
		array('class' => 'next', 'tag' => 'li'),  # options
		'Next →',
		array('class' => 'disabled', 'tag' => 'li')
	);
	?>
</ul>
</div>
<script type="text/javascript">

$(document).ready(function () {

	$("div.pagination ul li.current").each(function(i, v){
		var o = $(this);
		o.addClass('active').html('<a href="#">'+o.html()+'</a>');
	});

	$("div.pagination ul li.disabled").each(function(i, v) {
		$(this).html('<a href="#">'+$(this).html()+'</a>')
	});

	$("div.pagination ul li a").live('click', function(e){

		$("div#loading_message").fadeIn();

		$.ajax({
			dataType:"html",
			evalScripts: true,
			success:function (data, textStatus) {
				$("#body_content").html(data);
				$("div#loading_message").fadeOut();
			},
			url: this.href
		});

		return false;

		e.preventDefault();
	});
});

</script>
<?php
#echo $this->Js->writeBuffer();