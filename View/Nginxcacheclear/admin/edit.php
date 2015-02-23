<?php
/**
  * Nginxキャッシュクリアプラグイン.View
  *
  * baserCMS :  Based Website Development Project <http://basercms.net>
  * Copyright   2008 - 2012, baserCMS Users Community <http://forum.basercms.net>
  *
  * @copyright  Copyright 2015, Studio Necomaneki
  * @link       http://blog.necomaneki.com/ Studio Necomaneki
  * @since      v 1.6.6
  * @license    MIT lincense
  *
  */
?>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
    <div class="panel-box corner10">
        <ul>
            <li>注1. nginx.conf ( proxy_cache_pass ~ ) に記述されているキャッシュディレクトリを指定して下さい。</li>
            <li>注2. 3文字以下、半角英数記号「 - _ ~ 」以外の文字及び、空欄での登録は出来ません。</li>
            <li>※ もし項目追加の要望があれば、スタヂオねこまねき(Twitterアカウント): <a href="https://twitter.com/tama32525" title="ねこまねき＠タマ" target="_blank">@tama32525</a> までリプライして下さい。</li>
        </ul>
    </div>
    <div class="panel-box corner10">
        <table>
            <tr>
                <td><?php echo $this->bcForm->input('Nginxcacheclear.cachepath' , array('options' => array('/var/cache/' => 'デフォルトディレクトリ: /var/cache/', '/var/www/' => 'Webディレクトリ: /var/www/', '/var/www/html/app/tmp/cache/' => 'baserCMSキャッシュディレクトリ: app/tmp/cache/'))); ?></td>
                <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
            </tr>
        </table>
        <div class="submit">
            <?php echo $this->bcForm->submit('更新',array('class'=>'button')); ?>
        </div>
    </div>
<?php echo $this->bcForm->end(); ?>
