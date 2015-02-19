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
<strong>Nginxcacheclear</strong><br />
<?php if(!empty($cachedir)): ?>
<p><?php echo $cachedir[0]['Nginxcacheclear']['cachedir']; ?></p>
<?php endif; ?>
<p><?php echo $this->bcBaser->link('キャッシュディレクトリ名の変更', array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?></p>
<p><?php echo $this->bcBaser->link('Nginxキャッシュ削除', array('controller'=>'nginxcacheclear', 'action'=>'clear')); ?></p>
