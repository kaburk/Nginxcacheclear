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
  * @since      v 1.6.6
  * @license    MIT lincense
  *
  */
// CakePHP ユーティリティ/サニタイズ
App::uses('Sanitize','Utility');

// CakePHP プラグイン/コントローラー
App::import('Controller', 'Plugins');

// Nginxキャッシュクリアプラグイン・コントローラー
class NginxcacheclearController extends BcPluginAppController {

// コントローラー名
    public $name = 'Nginxcacheclear';

// コンポーネント
    public $components = array('BcAuth', 'Cookie', 'BcAuthConfigure');

/*** BeforeFilter ***/

    public function beforeFilter() {
        parent::beforeFilter();
        // エレメンツ/管理メニュー
        if (preg_match('/^admin_/', $this->action)) {
            // $uri が admin なら管理メニューを表示
            $this->subMenuElements = array('nginxcacheclear');
        }
        // モデル/フィールド検索
        $ngxcc_def_cachedir = $this->Nginxcacheclear->find('first');
        // モデル/読み込み時・新規データ挿入
        if (!$ngxcc_def_cachedir) {
            // データベースを読み込み、空ならデフォルトデータをセットする
            $this->Nginxcacheclear->read(null, 1);
            // ルートパスをセット
            $this->Nginxcacheclear->set('cachepath','/var/cache/');
            // キャッシュフォルダをセット
            $this->Nginxcacheclear->set('cachedir', 'nginx');
            // ルートパス及び、キャッシュフォルダを保存
            $this->Nginxcacheclear->save();
        }
    }

/*** /BeforeFilter ***/

/*** ビュー, Nginxキャッシュクリア管理用アクション ***/

    public function admin_index() {
        // データベースからルートパスを探す
        $ngxcc_ad_index_path = $this->Nginxcacheclear->find('all');
        // データベースからキャッシュディレクトリを探す
        $ngxcc_ad_index_dir  = $this->Nginxcacheclear->find('all');
        // ビュー用のルートパス変数をセット
        $this->set('ngxcc_ad_index_path',$ngxcc_ad_index_path);
        // ビュー用のキャッシュディレクトリ変数をセット
        $this->set('ngxcc_ad_index_dir',$ngxcc_ad_index_dir);
        // Nginxキャッシュクリア管理のページタイトル
        $this->pageTitle = 'Nginxキャッシュクリア管理';
        // 利用するテンプレートは 'View/Nginxcacheclear/admin/index.php'
        $this->render('index');
    }

/*** /ビュー, Nginxキャッシュクリア管理用アクション ***/

/*** ビュー, Nginxキャッシュクリア管理・更新用アクション ***/

    public function admin_edit() {
        // フォームへ更新データを表示する
        if (!$this->data) {
            // 更新データをテーブルから見つける
            $this->data  = $this->Nginxcacheclear->find('first');
        } else {
            // 新規更新データをセット
            $this->data  = $this->Nginxcacheclear->set($this->data);
            // ID = 1 のみ更新する
            if ($this->Nginxcacheclear->id = 1) {
                // 入力されたデータをエスケープ処理
                $this->data = Sanitize::clean($this->data, array('escape' => false, 'odd_spaces', 'encode', 'dollar', 'carriage', 'unicode', 'backslash'));
                // 新規更新データをデータベースへ保存
                $this->Nginxcacheclear->save($this->data);
                // 新規更新データの保存が出来た場合に表示
                $this->Session->setFlash('ディレクトリを更新しました。');
            } else {
                // データベース接続エラーなどで更新出来なかった場合に表示
                $this->Session->setFlash('ディレクトリの更新ができませんでした。');
            }
        // Nginxキャッシュクリア管理にリダイレクト
        $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'edit'));
        }
    // Nginxキャッシュクリア管理のページタイトル
    $this->pageTitle = 'Nginxキャッシュディレクトリ更新管理';
    // 利用するテンプレートは 'View/Nginxcacheclear/admin/edit.php'
    $this->render('edit');
    }

/*** /ビュー, Nginxキャッシュクリア管理・更新用アクション ***/

/*** ビュー, Nginxキャッシュクリア管理・ディレクトリチェック用アクション ***/

    public function admin_check() {
        // Nginxキャッシュディレクトリのルートパスをデータベースから見つけ出す
        $ngxcc_find_check = $this->Nginxcacheclear->find('first');
        // Nginxキャッシュディレクトリのルートパスとキャッシュフォルダをセット
        $ngxcc_path_check = $ngxcc_find_check['Nginxcacheclear']['cachepath'] . $ngxcc_find_check['Nginxcacheclear']['cachedir'];
        // Nginxキャッシュディレクトリの有無を調べる
        if (file_exists($ngxcc_path_check)) {
            // Nginxキャッシュディレクトリが在る場合に以下を表示
            $this->setMessage('設定したディレクトリは存在します。');
        } else {
            // Nginxキャッシュディレクトリの無い場合に以下を表示
            $this->setMessage('設定したディレクトリが存在しません。');
        }
    // Nginxキャッシュクリア管理にリダイレクト
    $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'edit'));
    }

/*** /ビュー, Nginxキャッシュクリア管理・ディレクトリチェック用アクション ***/

/*** ビュー, Nginxキャッシュクリア管理・キャッシュ削除用アクション ***/

    public function admin_clear() {
        // CakePHP フォルダ/コア
        App::import('Core', 'Folder');
        // Nginxキャッシュディレクトリをデータベースから見つける
        $ngxcc_adcl_check   = $this->Nginxcacheclear->find('first');
        // Nginxキャッシュディレクトリのルートパスを変数に代入
        $ngxcc_adcl_path    = $ngxcc_adcl_check['Nginxcacheclear']['cachepath'];
        // Nginxキャッシュディレクトリのキャッシュフォルダを変数に代入
        $ngxcc_adcl_dir     = $ngxcc_adcl_check['Nginxcacheclear']['cachedir'];
        // Nginxキャッシュディレクトリのルートパスとフォルダをセットする
        $ngxcc_adcl_folder  = $ngxcc_adcl_path . $ngxcc_adcl_dir;
        // Nginxキャッシュディレクトリが存在するかチェックする
        if (!file_exists($ngxcc_adcl_folder)) {
            // Nginxキャッシュディレクトリが無い場合は以下を表示
            $this->setMessage('設定したディレクトリが存在しません。');
        } else {
            // Nginxキャッシュディレクトリが有る場合はDSを付加する
            $ngxcc_bcs_folder = new Folder($ngxcc_adcl_folder . DS);
            // Nginxキャッシュディレクトリの中身を調べる
            $ngxcc_bcs_files  = $ngxcc_bcs_folder->read(true, true, true);
            // Nginxキャッシュディレクトリ内で16進数により作成されているディレクトリを正規表現で比較して探し出す
            if ($ngxcc_bcs_files[preg_match("\x[0-9A-Fa-f]{1,2}")]) {
                // Nginxキャッシュディレクトリ内のキャッシュクリア処理
                foreach ($ngxcc_bcs_files[1] as $ngxcc_bcs_file) {
                    @unlink($ngxcc_bcs_file);
                }
                $ngxcc_bcs_Folder = new Folder();
                foreach ($ngxcc_bcs_files[0] as $ngxcc_bcs_folder) {
                    $ngxcc_bcs_Folder->delete($ngxcc_bcs_folder);
                }
                // Nginxのキャッシュの削除が成功すると以下を表示
                $this->setMessage('Nginxのキャッシュを削除しました。');
            } else {
                // Nginxのキャッシュがディレクトリ内が空だと以下を表示
                $this->setMessage('削除するキャッシュがありませんでした。');
            }
        }
    // Nginxキャッシュクリア管理にリダイレクト
    $this->redirect(array('plugin'=>'nginxcacheclear', 'controller'=>'nginxcacheclear', 'action'=>'index'));
    }

/*** ビュー, Nginxキャッシュクリア管理・キャッシュ削除用アクション ***/
}
?>
