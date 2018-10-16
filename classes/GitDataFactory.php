<?php 
require_once(dirname(__FILE__)."/GitLabData.php");
require_once(dirname(__FILE__)."/GitHubData.php");

class GitDataFactory
{
	//引数にわたされたデータの値を見てgitlabかgithubかを判断してDataStoreを生成する
    static public function createData($data)
    {
        if(GitDataFactory::isGithub($data)){
        	return new GitHubData($data);
        }

        if(GitDataFactory::isGitlab($data)){
        	return new GitLabData($data);	
        }
        throw new Exception('It can not be recognized GitType', 0, null);
    }

    static public function isGithub($data){
    	if(isset($data["repository"])){
    		if(isset($data["repository"]["ssh_url"])){
    			if(strpos($data["repository"]["ssh_url"],"github.com")){
    				return true;
    			}
    		}
    		return false;
    	}else{
    		return false;
    	}
    }
    
    static public function isGitlab($data){
    	if(isset($data["repository"])){
    		if(isset($data["repository"]["git_ssh_url"])){
    			if(strpos($data["repository"]["git_ssh_url"],"gitlab")){
    				return true;
    			}
    		}
    		return false;
    	}else{
    		return false;
    	}
    	
    }
}
