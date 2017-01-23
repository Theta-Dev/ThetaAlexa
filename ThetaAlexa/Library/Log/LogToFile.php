<?php
/*  created by ThetaDev (thdev.org)

 | forked from https://github.com/gaiterjones/amazon-alexa-php-hello-world-example by PAJ
 | The MIT License (MIT) Copyright (c) 2016 gaiterjones
 | blog.gaiterjones.com
 | paj@gaiterjones.com 
 */

namespace ThetaAlexa\Library\Log;

class LogToFile {

	private $fp;
	protected $__;

	public function __construct($_variables) {
		
		$this->fp=null;
		$this->loadClassVariables($_variables);
		
		$_data=$this->get('data');
		
		$_logfile=$this->get('logfile');
		
		$this->writeLogFile($_data,$_logfile);
	}
	
	// write message to the log file
	//
	private function writeLogFile($_data,$_logfile){
		
		$this->set('success',false);
		$this->set('errormessage','Not defined');
		
		// if file pointer doesn't exist, then open log file
		if ($this->openLogFile($_logfile))
		{
			// define script name
			$_script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
			
			// define current time
			$_now=new \DateTime();
			$_time = $_now->format('H:i:s');
			
			// write current time, script name and message to the log file
			fwrite($this->fp, "$_time,($_script_name),$_data\n");
			
			$this->set('success',true);
			$this->set('output','Log created');
			return true;
		}
		
		$this->set('errormessage','Error creating log.');
		return false;
	}
	
	// open log file
	//
	private function openLogFile($_logfile){
	
		// define the current date (it will be appended to the log file name)
		$_now=new \DateTime();
		$_today = $_now->format('Y-m-d');
		
		// open log file for writing only; place the file pointer at the end of the file
		// if the file does not exist, attempt to create it
		$this->fp = @fopen($_logfile . '_' . $_today. '.log', 'a');
		
		if ( !$this->fp ) {
		  //throw new \Exception ('Failed to open log file.');
		  return false;
		}
		
		 return true;
	}
	
	/**
	 * get function.
	 * @what class variable retriever
	 * @access public
	 * @return VARIABLE FROM ARRAY
	 */	
  	public function get($variable)
	{
		if (!isset($this->__[$variable]) && substr($variable, -8) != 'optional') { throw new exception(get_class($this). ' - The requested class variable "'. $variable. '" does not exist.');}
		
		return $this->__[$variable];
	}


	/**
	 * set function.
	 * @what class variable setter
	 * @access public
	 * @return VARIABLE TO ARRAY
	 */		
	public function set($key,$value)
	{
		$this->__[$key] = $value;
	}

	/**
	 * loadClassVariables function.
	 * @what loads in variables passed to class
	 * @access protected
	 * @return nix
	 */	
	protected function loadClassVariables($_variables)
	{
		foreach ($_variables as $_variableName=>$_variableData)
		{
			// check for optional data
			if (substr($_variableName, -8) === 'optional') { continue; }
			
			$_variableData=trim($_variableData);
			if (empty($_variableData)) {
				throw new exception('Class variable '.$_variableName. ' cannot be empty.');
			}
			
			$this->set($_variableName,$_variableData);
						
		}
	}	
}