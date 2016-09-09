<?php
    if (array_key_exists($token, $tokensChangePassword))
    {
        http_response_code(200);
        echo
        '{
            "token" : "' . $token . '",
            "valid" : true
        }';
    }
    else
    {
        http_response_code(401);
        echo
        '{
            "token" : "' . $token . '",
            "valid" : false
        }';
    }