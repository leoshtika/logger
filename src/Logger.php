<?php

/**
 * Logger: The simplest PHP Logger class
 * 
 * @author Leonard Shtika <leonard@shtika.info>
 * @link http://leonard.shtika.info
 * @copyright (C) Leonard Shtika
 * @license MIT. See the file LICENSE for copying permission. 
 */

namespace leoshtika\libs;

/**
 * Logger class file
 * 
 * How to use:
 *   require_once 'vendor/autoload.php';
 *      // if you don't use composer require_once 'src/Logger.php';
 *   use leoshtika\libs\Logger;
 *   Logger::add('Your message', Logger::LEVEL_WARNING);
 */
class Logger
{
    // Path where the logfile will be saved.
    const LOGS_FOLDER_PATH = 'logfiles/';
    
    // Level codes for logs
    const LEVEL_EMERGENCY = 'EMERGENCY';
    const LEVEL_ALERT = 'ALERT';
    const LEVEL_CRITICAL = 'CRITICAL';
    const LEVEL_ERROR = 'ERROR';
    const LEVEL_WARNING = 'WARNING';
    const LEVEL_NOTICE = 'NOTICE';
    const LEVEL_INFO = 'INFO';
    const LEVEL_DEBUG = 'DEBUG';

    // File handler  
    private static $_fileHandler = null;


    /**
     * Write message to the log file
     * @param string $message Optional message
     * @param string $logCode Optional log code (example: INFO (default), ERROR, EMERGENCY)
     */
    public static function add($message = 'No message', $logCode = self::LEVEL_INFO)
    {
        // if file pointer doesn't exist, then open log file  
        if (!self::$_fileHandler) {
            self::_openLogFile();
        }

        // Get user IP
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $userIP = $_SERVER['REMOTE_ADDR'];
        } else {
            $userIP = '0.0.0.0';
        }

        // define current time  
        $time = date('j/M/Y H:i:s');

        // define script name  
        $scriptName = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);

        // write message to the log file
        $fwrite = fwrite(self::$_fileHandler, "$userIP [$time][$logCode] ($scriptName) --> $message\n");
        
        if ($fwrite === false) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * Open log file
     */
    private static function _openLogFile()
    {
        // define the current date (it will be appended to the log file name)  
        $month = date('Y-m');

        self::_crateLogsFolder();

        // define log file path and name  
        $logFile = self::LOGS_FOLDER_PATH . $month . '.log';

        // open log file for writing only; place the file pointer at the end of the file  
        // if the file does not exist, attempt to create it  
        self::$_fileHandler = fopen($logFile, 'a') or exit("Can't open $logFile!");
    }


    /**
     * Create LogsFolder if not exist
     * This method will create a .htaccess to deny access to logfiles
     */
    private static function _crateLogsFolder()
    {
        // If folder doesn't exist attempt to create it
        if (!file_exists(self::LOGS_FOLDER_PATH)) {
            mkdir(self::LOGS_FOLDER_PATH, 0755, true);
            $htaccessHandler = fopen(self::LOGS_FOLDER_PATH . '.htaccess', 'w');
            fwrite($htaccessHandler, 'deny from all');
            fclose($htaccessHandler);
        }
    }
}