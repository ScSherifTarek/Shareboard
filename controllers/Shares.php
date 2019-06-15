<?php
class Shares extends Controller
{
	protected function index()
	{
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->index(), true);
	}

	protected function add()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add($post), true);
	}
}