<?php
/**
  * Nginx Cache Clear Plugin Config.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  NginxCacheClear.Setting
  * @since			  v 1.6.3
  * @license      MIT lincense
  *
  */
  $config['BcApp.adminNavi.nginxcacheclear'] = array(
    'name' => 'NginxCacheClearプラグイン',
    'contents' => array(
      array('name' => 'キャッシュディレクトリ名の変更', 'url' => array('admin' => true, 'plugin' => 'nginxcacheclear', 'controller' => 'nginxcacheclear', 'action' => 'edit')),
      array('name' => 'Nginxキャッシュ削除', 'url' => array('admin' => true, 'plugin' => 'nginxcacheclear', 'controller' => 'nginxcacheclear', 'action' => 'clear')),
    )
  );
