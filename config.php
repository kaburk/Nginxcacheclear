<?php
/**
  * Nginx Cache Clear Plugin.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  NginxCacheClear.config
  * @since			  v 1.2.1
  * @license      MIT lincense
  *
  */

$title = 'Nginxキャッシュクリア';
$description = 'nginx.confに記述されたキャッシュディレクトリ内の削除。※ディレクトリ名の変更は /Config/setting.php を編集して下さい。';
$adminLink = array('plugin' => 'nginxcacheclear', 'controller' => 'nginxcacheclear', 'action' => 'index');
$installMessage = 'NginxCacheClearをインストールしますか？';
$author = 'hisanuco';
$url = 'http://blog.necomaneki.com/';

?>
