<?php

//require_once 'src/Logger.php';

use leoshtika\libs\Logger;

class LoggerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test if add method returns true
     */
    public function testAdd()
    {
        $this->assertTrue(Logger::add('Test from PHPUnit', Logger::LEVEL_DEBUG));
    }
}