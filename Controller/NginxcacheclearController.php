<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @package			NginxCacheClear.Controller
    * @since			  v 1.3.0
    * @license      MIT lincense
    *
    */
  App::import('Controller', 'Plugins');

/**
 * Nginx Cache Clear Controller.
 */
class NginxcacheclearController extends BcPluginAppController {

// Controller
  public $name = 'Nginxcacheclear';

// Component
  public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

// Admin Page Action
  public function admin_index() {
    $this->autoRender = false;

    App::import('Core', 'Folder');
    $folder = new Folder(Configure::read('Nginxcacheclear.Cachedir') . DS);

    $files = $folder->read(true, true, true, true, true);
    foreach ($files[1] as $file) {
      // Cache Delete
      @unlink($file);
    }
    $Folder = new Folder();
    foreach ($files[0] as $folder) {
      $Folder->delete($folder);
    }

    $this->setMessage('Nginxキャッシュを削除しました。');
    $this->redirect($this->referer());

  }

}
?>
