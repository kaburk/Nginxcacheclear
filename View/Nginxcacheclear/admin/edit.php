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
    <div class="panel-box corner10">
        <ul>
            <li><?php echo __d('nginxcacheclear', 'Note: 1. Please specify the cache directory that is described in nginx.conf (proxy_cache_pass ~).'); ?></li>
            <li><?php echo __d('nginxcacheclear', 'Note 2.3 characters or less, alphanumeric symbol \"Hyphen\", \"Underscore\", \"Tilde\" other characters and can not be registered in the blank.'); ?></li>
            <li><?php echo __d('nginxcacheclear', '※ If there is additional demand item, Studio Necomaneki lead (Twitter account)'); ?>: <a href="https://twitter.com/tama32525" title="@tama32525" target="_blank">@tama32525</a> <?php echo __d('nginxcacheclear', 'Please reply to.'); ?></li>
        </ul>
        <div class="panel-box corner5 align-center">
            <?php echo $this->bcBaser->link(__d('nginxcacheclear', 'Nginx I return to the cache clear management'), array('controller'=>'nginxcacheclear', 'action'=>'index')); ?> |
            <?php echo $this->bcBaser->link(__d('nginxcacheclear', 'I check for Nginx cache directory'), array('controller'=>'nginxcacheclear', 'action'=>'check')); ?>
        </div>
    </div>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
    <div class="panel-box corner10">
<?php if(!empty($ngxcc_ad_index_path) || !empty($ngxcc_ad_index_dir)): ?>
        <table>
            <tr>
                <th colspan="2">
                  <?php echo __d('nginxcacheclear', 'Cache directory of Nginx that are registered:'); ?> [ <?php echo $ngxcc_ad_index_path[0]['Nginxcacheclear']['cachepath']; ?><?php echo $ngxcc_ad_index_dir[0]['Nginxcacheclear']['cachedir']; ?> ]
                </th>
            </tr>
            <tr>
                <td><?php echo $this->bcForm->input('Nginxcacheclear.cachepath' ,$ngxcc_ad_edit_selectbox); ?></td>
                <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
            </tr>
        </table>
<?php endif; ?>
        <div class="submit">
            <?php echo $this->bcForm->submit(__d('nginxcacheclear', 'Update'),array('class'=>'button')); ?>
        </div>
    </div>
<?php echo $this->bcForm->end(); ?>
