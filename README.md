REST server in PHP 
=================== 
by Joan Alba Maldonado (joanalbamaldonadoNO_SPAM_PLEASE AT gmail DOT com, without NO_SPAM_PLEASE)

Simple and easy-to-configure REST server made in PHP.

Version: no version 
- Date: 12th May 2016 (approximately)


Description

Simple and easy-to-configure REST server made in PHP.

I made it just to create different fake REST servers very fast for testing purposes.

To add new paths (routes) and methods, the developer just needs to create a new folder structure (folder and subfolders if needed) which represents the route and inside one file per method named [method_desired].php (for example, put.php).

If you do not have a REST client, the server can be tested on any web browser by adding the "debug=1" parameter to the URL, as for example: http://localhost/fake_rest_server/src/index.php/route_1/subroute?method=post&debug=1&username=Joan

It is very easy to extend using PHP language. The code already includes some routes, methods, functions and data (user accounts, etc.) as examples (in the "example" folder) but they can be deleted. The folder "route_1" and all of its content (inside the "src" folder) can also be deleted since it is just an example.