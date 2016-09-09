<?php
	//To check the server (debug) with a web browser directly (without a REST client):
	//* Path (route): place it after the index.php page.
	//* Mandatory variables by GET (URL) or POST: method, debug (not empty).
	//* Other variables needed by GET or POST: depending on the request.
	//* Format: URL_TO_FAKE_REST_SERVER/index.php/pathItem1/PathItem2/...?method=method_desired&debug=1[&other_variables]
	//** Example: http://localhost/eagerflow/fake_rest_server/index.php/api/user?method=post&debug=1&mail=email@whateaver.com&username=lily&password=123

	//Includes the engine needed:
	require "_code/engine.php";