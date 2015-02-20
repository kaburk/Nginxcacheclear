<?php
/**
  * Nginx Cache Clear Plugin.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @package		  NginxCacheClear.Model
  * @since			  v 1.6.3
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
  //Plugin Validate
  public $validate = array( 'cachedir' => array( 'CacheRule1' => array('rule' => 'notEmpty' , 'required' => true) , 'CacheRule2' => array('rule' => '/^[a-z0-9-\/\.~_]{14,}$/i')));
}

?>
