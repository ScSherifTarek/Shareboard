<?php

require('config.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');

require('controllers/Home.php');
require('controllers/Shares.php');
require('controllers/Users.php');

$bootstrap = new Bootstrap($_GET);

echo '<pre>';
print_r($bootstrap);
echo '</pre>';


$controller = $bootstrap->createController();
echo '<pre>';
print_r($controller);
echo '</pre>';
