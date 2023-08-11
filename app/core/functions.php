<?php

function show($string)
{
	echo "<pre>";
	print_r($string);
	echo "</pre>";

	return $string;
}

function vard($string)
{
	echo "<pre>";
	var_dump($string);
	echo "</pre>";

	return $string;
}

function redirect($path) {
	header("location: " . ROOT . "/" . $path);
	die;
}