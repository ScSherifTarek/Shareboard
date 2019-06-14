<?php

require('config.php');
require('classes/Bootstrap.php');


class Controller
{

}
class TestController extends Controller
{
	function testAction()
	{

	}
}

$bootstrap = new Bootstrap($_GET);

echo '<pre>';
print_r($bootstrap);
echo '</pre>';


$controller = $bootstrap->createController();
echo '<pre>';
print_r($controller);
echo '</pre>';
