<?php 
require_once(dirname(__FILE__)."/classes/GitDataFactory.php");
require_once(dirname(__FILE__)."/classes/ConfigFactory.php");
require_once(dirname(__FILE__)."/classes/Log.php");


$config = ConfigFactory::getConfig();
$config_path = $config->getConfigPath();
$log_path = $config->getLogPath();
$base_path = $config->getWebPath();
$command = $config->getCommand();

Log::clear($log_path);
$body = json_decode(file_get_contents($command), TRUE);
$git_data = GitDataFactory::createData($body);
$git_data->init();

Log::output($log_path,"repository_name : ".$git_data->repository_name);
Log::output($log_path,"branch_name : ".$git_data->branch_name);
Log::output($log_path,"ssh_remote_repository : ".$git_data->remote_repository);

$config = json_decode(file_get_contents($config_path.$git_data->repository_name.".json"),TRUE);

$deploy_path = $base_path.$config[$git_data->branch_name];
$is_exists_deploy_dir = file_exists($deploy_path);



if(!$is_exists_deploy_dir){
    mkdir($deploy_path,0777,true);
}

$is_exists_repository = file_exists($deploy_path."/.git");

if($is_exists_repository){
    //リモートと同期
    $cmd = "cd {$deploy_path} && git fetch && git reset --hard && git checkout -f {$git_data->branch_name} && git merge origin/{$git_data->branch_name} 2>&1";
}else{
    //clone
    $cmd = "cd {$deploy_path} && git clone {$git_data->remote_repository} ./ 2>&1";
}
Log::output($log_path,"excute command : ".$cmd);
exec($cmd,$out,$stat);
Log::output($log_path,"excute command result : ".json_encode($out));