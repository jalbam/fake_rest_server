<?php
	$succeded = FALSE;
	$code = "UNKNOWN_CODE";
	$message = "UNKNOWN ERROR. CANNOT LOGOUT WITH TOKEN " . $token;
	
	//If the received is a valid token session, destroys the token session and exits successfully: 
	if (isset($tokensSession[$token]))
	{
		//TODO: remove token from the list!
		$succeded = TRUE;
		http_response_code(200);
		echo "SESSION CLOSED. TOKEN VALID (" . $token . ")";
		return;
	}
	
	if (!$succeded)
	{
		http_response_code(401);
		echo
			'{
				"code" : "' . $code . '",
				"message" : "' . $message . '"
			}';
	}