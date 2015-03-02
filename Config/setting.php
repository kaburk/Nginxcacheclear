<?php
/**
  * Nginxキャッシュクリアプラグイン.Setting
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @package    Nginxcacheclear.Setting
  * @since      v 1.7.2
  * @license    MIT lincense
  *
  */
  // Nginxキャッシュクリア管理・システムメニュー
  $config['BcApp.adminNavi.nginxcacheclear'] = array(
    'name' => 'Nginxキャッシュクリアプラグイン',
    'contents' => array(
      array(
        'name' => 'Nginxキャッシュクリア管理', 'url' => array(
          'admin' => true,
          'plugin' => 'nginxcacheclear',
          'controller' => 'nginxcacheclear',
          'action' => 'index'
        )
      )
    )
  );
  // Nginxキャッシュクリア更新管理・セレクトボックス・オプション
  $config['Ngxcc_Selectdir.ngxcc_select_opt'] = array(
    'options' => array(
      '/var/cache/' => 'デフォルトディレクトリ: /var/cache/',
      '/var/www/' => 'Webディレクトリ: /var/www/',
      '/var/www/html/app/tmp/cache/' => 'baserCMSキャッシュディレクトリ: app/tmp/cache/',
      '/home/user/public_html/' => 'ホームユーザー：/home/user/public_html/'
    )
  );
