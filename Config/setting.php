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
  * @since      v 1.6.6
  * @license    MIT lincense
  *
  */
// システムメニュー.Nginxcacheclear
$config['BcApp.adminNavi.nginxcacheclear'] = array(
  'name' => 'Nginxキャッシュクリアプラグイン',
  'contents' => array(
    array('name' => 'Nginxキャッシュクリア管理', 'url' => array('admin' => true, 'plugin' => 'nginxcacheclear', 'controller' => 'nginxcacheclear', 'action' => 'index')),
  )
);
