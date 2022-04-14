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

//hi

//load the dispatcher that dissects a request URL
new Dispatcher();