<?php

/*
 *************************************************************
 Configuration for ignite test
 
 * Content:
 	* Controllers Path
 	* Domains Path
*/

/****************************************************
 * This is the CodeIgniter /application folder path.
 * 
 * The default configuration of ignitest is placed inside application/tests as config_ignitest.php.
 *
 * If your config_ignitest.php file is not inside application/tests, change it to your correct path.
 *****************************************************/
	define("APPPATH", "../../");

// Controllers path
$controllersPath = APPPATH."controllers/";
define("CONTROLLERPATH", $controllersPath);

// Domains path
$domainsPath = APPPATH."data_types/";
define("DOMAINPATH", $domainsPath);