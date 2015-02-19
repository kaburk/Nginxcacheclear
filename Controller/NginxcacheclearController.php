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
    * @since			  v 1.5.0
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
    $cachedir = $this->Nginxcacheclear->find('all');
    $this->set('cachedir',$cachedir);
    $this->pageTitle = 'キャッシュクリア管理画面';
    $this->render('index');
  }

  public function admin_edit() {
    if (!$this->data) {
      $this->Nginxcacheclear->create();
      $this->data = $this->Nginxcacheclear->find('first');
    } else {
      $this->Nginxcacheclear->set($this->data);
      if ($this->Nginxcacheclear->id = 1) {
	$this->Nginxcacheclear->save($this->data);
        $this->Session->setFlash('保存しました。');
        $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
      } else {
        $this->Session->setFlash('保存できませんでした。');
      }
    }
    $this->pageTitle = 'キャッシュディレクトリ変更及び、キャッシュ削除';
    $this->render('index');  
  }

  public function admin_clear() {
    App::import('Core', 'Folder');
    $ngxcache = $this->Nginxcacheclear->find('first');
    $folder = new Folder($ngxcache['Nginxcacheclear']['cachedir'] . DS );
    $files = $folder->read(true, true, true);
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
