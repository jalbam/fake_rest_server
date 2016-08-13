<?php
	$allFine = FALSE;
	$message = "UNKNOWN ERROR";
	//If the token exists (matches an email):
	if (array_key_exists($token, $tokensConfirmEmail))
	{
		//Get the email, username and password:
		$email = $tokensConfirmEmail[$token];
		$accountsKey = accountsKeyMatchesValue("email", $email, FALSE);
		if ($accountsKey !== FALSE)
		{
			$username = $accounts[$accountsKey]["username"];
			$password = $accounts[$accountsKey]["password"];
			
			//If we can update the user account to unlock it, all is fine:
			if (registerUser($username, $email, $password, FALSE, TRUE)) { $allFine = TRUE; }
			else { $message = "USER CANNOT BE UNLOCKED"; }
		} else { $message = "ACCOUNT CANNOT BE FOUND"; }
	} else { $message = "TOKEN NOT VALID"; }
	
	//If the token is valid, confirms the email validation:
	if ($allFine)
	{
		http_response_code(200);
	}
	//...otherwise, if the token is not valid, the email validation failed:
	else
	{
		http_response_code(400);
		echo $message;
	}