<?php
	//This is an example that will be called when this route (/route_1/subroute) is accessed by the POST method.
	echo "Hello " . ($username ? $username : "world") . "!";