<?php
	//Username info (this could be in the "src/_code/config.php" file, but it is just an example):
	$usersData = Array
	(
		//User IDs:
		"1" =>
			Array
			(
				"name" => "John Doe",
				"favouriteFood" => "meat"
			),
		"2" =>
			Array
			(
				"name" => "Joan Alba Maldonado",
				"favouriteFood" => "pizza"
			)
	);
	
	//Gets the data needed which has been sent through the REST client:
	$usernameId = getVariable("id"); //"getVariable" and other functions available in the "src/_code/functions.php" file.