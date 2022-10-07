<?php

# директория public
define('ROOT', 'http://localhost');

define('DBNAME', 'piggy_bank');
define('DBHOST', 'localhost');
define('DBUSER', 'postgres');
define('DBPASS', 'admin');
define('DBPORT', 5432);
define('DBDRIVER', 'pgsql');

spl_autoload_register(function($class_name){

	require "../app/models/". ucfirst($class_name) . ".php";
});
