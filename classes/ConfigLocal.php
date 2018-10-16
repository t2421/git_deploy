<?php 
require_once(dirname(__FILE__)."/IConfig.php");

class ConfigLocal implements IConfig
{
    
    public function __construct()
    {
       
    }
    public function getCommand(){
        return 'test/gitlab_request_body.json';
    }
    public function getConfigPath(){
    	return 'test/config/';
    }
    public function getLogPath(){
    	return 'test/log.txt';
    }
    public function getWebPath(){
    	return 'test/web/';
    }

}