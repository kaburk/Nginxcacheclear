<?php
/**
  * Nginxキャッシュクリアプラグイン.Controller
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @package    Nginxcacheclear.Controller
  * @since      v 1.8.0
  * @license    MIT lincense
  *
  */
// CakePHP ユーティリティ/サニタイズ
App::uses('Sanitize','Utility');
// CakePHP プラグイン/コントローラ
App::import('Controller', 'Plugins');
// Nginxキャッシュクリアプラグイン・コントローラ
class NginxcacheclearController extends BcPluginAppController {

    // コントローラ名
    public $name = 'Nginxcacheclear';

    // コンポーネント
    public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

    // Nginxキャッシュクリア・事前読み込み
    public function beforeFilter() {
        parent::beforeFilter();
        // 管理メニュー
        if (preg_match('/^admin_/', $this->action)) {
            $this->subMenuElements = array('nginxcacheclear');
        }

        // 初期設定をデータベースに追加する。
        $ngxcc_def_cachedir = $this->Nginxcacheclear->find('first');
        if (!$ngxcc_def_cachedir) {
            $this->Nginxcacheclear->read(null, 1);
            $this->Nginxcacheclear->set('cachepath','/var/cache/');
            $this->Nginxcacheclear->set('cachedir', 'nginx');
            $this->Nginxcacheclear->save();
        }
    }

    // Nginxキャッシュクリア・表示用アクション
    public function admin_views() {
      // キャッシュディレクトリの読み込み
        $ngxcc_ad_index_path = $this->Nginxcacheclear->find('all');
        $ngxcc_ad_index_dir  = $this->Nginxcacheclear->find('all');
        $this->set('ngxcc_ad_index_path',$ngxcc_ad_index_path);
        $this->set('ngxcc_ad_index_dir',$ngxcc_ad_index_dir);
    }

    // Nginxキャッシュクリア・管理用アクション
    public function admin_index() {
        // キャッシュクリア管理
        $this->setAction('admin_views');
        // __d('翻訳ファイル名', '元の単語');
        $this->pageTitle =  __d('nginxcacheclear', 'Nginxcacheclear Admin Page.');
        $this->render('index');
    }

    // Nginxキャッシュクリア・更新用アクション
    public function admin_edit() {
        // キャッシュディレクトリの更新
        $this->setAction('admin_views');
        if (!$this->data) {
            $this->data  = $this->Nginxcacheclear->find('first');
        } else {
            $this->data  = $this->Nginxcacheclear->set($this->data);
            if ($this->Nginxcacheclear->id = 1) {
                $this->data = Sanitize::clean($this->data, array('escape' => false, 'odd_spaces', 'encode', 'dollar', 'carriage', 'unicode', 'backslash'));
                $this->Nginxcacheclear->save($this->data);
                $this->Session->setFlash(__d('nginxcacheclear', 'I was updated directory.'));
            } else {
                $this->Session->setFlash(__d('nginxcacheclear', 'It was not possible to directory updates.'));
            }
        $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'edit'));
        }
    // Nginxキャッシュディレクトリ・セレクトボックス読み込み
    $ngxcc_ad_edit_selectbox = Configure::read('Ngxcc_Selectdir.ngxcc_select_opt');
    $this->set('ngxcc_ad_edit_selectbox', $ngxcc_ad_edit_selectbox);
    $this->pageTitle = __d('nginxcacheclear', 'Nginx Cache Directory Update Management');
    $this->render('edit');
    }

    // Nginxキャッシュクリア・ディレクトリチェック用アクション
    public function admin_check() {
        // キャッシュディレクトリチェック
        $ngxcc_find_check = $this->Nginxcacheclear->find('first');
        $ngxcc_check_path = $ngxcc_find_check['Nginxcacheclear']['cachepath'] . $ngxcc_find_check['Nginxcacheclear']['cachedir'];
        if (file_exists($ngxcc_check_path)) {
            $this->setMessage(__d('nginxcacheclear', 'Set the directory in which you reside.'));
        } else {
            $this->setMessage(__d('nginxcacheclear', 'The set directory does not exist.'));
        }
    $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'edit'));
    }

    // Nginxキャッシュクリア・キャッシュ削除用アクション
    public function admin_clear() {
        App::import('Core', 'Folder');
        $ngxcc_cache_check   = $this->Nginxcacheclear->find('first');
        $ngxcc_cache_path  = $ngxcc_cache_check['Nginxcacheclear']['cachepath'];
        $ngxcc_cache_dir   = $ngxcc_cache_check['Nginxcacheclear']['cachedir'];
        $ngxcc_cache_route = $ngxcc_cache_path . $ngxcc_cache_dir;
        if (!file_exists($ngxcc_cache_route)) {
            $this->setMessage(__d('nginxcacheclear', 'The set directory does not exist.'));
        } else {
            $ngxcc_bcs_folder = new Folder($ngxcc_cache_route . DS);
            $ngxcc_bcs_files  = $ngxcc_bcs_folder->read(true, true, true);
            if ($ngxcc_bcs_files[preg_match("/^[0-9][a-f]+$/")]) {
                foreach ($ngxcc_bcs_files[1] as $ngxcc_bcs_file) {
                    @unlink($ngxcc_bcs_file);
                }
                $ngxcc_bcs_Folder = new Folder();
                foreach ($ngxcc_bcs_files[0] as $ngxcc_bcs_folder) {
                    $ngxcc_bcs_Folder->delete($ngxcc_bcs_folder);
                }
                $this->setMessage(__d('nginxcacheclear', 'I have removed the cache of Nginx.'));
            } else {
                $this->setMessage(__d('nginxcacheclear', 'Did not have a cache that you want to delete.'));
            }
        }
    $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
    }

}
?>
