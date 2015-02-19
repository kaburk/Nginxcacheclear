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
    * @since			  v 1.4.0
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

// uses Property
  public $uses = array('Nginxcacheclear.Nginxcacheclear');

// Admin Page Action
  public function admin_index() {
    //$this->autoRender = false;
    $Cachedir = $this->Nginxcacheclear->find('first');
    $this->set('Cachedir',$Cachedir);
/*
    App::import('Core', 'Folder');
    $folder = new Folder(Configure::read('Nginxcacheclear.Cachedir') . DS);
    //$folder = new Folder($Cachedir . DS)
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
*/
  }

  public function admin_edit() {
    if (!$this->data) {
      $this->data = $this->Nginxcacheclear->find('first');
    } else {
      $this->Nginxcacheclear->set($this->data);
      if ($this->Nginxcacheclear->save()) {
        $this->Session->setFlash('保存しました。');
        $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
      } else {
        $this->Session->setFlash('保存できませんでした。');
      }
    }
  }

}
?>
