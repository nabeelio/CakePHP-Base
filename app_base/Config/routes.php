<?php
/**
 * @author Nabeel Shahzad <nshahzad@gmail.com>
 * @license MIT
 * @web http://github.com/nshahzad
 * 
 */

Router::connect('/', array('controller' => 'frontpage', 'action' => 'index'));


CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';