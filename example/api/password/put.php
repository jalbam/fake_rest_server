<?php
	//If the email is empty:
    if ($email === "")
    {
        http_response_code(400);
        echo '{ "code" : "NotNull.TokenPassword.mail" }';
    }
    //...otherwise, if the token is empty:
	else if ($token === "")
    {
        http_response_code(400);
        echo '{ "code" : "NotNull.TokenPassword.token" }';
    }
	//...otherwise, if the password is empty:
    else if ($password === "")
    {
        http_response_code(400);
        echo '{ "code" : "NotNull.TokenPassword.password" }';
    }
	//...otherwise, if the password format is wrong:
	else if (!checkPasswordFormat($password))
	{
		http_response_code(400);
		echo
            '
            {
                "code" : "Pattern.TokenPassword.password",
                "message" : "Password is in wrong format."
            }
            ';
	}
	//...otherwise, if the email format is wrong:
    else if (!checkEmailFormat($email))
    {
        http_response_code(400);
        echo
            '
            {
                "code" : "Pattern.TokenPassword.mail",
                "message" : "Email is in wrong format."
            }
            ';
    }
    //...otherwise, if the email does not exists in the accounts or the token does not exist or token and email do not match:
    else if (accountsKeyMatchesValue("email", $email, FALSE) === FALSE || !isset($tokensChangePassword[$token]) || strtolower($tokensChangePassword[$token]) !== $email)
    {
        http_response_code(400);
        echo
        '
            {
                "code" : "SRV_INVALID_TOKEN",
                "message" : "Token does not exist or token do not match the email."
            }
            ';
    }
    //...otherwise, if all is fine, changes the password:
    else
    {
        http_response_code(200);
        echo
            '
			{
				"mail":' . $email . ',
				"token":' . $urlToken . ',
				"password":' . $password . '
			}
			';
    }