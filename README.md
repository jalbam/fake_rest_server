REST server in PHP 
=================== 
by Joan Alba Maldonado (joanalbamaldonadoNO_SPAM_PLEASE AT gmail DOT com, without NO_SPAM_PLEASE)

Simple and easy-to-configure REST server made in PHP.

Version: no version 
- Date: 12th May 2016 (approximately)


## Description

Simple and easy-to-configure REST server made in PHP.

I made it just to create different REST servers very fast for testing purposes.


## Configuring the server

To add new paths (routes) and methods, the developer just needs to create a new folder structure (folder and subfolders if needed) which represents the route and inside one file per method named _[method_desired].php_ (for example, _put.php_).

To start developing your REST server, you will only need to download the files inside the **[src/](src/)** folder.

You may want to take a look at the **[src/_code/functions.php](src/_code/functions.php)** file (the engine will include it automatically) as it provides some basic but useful functions. There you can also add new functions or modify the existing ones.

If you want to add data, you can use the **[src/_code/data/data.php](src/_code/data/data.php)** file (automatically included by the engine).

If you want to add configuration data, you can use the **[src/_code/config.php](src/_code/config.php)** file (automatically included by the engine).

As the engine defines the **USING_REST_SERVER** constant, you can protect any of the files with the following line at the beginning:
```php
<?php if (!defined("USING_REST_SERVER") || !USING_REST_SERVER) { return; } ?>
```

Note: this authorization code above is also defined in the **AUTHORIZATION_CODE** constant (inside the the **[src/_code/config.php](src/_code/config.php)** file).


<a name="example"></a>
### Example:

1) In the root folder (where the **[src/_code/](src/_code/)** folder and the **[src/index.php](src/index.php)** file are placed), create a folder called **myRESTService/**.

2) Inside the **myRESTService/** folder we have just created, create another folder called **user/** and inside of it create two files: **index.php** and **get.php**.

3) Inside the **myRESTService/user/index.php** file, place the following code:
```php
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
```

4) Inside the **myRESTService/user/get.php** file put the following code:
```php
<?php
	if ($usernameId === "") { echo "No id sent!"; }
	else if (array_key_exists($usernameId, $usersData))
	{
		echo $usersData[$usernameId]["name"] . " likes eating " . $usersData[$usernameId]["favouriteFood"];
	}
	else { echo "User cannot be found! (id=" . $usernameId . ")"; }
```

5) With this, we will have our REST server configured with the **myRESTService/user/** route, accepting the **GET** method with the **id** parameter. This example can be found in the **[example_easy/](example_easy/)** folder.


## Testing the server

If you do not have a REST client, the server can be tested on any web browser by adding the **debug=1** parameter to the URL as well as the **method** parameter with the method desired (not needed if the method is **GET**), as for example: http://localhost/fake_rest_server/src/index.php/route_1/subroute?method=post&debug=1&username=Joan

Following the [example above](#example), you can use a web browser to visit the following links:

http://localhost/route_to_the_REST_server/index.php/myRESTService/user/?method=get&debug=1&id=1 (it should show "John Doe likes eating meat")

http://localhost/route_to_the_REST_server/index.php/myRESTService/user/?method=get&debug=1&id=2 (it should show "Joan Alba Maldonado likes eating pizza")

http://localhost/route_to_the_REST_server/index.php/myRESTService/user/?method=get&debug=1&id=3 (it should show "User cannot be found! (id=3)")

http://localhost/route_to_the_REST_server/index.php/myRESTService/user/?method=get&debug=1 (it should show "No id sent!")

Note that the "_/_" character at the end of the route is optional.


## Final comments

It is very easy to extend using PHP language. The project already includes some examples with routes, methods, functions and data as user accounts, etc. as examples (in both the **[example/](example/)** and the **[example_easy/](example_easy/)** folder) but they can be deleted.

The only really-needed code is located in the **[src/](src/)** folder. Inside of it, the **[route_1/](src/route_1/)** folder and all of its content can also be deleted since it is just an example.


## License
This project can be used, reproduced, distributed and modified freely for any non-commercial purposes but always keeping the author's name and copyright clauses. Other than that, just use this project as you wish but never sell it!