<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

function debug($str)
{
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit;
}