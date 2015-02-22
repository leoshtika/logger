<?php

/**
 * The following example demonstrates how to use the Logger class
 */

require_once 'vendor/autoload.php';
// if you don't use composer require_once 'src/Logger.php';

use leoshtika\libs\Logger;

$myLogMessage = 'Demo message added in logfiles';

if (Logger::add($myLogMessage, Logger::LEVEL_INFO)) {
    echo $myLogMessage;
} else {
    echo 'Something went wrong with the logger';
}