<?php
  /**
    * Nginxキャッシュクリアプラグイン.View
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.6.4
    * @license      MIT lincense
    *
    */
?>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
<p>注1. nginx.conf ( proxy_cache_pass ~ ) に記述されているキャッシュディレクトリを指定して下さい。</p>
<p>注2. 14文字以下、半角英数記号「 / - _ . ~ 」以外の文字及び、空欄での登録は出来ません。</p>
<table>
  <tr>
    <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
  </tr>
</table>
<div class="submit">
  <?php echo $this->bcForm->submit('更新',array('class'=>'button')); ?>
</div>
<?php echo $this->bcForm->end(); ?>
