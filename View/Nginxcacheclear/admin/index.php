<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.7.1
  * @license    MIT lincense
  *
  */
?>
<?php if(!empty($ngxcc_ad_index_path) || !empty($ngxcc_ad_index_dir)): ?>
    <div class="panel-box corner10">
        <h5>登録されているNginxのキャッシュディレクトリ: [ <?php echo $ngxcc_ad_index_path[0]['Nginxcacheclear']['cachepath']; ?><?php echo $ngxcc_ad_index_dir[0]['Nginxcacheclear']['cachedir']; ?> ]</h5>
        <ul>
            <li>
              <?php echo $this->bcBaser->link('Nginxキャッシュ削除', array('controller'=>'nginxcacheclear', 'action'=>'clear')); ?>
            </li>
        </ul>
    </div>
<?php endif; ?>
