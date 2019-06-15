<?php

require('config.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/Home.php');
require('controllers/Shares.php');
require('controllers/Users.php');

require('models/Home.php');
require('models/Share.php');
require('models/User.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
$controller->executeAction();
