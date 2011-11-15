<?php

include dirname(__FILE__).'/paths.php';


$db_config = new DATABASE_CONFIG();
$conn = mysql_connect($db_config->default['host'], $db_config->default['login'], $db_config->default['password']);
if(!$conn) {
	echo mysql_error();
	die();
}

$sel = mysql_select_db($db_config->default['database']);
unset($db_config);

if(!$conn) {
	die("Could not connect to database\n");
}
