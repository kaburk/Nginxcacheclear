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
  * @since      v 1.7.2
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
        $this->pageTitle = 'Nginxキャッシュクリア管理';
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
                $this->Session->setFlash('ディレクトリを更新しました。');
            } else {
                $this->Session->setFlash('ディレクトリの更新ができませんでした。');
            }
        $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'edit'));
        }
    // Nginxキャッシュディレクトリ・セレクトボックス読み込み
    $ngxcc_ad_edit_selectbox = Configure::read('Ngxcc_Selectdir.ngxcc_select_opt');
    $this->set('ngxcc_ad_edit_selectbox', $ngxcc_ad_edit_selectbox);
    $this->pageTitle = 'Nginxキャッシュディレクトリ更新管理';
    $this->render('edit');
    }

    // Nginxキャッシュクリア・ディレクトリチェック用アクション
    public function admin_check() {
        // キャッシュディレクトリチェック
        $ngxcc_find_check = $this->Nginxcacheclear->find('first');
        $ngxcc_check_path = $ngxcc_find_check['Nginxcacheclear']['cachepath'] . $ngxcc_find_check['Nginxcacheclear']['cachedir'];
        if (file_exists($ngxcc_check_path)) {
            $this->setMessage('設定したディレクトリは存在します。');
        } else {
            $this->setMessage('設定したディレクトリが存在しません。');
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
            $this->setMessage('設定したディレクトリが存在しません。');
        } else {
            $ngxcc_bcs_folder = new Folder($ngxcc_cache_route . DS);
            $ngxcc_bcs_files  = $ngxcc_bcs_folder->read(true, true, true);
            if ($ngxcc_bcs_files[preg_match("[0-9A-Fa-f]{1,2}")]) {
                foreach ($ngxcc_bcs_files[1] as $ngxcc_bcs_file) {
                    @unlink($ngxcc_bcs_file);
                }
                $ngxcc_bcs_Folder = new Folder();
                foreach ($ngxcc_bcs_files[0] as $ngxcc_bcs_folder) {
                    $ngxcc_bcs_Folder->delete($ngxcc_bcs_folder);
                }
                $this->setMessage('Nginxのキャッシュを削除しました。');
            } else {
                $this->setMessage('削除するキャッシュがありませんでした。');
            }
        }
    $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
    }

}
?>
