<?php
	//Gets needed data:
	$key = getVariable("key");
	$type = strtolower(getVariable("type")); //Case insensitive.
	$from = intval(getVariable("from"));
	$size = intval(getVariable("size"));
	$tailored = (strtolower(getVariable("tailored")) === "true");