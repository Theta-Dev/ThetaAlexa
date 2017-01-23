<?php
/*  created by ThetaDev (thdev.org)

 | forked from https://github.com/gaiterjones/amazon-alexa-php-hello-world-example by PAJ
 | The MIT License (MIT) Copyright (c) 2016 gaiterjones
 | blog.gaiterjones.com
 | paj@gaiterjones.com 
 */

namespace ThetaAlexa\Library\Log;

class Helper {
	
	function logThis($_logdata,$_logKey,$_toFile=true,$_logFile=false,$_toCache=true)
	{
		try
		{
			if ($_toCache)
			{
				// log to logging module (cache)
				$_obj=new LogToCache($_logdata,$_logKey);
					unset($_obj);
			}

			if ($_toFile && $_logFile) // optionally log to file
			{
				$_obj=new LogToFile(array(
					'logfile' => $_logFile,
					'data' => $_SERVER['REMOTE_ADDR']. ' '. $_logdata
				));
				
				unset($_obj);
			}
			
			return true;
			
		}
		catch (\Exception $e)
	    {
		    return false;
	    }
	}	
}
?>
