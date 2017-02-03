<?php
/*  created by ThetaDev (thdev.org)

 | forked from https://github.com/gaiterjones/amazon-alexa-php-hello-world-example by PAJ
 | The MIT License (MIT) Copyright (c) 2016 gaiterjones
 | blog.gaiterjones.com
 | paj@gaiterjones.com 
 */

namespace ThetaAlexa\Application\Amazon\Alexa;


class SoundFile extends \ThetaAlexa\Application\Amazon\Controller {
	
	public function __construct() {
		
		$this->loadConfig();
		$this->sendSound();
		exit;
	}	
	
	
	protected function sendSound()
	{
		$_expires = new \DateTime("now + 11 months");
		
		if(isset($_GET['sound'])){ $_soundFilename = $_GET['sound'];} else { $_soundFilename = 'default';}	

		$_soundFolder=$this->__config->get('amazonSoundFolder');
		
		// Allow from any origin
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header("Expires:" . $_expires->format(\DateTime::RFC1123));
		}
		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		}
		
		header('Content-Type: audio/mpeg');
		
		if (file_exists($_soundFolder. $_size. '/'. $_soundFilename. '.mp3'))
			readfile($_soundFolder. '/'. $_soundFilename. '.mp3');
		
	}
}
