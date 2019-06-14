<?php

class Bootstrap
{
	private $controller = 'home';
	private $action = 'index';
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
		if($this->request['controller'] != '')
			$this->controller = $this->request['controller'];
		if($this->request['action'] != '')
			$this->action = $this->request['action'];

		echo $this->controller .'/'. $this->action;
	}

	public function createController()
	{
		// Check the class exists
		if(class_exists($this->controller))
		{
			// get the parent class he extends
			$parents = class_parents($this->controller);

			// $parents = class_implements($this->controller); used if our Controller was just an interface not a class

			// check if the class implements our Controller Class
			if(in_array("Controller", $parents))
			{
				// check if the action in the request exists in that class
				if(method_exists($this->controller, $this->action))
				{
					return new $this->controller($this->action, $this->request);
				}
				else
				{
					// Action is not exist
					echo 'Method '. $this->action .' doesn\'t exist in '. $this->controller;
				}
			}
			else
			{
				// The controller doesn't extends our Controller Class
				echo $this->controller.' doesn\'t extends our Controller Class';
			}
		}
		else
		{
			// Controller Doesn't exist
			echo $this->controller.' doesn\'t exist';
		}
	}

}