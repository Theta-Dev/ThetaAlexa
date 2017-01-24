<?php
/*  created by ThetaDev (thdev.org)

 | forked from https://github.com/gaiterjones/amazon-alexa-php-hello-world-example by PAJ
 | The MIT License (MIT) Copyright (c) 2016 gaiterjones
 | blog.gaiterjones.com
 | paj@gaiterjones.com 
 */


namespace ThetaAlexa\Application\Amazon\Alexa\Intent;

class LaunchRequest extends \ThetaAlexa\Application\Amazon\Controller {
	
	public function __construct($_variables) {
	
		// load parent
		parent::__construct($_variables);
	}
	
	public function intentAction()
	{
		$_alexaRequest=$this->get('alexarequest');
		
		return parent::getResponse($this, $_alexaRequest, 'Hallo Welt', '', true);
	}
}
?>
