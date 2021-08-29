## laravel-weight-app について

laravelで作成された、「毎日体重を記録をしよう」というWebアプリです。

ユーザー登録、ユーザー認証をしたら１日１回体重を記録ができ、グラフを表示できます。

シーダーにて、テストデータが入ったアカウントを用意しています。

グラフ表示を試ししたい場合は

1@test.com パスワード 1   又は、 2@test.com パスワード 1

でログインして、6月などを表示してみてください。



### tora-japanが作成したソースファイル
./weight_src/にあります。



### インストールにあたっての前提条件

・laravelの環境構築できる知識。

・laravel8.xが動く環境。

　webサーバー(apache/nginx)、PHP8.x または 7.4、データベースの動作環境はあるものとする。

・composer,npmが動く環境。

・.gitignoreで除外されているものなどは手動でインストールするものとする。

・実行権限の設定、.envの設定などは自分でできること。



### インストール手順

gitクローンを作成するか、zipを解凍してください。

フォルダーに移動して下記のコマンドを実行してください。
- composer install
- npm install

環境に合わせて、sqlで ユーザー名、データーベース名、データーベースへのアクセス権限を作成してください。
- ユーザー名　laravel_weight
- データーベース名 laravel_weight
例えば：mysqlの場合
CREATE USER 'laravel_weight'@'localhost' IDENTIFIED BY '@A3mgbc2y';
GRANT USAGE ON *.* TO 'laravel_weight'@'localhost';
CREATE DATABASE laravel_weight CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
GRANT ALL PRIVILEGES ON `laravel\_weight`.* TO 'laravel_weight'@'localhost';

.envファイルの中の下記を環境に合わせて変更してください。
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=laravel_weight
- DB_USERNAME=laravel_weight
- DB_PASSWORD=@A3mgbc2y

weight_srcをlaravel環境にコピーするため、下記のコマンドを実行してください。
- php src_copy.php

※パーミッションの設定によって、コピーがうまくいかない場合は

　手動でフォルダーの中身をカレントにコピーしてください。

もうすこしで、環境構築は終わりです。下記のコマンドを実行してください。
- npm run dev
- php artisan migrate:fresh

テストデータのシーダーを入れる場合は、下記のコマンドを実行してください。
- php artisan db:seed --class=UsersSeeder
- php artisan db:seed --class=WeightSeeder

簡易サーバーやwebサーバーを立ち上げ、表示確認してください。

- php artisan serve

※apacheなどのwebサーバーを使う場合は、実行権限の設定をする必要があります。


### ライセンス
tora-japanが作成したソースコードのみMIT

weight_src/public/img/public/img/にある画像は、フリー素材を使っていますが、[イラスト屋](https://www.irasutoya.com/ "イラスト屋")の著作物です。

[イラスト屋のライセンス](https://www.irasutoya.com/p/terms.html "イラスト屋の利用規約")に従ってください。

その他のライセンスは、各フレームワーク、ライブラリー、NPM先のライセンスに従ってください。

使用しているライブラリーやフレームワークなどは次の通りです。

[jquery](https://jquery.com/ "jquery")

[Bootstrap](https://getbootstrap.jp/ "Bootstrap")

[chartjs](https://www.chartjs.org/ "chartjs")

[PHP8](https://www.php.net/ "PHP8")

[Laravel8](http://laravel.jp/ "Laravel8")

[LaravelJetstream](https://jetstream.laravel.com/2.x/introduction.html "LaravelJetstream")

[livewire](https://laravel-livewire.com/ "livewire")

[Carbon](https://carbon.nesbot.com/ "Carbon")

[js-cookie](https://github.com/js-cookie/js-cookie "js-cookie")


