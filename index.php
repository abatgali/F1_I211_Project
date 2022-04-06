<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: index.php
 * Description: project homepage
 */

//load application settings
require_once ("application/config.php");

// load autoloader
require_once('vendor/autoload.php');


// creating controller object
$index = new HomeController();

// using controller object to execute function per request
$index->index();

//load the dispatcher that dissects a request URL
//new Dispatcher();