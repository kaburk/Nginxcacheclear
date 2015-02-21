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
  <tr>
    <th>管理メニュー</th>
    <td>
      <ul class="cleafix">
        <li>
          <?php echo $this->bcBaser->link('Nginxキャッシュディレクトリ更新管理', array('controller'=>'nginxcacheclear', 'action'=>'edit')); ?>
        </li>
        <li>
          <?php echo $this->bcBaser->link('Nginxキャッシュディレクトリチェック', array('controller'=>'nginxcacheclear', 'action'=>'check')); ?>
        </li>
      </ul>
    </td>
  </tr>
