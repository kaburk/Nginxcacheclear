<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.8.0
  * @license    MIT lincense
  *
  */
?>
<?php if(!empty($ngxcc_ad_index_path) || !empty($ngxcc_ad_index_dir)): ?>
    <div class="panel-box corner10">
        <h5><?php echo __d('nginxcacheclear', 'Cache directory of Nginx that are registered:'); ?> [ <?php echo $ngxcc_ad_index_path[0]['Nginxcacheclear']['cachepath']; ?><?php echo $ngxcc_ad_index_dir[0]['Nginxcacheclear']['cachedir']; ?> ]</h5>
        <ul>
            <li>
              <?php echo $this->bcBaser->link(__d('nginxcacheclear', 'Nginx cache Delete'), array('controller'=>'nginxcacheclear', 'action'=>'clear')); ?>
            </li>
        </ul>
    </div>
<?php endif; ?>
