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
        
        define("BASE_URL","http://localhost/mangiarepizza/admin");
} else {
	$config['dbname'] = 'idmwe192_mangiarepizza';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'idmwe192_admin';
	$config['dbpass'] = 'bbL8cv8$A7*';
        
        define("BASE_URL","http://www.mangiarepizza.com.br/admin");
}

?>