<?php 
require_once(dirname(__FILE__)."/TestSlackNotification.php");

class NotificationFactory
{
    static $use_notification = "slack";

    public function getNotification(){
        switch(NotificationFactory::$use_notification){
            case "slack":
            return new TestSlackNotification();
            default:
            return new TestSlackNotification();
        }
    }
}