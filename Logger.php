<?php
/**
 * @author Leonard Shtika <leonard@shtika.info>
 * @link http://leonard.shtika.info
 * @copyright (C) 2014 Leonard Shtika
 * @license MIT. See the file LICENSE for copying permission. 
 */

namespace leoshtika\libs;

/**
 * Logger class file
 * The add() method takes 2 optional arguments
 * 
 * How to use:
 * require_once 'Logger.php';
 * use leoshtika\libs\Logger;
 * Logger::add('Your message', Logger::LEVEL_WARNING);
 */
class Logger 
{
	// Path where the logfile will be saved. Change this if needed
	const LOGFILE_PATH = 'logfiles/';
	
	// Level codes for logs
	const LEVEL_EMERGENCY   = 'EMERGENCY';
	const LEVEL_ALERT       = 'ALERT';
	const LEVEL_CRITICAL    = 'CRITICAL';
	const LEVEL_ERROR       = 'ERROR';
	const LEVEL_WARNING     = 'WARNING';
	const LEVEL_NOTICE      = 'NOTICE';
	const LEVEL_INFO        = 'INFO';
	const LEVEL_DEBUG       = 'DEBUG';
    
	// File handler  
	private static $_fileHandler = null;
	
	
	/**
	 * Write message to the log file
	 * @param string $message Optional message
	 * @param string $logCode Optional log code (example: INFO (default), ERROR, ATTEMPT TO HACK, ...)
	 */
	public static function add($message='no message', $logCode=self::LEVEL_INFO)
	{
		// if file pointer doesn't exist, then open log file  
		if (!self::$_fileHandler)
		{
			self::_openLogFile();
		}

		// Get user IP
		$userIP = $_SERVER['REMOTE_ADDR'];
		
		// define current time  
		$time = date('j/M/Y H:i:s');
		
		// define script name  
		$scriptName = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
		
		// write message to the log file  
		fwrite(self::$_fileHandler, "$userIP [$time][$logCode] ($scriptName) --> $message\n");
	}
	
	
	/**
	 * Open log file
	 */
	private static function _openLogFile()
	{
		// define the current date (it will be appended to the log file name)  
		$month = date('Y-m');
		
		// define log file path and name  
		$logFile = self::LOGFILE_PATH.'all.log_'.$month;
		
		// open log file for writing only; place the file pointer at the end of the file  
		// if the file does not exist, attempt to create it  
		self::$_fileHandler = fopen($logFile, 'a') or exit("Can't open $logFile!");
	}
}