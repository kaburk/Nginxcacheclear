<?php
/**
  * Nginxキャッシュクリアプラグイン.Model
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  Nginxcacheclear.Model
  * @since			  v 1.6.5
  * @license      MIT lincense
  *
  */
App::import('Model','BcPluginAppModel');
class Nginxcacheclear extends BcPluginAppModel {
  //Model Name
  public $name = 'Nginxcacheclear';
  //Plugin Name
  public $plugin = 'Nginxcacheclear';
  //Plugin DbConfig
  public $useDbConfig = 'plugin';
  //public validate
  public $validate = array('cachepath' => array('rule' => array('minLength', '6')), 'cachedir' => array('rule' => '/^[a-z0-9_-]{3,}$/i'));
}

?>
