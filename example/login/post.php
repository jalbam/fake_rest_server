<?php
	$succeded = FALSE;
	$message = "UNKNOWN ERROR";
	$code = "-1";
	if (usernameOrEmailAndPasswordMatch($usernameOrEmail, $password))
	{
		//If the creation of a new token session is successful:
		if (createTokenLoginUser($usernameOrEmail))
		{
			//If the token session created can be retrieved:
			$tokensSession = getTokensSession();
			if (($token = array_search($usernameOrEmail, $tokensSession)) !== FALSE)
			{
				$key = accountsKeyMatchesValue("username", $usernameOrEmail, FALSE);
				if ($key === FALSE) { $key = accountsKeyMatchesValue("email", $usernameOrEmail, FALSE); }
				if ($key !== FALSE)
				{
					$locked = $accounts[$key]["locked"];
					if (!$locked)
					{
						$succeded = TRUE;
						setcookie("SESSION", $token, time() + 60 * 60 * 24 * 365, "/"); //Sets the cookie needed with the session token.
						http_response_code(200);
						header("X-AUTH-TOKEN:" . $token);
						echo
							'{
								"uuid" : "1",
								"name" : "' . $accounts[$key]["username"] . '",
								"mail" : "' . $accounts[$key]["email"] . '",
								"type" : "(REGISTERED|EXTERNAL|ANONYMOUS)???",
								"points" : 368905,
								"exp" : 333334,
								"notice_count" : 499,
								"avatar" : "http://dhtmlgames.com/ranisima/ranisima_english/imagenes/osito1.gif"
							}';
						return;
					} else { $message = "User account is locked"; $code = "org.springframework.security.authentication.LockedException"; }
				} else { $message = "USER NOT FOUND"; }
			} else { $message = "TOKEN NOT FOUND"; }
		} else { $message = "TOKEN CANNOT BE CREATED"; }
	} else { $message = "USERNAME/EMAIL AND PASSWORD DO NOT MATCH"; }
	
	if (!$succeded)
	{
		http_response_code(401);
		echo
			'{
				"code" : "' . $code . '",
				"message" : "' . $message . '"
			}';
	}