<?
	if ($usernameId === "") { echo "No id sent!"; }
	else if (array_key_exists($usernameId, $usersData))
	{
		echo $usersData[$usernameId]["name"] . " likes eating " . $usersData[$usernameId]["favouriteFood"];
	}
	else { echo "User cannot be found! (id=" . $usernameId . ")"; }