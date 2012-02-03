<?php $this->append('sidebar'); ?>

<li class="nav-header">listing options</li>

<?php
/**
 * LIST ITEM FOR SENDING A MESSAGE
 */
?>
<li class="">
	<a id='sendMessage' class=''><i class="icon pencil"></i>&nbsp;send message</a>
</li>

<?php
/**
 * LIST ITEM FOR SAVING THIS MESSAGE
 */
?>
<li class="">
	<?php if($listing_saved === true) {     ?>
		<a href='#' class="deleteSaved" id='<?php echo $listing['Listing']['id'];?>'>
			<i class="icon star"></i>&nbsp;remove from saved/a>
	<?php } else { ?>
		<a href='#' id="saveListing" id='<?php echo $listing['Listing']['id'];?>'>
			<i class="icon star-empty"></i>&nbsp;save listing</a>
	<?php } ?>
</li>

<?php
/**
 * LIST ITEM FOR MESSAGE OPTIONS
 */
?>
<?php
# User buttons

# Allow for editing, etc if allowed
if($listing['Listing']['user_id'] == $user['User']['id'] || $user['User']['group_id'] == GROUP_ADMIN) {

?>
	<li class="dropdown" id="menu1">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
			<i class="icon edit"></i>&nbsp;edit listing <b class="caret"></b></a>
		<ul class="dropdown-menu pull-left">
			<li>
				<a href='/listings/edit/<?php echo $listing['Listing']['id']?>?src=listing' class="">
					<i class="icon edit"></i>&nbsp;edit</a>
			</li>
			<li>
				<a href='/listings/images/<?php echo $listing['Listing']['id']?>' class="" >
					<i class="icon picture"></i>&nbsp;edit images</a>
			</li>
			<li>
				<a href='/listings/delete/<?php echo $listing['Listing']['id']?>' class='deleteListing'>
					<i class="icon trash"></i>&nbsp;delete</a>
			</li>
		</ul>
	</li>
<?php
}
?>
<li>&nbsp;</li>
<?php
$this->end(); ?>