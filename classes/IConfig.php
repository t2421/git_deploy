<?php 

interface IConfig
{
	public function getCommand();
    public function getConfigPath();
    public function getLogPath();
    public function getWebPath();
 
}