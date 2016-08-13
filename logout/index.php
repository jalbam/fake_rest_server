<?php
	//Gets needed data:
	$token = getCookie("SESSION", TRUE); //Password is case sensitive.
	if ($token === "" && isset($_SERVER) && isset($_SERVER["HTTP_X_AUTH_TOKEN"])) { $token = trim($_SERVER["HTTP_X_AUTH_TOKEN"]); }
	$tokenSent = getVariable("token");
	if ($debugMode && $tokenSent !== "") { $token = $tokenSent; }