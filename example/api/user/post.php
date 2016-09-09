<?php
	//If the username is empty:
	if ($username === "")
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "NotNull.registerUser.name",
				"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//...otherwise, if the email is empty:
	else if ($email === "")
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "NotNull.registerUser.mail",
				"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//...otherwise, if the password is empty:
	else if ($password === "")
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "NotNull.registerUser.password",
				"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//If the username is in wrong format:
	else if (!checkUsernameFormat($username))
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "Pattern.registerUser.name",
    			"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//...otherwise, if the size of the password is in wrong format:
	else if (!checkPasswordSize($password))
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "Size.registerUser.password",
				"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//...otherwise, if the email is in wrong format:
	else if (!checkEmailFormat($email))
	{
		http_response_code(400);
		echo
			'
			{
				"code" : "Pattern.registerUser.mail",
				"message" : "fault description, should not be proposed to user"
			}
			';
	}
	//...otherwise, if the email already exists:
	else if (accountsKeyMatchesValue("email", $email, FALSE) !== FALSE)
	{
		http_response_code(409);
		echo
		'
		{
			"code" : "SRV_CONFLICT_USER_MAIL",
			"message" : "fault description, should not be proposed to user"
		}
		';
	}
	//...otherwise, if the username already exists:
	else if (accountsKeyMatchesValue("username", $username, FALSE) !== FALSE)
	{
		http_response_code(409);
		echo
		'
		{
			"code" : "SRV_CONFLICT_USER_NAME",
			"message" : "fault description, should not be proposed to user"
		}
		';
	}
	//...otherwise, all is ok and we can register the new user and create a token to validate the email:
	else if (registerUser($username, $email, $password, TRUE) && createTokenConfirmEmail($email)) //Registers the new user (still locked until email confirmation) and created a token for validating the email.
	{
		//Sends the email with the confirmation link (if possible):
		$tokensConfirmEmail = getTokensConfirmEmail(true);
		if (isset($tokensConfirmEmail) && is_array($tokensConfirmEmail) && isset($tokensConfirmEmail[$email]) && $tokensConfirmEmail[$email] !== "")
		{
			$token = $tokensConfirmEmail[$email];
			$link = "http://localhost/eagerflow/register.php?status=validate_email&token=" . $token;
			$headers  = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "To: " . $username . " <" . $email . ">\r\n";
			$headers .= "From: Ask.dog website <askdog@askdog.com>" . "\r\n";
			$subject = 'Hi ' . $username . '! Welcome to Ask.dog';
			$message = 'Please, confirm your email by accessing to <a href="' . $link . '">' . $link . '</a>';
			$message = '<!DOCTYPE html><html><head><title>' . $subject . '</title></head><body bgcolor="#aadd00"><h1>' . $subject . '</h1><p>' . $message . '</p></body></html>';
			@mail($email, $subject, $message, $headers);
		}
		
		//Sends the response:
		http_response_code(201);
	}
	//...otherwise, something wrong happened:
	else
	{
		http_response_code(500);
		echo "UNKNOWN ERROR! Cannot register user.";
	}