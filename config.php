<?php

require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbname'] = 'mangiarepizza';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
        
        define("BASE_URL","http://localhost/mangiarepizza   ");
} else {
	$config['dbname'] = '';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
        
        define("BASE_URL","http://www.mangiarepizza.com.br");
}

?>