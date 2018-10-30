<?php 
require_once(dirname(__FILE__)."/INotification.php");

abstract class SlackNotification implements INotification
{
    protected $slackApiKey;
    protected $channel;

    public function notify($message){
        $slackApiKey = $this->slackApiKey;
        $channel = urlencode($this->channel);
        $body = urlencode($message);
        $url = "https://slack.com/api/chat.postMessage?token=${slackApiKey}&channel=${channel}&text=${body}&as_user=true";
        $result = file_get_contents($url);
        echo($result);
    }
}