<?php
	//NOTE: you can include more functions here if you want.


	//Sends a desired HTTP status and message (and exits if wanted):
	function endRequest($status, $message, $showMethodAndPath = TRUE, $exit = TRUE)
	{
		global $method, $path;
		http_response_code($status);
		$message = trim($message);
		if ($message !== "") { echo $message; }
		if ($showMethodAndPath) { echo " \r\nMethod: " . $method . ", Path: " . $path; }
		if ($exit) { exit(); }
	}
	

	//Returns a COOKIE:
	function getCookie($index, $trim = TRUE) //Example to set a cookie: setCookie("cookie_name", $cookieValue, mktime().time() + 60 * 60 * 24 * 30, "/");
	{
		global $HTTP_COOKIE_VARS;

		if (isset($HTTP_COOKIE_VARS[$index])) { $value = $HTTP_COOKIE_VARS[$index]; }
		else if (isset($_COOKIE[$index])) { $value = $_COOKIE[$index]; }
		else { $value = ""; }
		
		if ($trim) { $value = trim($value); }
	
        //Returns the value:
        return $value;
	}

	
	//Returns a desired var received by POST:
	function getVariablePost($index, $trim = TRUE, $urldecode = TRUE)
	{
		global $HTTP_POST_VARS;
		$value = "";
		if (isset($HTTP_POST_VARS) && isset($HTTP_POST_VARS[$index])) { $value = $HTTP_POST_VARS[$index]; }
		else if (isset($_POST) && isset($_POST[$index])) { $value = $_POST[$index]; }
		if ($trim) { $value = trim($value); }
		if ($urldecode) { $value = urldecode($value); }
		return $value;
	}

	
	//Returns a desired var received by GET:
	function getVariableGet($index, $trim = TRUE)
	{
		global $HTTP_GET_VARS;
		$value = "";
		if (isset($HTTP_GET_VARS) && isset($HTTP_GET_VARS[$index])) { $value = $HTTP_GET_VARS[$index]; }
		else if (isset($_GET) && isset($_GET[$index])) { $value = $_GET[$index]; }
		if ($trim) { $value = trim($value); }
		return $value;
	}
	

	//Returns desired var by POST or GET:
	function getVariable($index, $trim = TRUE)
	{
		$value = getVariablePost($index, $trim);
		if (!isset($value) || $value === "") { $value = getVariableGet($index, $trim); }
		return $value;
	}