<?php
  /**
    * Nginxキャッシュクリアプラグイン.Controller
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @package			Nginxcacheclear.Controller
    * @since			  v 1.6.4
    * @license      MIT lincense
    *
    */
// Sanitize Utility
App::uses('Sanitize','Utility');
// Controller Plugin
App::import('Controller', 'Plugins');
/**
 * Nginx Cache Clear Controller.
 */
class NginxcacheclearController extends BcPluginAppController {

// Controller
    public $name = 'Nginxcacheclear';

// Component
    public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

// Parent
    public function beforeFilter() {
        parent::beforeFilter();

        if (preg_match('/^admin_/', $this->action)) {
            // Submenu
            $this->subMenuElements = array('nginxcacheclear');
        }
        // Model Search - CachePath
        $defcachedir = $this->Nginxcacheclear->find('first');
        // Data Null
        if (!$defcachedir) {
            $this->Nginxcacheclear->read(null, 1);
            $this->Nginxcacheclear->set('cachedir', '/var/cache/nginx');
            $this->Nginxcacheclear->save();
        }

    }

// Admin index Page Action
    public function admin_index() {
        $cachedir = $this->Nginxcacheclear->find('all');
        $this->set('cachedir',$cachedir);
        $this->pageTitle = 'Nginxキャッシュクリア管理';
        $this->render('index');
    }

// Admin edit page Action
    public function admin_edit() {
    // not database.
        if (!$this->data) {
            // Data Search
            $this->data = $this->Nginxcacheclear->find('first');
        } else {
            // Add Data Set
            $this->Nginxcacheclear->set($this->data);
            // $id = 1 only update
            if ($this->Nginxcacheclear->id = 1) {
                // Sanitize
                $this->data = Sanitize::clean($this->data, array('escape' => false));
                // Add Data Save
                $this->Nginxcacheclear->save($this->data);
                $this->Session->setFlash('ディレクトリを更新しました。');
            } else {
              // Add Data Error
                $this->Session->setFlash('ディレクトリの更新ができませんでした。');
            }
            $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
        }
        $this->pageTitle = 'Nginxキャッシュディレクトリ更新管理';
        $this->render('edit');
    }

// Admin Nginx Cache Clear Action
    public function admin_clear() {
        App::import('Core', 'Folder');
        // Model Search - CachePath
        $ngxcache = $this->Nginxcacheclear->find('first');
        // CachePath Add
        $folder = new Folder($ngxcache['Nginxcacheclear']['cachedir'] . DS );
        $files = $folder->read(true, true, true);
        // Nginx Cache Directory Search
        if ($files[preg_match("\x[0-9A-Fa-f]{1,2}")]) {
            foreach ($files[1] as $file) {
                @unlink($file);
            }
  	    $Folder = new Folder();
            foreach ($files[0] as $folder) {
              $Folder->delete($folder);
            }
            $this->setMessage('Nginxのキャッシュを削除しました。');
        } else {
            $this->setMessage('削除するキャッシュがありませんでした。');
        }
        $this->redirect($this->referer());
    }

}
?>
