<?php
/**
  * Nginx Cache Clear Plugin.
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
  *
  * @copyright		Copyright 2015, Studio Necomaneki
  * @link			    http://blog.necomaneki.com/ Studio Necomaneki
  * @since			  v 1.5.0
  * @license      MIT lincense
  *
  */

class NginxcacheclearsSchema extends CakeSchema {

	public $file = 'nginxcacheclears.php';

	public $connection = 'plugin';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $nginxcacheclears = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'cachedir' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

}
