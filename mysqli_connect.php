<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'Przepisy');

$dbc=@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Nie mozna polaczyc z MySQL '
		. mysqli_connect_error());
		
?>