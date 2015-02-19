<?php
  /**
    * Nginx Cache Clear Plugin.
    *
    * baserCMS :  Based Website Development Project <http://basercms.net>
    * Copyright   2008 - 2012, baserCMS Users Community <http://sites.google.com/site/baserusers/>
    *
    * @copyright		Copyright 2015, Studio Necomaneki
    * @link			    http://blog.necomaneki.com/ Studio Necomaneki
    * @since			  v 1.6.2
    * @license      MIT lincense
    *
    */
?>
<?php if(!empty($cachedir)): ?>
<div class="panel-box">
  <h5>Nginxキャッシュディレクトリ: [ <?php echo $cachedir[0]['Nginxcacheclear']['cachedir']; ?> ]</h5>
</div>
<?php endif; ?>
