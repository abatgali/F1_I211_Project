<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: index.php
 * Description: project homepage
 */

require_once('vendor/autoload.php');


// creating controller object
$index = new HomeController();

// using controller object to execute function per request
$index->index();