<?php
	//Gets needed data:
    $email = strtolower(getVariable("mail"));
	$password = getVariable("password"); //Password is case sensitive.
    $token = getVariable("token"); //Token is case sensitive.