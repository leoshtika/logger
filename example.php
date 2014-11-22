<?php
// Uncomment this line if you are using composer and comment the other one
// require 'vendor/autoload.php';
require 'src/Logger.php';

use leoshtika\libs\Logger;

$myLogMessage = 'Message from example';

if (Logger::add($myLogMessage, Logger::LEVEL_INFO)) {
    echo 'The message "'.$myLogMessage.'" is added to logfiles';
} else {
    echo 'Something went wrong with the logger';
}


/**
 * PHPUnit
 * Run it from the logger folder
 * 
 * $ vendor/bin/phpunit
 * 
 */