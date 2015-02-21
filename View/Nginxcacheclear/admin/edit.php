<?php
  /**
    * Nginxキャッシュクリアプラグイン.View
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.6.5
    * @license      MIT lincense
    *
    */
?>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
<p>注1. nginx.conf ( proxy_cache_pass ~ ) に記述されているキャッシュディレクトリを指定して下さい。</p>
<p>注2. 3文字以下、半角英数記号「 - _ . ~ 」以外の文字及び、空欄での登録は出来ません。</p>
<p>※ もし項目追加の要望があれば、スタヂオねこまねき(Twitterアカウント):<a href="https://twitter.com/tama32525" title="ねこまねき＠タマ" target="_blank">@tama32525</a> までリプライして下さい。</p>
<table>
  <tr>
    <td><?php echo $this->bcForm->input('Nginxcacheclear.cachepath' , array('options' => array('/var/cache/' => 'デフォルトディレクトリ: /var/cache/', '/var/www/' => 'Webディレクトリ: /var/www/', '/var/www/html/app/tmp/' => 'baserCMSキャッシュディレクトリ: app/tmp/'))); ?></td>
    <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
  </tr>
</table>
<div class="submit">
  <?php echo $this->bcForm->submit('更新',array('class'=>'button')); ?>
</div>
<?php echo $this->bcForm->end(); ?>
