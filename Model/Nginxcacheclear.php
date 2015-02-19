<?php
/**
  * Nginx Cache Clear Plugin.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @since			  v 1.4.0
  * @license      MIT lincense
  *
  */
App::import('Model','BcPluginAppModel');
class Nginxcacheclear extends BcPluginAppModel {
  //Model Name
  public $name = 'Nginxcacheclear';
  //Plugin Name
  public $plugin = 'Nginxcacheclear';
  //Database
  public $useDbConfig = 'plugin';
}
?>
