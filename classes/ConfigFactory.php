<?php 
require_once(dirname(__FILE__)."/ConfigRemote.php");
require_once(dirname(__FILE__)."/ConfigLocal.php");

//POSTされたときにはhetemlとみなして設定オブジェクトを生成する。
//直接実行したときにはlocal用の設定オブジェクトを生成する。
class ConfigFactory
{
    static public function getConfig()
    {
        $method = !empty($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "";
        if($method === "POST"){
            return new ConfigRemote();
        }else{
            return new ConfigLocal();
        }
    }
}
