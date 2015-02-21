<?php

/**
 * The following example demonstrates how to use the Logger class
 * 
 * PHPUnit
 * Run it from the logger folder
 * $ phpunit tests
 */

// Uncomment the following line if you are using composer and comment the other one
// require_once 'vendor/autoload.php';
require_once 'src/Logger.php';

use leoshtika\libs\Logger;

$myLogMessage = 'Demo message added in logfiles';

if (Logger::add($myLogMessage, Logger::LEVEL_INFO)) {
    echo $myLogMessage;
} else {
    echo 'Something went wrong with the logger';
}