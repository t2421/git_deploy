<?php 
require_once(dirname(__FILE__)."/IConfig.php");

class ConfigRemote implements IConfig
{
    
    public function __construct()
    {
       
    }
    public function getCommand(){
        return 'php://input';
    }
    public function getConfigPath(){
    	return '/path/to/config/';
    }
    public function getLogPath(){
    	return '/path/to/log.txt';
    }
    public function getWebPath(){
    	return '/path/to/deploy/';
    }

}