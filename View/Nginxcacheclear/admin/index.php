<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.4.0
    * @license      MIT lincense
    *
    */
?>
<strong>Nginxcacheclear</strong><br />
<?php if (!empty($cachedir)): ?>
<?php echo $cachedir[0]['Nginxcacheclear']['cachedir'];?>
<?php else; ?>
<?php echo $cachedir[1]['Nginxcacheclear']['cachedir'];?>
<?php endif; ?>
<?php echo $this->bcBaser->link('キャッシュディレクトリ名の変更', array('controller'=>'nginxcacheclear', 'action'=>'edit'));?>
