<h1>Complete Registration</h1>
<p>Thanks for signing in using Facebook! There's just one more step until your registration is done</p>
<?php
echo $this->Form->create('User', array(
	'type' => 'post', 'url' => array('controller' => 'login', 'action' => 'facebook'),
	'class' => 'form-horizontal',
		'inputDefaults' => array(
			'div' => 'control-group',
			'between' => '<div class="controls">', 'after' => '</div>',
			'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls help-block'))
		)
));

echo $this->Form->input('name', array(
	'label' => 'Name:',
	'type' => 'text',
	'id' => 'name_input',
	'value' => $fbuser['name']
));

$div = 'control-group';
$after = '';
if($email_found === true) {
	$div = 'control-group warning';
    $after = '<p class="help-block warning">
    There is already an account with this email; if you continue with this email, your account will be linked to your Facebook account.
    </p>
    </div>';
}

echo $this->Form->input('email', array(
	'div' => $div,
	'label' => 'Email',
	'type' => 'text',
	'id' => 'email_input',
	'value' => $fbuser['email'],
	'after' => $after
));

echo $this->Form->input('password', array(
	'label' => 'Password','id'=>'password_input', 'value' => '',
	'placeholder' => 'Enter your password', 'class' => 'span6',
));
echo $this->Form->input('password_confirm', array(
	'type' => 'password', 'label' => 'Confirm Password', 'value'=>'',
	'placeholder' => 'Enter your password again to confirm', 'class' => 'span6',
));

?>

<div class="alert-message block-message info" style="text-align: center">
	<p>
	<strong>Terms and Conditions</strong><br />
	By registering, you are agreeing to the <a href="/tos" target="_blank">Terms and Conditions</a>.
	</p>
</div>

<?php

echo '<div class="form-actions">';
echo $this->Form->button('Complete Registration!', array(
	'type' => 'submit', 'class' => 'btn btn-primary'
));
echo '</div>';

echo $this->Form->hidden('id');
echo $this->Form->hidden('facebook_id', array('value' => $facebook_id));
echo $this->Form->end();



