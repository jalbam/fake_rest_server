<?php
	//Gets needed data:
	$username = strtolower(getVariable("name"));
	$email = strtolower(getVariable("mail"));
	$password = getVariable("password"); //Password is case sensitive.