# git_deploy

## ローカル開発について
開発用にローカルでも実行できるようにしている。  
POSTせずに直接main.phpを実行すると、ローカルの設定を反映してプログラムを実行する。  
`php main.php`  
### ローカルでのテスト用に使っているリポジトリ
+ git@gitlab.com:t2421/sampleproject.git
+ https://github.com/h5bp/html5-boilerplate.git
### 使用したいGitのタイプ選択
GitlabおよびGitHubに対応している。  
リモートで実行する際にはWebhookのPOSTデータの中身を見て、どちらのタイプかを自動で判定するが、ローカルでどちらかを意図的に使用する場合にはConfigLocalクラスの`getCommand`で返す値を以下のように設定する。

|  Gitタイプ  |  getCommandの値  |
| ---- | ---- |
|  GitHub  |  test/github_request_body.json  |
|  Gitlab  |  test/gitlab_request_body.json  |

ダミーのデータを読み込んでCloneすることができる。