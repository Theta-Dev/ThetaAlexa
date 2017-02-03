<?php
/*
	Edit configuration settings here
*/

namespace ThetaAlexa\Application\Amazon;

class config
{
	// AMAZON ALEXA
	const amazonSkillId = 'amzn1.ask.skill.XXX';
	const amazonEchoServiceDomain = 'echo-api.amazon.com';
	const amazonCacheFolder='/ThetaAlexa/cache/';
	const amazonCardImageFolder='/ThetaAlexa/www/Amazon/Alexa/images/card/';
	const amazonSoundFolder='/ThetaAlexa/www/Amazon/Alexa/sounds/';
	
	const singleIntent = '';
	
	// timezone
	const timezone='Europe/Berlin';		

	// configure memcache
	const useMemcache=false;
	const memcacheServer='localhost';
	const memcacheServerPort='11211';
	const memcacheTTL='604800';
	const cacheKey='AMAZON';
	const cacheHTML=false;	
	
	// configure session variables
	const sessionEnabled = true;
	const sessionLifetime = 86400;
	
	// configure logging module
	const loggingEnabled = false; // logs to logging module
	// path to folder for file logging
	const logFilePath = '/home/www/log/';
	// ttl for cached log data
	const logCacheTTL = '86400'; // 24 hours
	// show ip address in logs - see log.php
	const logShowIP = false;
	// show geo info in logs - see log.php
	const logGeoInfo = false;		
	
	// my constants here
	const applicationName = 'ThetaAlexa';
	const applicationURL = 'https://www.yourserver.com/xxx/';
	const applicationDomain = 'yourserver.com';
	const siteTitle='ThetaAlexa';

	public $_serverURL;
	public $_serverPath;
	
	public function __construct()
	{
		if (php_sapi_name() != 'cli') {
			$this->_serverURL=$this->serverURL();
			$this->_serverPath=$this->serverPath();
		}
	}
	
	
    public function get($constant) {
	
	    $constant = 'self::'. $constant;
	
	    if(defined($constant)) {
	        return constant($constant);
	    }
	    else {
	        return false;
	    }

	}

	/**
	 * serverURL function.
	 * 
	 * @access public
	 * @return string
	 */
	public function serverURL() {
	 $_serverURL = 'http';
	 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$_serverURL .= "s";}
	 $_serverURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $_serverURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
	 } else {
	  $_serverURL .= $_SERVER["SERVER_NAME"];
	 }
	 return $_serverURL;
	}
	
	private function serverPath() {
	 $_serverPath=$_SERVER["REQUEST_URI"];
	 //$_serverPath=explode('?',$_serverPath);
	 //$_serverPath=$_serverPath[0];
	 
	 return $_serverPath;
	}	
	
}




?>
