<?php

require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbname'] = 'blog';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
        
        define("BASE_URL","http://localhost/mangiarepizza/painel");
} else {
	$config['dbname'] = 'galeria';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
        
        define("BASE_URL","http://www.mangiarepizza.com.br/painel");
}

?>