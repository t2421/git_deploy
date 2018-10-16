<?php 

//GitlabやGithubなどさまざまなgitのツールに対応するためにデータを抽象化する。
class GitData
{
    public $repository_name;
    public $branch_name;
    public $remote_repository;
    protected $_body;

    public function __construct($request_body)
    {
        $this->_body = $request_body;
    }

    public function init()
    {
        // それぞれのリポジトリタイプごとに処理する。
    }
}