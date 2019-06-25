<?php

function is_a_user()
{
	if(isset($_SESSION['is_logged_in']))
		return $_SESSION['is_logged_in'];
	return false;
}

function not_a_user()
{
	return !is_a_user();
}

function only_for_users($redirect = ROOT_URL)
{
	if(not_a_user())
		header("Location: ".$redirect);
}

function only_for_guests($redirect = ROOT_URL)
{
	if(is_a_user())
		header("Location: ".$redirect);
}

function logout($redirect = ROOT_URL)
{
	unset($_SESSION['is_logged_in']);
	unset($_SESSION['user']);
	header("Location: ".$redirect);
}