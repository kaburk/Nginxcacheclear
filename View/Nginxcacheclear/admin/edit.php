<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.6.3
    * @license      MIT lincense
    *
    */
?>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
<p>注1. nginx.conf ( proxy_cache_pass ~ ) に記述されているキャッシュディレクトリを指定して下さい。</p>
<p>注2. 最低14文字以下半角英数記号「 / - _ . ~ 」以外の文字及び、空欄での登録は出来ません。</p>
<table>
  <tr>
    <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
  </tr>
</table>
<div class="submit">
  <?php echo $this->bcForm->submit('保存',array('class'=>'button')); ?>
</div>
<?php echo $this->bcForm->end(); ?>
