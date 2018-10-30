<?php 
require_once(dirname(__FILE__)."/INotification.php");

abstract class MailNotification implements INotification
{
    protected $subject;
    protected $from;
    protected $to;
    protected $header;

    public function notify($message){
        
        mail($this->to,$this->subject,$message,$this->header);
    }
}