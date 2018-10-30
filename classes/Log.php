<?php 

class Log
{

    static function clear($filename)
    {
        $fp = fopen($filename, 'r+');
        flock($fp, LOCK_EX);
        ftruncate($fp,0); 
        flock($fp, LOCK_UN);
        fclose($fp);
    }

    static function output($filename,$msg)
    {
        $msg .= "\n";
        error_log($msg, 3, $filename);
    }

    static function get($filename)
    {
        $contents = file_get_contents($filename);
        return $contents;
    }
}