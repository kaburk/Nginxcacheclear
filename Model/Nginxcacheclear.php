<?php
/**
  * Nginxキャッシュクリアプラグイン.Model
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @package    Nginxcacheclear.Model
  * @since      v 1.6.7
  * @license    MIT lincense
  *
  */
// baserCMS BcPluginAppModel/Model
App::import('Model','BcPluginAppModel');

// Nginxcacheclear Model Class
class Nginxcacheclear extends BcPluginAppModel {
  // モデル.Name
  public $name = 'Nginxcacheclear';
  // プラグイン.Name
  public $plugin = 'Nginxcacheclear';
  // プラグイン.DbConfig
  public $useDbConfig = 'plugin';
  // プラグイン.Validate
  public $validate = array('cachepath' => array('rule' => array('minLength', '6')), 'cachedir' => array('rule' => '/^[a-z0-9_-]{3,}$/i'));
}
?>
