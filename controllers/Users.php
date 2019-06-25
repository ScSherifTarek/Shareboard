<?php
class Users extends Controller
{
	protected function register()
	{
		only_for_guests();
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register($post), true);
	}	

	protected function login()
	{
		only_for_guests();
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login($post), true);
	}

	protected function logout()
	{
		only_for_users();
		logout();
	}
}