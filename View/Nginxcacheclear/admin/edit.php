<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.5.0
    * @license      MIT lincense
    *
    */
?>
<?php echo $this->bcForm->create('Nginxcacheclear'); ?>
<p>※ nginx.conf ( proxy_cache_pass ~ ) に記述されているキャッシュディレクトリを指定して下さい。</p>
<table>
  <tr>
    <td><?php echo $this->bcForm->text('Nginxcacheclear.cachedir'); ?></td>
  </tr>
  <tr>
    <td><?php echo $this->bcForm->error('Nginxcacheclear.cachedir'); ?></td>
  </tr>
</table>
<div class="submit">
  <?php echo $this->bcForm->submit('保存',array('class'=>'button')); ?>
</div>
<?php echo $this->bcForm->end(); ?>
