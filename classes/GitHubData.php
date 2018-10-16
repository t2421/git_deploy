<?php 
require_once(dirname(__FILE__)."/GitData.php");

//GitHubからのデータを整形するためのクラス
class GitHubData extends GitData
{
    public function __construct($request_body)
    {
        parent::__construct($request_body);
    }

    public function init()
    {
        $this->branch_name = empty($this->_body['ref']) ? '' : str_replace('refs/heads/', '', $this->_body['ref']);
        $this->repository_name = $this->_getRepositoryName();
        $this->remote_repository = $this->_body['repository']['ssh_url'];
    }

    //余計な文字列を削除して純粋なリポジトリ名を取得する
    private function _getRepositoryName(){
        $repository_name = $this->_body['repository']['ssh_url'];
        $repository_name = explode("/", $repository_name);
        $repository_name = end($repository_name);
        $repository_name = str_replace('.git', '', $repository_name);
        return $repository_name;
    }
}