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
  * @since      v 1.8.0
  * @license    MIT lincense
  *
  */
  //Configure::write( 'Config.language', 'en');
  // Nginxキャッシュクリア管理・システムメニュー
  $config['BcApp.adminNavi.nginxcacheclear'] = array(
    'name' => __d('nginxcacheclear', 'NginxCacheClear Plugins'),
    'contents' => array(
      array(
        'name' => __d('nginxcacheclear', 'NginxCacheClear Management'), 'url' => array(
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
      '/var/cache/' => __d('nginxcacheclear', 'The default directory: /var/cache/'),
      '/var/www/' => __d('nginxcacheclear', 'Web directory: /var/www/'),
      '/var/www/html/app/tmp/cache/' => __d('nginxcacheclear', 'baserCMS cache directory: app/tmp/cache/'),
      '/home/user/public_html/' => __d('nginxcacheclear', 'Home user: /home/user/public_html/')
    )
  );
