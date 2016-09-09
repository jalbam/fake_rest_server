<?php
	//TODO: check whether the email exists into the accounts (although it seems that real REST server does not check it!).

	//If the email is in the right format:
	if (checkEmailFormat($email) && createTokenChangePassword($email)) //Creates a new token associated with the email.
	{
		//Sends the response:
		http_response_code(200);
		echo
			'
			{
				"mail": ' . $email . '
			}
			';
	}
	//...otherwise, if the email is in wrong format:
	else
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "WEB_VALIDATE_FAILED",
				"message" : "Email is in wrong pattern."
			}
			';
	}