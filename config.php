<?php
/**
  * Nginxキャッシュクリアプラグイン.Config
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  Nginxcacheclear.Config
  * @since			  v 1.6.5
  * @license      MIT lincense
  *
  */

$title = 'Nginxキャッシュクリア';
$description = 'baserCMSのサーバキャッシュ削除とは別口で動作する、Nginx専用・キャッシュクリアプラグイン。- 事前に /etc/nginx/nginx.conf 内の ( proxy_cache_pass ~ ) へ記述されたキャッシュディレクトリ名の絶対パス ( /var/www/html 等のスラッシュから始まるパスの事。) を控えておき、Nginxキャッシュディレクトリ更新管理にて更新します。- ※但し、ルートディレクトリ( /var/cache/ , /var/www/ )及び、baserCMSキャッシュディレクトリ( app/tmp/ )をセキュリティ的な観点から固定化しましたので、キャッシュが生成・一時保存されるディレクトリを入力して下さい。)';
$adminLink = array('plugin' => 'nginxcacheclear', 'controller' => 'nginxcacheclear', 'action' => 'index');
$installMessage = 'Nginxキャッシュクリアプラグインをインストールしますか？';
$author = 'hisanuco';
$url = 'http://blog.necomaneki.com/';

?>
